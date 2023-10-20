<?php

use GuzzleHttp\RetryMiddleware;

defined('BASEPATH') OR exit('No direct script access allowed');

class Import_model extends CI_Model {

	public function __construct() {
		parent::__construct();

	}


	public function get($where = 0) {
		$data = array();
		if($where)
		{
		$sql = "(select id as lead_id from tbl_lead_contact_user where (email = '".$where['email']."' || mobile_1 = '".$where['phone']."') && status!=3 order by lead_id desc) UNION select lead_id from tbl_leads where (email = '".$where['email']."' || phone = '".$where['phone']."') && status!=3 order by lead_id";
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
		{
			$data = $query->result();
			return $data;
		}
		return false;
		}
	}

    public function duplicate_record($data)
    {
        if($this->db->insert("tbl_leads_duplicate",$data))
        {
            return true;
        }
        else
        {
           return false;
        }
    }

    public function add_record($data) {
		 $this->db->insert('tbl_leads', $data);
	}


	public function getSalesUser(){
        
		$this->db->where('role_id', 2);
		$query= $this->db->get('tbl_users');
		return $query->result();
 
	 }
 
	 public function listimport(){
		 $sql =  "SELECT a.user_id as user_id,(count(a.user_id)) as total_lead,b.name from tbl_leads a left join tbl_users b on a.user_id=b.id where a.user_id!=1 AND a.user_id!=4 AND a.user_id!=3 group by a.user_id order by a.lead_id desc";
		 $query = $this->db->query($sql);
		 return $query->result();
	 }
	 public function duplicatelistimport(){
		 $sql =  "SELECT a.user_id as user_id,(count(a.user_id)) as total_lead,b.name from tbl_leads_duplicate a left join tbl_users b on a.user_id=b.id where a.user_id!=1 AND a.user_id!=4 AND a.user_id!=3 group by a.user_id order by a.lead_id desc";
		 $query = $this->db->query($sql);
		 return $query->result();
	 }

	 public function importduplicatedatalist($limit,$start,$id){
		$this->db->where('status',1);
		$this->db->where('user_id',$id);
		$this->db->order_by('lead_id','desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get('tbl_leads_duplicate');
		return $query->result();
	 }

	 public function importduplicatedatacount($id){
		$this->db->where('status',1);
		$this->db->where('user_id',$id);
		return $this->db->count_all_results('tbl_leads_duplicate');
	 }

	 public function importcount_search($id,$search){
		$this->db->group_start();
		$this->db->or_like("name",$search);
		$this->db->or_like("last_name",$search);
		$this->db->or_like("email",$search);
		$this->db->or_like("phone",$search);
		$this->db->or_like("other_phone",$search);
		$this->db->group_end();
		$this->db->where('status',1);
		$this->db->where('user_id',$id);
		return $this->db->count_all_results('tbl_leads_duplicate');
		
	 }

	 public function import_search($limit,$start,$id,$search){
		$this->db->group_start();
		$this->db->or_like("name",$search);
		$this->db->or_like("last_name",$search);
		$this->db->or_like("email",$search);
		$this->db->or_like("phone",$search);
		$this->db->or_like("other_phone",$search);
		$this->db->group_end();
		$this->db->where('status',1);
		$this->db->where('user_id',$id);
		$this->db->order_by('lead_id','desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get('tbl_leads_duplicate');
		return $query->result();
	 }

	 
}