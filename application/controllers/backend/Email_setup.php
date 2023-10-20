<?php
defined('BASEPATH') or exit('direct script no access allowed');

class Email_setup extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        if(($this->auth->user_info()->role_id!=1) && ($this->auth->user_info()->role_id!=4))
        {
            redirect(base_url());
        }
        $this->load->model('Emailsetup_model', 'EmailModel');
    }

    public function index()
    {
        $data['user_detail'] = $this->auth->user_info();
        $data['title'] = "Email Setup";
        $this->load->view('include/header', $data);
        $this->load->view('email_setup/dashboard', $data);
        $this->load->view('include/footer',$data);
    }

    public function create_email()
    {
        $data['user_detail'] = $this->auth->user_info();
        $data['emailData'] = $this->EmailModel->getdata();
        //edit
        $edit_id = ($_GET['edit']) ? base64_decode($_GET['edit']) : "";
        if ($edit_id) {
            $email_info = $this->EmailModel->getEmailInfo($edit_id)[0];
        }
        $data['email_info'] = $email_info;
        $data['edit_id']       = $edit_id;
        //email
        $data['title'] = "Create - Email Setup";
        $this->load->view('include/header', $data);
        $this->load->view('email_setup/create', $data);
        $this->load->view('include/footer',$data);
    }

    public function create_store()
    {
        $data['user_detail'] = $this->auth->user_info();
        if (isset($_POST['create_mail'])) {
            $this->form_validation->set_rules('sender_name', 'Sender Name', 'required');
            $this->form_validation->set_rules('sender_email', 'Sender Email', 'required|valid_email');
            $this->form_validation->set_rules('organization_phone', 'Organization Phone No', 'required');
            $this->form_validation->set_rules('sender_status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Email Setup";
                $this->load->view('include/header', $data);
                $this->load->view('email_setup/create', $data);
                $this->load->view('include/footer',$data);
            } else {
                $sendername = $this->input->post('sender_name');
                $senderemail = $this->input->post('sender_email');
                $organization_phone = $this->input->post('organization_phone');
                $senderstatus = $this->input->post('sender_status');
                $created_date = date('Y-m-d,h:i:s');
                if ($this->input->post('edit_id')) {
                    //edit
                    $checkEmail = $this->EmailModel->getSenderemail($this->input->post('sender_email'), $this->input->post('edit_id'));
                    if ($checkEmail) {
                        
                        $_SESSION['error'] = "Email already exist !";
                        redirect(base_url() . 'email-setup/create?edit=' . base64_encode($this->input->post('edit_id')));
                    }
                    $updateQry = array(
                        'sender_name' => $sendername,
                        'sender_email' => $senderemail,
                        'organization_phone' => $organization_phone,
                        'status' => $senderstatus,
                        'created_date' => $created_date
                    );
                    $user_update = $this->EmailModel->editSenderEmail($updateQry, $this->input->post('edit_id'));
                    // log activity 
                    $insert_id = $this->input->post('edit_id');
                    $user_id           = $data['user_detail']->id;
                    $id           = $insert_id;
                    $log_title         = "Update Sender Email - " . $sendername;
                    $log_create        = app_log_manage($user_id, $id, $log_title);
                    // log activity 
                    if ($user_update) {
                        
                        $_SESSION['done'] = "Email Updated Successfully !";
                        redirect(base_url() . 'email-setup/create');
                    } else {
                        
                        $_SESSION['error'] = "Sender Email Not Update !";
                        redirect(base_url() . 'email-setup/create?edit=' . base64_encode($this->input->post('edit_id')));
                    }
                    //edit
                } else {
                    $insert = array(
                        'sender_name' => $sendername,
                        'sender_email' => $senderemail,
                        'organization_phone' => $organization_phone,
                        'status' => $senderstatus,
                        'created_date' => $created_date
                    );
                    $res = $this->EmailModel->insert_db($insert);
                    // log activity 
                    $insert_id = $this->db->insert_id();
                    $user_id           = $data['user_detail']->id;
                    $id           = $insert_id;
                    $log_title         = "Add Sender Email  - " . json_encode($insert);
                    $log_create        = app_log_manage($user_id, $id, $log_title);
                    // log activity ;
                    if ($res) {
                        
                        $_SESSION['done'] = "New Email was Added successfully";
                        redirect(base_url() . 'email-setup/create');
                    } else {
                        
                        $_SESSION['error'] = "Some Technical Error While adding new email";
                        redirect(base_url() . 'email-setup/create');
                    }
                }
            }
        }
    }
    //UPDATE SENDER EMAIL
    public function update_status()
    {
        $data['user_detail'] = $this->auth->user_info();
        $sender_id = $this->input->post('sender_id');
        $status = $this->input->post('status');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sender_id', 'Sender ID', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false) {
            echo 'Validation failed. Sender ID and Status are required.';
            return;
        }
        $res = $this->EmailModel->update_one_status($sender_id, $status);
        if ($res) {
            echo 1;
        } else {
            echo 2;
        }
    }

    //UPDATE Email Status
    public function update_emailstatus()
    {
        $data['user_detail'] = $this->auth->user_info();
        $status_id = $this->input->post('status_id');
        $status = $this->input->post('status');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('status_id', 'Status ID', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false) {
            echo 'Validation failed. Sender ID and Status are required.';
            return;
        } else {
            $sender_status = $this->EmailModel->get_sender_status($status_id);
            $result = $this->EmailModel->update_status($status_id, $status, $sender_status);
            if ($result === true) {
                echo 'Status updated successfully.';
            } else {
                echo $result;
            }
        }
    }
    //DELETE 
    public function sender_delete_status()
    {
        $data['user_detail'] = $this->auth->user_info();
        $remote_id = $this->input->post('id', 'required');
        $status    = $this->input->post('status', 'required');
        //log activity 
        $insert_id = $this->input->post('id');
        $user_id           = $data['user_detail']->id;
        $id           = $insert_id;
        $log_title         = "Delete Sender id - " . $id;
        $log_create        = app_log_manage($user_id, $id, $log_title);
        //log activity
        if (!empty($remote_id) && !empty($status)) {
            $this->EmailModel->update_senderdelete_status($remote_id, $status);
        }
    }

    public function all_leads()
    {
        $data['user_detail'] = $this->auth->user_info();
        // pagination with listing
        $link = base_url() . "email-setup/all-leads";
        $limit = 10;
        $segment = $this->input->get('page');
        if(!empty($this->input->get('s'))){
            $total_record = $this->EmailModel->all_leads_count_search($this->input->get('s'));
            $result = $this->EmailModel->all_leads_search($limit, $segment,$this->input->get('s'));
        }else{
            $total_record = $this->EmailModel->all_leads_count();
            $result = $this->EmailModel->all_leads($limit, $segment);
        }
        $parms = array(
            'limit' => $limit,
            'segment' => $segment,
            'total_record' => count($total_record),
            'result' => $result,
            'link' => $link
        );
        $data['pagination'] = $this->pagination_setup($parms);
        $data['all_leads'] = $result;
        $data['segment'] = $segment;
        $data['links'] = $data['pagination']['links'];
        // pagination with listing
        $data['title'] = "All Leads ";
        $this->load->view('include/header', $data);
        $this->load->view('email_setup/allead', $data);
        $this->load->view('include/footer',$data);
    }

    public function lead_email_history(){
        $id = '';
        $lead_type='';
        $id  = base64_decode($this->input->get('email_history_id'));
        $lead_type  = base64_decode($this->input->get('lead_type'));
        $data['user_detail'] = $this->auth->user_info();
        // pagination with listing
        $link = base_url() . "email-setup/lead-email-history";
        $limit = 10;
        $segment = $this->input->get('page');
        if(!empty($this->input->get('s'))){
            $total_record = $this->EmailModel->all_leads_count_search($this->input->get('s'));
            $result = $this->EmailModel->all_leads_search($limit, $segment,$this->input->get('s'));
        }else{
            $total_record = $this->EmailModel->all_email_count($id,$lead_type);
            $result = $this->EmailModel->all_emails($limit, $segment,$id,$lead_type);
            // prx($result);
        }
        // prx($result);
        $parms = array(
            'limit' => $limit,
            'segment' => $segment,
            'total_record' => $total_record,
            'result' => $result,
            'link' => $link
        );
        $data['pagination'] = $this->pagination_setup($parms);
        $data['all_leads'] = $result;
        $data['segment'] = $segment;
        $data['links'] = $data['pagination']['links'];
        // pagination with listing
        $data['title'] = "Lead - Email History";
        $this->load->view('include/header', $data);
        $this->load->view('email_setup/leademailhistory', $data);
        $this->load->view('include/footer',$data);  
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
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="' . base_url('email-setup/all-leads') . '">';
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
