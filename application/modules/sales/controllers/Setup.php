<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('auth');
        if(($this->auth->user_info()->role_id!=1) && ($this->auth->user_info()->role_id!=4) && ($this->auth->user_info()->role_id!=2))
        {
            redirect(base_url());
        }
        $this->load->model('Template_model');
    }
    
    public function template()
	{	
        $data['user_detail'] = $this->auth->user_info();
        $id = $data['user_detail']->id; 
        $data['role_id'] = $data['user_detail']->role_id; 
        $data['name'] = $data['user_detail']->name;
        $data['user_role'] = $data['user_detail']->role_type;
		$data['title'] = 'List Template';
        if ($data['user_detail']->role_id == 1 || $data['user_detail']->role_id == 4) {
            $data['template'] = $this->Template_model->GetAdminResult();        
        }else{
            $data['template'] = $this->Template_model->GetUserResult($id);
        }
		$this->load->view('include/header',$data);
		$this->load->view('setup/template',$data);
		$this->load->view('include/footer',$data);
		
	}
    
    public function list_template()
	{	
        $data['user_detail'] = $this->auth->user_info();
        $id = $data['user_detail']->id; 
        $data['role_id'] = $data['user_detail']->role_id; 
        $data['name'] = $data['user_detail']->name;
        $data['user_role'] = $data['user_detail']->role_type;
		$data['active'] = 'active';
		$data['title'] = 'Lead List';
		$this->load->view('include/header',$data);
		$this->load->view('sales/setup/list_template',$data);
		$this->load->view('include/footer',$data);
		
	}
 

    public function savemtemplate(){
        
        $data['user_detail'] = $this->auth->user_info();
        $id = $data['user_detail']->id; 
        $template_name  = $this->input->post('template_name');
        $module_name  = $this->input->post('module_name');
        $template_code  = $this->input->post('template_code');
        $template_subject  = $this->input->post('template_subject');    
        $insert = array(
        'user_id'=>$id,
        'created_at' => date('Y-m-d h:i:s'),
        'template_name'=>$template_name,
        'template_code'=>$template_code,
        'module_name'=>$module_name,
        'template_subject'=>$template_subject,
        );
        $res = $this->Template_model->insertData($insert);
        if (!empty($res)) {
            $this->session->set_flashdata('done', 'Template Save successfully');
            redirect(base_url().'sales/setup/list_template');
        } else {
            $this->session->set_flashdata('error', 'Template Not Save successfully');
            redirect(base_url().'sales/setup/list_template');
       }
    }

    public function deleteTemplate(){

        $id = $this->input->get('id');
        $idG = base64_decode($id);
        $returnid = $this->Template_model->deleteRecord($idG);
        if ($returnid) {
           $this->session->set_flashdata('done', 'Email Template Successfully Deleted...!');
            redirect(base_url().'sales/setup/list_template');

       } else {
           $this->session->set_flashdata('error', 'Email Template Not Deleted. Please Try Again...!');
            redirect(base_url().'sales/setup/list_template');

       }
    }
        
}