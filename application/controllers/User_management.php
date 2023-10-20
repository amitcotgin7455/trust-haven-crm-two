<?php

defined('BASEPATH')OR exit('direct script no access allowed');



class User_management extends CI_Controller{



    public function __construct()

    {

        parent::__construct();

        $this->load->library('auth');

        if(($this->auth->user_info()->role_id!=1) && ($this->auth->user_info()->role_id!=4))

        {

            redirect(base_url());

        }

        $this->load->model('User_model','ManageUser'); 

    }

    public function index(){

        $data['user_detail'] = $this->auth->user_info();

        $link = base_url() . "user_management/user-list";

        $limit = 10;

        $segment = ($this->uri->segment(4));

        $data['user_list']   = $this->ManageUser->get_user_result($limit,$segment);

        $data['title']="User Management";

        $this->load->view('include/header',$data);

        $this->load->view('admin/user/dashboard');

        $this->load->view('include/footer',$data);

    }



    public function manage_user(){

        $id = ($_GET['edit'])?base64_decode($_GET['edit']):"";

        $role_list = $this->ManageUser->getRole();

        $data['user_detail'] = $this->auth->user_info();

        $data['title']="User Management";

        $link = base_url() . "user_management/user-list";

        $limit = 10;

        $segment = ($this->uri->segment(4));

        $total_record =  $this->ManageUser->get_user_record();

        $result = $this->ManageUser->get_user_result($limit,$segment);

        $user_info = array();

        if($id)

        {

        $user_info = $this->ManageUser->getUserInfo($id)[0];

        }

        $data['user_info'] = $user_info;

       

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

        $data['role_list']  = $role_list;

        $data['segment']    = $segment;

        $data['links']    = $data['pagination']['links'];

        $this->load->view('include/header',$data);

        $this->load->view('admin/user/manage-user',$data);

        $this->load->view('include/footer',$data);

    }



    public function addUser(){

       

        $data['user_detail'] = $this->auth->user_info();  

        $this->form_validation->set_rules('user_role','User Role','required');

        $this->form_validation->set_rules('agent_name','Agent Name','required'); 

        $this->form_validation->set_rules('username','User Name','required');

        $this->form_validation->set_rules('status','Status','required');

        $this->form_validation->set_rules('email','Email','required');

        if(empty($this->input->post('edit_id')))

        { 

        $this->form_validation->set_rules('password','Password','required'); 

        }



        $link = base_url() . "user_management/user-list";

        $limit = 10;

        $segment = ($this->uri->segment(4));

        $total_record =  $this->ManageUser->get_user_record();

        $result = $this->ManageUser->get_user_result($limit,$segment);

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



        if($this->form_validation->run() == FALSE){

            $data['role_list'] = $this->ManageUser->getRole();

            $data['title']="Work Status List";

            $this->load->view('include/header',$data);

            $this->load->view('admin/user/manage-user');

            $this->load->view('include/footer',$data);

        }

        else

        {

            

            $role       = $this->input->post('user_role');

            $agent_name = $this->input->post('agent_name');

            $username   = $this->input->post('username');

            $password   = $this->input->post('password');

            $email   = $this->input->post('email');

            $status   = $this->input->post('status');



            if($this->input->post('edit_id'))

            {

                $checkUser = $this->ManageUser->getUser($this->input->post('username'),$this->input->post('edit_id'),$email);

                if($checkUser)

                {   $_SESSION['error'] = "Username already exist !";

                    redirect(base_url().'user_management/user-list?edit='.base64_encode($this->input->post('edit_id')));

                }

                else

                {

                    $record = array

                    (

                        'role_id'      => $role,

                        'name'         => $agent_name,

                        'username'     => $username,

                        'email'        => $email,

                        'created_date' => date('Y-m-d h:i:s'),

                        'status'       => $status,

                    );

                    if(!empty($password))

                    {

                    $record = array

                    (

                        'role_id'      => $role,

                        'name'         => $agent_name,

                        'username'     => $username,

                        'email'        => $email,

                        'password'     => md5($password),

                        'status'       => $status,

                        'created_date' => date('Y-m-d h:i:s')

                    );

                    }

                        

                $user_update = $this->ManageUser->editUser($record,$this->input->post('edit_id'));

                // log activity 

                $insert_id = $this->input->post('edit_id');

                $user_id           = $data['user_detail']->id;

                $id           = $insert_id;

                $log_title         = "Update User - " . $agent_name ;

                $log_create        = app_log_manage($user_id,$id,$log_title);	

                // log activity 

                if ($user_update) {

                    

                    $_SESSION['done'] = "User Updated Successfully !";

                    redirect(base_url().'user_management/user-list?edit='.base64_encode($this->input->post('edit_id')));

                } else {

                    

                    $_SESSION['error'] = "User Not Updated Successfully !";

                    redirect(base_url().'user_management/user-list');

                }

                }

            }

            else

            {

            $checkUser  = $this->ManageUser->getUser($username,'',$email);

            $record = array

            (

                'role_id'      => $role,

                'name'         => $agent_name,

                'username'     => $username,

                'email'        => $email,

                'password'     => md5($password),

                'status'       => $status,

                'created_date' => date('Y-m-d h:i:s')

            );

            

            if($checkUser)

            {

             

             $_SESSION['error'] = "User Name Already Exist";                

             redirect(base_url().'user_management/user-list');

            }

            else

            {

                $createUser = $this->ManageUser->createUser($record);

                // log activity 

                $insert_id = $this->db->insert_id();

                $user_id           = $data['user_detail']->id;

                $id           = $insert_id;

                $log_title         = "Add User - " . $agent_name ;

                $log_create        = app_log_manage($user_id,$id,$log_title);	

                // log activity     



                // create column user id

                $managecolumn = array(

                    'user_id'=>$insert_id

                );

                $createColumn = $this->ManageUser->createColumn($managecolumn);



                if ($createUser) {

                    

                    $_SESSION['done'] = "User created Successfully !";

                    redirect(base_url().'user_management/user-list');

                } else {

                    

                    $_SESSION['error'] = "Oops, failed to create user!";

                    redirect(base_url().'user_management/user-list');

                }

            }

          }

        } 

    }

    public function user_update_status()

    { 

       $data['user_detail'] = $this->auth->user_info();  

       $user_list_id = $this->input->post('id','required');

       $status    = $this->input->post('status','required'); 

        // log activity 

        $insert_id = $this->input->post('id');

        $user_id           = $data['user_detail']->id;

        $id           = $insert_id;

        $log_title         = "Deleted User Id - " . $id ;

        $log_create        = app_log_manage($user_id,$id,$log_title);	

        // log activity 

       if(!empty($user_list_id) && !empty($status))

       {

           $this->ManageUser->update_user_status($user_list_id,$status);

    

       }

    }



    public function user_expire_days() 

    {

        $id = (isset($_GET['edit'])) ? base64_decode($_GET['edit']) : "";

        $role_list = $this->ManageUser->getRole();

        $data['user_detail'] = $this->auth->user_info();

        $data['title'] = "User Management";

        $link = base_url() . "user_management/user-expire-days";

        $limit = 10;

        $segment = $this->input->get('page');

        $total_record = $this->ManageUser->get_user_record_auth();

        // echo $total_record; die;

        $result = $this->ManageUser->get_user_result_auth($limit, $segment);

        $user_info = array();

        if ($id) {

            $user_info = $this->ManageUser->getUserInfo($id);

        }

        $data['user_info'] = $user_info;

        $data['edit_id'] = $id;

        $parms = array(

            'limit' => $limit,

            'segment' => $segment,

            'total_record' => $total_record,

            'result' => $result,

            'link' => $link

        );

        $data['pagination'] = $this->pagination_setup($parms);

        $data['result'] = $result;

        $data['segment'] = $segment;

        $data['links'] = $data['pagination']['links'];

        $data['role_list'] = $role_list;

        $this->load->view('include/header', $data);

        $this->load->view('admin/user/manage-user-expire-days', $data);

        $this->load->view('include/footer', $data);

    }



    public function updateuserdays(){

        $id = $this->input->post('id');

        $days = $this->input->post('days');

        $updatedays = $this->ManageUser->updatedays($days,$id);

        if($updatedays){

            echo 'Days Updated';

        }else{

            echo 'Days Not Updated';        

        }

    }
    
    public function user_cookie_logout()
    {
        $id = base64_decode($this->input->get('auth_id'));
        if(empty($id))
        {
            redirect(base_url('user_management/user-expire-days'));
        }
        if($this->Login_model->cookies_destroy_by_super_admin($id))
        {
            redirect(base_url('user_management/user-expire-days'));
        }
    }


    public function user_login_activity() 

    {

        $id = (isset($_GET['auth_id'])) ? base64_decode($_GET['auth_id']) : "";

        $role_list = $this->ManageUser->getRole();

        $data['user_detail'] = $this->auth->user_info();

        $data['title'] = "User Management";

        $link = base_url() . "user_management/user-expire-days";
        $limit = 10;
        $segment = $this->input->get('page');
        $total_record = $this->ManageUser->get_user_login_record_auth($id);
        // echo $total_record; die;011
        $result = $this->ManageUser->get_user_login_activity($limit, $segment, $id);
        $user_info = array();

        if ($id) {

            $user_info = $this->ManageUser->getUserInfo($id);

        }

        $data['user_info'] = $user_info;

        $data['edit_id'] = $id;

        $parms = array(

            'limit' => $limit,

            'segment' => $segment,

            'total_record' => $total_record,

            'result' => $result,

            'link' => $link

        );

        $data['pagination'] = $this->pagination_setup($parms);

        $data['result'] = $result;

        $data['segment'] = $segment;

        $data['links'] = $data['pagination']['links'];

        $data['role_list'] = $role_list;

        $this->load->view('include/header', $data);

        $this->load->view('admin/user/manage-user-login-activity', $data);

        $this->load->view('include/footer', $data);

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

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="' . base_url('user-expire-days') . '">';

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