<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
/**
 * Class : Auth (AuthController)
 * Auth class to control the registration amd authentication of users and start their session.
 * @author : Axis96
 * @version : 1.0
 * @since : 07 December 2019
 */
class Auth extends BaseController
{
    /**
     * Auth constructor
     */
    public function __construct()
    {
        parent::__construct();

        //Site Data
        $this->companyInfo();
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->isLoggedIn();
    }
    
    /**
     * This function used to check if the user is logged in or not
     */
    function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->loadViews('/auth/login', $this->global);
        }
        else
        {
            redirect('/dashboard');
        }
    }

    public function signup()
    {
        $csrfTokenName = $this->security->get_csrf_token_name();
        $csrfHash = $this->security->get_csrf_hash();

        //Referral Code 
        $refcode = $this->uri->segment(2);

        //Recaptcha 
        //$recaptchaInfo = $this->addons_model->get_addon_info('Google Recaptcha');
        //$this->global['recaptchaInfo'] = $recaptchaInfo;

        //Page Data
        $this->global['pageTitle']  = 'Signup Page';
        $companyInfo                = $this->settings_model->getsettingsInfo();
        $data['companyName']        = $companyInfo['name'];
        $data["code"]               = $refcode;

        //Helpers
        $this->load->helper('url');
        $this->load->helper('security');

        //Validation
        $this->load->library('form_validation');   
        $this->form_validation->set_rules('firstname','First Name','trim|required', array(
            'required' => lang('this_field_is_required')
        ));
        $this->form_validation->set_rules('lastname','Last Name','trim|required', array(
            'required' => lang('this_field_is_required')
        ));
        $this->form_validation->set_rules('email','Email','trim|required|valid_email', array(
            'required' => lang('this_field_is_required'),
            'valid_email' => lang('this_email_is_invalid')
        ));
        if($companyInfo['require_phone_for_signup'] == 1) {
            $this->form_validation->set_rules('phone','Phone','trim|required', array(
                'required' => lang('this_field_is_required')
            ));
        }
        $this->form_validation->set_rules('password','Password','required', array(
            'required' => lang('this_field_is_required')
        ));
        $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]', array(
            'required' => lang('this_field_is_required'),
            'matches' => lang('passwords_dont_match')
        ));
        $this->form_validation->set_rules('accept_terms','Terms and Conditions','required', array(
            'required' => lang('this_field_is_required')
        ));

        if($companyInfo['google_recaptcha'] != 0){
            if($companyInfo['recaptcha_version'] == 'v2'){
                $this->form_validation->set_rules('g-recaptcha-response','Captcha','callback__recaptcha');
            } else if($companyInfo['recaptcha_version'] == 'v3') {
                $this->form_validation->set_rules('recaptcha_response','Captcha','callback__recaptcha');
            }
        }
        
        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('errors', validation_errors());

            //Ajax Request
            if ($this->input->is_ajax_request()) {
                $errors = array();
                // Loop through $_POST and get the keys
                foreach ($this->input->post() as $key => $value)
                {
                    // Add the error message for this field
                    $errors[$key] = form_error($key);
                }

                $response['errors'] = array_filter($errors); // Some might be empty
                $response["csrfTokenName"] = $csrfTokenName;
                $response["csrfHash"] = $csrfHash;
                $response['success'] = false;
                if (!isset($_POST['accept_terms'])){
                    $response['terms'] = lang('please_read_and_accept_our_terms_and_conditions');
                }
                    $response['msg'] = lang('please_correct_errors_and_try_again');

                echo json_encode($response); 
            }
        }
        else
        {
            $fname = strtolower($this->input->post('firstname', TRUE));
            $lname = strtolower($this->input->post('lastname', TRUE));
            $email = strtolower($this->input->post('email', TRUE));
            if($companyInfo['require_phone_for_signup'] == 1) {
                $phone = $this->input->post('fullMobile');
            }
            $password = $this->input->post('password', TRUE);
            $ref = $this->input->post('ref', TRUE);
            $roleId = '3';
            $dateCreated = date('Y-m-d H:i:s');
            $result = $this->login_model->checkEmailExist($email); 
            $verification_url = $companyInfo['signup_email_verification'] == 0 ? NULL : time() . rand(10*45, 100*98);
            $verification_code = $companyInfo['signup_email_verification'] == 0 ? NULL : random_int(100000, 999999);

            if($result>0){
                $this->session->set_flashdata('error', 'Email is in use');
                if ($this->input->is_ajax_request()) {
                    $array = array(
                        'errors' => array(
                            'email' => html_escape(lang('this_email_is_in_use'))
                        ),
                        "csrfTokenName" => $csrfTokenName,
                        "csrfHash" => $csrfHash,
                        'success' => false
                    );
    
                    echo json_encode($array);
                }

            } else {
                
                $this->load->helper('string');
                $code = random_string('alnum',8);
                $userInfo = array(
                    'email'=>$email, 
                    'password'=>getHashedPassword($password), 
                    'roleId'=>$roleId, 
                    'firstName'=> $fname,
                    'lastName'=> $lname, 
                    'mobile' => $phone,
                    'refCode' => $code,
                    'verification_url' => $verification_url,
                    'email_verification_code' => $verification_code,
                    'createdDtm'=> $dateCreated
                );
                $this->load->model('user_model');
                $result1 = $this->user_model->addNewUser($userInfo);
                
                if($result1>0)
                {
                    //Send Mail
                    if($companyInfo['signup_email_verification'] == 0){
				        $conditionUserMail = array('tbl_email_templates.type'=>'registration');
                    } else {
                        $conditionUserMail = array('tbl_email_templates.type'=>'Email Verification');
                    }
				    $resultEmail = $this->email_model->getEmailSettings($conditionUserMail);

                    $firstname = $this->input->post('firstname', TRUE);
                    $companyInfo = $this->settings_model->getsettingsInfo();
                    $companyname = $companyInfo['name'];  
				
				    if($resultEmail->num_rows() > 0)
				    {
					    $rowUserMailContent = $resultEmail->row();
					    $splVars = array(
                            "!site_name"   => $this->config->item('site_title'),
                            "!clientName"  => $firstname,
                            "!clientEmail" => $email,
                            "!companyName" => $companyname,
                            "!verification_url" => base_url('verify-email/'.$verification_url),
                            "!verification_code" => $verification_code,
                            "!address"     => $companyInfo['address'],
                            "!siteurl"     => base_url()
                        );

					$mailSubject = strtr($rowUserMailContent->mail_subject, $splVars);
					$mailContent = strtr($rowUserMailContent->mail_body, $splVars); 	

					$toEmail = $this->input->post('email',TRUE);
					$fromEmail = $companyInfo['SMTPUser'];

					$name = 'Support';

					$header = "From: ". $name . " <" . $fromEmail . ">\r\n"; //optional headerfields

					$this->sendEmail($toEmail,$mailSubject,$mailContent);

				    //print_r($mailContent);
				    }

                    $result2 = $this->login_model->loginMe($email, $password);
                    if($ref) 
                    {
                        $isrefcode = $this->referrals_model->getReferralId($ref);
                        if($isrefcode)
                        {
                            $referrer = $isrefcode->userId;
                            $referred = $result2->userId;
                            $created = date('Y-m-d H:i:s');
                            $referralInfo = array(
                                'referrerId' => $referrer,
                                'referredId' => $referred,
                                'createdDtm' => $created
                            );
                            $this->referrals_model->addReferral($referralInfo);
                        }
                    } 

                    if($companyInfo['signup_email_verification'] == 0){
                        //$lastLogin = $this->login_model->lastLoginInfo($result2->userId);
                        $sessionArray = array('userId'=>$result2->userId,                    
                                            'role'=>$result2->roleId,
                                            'roleText'=>$result2->role,
                                            'firstName'=>$result2->firstName,
                                            'lastName'=>$result2->lastName,
                                            'isLoggedIn' => TRUE
                                        );

                        $this->session->set_userdata($sessionArray);

                        $loginInfo = array(
                            "userId"=>$result2->userId, 
                            "sessionData" => json_encode($sessionArray), 
                            "machineIp"=>$_SERVER['REMOTE_ADDR'], 
                            "userAgent"=>getBrowserAgent(), 
                            "agentString"=>$this->agent->agent_string(), 
                            "platform"=>$this->agent->platform()
                        );

                        $this->login_model->lastLogin($loginInfo);

                        if (!$this->input->is_ajax_request()) {
                            redirect('/dashboard');
                        } else
                        {
                            $array = array(
                                'success' => true,
                                'verify_email' => $companyInfo['signup_email_verification'],
                                'msg' => html_escape(lang('signup_successful')),
                                'url' => $companyInfo['kyc_status'] == 0 ? base_url('dashboard') : base_url('verify'),
                                "csrfTokenName" => $csrfTokenName,
                                "csrfHash" => $csrfHash,
                            );
            
                            echo json_encode($array);
                        }
                    } else if($companyInfo['signup_email_verification'] == 1){
                        $array = array(
                            'success' => true,
                            'msg' => 'Click the link sent to your email to verify your account',
                            'verify_email' => $companyInfo['signup_email_verification'],
                            'verification_url' => $companyInfo['signup_email_verification'] == 0 ? '' : base_url('verify-email/'.$verification_url),
                            "csrfTokenName" => $csrfTokenName,
                            "csrfHash" => $csrfHash,
                        );
        
                        echo json_encode($array);
                    
                    }
                } else {
                    $this->session->set_flashdata('error', lang('signup_failed_try_again'));
                    if ($this->input->is_ajax_request()) {
                    $array = array(
                        'success' => false,
                        'msg' => html_escape(lang('signup_failed_try_again')),
                        "csrfTokenName" => $csrfTokenName,
                        "csrfHash" => $csrfHash,
                    );
    
                    echo json_encode($array);
                    }
                }
            }            
        }
        if (!$this->input->is_ajax_request()) {
            $this->loadViews('/auth/register', $this->global, $data);
        }
    }

    public function resend_link($verification_url){
        //Check if verification url exists
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('isDeleted', 0);
        $this->db->where('verification_url', $verification_url);
        $query = $this->db->get();

        $row = $query->row();

        if($row){
            $conditionUserMail = array('tbl_email_templates.type'=>'Email Verification');
                
            $resultEmail = $this->email_model->getEmailSettings($conditionUserMail);

            $companyInfo = $this->settings_model->getsettingsInfo(); 
        
            if($resultEmail->num_rows() > 0)
            {
                $rowUserMailContent = $resultEmail->row();
                $splVars = array(
                    "!site_name"   => $this->config->item('site_title'),
                    "!clientName"  => $row->firstName,
                    "!clientEmail" => $row->email,
                    "!companyName" => $companyInfo['name'],
                    "!verification_url" => base_url('verify-email/'.$row->verification_url),
                    "!verification_code" => $row->email_verification_code,
                    "!address"     => $companyInfo['address'],
                    "!siteurl"     => base_url()
                );

                $mailSubject = strtr($rowUserMailContent->mail_subject, $splVars);
                $mailContent = strtr($rowUserMailContent->mail_body, $splVars); 	

                $toEmail = $row->email;
                $fromEmail = $companyInfo['SMTPUser'];

                $name = 'Support';

                $header = "From: ". $name . " <" . $fromEmail . ">\r\n"; //optional headerfields

                $this->sendEmail($toEmail,$mailSubject,$mailContent);
            }

            $array = array(
                'success' => true
            );

            echo json_encode($array);
        } else {
            $res = array(
                'success' => false
            );
        }        
    }

    public function verify_email($verification_url)
    {
        if($this->input->server('REQUEST_METHOD') === 'GET'){
            //Check if verification code exists in database
            $this->db->select('*');
            $this->db->from('tbl_users');
            $this->db->where('isDeleted', 0);
            $this->db->where('verification_url', $verification_url);
            $query = $this->db->get();

            $row = $query->row();

            if($row){
                $data['email'] = $row->email;
                /*$arr = array(
                    'email_verification_code' => NULL
                );*/

                //$this->user_model->editUser($arr, $row->userId);
                //Show that the user can now login
                $this->global['pageTitle']  = 'Verify Email';
                $this->loadViews('/auth/verify', $this->global, $data);
            } else {
                redirect('/login');
            }
        } else if($this->input->server('REQUEST_METHOD') === 'POST') {
            $csrfTokenName = $this->security->get_csrf_token_name();
            $csrfHash = $this->security->get_csrf_hash();
            $companyInfo = $this->settings_model->getsettingsInfo();
            $recaptchaInfo = $this->addons_model->get_addon_info('Google Recaptcha');

            $this->load->library('form_validation');   

            $this->form_validation->set_rules('code','Verification Code','trim|required', array(
                'required' => lang('this_field_is_required')
            ));
            
            if($this->form_validation->run() == FALSE)
            {
                $errors = array();
                // Loop through $_POST and get the keys
                foreach ($this->input->post() as $key => $value)
                {
                    // Add the error message for this field
                    $errors[$key] = form_error($key);
                }
                $response['errors'] = array_filter($errors); // Some might be empty
                $response['success'] = false;
                $response['v'] = $companyInfo['recaptcha_version'];
                $response['key'] = $recaptchaInfo->public_key;
                $response["csrfTokenName"] = $csrfTokenName;
                $response["csrfHash"] = $csrfHash;
                $response['msg'] = html_escape(lang('please_correct_errors_and_try_again'));

                echo json_encode($response);
            } else {
                $code = $this->input->post('code');

                //Check if verification code exists in database
                $this->db->select('*');
                $this->db->from('tbl_users');
                $this->db->where('isDeleted', 0);
                $this->db->where('verification_url', $verification_url);
                $this->db->where('email_verification_code', $code);
                $query = $this->db->get();

                $row = $query->row();

                if($row){
                    $arr = array(
                        'email_verification_code' => NULL,
                        'verification_url' => NULL
                    );

                    $this->user_model->editUser($arr, $row->userId);

                    if($row->roleId == 1){
                        $role = ROLE_ADMIN;
                    } else if($row->roleId == 2){
                        $role = ROLE_MANAGER;
                    } else if($row->roleId == 3){
                        $role = ROLE_CLIENT;
                    }

                    //Proceed
                    $sessionArray = array(
                        'userId'=>$row->userId,                    
                        'role'=>$role,
                        'roleText'=>$row->roleId,
                        'firstName'=>$row->firstName,
                        'lastName'=>$row->lastName,
                        'ppic'=>$row->ppic,
                        'lastLogin'=> date('Y-m-d H:i:s'),
                        'isLoggedIn' => TRUE
                    );

                    $this->session->set_userdata($sessionArray);

                    $res = array(
                        'success' => true,
                        'redirect' => base_url('dashboard')
                    );

                    echo json_encode($res);
                } else {
                    $res = array(
                        'success' => false,
                        'errors' => array(
                            'code' => 'The verification code is incorrect',
                        )
                    );

                    echo json_encode($res);
                }
            }
        }
    }

    public function login($step = NULL) {
        if($this->isGet()){
            $this->global['pageTitle'] = 'Login';
            $this->global['recaptchaInfo'] = $this->addons_model->get_addon_info('Google Recaptcha');
            $this->global['companyInfo'] = $this->settings_model->getsettingsInfo();
            $this->index();
        } else {
            $companyInfo = $this->settings_model->getsettingsInfo();
            $recaptchaInfo = $this->addons_model->get_addon_info('Google Recaptcha');
            $csrfTokenName = $this->security->get_csrf_token_name();
            $csrfHash = $this->security->get_csrf_hash();
            
            $this->global['pageTitle'] = 'Login';
    
            $this->load->library('GoogleAuthenticator');
            $this->load->library('Authy');
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array(
                'required' => lang('this_field_is_required'),
                'valid_email' => lang('this_email_is_invalid')
            ));

            $this->form_validation->set_rules('password', 'Password', 'required', array(
                'required' => lang('this_field_is_required')
            ));

            if($companyInfo['google_recaptcha'] != 0){
                if($companyInfo['recaptcha_version'] == 'v2' && $step == 1){
                    $this->form_validation->set_rules('g-recaptcha-response','Captcha','callback__recaptcha');
                } else if($companyInfo['recaptcha_version'] == 'v3' && $step == 1) {
                    $this->form_validation->set_rules('recaptcha_response','Captcha','callback__recaptcha');
                }
            }

            if($step == 2){
                if($companyInfo['two_factor_auth'] == 'Google Authenticator'){
                    $this->form_validation->set_rules('token', 'Two-factor token', 'min_length[6]|max_length[6]|required', array(
                        'required' => lang('this_field_is_required'),
                        'min_length' => lang('minimum_length_is').' 6',
                        'max_length' => lang('maximum_length_is').' 6'
                    ));
                } else if($companyInfo['two_factor_auth'] == 'Authy'){
                    $this->form_validation->set_rules('token', 'Two-factor token', 'min_length[7]|max_length[7]|required', array(
                        'required' => lang('this_field_is_required'),
                        'min_length' => lang('minimum_length_is').' 7',
                        'max_length' => lang('maximum_length_is').' 7'
                    ));
                }
            }
            
            if($this->form_validation->run() == FALSE) {
                $errors = array();
                // Loop through $_POST and get the keys
                foreach ($this->input->post() as $key => $value)
                {
                    // Add the error message for this field
                    $errors[$key] = form_error($key);
                }
                $response['errors'] = array_filter($errors); // Some might be empty
                $response['success'] = false;
                if($companyInfo['google_recaptcha'] != 0){
                    $response['v'] = $companyInfo['recaptcha_version'];
                    $response['key'] = $recaptchaInfo->public_key;
                }
                $response["csrfTokenName"] = $csrfTokenName;
                $response["csrfHash"] = $csrfHash;
                $response['msg'] = lang('please_correct_errors_and_try_again');
    
                echo json_encode($response);
            } else {  
                $email = strtolower($this->input->post('email', TRUE));
                $password = $this->input->post('password', TRUE);

                if($step == 1){ 
                    $confirmPass = $this->confirmPassword($email, $password);

                    if($confirmPass['success'] == false){
                        echo json_encode($confirmPass);
                    } else {
                        $userInfo = $confirmPass['userInfo'];

                        if($userInfo->two_factor_auth == 1){
                            //Redirect to 2FA page
                            if($companyInfo['two_factor_auth'] == 'Authy'){
                                $msg = lang('please_input_the_2FA_code_from_the_authy_app');
                            } else if($companyInfo['two_factor_auth'] == 'Google Authenticator') {
                                $msg = lang('please_input_the_2FA_code_from_the_google_authenticator_app');
                            }

                            $res = array(
                                'success' => true,
                                'twfa' => true,
                                'v'=>$companyInfo['google_recaptcha'] != 0 ? $companyInfo['recaptcha_version'] : 0,
                                'key'=>$recaptchaInfo->public_key,
                                'msg' => $msg
                            );

                            echo json_encode($res);
                        } else {
                            if($companyInfo['signup_email_verification'] == 1 && $userInfo->verification_url != NULL && $userInfo->email_verification_code != NULL){
                                //Check if the user has verified account
                                $array = array(
                                    'success'=>true,
                                    'twfa' => false,
                                    'url'=>base_url('verify-email/'.$userInfo->verification_url),
                                    'msg'=>lang('success')
                                );
                
                                echo json_encode($array);
                                
                            } else {
                                $createSession = $this->createSession($userInfo);
                                $array = array(
                                    'success'=>true,
                                    'twfa' => false,
                                    'url'=>base_url('dashboard'),
                                    'msg'=>lang('success')
                                );
                
                                echo json_encode($array);
                            }
                        }
                    }
                } else if($step == 2) {
                    $confirmPass = $this->confirmPassword($email, $password);

                    if($confirmPass['success'] == false){
                        echo json_encode($confirmPass);
                    } else {
                        $userInfo = $confirmPass['userInfo'];
                        //We need to confirm the 2FA code
                        $token = $this->input->post('token');

                        if($companyInfo['two_factor_auth'] == 'Google Authenticator'){
                            $gaobj = new GoogleAuthenticator();
                            $secret = $userInfo->g_auth_secret;       
                            $checkResult = $gaobj->verifyCode($secret, $token, 2); // 2 = 2*30sec clock tolerance
                        } else if($companyInfo['two_factor_auth'] == 'Authy') {
                            $id = $userInfo->two_factor_auth;
                            $api_key = $this->addons_model->get_addon_info('Authy')->public_key;
                            $checkResult = $this->authy->verify_token($id,$token,$api_key);
                        }

                        if (!$checkResult){    
                            $array = array(
                                'success'=>false,
                                'v'=>$companyInfo['google_recaptcha'] != 0 ? $companyInfo['recaptcha_version'] : 0,
                                'key'=>$recaptchaInfo->public_key,
                                'errors' => array(
                                    'token' => lang('failed')
                                )
                            );
            
                            echo json_encode($array);     
                        } else {
                            $createSession = $this->createSession($userInfo);
                            $array = array(
                                'success'=>true,
                                'url'=>base_url('dashboard'),
                                'msg'=>lang('success')
                            );
            
                            echo json_encode($array);
                        }
                    }
                }
            }
        }
    }   

    private function createSession($userInfo = NULL){
        if($userInfo->roleId == 1){
            $role = ROLE_ADMIN;
        } else if($userInfo->roleId == 2){
            $role = ROLE_MANAGER;
        } else if($userInfo->roleId == 3){
            $role = ROLE_CLIENT;
        }

        $sessionArray = array(
            'userId'     => $userInfo->userId,                    
            'role'       => $role,
            'roleText'   => $userInfo->roleId,
            'firstName'  => $userInfo->firstName,
            'lastName'   => $userInfo->lastName,
            'ppic'       => $userInfo->ppic,
            'lastLogin'  => date('Y-m-d H:i:s'),
            'isLoggedIn' => TRUE
        );

        $this->session->set_userdata($sessionArray);
        
        $loginInfo = array(
            "userId"      => $userInfo->userId, 
            "sessionData" => json_encode($sessionArray), 
            "machineIp"   => $_SERVER['REMOTE_ADDR'], 
            "userAgent"   => getBrowserAgent(), 
            "agentString" => $this->agent->agent_string(), 
            "platform"    => $this->agent->platform()
        );

        $this->login_model->lastLogin($loginInfo);
    }
    
    private function confirmPassword($email = NULL, $password = NULL){
        $result = $this->login_model->loginMe($email, $password);
        $companyInfo = $this->settings_model->getsettingsInfo();
        $recaptchaInfo = $this->addons_model->get_addon_info('Google Recaptcha');

        if(!empty($result)) {
            //Check if the user is active
            if($result->isActive == 1){
                $array = array(
                    'success'=>false,
                    'v'=>$companyInfo['google_recaptcha'] != 0 ? $companyInfo['recaptcha_version'] : 0,
                    'key'=>$recaptchaInfo->public_key,
                    'errors' => array(
                        'password' => lang('account_deactivated_contact_support')
                    )
                );

                return $array;     
            } else {
                $array = array(
                    'success'=>true,
                    'userInfo' => $result
                );

                return $array;
            }
        } else {
            $array = array(
                'success'=>false,
                'v'=>$companyInfo['google_recaptcha'] != 0 ? $companyInfo['recaptcha_version'] : 0,
                'key'=>$recaptchaInfo->public_key,
                'errors' => array(
                    'password' => lang('incorrect_login_credentials')
                )
            );

            return $array;
        }
    }

    /**
     * This function used to load forgot password view
     */
    public function forgotPassword()
    {
        $this->global['pageTitle'] = 'Forgot Password';
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->loadViews('/auth/forgotPassword', $this->global, NULL, NULL);
        }
        else
        {
            redirect('/dashboard');
        }
    }
    
    /**
     * This function used to generate reset password request link
     */
    function resetPasswordUser()
    {
        $status = '';
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('login_email','Email','required|valid_email', array(
            'required' => lang('this_field_is_required'),
            'valid_email' => lang('this_email_is_invalid')
        ));
                
        if($this->form_validation->run() == FALSE)
        {
            $this->forgotPassword();
        }
        else 
        {
            $email = strtolower($this->input->post('login_email', TRUE));
            
            if($this->login_model->checkEmailExist($email))
            {  
                $this->load->helper('string');

                $data = array(
                    'email' => $email,
                    'activation_id' => random_string('alnum',15),
                    'createdDtm' => date('Y-m-d H:i:s'),
                    'agent' => getBrowserAgent(),
                    'client_ip' => $this->input->ip_address()
                );
                
                $save = $this->login_model->resetPasswordUser($data);                
                
                if($save)
                {
                    $reset_link = base_url() . "resetPassword/" . $data['activation_id'];
                    $userInfo = $this->login_model->getCustomerInfoByEmail($email);

                    if(!empty($userInfo)){
                        $data1["name"] = $userInfo->firstName.'&nbsp'.$userInfo->lastName;
                        $data1["email"] = $userInfo->email;
                        $data1["message"] = "Reset Your Password";
                    }

                    //Send Mail and SMS
				    $conditionUserMail = array('tbl_email_templates.type'=>'Forgot Password');
				    $resultEmail = $this->email_model->getEmailSettings($conditionUserMail);

                    $companyInfo = $this->settings_model->getsettingsInfo();
				
				    if($resultEmail->num_rows() > 0)
				    {
					    $rowUserMailContent = $resultEmail->row();
					    $splVars = array(
                            "!clientName"  => $userInfo->firstName,
                            "!companyName" => $companyInfo['name'],
                            "!address"     => $companyInfo['address'],
                            "!siteurl"     => base_url(),
                            "!resetLink"   => $reset_link
                        );

					$mailSubject = strtr($rowUserMailContent->mail_subject, $splVars);
					$mailContent = strtr($rowUserMailContent->mail_body, $splVars); 	

					$toEmail   = $userInfo->email;
					$fromEmail = $companyInfo['SMTPUser'];

					$name = 'Support';

					$header = "From: ". $name . " <" . $fromEmail . ">\r\n"; //optional headerfields

                    $send = $this->sendEmail($toEmail,$mailSubject,$mailContent);

				    //$sendStatus = resetPasswordEmail($data1);
                    if($send == true) {
                        setFlashData('success', lang('reset_password_link_sent_successfully_check_email'));
                    } else {
                        setFlashData('success', lang('reset_password_link_sent_successfully_check_email'));
                    }

                    //Send SMS
                    $phone = $userInfo->mobile;
                    if($phone){
                        $body = strtr($rowUserMailContent->sms_body, $splVars);

                        $result = $this->twilio_model->send_sms($phone, $body);
                    }

                    }
                }
                else
                {
                    setFlashData('error', lang('error'));
                }
            }
            else
            {
                setFlashData('error', lang('this_email_is_not_registered_with_us'));
            }
            if ($this->input->post('redirect', TRUE) == 1) {
                redirect('profile');
            } else {
                redirect('forgotPassword');
            }
            
        }
    }

    /**
     * This function used to reset the password 
     * @param string $activation_id : This is unique id
     * @param string $email : This is user email
     */
    function resetPasswordConfirmUser($activation_id)
    {        
        $this->global['pageTitle'] = 'Reset Password';
        // Check activation id in database
        $activationInfo = $this->login_model->checkActivationDetails($activation_id);

        if ($activationInfo->num_rows() > 0) {
            $email = $activationInfo->row()->email;
            $userInfo = $this->login_model->getCustomerInfoByEmail($email);
            $data['email'] = $email;
            $data['name'] = $userInfo->firstName;
            $data['activation_code'] = $activation_id;
            $this->loadViews('/auth/newPassword', $this->global, $data);
        }
        else
        {
            redirect('/login');
        }
    }
    
    /**
     * This function used to create new password for user
     */
    function createPasswordUser()
    {
        $status = '';
        $message = '';
        $email = strtolower($this->input->post("email", TRUE));
        $activation_id = $this->input->post("activation_code", TRUE);
        $encoded_email = urlencode($email);
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('password','Password','required', array(
            'required' => lang('this_field_is_required')
        ));
        $this->form_validation->set_rules('cpassword','Confirm Password','required|matches[password]', array(
            'required' => lang('this_field_is_required'),
            'matches' => lang('passwords_dont_match')
        ));
        
        if($this->form_validation->run() == FALSE)
        {
            //$this->resetPasswordConfirmUser($activation_id, urlencode($email));
            setFlashData('error', validation_errors());
            $this->resetPasswordConfirmUser($activation_id);
        }
        else
        {
            $password = $this->input->post('password', TRUE);
            $cpassword = $this->input->post('cpassword', TRUE);
            
            // Check activation id in database
            $is_correct = $this->login_model->checkActivationDetails($activation_id);
            
            if($is_correct->num_rows() == 1)
            {                
                $this->login_model->createPasswordUser($email, $password);
                $this->session->set_flashdata('success', lang('password_reset_successful'));
                redirect("/login");
            }
            else
            {
                $this->session->set_flashdata('error', lang('password_reset_failed'));
                redirect('/resetPassword'.$activation_id);
            }            
        }
    }

	public function login1()
	{
		// Render the login page
		$this->load->view('backend/auth/login1');
	}
}
?>
