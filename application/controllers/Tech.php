<?php
defined('BASEPATH') OR exit('direct script no access allowed');

class Tech extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->library('auth');
        if($this->auth->user_info()->role_id!=3)
        {
            redirect(base_url());
        }
    }

    public function index(){
        $data['user_detail'] = $this->auth->user_info();
        $data['active'] = "Active";
        $data['title'] = "Tech Dashboard";
        $this->load->view('include/header',$data);
        $this->load->view('include/footer',$data);
    }
}
