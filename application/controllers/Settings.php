<?php
defined('BASEPATH')OR exit('direct script no access allowed');

class Settings extends CI_Controller{

    public function __construct(){  
        parent::__construct();
        $this->load->library('auth');
        if(($this->auth->user_info()->role_id!=1) && ($this->auth->user_info()->role_id!=4))
        {
            redirect(base_url());
        }
    }

    public function index(){
        $data['user_detail'] = $this->auth->user_info();
        $data['title']="Settings";
        $this->load->view('include/header',$data);
        $this->load->view('settings/index');
        $this->load->view('include/footer',$data);
        }

}
