<?php
defined('BASEPATH')OR exit('direct script no access allowed');

class Manager extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->library('auth');
        if($this->auth->user_info()->role_id!=4)
        {
            redirect(base_url());
        }
    }

    public function index(){
        echo 'Sales Dashboard';
    }
}
