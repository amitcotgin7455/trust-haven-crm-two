<?php
defined('BASEPATH')OR exit('direct script no access allowed');

class Sales extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->library('auth');
        if($this->auth->user_info()->role_id!=2)
        {
            redirect(base_url());
        }
        $this->load->model('Lead_model','Lead');

    }

    public function index(){
        $data['user_detail'] = $this->auth->user_info();
        $data['active'] = "Active";
        $user_id = $data['user_detail']->id;
        $data['open_lead'] = $this->Lead->getLeadListSales(1,$user_id);
        $data['close_lead'] = $this->Lead->getLeadListSales(2,$user_id);
        $data['title'] = "Sales Dashboard";
        $this->load->view('include/header',$data);
        $this->load->view('admin/dashboard',$data);
        $this->load->view('include/footer',$data);
    }
}
