<?php
defined('BASEPATH')OR exit('direct script no access allowed');
class Custom_field extends CI_Controller{
    public function __construct(){  
        parent:: __construct();
        $this->load->library('auth');
        if(($this->auth->user_info()->role_id!=1) && ($this->auth->user_info()->role_id!=4))
        {
            redirect(base_url());
        }
        $this->load->model('Login_model','LoginModel');
        $this->load->model('Module_model','ManageModule');
    }
    public function index(){
        $data['user_detail'] = $this->auth->user_info();
        $remote_record = $this->ManageModule->getRemoteInfo();
        $sale_record = $this->ManageModule->getSaleInfo();
        $work_status = $this->ManageModule->getWorkInfo();
        $data['remote_list'] = $remote_record;
        $data['sale_list'] = $sale_record;
        $data['work_status']  = $work_status;
        $data['title']="Module Management";
        $this->load->view('include/header',$data);
        $this->load->view('admin/modules/dashboard');
        $this->load->view('include/footer',$data);
        }
    public function manage_remote_status(){
        $remote_status = array();
        $id = ($_GET['edit'])?base64_decode($_GET['edit']):"";
        $data['user_detail'] = $this->auth->user_info();
        $data['title']="Remote List";
        $link = base_url() . "custom_field/manage_remote_status";
        $limit = 10;
        $segment = $this->input->get('page');
        $total_record =  $this->ManageModule->get_remote_status_record();
        $result = $this->ManageModule->get_remote_result($limit,$segment);
        if($id)
        {
            $remote_status = $this->ManageModule->getRemoteInfo($id)[0];
        }
        $data['remote_status'] = $remote_status;
        $data['edit_id']       = $id;
        $parms = array(
            'limit' => $limit,
            'segment' => $segment,
            'total_record' => $total_record,
            'result'       => $result,
            'link'         => $link
        );
         echo $this->session->flashdata('success').'<br>';
        $data['pagination'] = $this->pagination_setup($parms);
        $data['result']     = $result;
        $data['segment']    = $segment;
        $data['links']    = $data['pagination']['links'];
        $this->load->view('include/header',$data);
        $this->load->view('admin/remote/remote',$data);
        $this->load->view('include/footer',$data);
    }
    public function addRemote(){
        $data['user_detail'] = $this->auth->user_info(); 
        $this->form_validation->set_rules('title','Remote Name','required');  
        $link = base_url() . "custom_field/manage_remote_status";
        $limit = 10;
        $segment = $this->input->get('page');
        $total_record =  $this->ManageModule->get_remote_status_record();
        $result = $this->ManageModule->get_remote_result($limit,$segment);
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
            $data['title']="Remote List";
            $this->load->view('include/header',$data);
            $this->load->view('admin/remote/remote');
            $this->load->view('include/footer',$data);
        }
        else
        {
        if($this->input->post('edit_id'))
        {
            $checkRemoteTitle = $this->ManageModule->checkRemoteTitle($this->input->post('title'),$this->input->post('edit_id'));
            if($checkRemoteTitle==false)
            {       
                    $_SESSION['error'] = "Remote name already exist !";
                    redirect(base_url().'custom_field/remote-list?edit='.base64_encode($this->input->post('edit_id')));
            }
            else
            {
            $update = array
            (
                'title'=>$title,
                'status'=>$status,
                'mod_date'=>$created_date
            );
                   
            $remote_update = $this->ManageModule->editRemote($update,$this->input->post('edit_id'));
            // log activity 
            $insert_id = $this->input->post('edit_id');
            $user_id           = $data['user_detail']->id;
            $id           = $insert_id;
            $log_title         = "Update Remote Title - " . $title ;
            $log_create        = app_log_manage($user_id,$id,$log_title);	
            // log activity
            if ($remote_update) {  
                
                $_SESSION['done'] = "Remote Name Updated Successfully !";
                redirect(base_url().'custom_field/manage_remote_status');
            } else {
                
                $_SESSION['error'] = "Remote Name Not Updated !";
                redirect(base_url().'custom_field/manage_remote_status');
            }
            }
        }
        else
        {
         $checkRemoteTitle = $this->ManageModule->checkRemoteTitle($this->input->post('title'));
        
        if($checkRemoteTitle==false)
        {   
            $_SESSION['error'] = "Remote Name Already Exist !";
            redirect(base_url().'custom_field/manage_remote_status');
        }
        else
        {
           
            $insert = array(
            'title'=>$title,
            'status'=>$status,
            'created_date'=>$created_date
            );
            
            $addRemote = $this->ManageModule->insertRemote($insert);
            // log activity 
            $insert_id = $this->db->insert_id();
            $user_id           = $data['user_detail']->id;
            $id           = $insert_id;
            $log_title         = "Add Remote Title - " . $title ;
            $log_create        = app_log_manage($user_id,$id,$log_title);	
            // log activity 
            if ($addRemote) {  
                
                $_SESSION['done'] = "Remote Name Added Successfully !";
                redirect(base_url().'custom_field/manage_remote_status');
            } else {
                
                $_SESSION['error'] = "Remote Name Not Added !";
                redirect(base_url().'custom_field/manage_remote_status');
            }
        }
    }
    }
    }
    public function remote_update_status()
    {
       $data['user_detail'] = $this->auth->user_info(); 
       $remote_id = $this->input->post('id','required');
       $status    = $this->input->post('status','required');
       // log activity 
       $insert_id = $this->input->post('id');
       $user_id           = $data['user_detail']->id;
       $id           = $insert_id;
       $log_title         = "Delete Remote Title id - " . $id ;
       $log_create        = app_log_manage($user_id,$id,$log_title);	
       // log activity
       if(!empty($remote_id) && !empty($status))
       {
           $this->ManageModule->update_remote_status($remote_id,$status);
    
       }
    }
    public function manage_sale_status(){
        $sale_status = array();
        $id = ($_GET['edit'])?base64_decode($_GET['edit']):"";
        $data['user_detail'] = $this->auth->user_info();
        $data['title']="Sale List";
        $link = base_url() . "modules/manage_sale_status";
        $limit = 10;
        $segment = $this->input->get('page');
        $total_record =  $this->ManageModule->get_sale_status_record();
        $result = $this->ManageModule->get_sale_result($limit,$segment);
        if($id)
        {
            $sale_status = $this->ManageModule->getSaleInfo($id)[0];
        }
        $data['sale_status'] = $sale_status;
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
        $this->load->view('admin/sales/sale-status',$data);
        $this->load->view('include/footer',$data);
    }
    public function addSale(){
        $data['user_detail'] = $this->auth->user_info();  
        $this->form_validation->set_rules('title','Sale Name','required');  
        $link = base_url() . "modules/sale-status-list";
        $limit = 10;
        $segment = $this->input->get('page');
        $total_record =  $this->ManageModule->get_sale_status_record();
        $result = $this->ManageModule->get_sale_result($limit,$segment);
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
            $data['title']="Sale Status List";
            $this->load->view('include/header',$data);
            $this->load->view('admin/sales/sale-status');
            $this->load->view('include/footer',$data);
        }
        else
        {
        if($this->input->post('edit_id'))
        {
            $checkSalesTitle = $this->ManageModule->checkSaleTitle($this->input->post('title'),$this->input->post('edit_id'));
            if($checkSalesTitle==false)
            {       
                
                $_SESSION['error'] = "Sale name already exist !";
                redirect(base_url().'custom_field/sale-status-list?edit='.base64_encode($this->input->post('edit_id')));
            }
            else
            {
            $update = array
            (
                'title'=>$title,
                'status'=>$status,
                'mod_date'=>$created_date
            );
            // log activity 
            $insert_id = $this->input->post('edit_id');
            $user_id           = $data['user_detail']->id;
            $id           = $insert_id;
            $log_title         = "Update Sale Title - " . $title ;
            $log_create        = app_log_manage($user_id,$id,$log_title);	
            // log activity      
            $sale_update = $this->ManageModule->editSaleStatus($update,$this->input->post('edit_id'));
            if ($sale_update) {  
                
                $_SESSION['done'] = "Sale Name Updated Successfully !";
                redirect(base_url().'custom_field/manage_sale_status');
            } else {
                
                $_SESSION['error'] = "Sale Name Not Updated !";
                redirect(base_url().'custom_field/manage_sale_status');
            }
            }
        }
        else
        {
         $checkSalesTitle = $this->ManageModule->checkSaleTitle($this->input->post('title'));
        
        if($checkSalesTitle==false)
         {
            
            $_SESSION['error'] = "Sale name already exist !";
            redirect(base_url().'custom_field/manage_sale_status');
         }
         else
         {
            $insert = array(
            'title'=>$title,
            'status'=>$status,
            'created_date'=>$created_date
            );
          
            $insertSale = $this->ManageModule->insertSale($insert);
            // log activity 
            $insert_id = $this->db->insert_id();
            $user_id           = $data['user_detail']->id;
            $id           = $insert_id;
            $log_title         = "Add Sale Title - " . $title ;
            $log_create        = app_log_manage($user_id,$id,$log_title);	
            // log activity 
            if ($insertSale) {  
                
                $_SESSION['done'] = "Sale Name Added Successfully !";
                redirect(base_url().'custom_field/manage_sale_status');
            } else {
                
                $_SESSION['error'] = "Sale Name Not Added !";
                redirect(base_url().'custom_field/manage_sale_status');
            }
        }
    }
    }
    }
    public function sale_update_status()
    {
        
       $data['user_detail'] = $this->auth->user_info(); 
       $sale_id = $this->input->post('id','required');
       $status    = $this->input->post('status','required');
       // log activity 
       $insert_id = $this->input->post('id');
       $user_id           = $data['user_detail']->id;
       $id           = $insert_id;
       $log_title         = "Delete Sale Title id - " . $id ;
       $log_create        = app_log_manage($user_id,$id,$log_title);	
       // log activity   
       if(!empty($sale_id) && !empty($status))
       {
           $this->ManageModule->update_sale_status($sale_id,$status);
    
       }
    }
    public function manage_work_status(){
        $work_status = array();
        $id = ($_GET['edit'])?base64_decode($_GET['edit']):"";
        $data['user_detail'] = $this->auth->user_info();
        $data['title']="Work List";
        $link = base_url() . "modules/manage_work_status";
        $limit = 10;
        $segment = $this->input->get('page');
        $total_record =  $this->ManageModule->get_work_status_record();
        $result = $this->ManageModule->get_work_result($limit,$segment);
        if($id)
        {
            $work_status = $this->ManageModule->getWorkInfo($id)[0];
        }
        $data['work_status'] = $work_status;
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
        $this->load->view('admin/work/manage-work',$data);
        $this->load->view('include/footer',$data);
    }
    public function addWork(){
        $data['user_detail'] = $this->auth->user_info();  
        $this->form_validation->set_rules('title','Work Name','required');  
        $link = base_url() . "modules/worked-status-list";
        $limit = 10;
        $segment = $this->input->get('page');
        $total_record =  $this->ManageModule->get_work_status_record();
        $result = $this->ManageModule->get_work_result($limit,$segment);
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
            $data['title']="Work Status List";
            $this->load->view('include/header',$data);
            $this->load->view('admin/work/manage-work');
            $this->load->view('include/footer',$data);
        }
        else
        {
        if($this->input->post('edit_id'))
        {
            $checkWorkTitle = $this->ManageModule->checkWorkTitle($this->input->post('title'),$this->input->post('edit_id'));
            if($checkWorkTitle==false)
            {       
                    $_SESSION['error'] = "Work Name Already Exist !";
                    redirect(base_url().'custom_field/worked-status-list?edit='.base64_encode($this->input->post('edit_id')));
            }
            else
            {
            $update = array
            (
                'title'=>$title,
                'status'=>$status,
                'mod_date'=>$created_date
            );
                   
            $work_update = $this->ManageModule->editWorkStatus($update,$this->input->post('edit_id'));
            // log activity 
            $insert_id = $this->input->post('edit_id');
            $user_id           = $data['user_detail']->id;
            $id           = $insert_id;
            $log_title         = "Update Work Title - " . $title ;
            $log_create        = app_log_manage($user_id,$id,$log_title);	
            // log activity      
            if ($work_update) {  
                
                $_SESSION['done'] = "Work Name Updated Successfully !";
                redirect(base_url().'custom_field/manage_work_status');
            } else {
                
                $_SESSION['error'] = "Work Name Not Updated !";
                redirect(base_url().'custom_field/manage_work_status');
            }
            }
        }
        else
        {
         $checkWorkTitle = $this->ManageModule->checkWorkTitle($this->input->post('title'));
        
        if($checkWorkTitle==false)
        {   
            $_SESSION['error'] = "Work Name Already Exist !";
            redirect(base_url().'custom_field/manage_work_status');
            
        }
        else
        {
            $insert = array(
            'title'=>$title,
            'status'=>$status,
            'created_date'=>$created_date
            );
          
            $insertWork = $this->ManageModule->insertWork($insert);
            // log activity 
            $insert_id = $this->db->insert_id();
            $user_id           = $data['user_detail']->id;
            $id           = $insert_id;
            $log_title         = "Add Work Title - " . $title ;
            $log_create        = app_log_manage($user_id,$id,$log_title);	
            // log activity 
            if ($insertWork) {  
                
                $_SESSION['done'] = "Work Name Added Successfully !";
                redirect(base_url().'custom_field/manage_work_status');
            } else {
                
                $_SESSION['error'] = "Work Name Not Added !";
                redirect(base_url().'custom_field/manage_work_status');
            }
        }
    }
    }
    }
    public function work_update_status()
    {
        
        $data['user_detail'] = $this->auth->user_info(); 
       $work_id = $this->input->post('id','required');
       $status    = $this->input->post('status','required');
       // log activity 
       $insert_id = $this->input->post('id');
       $user_id           = $data['user_detail']->id;
       $id           = $insert_id;
       $log_title         = "Delete Work Title id - " . $id ;
       $log_create        = app_log_manage($user_id,$id,$log_title);	
       // log activity 
       if(!empty($work_id) && !empty($status))
       {
           $this->ManageModule->update_work_status($work_id,$status);
    
       }
    }

    public function plan(){
        $plan_status = array();
        $id = ($_GET['edit'])?base64_decode($_GET['edit']):"";
        // echo 39939; die;
        $data['user_detail'] = $this->auth->user_info();
        $data['title']="Plan List";
        $link = base_url() . "modules/plan";
        $limit = 10;
        $segment = $this->input->get('page');
        $total_record =  $this->ManageModule->get_plan_record();
        $result = $this->ManageModule->get_plan_result($limit,$segment);
        if($id)
        {
            $plan_status = $this->ManageModule->getPlanInfo($id)[0];
            // prx($plan_status);
        }
        $data['plan_status'] = $plan_status;
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
        $this->load->view('admin/plan/plan',$data);
        $this->load->view('include/footer',$data);
    }
    public function addplan(){
        $data['user_detail'] = $this->auth->user_info();  
        $this->form_validation->set_rules('title','Plan Name','required');  
        $this->form_validation->set_rules('days','Days','required');  
        $link = base_url() . "modules/plan";
        $limit = 10;
        $segment = $this->input->get('page');
        $total_record =  $this->ManageModule->get_plan_record();
        $result = $this->ManageModule->get_plan_result($limit,$segment);
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
        $days = $this->input->post('days');
        $status = $this->input->post('status');
        $created_date = date('Y-m-d,h:i:s');
        
        if($this->form_validation->run()==FALSE){        
            $data['title']="Work Plan List";
            $this->load->view('include/header',$data);
            $this->load->view('admin/plan/plan');
            $this->load->view('include/footer',$data);
        }
        else
        {
        if($this->input->post('edit_id'))
        {
            $checkPlanTitle = $this->ManageModule->checkplanTitle($this->input->post('title'),$this->input->post('edit_id'));
            if($checkPlanTitle==false)
            {       
                    $_SESSION['error'] = "Plan Already Exist !";
                    redirect(base_url().'custom_field/plan?edit='.base64_encode($this->input->post('edit_id')));
            }
            else
            {
            $update = array
            (
                'title'=>$title,
                'days'=>$days,
                'status'=>$status,
                'mod_date'=>$created_date
            );
                   
            $plan_update = $this->ManageModule->editPlanStatus($update,$this->input->post('edit_id'));
            // log activity 
            $insert_id = $this->input->post('edit_id');
            $user_id           = $data['user_detail']->id;
            $id           = $insert_id;
            $log_title         = "Update Plan Title - " . $title ;
            $log_create        = app_log_manage($user_id,$id,$log_title);	
            // log activity      
            if ($plan_update) {  
                
                $_SESSION['done'] = "Plan Updated Successfully !";
                redirect(base_url().'custom_field/plan');
            } else {
                
                $_SESSION['error'] = "Plan Not Updated !";
                redirect(base_url().'custom_field/plan');
            }
            }
        }
        else
        {
         $checkPlanTitle = $this->ManageModule->checkplanTitle($this->input->post('title'));
        
        if($checkPlanTitle==false)
        {   
            $_SESSION['error'] = "Plan Already Exist !";
            redirect(base_url().'custom_field/plan');
            
        }
        else
        {
            $insert = array(
            'title'=>$title,
            'days'=>$days,
            'status'=>$status,
            'created_date'=>$created_date
            );
          
            $insertPlan = $this->ManageModule->insertPlan($insert);
            // log activity 
            $insert_id = $this->db->insert_id();
            $user_id           = $data['user_detail']->id;
            $id           = $insert_id;
            $log_title         = "Add Plan  - " . $title ;
            $log_create        = app_log_manage($user_id,$id,$log_title);	
            // log activity 
            if ($insertPlan) {  
                
                $_SESSION['done'] = "Plan Added Successfully !";
                redirect(base_url().'custom_field/plan');
            } else {
                
                $_SESSION['error'] = "Plan Not Added !";
                redirect(base_url().'custom_field/plan');
            }
        }
    }
    }
    }

    public function plan_update_status()
    {
        
       $data['user_detail'] = $this->auth->user_info(); 
       $work_id = $this->input->post('id','required');
       $status    = $this->input->post('status','required');
       // log activity 
       $insert_id = $this->input->post('id');
       $user_id           = $data['user_detail']->id;
       $id           = $insert_id;
       $log_title         = "Delete Plan  id - " . $id ;
       $log_create        = app_log_manage($user_id,$id,$log_title);	
       // log activity 
       if(!empty($work_id) && !empty($status))
       {
           $this->ManageModule->update_plan_status($work_id,$status);
    
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
		$config['first_tag_open']=  '<li class="page-item"> <span class="page-link" >';
		$config['first_tag_close'] = '</li>';
		$config['prev_link']= '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		
        $config['next_link']= '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="'.base_url('list-lead    ').'">';
		$config['cur_tag_close'] = '</a></li>';
		
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</li>'; 
        
        //config for bootstrap pagination class integration close
   
        $this->pagination->initialize($config);
        $data['page'] = $parms['segment'];
        $data["links"] = $this->pagination->create_links();
        return $data;
    }
    public function get_user_activity()
    {
        echo 44555666; die;
        $data['user_detail'] = $this->auth->user_info(); 
        $user_id           = $data['user_detail']->id;
        $record              = $this->LoginModel->getUserLogLastId($user_id);
       
        if($record['activity_detail'])
        {
            
            $login_time = date('Y-m-d h:i:s',strtotime($record['activity_detail'][0]->created_date));
            $current_time = date('Y-m-d h:i:s');
            $diff = (strtotime($current_time)-strtotime($login_time));
            $getMin = ($diff/60);
            if($getMin>5 && $getMin < 15)
            {
                $this->LoginModel->auth_activity($user_id,2);
            }
            else if($getMin > 15)
            {
               redirect(base_url('logout'));
            }
            else
            {
                //$this->LoginModel->auth_activity($user_id,1,$login_status=2 already login);
                $this->LoginModel->auth_activity($user_id,1,1);
            }
        }
        else
        {
            
            $getLoginTime = $this->LoginModel->getUserLoginTime($user_id)[0];
            $login_time = $getLoginTime->created_date;
            $current_time = date('Y-m-d h:i:s');
            $diff = (strtotime($current_time)-strtotime($login_time));
            $getMin = ($diff/60);
           
            if($getMin>5 && $getMin < 15)
            {
                $this->LoginModel->auth_activity($user_id,2);
            }
            else if($getMin > 15)
            {
               redirect(base_url('logout'));
            }
            else
            {
                $this->LoginModel->auth_activity($user_id,1,1);
            }
            $log_status = $this->LoginModel->getUserLastLoginId($user_id)[0];
            
        }
    }
            
}
