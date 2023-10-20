<?php
defined('BASEPATH') OR die('direct script no access allowed');

class Custom404 extends CI_Controller{
    function __construct()
    {
        parent:: __construct();
        $this->load->library('auth');
        $this->load->model('Invoice_model');
    }
    public function index(){
        $data['user_detail'] = $this->auth->user_info();
        $date['title']="Page Not Found 404";
        $this->load->view('include/header',$data);
        $this->load->view('custom404',$data);
        $this->load->view('include/footer',$data);

    }

}