<?php
defined('BASEPATH')OR exit('direct script no access allowed');

class Remote_status extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        if(($this->auth->user_info()->role_id!=1) && ($this->auth->user_info()->role_id!=4))
        {
            redirect(base_url());
        }
        
    }
    public function index()
    {
        redirect(base_url('remote_status/manage_status'));
    }
    public function manage_status(){
        $data['user_detail'] = $this->auth->user_info();
        $data['title']="Remote List";
        $link = base_url() . "backend/remote_status/manage_status";
        $limit = 10;
        $segment = $this->input->get('page');
        $total_record =  $this->Setting_model->get_remote_status_record();
        $result = $this->Setting_model->get_remote_result($limit,$segment);
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
        $this->load->view('admin/remote/remote',$data);
        $this->load->view('include/footer',$data);
    }

    public function addRemote(){
        $data['user_detail'] = $this->auth->user_info();
        $this->form_validation->set_rules('title','Remote Name','required|is_unique[tbl_remote.title]');
        $link = base_url() . "backend/remote_status/manage_status";
        $limit = 10;
        $segment = $this->input->get('page');
        $total_record =  $this->Setting_model->get_remote_status_record();
        $result = $this->Setting_model->get_remote_result($limit,$segment);
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
        if($this->form_validation->run()==FALSE){        
            $data['title']="Remote List";
            $this->load->view('include/header',$data);
            $this->load->view('admin/remote/remote');
            $this->load->view('include/footer',$data);
        }
        else{
            $title = $this->input->post('title');
            $status = $this->input->post('status');
            $created_date = date('Y-m-d,h:i:s');
            $insert = array(
            'title'=>$title,
            'status'=>$status,
            'created_date'=>$created_date
            );
            $data = $this->Setting_model->insertRemote($insert);
            if(empty($data)){
                $this->session->set_flashdata('success','Remote Name Added Successfully !');
                redirect(base_url().'backend/remote_status/manage_status');
            }
            else{
                $this->session->set_flashdata('error','Remote Name Not Added !');
                redirect(base_url().'backend/remote_status/manage_status');
            }
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

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="'.base_url('list-lead    ').'">';
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
