<?php

defined('BASEPATH') OR exit('direct script no access allow !');



class Logout extends CI_Controller

{

    public function __construct()

    {



        parent::__construct();

        $this->load->library('auth');

        if(empty($this->session->userdata('isloggedIn')))

        {

            redirect(base_url());

        }

        $this->load->model('Login_model','LoginModel');

        



    }

    public function logout()

    {   

        // log activity 

        // if(isset($_COOKIE['userloggedIn']))

        // {

        //     setcookie("userloggedIn","", time()-3600, "/");

        //     unset($_COOKIE['userloggedIn']);

          

        // }

        $data['user_detail'] = $this->auth->user_info();

        $this->LoginModel->updateLogoutActivity($_COOKIE,3);

        $insert_id = $data['user_detail']->id;

        $user_id           = $data['user_detail']->id;

        $id                = $insert_id;

        $log_title         = "Logout User Name  - " .$data['user_detail']->username ;

        $log_create        = app_log_manage($user_id,$id,$log_title);

      

        $this->LoginModel->auth_activity($user_id,3);

        

        // log activity  

        $this->session->sess_destroy('isloggedIn');

        redirect(base_url());

    }

}

