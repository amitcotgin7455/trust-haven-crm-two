<?php
defined('BASEPATH')OR exit('direct script no access allowed');

class Admin extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->library('auth');
        if(($this->auth->user_info()->role_id!=1) && ($this->auth->user_info()->role_id!=4))
        {
            redirect(base_url());
        }
        
        // prx($_COOKIE);
        $this->load->model('Lead_model','Lead');
        $this->load->model('Booking_model','Booking');
        $this->load->model('Security_model', 'SecurityModel');
        $this->load->model('User_model', 'UserList');
        $this->load->model('Invoice_model');
        
    }

    public function index(){
        $data['open_lead'] = $this->Lead->getLeadList(1);
        $data['close_lead'] = $this->Lead->getLeadList(2);
        // prx($data['close_lead']);
        $data['open_booking']  = $this->Booking->bookingType(1);
        $data['close_booking'] = $this->Booking->BookingType(2);
        $data['user_detail'] = $this->auth->user_info();
        $data['title'] = "Admin Dashboard";
        $data['active'] = "Active";
        $this->load->view('include/header',$data);
        $this->load->view('admin/demo_dashboard',$data);
        $this->load->view('include/footer',$data);
    }

    public function my_account()
    {
        
        $data['user_detail'] = $this->auth->user_info();
        if($data['user_detail']->role_id!=1)
        {
            redirect(base_url());
            exit();
        }
        $getRole = $this->SecurityModel->getRoleInfo();
        // {
        //     redirect(base_url('lead'));
        // }
        $data['role'] = $getRole;
        $data['title'] = "Manage Profile";
        $data['active1'] = "Active";
        $this->load->view('include/header', $data);
        $this->load->view('admin/my_account', $data);
        $this->load->view('include/footer',$data);
    }

    public function updateProfile()
    {
        $data['user_detail'] = $this->auth->user_info();
        if($data['user_detail']->role_id!=1)
        {
            redirect(base_url());
            exit();
        }
        if (isset($_POST['save'])) {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('mobile', 'Phone No', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Manage Profile";
                $data['active1'] = "Active";
                $this->load->view('include/header', $data);
                $this->load->view('admin/my_account', $data);
                $this->load->view('include/footer',$data);
            } else {
                $name = $this->input->post('name');
                $username = $this->input->post('username');
                $email = $this->input->post('email');
                $mobile = $this->input->post('mobile');
                $password = $this->input->post('password');
                $mod_date = date('Y-m-d,h:i:s');
                $checkUsername = $this->SecurityModel->checkUserName($username,$data['user_detail']->id);
                // if($checkUsername)
                // {
                //     $this->session->set_flashdata('error', 'Username already exist');
                //     redirect(base_url() . 'my-account');
                // }
                // else
                // {

                $insert = array(
                    'name' => $name,
                    //'username' => $username,
                    'email' => $email,
                    'mobile' => $mobile,
                    'mod_date' => $mod_date
                );
                
                if($password)
                {
                   $insert['password'] = md5($password);
                }
                $res = $this->SecurityModel->updateProfile($insert,$data['user_detail']->id);
                // log activity 
                $insert_id = 1;
                $user_id           = $data['user_detail']->id;
                $id           = $insert_id;
                $log_title         = "Account Update By Admin  - " . json_encode($insert);
                $log_create        = app_log_manage($user_id, $id, $log_title);
                // log activity ;
                if ($res) {
                    $_SESSION['done'] = "Profile Updated ";
                    redirect(base_url() . 'my-account');
                } else {
                    $_SESSION['error'] = "Profile not updated";
                    redirect(base_url() . 'my-account');
                }
           // }
        }
        }
    }


    public function demo_dashboard(){
        $data['open_lead'] = $this->Lead->getLeadList(1);
        $data['close_lead'] = $this->Lead->getLeadList(2);
        
        $data['open_booking'] = $this->Booking->bookingType(1);
        $data['close_booking'] = $this->Booking->BookingType(2);
        

        $data['user_detail'] = $this->auth->user_info();
        $data['title'] = "Admin Dashboard";
        $data['active'] = "Active";
        $this->load->view('include/header',$data);
        $this->load->view('admin/demo_dashboard',$data);
        $this->load->view('include/footer',$data);
    }
    
}
