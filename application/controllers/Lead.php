<?php
defined('BASEPATH') or exit('direct script no access allowed');
class Lead extends CI_Controller
{
    public function __construct()
    {
        // $this->load->library('auth');
        parent::__construct();
        $this->load->library('auth');
        if(($this->auth->user_info()->role_id!=1) && ($this->auth->user_info()->role_id!=4) && ($this->auth->user_info()->role_id!=3))
        {
            redirect(base_url());
        }
        $this->load->model('Security_model', 'SecurityModel');
        $this->load->model('User_model', 'UserList');
        $this->load->model('Sendmail_model');
        $this->load->model('Invoice_model');
        $this->load->model('Contacts_model');
    }
    public function index()
    {
        $data['tech_user'] =  $this->UserList->getUserInfoRole('',3);
        $data['user_detail'] = $this->auth->user_info();
        // $getRolePermission = $this->SecurityModel->getRolePermission($data['user_detail']->role_id);
        // filter start         
        $data['title'] = "Lead List";
        $data['active1'] = "Active";
        $link = base_url() . "list-lead";
        $limit = 15;           
        $segment = $this->input->get('page');                                             
        if ($data['user_detail']->role_id == 1 || $data['user_detail']->role_id == 4) {

            // count filter rows 
            if(!empty($this->input->get('first_name')) || !empty($this->input->get('last_name')) || !empty($this->input->get('phone_no')) || !empty($this->input->get('second_phone_no')) || !empty($this->input->get('email')) || !empty($this->input->get('lead_status')) && empty($this->input->get('from')) && empty($this->input->get('too'))){
            $total_record = $this->Lead_model->getfilter_count_admin($this->input->get());
            }
            elseif(!empty($this->input->get('from')) && !empty($this->input->get('too'))){
            $total_record = $this->Lead_model->getfromtoocount($this->input->get('from'),$this->input->get('too'));
            }
            else{
            $total_record =  $this->Lead_model->get_count_leads_admin();
            }
            // count filter rows 

            // result filter rows 
            if(!empty($this->input->get('first_name')) || !empty($this->input->get('last_name')) || !empty($this->input->get('phone_no')) || !empty($this->input->get('second_phone_no')) || !empty($this->input->get('email')) || !empty($this->input->get('lead_status')) && empty($this->input->get('from')) && empty($this->input->get('too'))){
            $result = $this->Lead_model->getfilter_result_admin($limit, $segment,$this->input->get());
            }
            elseif(!empty($this->input->get('from')) && !empty($this->input->get('too'))){
            $result = $this->Lead_model->getfromtoo($limit, $segment,$this->input->get('from'),$this->input->get('too'));
            }
            else{
            $result = $this->Lead_model->get_result_leads_admin($limit, $segment);
            }
            // result filter rows 

           }else{    
            $login_user_id = $data['user_detail']->id;
            // count filter rows user
            if(!empty($this->input->get('first_name')) || !empty($this->input->get('last_name')) || !empty($this->input->get('phone_no')) || !empty($this->input->get('second_phone_no')) || !empty($this->input->get('email')) || !empty($this->input->get('lead_status')) && empty($this->input->get('from')) && empty($this->input->get('too'))){
            $total_record = $this->Lead_model->getfilter_count_user($login_user_id,$this->input->get());
            }
            elseif(!empty($this->input->get('from')) && !empty($this->input->get('too'))){
            $total_record = $this->Lead_model->getfromtoocount_user($login_user_id,$this->input->get('from'),$this->input->get('too'));
            }else{
                $total_record =  $this->Lead_model->get_count_leads($login_user_id);
            }
            // count filter rows user

            // result filter rows user
            if(!empty($this->input->get('first_name')) || !empty($this->input->get('last_name')) || !empty($this->input->get('phone_no')) || !empty($this->input->get('second_phone_no')) || !empty($this->input->get('email')) || !empty($this->input->get('lead_status')) && empty($this->input->get('from')) && empty($this->input->get('too'))){
            $result = $this->Lead_model->getfilter_result_user($login_user_id,$limit, $segment,$this->input->get());
            }
            elseif(!empty($this->input->get('from')) && !empty($this->input->get('too'))){
            $result = $this->Lead_model->getfromtoo_user($login_user_id,$limit, $segment,$this->input->get('from'),$this->input->get('too'));
            }else{
            $result = $this->Lead_model->get_result_leads($login_user_id, $limit, $segment);
            }
            // result filter rows user
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
        
        if(empty($data['result']) && !empty($_GET)){
            //$_SESSION['error'] = "No Data Found";
            // redirect(base_url() . 'list-lead');
        }
        // $data['permission_role'] = $getRolePermission;
        $data['segment']    = $segment;
        $data['links']    = $data['pagination']['links'];
        $data['manage_column'] = $this->Lead_model->fetchManageColumn($data['user_detail']->id);
        $this->load->view('include/header', $data);
        $this->load->view('lead/listlead', $data);
        $this->load->view('include/footer',$data);
    }
    public function create()
    {
        $data['user_detail'] = $this->auth->user_info();
        // $getRolePermission = $this->SecurityModel->getRolePermission($data['user_detail']->role_id);
        // if(!in_array(1,$getRolePermission))
        // {
        //     redirect(base_url('lead'));
        // }
        $lead_detail =array();
        if($this->input->get('error'))
        {
            $lead_datail =  json_decode(base64_decode($this->input->get('error')));   
        }
        $data['exist_lead_detail'] = $lead_datail;
        $data['title'] = "Create Lead";
        $data['active1'] = "Active";
        $this->load->view('include/header', $data);
        $this->load->view('lead/createlead', $data);
        $this->load->view('include/footer',$data);
    }
    public function update()
    {
        $id = base64_decode($this->input->get('id'));
        $data['result'] = $this->Lead_model->getLead($id);
        $data['user_detail'] = $this->auth->user_info();
        $lead_detail =array();
        if($this->input->get('error'))
        {
            $lead_datail =  json_decode(base64_decode($this->input->get('error')));  
            $lead_datail->lead_id = $id; 
        }
        $data['exist_lead_detail'] =$lead_datail ;

        $data['title'] = "Update Lead";
        $data['active1'] = "Active";
        $this->load->view('include/header', $data);
        $this->load->view('lead/createlead', $data);
        $this->load->view('include/footer',$data);
    }
    public function addLead()
    {
        $data['user_detail'] = $this->auth->user_info();
        if((!isset($_POST['save'])) && (!isset($_POST['save_new'])))
        {
            redirect(base_url('create-lead'));
            exit();
        }
        if (isset($_POST['save'])) {
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('mobile_1', 'Phone Number', 'required|min_length[10]|max_length[10]');
            $this->form_validation->set_rules('mobile_2', 'Alt Phone No', 'min_length[10]|max_length[10]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('lead_status', 'Lead Status', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Create Lead";
                $data['active1'] = "Active";
                $this->load->view('include/header', $data);
                $this->load->view('lead/createlead', $data);
                $this->load->view('include/footer',$data);
            } else {

                $first_name = $this->input->post('first_name');
                $last_name = $this->input->post('last_name');
                $mobile_1 = $this->input->post('mobile_1');
                $mobile_2 = $this->input->post('mobile_2');
                $email = $this->input->post('email');
                $description = $this->input->post('description');
                $lead_status = $this->input->post('lead_status');
                $created_date = date('Y-m-d,h:i:s');
                $insert = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'mobile_1' => $mobile_1,
                    'mobile_2' => $mobile_2,
                    'email' => $email,
                    'description' => $description,
                    'lead_status' => $lead_status,
                    'created_date' => $created_date,
                    'user_type'    => 1,
                    'type_of_lead'    => 2,
                    'user_id'      => $data['user_detail']->id
                );
                // check email mobile 
                if($this->getLeadUnqiue($email,$mobile_1))
                {
                $_SESSION['error'] = "This Lead already exist";
                redirect(base_url() . 'create-lead?error='.base64_encode(json_encode($insert)));
                }
                // check email mobile 
                $res = $this->Lead_model->insertLeaddata($insert);
                // log activity 
                $insert_id = $this->db->insert_id();
                $user_id           = $data['user_detail']->id;
                $id           = $insert_id;
                $log_title         = "Add Lead  - " . json_encode($insert);
                $log_create        = app_log_manage($user_id, $id, $log_title);
                // log activity ;
                if ($res) {  
                    
                    $_SESSION['done'] = "Lead Added successfully";
                    redirect(base_url() . 'list-lead');
                } else {
                    
                    $_SESSION['error'] = "Lead Not Added";
                    redirect(base_url() . 'list-lead');
                }
            }
        }
        if (isset($_POST['save_new'])) {
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('mobile_1', 'Phone Number', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('lead_status', 'Lead Status', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Create Lead";
                $data['active1'] = "Active";
                $this->load->view('include/header', $data);
                $this->load->view('lead/createlead', $data);
                $this->load->view('include/footer',$data);
            } else {
                $first_name = $this->input->post('first_name');
                $last_name = $this->input->post('last_name');
                $mobile_1 = $this->input->post('mobile_1');
                $mobile_2 = $this->input->post('mobile_2');
                $email = $this->    input->post('email');
                $description = $this->input->post('description');
                $lead_status = $this->input->post('lead_status');
                $created_date = date('Y-m-d,h:i:s');
                $insert = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'mobile_1' => $mobile_1,
                    'mobile_2' => $mobile_2,
                    'email' => $email,
                    'description' => $description,
                    'lead_status' => $lead_status,
                    'created_date' => $created_date,
                    'user_type'    => 1,
                    'type_of_lead'    => 2,
                    'user_id'      => $data['user_detail']->id
                );
                // check email mobile 
                if($this->getLeadUnqiue($email,$mobile_1))
                {
                $_SESSION['error'] = "This Lead already exist";
                redirect(base_url() . 'create-lead?error='.base64_encode(json_encode($insert)));
                }
                // check email mobile
                $res = $this->Lead_model->insertLeaddata($insert);
                // log activity 
                $insert_id = $this->db->insert_id();
                $user_id           = $data['user_detail']->id;
                $id           = $insert_id;
                $log_title         = "Add Lead  - " . json_encode($insert);
                $log_create        = app_log_manage($user_id, $id, $log_title);
                // log activity ;
                if ($res) {  
                    
                    $_SESSION['done'] = "Lead Added successfully";
                    redirect(base_url() . 'create-lead');
                } else {
                    
                    $_SESSION['error'] = "Lead Not Added";
                    redirect(base_url() . 'create-lead');
                }
            }
        }
    }
    public function updateLead()
    {
        $data['user_detail'] = $this->auth->user_info();
        $hidden_id = $this->input->post('hidden_id');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $mobile_1 = $this->input->post('mobile_1');
        $mobile_2 = $this->input->post('mobile_2');
        $email = $this->input->post('email');
        $description = $this->input->post('description');
        $lead_status = $this->input->post('lead_status');
        $mod_date = date('Y-m-d,h:i:s');
        $custidone = $this->input->post('first_name');
        $custidtwo = $this->input->post('mobile_1');
        $customer_id = substr($custidone,0,4).substr($custidtwo,0,4);
        if($this->Contacts_model->getCustomerId($customer_id,$hidden_id))
        {
           $customer_id = substr($custidone,0,4).rand(1000,9999);
        }
        // check email mobile 
        if($this->getLeadUnqiue($email,$mobile_1,$hidden_id))
        {
            $update = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'mobile_1' => $mobile_1,
                'mobile_2' => $mobile_2,
                'email' => $email,
                'description' => $description,
                'lead_status' => $lead_status,
                'created_date' => $mod_date,
                'user_type'    => 2,
                'work_status' => 2,
                'plan_status' => 1,
                'type_of_lead'    => 2,
                'sale_date' => date('m-d-Y'),
                'customer_id'    => $customer_id,
                'user_id'      => $data['user_detail']->id
            );
        $_SESSION['error'] = "This Lead already exist";
        redirect(base_url() . 'update-lead?id='.base64_encode($hidden_id).'&error='.base64_encode(json_encode($update)));
        }
        // check email mobile
        if($lead_status==2){ 
            $update = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'mobile_1' => $mobile_1,
                'mobile_2' => $mobile_2,
                'email' => $email,
                'description' => $description,
                'lead_status' => $lead_status,
                'mod_date' => $mod_date,
                'user_type'    => 2,
                'work_status' => 2,
                'plan_status' => 1,
                'type_of_lead'    => 2,
                'sale_date' => date('m-d-Y'),
                'customer_id'    => $customer_id,
                'user_id'      => $data['user_detail']->id
            );
            $this->welcome($first_name, $last_name, $email,$customer_id,$hidden_id);
            $this->updateEmailHistory($hidden_id,4);
        }else{
            $update = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'mobile_1' => $mobile_1,
                'mobile_2' => $mobile_2,
                'email' => $email,
                'description' => $description,
                'lead_status' => $lead_status,
                'mod_date' => $mod_date,
                'user_type'    => 1,
                'type_of_lead'    => 2,
                'customer_id'    => $customer_id,
                'user_id'      => $data['user_detail']->id
            );
        }
        // prx($update);
        // $exist_user = $this->Lead_model->checkUser($mobile_1, $email,$hidden_id);
        // if ($exist_user) {
        //     $this->session->set_flashdata('error', 'Email/Mobile No is Already Exist');
        //     redirect(base_url() . 'list-lead');
        //     exit();
        // }
        $res = $this->Lead_model->updateLeaddata($hidden_id, $update);
        // log activity     
        $insert_id = $this->input->post('hidden_id');
        $user_id           = $data['user_detail']->id;
        $id           = $insert_id;
        $log_title         = "Update Lead  - " . json_encode($update);
        $log_create        = app_log_manage($user_id, $id, $log_title);
        // log activity 
        if (!empty($res)) {
            
            $_SESSION['done'] = "Lead Updated successfully";
            redirect(base_url() . 'list-lead');
        } else {
            
            $_SESSION['error'] = "Lead Not Updated successfully";
            redirect(base_url() . 'list-lead');
        }
    }
    public function deleteLead()
    {
        $data['user_detail'] = $this->auth->user_info();
        $delete_id = $this->input->post('leadIds');
        $sess = $this->Lead_model->deleteLead($delete_id);
        // log activity 
        $insert_id = $delete_id;
        $user_id           = $data['user_detail']->id;
        $id           = $delete_id;
        $log_title         = "Delete Lead  id - " . $delete_id;
        $log_create        = app_log_manage($user_id, $id, $log_title);
        // log activity 
        if ($sess) {
            $this->session->set_flashdata('done', 'Lead Deleted successfully');
            redirect(base_url() . 'list-lead');
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
        $config['reuse_query_string'] = true;
        $config['full_tag_open'] = '<nav aria-label="Page navigation example " class="float-end"><ul class="pagination float-end pe-2">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_tag_open'] =  '<li class="page-item"> <span class="page-link" href="#">';
        $config['first_tag_close'] = '</span></li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="' . base_url('list-lead    ') . '">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        //config for bootstrap pagination class integration close
        $this->pagination->initialize($config);
        $data['page'] = $parms['segment'];
        $data["links"] = $this->pagination->create_links();
        return $data;
    }
    public function detail()
    {
        $id = base64_decode($this->input->get('id'));
        $data['email_list'] = $this->Sendmail_model->getEmailList($id,4);
        $data['email_list_draft'] = $this->Sendmail_model->getEmailList_draft($id,4);
        // prx($data['email_list']);
        $data['activeSender'] = active_mail();
        $data['lead_detail'] = $this->Lead_model->detailLead($id)[0];
        $data['first_name'] = $data['lead_detail']->first_name;
        $data['last_name'] = $data['lead_detail']->last_name;
        $data['user_name'] = $this->Lead_model->GetuserNameLead($data['lead_detail']->user_id);
        $data['lead_added_name'] = $data['user_name'][0]->name;
        $data['user_detail'] = $this->auth->user_info();
        $data['title'] = "Detail Lead ";
        $data['active1'] = "Active";
        $this->load->view('include/header', $data);
        $this->load->view('lead/updatelead', $data);
        $this->load->view('include/footer',$data);
    }
    public function addNotes()
    {
        $module_id = trim($this->input->post('module_id'));
        $user_id = trim($this->input->post('user_id'));
        $module_type = trim($this->input->post('module_type'));
        $title = trim($this->input->post('title'));
        $module_name = trim($this->input->post('module_name'));
        $timezone =  date_default_timezone_set("US/Pacific");
        $pstTime =   date("F j, Y, g:i A");
        $created_date = trim($pstTime);
        $insert = array(
            'module_id' => $module_id,
            'user_id' => $user_id,
            'module_type' => $module_type,
            'title' => $title,
            'module_name' => $module_name,
            'created_date' => $created_date
        );
        $data['user_detail'] = $this->auth->user_info();
        $sess = $this->Lead_model->insertNotes($insert);
        // log activity 
        $insert_id = $this->db->insert_id();
        $user_id           = $data['user_detail']->id;
        $id           = $insert_id;
        $log_title         = "Add Notes Lead Module  - " . json_encode($insert);
        $log_create        = app_log_manage($user_id, $id, $log_title);
        // log activity 
        if (!empty($sess)) {
            echo 'Not inserted';
        } else {
            echo 'inserted';
        }
    }
    public function listNotes()
    {
        $first_name = trim($this->input->post('first_name'));
        $module_id = trim($this->input->post('module_id'));
        $module_type = trim($this->input->post('module_type'));
        $data = $this->Lead_model->listNotes($module_id, $module_type , $first_name);
        echo json_encode($data);
    }
    public function deleteNotes()
    {
        $id = trim($this->input->post('id'));
        $module_name = trim($this->input->post('module_name'));
        $sess = $this->Lead_model->deleteNotes($id);
        $data['user_detail'] = $this->auth->user_info();
        // log activity 
        $insert_id = $id;
        $user_id           = $data['user_detail']->id;
        $id           = $insert_id;
        $log_title         = "Delete Notes id Lead Module  - " . $id;
        $log_create        = app_log_manage($user_id, $id, $log_title);
        // log activity 
    }
    public function editNotes()
    {
        $id = trim($this->input->post('id'));
        $message = trim($this->input->post('message'));
        $module_name = trim($this->input->post('module_name'));
        $updated_date = trim($this->input->post('updated_date'));
        $data = array(
            'title' => $message,
            'module_name' => $module_name,
            'created_date' => $updated_date
        );
        $sess = $this->Lead_model->editNotes($id, $data);
        $data['user_detail'] = $this->auth->user_info();
        // log activity 
        $insert_id = $id;
        $user_id           = $data['user_detail']->id;
        $id           = $insert_id;
        $log_title         = "Update Notes Lead Module  - " . json_encode($data);
        $log_create        = app_log_manage($user_id, $id, $log_title);
        // log activity 
        if (!empty($sess)) {
            echo ' updated';
        } else {
            echo ' not updated';
        }
    }
    public function detailPageedit()
    {
        $data['user_detail'] = $this->auth->user_info();
        $hidden_id = $this->input->post('hidden_id');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $mobile_1 = $this->input->post('mobile_1');
        $mobile_2 = $this->input->post('mobile_2');
        $email = $this->input->post('email');
        $lead_status = $this->input->post('lead_status');
        $description = $this->input->post('description');
        $mod_date = date('Y-m-d,h:i:s');
        $custidone = $this->input->post('first_name');
        $custidtwo = $this->input->post('mobile_1');
        $customer_id = substr($custidone,0,4).substr($custidtwo,0,4);
        if($this->Contacts_model->getCustomerId($customer_id,$hidden_id))
        {
           $customer_id = substr($custidone,0,4).rand(1000,9999);
        }
        // check email mobile 
        if($this->getLeadUnqiue($email,$mobile_1,$hidden_id))
        {
            echo 'Email/Mobile No is Already Exist';
            exit();
        }
        // check email mobile
        if($lead_status==2){
            $update = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'mobile_1' => $mobile_1,
                'mobile_2' => $mobile_2,
                'email' => $email,
                'lead_status' => $lead_status,
                'description' => $description,
                'mod_date' => $mod_date,
                'user_type'    => 2,
                'work_status' => 2,
                'plan_status' => 1,
                'type_of_lead' => 2,
                'sale_date' => date('m-d-Y'),
                'customer_id'    => $customer_id,
                'user_id'      => $data['user_detail']->id
            );
           
            $this->welcome($first_name, $last_name, $email,$customer_id,$hidden_id);
          }else{
            $update = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'mobile_1' => $mobile_1,
                'mobile_2' => $mobile_2,
                'email' => $email,
                'lead_status' => $lead_status,
                'description' => $description,
                'mod_date' => $mod_date,
                'user_type'    => 1,
                'type_of_lead'    => 2,
                'customer_id'    => $customer_id,
                'user_id'      => $data['user_detail']->id
            );
        }
        // $exist_user = $this->Lead_model->checkUser($mobile_1, $email,$hidden_id);
        // if ($exist_user) {
        //     echo 'Email/Mobile No is Already Exist';
        //     exit();
        // }
        $sess = $this->Lead_model->updateDetail($hidden_id, $update);
        // log activity 
        $insert_id = $hidden_id;
        $user_id           = $data['user_detail']->id;
        $id           = $insert_id;
        $log_title         = "Update Detail Page Lead  - " . json_encode($update);
        $log_create        = app_log_manage($user_id, $id, $log_title);
        // log activity 
        if (!empty($sess)) {
             if($lead_status==2)
             {
                //2 lead sale
                echo 2;
             }
             ' Updated';
        } else {
             ' Not Updated';
        }
    }
    public function welcome($first_name, $last_name, $email,$customer_id,$hidden_id)
    {
        $activemail = active_mail()[0];
        $getplan = $this->Lead_model->getplan($hidden_id)[0];
        $toName = $first_name." ".$last_name;
        $toEmail = $email;
        $fromName = $activemail->sender_name;
        $fromEmail = $activemail->sender_email;
        $subject = $activemail->sender_name;
        $htmlMessage = '<span style="position: relative;top: 40px;">Welcome</span>
                        <p style="text-align: center; font-size: large; font-weight: bold;">' . $first_name . ' ' . $last_name . '</p>';
        $data = array(
            "sender" => array(
                "email" => $fromEmail,
                "name" => $fromName
            ),
            "to" => array(
                array(
                    "email" => $toEmail,
                    "name" => $toName
                )
            ),
            "subject" => $subject,
            "htmlContent" => '<body marginheight="0" marginwidth="0" topmargin="0" leftmargin="0" style="height: 100% !important; margin: 0; padding: 0; width: 100% !important;min-width: 100%;"> <table name="bmeMainBody" style="background-color: #fff;" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#fff"> <tbody> <tr> <td width="100%" valign="top" align="center"> <table name="bmeMainColumnParentTable" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="bmeMainColumnParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px;"> <table name="bmeMainColumn" class="" style="max-width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"> <tbody> <tr> <td class="bmeHolder" name="bmeMainContentParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;" width="100%" valign="top" align="center"> <table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"> <tbody> <tr> <td class="blk_container bmeHolder" name="bmeHeader" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: #f2f2f2; padding: 30px 0;" width="100%" valign="top" bgcolor="#34495e" align="center"> <div id="dv_9" class="blk_wrapper"> <table class="blk" name="blk_image" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td class="bmeImage" style="border-collapse: collapse; padding:20px 20px;" align="center"> <img src="https://www.trusthavensolution.com/assets/images/ths-logo.png" style="max-width: 237px; display: block; width: 100%;" alt="" width="100%" border="0" /> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> <tr> <td class="blk_container bmeHolder" name="bmeBody" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: #fff;" width="100%" valign="top" bgcolor="#34495e" align="center"> <div id="dv_13" class="blk_wrapper"> <table class="blk" name="blk_divider" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td class="tblCellMain" style="padding: 5px 0px;"> <table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"> <div> <span style="font-size: 16px; color: #333; line-height: 150%;"> Dear '.$first_name.' '.$last_name.', </span> </div> </td> </tr> </tbody> </table> </td> </tr> <tr> <td class="tblCellMain" style="padding: 10px 0px;"> <table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: center;" valign="top" align="left"> <div style="line-height: 100%;"> <h2 style="color:#1ea5b4">Thank you for signing up with us!</h2> <p style="font-size:18px;">Here is your information:</p> </div> </td> </tr> </tbody> </table> </td> </tr> <tr> <td class="tblCellMain" style="padding: 10px 0px;"> <table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell"> <div style="background-color: #efe9e978; border-radius:15px;padding:10px 10px; display:flex;"> <div style="width:50%;  text-align:right;"> <p style="font-size:18px;">Name </p> <p style="font-size:18px;">E-mail Address </p> </div> <div style="width:50%; text-align:left;padding-left:20px;font-weight:700"> <p style="font-size:18px;">'.$first_name.' '.$last_name.'</p> <p style="font-size:18px;">'.$email.'</p> </div> </div> </td> </tr> </tbody> </table> </td> </tr> <tr> <td class="tblCellMain" style="padding: 10px 0px;"> <table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"> <div style="line-height: 100%;"> <p style="font-size: 16px; color: #333; line-height: 150%;"> If you would like to add or change your profile information, please call us on our help line number <br> 1-800-235-0122 or 1-800-518-9122.. </p> <p style="font-size: 16px; color: #333; line-height: 150%;"> This is to informe you that you are now a registered customer for {plan} with your '.$customer_id.' please make a copy of this Customer Id . We request you to please never share this ID with anyone. </p> <p style="font-size: 16px; color: #333; line-height: 150%;"> In case of any issues please feel free to reach us on our toll free number  1-800-235-0122 or you can write us on mailto:help@trusthavensolution.com or for billing mailto:info@trusthavensolution.com. </p> <p style="font-size: 16px; color: #333; line-height: 150%;"> We look forword to assist you! </p> </div> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> <tr> <td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: #fff; padding-bottom: 30px;" width="100%" valign="top" bgcolor="#f2f2f2" align="center"> <div id="dv_10" class="blk_wrapper"> <table class="blk" name="blk_footer" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px;" valign="top" align="left"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="bmeBadgeText" style="text-align:left; padding-bottom: 4px;" align="left"> <span id="spnFooterText" style="font-weight: 600; font-size: 16px; ">Best regards,</span> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:left; padding-bottom: 4px;" align="left"><span id="spnFooterText" style="font-weight: 600; font-size: 16px; ">Trust Haven Solution Inc.</span> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:left;  padding-bottom: 4px;" align="left"><span id="spnFooterText" style="font-weight: 600; font-size: 16px; "><a href="http://trusthavensolution.com/">trusthavensolution.com</a> </span> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:left; padding-bottom: 4px;" align="left"><span style="font-weight: 600; font-size: 16px; ">1800-235-0122 </span> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> <tr> <td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(52, 73, 94);" width="100%" valign="top" bgcolor="#34495e" align="center"> <div id="dv_10" class="blk_wrapper"> <table class="blk" name="blk_footer" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:10px 20px;" valign="top" align="center"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"> <span id="spnFooterText" style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 23px; line-height: 140%; color: #fff;">Follow Us</span><br /><br /> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"> <a href="https://www.facebook.com/trustheavensolution/" target="_blank"><img src="'.base_url().'facebook.png" alt="facebook" style="max-width:22px"></a> <a href="https://www.instagram.com/trusthavensolution/" target="_blank"><img src="'.base_url().'instagram.png" alt="instagram" style="max-width:22px"></a> <a href="https://twitter.com/trust_haven1" target="_blank"><img src="'.base_url().'twitter.png" alt="twitter" style="max-width:22px;padding: 0 5px;"></a> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 12px; line-height: 140%; color: #fff;"> &copy; All rights reserved – Trust Haven Solution</p> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </body>'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.sendinblue.com/v3/smtp/email');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = 'Api-Key: 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';
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        $decode = json_decode($result);
        $api_response_id = $decode->messageId;
        curl_close($ch);
        $insert = array(
            'lead_id' => $hidden_id,
            'sender_id' => $activemail->id,
            'user_id'   => $getplan->user_id,
            'module_type' => 5,
            'too' => $email,
            'subject' => "Welcome Email",
            'sent_by_email' => $activemail->sender_email,
            'sent_by_name' => $activemail->sender_name,
            'message' => $htmlMessage,
            'source_by' => 3,
            'lead_type' => 2,
            'api_response_id' => $api_response_id,
            'created_at' => date('Y-m-d h:i:s'),
            'mail_status' => 1
        );
        $save = $this->Lead_model->savehisoryEmail($insert);
      
      
    }
    public function managecolumn()
    {
        $data['user_detail'] = $this->auth->user_info();
        if (empty($this->input->post('first_name_col'))) {
            $first_name_col = 0;
        } else {
            $first_name_col = $this->input->post('first_name_col');
        }
        if (empty($this->input->post('last_name_col'))) {
            $last_name_col = 0;
        } else {
            $last_name_col = $this->input->post('last_name_col');
        }
        if (empty($this->input->post('mobile_1_col'))) {
            $mobile_1_col = 0;
        } else {
            $mobile_1_col = $this->input->post('mobile_1_col');
        }
        if (empty($this->input->post('mobile_2_col'))) {
            $mobile_2_col = 0;
        } else {
            $mobile_2_col = $this->input->post('mobile_2_col');
        }
        if (empty($this->input->post('email_col'))) {
            $email_col = 0;
        } else {
            $email_col = $this->input->post('email_col');
        }
        if (empty($this->input->post('lead_status_col'))) {
            $lead_status_col = 0;
        } else {
            $lead_status_col = $this->input->post('lead_status_col');
        }
        if (empty($this->input->post('description_col'))) {
            $description_col = 0;
        } else {
            $description_col = $this->input->post('description_col');
        }
        $update = array(
            'first_name_col' => $first_name_col,
            'last_name_col' => $last_name_col,
            'mobile_1_col' => $mobile_1_col,
            'mobile_2_col' => $mobile_2_col,
            'email_col' => $email_col,
            'lead_status_col' => $lead_status_col,
            'description_col' => $description_col
        );
        $sess = $this->Lead_model->manageColumn($data['user_detail']->id, $update);
        if (!empty($sess)) {
            redirect(base_url('list-lead'));
        } else {
            redirect(base_url('list-lead'));
        }
    }
   
    // public function db_export()
    // {
    //     $NAME=$this->db->database;
    //     $this->load->dbutil();
    //     $prefs = array(
    //     'format' => 'zip',
    //     'filename' => 'my_db_backup.sql'
    //     );
    //     $backup =& $this->dbutil->backup($prefs);
    //     $db_name = $NAME.'.zip';
    //     $save = 'public/uploads/'.$db_name;
    //     $this->load->helper('file');
    //     write_file($save, $backup);
    //     $this->load->helper('download');
    //     force_download($db_name, $backup); 
    // }
    
    public function transferLead()
    {
        $data['user_detail'] = $this->auth->user_info();
        $lead_id = $this->input->post('leadIds');
        $tech_user = $this->input->post('tech_user');
        $sess = $this->Lead_model->transferLeadBySales($lead_id, $tech_user);
        // log activity 
        $insert_id         = json_encode($lead_id);
        $user_id           = $data['user_detail']->id;
        $log_title         = "Lead Transfered - " . $insert_id;
        $id = 1;
        $log_create        = app_log_manage($user_id ,$id, $log_title);
        // log activity 
        if ($sess) {
            echo 1;
        }
        else
        {
            echo 2;
        }
    }
    public function transferLeadList()
    {
        $data['user_detail'] = $this->auth->user_info();
        $data['title'] =  "Transfer Lead List";
        $data['active5'] =  "Active";
        $data['user_detail'] = $this->auth->user_info();
        $link = base_url() . "list-invoice";
        $limit = 15;
        $segment = $this->input->get('page');
        if ($data['user_detail']->role_id == 1 || $data['user_detail']->role_id == 4 ||  $data['user_detail']->role_id == 3) {
            if (!empty($this->input->get('s'))) {
                $total_record =  $this->Lead_model->get_count_transfer_search_admin($this->input->get('s'));
            } else {    
                $total_record =  $this->Lead_model->get_count_transfer_admin();            
            }
            if (!empty($this->input->get('s'))) {
                $result = $this->Lead_model->get_result_transfer_search_admin($limit, $segment, $this->input->get('s'));
            } else {
                $result = $this->Lead_model->get_result_transfer_admin($limit, $segment);
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
        } else {
            $user_id = $data['user_detail']->id;
            if (!empty($this->input->get('s'))) {
                $total_record =  $this->Lead_model->get_count_transfer_search_user($this->input->get('s'),$user_id);
            } else {    
                $total_record =  $this->Lead_model->get_count_transfer_user($user_id);            
            }
            if (!empty($this->input->get('s'))) {
                $result = $this->Lead_model->get_result_transfer_search_user($limit, $segment, $this->input->get('s'),$user_id);
            } else {
                $result = $this->Lead_model->get_result_transfer_user($limit, $segment,$user_id);
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
        }
        $data['segment']    = $segment;
        $data['links']    = $data['pagination']['links'];
        $this->load->view('include/header', $data);
        $this->load->view('invoice/transerferlead', $data);
        $this->load->view('include/footer',$data);
    }
    
    public function updateByTech()
    {
        $data['user_detail'] = $this->auth->user_info();
        if($data['user_detail']->role_id==2)
        {
             redirect('/lead-transfer');
        }
        $id = base64_decode($this->input->get('id'));
        if($id=='')
        {
            redirect('/lead-transfer');
        }
        $data['result'] = $this->Lead_model->getLead($id);
        $data['title'] = "Update Lead";
        $data['active1'] = "Active";
        $this->load->view('include/header', $data);
        $this->load->view('lead/LeadUpdateByTech', $data);
        $this->load->view('include/footer',$data);
    }
    public function updateTechLeadStatus()
    {
        $data['user_detail'] = $this->auth->user_info();
        $hidden_id = $this->input->post('hidden_id');
        $lead_notes = $this->input->post('tech_lead_note');
        $lead_status = $this->input->post('tech_lead_status');
        $mod_date = date('Y-m-d,h:i:s');
        $update = array(
           
            'tech_lead_notes' => $lead_notes,
            'tech_lead_status' => $lead_status,
            'user_type'        => 2
        );
        $res = $this->Lead_model->updateLeaddata($hidden_id, $update);
        // log activity     
        $insert_id = $this->input->post('hidden_id');
        $user_id           = $data['user_detail']->id;
        $id                = $insert_id;
        $log_title         = "Update Lead By Tech - " . json_encode($update);
        $log_create        = app_log_manage($user_id, $id, $log_title);
        // log activity ;
        if ($res) {
            $this->session->set_flashdata('done', 'Tech Lead Update');
            redirect(base_url() . 'lead-transfer');
        }
    }
    //sendmail-attachments
    public function mail_attachment() {
        $config['upload_path'] = 'attachment/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        $new_name = time() . $_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            $response = array('image_name' => null, 'message' => $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $response = array('image_name' => base_url('attachment/'.$this->upload->data('file_name')), 'message' => 'File uploaded successfully');
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    //sendmail 
    public function sendmail()
    {
        $senderemail = $this->input->post('senderemail');
        $lead_id = $this->input->post('lead_id');
        $module_name = $this->input->post('module_name');
        $too = $this->input->post('toemail');
        $cc = $this->input->post('emailtocc');
        $bcc = $this->input->post('emailtobcc');   
        $subject = $this->input->post('emailsubject');
        $message = $this->input->post('emailmessage');
        $attached_file = $this->input->post('attachment');
        $fileName =  $attached_file;
        $fullPath =  base_url() . 'attachment/' .$attached_file;
        $fromName = 'Trust Haven Solution';
        $fromEmail = $senderemail;
        $c_subject = $subject;
        $htmlMessage = '<p><b>Message</b>'.$message.'</p>';
        $data = array(
            "sender" => array(
                "email" => $fromEmail,
                "name" => $fromName         
            ),
            "to" => array(
                array(
                    "email" => $too
                    )
                ),
                "attachment" => array(
                    array(
                        "url" => $fullPath,
                        "name" => $fileName 
                        )
                ), 
            "subject" => $c_subject,
            "htmlContent" => '<html><head></head><body><p>'.$htmlMessage.'</p></p></body></html>'
        ); 
        $bcc = array();
        $cc = array();
        if($bcc)
        {
            $data['bcc'] = array(array(
                "email" => $bcc
            ));
        }
        if($cc)
        {
            $data['cc'] = array(array(
                "email" => $cc
            ));
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.sendinblue.com/v3/smtp/email');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = 'Api-Key: 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';
        $headers[] = 'Content-Type: application/json';  
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_exec($ch);
        $result = curl_close($ch);
        print_r($result);
        die;
        $insert = array(
            'lead_id' => $lead_id,
            'module_type' => 4,
            'too' => $too,
            'bcc' => $bcc,
            'cc' => $cc,
            'subject' => $subject,
            'message' => $message,
            'created_at' => date('Y-m-d h:i:s'),
            'mail_status' => 1
        );
        $save = $this->Lead_model->sendMail($insert);
        $this->session->set_flashdata('done','Send Email Successfully!');
        redirect(base_url('list-lead'));
    }

    public function getLeadUnqiue($email,$mobile,$lead_id="")
{
    if($this->Lead_model->getDuplicateLead($email,$mobile,$lead_id))
       {
        return true;
       }
}

    public function updateEmailHistory($id,$module_id){
        $getdata = $this->Lead_model->checkEmailHistory($id,$module_id);
        if($getdata){
            $id =  $getdata[0]->id;
            $update_type = $this->Lead_model->updateEmailType($id);
        }
        // prx($getdata);
        
    }

            public function getValue(){

                $id = $this->input->post('id');
                $column_name = $this->input->post('column_name');
                $getvalue = $this->Lead_model->getvalue($id,$column_name)[0];
                echo $getvalue->$column_name;
            
            }
}
