<?php
defined('BASEPATH') or exit('direct script no access allowed');

class Sendmail_model extends CI_Model
{
  //models for
  public function getuserDetail($id){
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get('tbl_bookings');
        return $query->result();
    }

    public function getfirstName($id){
        $this->db->where('id', $id);
        $query=$this->db->get('tbl_lead_contact_user');
        return $query->result();
    }

    //contact
    public function getuserDetailContact($id){
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get('tbl_lead_contact_user');
        return $query->result();
    }
    
    //Sendmail save
    public function sendMail($data)
    {

        $data = $this->db->insert('tbl_email', $data);
        if ($data) {
            $this->db->insert_id();
        } else {
            false;
        }
    }

    //get user detail 
    public function getleadDetail($lead){
        $this->db->where('status',1);
        $this->db->where('id',$lead);
        $query = $this->db->get('tbl_lead_contact_user');
        return $query->result();
    }
   // get mail by lead id
    public function getEmailList($lead_id,$lead_type){
        $this->db->select('a.*,b.name as user_name,c.title as role');
        $this->db->where('a.status',1);
        $this->db->where('a.lead_id',$lead_id);
        $this->db->where('a.lead_type',2);
        $this->db->where('a.mail_status',1);
        if($lead_type==6){
        $this->db->where('a.module_type',$lead_type);
        }else{
        $this->db->where('a.module_type !=',6);
        }
        // else{
        // $this->db->or_where('a.module_type',$lead_type);
        // }
        $this->db->order_by('a.id','desc');
        $this->db->join('tbl_users b','a.user_id=b.id','LEFT');
        $this->db->join('tbl_role c','b.role_id=c.id','LEFT');
        $query = $this->db->get('tbl_email a');
        // echo $this->db->last_query();
        // die;
        return $query->result();
    }
    public function getEmailList_draft($lead_id,$lead_type){
        $this->db->select('a.*,b.name as user_name,c.title as role');
        $this->db->where('a.status',1);
        $this->db->where('a.lead_id',$lead_id);
        $this->db->where('a.lead_type',2);
        $this->db->where('a.mail_status',2);
        if($lead_type==6){
        $this->db->where('a.module_type',$lead_type);
        }else{
            $this->db->where('a.module_type !=',6);
        }
        // else{
        // $this->db->or_where('a.module_type',$lead_type);
        // }
        $this->db->order_by('a.id','desc');
        $this->db->join('tbl_users b','a.user_id=b.id','LEFT');
        $this->db->join('tbl_role c','b.role_id=c.id','LEFT');
        $query = $this->db->get('tbl_email a');
        return $query->result();
    }

    //get email details
    public function getemailDetail($emailId){
        $this->db->select('id, lead_id, sender_id, user_id, too, cc, bcc, subject, message, sent_by_email, sent_by_name, created_at, mail_status, status');
        $this->db->where('id', $emailId);
        $query = $this->db->get('tbl_email');
        return $query->result();
    }

    public function savedraft($data){
        if($this->db->insert('tbl_email',$data)){
            return true;
        }else{
            return false;
        }
    }

    public function getdraftmail($id){
        $this->db->where('status',1);
        $this->db->where('id',$id);
        $this->db->where('mail_status',2);
        $query = $this->db->get('tbl_email');
        return $query->result();
    }

    public function sendMailupdate($data,$id){
        $this->db->where('id',$id);
        if($this->db->update('tbl_email',$data)){
            return true;
        }else{
            return false;
        }
    }

    
}