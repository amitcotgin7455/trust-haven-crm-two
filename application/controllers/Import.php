<?php
defined('BASEPATH' or 'direct script no access allowed');
date_default_timezone_set('Asia/Kolkata');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Import extends CI_Controller
{

    function __construct()
    {
        parent::__construct();


        $this->load->library('auth');
        if(($this->auth->user_info()->role_id!=1) && ($this->auth->user_info()->role_id!=4))
        {
            redirect(base_url());
        }
        $this->load->model('Import_model');
        $this->load->library('form_validation');
        $this->load->helper('file');
		$this->ip_address    = $_SERVER['REMOTE_ADDR'];
		$this->datetime 	    = date("Y-m-d H:i:s");
    }

    public function index()
    {    
        $data['user_detail'] = $this->auth->user_info();
        $data['title'] = "Import Leads Dashbaord";
        $this->load->view('include/header', $data);
        $this->load->view('import/import');
        $this->load->view('include/footer',$data);
    }

    public function list() 
    {   
        $data['user_detail'] = $this->auth->user_info();
        $data['getsaleuser'] = $this->Import_model->getSalesUser();
        $data['title'] = "Import Leads";
        $this->load->view('include/header', $data);
        $this->load->view('import/importlist');
        $this->load->view('include/footer',$data);
    }



   public function listimport(){
    $data['user_detail'] = $this->auth->user_info();
    $data['title']  = "Import Leads";    
    $data['result'] = $this->Import_model->listimport();
    $this->load->view('include/header', $data);
    $this->load->view('import/listimport');
    $this->load->view('include/footer',$data);
   }

   public function duplicatelistimport(){
    $data['user_detail'] = $this->auth->user_info();
    $data['title'] = "Duplicate Import Leads";
    $data['result'] = $this->Import_model->duplicatelistimport();
    $this->load->view('include/header', $data);
    $this->load->view('import/duplicatelistimport');
    $this->load->view('include/footer',$data);
   }

public function import() {
    $path 		= 'documents/users/';
    $json 		= [];
    $this->upload_config($path);
    if (!$this->upload->do_upload('file')) {
        $json = [
            'error_message' => $this->upload->display_errors(),
        ];
    } else {
        $user_id = $this->input->post('user_id');
        $status = $this->input->post('status');
        $file_data 	= $this->upload->data();
        $file_name 	= $path.$file_data['file_name'];
        $arr_file 	= explode('.', $file_name);
        $extension 	= end($arr_file);
        if('csv' == $extension) {
            $reader 	= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } else if('xlsx' == $extension) {
            $reader 	= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        else
        {
            $reader 	= new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        }
        $file_name = FCPATH . $file_name;
       
        $spreadsheet 	= $reader->load($file_name);
        
        $sheet_data 	= $spreadsheet->getActiveSheet()->toArray();
        
        $list 			= array();
        $data = array();
        $result = array();
        $duplicate_record = 0;
        $new_record       = 0;
        is_array($sheet_data);
        foreach($sheet_data as $key => $val) {
            if($key != 0) {
             
                if($val[12]=="Call Back"){
                      $lead_status = 1;
                 }elseif($val[12]=="Sale"){
                      $lead_status = 2;
                 }elseif($val[12]=="Not interested"){
                      $lead_status = 3;
                 }elseif($val[12]=="VM"){
                      $lead_status = 4;
                  }else{
                      $lead_status = 5;
                  } 
                  $result 	= $this->Import_model->get(["email" => $val[4], "phone" => $val[2]])[0];
                
                if($result) {
                    $duplicate_record++;
                    $duplicate_id = $result->lead_id;
                    $data = array
                    (
                        'name'					=> $val[0],
                        'last_name'				=> $val[1],
                        'phone'			        => $val[2],
                        'other_phone'			=> $val[3],
                        'email'			        => $val[4],
                        'password'			    => $val[5],
                        'date_of_sale'			=> $val[6],
                        'payment_method'		=> $val[7],
                        'company_name'			=> $val[8],
                        'issue'				    => $val[9],
                        'amount'			    => $val[10],
                        'address'				=> $val[11],
                        'lead_status'			=> $lead_status,
                        'description'			=> $val[13],
                        'created_at' 			=> $this->datetime,
                        'status'				=> $status,
                        'user_id'				=> $user_id,
                        'type_of_lead'				=> "4",
                        'duplicate_id'			=> $duplicate_id,
                        'file_name'			    => $file_data['file_name'],
                
                    );
                   $this->Import_model->duplicate_record($data);

                } else {
                    $list = [
                        'name'					=> $val[0],
                        'last_name'				=> $val[1],
                        'phone'			        => $val[2],
                        'other_phone'			=> $val[3],
                        'email'			        => $val[4],
                        'password'			    => $val[5],
                        'date_of_sale'			=> $val[6],
                        'payment_method'		=> $val[7],
                        'company_name'			=> $val[8],
                        'issue'				    => $val[9],
                        'amount'			    => $val[10],
                        'address'				=> $val[11],
                        'lead_status'			=> $lead_status,
                        'description'			=> $val[13],
                        'created_at' 			=> $this->datetime,
                        'status'				=> $status,
                        'user_id'				=> $user_id,
                        'type_of_lead'				=> "4",
                    ];
                    $this->Import_model->add_record($list);     
                    $new_record++;                    
                }
            }
        }
        // if(file_exists($file_name))
            //unlink($file_name);
        if(count($sheet_data) > 0) {
                $json = [
                    'success_message' 	=>'Total record : '. (count($sheet_data)-1). ' | '.$new_record . " Entries are imported successfully | duplicate Record Found : " . $duplicate_record,
                ];
                 }
               else {
            $json = [
                'error_message' => "No new record is found.",
            ];
        }
    }
    echo json_encode($json);
}

public function upload_config($path) {
    if (!is_dir($path)) 
        mkdir($path, 0777, TRUE);		
    $config['upload_path'] 		= './'.$path;		
    $config['allowed_types'] 	= 'csv|CSV|xlsx|XLSX|xls|XLS';
    $config['max_filename']	 	= '255';
    $config['encrypt_name'] 	= TRUE;
    $config['max_size'] 		= 4096; 
    $this->load->library('upload', $config);
}

public function importdetaillist($idg){
    $id = $idg;
    $data['id'] = $idg;
    $data['user_detail'] = $this->auth->user_info();
    // pagination code 
    $link = base_url() . "import/imported-data-detail-list/$id";
    $limit = 15;
    $total_record = array();
    $segment = $this->input->get('page');
    if(!empty($this->input->get('s'))){
        $total_record =  $this->Import_model->importcount_search($id,$this->input->get('s'));
        $result = $this->Import_model->import_search($limit,$segment,$id,$this->input->get('s'));
    }else{
        $total_record =  $this->Import_model->importduplicatedatacount($id);
        $result = $this->Import_model->importduplicatedatalist($limit,$segment,$id);
    }
    $parms = array(
        'limit' => $limit,
        'segment' => $segment,
        'total_record' => $total_record,
        'result'       => $result,
        'link'         => $link
    );
    // pagination code 
    $data['pagination'] = $this->pagination_setup($parms);
    $data['result']   =  $result;
    $data['segment']    = $segment;
    $data['links']    = $data['pagination']['links'];
    $data['title'] = "Import Data Detail List" ;
    $this->load->view('include/header', $data);
    $this->load->view('import/importdatalistuser');
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

    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="' . base_url('imported-data-detail-list') . '">';
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
