<?php
class CallbackModel extends CI_Model{

// admin new model 
public function getResultAdmin(){
	$this->db->where('status',1);
	$this->db->group_start();
	$this->db->where('type_of_lead',2);
	$this->db->or_where('lead_status',1);
	$this->db->group_end();
	$this->db->order_by('lead_id','desc');
	$query = $this->db->get('tbl_leads');
	return $query->result();

}

public function getResultUser($id){
	$this->db->where('status',1);
	$this->db->group_start();
	$this->db->where('type_of_lead',2);
	$this->db->or_where('lead_status',1);
	$this->db->group_end();
	$this->db->where('user_id',$id);
	$this->db->order_by('lead_id','desc');
	$query = $this->db->get('tbl_leads');
	return $query->result();

}

public function deleteLead($id){
	$id = explode(',',$id);
	$this->db->set('status',3);
	$this->db->where('status',1);
	$this->db->where_in('lead_id',$id);
	if($this->db->update('tbl_leads')){
	
		return true;
	}
	else{
		return false;
	}
}

public function insertDraft($data){

	if($this->db->insert('tbl_email',$data))
		return true;

		else{
			return false;
		}
	}
public function sendEmail($data){
	
	if($this->db->insert('tbl_email',$data)){
		return true;
	}
	else{
		return false;
	}
}

public function getListdraft($id){

	$this->db->where('status',1);
	$this->db->where('module_type',2);
	$this->db->where('mail_status',2);
	$this->db->where('lead_id',$id);
	$this->db->order_by('id','desc');
	$query = $this->db->get('tbl_email');
	return $query->result();
}

public function getListsendemail($id){

	$this->db->where('status',1);
	$this->db->where('module_type',2);
	$this->db->where('mail_status',1);
	$this->db->where('lead_id',$id);
	$this->db->order_by('id','desc');
	$query = $this->db->get('tbl_email');
	return $query->result();
}

public function insertTransferLead($data){
	if($this->db->insert('tbl_lead_contact_user',$data)){
		return true;
	}
	else{
		return false;
	}
}

public function countLeadTransfer($id){
	
	$this->db->where('lead_id',$id);
	$query = $this->db->get("tbl_lead_contact_user");
	if ($query->num_rows() == 0) {
		return true ;
	} else {
		return false;
	}
}
public function getData($idG){
	$this->db->where('status',1);
	$this->db->where('lead_id',$idG);
	$this->db->group_start();
	$this->db->where('type_of_lead',2);
	$this->db->or_where('lead_status',1);	
	$this->db->group_end();
	$query = $this->db->get('tbl_leads');
	return $query->result();
}

function saveEmp(){
		
	date_default_timezone_set("Asia/Kolkata");
	$data = array(				
			'lead_id' 			=> $this->input->post('lead_id'), 
			'note' 			=> $this->input->post('note'), 
			'module_type' 			=> 2, 
			'created_at' 			=> date('m-d-Y h:i A'), 
			);
	$result=$this->db->insert('tbl_leads_note',$data);
	return $result;
}
	
function employeeList($idG){
	$this->db->select('*');
	$this->db->from('tbl_leads_note');
	$this->db->where('status', 1);
	$this->db->where('module_type', 2);
	$this->db->where('lead_id',$idG);
	$this->db->order_by('id','desc');    
	$query = $this->db->get();
	return $query->result();	
}

function deleteEmp(){
		
	$id=$this->input->post('id');
	$this->db->set('status', 3);
	$this->db->where('module_type', 2);
	$this->db->where('status', 1);
	$this->db->where('id', $id);
	$result=$this->db->update('tbl_leads_note');
	return $result;
}

function updateEmp(){
		
	date_default_timezone_set("Asia/Kolkata");
	$id=$this->input->post('id');
	$note=$this->input->post('note');
	$update_at = date('d-m-Y ,H:ia');
	$this->db->set('note', $note);
	$this->db->set('updated_at', $update_at);
	$this->db->where('id', $id);
	$this->db->where('status', 1);
	$this->db->where('module_type', 2);
	$result=$this->db->update('tbl_leads_note');
	return $result;	
}


function saveEmp1(){
	date_default_timezone_set("Asia/Kolkata");
	$data = array(				
			'too' 			=> $this->input->post('too'), 
			'cc' 			=> $this->input->post('cc'), 
			'bcc' 			=> $this->input->post('bcc'), 
			'message' 			=> $this->input->post('message'), 
			'subject' 			=> $this->input->post('subject'), 
			'flexible' 			=> $this->input->post('flexible'), 
			'date' 			=> $this->input->post('date'), 
			'time' 			=> $this->input->post('time'), 
			'time_zone' 			=> $this->input->post('time_zone'), 
			'lead_id' 			=> $this->input->post('lead_id'), 
			'user_id' 			=> $this->input->post('user_id'), 
			'module_name' 			=> $this->input->post('module_name'), 
			'created_at' 			=> date('d-m-Y ,H:ia'), 

			);
	$result=$this->db->insert('tbl_email_draft',$data);
	return $result;
}

public function updateRecord($DbKey, $idH, $tableName, $data)
{

	$this->db->where($DbKey, $idH);
	if ($this->db->update($tableName, $data)) {
		return true;
	} else {
		return false;
	}
}

public function insertData($tableName, $data)
{
	if ($this->db->insert($tableName, $data)) {
		return true;
	} else {
		return false;
	}
}

public function Searchuser(){
    $this->db->where('status',1);
    $this->db->where('role_id !=',1);
    $this->db->where('role_id !=',4);
	$query = $this->db->get('tbl_users');
	return $query->result();
}

public function getListByIds($id){
	$this->db->where('id',$id);
	$query = $this->db->get('tbl_users');
	return $query->result();
}

public function getTemplate(){
	$this->db->where('status',1);
	$this->db->where('module_name',2);
	$query = $this->db->get('tbl_template');
	return $query->result();
}

public function fetchTemplate($id){
	$this->db->where('status',1);
	$this->db->where('template_id',$id);
	$query = $this->db->get('tbl_template');
	return $query->result();
}
// admin new model 

// admin filter start 

public function SearchUserData($id){
	$this->db->where('status',1);
	$this->db->where('user_id',$id);
	$this->db->group_start();
	$this->db->where('type_of_lead',2);
	$this->db->or_where('lead_status',1);
	$this->db->group_end();
	$query = $this->db->get('tbl_leads');
	return $query->result();
}

public function getSearchInput_admin($gsearch){
	$this->db->group_start();
	$this->db->or_like('name',$gsearch);
	$this->db->or_like('last_name',$gsearch);
	$this->db->or_like('phone',$gsearch);
	$this->db->or_like('other_phone',$gsearch);
	$this->db->or_like('email',$gsearch);
	$this->db->or_like('issue',$gsearch);
	$this->db->or_like('amount',$gsearch);
	$this->db->or_like('lead_status',$gsearch);
	$this->db->or_like('description',$gsearch);
	$this->db->group_end();
	$this->db->where('status',1);
	$this->db->group_start();
	$this->db->where('type_of_lead',2);
	$this->db->or_where('lead_status',1);
	$this->db->group_end();
	$query = $this->db->get('tbl_leads');
	return $query->result();
}
public function getLeadStatus($lead_status){
	$this->db->where('lead_status',$lead_status);
	$this->db->where('status',1);
	$this->db->group_start();
	$this->db->where('type_of_lead',2);
	$this->db->or_where('lead_status',1);
	$this->db->group_end();
	$query = $this->db->get('tbl_leads');
	return $query->result();
}

public function getDateofSale($date_of_sale){
	$this->db->where('date_of_sale',$date_of_sale);
	$this->db->where('status',1);
	$this->db->group_start();
	$this->db->where('type_of_lead',2);
	$this->db->or_where('lead_status',1);
	$this->db->group_end();
	$query = $this->db->get('tbl_leads');
	return $query->result();
}

public function getdatedays($getnumber){

	$sql = "select * from tbl_leads WHERE created_at>= DATE_ADD(CURDATE(), INTERVAL -'$getnumber' DAY) AND status = 1 AND( type_of_lead=2 OR lead_status=1)";
	$query = $this->db->query($sql);
	return $query->result();

}
public function getdateweek($getnumber){

	$sql="select * from tbl_leads WHERE created_at>= DATE_ADD(NOW(), INTERVAL -'$getnumber' WEEK) AND status = 1 AND( type_of_lead=2 OR lead_status=1)";
	$query = $this->db->query($sql);
	return $query->result();
}

public function getdatemonths($getnumber){

	$sql="select * from tbl_leads WHERE created_at>= DATE_ADD(NOW(), INTERVAL -'$getnumber' MONTH) AND status = 1 AND( type_of_lead=2 OR lead_status=1)";
	$query = $this->db->query($sql);
	return $query->result();
}

public function getFromToo($from1,$too1){
	$sql = "SELECT * FROM tbl_leads WHERE created_at BETWEEN '$from1' AND '$too1' AND status = 1 AND( type_of_lead=2 OR lead_status=1)";
	$query = $this->db->query($sql);	   
	return $query->result();
 }

 public function getdatetoday(){

	$sql="select * from tbl_leads where date(created_at) = CURDATE() AND status = 1 AND( type_of_lead=2 OR lead_status=1)";
	$query = $this->db->query($sql);

	return $query->result();
}

public function getdateThisweek(){
	$sql="SELECT * FROM tbl_leads WHERE WEEK(created_at) = WEEK(CURRENT_DATE()) AND status = 1 AND( type_of_lead=2 OR lead_status=1)";
	$query = $this->db->query($sql);
	return $query->result();
}

public function getdateThismonth(){
	$sql="SELECT * FROM tbl_leads WHERE MONTH(created_at) = MONTH(CURRENT_DATE()) AND status = 1 AND( type_of_lead=2 OR lead_status=1)";
	$query = $this->db->query($sql);
	return $query->result();
}

public function getdateThisyear(){
	$sql="SELECT * FROM tbl_leads WHERE YEAR(created_at) = YEAR(CURRENT_DATE()) AND status = 1 AND( type_of_lead=2 OR lead_status=1)";
	$query = $this->db->query($sql);
	return $query->result();
}


public function getLast30days(){

	$sql = "select * from tbl_leads WHERE created_at>= DATE_ADD(CURDATE(), INTERVAL -'30' DAY) AND status = 1 AND( type_of_lead=2 OR lead_status=1)";
	$query = $this->db->query($sql);
	return $query->result();

}
public function getLast60days(){

	$sql = "select * from tbl_leads WHERE created_at>= DATE_ADD(CURDATE(), INTERVAL -'60' DAY) AND status = 1 AND( type_of_lead=2 OR lead_status=1)";
	$query = $this->db->query($sql);
	return $query->result();

}
public function getLast90days(){

	$sql = "select * from tbl_leads WHERE created_at>= DATE_ADD(CURDATE(), INTERVAL -'90' DAY) AND status = 1 AND( type_of_lead=2 OR lead_status=1)";
	$query = $this->db->query($sql);
	return $query->result();

}
// admin filter model close


// user filter model  start

public function getSearchInput_admin_user($gsearch,$id){
	$this->db->group_start();
	$this->db->or_like('name',$gsearch);
	$this->db->or_like('last_name',$gsearch);
	$this->db->or_like('phone',$gsearch);
	$this->db->or_like('other_phone',$gsearch);
	$this->db->or_like('email',$gsearch);
	$this->db->or_like('issue',$gsearch);
	$this->db->or_like('amount',$gsearch);
	$this->db->or_like('lead_status',$gsearch);
	$this->db->or_like('description',$gsearch);
	$this->db->group_end();
	$this->db->where('status',1);
	$this->db->where('user_id',$id);
	$this->db->group_start();
	$this->db->where('type_of_lead',2);
	$this->db->or_where('lead_status',1);
	$this->db->group_end();
	$query = $this->db->get('tbl_leads');
	return $query->result();
}
public function getLeadStatus_user($lead_status,$id){
	$this->db->where('lead_status',$lead_status);
	$this->db->where('status',1);
	$this->db->where('user_id',$id);
	$this->db->group_start();
	$this->db->where('type_of_lead',2);
	$this->db->or_where('lead_status',1);
	$this->db->group_end();
	$query = $this->db->get('tbl_leads');
	return $query->result();
}

public function getDateofSale_user($date_of_sale,$id){
	$this->db->where('date_of_sale',$date_of_sale);
	$this->db->where('status',1);
	$this->db->where('user_id',$id);
	$this->db->group_start();
	$this->db->where('type_of_lead',2);
	$this->db->or_where('lead_status',1);
	$this->db->group_end();
	$query = $this->db->get('tbl_leads');
	return $query->result();
}

public function getdatedays_user($getnumber,$id){

	$sql = "select * from tbl_leads WHERE created_at>= DATE_ADD(CURDATE(), INTERVAL -'$getnumber' DAY) AND status = 1 AND user_id = $id AND( type_of_lead=2 OR lead_status=1)";
	$query = $this->db->query($sql);
	return $query->result();

}
public function getdateweek_user($getnumber,$id){

	$sql="select * from tbl_leads WHERE created_at>= DATE_ADD(NOW(), INTERVAL -'$getnumber' WEEK) AND status = 1 AND user_id = $id AND( type_of_lead=2 OR lead_status=1)";
	$query = $this->db->query($sql);
	return $query->result();
}

public function getdatemonths_user($getnumber,$id){

	$sql="select * from tbl_leads WHERE created_at>= DATE_ADD(NOW(), INTERVAL -'$getnumber' MONTH) AND status = 1 AND user_id = $id AND( type_of_lead=2 OR lead_status=1)";
	$query = $this->db->query($sql);
	return $query->result();
}

public function getFromToo_user($from1,$id,$too1){
	$sql = "SELECT * FROM tbl_leads WHERE created_at BETWEEN '$from1' AND '$too1' AND status = 1 AND user_id = $id AND( type_of_lead=2 OR lead_status=1)";
	$query = $this->db->query($sql);	   
	return $query->result();
 }

 public function getdatetoday_user($id){

	$sql="select * from tbl_leads where date(created_at) = CURDATE() AND status = 1 AND user_id = $id AND( type_of_lead=2 OR lead_status=1)";
	$query = $this->db->query($sql);

	return $query->result();
}

public function getdateThisweek_user($id){
	$sql= "SELECT * FROM tbl_leads WHERE WEEK(created_at) = WEEK(CURRENT_DATE()) AND status = 1 AND user_id = $id AND( type_of_lead=2 OR lead_status=1)";
	$query = $this->db->query($sql);
	return $query->result();
}

public function getdateThismonth_user($id){
	$sql= "SELECT * FROM tbl_leads WHERE MONTH(created_at) = MONTH(CURRENT_DATE()) AND status = 1 AND user_id = $id AND( type_of_lead=2 OR lead_status=1)";
	$query = $this->db->query($sql);
	return $query->result();
}

public function getdateThisyear_user($id){
	$sql= "SELECT * FROM tbl_leads WHERE YEAR(created_at) = YEAR(CURRENT_DATE()) AND status = 1 AND user_id = $id AND( type_of_lead=2 OR lead_status=1)";
	$query = $this->db->query($sql);
	return $query->result();
}


public function getLast30days_user($id){

	$sql = "select * from tbl_leads WHERE created_at>= DATE_ADD(CURDATE(), INTERVAL -'30' DAY) AND status = 1 AND user_id = $id AND( type_of_lead=2 OR lead_status=1)";
	$query = $this->db->query($sql);
	return $query->result();

}
public function getLast60days_user($id){

	$sql = "select * from tbl_leads WHERE created_at>= DATE_ADD(CURDATE(), INTERVAL -'60' DAY) AND status = 1 AND user_id = $id AND( type_of_lead=2 OR lead_status=1)";
	$query = $this->db->query($sql);
	return $query->result();

}
public function getLast90days_user($id){

	$sql = "select * from tbl_leads WHERE created_at>= DATE_ADD(CURDATE(), INTERVAL -'90' DAY) AND status = 1 AND user_id = $id AND( type_of_lead=2 OR lead_status=1)";
	$query = $this->db->query($sql);
	return $query->result();

}
// user filter model 
		
}