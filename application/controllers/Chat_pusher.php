<?php
defined('BASEPATH')OR exit('direct script no access allowed');
class Chat_pusher extends CI_Controller{
    public function __construct(){  
        parent:: __construct();
        $this->load->library('auth');
        if(empty($this->auth->user_info()->id))
        {
            redirect(base_url());
        }
        $this->load->model('Login_model','LoginModel');
        $this->load->model('Module_model','ManageModule');
    }
    public function get_user_activity()
    {
         
        if(!empty($_COOKIE['userloggedIn']))
        {
        if($getExpireDays = $this->LoginModel->getCookieDetail($_COOKIE))
        {    
        $expire_days = $getExpireDays->expiry_days;
        $cookie_login_time = date('Y-m-d H:i:s',strtotime($getExpireDays->cookie_time));
        $current_cookie_time  = date('Y-m-d H:i:s');
        $cookie_diff = (strtotime($current_cookie_time)-strtotime($cookie_login_time));
        $cookies_expire_minute = $expire_days*24*60;
        $cookie_diff_min =  ($cookie_diff/60);
        $cookies_destroy_time = time() + (86400 * $expire_days);
        if($getExpireDays->cookie_expire_status==3)
            {
                setcookie('userloggedIn',"",0,"/");
                echo 1;
                exit();
            }

        if($cookie_diff_min>$cookies_expire_minute)
        {
            if($this->LoginModel->cookiesExpireDetail($getExpireDays->user_auth_id))
            {
                $this->LoginModel->updateLogoutActivity($_COOKIE,3);
                unset($_COOKIE['userloggedIn']);
                redirect(base_url('logout'));
            }
        }
        }
        elseif(count($getExpireDays)<1)
        {
             setcookie('userloggedIn',"",0,"/");
                echo 1;
                exit();
        }

        $data['user_detail'] = $this->auth->user_info(); 
        $user_id           = $data['user_detail']->id;
        $record              = $this->LoginModel->getUserLogLastId($user_id);
        //$check_user = $this->LoginModel->checkUserLogin($user_id);
        // if(count($check_user)>1)
        // {
            
        //     $this->LoginModel->checkUserLogin($user_id);
        //     //$this->LoginModel->auth_activity($user_id,3);
        //     redirect(base_url('logout'));
        // }
       
        // if(count($check_user)==0)
        // {
        //     redirect(base_url('logout'));
        // }
        $login_time = "";
        if($record['activity_detail'])
        {
            
            $login_time = date('Y-m-d H:i:s',strtotime($record['activity_detail'][0]->created_date));
            $current_time = date('Y-m-d H:i:s');
            $diff = (strtotime($current_time)-strtotime($login_time));
            $getMin = ($diff/60);
            if($getMin>2 && $getMin < 15)
            {
                
                $this->LoginModel->userSleepMode($user_id,2);
            }
            else if($getMin > 15)
            {
              // redirect(base_url('logout'));
            }
            else
            {
                //$this->LoginModel->auth_activity($user_id,1,$login_status=2 already login);
                $this->LoginModel->auth_activity($user_id,1,1);
            }
        }
        else
        {
            
            $getLoginTime = $this->LoginModel->getUserLoginTime($user_id)[0];
            $login_time = date('Y-m-d H:i:s',strtotime($getLoginTime->created_date));
            $current_time = date('Y-m-d H:i:s');
            $diff = (strtotime($current_time)-strtotime($login_time));
            $getMin = ($diff/60);
            if($getMin>2 && $getMin < 15)
            {
               
                $this->LoginModel->userSleepMode($user_id,2);
            }
            else if($getMin > 15)
            {
            
              // redirect(base_url('logout'));
            }
            else
            {
                $this->LoginModel->auth_activity($user_id,1,1);
            }
            $log_status = $this->LoginModel->getUserLastLoginId($user_id)[0];
            
        }
    }
    else
    {
        setcookie('userloggedIn',"",0,"/");
        echo 1;
        exit();
    }
}
            
}