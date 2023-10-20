<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Posts extends CI_Controller { 
     
    function __construct() { 
        parent::__construct(); 
         
        // Load pagination library 
        $this->load->library('auth');
        $this->load->library('pagination'); 
         
        // Load post model 
        $this->load->model('post'); 
         
        // Per page limit 
        $this->perPage = 10; 
    } 
     
    public function index(){ 
        $data = $conditions = array(); 
        $uriSegment = 3; 
         
        // Get record count 
        $conditions['returnType'] = 'count'; 
        $totalRec = $this->post->getRows($conditions);  
         
        // Pagination configuration 
        $config['base_url']    = base_url().'posts/index/'; 
        $config['uri_segment'] = $uriSegment; 
        $config['total_rows']  = $totalRec; 
        $config['per_page']    = $this->perPage; 
        // Pagination link format 
        $config['num_tag_open'] = '<li>'; 
        $config['num_tag_close'] = '</li>'; 
        $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">'; 
        $config['cur_tag_close'] = '</a></li>'; 
        $config['next_link'] = 'Next'; 
        $config['prev_link'] = 'Prev'; 
        $config['next_tag_open'] = '<li class="pg-next">'; 
        $config['next_tag_close'] = '</li>'; 
        $config['prev_tag_open'] = '<li class="pg-prev">'; 
        $config['prev_tag_close'] = '</li>'; 
        $config['first_tag_open'] = '<li>'; 
        $config['first_tag_close'] = '</li>'; 
        $config['last_tag_open'] = '<li>'; 
        $config['last_tag_close'] = '</li>';
         
        // Initialize pagination library 
        $this->pagination->initialize($config); 
         
        // Define offset 
        $page = $this->uri->segment($uriSegment); 
        $offset = !$page?0:$page; 
         
        // Get records 
        $conditions = array( 
            'start' => $offset, 
            'limit' => $this->perPage 
        ); 
        $data['posts'] = $this->post->getRows($conditions); 
         
        // Load the list page view 
        $this->load->view('posts/index', $data); 
    } 
}