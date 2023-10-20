<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Builder extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('auth');
        if(($this->auth->user_info()->role_id!=1) && ($this->auth->user_info()->role_id!=4) && ($this->auth->user_info()->role_id!=2))
        {
            redirect(base_url());
        }
    }

	
    public function tempheader()
	{	
        $data['user_detail'] = $this->auth->user_info();
        $id = $data['user_detail']->id; 
        $data['role_id'] = $data['user_detail']->role_id; 
        $data['name'] = $data['user_detail']->name;
        $data['user_role'] = $data['user_detail']->role_type;
		$data['active'] = 'active';
		$data['title'] = 'Lead List';
		$this->load->view('include/header',$data);
		$this->load->view('builder/newsletter',$data);
		$this->load->view('include/footer',$data);
		  
	}

 
    public function second_template()
	{	
        $data['user_detail'] = $this->auth->user_info();
        $id = $data['user_detail']->id; 
        $data['role_id'] = $data['user_detail']->role_id; 
        $data['name'] = $data['user_detail']->name;
        $data['user_role'] = $data['user_detail']->role_type;
		$data['active'] = 'active';
		$data['title'] = 'Lead List';
		$this->load->view('include/header',$data);
		$this->load->view('builder/newsletter1',$data);
		$this->load->view('include/footer',$data);
		  
	}
    public function third_template()
	{	
        
        $data['user_detail'] = $this->auth->user_info();
        $id = $data['user_detail']->id; 
        $data['role_id'] = $data['user_detail']->role_id; 
        $data['name'] = $data['user_detail']->name;
        $data['user_role'] = $data['user_detail']->role_type;
		$data['active'] = 'active';
		$data['title'] = 'Lead List';
		$this->load->view('include/header',$data);
		$this->load->view('builder/newsletter2',$data);
		$this->load->view('include/footer',$data);
		  
	}
    public function blank()
	{	
        $data['user_detail'] = $this->auth->user_info();
        $id = $data['user_detail']->id; 
        $data['role_id'] = $data['user_detail']->role_id; 
        $data['name'] = $data['user_detail']->name;
        $data['user_role'] = $data['user_detail']->role_type;
		$data['active'] = 'active';
		$data['title'] = 'Lead List';
		$this->load->view('include/header',$data);
		$this->load->view('builder/blank',$data);
		$this->load->view('include/footer',$data);
		  
	}
	
}