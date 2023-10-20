<?php
defined('BASEPATH')OR exit('direct script no access allowed');

class MassEmail extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->library('auth');
        if(($this->auth->user_info()->role_id!=1) && ($this->auth->user_info()->role_id!=4) && ($this->auth->user_info()->role_id!=2))
        {
            redirect(base_url());
        }
        
    }

    public function index(){
        
        $data['user_detail'] = $this->auth->user_info();
        $data['title'] = "List Mass Email";
        $data['active'] = "Active";
        $this->load->view('include/header',$data);
        $this->load->view('massemail/list',$data);
        $this->load->view('include/footer',$data);
    }

    public function create(){
        
        $data['user_detail'] = $this->auth->user_info();
        $data['title'] = "Send Mass Email";
        $data['active'] = "Active";
        $this->load->view('include/header',$data);
        $this->load->view('massemail/create',$data);
        $this->load->view('include/footer',$data);
    }


   
    
}
