<?php

use Mpdf\Tag\Em;

defined('BASEPATH')OR exit('direct script no access allowed');

class Security extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        if(($this->auth->user_info()->role_id!=1) && ($this->auth->user_info()->role_id!=4))
        {
            redirect(base_url());
        }
        $this->load->model('Security_model','SecurityModel');
        $this->load->model('User_model','ManageUser');
    }
    
    public function index(){
        $data['user_detail'] = $this->auth->user_info();
        $data['title']="Security Control";
        $this->load->view('include/header',$data);
        $this->load->view('admin/security/dashboard');
        $this->load->view('include/footer',$data);
    }

    public function permission_category()
    {
        $work_status = array();
        $id = ($_GET['edit'])?base64_decode($_GET['edit']):"";
        $data['user_detail'] = $this->auth->user_info();
        $data['title']="Work List";
        $link = base_url() . "security/permission-category";
        $limit = 10;
        $segment = $this->input->get('page');
        $total_record =  $this->SecurityModel->get_permissionCat_record();
        $result = $this->SecurityModel->get_permissionCat_result($limit,$segment);
        if($id)
        {
            $permissionCat = $this->SecurityModel->getPermissionCatInfo($id)[0];
        }
        $data['permission_cat'] = $permissionCat;
        $data['edit_id']       = $id;
        $parms = array(
            'limit' => $limit,
            'segment' => $segment,
            'total_record' => $total_record,
            'result'       => $result,
            'link'         => $link
        );

        $data['pagination'] = $this->pagination_setup($parms);
        $data['result']     = $result;
        $data['segment']    = $segment;
        $data['links']    = $data['pagination']['links'];
        $this->load->view('include/header',$data);
        $this->load->view('admin/security/manage-permission-category',$data);
        $this->load->view('include/footer',$data);
    }

    public function addPermissionCategory()
    {
        $data['user_detail'] = $this->auth->user_info();  
        $this->form_validation->set_rules('title','Permission Category','required');  
        $this->form_validation->set_rules('status','Status','required');  
        $link = base_url() . "security/permission-category";
        $limit = 10;
        $segment = $this->input->get('page');
        $total_record =  $this->SecurityModel->get_permissionCat_record();
        $result = $this->SecurityModel->get_permissionCat_result($limit,$segment);
        $parms = array(
            'limit' => $limit,
            'segment' => $segment,
            'total_record' => $total_record,
            'result'       => $result,
            'link'         => $link
        );
       
        $data['pagination'] = $this->pagination_setup($parms);
        $data['result']     = $result;
        $data['segment']    = $segment;
        $data['links']    = $data['pagination']['links'];
        $title = $this->input->post('title');
        $status = $this->input->post('status');
        $created_date = date('Y-m-d,h:i:s');
        
        if($this->form_validation->run()==FALSE){        
            $data['title']="Permission Category";
            $this->load->view('include/header',$data);
            $this->load->view('admin/security/manage-permission-category');
            $this->load->view('include/footer',$data);
        }
        else
        {
        if($this->input->post('edit_id'))
        {
            $checkCat = $this->SecurityModel->checkPermissionCat($this->input->post('title'),$this->input->post('edit_id'));
            if($checkCat==false)
            {       
                
                $_SESSION['error'] = "Permission category already exist !";
                redirect(base_url().'security/permission-category?edit='.base64_encode($this->input->post('edit_id')));
            }
            else
            {
            $update = array
            (
                'title'=>$title,
                'status'=>$status,
                'mod_date'=>$created_date
            );
                   
            $permissinCat_update = $this->SecurityModel->editPermissionCat($update,$this->input->post('edit_id'));
            // log activity 
            $insert_id = $this->input->post('edit_id');
            $user_id           = $data['user_detail']->id;
            $id           = $insert_id;
            $log_title         = "Update Permission Category  - " . $title ;
            $log_create        = app_log_manage($user_id,$id,$log_title);	
            // log activity 
            if(empty($insertPermissioncat)){
                
                $_SESSION['done'] = "Permission Category Updated Successfully !";
                redirect(base_url().'security/permission-category');
            }
            else{
                
                $_SESSION['error'] = "Permission Category Not Update !";
                redirect(base_url().'security/permission-category');
            }
            }
        }
        else
        {
         $checkCat = $this->SecurityModel->checkPermissionCat($this->input->post('title'));
        
        if($checkCat==false)
        {    
            
            $_SESSION['error'] = "Permission category already exist !";
            redirect(base_url().'security/permission-category');
        }
        else
        {
            $insert = array(
            'title'=>$title,
            'status'=>$status,
            'created_date'=>$created_date
            );
          
            $insertPermissioncat = $this->SecurityModel->insertPermissionCat($insert);
            // log activity 
            $insert_id = $this->db->insert_id();
            $user_id           = $data['user_detail']->id;
            $id           = $insert_id;
            $log_title         = "Add Permission Category  - " . $title ;
            $log_create        = app_log_manage($user_id,$id,$log_title);	
            // log activity 
            if($insertPermissioncat){
                
                $_SESSION['done'] = "Permission Category Added Successfully !";
                redirect(base_url().'security/permission-category');
            }
            else{
                
                $_SESSION['error'] = "Permission Category Not Added !";
                redirect(base_url().'security/permission-category');
            }
        }
    }
    }
    }

    public function permissionCat_update_status()
    {
       $data['user_detail'] = $this->auth->user_info();  
       $permission_cat_id = $this->input->post('id','required');
       $status    = $this->input->post('status','required');
       // log activity 
       $insert_id = $permission_cat_id;
       $user_id           = $data['user_detail']->id;
       $id           = $insert_id;
       $log_title         = "Delete Permission Category id - " . $id ;
       $log_create        = app_log_manage($user_id,$id,$log_title);	
       // log activity 
       if(!empty($permission_cat_id) && !empty($status))
       {
           $this->SecurityModel->update_permissionCat_status($permission_cat_id,$status);
    
       }
    }

    public function permission_section()
    {
        
        $work_status = array();
        $id = ($_GET['edit'])?base64_decode($_GET['edit']):"";
        $data['user_detail'] = $this->auth->user_info();
        $data['title']="Work List";
        $link = base_url() . "security/permission-section";
        $limit = 10;
        $segment = $this->input->get('page');
        $total_record =  $this->SecurityModel->get_permissionSec_record();
        $result = $this->SecurityModel->get_permissionSec_result($limit,$segment);
        $category = $this->SecurityModel->getPermissionCatInfo();
        
      
        if($id)
        {
            $permissionSec = $this->SecurityModel->getPermissionSecInfo($id)[0];
        }
        $data['permission_info'] = $permissionSec;
        $data['edit_id']       = $id;
        $parms = array(
            'limit' => $limit,
            'segment' => $segment,
            'total_record' => $total_record,
            'result'       => $result,
            'link'         => $link
        );

        $data['pagination'] = $this->pagination_setup($parms);
        $data['result']     = $result;
        $data['category_list'] = $category;
        $data['segment']    = $segment;
        $data['links']    = $data['pagination']['links'];
        $this->load->view('include/header',$data);
        $this->load->view('admin/security/manage-permission-section',$data);
        $this->load->view('include/footer',$data);
    }


    public function addPermissionSection()
    {
        $data['user_detail'] = $this->auth->user_info();  
        $this->form_validation->set_rules('category','Permission Category','required'); 
        $this->form_validation->set_rules('title','Permission Section','required');  
        $this->form_validation->set_rules('status','Status','required');  
        $link = base_url() . "security/permission-category";
        $limit = 10;
        $segment = $this->input->get('page');
        $total_record =  $this->SecurityModel->get_permissionSec_record();
        $result = $this->SecurityModel->get_permissionSec_result($limit,$segment);
        $category = $this->SecurityModel->getPermissionCatInfo();
        $parms = array(
            'limit' => $limit,
            'segment' => $segment,
            'total_record' => $total_record,
            'result'       => $result,
            'link'         => $link
        );
       
        $data['pagination'] = $this->pagination_setup($parms);
        $data['result']     = $result;
        $data['category_list']     = $category;
        $data['segment']    = $segment;
        $data['links']    = $data['pagination']['links'];
        $permission_cat = $this->input->post('category');
        $title = $this->input->post('title');
        $status = $this->input->post('status');
        $created_date = date('Y-m-d,h:i:s');
        
        if($this->form_validation->run()==FALSE){        
            $data['title']="Permission Section";
            $this->load->view('include/header',$data);
            $this->load->view('admin/security/manage-permission-section');
            $this->load->view('include/footer',$data);
        }
        else
        {
        if($this->input->post('edit_id'))
        {
            $checkSec = $this->SecurityModel->checkPermissionSec($this->input->post('title'),$this->input->post('edit_id'));
            if($checkSec==false)
            {       
            
            $_SESSION['error'] = "Permission Section already exist !";
            redirect(base_url().'security/permission-section?edit='.base64_encode($this->input->post('edit_id')));
            }
            else
            {
            $update = array
            (
                'permission_cat_id' => $permission_cat,
                'title'=>$title,
                'status'=>$status,
                'mod_date'=>$created_date
            );
                   
            $permissinSec_update = $this->SecurityModel->editPermissionSec($update,$this->input->post('edit_id'));
            // log activity 
            $insert_id = $this->input->post('edit_id');
            $user_id           = $data['user_detail']->id;
            
            $id                = $insert_id;
            $log_title         = "Update Permission Section  - " . $title ;
            $log_create        = app_log_manage($user_id,$id,$log_title);	
            // log activity 
            if($permissinSec_update){                
                
                $_SESSION['done'] = "Permission Section Updated Successfully !";
                redirect(base_url().'security/permission-section');
            }
            else{
                
                $_SESSION['error'] = "Permission Section Not Update !";
                redirect(base_url().'security/permission-section');
            }
            }
        }
        else
        {
         $checkSec = $this->SecurityModel->checkPermissionSec($this->input->post('title'));
        
        if($checkSec==false)
        {       
                        
            $_SESSION['error'] = "Permission Section already exist !";
            redirect(base_url().'security/permission-section');
            
        }
        else
        {
            $insert = array(
            'permission_cat_id' => $permission_cat,
            'title'=>$title,
            'status'=>$status,
            'created_date'=>$created_date
            );
          
            $insertSection = $this->SecurityModel->insertPermissionSec($insert);
            // log activity 
            $insert_id = $this->db->insert_id();
            $user_id           = $data['user_detail']->id;
            $id           = $insert_id;
            $log_title         = "Add Permission Section  - " . $title ;
            $log_create        = app_log_manage($user_id,$id,$log_title);	
            // log activity
            if($insertSection){                
                
                $_SESSION['done'] = "Permission Section Added Successfully !";
                redirect(base_url().'security/permission-section');
            }
            else{
                
                $_SESSION['error'] = "Permission Section Not Added !";
                redirect(base_url().'security/permission-section');
            }
        }
    }
    }
    }

    public function permissionSec_update_status()
    {

       $data['user_detail'] = $this->auth->user_info();  
       $permission_section_id = $this->input->post('id','required');
       $status    = $this->input->post('status','required');
        // log activity 
        $insert_id = $permission_section_id;
        $user_id           = $data['user_detail']->id;
        $id           = $insert_id;
        $log_title         = "Delete Permission Section id - " . $id;
        $log_create        = app_log_manage($user_id,$id,$log_title);	
        // log activity 
       if(!empty($permission_section_id) && !empty($status))
       {
           $this->SecurityModel->update_permissionSec_status($permission_section_id,$status);
    
       }
    }
  
    public function manage_role()
    {
        $work_status = array();
        $id = ($_GET['edit'])?base64_decode($_GET['edit']):"";
        $data['user_detail'] = $this->auth->user_info();
        $data['title']="Manage Role";
        $link = base_url() . "security/manage-role";
        $limit = 10;
        $segment = $this->input->get('page');
        $total_record =  $this->SecurityModel->get_role_record();
        $result = $this->SecurityModel->get_role_result($limit,$segment);
        if($id)
        {
            $role_status = $this->SecurityModel->getRoleInfo($id)[0];
        }
        $data['role_status'] = $role_status;
        $data['edit_id']       = $id;
        $parms = array(
            'limit' => $limit,
            'segment' => $segment,
            'total_record' => $total_record,
            'result'       => $result,
            'link'         => $link
        );

        $data['pagination'] = $this->pagination_setup($parms);
        $data['result']     = $result;
        $data['segment']    = $segment;
        $data['links']    = $data['pagination']['links'];
        $this->load->view('include/header',$data);
        $this->load->view('admin/security/manage-role',$data);
        $this->load->view('include/footer',$data);
    }

    public function addRole()
    {
        $data['user_detail'] = $this->auth->user_info();  
        $this->form_validation->set_rules('title','Role','required');  
        $this->form_validation->set_rules('status','Status','required');  
        $link = base_url() . "security/manage-role";
        $limit = 10;
        $segment = $this->input->get('page');
        $total_record =  $this->SecurityModel->get_role_record();
        $result = $this->SecurityModel->get_role_result($limit,$segment);
        $parms = array(
            'limit' => $limit,
            'segment' => $segment,
            'total_record' => $total_record,
            'result'       => $result,
            'link'         => $link
        );
       
        $data['pagination'] = $this->pagination_setup($parms);
        $data['result']     = $result;
        $data['segment']    = $segment;
        $data['links']    = $data['pagination']['links'];
        $title = $this->input->post('title');
        $status = $this->input->post('status');
        $created_date = date('Y-m-d,h:i:s');
        
        if($this->form_validation->run()==FALSE){        
            $data['title']="Manage role";
            $this->load->view('include/header',$data);
            $this->load->view('admin/security/manage-role');
            $this->load->view('include/footer',$data);
        }
        else
        {
        if($this->input->post('edit_id'))
        {
            $checkCat = $this->SecurityModel->checkPermissionCat($this->input->post('title'),$this->input->post('edit_id'));
            // log activity 
           $insert_id = $this->input->post('edit_id');
           $user_id           = $data['user_detail']->id;
           $id           = $insert_id;
           $log_title         = "Update Role  - " . $title ;
           $log_create        = app_log_manage($user_id,$id,$log_title);	
           // log activity 
            if($checkCat==false)
            {       
            
            $_SESSION['error'] = "Permission category already exist !";
            redirect(base_url().'security/permission-category?edit='.base64_encode($this->input->post('edit_id')));      
            }
            else
            {
            $update = array
            (
                'title'=>$title,
                'status'=>$status,
                'mod_date'=>$created_date
            );
                   
            $permissinCat_update = $this->SecurityModel->editPermissionCat($update,$this->input->post('edit_id'));
            if($permissinCat_update){                
                
                $_SESSION['done'] = "Permission Category Updated Successfully !";
                redirect(base_url().'security/permission-category');
            }
            else{
                
                $_SESSION['error'] = "Permission Category Not Update !";
                redirect(base_url().'security/permission-category');
            }
            }
        }
        else
        {
         $checkRole = $this->SecurityModel->checkRole($this->input->post('title'));
        
        if($checkRole==false)
        {   
            
            $_SESSION['error'] = "Role already exist !";
            redirect(base_url().'security/manage-role');    
            
        }
        else
        {
            $insert = array(
            'title'=>$title,
            'status'=>$status,
            'created_date'=>$created_date
            );
          
          $insertRole = $this->SecurityModel->insertRole($insert);
            // log activity 
           $insert_id = $this->db->insert_id();
           $user_id           = $data['user_detail']->id;
           $id           = $insert_id;
           $log_title         = "Add Role  - " . $title ;
           $log_create        = app_log_manage($user_id,$id,$log_title);	
           // log activity 
            if($insertRole){                
                
                $_SESSION['done'] = "Role Added Successfully !";
                redirect(base_url().'security/manage-role');
            }
            else{
                
                $_SESSION['error'] = "Role Not Added !";
                redirect(base_url().'security/manage-role');
            }
        }
    }
    }
    }

    public function role_update_status()
    {
       $data['user_detail'] = $this->auth->user_info();  
       $role_id = $this->input->post('id','required');
       $status    = $this->input->post('status','required');
       // log activity 
       $insert_id = $role_id;
       $user_id           = $data['user_detail']->id;
       $id           = $insert_id;
       $log_title         = "Delete Role id - " . $id ;
       $log_create        = app_log_manage($user_id,$id,$log_title);	
       // log activity 
       if(!empty($role_id) && !empty($status))
       {
           $this->SecurityModel->updateRolestatus($role_id,$status);
    
       }
    }

    public function manage_permission_role()
    {
        $work_status = array();
        $id = ($_GET['role_id'])?base64_decode($_GET['role_id']):"";
        if(empty($id))
        {
            redirect(base_url('security/manage-role'));
        }
        $data['user_detail'] = $this->auth->user_info();
        $data['title']="Work List";
        $link = base_url() . "security/manage_work_status";
        $limit = 10;
        $segment = $this->input->get('page');
        $role_list = $this->ManageUser->getRole();
        $getCatPermission = $this->SecurityModel->getCatPermission();
        $getRolePermission = $this->SecurityModel->getRolePermission($id);
        
       
        $result = $this->SecurityModel->get_permissionCat_result($limit,$segment);
        
        $data['exist_permission'] = $getRolePermission;
        $data['role_id']       = $id;
        $data['role_list']     =  $role_list;
        $data['result']     = $getCatPermission;
      
        $this->load->view('include/header',$data);
        $this->load->view('admin/security/manage-permission-role',$data);
        $this->load->view('include/footer',$data);
    }

    public function app_log()
    {
        
		// $data['result'] = $this->SecurityModel->getLogList();
        
        $data['user_detail'] = $this->auth->user_info();
        $data['title'] = "App Log Record";
        // $data['active1'] = "Active";
        $link = base_url() . "security/log-system";
        $limit =15;
        $segment = $this->input->get('page');
        // $total_record =  $this->SecurityModel->get_count_log();
        // $result = $this->SecurityModel->get_result_log($limit, $segment);
        // $parms = array(
        //     'limit' => $limit,
        //     'segment' => $segment,
        //     'total_record' => $total_record,
        //     'result'       => $result,
        //     'link'         => $link
        // );
     
        if (!empty($this->input->get('s'))) {
            $total_record =  $this->SecurityModel->get_count_search_log($this->input->get('s'));
           
        }elseif(!empty($this->input->get('date'))){
            $total_record =  $this->SecurityModel->get_count_date_log($this->input->get('date'));
        }
         else {    
            $total_record =  $this->SecurityModel->get_count_log();            
        }
        if (!empty($this->input->get('s'))) {
            $result = $this->SecurityModel->get_result_search_log($limit, $segment, $this->input->get('s'));
        }elseif(!empty($this->input->get('date'))){
            $result = $this->SecurityModel->get_result_date_log($limit, $segment, $this->input->get('date'));
        }
         else {
            $result = $this->SecurityModel->get_result_log($limit, $segment);
        }
        $parms = array(
            'limit' => $limit,
            'segment' => $segment,
            'total_record' => $total_record,
            'result'       => $result,
            'link'         => $link
        );
        
        $data['pagination'] = $this->pagination_setup($parms);
        $data['result']   =  $result;
        $data['segment']    = $segment;
        $data['links']    = $data['pagination']['links'];
		$this->load->view('include/header',$data);
		$this->load->view('admin/security/app_log_list');
		$this->load->view('include/footer',$data);
    }

    public function UpdatePermissionRole()
    {
        $this->form_validation->set_rules('user_role','Role','required'); 
        $work_status = array();
        $id = ($_GET['edit'])?base64_decode($_GET['edit']):"";
        $data['user_detail'] = $this->auth->user_info();
        $data['title']="Work List";
        $link = base_url() . "security/manage_work_status";
        $limit = 10;
        $segment = $this->input->get('page');
        $role_list = $this->ManageUser->getRole();
        $getRolePermission = $this->SecurityModel->getCatPermission();
        
        
        $total_record =  $this->SecurityModel->get_permissionCat_record();
        $result = $this->SecurityModel->get_permissionCat_result($limit,$segment);
        if($id)
        {
            $permissionCat = $this->SecurityModel->getPermissionCatInfo($id)[0];
        }
        $data['permission_cat'] = $permissionCat;
        $data['edit_id']       = $id;
        $data['role_list']     =  $role_list;
        $parms = array(
            'limit' => $limit,
            'segment' => $segment,
            'total_record' => $total_record,
            'result'       => $result,
            'link'         => $link
        );

        $data['pagination'] = $this->pagination_setup($parms);
        $data['result']     = $getRolePermission;
        $data['segment']    = $segment;
        if($this->form_validation->run()==FALSE){   
        
        $data['links']    = $data['pagination']['links'];
        $this->load->view('include/header',$data);
        $this->load->view('admin/security/manage-permission-role',$data);
        $this->load->view('include/footer',$data);     
        }
        else
        {
        $role       = $this->input->post('user_role');   
        $permission = $this->input->post('permission_id');  
        $all_section_id = $this->input->post('section_id');
       
        $this->SecurityModel->updatePermissionRole($role,$permission,$all_section_id);
        $this->session->set_flashdata('done','Permission Role Updated Successfully !');
        redirect(base_url().'security/manage-role');
         
        }
        
    } 

    public function pagination_setup($parms)
    {
        $config['base_url'] = $parms['link'];
        $config['total_rows'] = $parms['total_record'];
        $config['per_page'] = $parms['limit'];
        $config["uri_segment"] = $parms['segment'];

        //config for bootstrap pagination class integration
        // $config['enable_query_strings']= true;
		// $config['use_page_numbers']= true;
		$config['page_query_string'] = true;
		$config['query_string_segment'] = 'page';
		$config['reuse_query_string']= true;
        
		$config['full_tag_open']= '<nav aria-label="Page navigation example " class="float-end"><ul class="pagination float-end pe-2">';
		$config['full_tag_close']= '</ul></nav>';

		$config['first_tag_open']=  '<li class="page-item"> <span class="page-link" href="#">';
		$config['first_tag_close'] = '</span></li>';

		$config['prev_link']= '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		
        $config['next_link']= '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close'] = '</span></li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="'.base_url('security/log-system').'">';
		$config['cur_tag_close'] = '</a></li>';
		
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>'; 
        
        //config for bootstrap pagination class integration close
   
        $this->pagination->initialize($config);
        $data['page'] = $parms['segment'];
        $data["links"] = $this->pagination->create_links();
        return $data;
    }



}