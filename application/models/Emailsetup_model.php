<?php
defined('BASEPATH') or exit('direct script no access allowed');

class Emailsetup_model extends CI_Model
{
    public function getdata()
    {
        $this->db->where('status!=', '3');
        $query = $this->db->select('sender_name, sender_email,organization_phone,sender_status, status, id')
            ->get('tbl_email_setup');
        return $query->result();
    }
    //insert
    public function insert_db($data)
    {
        if ($this->db->insert('tbl_email_setup', $data)) {
            return true;
        } else {
            return false;
        }
    }
    //status email active update
    public function update_one_status($id, $status)
    {
        $this->db->update('tbl_email_setup', ['sender_status' => '2']);
        $this->db->where("id", $id);
        if ($this->db->update('tbl_email_setup', ['sender_status' => '1'])) {
            return true;
        } else {
            return false;
        }
    }
    //status update
    public function updated_status($id, $status)
    {
        if ($status=='1') {
            $this->db->where("id", $id);
            $this->db->update('tbl_email_setup', ['status' => '1']);
            return true;
        } else {
            $this->db->where("id", $id);
            $this->db->update('tbl_email_setup', ['status' => '2']);
            return false;
        }
    }
    //delete
    public function update_senderdelete_status($id, $status)
    {
        $this->db->where("id", $id);
        if ($this->db->update('tbl_email_setup', ['status' => $status])) {
            return true;
        } else {
            return false;
        }
    }
    //Get sender details using id
    public function getEmailInfo($id)
    {
        $data = array();
        if ($id) {
            $this->db->where('id', $id);
        }
        $this->db->where('status!=', '3');
        $query = $this->db->get('tbl_email_setup');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key => $list) {
                $data[] = $list;
            }
            return $data;
        }
        return false;
    }
    //Check Email Exists
    public function getSenderemail($senderemail = "", $id = "")
    {
        $data = array();
        if ($id) {
            $this->db->where('id!=', $id);
        }
        if ($senderemail) {
            $this->db->where('sender_email', $senderemail);
        }
        $this->db->where('status!=', '3');
        $query = $this->db->get('tbl_email_setup');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key => $list) {
                $data[] = $list;
            }
            return $data;
        }
        return false;
    }
    //check active mail status before active status
    public function check_sender_status($status, $sender_status) {
        if ($sender_status == 2 && $status == '1') {
            //return 'Please activate sender status first before activating status.';
            echo json_encode('Please activate sender status first before activating status.');
        } elseif ($sender_status == 1 && $status == '2') {
            //return 'Please inactivate sender status first before inactivating status.';
            echo json_encode('Please inactivate sender status first before inactivating status.');
        } else {
            return 'success';
        }
    }
    //Get sender_status first
    public function get_sender_status($status_id) {
        $query = $this->db->select('sender_status')
            ->where('id', $status_id)
            ->get('tbl_email_setup');
        if ($query->num_rows() > 0) {
            return $query->row()->sender_status;
        } else {
            return false;
        }
    }
    //Update Status
    public function update_status($status_id, $status, $sender_status) {
        $check_status = $this->check_sender_status($status, $sender_status);
        if ($check_status === 'success') {
            $this->db->where('id', $status_id);
            $this->db->update('tbl_email_setup', array('status' => $status));
            return true;
        } else {
            return $check_status;
        }
    }
    //Update email
    public function editSenderEmail($record, $id)
    {
        $this->db->where('id', $id);
        if ($this->db->update("tbl_email_setup", $record)) {
            return true;
        } else {
            return false;
        }
    }

    public function all_leads_count(){
        $query = $this->db->query("select a.id,a.first_name ,a.last_name,a.email,a.mobile_1,a.mobile_2,a.created_date from tbl_lead_contact_user a  where a.status=1 UNION select b.lead_id,b.name,b.last_name,b.phone,b.other_phone,b.email,b.created_at from tbl_leads b  where b.status=1 order by created_date desc");
        return $query->result();
    }
    
    public function all_leads($limit,$start){
      if($start){
       $start_count = ','.$start;
      }
      $query = $this->db->query("select concat(a.id,'-',1) as a_id ,a.first_name ,a.last_name,a.email,a.mobile_1,a.mobile_2,a.created_date from tbl_lead_contact_user a  where a.status=1 UNION select concat(b.lead_id,'-',2) as b_id,b.name,b.last_name,b.phone,b.other_phone,b.email,b.created_at from tbl_leads b  where b.status=1 order by created_date desc limit $limit $start_count");
    //   echo $this->db->last_query(); die;
      return $query->result();
    }
    public function all_leads_count_search($search){
        $query = $this->db->query("select a.id,a.first_name ,a.last_name,a.email,a.mobile_1,a.mobile_2,a.created_date from tbl_lead_contact_user a  where a.status=1 and (a.first_name like '%$search%' or a.last_name like '%$search%' or a.email like '%$search%' or a.mobile_1 like '%$search%' or a.mobile_2 like '%$search%')  UNION select b.lead_id,b.name,b.last_name,b.phone,b.other_phone,b.email,b.created_at from tbl_leads b  where b.status=1 and (b.name like '%$search%' or b.last_name like '%$search%' or b.email like '%$search%' or b.phone like '%$search%' or b.other_phone like '%$search%') ");
        // echo $this->db->last_query();die;
        return $query->result();
    }
    
    public function all_leads_search($limit,$start,$search){
      if($start){
       $start_count = ','.$start;
      }
      $query = $this->db->query("select concat(a.id,'-',1) as a_id,a.first_name ,a.last_name,a.email,a.mobile_1,a.mobile_2,a.created_date from tbl_lead_contact_user a  where a.status=1 and (a.first_name like '%$search%' or a.last_name like '%$search%' or a.email like '%$search%' or a.mobile_1 like '%$search%' or a.mobile_2 like '%$search%')  UNION select concat(b.lead_id,'-',2) as b_id,b.name,b.last_name,b.phone,b.other_phone,b.email,b.created_at from tbl_leads b  where b.status=1 and (b.name like '%$search%' or b.last_name like '%$search%' or b.email like '%$search%' or b.phone like '%$search%' or b.other_phone like '%$search%') order by  created_date desc limit $limit $start_count");
      return $query->result();
    }

    public function all_email_count($id='',$lead_type=''){
        $this->db->where('status',1);
        if($id){
            $this->db->where('lead_id',$id);
        }if($lead_type==2){
            $this->db->or_where('module_type','1');
            $this->db->or_where('module_type','2');
            $this->db->or_where('module_type','3');
        }else{
            $this->db->or_where('module_type','4');
            $this->db->or_where('module_type','5');
        }
          return $this->db->count_all_results('tbl_email');
        
    }

    public function all_emails($limit,$start,$id='',$lead_type=''){
        if($lead_type==2){
            $this->db->select('a.*,a.id as email_id,b.lead_id,b.name as first_name , b.last_name as last_name,c.id,c.sender_name,c.sender_email,d.id,d.name as username ');
            $this->db->join('tbl_leads b','a.lead_id=b.lead_id','left');
            $this->db->or_where('a.module_type','1');
            $this->db->or_where('a.module_type','2');
            $this->db->or_where('a.module_type','3');
        }else{
            $this->db->select('a.*,a.id as email_id,b.id,b.first_name as first_name , b.last_name as last_name,c.id,c.sender_name,c.sender_email,d.id,d.name as username ');
            $this->db->join('tbl_lead_contact_user b','a.lead_id=b.id','left');
            $this->db->or_where('a.module_type','4');
            $this->db->or_where('a.module_type','5');
        }
        $this->db->join('tbl_email_setup c','a.sender_id=c.id','left');
        $this->db->join('tbl_users d','a.user_id=d.id','left');
        $this->db->where('a.status',1);
        if($id){
            $this->db->where('a.lead_id',$id);
        }
        $this->db->limit($limit,$start);
        $query = $this->db->get('tbl_email a');
        // echo $this->db->last_query(); die;
        return $query->result();
    }

}
