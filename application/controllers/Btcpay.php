<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
   
class btcpay extends BaseController {
    public function __construct() {
        parent::__construct();
    }

    function success(){
        $this->isLoggedIn();  
        $this->global['pageTitle'] = 'Deposit successful';
        $this->global['displayBreadcrumbs'] = true; 
        $this->global['breadcrumbs'] = 'Deposit'.' <span class="breadcrumb-arrow-right"></span> '.'Success';
        $this->loadViews("payments/success", $this->global);  
    }

    function IPN_Response(){
        $this->load->helper('string');

        //Handle the response
        if(empty($_POST)){
            //Check if there is no response
            header('HTTP/1.1 200 OK'); // feedback for gateway
        } else {
            if($_POST['data']->status == 'confirmed'){
                //Get the order id
                $invoice = $_POST['orderId'];
                $amount = $_POST['price'];

                //First check the database for this invoice
                $data = $this->btcpay_model->getInfo($invoice);

                if($data->status != 1)
                {
                    //Let us put the data in the database
                    $info = array(
                        'status'=>1
                    );

                    $result = $this->btcpay_model->update($info, $invoice);

                    if($result)
                    {
                        $userId = $data->userId;
                        $planId = $data->planId;

                        $plan = $this->plans_model->getPlanById($planId);

                        $date = date('Y-m-d H:i:s');
                        $userInfo = $this->user_model->getUserInfo($userId);

                        //Deposit Array
                        $depositInfo = array(
                            'userId'=>$userId, 
                            'txnCode'=>'NJ'.random_string('alnum',8),
                            'amount'=>$amount, 
                            'paymentMethod'=> 'BTCPay', 
                            'planId' => $planId,
                            'status' => $plan->principalReturn == 1 ? '0' : '3',
                            'maturityDtm'=> date('Y-m-d H:i:s', strtotime($date."+$plan->investment_period")),
                            'createdBy'=>$userId, 
                            'createdDtm'=>$date
                        );

                        $res = $this->global_deposit($userInfo, $plan, $depositInfo);
                    }
                } else {
                    return false;
                }

            } else {
                // do nothing
            }
        }
    }

    function referralEarnings($userID = NULL, $amount = NULL, $depositID = NULL)
    {
        //Run a check to confirm if referral earningsa has been activated
        $refactive = $this->settings_model->getSettingsInfo()['refactive'];

        if($refactive == 1){ //Earnings has been disabled
            return false;
        } else {
            //Check frequency of earnings
            /**
             * 1 - Only once
             * 0 - All deposits
             */
            $reffreq = $this->settings_model->getSettingsInfo()['reffrequency']; 
            if($reffreq == 1){
                //Run a check to confirm if the user has more than 1 deposit
                $numberofdeposits = $this->transactions_model->depositsListingCount(NULL, $userID);
                if($numberofdeposits > 1){
                    return false;
                } else {
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
            } else {
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
    } 
}