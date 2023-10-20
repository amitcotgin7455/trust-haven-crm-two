<?php
defined('BASEPATH') or exit('direct script no access allowed');
class Contacts extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
      if(($this->auth->user_info()->role_id!=1) && ($this->auth->user_info()->role_id!=4) && ($this->auth->user_info()->role_id!=3))
        {
            redirect(base_url());
        }
        $this->load->model('Lead_model');
        $this->load->model('Contacts_model');
        $this->load->model('Sendmail_model');
        
    }
    public function index()
    {
        $gsearch = $this->input->get('s');
        $data['user_detail'] = $this->auth->user_info();
        $data['title'] = "Contact List";
        $data['active2'] = "Active";
        $link = base_url() . "list-contact";
        $limit = 15;
        $segment = $this->input->get('page');
        if ($data['user_detail']->role_id == 1 || $data['user_detail']->role_id == 4) {
            // count filter rows admin
            if(!empty($this->input->get('first_name')) || !empty($this->input->get('last_name')) || !empty($this->input->get('phone_no')) || !empty($this->input->get('phone_no2'))|| !empty($this->input->get('email'))|| !empty($this->input->get('customer_id'))||!empty($this->input->get('email_opt_out'))||!empty($this->input->get('plan_status')) ||!empty($this->input->get('plan')) || !empty($this->input->get('amount')) ||!empty($this->input->get('remote_by')) ||!empty($this->input->get('sale_by')) || !empty($this->input->get('worked_by')) || !empty($this->input->get('work_status')) || !empty($this->input->get('courtesy')) || !empty($this->input->get('bbb')) || !empty($this->input->get('ha')) || !empty($this->input->get('fb')) || !empty($this->input->get('google')) || !empty($this->input->get('service')) || !empty($this->input->get('sale_date'))|| !empty($this->input->get('from_expiry_date')) || !empty($this->input->get('to_expiry_date'))){                
            $total_record = $this->Contacts_model->getfilter_count_admin($this->input->get());
            }
            elseif(!empty($this->input->get('from')) && !empty($this->input->get('too'))){
            $total_record = $this->Contacts_model->getfromtoocount($this->input->get('from'),$this->input->get('too'));
            }
            else{
            $total_record =  $this->Contacts_model->get_count_leads_admin();
            }
            // count filter rows admin 

            // result filter rows admin
            if(!empty($this->input->get('first_name')) || !empty($this->input->get('last_name')) || !empty($this->input->get('phone_no')) || !empty($this->input->get('phone_no2'))|| !empty($this->input->get('email'))|| !empty($this->input->get('customer_id'))||!empty($this->input->get('email_opt_out'))||!empty($this->input->get('plan_status')) ||!empty($this->input->get('plan')) || !empty($this->input->get('amount')) ||!empty($this->input->get('remote_by')) ||!empty($this->input->get('sale_by')) || !empty($this->input->get('worked_by')) || !empty($this->input->get('work_status')) || !empty($this->input->get('courtesy')) || !empty($this->input->get('bbb')) || !empty($this->input->get('ha')) || !empty($this->input->get('fb')) || !empty($this->input->get('google')) || !empty($this->input->get('service')) || !empty($this->input->get('sale_date')) || !empty($this->input->get('from_expiry_date')) || !empty($this->input->get('to_expiry_date')) ){
                $result = $this->Contacts_model->getfilter_result_admin($limit, $segment,$this->input->get());
            }
            elseif(!empty($this->input->get('from')) && !empty($this->input->get('too'))){
            $result = $this->Contacts_model->getfromtoo($limit, $segment,$this->input->get('from'),$this->input->get('too'));
            }
            else{
            $result = $this->Contacts_model->get_result_leads_admin($limit, $segment);
            }
            // result filter rows admin
           } 
           else {
            $login_user_id = $data['user_detail']->id;
            // count filter rows user
            
            if(!empty($this->input->get('first_name')) || !empty($this->input->get('last_name')) || !empty($this->input->get('phone_no')) || !empty($this->input->get('phone_no2'))|| !empty($this->input->get('email'))|| !empty($this->input->get('customer_id'))||!empty($this->input->get('email_opt_out'))||!empty($this->input->get('plan_status')) ||!empty($this->input->get('plan'))  || !empty($this->input->get('amount')) ||!empty($this->input->get('remote_by')) ||!empty($this->input->get('sale_by')) || !empty($this->input->get('worked_by')) || !empty($this->input->get('work_status')) || !empty($this->input->get('courtesy')) || !empty($this->input->get('bbb')) || !empty($this->input->get('ha')) || !empty($this->input->get('fb')) || !empty($this->input->get('google')) || !empty($this->input->get('service')) || !empty($this->input->get('sale_date')) || !empty($this->input->get('from_expiry_date')) || !empty($this->input->get('to_expiry_date'))){
                $total_record = $this->Contacts_model->getfilter_count_user($login_user_id,$this->input->get());
            }
            elseif(!empty($this->input->get('from')) && !empty($this->input->get('too'))){
            $total_record = $this->Contacts_model->getfromtoocount_user($login_user_id,$this->input->get('from'),$this->input->get('too'));
            }
            else {    
            $total_record =  $this->Contacts_model->get_count_leads($login_user_id);
            }
            // count filter rows user

            // result filter rows user
            if(!empty($this->input->get('first_name')) || !empty($this->input->get('last_name')) || !empty($this->input->get('phone_no')) || !empty($this->input->get('phone_no2'))|| !empty($this->input->get('email'))|| !empty($this->input->get('customer_id'))||!empty($this->input->get('email_opt_out'))||!empty($this->input->get('plan_status')) ||!empty($this->input->get('plan')) || !empty($this->input->get('amount')) ||!empty($this->input->get('remote_by')) ||!empty($this->input->get('sale_by')) || !empty($this->input->get('worked_by')) || !empty($this->input->get('work_status')) || !empty($this->input->get('courtesy')) || !empty($this->input->get('bbb')) || !empty($this->input->get('ha')) || !empty($this->input->get('fb')) || !empty($this->input->get('google')) || !empty($this->input->get('service')) || !empty($this->input->get('sale_date'))){
                $result = $this->Contacts_model->getfilter_result_user($login_user_id,$limit, $segment,$this->input->get());
            }
            elseif(!empty($this->input->get('from')) && !empty($this->input->get('too'))){
                $result = $this->Contacts_model->getfromtoo_user($login_user_id,$limit, $segment,$this->input->get('from'),$this->input->get('too'));
            }
            else{
                $result = $this->Contacts_model->get_result_leads($login_user_id, $limit, $segment);
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
            // $_SESSION['error'] = "No Data Found";
            // redirect(base_url() . 'list-lead');
        }
        $data['segment']    = $segment;
        $data['links']    = $data['pagination']['links'];
        $data['manage_column'] = $this->Contacts_model->fetchManageColumn($data['user_detail']->id);
        $data['plan_id'] = $this->Contacts_model->fetchPlan();
        $data['remote_id'] = $this->Contacts_model->fetchRemote();
        $data['sale_id'] = $this->Contacts_model->fetchSale();
        $data['worked_id'] = $this->Contacts_model->fetchWorked();
        $this->load->view('include/header', $data);
        $this->load->view('contact/listcontact', $data);
        $this->load->view('include/footer', $data);
    }

    public function create()
    {
        
        $data['user_detail'] = $this->auth->user_info();
        $data['remote_id'] = $this->Contacts_model->fetchRemote();
        $data['sale_id'] = $this->Contacts_model->fetchSale();
        $data['worked_id'] = $this->Contacts_model->fetchWorked();
        $data['plan_id'] = $this->Contacts_model->fetchPlan();
        $data['title'] = "Create Contact";
        $data['active2'] = "Active";
        $lead_detail =array();
        if($this->input->get('error'))
        {
            $lead_detail =  json_decode(base64_decode($this->input->get('error')));  
            //$lead_detail->sale_date = date('m-d-Y',strtotime($lead_detail->sale_date));
            
        }
        $data['exist_lead_detail'] = $lead_detail;
        
        $this->load->view('include/header', $data);
        $this->load->view('contact/createcontact', $data);
        $this->load->view('include/footer', $data);
    }
    public function update()
    {
        $id = base64_decode($this->input->get('id'));
        // echo $id;die;
        $data['activeSender'] = active_mail();
        $data['result'] = $this->Contacts_model->getContacts($id);
        $data['user_detail'] = $this->auth->user_info();
        $data['remote_id'] = $this->Contacts_model->fetchRemote();
        $data['sale_id'] = $this->Contacts_model->fetchSale();
        $data['worked_id'] = $this->Contacts_model->fetchWorked();
        $data['plan_id'] = $this->Contacts_model->fetchPlan();
        $data['title'] = "Update Contact";
        $data['active2'] = "Active";
        $lead_detail =array();
        if($this->input->get('error'))
        {
            $lead_datail =  json_decode(base64_decode($this->input->get('error')));
            $lead_datail->lead_id = $id;   
        }
        $data['exist_lead_detail'] = $lead_datail;
        $this->load->view('include/header', $data);
        $this->load->view('contact/createcontact', $data);
        $this->load->view('include/footer', $data);
    }
    public function addContact()
    {
        $data['user_detail'] = $this->auth->user_info();
        if((!isset($_POST['save'])) && (!isset($_POST['save_new'])))
        {
            redirect(base_url('create-contact'));
            exit();
        }
        if (isset($_POST['save'])) {
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('mobile_1', 'Phone Number', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('plan_status', 'Plan Status', 'required');
            $this->form_validation->set_rules('plan', 'Plan', 'required');
            $this->form_validation->set_rules('amount', 'Amount', 'required');
            $this->form_validation->set_rules('remote_id', 'Remote By', 'required');
            $this->form_validation->set_rules('sale_id', 'Sale By', 'required');
            // $this->form_validation->set_rules('worked_id', 'Worked By', 'required');
            $this->form_validation->set_rules('work_status', 'Work Status', 'required');
            $this->form_validation->set_rules('sale_date', 'Sale Date', 'required');
            $this->form_validation->set_rules('expiry_date', 'Expiry Date', 'required');
            $this->form_validation->set_rules('customer_id', 'Customer Id', 'required|max_length[8]|min_length[8]|is_unique[tbl_lead_contact_user.customer_id]');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Create Contact";
                $data['active2'] = "Active";
                $data['remote_id'] = $this->Contacts_model->fetchRemote();
                $data['sale_id'] = $this->Contacts_model->fetchSale();
                $data['worked_id'] = $this->Contacts_model->fetchWorked();
                $data['plan_id'] = $this->Contacts_model->fetchPlan();
                $this->load->view('include/header', $data);
                $this->load->view('contact/createcontact', $data);
                $this->load->view('include/footer', $data);
            } else {
                $first_name = $this->input->post('first_name');
                $last_name = $this->input->post('last_name');
                $mobile_1 = $this->input->post('mobile_1');
                $mobile_2 = $this->input->post('mobile_2');
                $email = $this->input->post('email');
                $customer_id = $this->input->post('customer_id');
                if (empty($this->input->post('email_opt_out'))) {
                    $email_opt_out = 0;
                } else {
                    $email_opt_out = $this->input->post('email_opt_out');
                }
                if (empty($this->input->post('plan_status'))) {
                    $plan_status = 0;
                } else {
                    $plan_status = $this->input->post('plan_status');
                }
                $plan = $this->input->post('plan');
                $amount = $this->input->post('amount');
                $remote_id = $this->input->post('remote_id');
                $sale_id = $this->input->post('sale_id');
                $worked_id = $this->input->post('worked_id');
                $work_status = $this->input->post('work_status');
                if (empty($this->input->post('courtesy'))) {
                    $courtesy = 1;
                } else {
                    $courtesy = $this->input->post('courtesy');
                }
                if (empty($this->input->post('bbb'))) {
                    $bbb = 0;
                } else {
                    $bbb = $this->input->post('bbb');
                }
                if (empty($this->input->post('ha'))) {
                    $ha = 0;
                } else {
                    $ha = $this->input->post('ha');
                }
                if (empty($this->input->post('fb'))) {
                    $fb = 0;
                } else {
                    $fb = $this->input->post('fb');
                }
                if (empty($this->input->post('google'))) {
                    $google = 0;
                } else {
                    $google = $this->input->post('google');
                }
                if (empty($this->input->post('service'))) {
                    $service = 0;
                } else {
                    $service = $this->input->post('service');
                }
                $sale_date = $this->input->post('sale_date');
                $expiry_date = $this->input->post('expiry_date');
                $description = $this->input->post('description');
                
                $created_date = date('Y-m-d,h:i:s');
                $insert = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'mobile_1' => $mobile_1,
                    'mobile_2' => $mobile_2,
                    'email' => $email,
                    'customer_id' => $customer_id,
                    'email_opt_out' => $email_opt_out,
                    'plan_status' => $plan_status,
                    'plan' => $plan,
                    'amount' => $amount,
                    'remote_id' => $remote_id,
                    'sale_id' => $sale_id,
                    'worked_id' => $worked_id,
                    'work_status' => $work_status,
                    'courtesy' => $courtesy,
                    'bbb' => $bbb,
                    'ha' => $ha,
                    'fb' => $fb,
                    'google' => $google,
                    'lead_status' => 2,
                    'service' => $service,
                    'sale_date' =>$sale_date,
                    'expiry_date' => $expiry_date,
                    'description' => $description,
                    'created_date' => $created_date,
                    'user_type'    => 2,
                    'user_id'      => $data['user_detail']->id
                );
                if($this->getLeadUnqiue($email,$mobile_1))
                {
                        $_SESSION['error'] = "This Lead already exist";
                        redirect(base_url() . 'create-contact?error='.base64_encode(json_encode($insert)));
                }
                else
                {
                //$this->db->trans_begin();
                
                $res = $this->Contacts_model->insertData($insert);

                
                // log activity 
                $insert_id = $this->db->insert_id();
                $user_id           = $data['user_detail']->id;
                $id           = $insert_id;
                $log_title         = "Add Contact  - " . json_encode($insert);
                $log_create        = app_log_manage($user_id, $id, $log_title);
                $this->Contacts_model->expire_date_log($expiry_date,$sale_date,$insert_id);
                $this->welcome($first_name, $last_name, $email, $customer_id,$insert_id,$user_id);
                // log activity ;

                // Manage Plan
               
                
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $_SESSION['error'] = "Contact Not Added successfully";
                    redirect(base_url() . 'list-contact');
                }
                else
                {
                if ($res) {  
                    $_SESSION['done'] = "Contact Added successfully";
                    redirect(base_url() . 'list-contact');
                } else {
                    
                    $_SESSION['error'] = "Contact Not Added successfully";
                    redirect(base_url() . 'list-contact');
                }
            }
            }
            }
        }
        if (isset($_POST['save_new'])) {
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('mobile_1', 'Phone Number', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('plan_status', 'Plan Status', 'required');
            $this->form_validation->set_rules('plan', 'Plan', 'required');
            $this->form_validation->set_rules('amount', 'Amount', 'required');
            $this->form_validation->set_rules('remote_id', 'Remote By', 'required');
            $this->form_validation->set_rules('sale_id', 'Sale By', 'required');
            // $this->form_validation->set_rules('worked_id', 'Worked By', 'required');
            $this->form_validation->set_rules('work_status', 'Work Status', 'required');
            $this->form_validation->set_rules('sale_date', 'Sale Date', 'required');
            $this->form_validation->set_rules('expiry_date', 'Expiry Date', 'required');
            $this->form_validation->set_rules('customer_id', 'Customer Id', 'required|max_length[8]|min_length[8]|is_unique[tbl_lead_contact_user.customer_id]');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Create Contact";
                $data['active2'] = "Active";
                $data['remote_id'] = $this->Contacts_model->fetchRemote();
                $data['sale_id'] = $this->Contacts_model->fetchSale();
                $data['worked_id'] = $this->Contacts_model->fetchWorked();
                $this->load->view('include/header', $data);
                $this->load->view('contact/createcontact', $data);
                $this->load->view('include/footer', $data);
            } else {
                $first_name = $this->input->post('first_name');
                $last_name = $this->input->post('last_name');
                $mobile_1 = $this->input->post('mobile_1');
                $mobile_2 = $this->input->post('mobile_2');
                $email = $this->input->post('email');
                $customer_id = $this->input->post('customer_id');
                if (empty($this->input->post('email_opt_out'))) {
                    $email_opt_out = 0;
                } else {
                    $email_opt_out = $this->input->post('email_opt_out');
                }
                if (empty($this->input->post('plan_status'))) {
                    $plan_status = 0;
                } else {
                    $plan_status = $this->input->post('plan_status');
                }
                $plan = $this->input->post('plan');
                $amount = $this->input->post('amount');
                $remote_id = $this->input->post('remote_id');
                $sale_id = $this->input->post('sale_id');
                $worked_id = $this->input->post('worked_id');
                $work_status = $this->input->post('work_status');
                if (empty($this->input->post('courtesy'))) {
                    $courtesy = 1;
                } else {
                    $courtesy = $this->input->post('courtesy');
                }
                if (empty($this->input->post('bbb'))) {
                    $bbb = 0;
                } else {
                    $bbb = $this->input->post('bbb');
                }
                if (empty($this->input->post('ha'))) {
                    $ha = 0;
                } else {
                    $ha = $this->input->post('ha');
                }
                if (empty($this->input->post('fb'))) {
                    $fb = 0;
                } else {
                    $fb = $this->input->post('fb');
                }
                if (empty($this->input->post('google'))) {
                    $google = 0;
                } else {
                    $google = $this->input->post('google');
                }
                if (empty($this->input->post('service'))) {
                    $service = 0;
                } else {
                    $service = $this->input->post('service');
                }
                $sale_date = $this->input->post('sale_date');
                $expiry_date = $this->input->post('expiry_date');
                $description = $this->input->post('description');
                $created_date = date('Y-m-d,h:i:s');
                $insert = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'mobile_1' => $mobile_1,
                    'mobile_2' => $mobile_2,
                    'email' => $email,
                    'customer_id' => $customer_id,
                    'email_opt_out' => $email_opt_out,
                    'plan_status' => $plan_status,
                    'plan' => $plan,
                    'amount' => $amount,
                    'remote_id' => $remote_id,
                    'sale_id' => $sale_id,
                    'worked_id' => $worked_id,
                    'work_status' => $work_status,
                    'courtesy' => $courtesy,
                    'bbb' => $bbb,
                    'ha' => $ha,
                    'fb' => $fb,
                    'google' => $google,
                    'service' => $service,
                    'sale_date' => $sale_date,
                    'expiry_date' => $expiry_date,
                    'description' => $description,
                    'created_date' => $created_date,
                    'user_type'    => 2,
                    'lead_status' => 2,
                    'user_id'      => $data['user_detail']->id
                );
                if($this->getLeadUnqiue($email,$mobile_1))
                {
                        $_SESSION['error'] = "This Lead already exist";
                        redirect(base_url() . 'create-contact?error='.base64_encode(json_encode($insert)));
                }
                else
                {

                    
                $res = $this->Contacts_model->insertData($insert);
              
                // log activity 
                $insert_id = $this->db->insert_id();
                $user_id           = $data['user_detail']->id;
                $id           = $insert_id;
                $log_title         = "Add Contact  - " . json_encode($insert);
                $log_create        = app_log_manage($user_id, $id, $log_title);
                // log activity ;
                $this->welcome($first_name, $last_name, $email, $customer_id,$insert_id,$user_id);
                 
                if ($res) {  
                  
                    $_SESSION['done'] = "Contact Added successfully";
                    redirect(base_url() . 'create-contact');
                } else {
                    
                    $_SESSION['error'] = "Contact Not Added successfully";
                    redirect(base_url() . 'create-contact');
                }
            }
        }
        }
    }
    public function welcome($first_name, $last_name, $email, $customer_id,$insert_id,$user_id)
    {
        $data['user_detail'] = $this->auth->user_info();
        $activeMail = active_mail()[0];
        // send email invoice 
        $toName = $first_name.' '.$last_name;
        $toEmail = $email;
        $fromName = $activeMail->sender_name;
        $fromEmail = $activeMail->sender_email;
        $subject = 'Trust Haven Welcome';
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
            "htmlContent" => '<body marginheight="0" marginwidth="0" topmargin="0" leftmargin="0" style="height: 100% !important; margin: 0; padding: 0; width: 100% !important;min-width: 100%;"> <table name="bmeMainBody" style="background-color: #fff;" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#fff"> <tbody> <tr> <td width="100%" valign="top" align="center"> <table name="bmeMainColumnParentTable" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="bmeMainColumnParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px;"> <table name="bmeMainColumn" class="" style="max-width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"> <tbody> <tr> <td class="bmeHolder" name="bmeMainContentParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;" width="100%" valign="top" align="center"> <table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"> <tbody> <tr> <td class="blk_container bmeHolder" name="bmeHeader" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: #f2f2f2; padding: 30px 0;" width="100%" valign="top" bgcolor="#34495e" align="center"> <div id="dv_9" class="blk_wrapper"> <table class="blk" name="blk_image" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td class="bmeImage" style="border-collapse: collapse; padding:20px 20px;" align="center"> <img src="https://www.trusthavensolution.com/assets/images/ths-logo.png" style="max-width: 237px; display: block; width: 100%;" alt="" width="100%" border="0" /> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> <tr> <td class="blk_container bmeHolder" name="bmeBody" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: #fff;" width="100%" valign="top" bgcolor="#34495e" align="center"> <div id="dv_13" class="blk_wrapper"> <table class="blk" name="blk_divider" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td class="tblCellMain" style="padding: 5px 0px;"> <table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"> <div> <span style="font-size: 16px; color: #333; line-height: 150%;"> Dear '.$first_name.' '.$last_name.', </span> </div> </td> </tr> </tbody> </table> </td> </tr> <tr> <td class="tblCellMain" style="padding: 10px 0px;"> <table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: center;" valign="top" align="left"> <div style="line-height: 100%;"> <h2 style="color:#1ea5b4">Thank you for signing up with us!</h2> <p style="font-size:18px;">Here is your information:</p> </div> </td> </tr> </tbody> </table> </td> </tr> <tr> <td class="tblCellMain" style="padding: 10px 0px;"> <table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell"> <div style="background-color: #efe9e978; border-radius:15px;padding:10px 10px; display:flex;"> <div style="width:50%;  text-align:right;"> <p style="font-size:18px;">Name </p> <p style="font-size:18px;">E-mail Address </p> </div> <div style="width:50%; text-align:left;padding-left:20px;font-weight:700"> <p style="font-size:18px;">'.$first_name.' '.$last_name.'</p> <p style="font-size:18px;">'.$email.'</p> </div> </div> </td> </tr> </tbody> </table> </td> </tr> <tr> <td class="tblCellMain" style="padding: 10px 0px;"> <table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"> <div style="line-height: 100%;"> <p style="font-size: 16px; color: #333; line-height: 150%;"> If you would like to add or change your profile information, please call us on our help line number <br> 1-800-235-0122 or 1-800-518-9122.. </p> <p style="font-size: 16px; color: #333; line-height: 150%;"> This is to informe you that you are now a registered customer for {plan} with your '.$customer_id.' 848968. please make a copy of this '.$customer_id.'. We request you to please never share this ID with anyone. </p> <p style="font-size: 16px; color: #333; line-height: 150%;"> In case of any issues please feel free to reach us on our toll free number  1-800-235-0122 or you can write us on mailto:help@trusthavensolution.com or for billing mailto:info@trusthavensolution.com. </p> <p style="font-size: 16px; color: #333; line-height: 150%;"> We look forword to assist you! </p> </div> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> <tr> <td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: #fff; padding-bottom: 30px;" width="100%" valign="top" bgcolor="#f2f2f2" align="center"> <div id="dv_10" class="blk_wrapper"> <table class="blk" name="blk_footer" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px;" valign="top" align="left"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="bmeBadgeText" style="text-align:left; padding-bottom: 4px;" align="left"> <span id="spnFooterText" style="font-weight: 600; font-size: 16px; ">Best regards,</span> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:left; padding-bottom: 4px;" align="left"><span id="spnFooterText" style="font-weight: 600; font-size: 16px; ">Trust Haven Solution Inc.</span> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:left;  padding-bottom: 4px;" align="left"><span id="spnFooterText" style="font-weight: 600; font-size: 16px; "><a href="http://trusthavensolution.com/">trusthavensolution.com</a> </span> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:left; padding-bottom: 4px;" align="left"><span style="font-weight: 600; font-size: 16px; ">1800-235-0122 </span> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> <tr> <td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(52, 73, 94);" width="100%" valign="top" bgcolor="#34495e" align="center"> <div id="dv_10" class="blk_wrapper"> <table class="blk" name="blk_footer" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:10px 20px;" valign="top" align="center"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"> <span id="spnFooterText" style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 23px; line-height: 140%; color: #fff;">Follow Us</span><br /><br /> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"> <a href="https://www.facebook.com/trustheavensolution/" target="_blank"><img src="'.base_url().'facebook.png" alt="facebook" style="max-width:22px"></a> <a href="https://www.instagram.com/trusthavensolution/" target="_blank"><img src="'.base_url().'instagram.png" alt="instagram" style="max-width:22px"></a> <a href="https://twitter.com/trust_haven1" target="_blank"><img src="'.base_url().'twitter.png" alt="twitter" style="max-width:22px;padding: 0 5px;"></a> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 12px; line-height: 140%; color: #fff;"> &copy; All rights reserved – Trust Haven Solution</p> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </body>'
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
            'lead_id' => $insert_id,
            'sender_id' => $activeMail->id,
            'user_id'   => $user_id,
            'module_type' => 5,
            'too' => $email,
            'subject' => "Welcome Email",
            'sent_by_email' => $activeMail->sender_email,
            'sent_by_name' => $activeMail->sender_name,
            'message' => $htmlMessage,
            'source_by' => 3,
            'lead_type' => 2,
            'api_response_id' => $api_response_id,
            'created_at' => date('Y-m-d h:i:s'),
            'mail_status' => 1
        );
        $save = $this->Lead_model->savehisoryEmail($insert);
        // send email invoice 
    }
    public function updateContact()
    {
        $customer_id = $this->input->post('customer_id');
        $orginal_customer_id = $this->input->post('original_customer_id');
        $is_unique = "";
        if($customer_id!=$orginal_customer_id)
        {
            $is_unique = "|is_unique[tbl_lead_contact_user.customer_id]";
        }
        $hidden_id = $this->input->post('hidden_id');
        $data['result'] = $this->Contacts_model->getContacts($hidden_id);
        
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('mobile_1', 'Phone Number', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('plan_status', 'Plan Status', 'required');
        $this->form_validation->set_rules('plan', 'Plan', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        $this->form_validation->set_rules('remote_id', 'Remote By', 'required');
        $this->form_validation->set_rules('sale_id', 'Sale By', 'required');
        // $this->form_validation->set_rules('worked_id', 'Worked By', 'required');
        $this->form_validation->set_rules('work_status', 'Work Status', 'required');
        // $this->form_validation->set_rules('sale_date', 'Sale Date', 'required');
        $this->form_validation->set_rules('expiry_date', 'Expiry Date', 'required');
        $this->form_validation->set_rules('customer_id', 'Customer Id', 'required|max_length[8]|min_length[8]'.$is_unique);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Create Contact";
            $data['active2'] = "Active";
            $data['remote_id'] = $this->Contacts_model->fetchRemote();
            $data['sale_id'] = $this->Contacts_model->fetchSale();
            $data['worked_id'] = $this->Contacts_model->fetchWorked();
            $data['plan_id'] = $this->Contacts_model->fetchPlan();
            $this->load->view('include/header', $data);
            $this->load->view('contact/createcontact', $data);
            $this->load->view('include/footer', $data);
        } else {
            $data['user_detail'] = $this->auth->user_info();
            
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $mobile_1 = $this->input->post('mobile_1');
        $mobile_2 = $this->input->post('mobile_2');
        $email = $this->input->post('email');
        $email_opt_out = $this->input->post('email_opt_out');
        $plan_status = $this->input->post('plan_status');
        $plan = $this->input->post('plan');
        $amount = $this->input->post('amount');
        $remote_id = $this->input->post('remote_id');
        $sale_id = $this->input->post('sale_id');
        $worked_id = $this->input->post('worked_id');
        $work_status = $this->input->post('work_status');
        $courtesy = $this->input->post('courtesy');
        $bbb = $this->input->post('bbb');
        $ha = $this->input->post('ha');
        $fb = $this->input->post('fb');
        $google = $this->input->post('google');
        $service = $this->input->post('service');
        $sale_date = $this->input->post('sale_date');
        $expiry_date = $this->input->post('expiry_date');
        $description = $this->input->post('description');
        $mod_date = date('Y-m-d,h:i:s');
        if($sale_date)
        {
            $sale_exp = explode('-',$sale_date);
            $sale_date = $sale_exp[0].'-'.$sale_exp[1].'-'.$sale_exp[2];
        }
        if($expiry_date)
        {
            $expiry_date_exp = explode('-',$expiry_date);
            $expiry_date = $expiry_date_exp[0].'-'.$expiry_date_exp[1].'-'.$expiry_date_exp[2];
        }
       // echo date('m-d-Y', strtotime($sale_date)); die;
        $update = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'mobile_1' => $mobile_1,
            'mobile_2' => $mobile_2,
            'email' => $email,
            'customer_id' => $customer_id,
            'email_opt_out' => $email_opt_out,
            'plan_status' => $plan_status,
            'plan' => $plan,
            'amount' => $amount,
            'remote_id' => $remote_id,
            'sale_id' => $sale_id,
            'worked_id' => $worked_id,
            'work_status' => $work_status,
            'courtesy' => $courtesy,
            'bbb' => $bbb,
            'ha' => $ha,
            'fb' => $fb,
            'google' => $google,
            'service' => $service,
            // 'sale_date' => $sale_date,
            'expiry_date' => $expiry_date,
            'description' => $description,
            'mod_date' => $mod_date,
            'user_type'    => 2,
            'lead_status' => 2,
            'user_id'      => $data['user_detail']->id
        );
        $check_expire_date = $this->Contacts_model->checkExpire_date($expiry_date,$hidden_id);
        if($check_expire_date)
        {
            $this->Contacts_model->expire_date_log($expiry_date,$sale_date,$hidden_id);
        }
        // $exist_user = $this->Contacts_model->checkUser($mobile_1, $email, $hidden_id);
        // if ($exist_user) {
        //     $this->session->set_flashdata('error', 'Email/Mobile No is Already Exist');
        //     redirect(base_url() . 'list-contact');
        //     exit();
        // }
        if($this->getLeadUnqiue($email,$mobile_1,$hidden_id))
        {
                $_SESSION['error'] = "This Lead already exist";
                redirect(base_url() . 'update-contact?id='.base64_encode($hidden_id).'&error='.base64_encode(json_encode($update)));
        }
        else
        {
        $res = $this->Contacts_model->updateContactdata($hidden_id, $update);
        // log activity 
        $insert_id = $hidden_id;
        $user_id           = $data['user_detail']->id;
        $id                = $insert_id;
        $log_title         = "Update Contact  - " . json_encode($update);
        $log_create        = app_log_manage($user_id, $id, $log_title);
        // log activity ;

       
        if ($res) {  
            $_SESSION['done'] = "Contact Updated successfully";
            redirect(base_url() . 'list-contact');
        } else {
            
            $_SESSION['error'] = "Contact Not Updated successfully";
            redirect(base_url() . 'list-contact');
        }
    }
    }
    }
    public function deleteContacts()
    {
        $data['user_detail'] = $this->auth->user_info();
        $delete_id = $this->input->post('leadIds');
        $sess = $this->Contacts_model->deleteContacts($delete_id);
        // log activity 
        $insert_id = $delete_id;
        $user_id           = $data['user_detail']->id;
        $id           = $insert_id;
        $log_title         = "Delete Contact id  - " . $id;
        $log_create        = app_log_manage($user_id, $id, $log_title);
        // log activity ;
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
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="' . base_url('list-contact') . '">';
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
        $data['email_list'] = $this->Sendmail_model->getEmailList($id,5);
        $data['email_list_draft'] = $this->Sendmail_model->getEmailList_draft($id,5);
        $data['activeSender'] = active_mail();
        $data['lead_detail'] = $this->Contacts_model->detailContacts($id);
        $data['first_name'] = $data['lead_detail'][0]->first_name;
        $data['last_name'] = $data['lead_detail'][0]->last_name;
        $data['user_id'] = $data['lead_detail'][0]->user_id;
        $data['user_name'] = $this->Contacts_model->GetuserNameContacts($data['user_id']);
        $data['lead_added_name'] = $data['user_name'][0]->name;
        $data['user_detail'] = $this->auth->user_info();
        $data['remote_id'] = $this->Contacts_model->fetchRemote();
        $data['sale_id'] = $this->Contacts_model->fetchSale();
        $data['worked_id'] = $this->Contacts_model->fetchWorked();
        $data['plan_id'] = $this->Contacts_model->fetchPlan();
        $data['title'] = "Detail Contact ";
        $data['active2'] = "Active";
        $this->load->view('include/header', $data);
        $this->load->view('contact/updatecontact', $data);
        $this->load->view('include/footer', $data);
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
        if (empty($this->input->post('customer_id_col'))) {
            $customer_id_col = 0;
        } else {
            $customer_id_col = $this->input->post('customer_id_col');
        }
        if (empty($this->input->post('email_opt_out_col'))) {
            $email_opt_out_col = 0;
        } else {
            $email_opt_out_col = $this->input->post('email_opt_out_col');
        }
        if (empty($this->input->post('plan_status_col'))) {
            $plan_status_col = 0;
        } else {
            $plan_status_col = $this->input->post('plan_status_col');
        }
        if (empty($this->input->post('plan_col'))) {
            $plan_col = 0;
        } else {
            $plan_col = $this->input->post('plan_col');
        }
        if (empty($this->input->post('amount_col'))) {
            $amount_col = 0;
        } else {
            $amount_col = $this->input->post('amount_col');
        }
        if (empty($this->input->post('remote_by_col'))) {
            $remote_by_col = 0;
        } else {
            $remote_by_col = $this->input->post('remote_by_col');
        }
        if (empty($this->input->post('sale_by_col'))) {
            $sale_by_col = 0;
        } else {
            $sale_by_col = $this->input->post('sale_by_col');
        }
        if (empty($this->input->post('worked_by_col'))) {
            $worked_by_col = 0;
        } else {
            $worked_by_col = $this->input->post('worked_by_col');
        }
        if (empty($this->input->post('work_status_col'))) {
            $work_status_col = 0;
        } else {
            $work_status_col = $this->input->post('work_status_col');
        }
        if (empty($this->input->post('courtesy_col'))) {
            $courtesy_col = 0;
        } else {
            $courtesy_col = $this->input->post('courtesy_col');
        }
        if (empty($this->input->post('bbb_col'))) {
            $bbb_col = 0;
        } else {
            $bbb_col = $this->input->post('bbb_col');
        }
        if (empty($this->input->post('ha_col'))) {
            $ha_col = 0;
        } else {
            $ha_col = $this->input->post('ha_col');
        }
        if (empty($this->input->post('fb_col'))) {
            $fb_col = 0;
        } else {
            $fb_col = $this->input->post('fb_col');
        }
        if (empty($this->input->post('google_col'))) {
            $google_col = 0;
        } else {
            $google_col = $this->input->post('google_col');
        }
        if (empty($this->input->post('service_col'))) {
            $service_col = 0;
        } else {
            $service_col = $this->input->post('service_col');
        }
        if (empty($this->input->post('sale_date_col'))) {
            $sale_date_col = 0;
        } else {
            $sale_date_col = $this->input->post('sale_date_col');
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
            'customer_id_col' => $customer_id_col,
            'email_opt_out_col' => $email_opt_out_col,
            'plan_status_col' => $plan_status_col,
            'plan_col' => $plan_col,
            'amount_col' => $amount_col,
            'remote_by_col' => $remote_by_col,
            'sale_by_col' => $sale_by_col,
            'worked_by_col' => $worked_by_col,
            'work_status_col' => $work_status_col,
            'courtesy_col' => $courtesy_col,
            'bbb_col' => $bbb_col,
            'bbb_col' => $bbb_col,
            'ha_col' => $ha_col,
            'fb_col' => $fb_col,
            'google_col' => $google_col,
            'service_col' => $service_col,
            'sale_date_col' => $sale_date_col,
            'description_col' => $description_col
        );
        if($this->Contacts_model->CheckUserManageColumn($data['user_detail']->id))
        {
            
        $sess = $this->Contacts_model->AddManageColumn($data['user_detail']->id, $update);
        if (!empty($sess)) {
            redirect(base_url('list-contact'));
        } else {
            redirect(base_url('list-contact'));
        }
        }
        else
        {
        $sess = $this->Contacts_model->manageColumn($data['user_detail']->id, $update);
        if (!empty($sess)) {
            redirect(base_url('list-contact'));
        } else {
            redirect(base_url('list-contact'));
        }
    }
    }
    public function detailPageedit()
    {
        $hidden_id = $this->input->post('hidden_id');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $mobile_1 = $this->input->post('mobile_1');
        $mobile_2 = $this->input->post('mobile_2');
        $email = $this->input->post('email');
        $customer_id = $this->input->post('customer_id');
        $email_opt_out = $this->input->post('email_opt_out');
        $plan_status = $this->input->post('plan_status');
        $plan = $this->input->post('plan');
        $amount = $this->input->post('amount');
        $remote_id = $this->input->post('remote_id');
        $sale_id = $this->input->post('sale_id');
        $worked_id = $this->input->post('worked_id');
        $work_status = $this->input->post('work_status');
        $courtesy = $this->input->post('courtesy');
        $bbb = $this->input->post('bbb');
        $ha = $this->input->post('ha');
        $fb = $this->input->post('fb');
        $google = $this->input->post('google');
        $description = $this->input->post('description');
        $service = $this->input->post('service');
        $sale_date = $this->input->post('sale_date');
        $expiry_date = $this->input->post('expiry_date');
   
        // echo $sale_date;die;
        // check email mobile 
        
       
        if($this->getLeadUnqiue($email,$mobile_1,$hidden_id))
        {
            echo 'Email/Mobile No is Already Exist';
            exit();
        }
        // check email mobile
        $update = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'mobile_1' => $mobile_1,
            'mobile_2' => $mobile_2,
            'email' => $email,
            'customer_id' => $customer_id,
            'email_opt_out' => $email_opt_out,
            'plan_status' => $plan_status,
            'plan' => $plan,
            'amount' => $amount,
            'remote_id' => $remote_id,
            'sale_id' => $sale_id,
            'worked_id' => $worked_id,
            'work_status' => $work_status,
            'courtesy' => $courtesy,
            'description' => $description,
            'bbb' => $bbb,
            'ha' => $ha,
            'fb' => $fb,
            'google' => $google,
            'service' => $service,
            'sale_date' => $sale_date,
            'expiry_date' => $expiry_date

        );
        // $exist_user = $this->Lead_model->checkUser($mobile_1, $email, $hidden_id);
        // if ($exist_user) {
        //     echo 'Email/Mobile No is Already Exist';
        //     exit();
        // }
        $check_expire_date = $this->Contacts_model->checkExpire_date($expiry_date,$hidden_id);
        if($check_expire_date)
        {
            $this->Contacts_model->expire_date_log($expiry_date,$sale_date,$hidden_id);
        }
        $sess = $this->Contacts_model->updateDetail($hidden_id, $update);
        $data['user_detail'] = $this->auth->user_info();
        // log activity 
        $insert_id = $hidden_id;
        $user_id           = $data['user_detail']->id;
        $id           = $insert_id;
        $log_title         = "Update Contact Detail Page  - " . json_encode($update);
        $log_create        = app_log_manage($user_id, $id, $log_title);
        // log activity ;
        if (!empty($sess)) {
            ' updated';
        } else {
            ' not updated';
        }
    }
    public function welcome_template()
    {
        $this->load->view('contact/welcome-template');
    }
    /*Health PC Checkup*/
    public function monthly_checkup()
    {
        $Firstname = 'Ankit ';
        $Lastname = 'Jaiswal';
        $toName = $Firstname . $Lastname;
        $toEmail = 'fazlu.cotginanalytics@gmail.com';
        $fromName = 'Trust Haven Solution Inc.';
        $fromEmail = 'ankit.cotginanalytics@gmail.com';
        $subject = 'Reminder for monthly PC Check up';
        $organization_name = 'Trust Haven Solution';
        $organization_phone = '1-800-235-0122';
        $htmlMessage = '<body marginheight="0" marginwidth="0" topmargin="0" leftmargin="0" style="height: 100% !important; margin: 0; padding: 0; width: 100% !important;min-width: 100%;"><table name="bmeMainBody" style="background-color: #fff;" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#fff"><tbody><tr><td width="100%" valign="top" align="center"><table name="bmeMainColumnParentTable" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="bmeMainColumnParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px;"><table name="bmeMainColumn" class="" style="max-width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr><td class="bmeHolder" name="bmeMainContentParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;" width="100%" valign="top" align="center"><table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr><td class="blk_container bmeHolder" name="bmeHeader" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: #f2f2f2; padding: 30px 0;" width="100%" valign="top" bgcolor="#34495e" align="center"><div id="dv_9" class="blk_wrapper"><table class="blk" name="blk_image" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="bmeImage" style="border-collapse: collapse; padding:20px 20px;" align="center"><img src="https://www.trusthavensolution.com/assets/images/ths-logo.png" style="max-width: 237px; display: block; width: 100%;" alt="" width="100%" border="0" /></td></tr></tbody></table></td></tr></tbody></table></div></td></tr><tr><td class="blk_container bmeHolder" name="bmeBody" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: #fff;" width="100%" valign="top" bgcolor="#34495e" align="center"><div id="dv_11" class="blk_wrapper"><table class="blk" name="blk_text" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td><table class="bmeContainerRow" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="tdPart" valign="top" align="center"><table name="tblText" style="float:left; background-color:transparent;" width="600" cellspacing="0" cellpadding="0" border="0" align="left"><tbody><tr><td name="tblCell" style="padding:10px 20px 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"><div style="line-height: 200%;"><span style="color: #333; line-height: 200%; font-weight: 600;">Reminder for monthly PC Check up</span></div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></div><div id="dv_13" class="blk_wrapper"><table class="blk" name="blk_divider" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="tblCellMain" style="padding: 5px 0px;"><table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;"  width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"><div style="line-height: 200%;"><span style="font-size: 16px; line-height: 200%;">Dear ' . $toName . '</span></div></td></tr></tbody></table></td></tr><tr><td class="tblCellMain" style="padding: 5px 0px;"><table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"> <div> <span style="font-size: 16px; color: #333; line-height: 150%;">This is Kevin from Trust Haven Solution. I hope this email finds you safe and well. In this email, we just wanted to inform you that as you are registered for our services, so you are eligible for the monthly PC checkup. So please do call to get your monthly checkup or to book an appointment simply reply to this email with the best date and time to contact you. <br><br><b> KINDLY IGNORE THIS EMAIL IF YOU HAVE ALREADY DONE WITH YOUR MONTHLY SERVICE.</b> </span></div></td></tr></tbody></table></td></tr><tr><td class="tblCellMain" style="padding: 10px 0px;"><table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="tblCell"  style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"><div style="line-height: 100%;"> <span style="font-size: 16px; color: #333; line-height: 150%;">And make sure that if you get a call regarding monthly PC check up so please make sure to ask your customer ID number. In case of any queries please feel free to reach us on our toll-free number 1-800-235-0122 or write to us at help@trusthavensolution.com.</span></div></td></tr></tbody></table></td></tr></tbody></table></div></td></tr><tr><td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: #fff; padding-bottom: 30px;"width="100%" valign="top" bgcolor="#f2f2f2" align="center"><div id="dv_10" class="blk_wrapper"><table class="blk" name="blk_footer" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="tblCell" style="padding:0px 20px;" valign="top" align="left"><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"><span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">Thanks & Regards:</span></span></td></tr><tr><td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"><span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">' . $organization_name . '</span> </span></td></tr><tr><td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"><span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">' . $organization_phone . '</span></span></td></tr></tbody></table></td></tr></tbody></table></div></td></tr><tr><td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(52, 73, 94);" width="100%" valign="top" bgcolor="#34495e"
        align="center"><div id="dv_10" class="blk_wrapper"><table class="blk" name="blk_footer" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr>
        <td name="tblCell" style="padding:10px 20px;" valign="top" align="center"><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"><span id="spnFooterText" style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 23px; line-height: 140%; color: #fff;">Follow Us</span><br /><br /></td></tr><tr><td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"><a href="https://www.facebook.com/trustheavensolution/" target="_blank"><img src="' . base_url() . 'facebook.png" alt="facebook" style="max-width:22px"></a><a href="https://www.instagram.com/trusthavensolution/" target="_blank"><img src="' . base_url() . 'instagram.png" alt="instagram" style="max-width:22px"></a><a href="https://twitter.com/trust_haven1"target="_blank"><img src="' . base_url() . 'twitter.png" alt="twitter"style="max-width:22px;padding: 0 5px;"></a></td></tr><tr><td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"><p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 12px; line-height: 140%; color: #fff;"> &copy; All rights reserved – Trust Haven Solution</p></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></body>';
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
            "htmlContent" => '<html><head></head>' . $htmlMessage . '</html>'
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
        print_r($result);
        curl_close($ch);
    }
    /*Health PC Checkup*/
    /*Scheduled Maintenance*/
    public function scheduled_maintenance()
    {
        $Firstname = 'Ankit ';
        $Lastname = 'Jaiswal';
        $toName = $Firstname . $Lastname;
        $toEmail = 'ankit.cotginanalytics@gmail.com';
        $fromName = 'Trust Haven Solution Inc.';
        $fromEmail = 'fazlu.cotginanalytics@gmail.com';
        $subject = 'Scheduled Maintenance';
        $shedule_date = date('F d, Y');
        $organization_name = 'Trust Haven Solution';
        $organization_phone = '1-800-235-0122';
        $htmlMessage = '<body marginheight="0" marginwidth="0" topmargin="0" leftmargin="0" style="height: 100% !important; margin: 0; padding: 0; width: 100% !important;min-width: 100%;"><table name="bmeMainBody" style="background-color: #fff;" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#fff"><tbody><tr><td width="100%" valign="top" align="center"><table name="bmeMainColumnParentTable" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="bmeMainColumnParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px;"><table name="bmeMainColumn" class="" style="max-width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr><td class="bmeHolder" name="bmeMainContentParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;" width="100%" valign="top" align="center"><table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr><td class="blk_container bmeHolder" name="bmeHeader" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: #f2f2f2; padding: 30px 0;" width="100%" valign="top" bgcolor="#34495e" align="center"><div id="dv_9" class="blk_wrapper"><table class="blk" name="blk_image" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="bmeImage" style="border-collapse: collapse; padding:20px 20px;" align="center"><img src="https://www.trusthavensolution.com/assets/images/ths-logo.png" style="max-width: 237px; display: block; width: 100%;" alt="" width="100%" border="0" /></td></tr></tbody></table></td></tr></tbody></table></div></td></tr><tr><td class="blk_container bmeHolder" name="bmeBody" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: #fff;" width="100%" valign="top" bgcolor="#34495e" align="center"><div id="dv_11" class="blk_wrapper"><table class="blk" name="blk_text" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td><table class="bmeContainerRow" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="tdPart" valign="top" align="center"><table name="tblText" style="float:left; background-color:transparent;" width="600" cellspacing="0" cellpadding="0" border="0" align="left"><tbody><tr><td name="tblCell" style="padding:10px 20px 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: center;" valign="top" align="left"><div style="line-height: 200%;"><span style="font-size: 20px; color: #333; line-height: 200%; font-weight: 600;">Scheduled Maintenance</span></div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></div><div id="dv_13" class="blk_wrapper"><table class="blk" name="blk_divider" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="tblCellMain" style="padding: 5px 0px;"><table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"><div style="line-height: 200%;"><span style="font-size: 16px; color: #333; line-height: 200%;">Dear ' . $toName . ' </span></div></td></tr></tbody></table></td></tr><tr><td class="tblCellMain" style="padding: 5px 0px;"><table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"> <div> <span style="font-size: 16px; color: #333; line-height: 150%;">This is to inform you that we will not be able to serve you as on ' . $shedule_date . ' due to the Scheduled Maintenance of our internal systems. <br><br> We apologise for the inconvenience, but in case of emergency you can leave us a voice message or write us on our support email and we will get back to you ASAP.</span> </div> </td> </tr> </tbody> </table> </td> </tr> <tr> <td class="tblCellMain" style="padding: 10px 0px;"> <table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"> <div style="line-height: 100%;"> <span style="font-size: 16px; color: #333; line-height: 150%;">In case of any further queries please feel free to reach us on our toll free number ' . $organization_phone . ' or you can write us on help@trusthavensolution.com <br><br></span> </div> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> <tr> <td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: #fff; padding-bottom: 30px;"width="100%" valign="top" bgcolor="#f2f2f2" align="center"> <div id="dv_10" class="blk_wrapper"> <table class="blk" name="blk_footer" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px;" valign="top" align="left"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"> <span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">Regards:</span> </span> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"> <span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">' . $organization_name . '</span> </span> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"> <span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">' . $organization_phone . '</span> </span> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> <tr> <td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(52, 73, 94);" width="100%" valign="top" bgcolor="#34495e" align="center"> <div id="dv_10" class="blk_wrapper"> <table class="blk" name="blk_footer" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:10px 20px;" valign="top" align="center"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"> <span id="spnFooterText" style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 23px; line-height: 140%; color: #fff;">Follow Us</span><br /><br /> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"> <a href="https://www.facebook.com/trustheavensolution/" target="_blank"><img src="' . base_url() . 'facebook.png" alt="facebook" style="max-width:22px"></a><a href="https://www.instagram.com/trusthavensolution/" target="_blank"><img src="' . base_url() . 'instagram.png" alt="instagram" style="max-width:22px"></a><a href="https://twitter.com/trust_haven1"target="_blank"><img src="' . base_url() . 'twitter.png" alt="twitter"style="max-width:22px;padding: 0 5px;"></a> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 12px; line-height: 140%; color: #fff;"> &copy; All rights reserved – Trust Haven Solution</p> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </body>';
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
            "htmlContent" => '<html><head></head>' . $htmlMessage . '</html>'
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
        print_r($result);
        curl_close($ch);
    }
    /*Scheduled Maintenance*/
    /*Follow Up*/
    public function follow_up()
    {
        $firstname = 'Ankit ';
        $lastname = 'Jaiswal';
        $toName = $firstname . $lastname;
        $toEmail = 'ankit.cotginanalytics@gmail.com';
        $fromName = 'Trust Haven Solution Inc.';
        $fromEmail = 'noreply@trusthavensolution.com';
        $subject = 'Follow Up';
        $organization_name = 'Trust Haven Solution';
        $organization_phone = '1-800-235-0122';
        $htmlMessage = '<body marginheight="0" marginwidth="0" topmargin="0" leftmargin="0" style="height: 100% !important; margin: 0; padding: 0; width: 100% !important;min-width: 100%;"><table name="bmeMainBody" style="background-color: #fff;" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#fff"><tbody><tr> <td width="100%" valign="top" align="center"> <table name="bmeMainColumnParentTable" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="bmeMainColumnParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px;"> <table name="bmeMainColumn" class="" style="max-width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"> <tbody> <tr> <td class="bmeHolder" name="bmeMainContentParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;" width="100%" valign="top" align="center"> <table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"> <tbody> <tr> <td class="blk_container bmeHolder" name="bmeHeader" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: #f2f2f2; padding: 30px 0;" width="100%" valign="top" bgcolor="#34495e" align="center"> <div id="dv_9" class="blk_wrapper"> <table class="blk" name="blk_image" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td class="bmeImage" style="border-collapse: collapse; padding:20px 20px;" align="center"> <img src="https://www.trusthavensolution.com/assets/images/ths-logo.png" style="max-width: 237px; display: block; width: 100%;" alt="" width="100%" border="0" /> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> <tr> <td class="blk_container bmeHolder" name="bmeBody" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: #fff;" width="100%" valign="top" bgcolor="#34495e" align="center"> <div id="dv_13" class="blk_wrapper"> <table class="blk" name="blk_divider" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td class="tblCellMain" style="padding: 5px 0px;"> <table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"> <div> <span style="font-size: 16px; color: #333; line-height: 150%;"> Dear ' . $firstname . ' ' . $lastname . ', <br><br> This is Kevin from Trust Haven Solution. I hope you are doing great. This is just to check if everything is working fine with your computer since we have fixed it for you. In case if you need any kind of help please do call us on our toll free number ' . $organization_phone . ' or you can write us back to this email. </span> </div> </td> </tr> </tbody> </table> </td> </tr> <tr> <td class="tblCellMain" style="padding: 10px 0px;"> <table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"> <div style="line-height: 100%;"> <span style="font-size: 16px; color: #333; line-height: 150%;">Your feedback is valuable to us, so we will be waiting for your valuable response.</span> </div> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> <tr> <td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: #fff; padding-bottom: 30px;"width="100%" valign="top" bgcolor="#f2f2f2" align="center"> <div id="dv_10" class="blk_wrapper"> <table class="blk" name="blk_footer" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px;" valign="top" align="left"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"> <span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">Thanks & Regards:</span> </span> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"> <span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">' . $organization_name . '</span> </span> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"> <span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">' . $organization_phone . '</span> </span> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> <tr> <td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(52, 73, 94);" width="100%" valign="top" bgcolor="#34495e" align="center"> <div id="dv_10" class="blk_wrapper"> <table class="blk" name="blk_footer" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:10px 20px;" valign="top" align="center"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"> <span id="spnFooterText" style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 23px; line-height: 140%; color: #fff;">Follow Us</span><br /><br /> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"> <a href="https://www.facebook.com/trustheavensolution/" target="_blank"><img src="' . base_url() . 'facebook.png" alt="facebook" style="max-width:22px"></a> <a href="https://www.instagram.com/trusthavensolution/" target="_blank"><img src="' . base_url() . 'instagram.png" alt="instagram" style="max-width:22px"></a> <a href="https://twitter.com/trust_haven1"target="_blank"><img src="' . base_url() . 'twitter.png" alt="twitter"style="max-width:22px;padding: 0 5px;"></a> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 12px; line-height: 140%; color: #fff;"> &copy; All rights reserved – Trust Haven Solution</p> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </body>';
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
            "htmlContent" => '<html><head><title>Trust Haven Solution</title></head>' . $htmlMessage . '</html>'
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
        print_r($result);
        curl_close($ch);
    }
    /*Follow Up*/
    /*Cancellation*/
    public function cancellation()
    {
        $firstname = 'Ankit ';
        $lastname = 'Jaiswal';
        $toName = $firstname . $lastname;
        $toEmail = 'ankit.cotginanalytics@gmail.com';
        $fromName = 'Trust Haven Solution Inc.';
        $fromEmail = 'noreply@trusthavensolution.com';
        $subject = 'Cancellation of your service contract';
        $cancellation_date =  date('Y-m-d');
        $organization_name = 'Trust Haven Solution';
        $organization_phone = '1-800-235-0122';
        $sender_name = 'Kelvin';
        $htmlMessage = '<body marginheight="0" marginwidth="0" topmargin="0" leftmargin="0" style="height: 100% !important; margin: 0; padding: 0; width: 100% !important;min-width: 100%;"><table name="bmeMainBody" style="background-color: #fff;" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#fff"><tbody><tr><td width="100%" valign="top" align="center"><table name="bmeMainColumnParentTable" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="bmeMainColumnParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px;"><table name="bmeMainColumn" class="" style="max-width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr><td class="bmeHolder" name="bmeMainContentParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;" width="100%" valign="top" align="center"><table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr><td class="blk_container bmeHolder" name="bmeHeader" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: #f2f2f2; padding: 30px 0;" width="100%" valign="top" bgcolor="#34495e" align="center"> <div id="dv_9" class="blk_wrapper"> <table class="blk" name="blk_image" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td class="bmeImage" style="border-collapse: collapse; padding:20px 20px;" align="center"> <img src="https://www.trusthavensolution.com/assets/images/ths-logo.png" style="max-width: 237px; display: block; width: 100%;" alt="" width="100%" border="0" /> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> <tr> <td class="blk_container bmeHolder" name="bmeBody" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: #fff;" width="100%" valign="top" bgcolor="#34495e" align="center"> <div id="dv_11" class="blk_wrapper"> <table class="blk" name="blk_text" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td> <table class="bmeContainerRow" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td class="tdPart" valign="top" align="center"> <table name="tblText" style="float:left; background-color:transparent;" width="600" cellspacing="0" cellpadding="0" border="0" align="left"> <tbody> <tr> <td name="tblCell" style="padding:10px 20px 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"> <div style="line-height: 200%;"> <span style="font-size: 20px; color: #333; line-height: 200%; font-weight: 600;">Cancellation of your service contract</span> </div> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> <div id="dv_13" class="blk_wrapper"> <table class="blk" name="blk_divider" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td class="tblCellMain" style="padding: 5px 0px;"> <table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"> <div style="line-height: 200%;"> <span style="font-size: 16px; color: #333; line-height: 200%;">Hi ' . $toName . ' </span> </div> </td> </tr> </tbody> </table> </td> </tr> <tr> <td class="tblCellMain" style="padding: 5px 0px;"> <table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"> <div style="line-height: 200%;"> <span style="font-size: 16px; color: #333; line-height: 200%;">This is ' . $sender_name . ' from Billing Team of Trust Haven Solution. I hope you are doing great . This email is to inform that we received your email wherein you mentioned that you cancelled the service , we try to call you to discuss about the same however your number is not reachable.</span> </div> </td> </tr> </tbody> </table> </td> </tr> <tr> <td class="tblCellMain" style="padding: 10px 0px;"> <table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"> <div style="line-height: 200%;"> <span style="font-size: 16px; color: #333; line-height: 200%;">Please call us back on our toll free number ' . $organization_phone . ' ASAP so we will take action accordingly or you can write us on info@trusthavensolution.com</span> </div> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> <tr> <td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: #fff; padding-bottom: 30px;"width="100%" valign="top" bgcolor="#f2f2f2" align="center"> <div id="dv_10" class="blk_wrapper"> <table class="blk" name="blk_footer" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px;" valign="top" align="left"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"> <span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">Best wishes:</span> </span> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"> <span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">Billing Team</span> </span> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"> <span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">' . $organization_name . '</span> </span> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"> <span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">' . $organization_phone . '</span> </span> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"> <span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">Email : info@trusthavensolution.com</span> </span> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> <tr> <td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(52, 73, 94);" width="100%" valign="top" bgcolor="#34495e" align="center"> <div id="dv_10" class="blk_wrapper"> <table class="blk" name="blk_footer" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:10px 20px;" valign="top" align="center"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"> <span id="spnFooterText" style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 23px; line-height: 140%; color: #fff;">Follow Us</span><br /><br /> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"> <a href="https://www.facebook.com/trustheavensolution/" target="_blank"><img src="' . base_url() . 'facebook.png" alt="facebook" style="max-width:22px"></a> <a href="https://www.instagram.com/trusthavensolution/" target="_blank"><img src="' . base_url() . 'instagram.png" alt="instagram" style="max-width:22px"></a> <a href="https://twitter.com/trust_haven1"target="_blank"><img src="' . base_url() . 'twitter.png" alt="twitter"style="max-width:22px;padding: 0 5px;"></a> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 12px; line-height: 140%; color: #fff;"> &copy; All rights reserved – Trust Haven Solution</p> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </body>';
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
            "htmlContent" => '<html><head><title>Trust Haven Solution</title></head>' . $htmlMessage . '</html>'
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
        print_r($result);
        curl_close($ch);
    }
    /*Cancellation*/

    
public function getLeadUnqiue($email,$mobile,$lead_id="")
{
    if($this->Lead_model->getDuplicateLead($email,$mobile,$lead_id))
       {
        return true;
       }
}

}
