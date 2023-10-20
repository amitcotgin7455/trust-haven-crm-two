<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Callback extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        if(($this->auth->user_info()->role_id!=1) && ($this->auth->user_info()->role_id!=4) && ($this->auth->user_info()->role_id!=2))
        {
            redirect(base_url());
        }
        $this->load->model('LeadNoteModel');
        $this->load->model('CallbackModel');
        $this->load->model('NewLeadNoteModel');
        
        $this->load->helper('app_log');

    }

	public function index()
	{	
        $data['user_detail'] = $this->auth->user_info();
        $id = $data['user_detail']->id; 
        $data['role_id'] = $data['user_detail']->role_id; 
        $data['name'] = $data['user_detail']->name;
        $data['user_role'] = $data['user_detail']->role_type;
		$data['title'] = 'Add Callback';
        $lead_datail = array();
        if($this->input->get('error'))
        {
            $lead_datail =  json_decode(base64_decode($this->input->get('error')));   
        }
        $data['exist_lead_detail'] = $lead_datail;
		$data['active2'] = 'active';
        $this->load->view('include/header',$data);
		$this->load->view('callback/index',$data);
		$this->load->view('include/footer',$data);

		
	}

    public function update(){
        
        $idG = $this->input->get('id');
        if(!empty($idG)){
            $idG = $this->input->get('id');
        }
        else{
            $idG = "";
        }
        $prei = base64_decode($idG);
        $idG = base64_decode($idG);
        $lead_datail = array();
        if($this->input->get('error'))
        {
            $lead_datail =  json_decode(base64_decode($this->input->get('error')));
            $lead_datail->lead_id = $idG;   
        }
        $data['exist_lead_detail'] = $lead_datail;
        $getupdate_id = $this->CallbackModel->getData($idG);
        if(!empty($getupdate_id)){
            $data['user_detail'] = $this->auth->user_info();
            $id = $data['user_detail']->id; 
            $data['role_id'] = $data['user_detail']->role_id; 
            $data['name'] = $data['user_detail']->name;
            $data['user_role'] = $data['user_detail']->role_type;
            $data['title'] = 'Update Callback';
            $data['active2'] = 'active';
            $data['editResult'] = $this->CallbackModel->getData($idG);
            $data['getemail'] = $this->CallbackModel->getListsendemail($prei);
            $data['getedraft'] = $this->CallbackModel->getListdraft($prei);
            $data['template'] = $this->CallbackModel->getTemplate();
            $this->load->view('include/header', $data);
            $this->load->view('callback/index',$data);
            $this->load->view('include/footer',$data);
        }
        else{
            $this->load->view('error/404');

        }
	}
    public function addCallback(){   

        $data['user_detail'] = $this->auth->user_info();
        if((!isset($_POST['save'])))
        {
            redirect(base_url('sales/create-newlead'));
            exit();
        } 
        if(isset($_POST['save'])){
        $this->form_validation->set_rules('name', 'First Name', 'required');
        // $this->form_validation->set_rules('date_of_sale', 'Date Of Sale', 'required');
        $this->form_validation->set_rules('phone', 'Number', 'required|regex_match[/^[0-9]{10}$/]');
        // $this->form_validation->set_rules('other_phone', 'Other Number', 'required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('issue', 'Issue', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('lead_callback_date', 'Callback Date', 'required');

		if ($this->form_validation->run() == FALSE)
		{	
            $data['title'] = 'Add Callback';
            $data['active2'] = 'active';
            $data['user_detail'] = $this->auth->user_info();
            $id = $data['user_detail']->id; 
            $data['role_id'] = $data['user_detail']->role_id; 
            $data['name'] = $data['user_detail']->name;
            $data['user_role'] = $data['user_detail']->role_type;
            $this->load->view('include/header',$data);
	        $this->load->view('callback/index',$data);
			$this->load->view('include/footer',$data);
            
		}
		else{ 
       $name = $this->input->post('name');
       $last_name = $this->input->post('last_name');
       $date_of_sale = $this->input->post('date_of_sale');
       $phone = $this->input->post('phone');
       $lead_callback_date = $this->input->post('lead_callback_date');
       $callback_time = $this->input->post('callback_time');
       $time_zone = $this->input->post('time_zone');
       $other_phone = $this->input->post('other_phone');
       $email = $this->input->post('email');
       $password = $this->input->post('password');
       $issue = $this->input->post('issue');
       $amount = $this->input->post('amount');
       $description = $this->input->post('description');
       $address = $this->input->post('address');
       $insert = array(
        'created_at' =>  date('Y-m-d h:i:s'),
        'user_id'=>$data['user_detail']->id,
        'name'=>$name,
        'last_name'=>$last_name,
        'date_of_sale'=>$date_of_sale,
        'phone'=>$phone,
        'type_of_lead'=> 2,
        'lead_callback_date'=>$lead_callback_date,
        'callback_time'=>$callback_time,
        'time_zone'=>$time_zone,
        'other_phone'=>$other_phone,
        'email'=>$email,
        'password'=>$password,
        'issue'=>$issue,
        'amount'=>$amount,
        'description'=>$description,
        'lead_status'=>1,
        'address'=>$address
   );
       if($this->getLeadUnqiue($email,$phone))
        {
                $_SESSION['error'] = "This Lead already exist";
                redirect(base_url() . 'sales/create-callback?error='.base64_encode(json_encode($insert)));
        }
        else
        {
       
        $res = $this->CallbackModel->insertData('tbl_leads', $insert);
        // log activity 
        $res = $this->db->insert_id();
        $user_id           = $data['user_detail']->id;
        $id           = $res;
        $log_title         = "Add Callback Sales Crm - " . json_encode($insert);
        $log_create        = app_log_manage($user_id, $id, $log_title);
        // log activity ;
        if ($res) {
                $_SESSION['done'] = "Callback Data Added successfully";
                redirect(base_url() . 'sales/list-callback');
        } else {
            $_SESSION['error'] = "Callback Data Not Added successfully";
            redirect(base_url().'sales/list-callback');
       }
     }
    }
    }
}

public function updateCallback(){   
    
    $data['user_detail'] = $this->auth->user_info();
    $idH =  $this->input->post('hidden_id');
    $name = $this->input->post('name');
    $last_name = $this->input->post('last_name');
    $date_of_sale = $this->input->post('date_of_sale');
    $phone = $this->input->post('phone');
    $lead_callback_date = $this->input->post('lead_callback_date');
    $callback_time = $this->input->post('callback_time');
    $time_zone = $this->input->post('time_zone');
    $other_phone = $this->input->post('other_phone');
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $issue = $this->input->post('issue');
    $amount = $this->input->post('amount');
    $description = $this->input->post('description');
    $address = $this->input->post('address');
    $lead_status = $this->input->post('lead_status');
    $custidone = $this->input->post('name');
    $custidtwo = $this->input->post('phone');
    $customer_id = substr($custidone,0,4).substr($custidtwo,0,4);
    $mod_date = date('Y-m-d,h:i:s');
    $update = array(
     'updated_at' => date('Y-m-d h:i:s'),
     'name'=>$name,
     'last_name'=>$last_name,
     'date_of_sale'=>$date_of_sale,
     'phone'=>$phone,
     'other_phone'=>$other_phone,
     'lead_callback_date'=>$lead_callback_date,
     'callback_time'=>$callback_time,
     'time_zone'=>$time_zone,
     'email'=>$email,
     'type_of_lead'=> 2,
     'lead_status'=> $lead_status,
     'password'=>$password,
     'issue'=>$issue,
     'amount'=>$amount,
     'description'=>$description,
     'address'=>$address
     );
    if($this->getLeadUnqiue($email,$phone,$idH))
    {
            $_SESSION['error'] = "This Lead already exist";
            redirect(base_url() . 'sales/update-callback?id='.base64_encode($idH).'&error='.base64_encode(json_encode($update)));
    }
    else
    {
        if($lead_status==2){
            $countlead = $this->NewLeadNoteModel->countLeadTransfer($idH);
            if($countlead){
                $data = array(
                    'first_name' => $name,
                    'last_name' => $last_name,
                    'mobile_1' => $phone,
                    'mobile_2' => $other_phone,
                    'email' => $email,
                    'lead_status' => $lead_status,
                    'created_date' => date('Y-m-d h:i:s'),
                    'user_type'    => 2,
                    'work_status' => 2,
                    'plan_status' => 1,
                    'sale_date' => date('m-d-Y'),
                    'customer_id'    => $customer_id,
                    'address'    => $address,
                    'lead_id'    => $idH,
                    'type_of_lead'    => 3,
                    'user_id'      => $data['user_detail']->id
                );
                $insert = $this->NewLeadNoteModel->insertTransferLead($data);
                $this->welcome($name, $last_name, $email,$customer_id,$address);
            }
        }    
    // log activity     
    $insert_id = $this->input->post('hidden_id');
    $user_id           = $data['user_detail']->id;
    $id           = $insert_id;
    $log_title         = "Update Callback Sales Crm  - " . json_encode($update);
    $log_create        = app_log_manage($user_id, $id, $log_title);
    // log activity 
     if ($this->CallbackModel->updateRecord('lead_id', $idH, 'tbl_leads',$update)) {
        $_SESSION['done'] = "Callback Data Successfully updated...!!";
         redirect(base_url().'sales/list-callback');
     } else {
         $_SESSION['error'] = "Callback Data is not successfully updated...!!";
         redirect(base_url().'sales/list-callback');
        }
    }
  }
	
public function listCallback()
	{	     
        $getuser_id = $this->input->get('data');
        if(!empty($getuser_id)){   
            $getuser_data = base64_decode($getuser_id);
        }
        else{
            $getuser_id="";
        }
        $date_data_sale = $this->input->post('date-data-sale');
        $gsearch = $this->input->post('gsearch');
        $lead_status = $this->input->post('lead-status');
        $getdays = $this->input->post('getdays');
        $getnumber = $this->input->post('getnumber');
        $time_range = $this->input->post('time-range');
        $from = $this->input->post('from');
        $too = $this->input->post('too');
        $data['user_detail'] = $this->auth->user_info();
        $id = $data['user_detail']->id; 
        $data['role_id'] = $data['user_detail']->role_id; 
        $data['name'] = $data['user_detail']->name;
        $data['user_role'] = $data['user_detail']->role_type;
		$data['active2'] = 'active';
		$data['title'] = 'Callback List';

        if ($data['user_detail']->role_id == 1 || $data['user_detail']->role_id == 4) {
            if(!empty($getuser_data)){
                $data['result'] = $this->CallbackModel->SearchUserData($getuser_data);
            }
            elseif(!empty($gsearch)){
                $data['result'] = $this->CallbackModel->getSearchInput_admin($gsearch);
            }
            elseif(!empty($date_data_sale)){
                $data['result'] = $this->CallbackModel->getDateofSale($date_data_sale);
            }
            elseif(!empty($lead_status)){
                $data['result'] = $this->CallbackModel->getLeadStatus($lead_status);
            }
            elseif($getdays=='days'){
                $getnumber1=$getnumber;
                $data['result'] = $this->CallbackModel->getdatedays($getnumber1);
            }
            elseif($getdays=='Weeks'){
                $getnumber1=$getnumber;
                $data['result'] = $this->CallbackModel->getdateweek($getnumber1);
            }
            elseif($getdays=='Months'){
                $getnumber1=$getnumber;
                $data['result'] = $this->CallbackModel->getdatemonths($getnumber1);
            }
            elseif($time_range=='Today'){
                $data['result'] = $this->CallbackModel->getdatetoday();
            }
            elseif($time_range=='This week'){
                $data['result'] = $this->CallbackModel->getdateThisweek();
            }
            elseif($time_range=='This month'){
                $data['result'] = $this->CallbackModel->getdateThismonth();
            }
            elseif($time_range=='This year'){
                $data['result'] = $this->CallbackModel->getdateThisyear();
            }
            elseif($time_range=='in the last 30 days'){
                $data['result'] = $this->CallbackModel->getLast30days();
            }

            elseif($time_range=='in the last 60 days'){
                $data['result'] = $this->CallbackModel->getLast60days();
            }

            elseif($time_range=='in the last 90 days'){
                $data['result'] = $this->CallbackModel->getLast90days();
            }

            elseif(!empty($from and $too)){
                $from1=$from;
                $too1=$too;
                $data['result'] = $this->CallbackModel->getFromToo($from1,$too1);
            }
            else{  
            $data['result'] = $this->CallbackModel->getResultAdmin($tableName,$DbKey,$idG,$order_id);
            }
            $data['searchuser'] = $this->CallbackModel->Searchuser();
         }
         else{
            if(!empty($gsearch)){
                $data['result'] = $this->CallbackModel->getSearchInput_admin_user($gsearch,$id);
            }
            elseif(!empty($date_data_sale)){
                $data['result'] = $this->CallbackModel->getDateofSale_user($date_data_sale,$id);
            }
            elseif(!empty($lead_status)){
                $data['result'] = $this->CallbackModel->getLeadStatus_user($lead_status,$id);
            }
            elseif($getdays=='days'){
                $getnumber1=$getnumber;
                $data['result'] = $this->CallbackModel->getdatedays_user($getnumber1,$id);
            }
            elseif($getdays=='Weeks'){
                $getnumber1=$getnumber;
                $data['result'] = $this->CallbackModel->getdateweek_user($getnumber1,$id);
            }
            elseif($getdays=='Months'){
                $getnumber1=$getnumber;
                $data['result'] = $this->CallbackModel->getdatemonths_user($getnumber1,$id);
            }
            elseif($time_range=='Today'){
                $data['result'] = $this->CallbackModel->getdatetoday_user($id);
            }
            elseif($time_range=='This week'){
                $data['result'] = $this->CallbackModel->getdateThisweek_user($id);
            }
            elseif($time_range=='This month'){
                $data['result'] = $this->CallbackModel->getdateThismonth_user($id);
            }
            elseif($time_range=='This year'){
                $data['result'] = $this->CallbackModel->getdateThisyear_user($id);
            }
            elseif($time_range=='in the last 30 days'){
                $data['result'] = $this->CallbackModel->getLast30days_user($id);
            }

            elseif($time_range=='in the last 60 days'){
                $data['result'] = $this->CallbackModel->getLast60days_user($id);
            }

            elseif($time_range=='in the last 90 days'){
                $data['result'] = $this->CallbackModel->getLast90days_user($id);
            }

            elseif(!empty($from and $too)){
                $from1=$from;
                $too1=$too;
                $data['result'] = $this->CallbackModel->getFromToo_user($from1,$id,$too1);
            }
            else{

                $data['result'] = $this->CallbackModel->getResultUser($id);
            }
        }
            $data['activeSender'] = active_mail(); 
            $this->load->view('include/header',$data);
            $this->load->view('callback/list',$data);
            $this->load->view('include/footer',$data);
		
	}


    public function save() {
        $data['user_detail'] = $this->auth->user_info();
        $userid = $data['user_detail']->id; 
		$data = $this->CallbackModel->saveEmp();
         // log activity 
         $insert_id = $this->db->insert_id();
         $user_id           = $userid;
         $id           = $insert_id;
         $log_title         = "Add Notes Callback Module Sales Crm  - " . $this->input->post('note');
         $log_create        = app_log_manage($user_id, $id, $log_title);
         // log activity
		echo json_encode($data);
	}
    function show(){
        $idG = $this->input->get('id');
        $data=$this->CallbackModel->employeeList($idG);
		echo json_encode($data);
        
	}
    function delete(){
        $data['user_detail'] = $this->auth->user_info();
        $userid = $data['user_detail']->id;
        $data=$this->CallbackModel->deleteEmp();
        // log activity 
        $insert_id = $this->input->post('id');
        $user_id           = $userid;
        $id           = $insert_id;
        $log_title         = "Delete Notes id Callback Module Sales Crm - " . $id;
        $log_create        = app_log_manage($user_id, $id, $log_title);
        // log activity 
		echo json_encode($data);
	}
    function updatenote(){
        $data['user_detail'] = $this->auth->user_info();
        $userid = $data['user_detail']->id;
        $data=$this->CallbackModel->updateEmp();
        // log activity 
        $insert_id = $this->input->post('id');
        $user_id           = $userid;
        $id           = $insert_id;
        $log_title         = "Update Notes Callback Module  Sales Crm - " . $this->input->post('note');
        $log_create        = app_log_manage($user_id, $id, $log_title);
        // log activity
		echo json_encode($data);
	}

    public function DeleteEmail()  
    {   
        $data['user_detail'] = $this->auth->user_info();
        $userid = $data['user_detail']->id; 
        $ids = $this->input->post('ids');  
        $this->db->set('status',3);
        $this->db->where('status',1);
        $this->db->where('mail_status',1);
        $this->db->where_in('id', explode(",", $ids));  
        $this->db->update('tbl_email');  
        // log activity 
        $insert_id = $ids;
        $user_id           = $userid;
        $id           = $insert_id;
        $log_title         = "Delete Email Callback Module Sales Crm - " . $ids;
        $log_create        = app_log_manage($user_id, $id, $log_title);
        // log activity 
        echo json_encode(['success'=>"Send Email Deleted successfully."]);  
    }  
    public function DeleteEmaildraft()  
    {   
        $data['user_detail'] = $this->auth->user_info();
        $userid = $data['user_detail']->id; 
        $ids = $this->input->post('ids');  
        $this->db->set('status',3);
        $this->db->where('status',1);
        $this->db->where('mail_status',2);
        $this->db->where_in('id', explode(",", $ids));  
        $this->db->update('tbl_email');  
        // log activity 
        $insert_id = $ids;
        $user_id           = $userid;
        $id           = $insert_id;
        $log_title         = "Delete Email Drafts Callback Module Sales Crm - " . $ids;
        $log_create        = app_log_manage($user_id, $id, $log_title);
        // log activity
        echo json_encode(['success'=>"Send Email Draft Deleted successfully."]);  
    } 
    public function deletelead()  
    {   $data['user_detail'] = $this->auth->user_info();
        $ids = $this->input->post('ids');
        $delete = $this->CallbackModel->deleteLead($ids);  
        // log activity 
        $insert_id = $ids;
        $user_id           = $data['user_detail']->id;
        $id           = $insert_id;
        $log_title         = "Delete Callback id Sales Crm - " . $ids;
        $log_create        = app_log_manage($user_id, $id, $log_title);
        // log activity 
        if($delete){
            $_SESSION['done'] = 'Callback Deleted successfully';
            redirect(base_url().'sales/list-callback');
        }
        else{
         
            $_SESSION['error'] = 'Callback Data Not Added successfully';
            redirect(base_url().'sales/list-callback');
        }
    }  

    public function emaildraft(){

        $data['user_detail'] =  $this->auth->user_info();
        $too = $this->input->post('too');
        $cc = $this->input->post('cc');
        $bcc = $this->input->post('bcc');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        $lead_id = $this->input->post('lead_id');
        $module_name = $this->input->post('module_name');

        $savedraft  = array(
            'too' => $too,
            'cc' => $cc,
            'bcc' => $bcc,
            'subject' => $subject,
            'created_at' => date('Y-m-d h:i:s'),
            'message' => $message,
            'module_type' => 2,
            'lead_id' => $lead_id,
            'mail_status' => 2
        );
        $insert = $this->CallbackModel->insertDraft($savedraft);
        // log activity 
        $insert_id = $this->db->insert_id();
        $user_id           = $data['user_detail']->id;
        $id           = $insert_id;
        $log_title         = "Add Email Draft Callback Module Sales Crm  - " . json_encode($savedraft);
        $log_create        = app_log_manage($user_id, $id, $log_title);
        // log activity
        if($insert){
            echo 1;
        }
        else{
            echo 0;
        }
    }
    
   public function mail(){

    $data['user_detail'] = $this->auth->user_info();
    $userid = $data['user_detail']->id;
    $lead_id = $this->input->post('lead_id');
    $module_name = $this->input->post('module_name');
    $too = $this->input->post('too');
    $cc = $this->input->post('cc');
    $bcc = $this->input->post('bcc');   
    $phone = $this->input->post('phone');
    $subject = $this->input->post('subject');
    $message = $this->input->post('message');
    $fromName = 'Trust Haven Solution';
    $fromEmail = 'cotginanalytics@gmail.com';
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
        "subject" => $c_subject,
        "htmlContent" => '<html><head></head><body><p>'.$htmlMessage.'</p></p></body></html>'
    ); 
    $bcc_arr = array();
    $cc_arr = array();
    if($bcc)
    {
        $data['bcc'] = array(array(
                "email" => $bcc
        )
            );
       
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
    $result = curl_exec($ch);
    curl_close($ch);
    $insert = array(
        'lead_id' => $lead_id,
        'module_type' => 2,
        'too' => $too,
        'bcc' => $bcc,
        'cc' => $cc,
        'subject' => $subject,
        'message' => $message,
        'created_at' => date('Y-m-d h:i:s'),
        'mail_status' => 1
    );
    $save = $this->CallbackModel->sendEmail($insert);
    // log activity 
    $insert_id = $this->db->insert_id();
    $user_id           = $userid;
    $id           = $insert_id;
    $log_title         = "Add Email And Send Email Callback Module Sales Crm  - " . json_encode($insert);
    $log_create        = app_log_manage($user_id, $id, $log_title);
    // log activity
    $_SESSION['done'] = 'Send Email Successfully!';
    redirect(base_url('sales/list-callback'));

}

public function welcome($first_name, $last_name, $email,$customer_id,$address)
{

    // send email invoice 
    $toName = "fazlu";
    $toEmail = $email;
    $fromName = 'Trust Haven';
    $fromEmail = 'fazlu.cotginanalytics@gmail.com';
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
    curl_close($ch);
    // send email invoice 

}

public function fetchtemplate(){
    $id = $this->input->post('template_id');
    $data = $this->CallbackModel->fetchTemplate($id);
   echo  json_encode($data);

}


public function getLeadUnqiue($email,$mobile,$check_lead_id="")
{
    if($this->LeadNoteModel->getDuplicateLead($email,$mobile,$check_lead_id))
       {
        return true;
       }
}

}