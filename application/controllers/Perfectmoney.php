<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
   
class perfectmoney extends BaseController {
    public function __construct() {
        parent::__construct();
    }

    function success(){
        $this->isLoggedIn();  
        $this->isVerified(); 
        $this->global['pageTitle'] = 'Deposit succesful';
        $this->global['displayBreadcrumbs'] = true; 
        $this->global['breadcrumbs'] = 'Deposit'.' <span class="breadcrumb-arrow-right"></span> '.'Success';
        $this->loadViews("payments/success", $this->global); 
    }

    function canceled(){
        $this->isLoggedIn(); 
        $this->isVerified();  
        $this->global['pageTitle'] = 'Deposit failed';
        $this->global['displayBreadcrumbs'] = true; 
        $this->global['breadcrumbs'] = 'Deposit'.' <span class="breadcrumb-arrow-right"></span> '.'Canceled';
        $this->loadViews("payments/cancel", $this->global);   
    }

    function IPN_Response(){
        $this->load->helper('string');

        $perfectmoneyinfo = $this->payments_model->getInfo('tbl_addons_api', 'Perfect Money');
        $passphrase = $perfectmoneyinfo->public_key;

        if (!isset($_POST['PAYMENT_ID']) || !isset($_POST['PAYEE_ACCOUNT']) || !isset($_POST['PAYMENT_AMOUNT']) || !isset($_POST['PAYMENT_UNITS']) || !isset($_POST['PAYMENT_BATCH_NUM']) || !isset($_POST['PAYER_ACCOUNT']) || !isset($_POST['TIMESTAMPGMT'])) {
            //Stop here
            return false;
        } else {
            $paymentID = $_POST['PAYMENT_ID'];
            $payeeAccount = $_POST['PAYEE_ACCOUNT'];
            $paymentAmount = $_POST['PAYMENT_AMOUNT'];
            $paymentUnits = $_POST['PAYMENT_UNITS'];
            $paymentBatchNum = $_POST['PAYMENT_BATCH_NUM'];
            $payerAccount = $_POST['PAYER_ACCOUNT'];
            $timestampPGMT = $_POST['TIMESTAMPGMT'];
            $v2Hash = $_POST['V2_HASH'];
            //$baggageFields = $_POST['BAGGAGE_FIELDS'];

            $pmData = $this->perfectmoney_model->getInfo($paymentID);

            if($pmData->status != 1)
            {
                $alternatePhraseHash = strtoupper(md5($passphrase));
                $hash = $paymentID . ':' . $payeeAccount . ':' . $paymentAmount . ':' . $paymentUnits . ':' . $paymentBatchNum . ':' . $payerAccount . ':' . $alternatePhraseHash . ':' . $timestampPGMT;
                $hash2 = strtoupper(md5($hash));

                if ($hash2 != $v2Hash)
                {
                    //Stop here
                } else
                {
                    //Let us put the data in the database
                    $info = array(
                        'amount'=>$paymentAmount,
                        'payment_batch_number'=>$paymentBatchNum,
                        'payer_account'=>$payerAccount,
                        'status'=>1
                    );

                    $result = $this->perfectmoney_model->update($info, $paymentID);

                    if($result)
                    {
                        $userId = $pmData->userId;
                        $planId = $pmData->planId;
                        $plan = $this->plans_model->getPlanById($planId);
                        $date = date('Y-m-d H:i:s');
                        $userInfo = $this->user_model->getUserInfo($userId);

                        //Deposit Array
                        $depositInfo = array(
                            'userId'=>$userId, 
                            'txnCode'=>'NJ'.random_string('alnum',8),
                            'amount'=>$paymentAmount, 
                            'paymentMethod'=> 'Perfect Money', 
                            'planId' => $planId,
                            'status' => $plan->principalReturn == 1 ? '0' : '3',
                            'maturityDtm'=> date('Y-m-d H:i:s', strtotime($date."+$plan->investment_period")),
                            'createdBy'=>$userId, 
                            'createdDtm'=>$date
                        );

                        $res = $this->global_deposit($userInfo, $plan, $depositInfo);
                    }
                }
            }
            return true;
        }
    }

    function referralEarnings($userID = NULL, $amount = NULL, $depositID = NULL)
    {
        if($userID == Null || $amount == Null || $depositID == Null)
        {
            return false;
            //print_r('Either the user Id, amount or depositid is not available');
        }
        else 
        {
            //Get the referrer ID
            $referrerID = $this->referrals_model->getReferrerID($userID);

            //First Let's check whether this user has been referred by anyone
            if($referrerID != null) {
                //Check the referral method & interest
                $refMethod = $this->settings_model->getSettingsInfo()['refType'];
                $refInterest = $this->settings_model->getSettingsInfo(1)['refInterest'];
                $deposit_only_payouts = $this->settings_model->getSettingsInfo(1)['disableRefPayouts'];

                if($refMethod == 'simple')
                {
                    $number_of_deposits = $this->transactions_model->depositsListingCount('', $referrerID);

                    //Calculate the referrer's earnings
                    $earnings = $amount * ($refInterest/100);

                    //for generating the txn code
                    $this->load->helper('string');

                    //Insert earnings into the earnings table
                    $array = array(
                        'type' => 'referral',
                        'userId'=> $referrerID,
                        'depositId' => $depositID,
                        'txnCode' => 'PO'.random_string('alnum',8),
                        'amount' => $earnings,
                        'createdDtm'=> date("Y-m-d H:i:s")
                    );

                    if($deposit_only_payouts == 1 && $number_of_deposits > 0) {
                        $result = $this->transactions_model->addNewEarning($array);
                    } else if($deposit_only_payouts == 0) {
                        $result = $this->transactions_model->addNewEarning($array);
                    } else {
                        $result = 0;
                    }

                    if($result > 0)
                    {
                        return true;
                        //print_r('New simple earning added');
                    } else 
                    {
                        return false;
                        //print_r('New simple earning not added');
                    }

                } else if($refMethod == 'multiple')
                {
                    //Find the referral levels
                    $levels_array = explode(',', $refInterest);
                    $levelsCount = count($levels_array);

                    //Get an array that looks like this [{id: 1, amount: 10}, {id: 2, amount: 15}]
                    for ($i=0; $i<$levelsCount; $i++) {
                        // Here we get the first referredID whose making the deposit
                        $referrerId_[0] = $userID;
                        //We then get multiple referrerIds based on the number of levels
                        $referrerId_[$i + 1] = $this->referrals_model->getReferrerID($referrerId_[$i]);
                        //We then procced to put it in an array with referrerId_[1] as the first Id
                        $earningsData[] = (object) [
                            "id" => $referrerId_[$i + 1],
                            "interest" => $levels_array[$i],
                            "amount" => $amount * $levels_array[$i]/100
                        ];
                    }

                    //for generating the txn code
                    $this->load->helper('string');

                    //We then take the earnings data and remove all null Ids in the array to get the users
                    //that we should put soe earnings for
                    foreach($earningsData as $data) {
                        if($data->id != null) {
                            $array[] = array(
                                'type' => 'referral',
                                'userId'=> $data->id,
                                'depositId' => $depositID,
                                'txnCode' => 'PO'.random_string('alnum',8),
                                'amount' => $data->amount,
                                'createdDtm'=>date("Y-m-d H:i:s")
                            );
                        }
                    };

                    //Insert the data
                    $result = $this->transactions_model->addNewEarnings($array);

                    if($result > 0)
                    {
                        return true;
                    } else 
                    {
                        return false;
                    }
                }
            } else 
            {
                return false;
            }   
        }
    } 
}