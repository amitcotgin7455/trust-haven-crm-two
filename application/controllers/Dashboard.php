<?php
defined('BASEPATH')OR exit('direct script no access allowed');

class Dashboard extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        if(($this->auth->user_info()->role_id!=1) && ($this->auth->user_info()->role_id!=4))
        {
            redirect(base_url());
        }
    }

    public function index(){
        
        $data['title']="Dashboard";
        $this->load->view('include/header',$data);
        $this->load->view('login/dashboard',$data);
        $this->load->view('include/footer',$data);

    }

}
