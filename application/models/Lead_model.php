<?php
defined('BASEPATH') or exit('direct script no access allowed');

class Lead_model extends CI_Model
{
    public function insertLeaddata($data)
    {
        if ($this->db->insert('tbl_lead_contact_user', $data)) {
            return true;
        } else {
          return  false;
        }
    }
    public function updateLeaddata($hidden_id,$update){
        $this->db->where('id',$hidden_id);
        if($this->db->update('tbl_lead_contact_user',$update)){
           return true;
        }
        else{
           return false;
        }
    }
    public function checkUser($mobile_1, $email,$hidden_id)
    {
        $this->db->group_start();
        $this->db->or_where('mobile_1', $mobile_1);
        $this->db->or_where('email', $email);
        $this->db->group_end();
        $this->db->where('id !=',$hidden_id);
        $query = $this->db->get("tbl_lead_contact_user");
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function getLeadList($type)
    {
        //1 - open lead , 2- close
        $lead_status = array();
        if($type==1) {
            $lead_status = array(1, 3, 4);
        }
        $data = array();
        $this->db->select('a.id as id,a.first_name,a.last_name,a.mobile_1,a.mobile_2,a.email,a.description,a.lead_status,a.created_date,b.name,c.title as role_type');
        $this->db->join('tbl_users b', 'a.user_id=b.id', 'inner');
        $this->db->join('tbl_role c', 'b.role_id=c.id', 'inner');
        
        if ($type == 2) {
        $this->db->group_start();
        $this->db->or_where('a.user_type', 2);
        $this->db->or_where('a.lead_status', 2);
        $this->db->or_where('a.lead_status', 5);
        $this->db->group_end();
        }
        else
        { 
        $this->db->where_in('a.lead_status', $lead_status);
        $this->db->group_start();   
        $this->db->or_where('a.tech_lead_status IS NULL ');
        $this->db->or_where('a.tech_lead_status',2);
        $this->db->group_end();
        }
        
        $this->db->where('a.status', 1);
        $this->db->where('b.status', 1);
        $this->db->where('c.status', 1);
        $query = $this->db->get("tbl_lead_contact_user a");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key => $record) {
                $data[] = $record;
            }
        }
        return $data;
    }
   
    public function getLeadListSales($type, $user_id)
    {
        //1 - open lead , 2- close
        $lead_status = array();
        if($type==1) {
            $lead_status = array(1, 3, 4);
        }
        $data = array();
        $this->db->select('a.first_name,a.last_name,a.mobile_1,a.mobile_2,a.email,a.description,a.lead_status,a.created_date,b.name,c.title as role_type');
        $this->db->join('tbl_users b', 'a.user_id=b.id', 'inner');
        $this->db->join('tbl_role c', 'b.role_id=c.id', 'inner');
        
        if ($type == 2) {
        $this->db->group_start();
        $this->db->or_where('a.user_type', 2);
        $this->db->or_where('a.lead_status', 2);
        $this->db->or_where('a.lead_status', 5);
        $this->db->group_end();
        }
        else
        {
        $this->db->where_in('a.lead_status', $lead_status);
        $this->db->group_start();   
        $this->db->or_where('a.tech_lead_status IS NULL ');
        $this->db->or_where('a.tech_lead_status',2);
        $this->db->group_end();
        }
        
        $this->db->where('a.status', 1);
        $this->db->where('b.status', 1);
        $this->db->where('c.status', 1);
        $this->db->where('a.user_id', $user_id);
        $query = $this->db->get("tbl_lead_contact_user a");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key => $record) {
                $data[] = $record;
            }
        }
        return $data;
    }
    public function closeLead()
    {
        $data = array();
        $where = "user_type = 1 && lead_status in (2,3,5) and status=1";
        $this->db->where($where);
        $query = $this->db->get("tbl_lead_contact_user");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key => $record) {
                $data[] = $record;
            }
        }
        return $data;
    }
    public function detailLead($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_lead_contact_user');
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $this->db->where('user_type', 1);
        $query = $this->db->get();
        return $query->result();
    }
    public function GetuserNameLead($user_id)
    {
        $this->db->where('id', $user_id);
        $this->db->where('status', 1);
        $query = $this->db->get('tbl_users');
        return $query->result();
    }
    public function insertNotes($data)
    {
        $insert = $this->db->insert('tbl_notes', $data);
        if (!empty($insert)) {
            true;
        } else {
            false;
        }
    }
    public function listNotes($module_id, $module_type,$first_name)
    {
        $this->db->where('module_id', $module_id);
        $this->db->where('status', 1);
        $this->db->where('module_type', $module_type);
        $this->db->order_by('id','desc');
        $query = $this->db->get('tbl_notes');
        return $query->result();
        // $this->db->select('a.*,b.first_name as first,c.*');
        // $this->db->join('tbl_notes a ','a.module_id=c.id','left');
        // $this->db->join('tbl_lead_contact_user b','c.first_name=b.id','left');
        // $this->db->where('c.status',1);
        // $this->db->where('a.module_id',$module_id);
        // $this->db->where('b.id',$first_name);
        // $this->db->where('a.module_type',$module_type);
        // $query = $this->db->get('tbl_bookings c');
        // return $query->result();
    }
    public function deleteNotes($id)
    {
        $this->db->set('status', 3);
        $this->db->where('id', $id);
        if ($this->db->update('tbl_notes')) {
            return true;
        } else {
            return false;
        }
    }
    public function editNotes($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        if ($this->db->update('tbl_notes', $data)) {
            return true;
        } else {
            return false;
        }
    }
    public function updateDetail($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->where('status',1);
        $this->db->where('user_type',1);
        if ($this->db->update('tbl_lead_contact_user', $data)) {
            return true;
        } else {
            return false;
        }
    }
    public function getLead($id)
    {
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $this->db->where('user_type', 1);
        $query = $this->db->get('tbl_lead_contact_user');
        return $query->result();
    }
    public function deleteLead($ids)
    {
        $this->db->set('status', 3);
        $this->db->where_in('id', $ids);
        if ($this->db->update('tbl_lead_contact_user')) {
            return true;
        } else {
            false;
        }
    }
    public function manageColumn($id,$update)
    {
        $this->db->where('user_id', $id);
        if ($this->db->update('lead_manage_column', $update)) {
            return true;
        } else {
            return false;
        }
    }
    public function fetchManageColumn($id)
    {
        $this->db->where('user_id', $id);
        $query = $this->db->get('lead_manage_column');
        return $query->result();
    }
    
    // super admin and manager models lead 
    public function get_count_leads_admin()
    {
        $this->db->where('user_type', 1);
        $this->db->where('status', 1);
        $this->db->order_by('id', 'desc');
        return $this->db->count_all_results('tbl_lead_contact_user');
    }
    public function get_result_leads_admin($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->where('user_type', 1);
        $this->db->where('status', 1);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('tbl_lead_contact_user');
        return $query->result();
        
    }
    
    public function filterLeadstatus_count_admin($lead_status)
    {
        $this->db->where('status', 1);
        $this->db->where('user_type', 1);
        $this->db->where('lead_status', $lead_status);
        return $this->db->count_all_results('tbl_lead_contact_user');
    }
    public function filterLeadstatus_admin($lead_status,$limit,$start)
    {
        $this->db->limit($limit, $start);
        $this->db->where('status', 1);
        $this->db->where('user_type', 1);
        $this->db->where('lead_status', $lead_status);
        $query = $this->db->get('tbl_lead_contact_user');
        return $query->result();
    }
    
    public function filterLeadDays_count_admin($getnumber)
    {
        $sql = "select count(id) as count from tbl_lead_contact_user WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'$getnumber' DAY) AND status = 1 AND user_type = 1  ";
        $query = $this->db->query($sql);
        return $query->result();
        
    }
    
    public function filterLeadDays_admin($getnumber,$limit,$start)
    {
        $sql = "select * from tbl_lead_contact_user WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'$getnumber' DAY) AND status = 1 AND user_type = 1  order by id desc limit";
        if($start)
        {
            $sql.= " $start,$limit";
        }
        else
        {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadWeek_count_admin($getnumber)
    {
        $sql = "select count(id) as count from tbl_lead_contact_user WHERE created_date>= DATE_ADD(NOW(), INTERVAL -'$getnumber' WEEK) AND status = 1 AND user_type = 1   ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadWeek_admin($getnumber,$limit,$start)
    {
        $sql = "select * from tbl_lead_contact_user WHERE created_date>= DATE_ADD(NOW(), INTERVAL -'$getnumber' WEEK) AND status = 1 AND user_type = 1  order by id desc limit";
        if($start)
        {
            $sql.= " $start,$limit";
        }
        else
        {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadMonth_count_admin($getnumber)
    {
        $sql = "select count(id) as count from tbl_lead_contact_user WHERE created_date>= DATE_ADD(NOW(), INTERVAL -'$getnumber' MONTH) AND status = 1 AND user_type = 1   ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadMonth_admin($getnumber,$limit,$start)
    {
        $sql = "select * from tbl_lead_contact_user WHERE created_date>= DATE_ADD(NOW(), INTERVAL -'$getnumber' MONTH) AND status = 1 AND user_type = 1  order by id desc limit";
        if($start)
        {
            $sql.= " $start,$limit";
        }
        else
        {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadtoday_count_admin()
    {
        $sql = "select count(id) as count from tbl_lead_contact_user where date(created_date) = CURDATE() AND status = 1 AND user_type = 1   ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadtoday_admin($limit,$start)
    {
        $sql = "select * from tbl_lead_contact_user where date(created_date) = CURDATE() AND status = 1 AND user_type = 1  order by id desc limit";
        if($start)
        {
            $sql.= " $start,$limit";
        }
        else
        {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadweeks_count_admin()
    {
        $sql = "SELECT COUNT(id) as count FROM tbl_lead_contact_user WHERE WEEK(created_date) = WEEK(CURRENT_DATE()) AND status=1 AND user_type = 1   ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function filterLeadweeks_admin($limit,$start)
    {
        $sql = "SELECT * FROM tbl_lead_contact_user WHERE WEEK(created_date) = WEEK(CURRENT_DATE()) AND status=1 AND user_type = 1  ORDER BY id DESC LIMIT";
        if($start)
        {
            $sql.= " $start,$limit";
        }
        else
        {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadmonths_count_admin()
    {
        $sql = "SELECT COUNT(id) AS count FROM tbl_lead_contact_user WHERE MONTH(created_date) = MONTH(CURRENT_DATE()) AND status = 1 AND user_type = 1 ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadmonths_admin($limit,$start)
    {
        $sql = "SELECT * FROM tbl_lead_contact_user WHERE MONTH(created_date) = MONTH(CURRENT_DATE()) AND status = 1 AND user_type = 1  ORDER BY id DESC LIMIT";
        if($start){
            $sql.= " $start,$limit";
        }
        else{
            $sql.=" $limit";
        }
        $query = $this->db->query($sql);
        // echo $this->db->last_query();
        return $query->result();
    }
    public function filterLeadyear_count_admin()
    {
        $sql = "SELECT COUNT(id) AS count FROM tbl_lead_contact_user WHERE YEAR(created_date) = YEAR(CURRENT_DATE()) AND status = 1 AND user_type = 1  ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadyear_admin($limit,$start)
    {
        $sql = "SELECT * FROM tbl_lead_contact_user WHERE YEAR(created_date) = YEAR(CURRENT_DATE()) AND status = 1 AND user_type = 1  ORDER BY id DESC LIMIT";
        if($start){
            $sql.= " $start,$limit";
        }
        else{
            $sql.=" $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast30days_count_admin()
    {
        $sql = "select count(id) as count from tbl_lead_contact_user WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'30' DAY) AND status = 1 AND user_type = 1   ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast30days_admin($limit,$start)
    {
        $sql = "select * from tbl_lead_contact_user WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'30' DAY) AND status = 1 AND user_type = 1  order by id desc limit ";
        if($start){
            $sql.= " $start,$limit";
        }
        else{
            $sql.=" $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast60days_count_admin()
    {
        $sql = "select count(id) as count from tbl_lead_contact_user WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'60' DAY) AND status = 1 AND user_type = 1   ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast60days_admin($limit,$start)
    {
        $sql = "select * from tbl_lead_contact_user WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'60' DAY) AND status = 1 AND user_type = 1  order by id desc limit";
        if($start){
            $sql.= " $start,$limit";
        }
        else{
            $sql.=" $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast90days_count_admin()
    {
        $sql = "select count(id) as count from tbl_lead_contact_user WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'90' DAY) AND status = 1 AND user_type = 1   ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast90days_admin($limit,$start)
    {
        $sql = "select * from tbl_lead_contact_user WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'90' DAY) AND status = 1 AND user_type = 1  order by id desc limit";
        if($start){
            $sql.= " $start,$limit";
        }
        else{
            $sql.=" $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function  getSearchInput_count_admin($gsearch)
    {
        $this->db->group_start();
        $this->db->or_like('first_name',$gsearch);
        $this->db->or_like('last_name',$gsearch);
        $this->db->or_like('mobile_1',$gsearch);
        $this->db->or_like('mobile_2',$gsearch);
        $this->db->or_like('email',$gsearch);
        $this->db->or_like('lead_status',$gsearch);
        $this->db->or_like('description',$gsearch);
        $this->db->group_end();
        $this->db->where('status',1);
        $this->db->where('user_type', 1);
        return $this->db->count_all_results('tbl_lead_contact_user');
    }
    public function getSearchInput_admin($limit,$start,$gsearch){
        $this->db->group_start();
        $this->db->limit($limit, $start);
        $this->db->or_like('first_name',$gsearch);
        $this->db->or_like('last_name',$gsearch);
        $this->db->or_like('mobile_1',$gsearch);
        $this->db->or_like('mobile_2',$gsearch);
        $this->db->or_like('email',$gsearch);
        $this->db->or_like('lead_status',$gsearch);
        $this->db->or_like('description',$gsearch);
        $this->db->group_end();
        $this->db->where('status',1);
        $this->db->where('user_type',1);
        $this->db->order_by('id','desc');
        $query = $this->db->get('tbl_lead_contact_user');
        return $query->result();
    }
    public function getfirstnamecount($first_name){
      $this->db->like('first_name',$first_name);
      $this->db->where('status',1);
      $this->db->where('user_type',1);
      return $this->db->count_all_results('tbl_lead_contact_user');        
    }
    public function getfirstname($limit,$start,$first_name){
      $this->db->limit($limit,$start);
      $this->db->like('first_name',$first_name);
      $this->db->where('status',1);
      $this->db->where('user_type',1);
      $this->db->order_by('id','desc');
      $query =  $this->db->get('tbl_lead_contact_user');        
      return $query->result();
    }
    public function getlastnamecount($first_name){
      $this->db->like('last_name',$first_name);
      $this->db->where('status',1);
      $this->db->where('user_type',1);
      return $this->db->count_all_results('tbl_lead_contact_user');        
    }
    public function getlastname($limit,$start,$first_name){
      $this->db->limit($limit,$start);
      $this->db->like('last_name',$first_name);
      $this->db->where('status',1);
      $this->db->where('user_type',1);
      $this->db->order_by('id','desc');
      $query =  $this->db->get('tbl_lead_contact_user');        
      return $query->result();
    }
    public function getphonecount($first_name){
      $this->db->like('mobile_1',$first_name);
      $this->db->where('status',1);
      $this->db->where('user_type',1);
      return $this->db->count_all_results('tbl_lead_contact_user');        
    }
    public function getphone($limit,$start,$first_name){
      $this->db->limit($limit,$start);
      $this->db->like('mobile_1',$first_name);
      $this->db->where('status',1);
      $this->db->where('user_type',1);
      $this->db->order_by('id','desc');
      $query =  $this->db->get('tbl_lead_contact_user');        
      return $query->result();
    }
    public function getsecondphonecount($first_name){
      $this->db->like('mobile_2',$first_name);
      $this->db->where('status',1);
      $this->db->where('user_type',1);
      return $this->db->count_all_results('tbl_lead_contact_user');        
    }
    public function getsecondphone($limit,$start,$first_name){
      $this->db->limit($limit,$start);
      $this->db->like('mobile_2',$first_name);
      $this->db->where('status',1);
      $this->db->where('user_type',1);
      $this->db->order_by('id','desc');
      $query =  $this->db->get('tbl_lead_contact_user');        
      return $query->result();
    }
    public function getemailcount($first_name){
      $this->db->like('email',$first_name);
      $this->db->where('status',1);
      $this->db->where('user_type',1);
      return $this->db->count_all_results('tbl_lead_contact_user');        
    }
    public function getemail($limit,$start,$first_name){
      $this->db->limit($limit,$start);
      $this->db->like('email',$first_name);
      $this->db->where('status',1);
      $this->db->where('user_type',1);
      $this->db->order_by('id','desc');
      $query =  $this->db->get('tbl_lead_contact_user');        
      return $query->result();
    }
    public function getleadstatuscount($first_name){
      $this->db->where('lead_status',$first_name);
      $this->db->where('status',1);
      $this->db->where('user_type',1);
      return $this->db->count_all_results('tbl_lead_contact_user');        
    }
    public function getleadstatus($limit,$start,$first_name){
      $this->db->limit($limit,$start);
      $this->db->where('lead_status',$first_name);
      $this->db->where('status',1);
      $this->db->where('user_type',1);
      $this->db->order_by('id','desc');
      $query =  $this->db->get('tbl_lead_contact_user');        
      return $query->result();
    }
    public function getfromtoocount($from,$too){
        $to_exp = explode('-',$too);
        $to_date = $to_exp[2].'-'.$to_exp[0].'-'.$to_exp[1];
        $from_exp = explode('-',$from);
        $from_date = $from_exp[2].'-'.$from_exp[0].'-'.$from_exp[1];
        $this->db->group_start();
        $this->db->where('created_date BETWEEN "'. $from_date. '" AND "'. $to_date. '" ');
        $this->db->where('status',1);
        $this->db->where('user_type',1);
        $this->db->group_end();
        return $this->db->count_all_results('tbl_lead_contact_user');
      
    }
    public function getfromtoo($limit,$start,$from,$too){
        $to_exp = explode('-',$too);
        $to_date = $to_exp[2].'-'.$to_exp[0].'-'.$to_exp[1];
        $from_exp = explode('-',$from);
        $from_date = $from_exp[2].'-'.$from_exp[0].'-'.$from_exp[1];
        $this->db->limit($limit,$start);
        $this->db->group_start();
        $this->db->where('created_date BETWEEN "'. $from_date. '" AND "'. $to_date. '" ');
        $this->db->where('status',1);
        $this->db->where('user_type',1);
        $this->db->order_by('id','desc');
        $this->db->group_end();
        $query =  $this->db->get('tbl_lead_contact_user');
        return $query->result();
    }
    public function getfilter_count_admin($data){
        $this->db->group_start();
        if($data['first_name']){
        $this->db->or_like('first_name',$data['first_name']);
        }
        if($data['last_name']){
        $this->db->or_like('last_name',$data['last_name']);
        }
        if($data['phone_no']){
        $this->db->or_like('mobile_1',$data['phone_no']);
        }
        if($data['second_phone_no']){
        $this->db->or_like('mobile_1',$data['second_phone_no']);
        }
        if($data['email']){
        $this->db->or_like('email',$data['email']);
        }
        if($data['lead_status']){
        $this->db->or_like('lead_status',$data['lead_status']);
        }
        $this->db->group_end();
        $this->db->where('status',1);
        $this->db->where('user_type', 1);
        $this->db->order_by('id','desc');
        return $this->db->count_all_results('tbl_lead_contact_user');
    }
    public function getfilter_result_admin($limit, $start,$data){
        $this->db->group_start();
        if($data['first_name']){
        $this->db->or_like('first_name',$data['first_name']);
        }
        if($data['last_name']){
        $this->db->or_like('last_name',$data['last_name']);
        }
        if($data['phone_no']){
        $this->db->or_like('mobile_1',$data['phone_no']);
        }
        if($data['second_phone_no']){
        $this->db->or_like('mobile_1',$data['second_phone_no']);
        }
        if($data['email']){
        $this->db->or_like('email',$data['email']);
        }
        if($data['lead_status']){
        $this->db->or_like('lead_status',$data['lead_status']);
        }
        $this->db->group_end();
        $this->db->where('status',1);
        $this->db->where('user_type', 1);
        $this->db->order_by('id','desc');
        $this->db->limit($limit,$start);
        $query  = $this->db->get('tbl_lead_contact_user');
        return $query->result();
    
    }
    // super admin and manager models lead 
    
    // user  models lead 
    public function get_count_leads($id)
    {
        $this->db->where('user_id', $id);
        $this->db->where('user_type', 1);
        $this->db->where('status', 1);
        $this->db->order_by('id', 'desc');
        return $this->db->count_all_results('tbl_lead_contact_user');
        //  echo $this->db->last_query();
        //  die;
    }
    public function get_result_leads($id,$limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->where('user_id', $id);
        $this->db->where('user_type', 1);
        $this->db->where('status', 1);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('tbl_lead_contact_user');
        return $query->result();
        
    }
    
    public function  getSearchInput_count($id,$gsearch)
    {
        
        $this->db->group_start();
        $this->db->or_like('first_name',$gsearch);
        $this->db->or_like('last_name',$gsearch);
        $this->db->or_like('mobile_1',$gsearch);
        $this->db->or_like('mobile_2',$gsearch);
        $this->db->or_like('email',$gsearch);
        $this->db->or_like('lead_status',$gsearch);
        $this->db->or_like('description',$gsearch);
        $this->db->group_end();
        $this->db->where('status',1);
        $this->db->where('user_type',1);
        $this->db->where('user_id', $id);
        $this->db->order_by('id','desc');
        return $this->db->count_all_results('tbl_lead_contact_user');
    }
    public function getSearchInput($id,$gsearch,$limit,$start){
        $this->db->group_start();
        $this->db->limit($limit, $start);
        $this->db->or_like('first_name',$gsearch);
        $this->db->or_like('last_name',$gsearch);
        $this->db->or_like('mobile_1',$gsearch);
        $this->db->or_like('mobile_2',$gsearch);
        $this->db->or_like('email',$gsearch);
        $this->db->or_like('lead_status',$gsearch);
        $this->db->or_like('description',$gsearch);
        $this->db->group_end();
        $this->db->where('status',1);
        $this->db->where('user_type',1);
        $this->db->where('user_id', $id);
        $query = $this->db->get('tbl_lead_contact_user');
        return $query->result();
    }
    public function filterLeadstatus_count($id,$lead_status)
    {
        $this->db->where('status', 1);
        $this->db->where('user_type', 1);
        $this->db->where('lead_status', $lead_status);
        $this->db->where('user_id', $id);
        $this->db->order_by('id','desc');
        return $this->db->count_all_results('tbl_lead_contact_user');
    }
    public function filterLeadstatus($id,$lead_status,$limit,$start)
    {
        $this->db->limit($limit, $start);
        $this->db->where('status', 1);
        $this->db->where('user_type', 1);
        $this->db->where('lead_status', $lead_status);
        $this->db->where('user_id', $id);
        $this->db->order_by('id','desc');
        $query = $this->db->get('tbl_lead_contact_user');
        return $query->result();
    }
    
    public function filterLeadDays_count($id,$getnumber)
    {
        $sql = "select count(id) as count from tbl_lead_contact_user WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'$getnumber' DAY) AND status = 1 AND user_type = 1 AND user_id = $id  ";
        $query = $this->db->query($sql);
        return $query->result();
        
    }
    
    public function filterLeadDays($id,$getnumber,$limit,$start)
    {
        $sql = "select * from tbl_lead_contact_user WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'$getnumber' DAY) AND status = 1 AND user_type = 1 AND user_id = $id  order by id desc limit";
        if($start)
        {
            $sql.= " $start,$limit";
        }
        else
        {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadWeek_count($id,$getnumber)
    {
        $sql = "select count(id) as count from tbl_lead_contact_user WHERE created_date>= DATE_ADD(NOW(), INTERVAL -'$getnumber' WEEK) AND status = 1 AND user_type = 1 AND user_id = $id  ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadWeek($id,$getnumber,$limit,$start)
    {
        $sql = "select * from tbl_lead_contact_user WHERE created_date>= DATE_ADD(NOW(), INTERVAL -'$getnumber' WEEK) AND status = 1 AND user_type = 1 AND user_id = $id  order by id desc limit";
        if($start)
        {
            $sql.= " $start,$limit";
        }
        else
        {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadMonth_count($id,$getnumber)
    {
        $sql = "select count(id) as count from tbl_lead_contact_user WHERE created_date>= DATE_ADD(NOW(), INTERVAL -'$getnumber' MONTH) AND status = 1 AND user_type = 1  AND user_id = $id  ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadMonth($id,$getnumber,$limit,$start)
    {
        $sql = "select * from tbl_lead_contact_user WHERE created_date>= DATE_ADD(NOW(), INTERVAL -'$getnumber' MONTH) AND status = 1 AND user_type = 1 AND user_id = $id  order by id desc limit";
        if($start)
        {
            $sql.= " $start,$limit";
        }
        else
        {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadtoday_count($id)
    {
        $sql = "select count(id) as count from tbl_lead_contact_user where date(created_date) = CURDATE() AND status = 1 AND user_type = 1  AND user_id = $id  ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadtoday($id,$limit,$start)
    {
        $sql = "select * from tbl_lead_contact_user where date(created_date) = CURDATE() AND status = 1 AND user_type = 1  AND user_id = $id  order by id desc limit";
        if($start)
        {
            $sql.= " $start,$limit";
        }
        else
        {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadweeks_count($id)
    {
        $sql = "SELECT COUNT(id) as count FROM tbl_lead_contact_user WHERE WEEK(created_date) = WEEK(CURRENT_DATE()) AND status=1 AND user_type = 1  AND user_id = $id  ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function filterLeadweeks($id,$limit,$start)
    {
        $sql = "SELECT * FROM tbl_lead_contact_user WHERE WEEK(created_date) = WEEK(CURRENT_DATE()) AND status=1 AND user_type = 1 AND user_id = $id  ORDER BY id DESC LIMIT";
        if($start)
        {
            $sql.= " $start,$limit";
        }
        else
        {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadmonths_count($id)
    {
        $sql = "SELECT COUNT(id) AS count FROM tbl_lead_contact_user WHERE MONTH(created_date) = MONTH(CURRENT_DATE()) AND status = 1 AND user_type = 1 AND user_id = $id ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadmonths($id,$limit,$start)
    {
        $sql = "SELECT * FROM tbl_lead_contact_user WHERE MONTH(created_date) = MONTH(CURRENT_DATE()) AND status = 1 AND user_type = 1 AND user_id = $id  ORDER BY id DESC LIMIT";
        if($start){
            $sql.= " $start,$limit";
        }
        else{
            $sql.=" $limit";
        }
        $query = $this->db->query($sql);
        // echo $this->db->last_query();
        return $query->result();
    }
    public function filterLeadyear_count($id)
    {
        $sql = "SELECT COUNT(id) AS count FROM tbl_lead_contact_user WHERE YEAR(created_date) = YEAR(CURRENT_DATE()) AND status = 1 AND user_type = 1 AND user_id = $id ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadyear($id,$limit,$start)
    {
        $sql = "SELECT * FROM tbl_lead_contact_user WHERE YEAR(created_date) = YEAR(CURRENT_DATE()) AND status = 1 AND user_type = 1 AND user_id = $id  ORDER BY id DESC LIMIT";
        if($start){
            $sql.= " $start,$limit";
        }
        else{
            $sql.=" $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast30days_count($id)
    {
        $sql = "select count(id) as count from tbl_lead_contact_user WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'30' DAY) AND status = 1 AND user_type = 1 AND user_id = $id   ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast30days($id,$limit,$start)
    {
        $sql = "select * from tbl_lead_contact_user WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'30' DAY) AND status = 1 AND user_type = 1 AND user_id = $id  order by id desc limit ";
        if($start){
            $sql.= " $start,$limit";
        }
        else{
            $sql.=" $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast60days_count($id)
    {
        $sql = "select count(id) as count from tbl_lead_contact_user WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'60' DAY) AND status = 1 AND user_type = 1 AND user_id = $id   ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast60days($id,$limit,$start)
    {
        $sql = "select * from tbl_lead_contact_user WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'60' DAY) AND status = 1 AND user_type = 1 AND user_id = $id  order by id desc limit";
        if($start){
            $sql.= " $start,$limit";
        }
        else{
            $sql.=" $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast90days_count($id)
    {
        $sql = "select count(id) as count from tbl_lead_contact_user WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'90' DAY) AND status = 1 AND user_type = 1 AND user_id = $id   ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast90days($id,$limit,$start)
    {
        $sql = "select * from tbl_lead_contact_user WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'90' DAY) AND status = 1 AND user_type = 1 AND user_id = $id  order by id desc limit";
        if($start){
            $sql.= " $start,$limit";
        }
        else{
            $sql.=" $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getfilter_count_user($id,$data){
        $this->db->group_start();
        if($data['first_name']){
        $this->db->or_like('first_name',$data['first_name']);
        }
        if($data['last_name']){
        $this->db->or_like('last_name',$data['last_name']);
        }
        if($data['phone_no']){
        $this->db->or_like('mobile_1',$data['phone_no']);
        }
        if($data['second_phone_no']){
        $this->db->or_like('mobile_1',$data['second_phone_no']);
        }
        if($data['email']){
        $this->db->or_like('email',$data['email']);
        }
        if($data['lead_status']){
        $this->db->or_like('lead_status',$data['lead_status']);
        }
        $this->db->group_end();
        $this->db->where('status',1);
        $this->db->where('user_type', 1);
        $this->db->where('user_id', $id);
        $this->db->order_by('id','desc');
        return $this->db->count_all_results('tbl_lead_contact_user');
    }
    public function getfilter_result_user($id,$limit, $start,$data){
        $this->db->group_start();
        if($data['first_name']){
        $this->db->or_like('first_name',$data['first_name']);
        }
        if($data['last_name']){
        $this->db->or_like('last_name',$data['last_name']);
        }
        if($data['phone_no']){
        $this->db->or_like('mobile_1',$data['phone_no']);
        }
        if($data['second_phone_no']){
        $this->db->or_like('mobile_2',$data['second_phone_no']);
        }
        if($data['email']){
        $this->db->or_like('email',$data['email']);
        }
        if($data['lead_status']){
        $this->db->or_like('lead_status',$data['lead_status']);
        }
        $this->db->group_end();
        $this->db->where('status',1);
        $this->db->where('user_type', 1);
        $this->db->where('user_id', $id);
        $this->db->order_by('id','desc');
        $this->db->limit($limit,$start);
        $query  = $this->db->get('tbl_lead_contact_user');
        return $query->result();
    
    }
    // user models lead 
    public  function transferLeadBySales($lead_id,$tech_user)
    {
         if(count($lead_id))
         {
            for($i=0;$i<count($lead_id);$i++)
            {
              $this->db->where('id',$lead_id[$i]);
              $this->db->update("tbl_lead_contact_user",['transfer_lead_status' => 2,'tech_user_id' => $tech_user]);
            }
            return true;
         }
    }
    public function get_count_transfer_admin() {
        
        $this->db->where('status',1);
        $this->db->where('transfer_lead_status',2);
        $this->db->where('tech_user_id',3);
        $this->db->order_by('id', 'desc');
        return $this->db->count_all_results('tbl_lead_contact_user');
        
       
    }
    public function get_result_transfer_admin($limit, $start) {
        
        $this->db->where('status',1);
        $this->db->where('transfer_lead_status',2);
        $this->db->where('tech_user_id',3);
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('tbl_lead_contact_user');
        return $query->result();
    }
    public function get_count_transfer_search_admin($gsearch) {
        $this->db->group_start();
        $this->db->or_like('first_name', $gsearch);
        $this->db->or_like('last_name', $gsearch);
        $this->db->or_like('email', $gsearch);
        $this->db->or_like('mobile_1', $gsearch);
        $this->db->or_like('mobile_2', $gsearch);
        $this->db->group_end();
        $this->db->where('status',1);
        $this->db->where('transfer_lead_status',2);
        $this->db->where('tech_user_id',3);
        $this->db->order_by('id', 'desc');
        return $this->db->count_all_results('tbl_lead_contact_user');
    
    }
    public function get_result_transfer_search_admin($limit, $start,$gsearch) {
        $this->db->group_start();
        $this->db->or_like('first_name', $gsearch);
        $this->db->or_like('last_name', $gsearch);
        $this->db->or_like('email', $gsearch);
        $this->db->or_like('mobile_1', $gsearch);
        $this->db->or_like('mobile_2', $gsearch);
        $this->db->group_end();
        $this->db->where('status',1);
        $this->db->where('transfer_lead_status',2);
        $this->db->where('tech_user_id',3);
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('tbl_lead_contact_user');
        return $query->result();
        
    }
    public function get_count_transfer_user($id) {
        
        $this->db->where('status',1);
        $this->db->where('transfer_lead_status',2);
        $this->db->where('tech_user_id',3);
        $this->db->where('user_id',$id);
        $this->db->order_by('id', 'desc');
        return $this->db->count_all_results('tbl_lead_contact_user');
        //  echo $this->db->last_query();
        //  die;
        
       
    }
    public function get_result_transfer_user($limit, $start,$id) {
        
        $this->db->where('status',1);
        $this->db->where('transfer_lead_status',2);
        $this->db->where('tech_user_id',3);
        $this->db->where('user_id',$id);
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('tbl_lead_contact_user');
        return $query->result();
    }
    public function get_count_transfer_search_user($gsearch,$id) {
        $this->db->group_start();
        $this->db->or_like('first_name', $gsearch);
        $this->db->or_like('last_name', $gsearch);
        $this->db->or_like('email', $gsearch);
        $this->db->or_like('mobile_1', $gsearch);
        $this->db->or_like('mobile_2', $gsearch);
        $this->db->group_end();
        $this->db->where('status',1);
        $this->db->where('transfer_lead_status',2);
        $this->db->where('tech_user_id',3);
        $this->db->where('user_id',$id);
        $this->db->order_by('id', 'desc');
        return $this->db->count_all_results('tbl_lead_contact_user');
    
    }
    public function get_result_transfer_search_user($limit, $start,$gsearch,$id) {
        $this->db->group_start();
        $this->db->or_like('first_name', $gsearch);
        $this->db->or_like('last_name', $gsearch);
        $this->db->or_like('email', $gsearch);
        $this->db->or_like('mobile_1', $gsearch);
        $this->db->or_like('mobile_2', $gsearch);
        $this->db->group_end();
        $this->db->where('status',1);
        $this->db->where('transfer_lead_status',2);
        $this->db->where('tech_user_id',3);
        $this->db->where('user_id',$id);
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('tbl_lead_contact_user');
        return $query->result();
        
    }
    
   
    // public function get_count_transfer_user($user_id) {
        
    //     $this->db->where('status',1);
    //     $this->db->where('transfer_lead_status',2);
    //     $this->db->where('tech_user_id', $user_id);
    //     $this->db->order_by('id', 'desc');
    //     return $this->db->count_all_results('tbl_lead_contact_user');
       
    // }
    // public function get_result_transfer_user($limit, $start,$user_id) {
        
    //     $this->db->select('a.*,b.name as tech_user_name,b.username as tech_username');
    //     $this->db->join("tbl_users b","a.tech_user_id=b.id","inner");
    //     $this->db->where('a.status',1);
    //     $this->db->where('b.status',1);
    //     $this->db->where('a.transfer_lead_status',2);
    //     $this->db->where('a.tech_user_id', $user_id);
    //     $this->db->order_by('a.id', 'desc');
    //     $this->db->limit($limit, $start);
    //     $query = $this->db->get('tbl_lead_contact_user a');
    //     return $query->result();
    // }
    // public function get_count_transfer_search_user($gsearch,$user_id) {
    //     $this->db->group_start();
    //     $this->db->or_like('a.first_name', $gsearch);
    //     $this->db->or_like('a.last_name', $gsearch);
    //     $this->db->or_like('a.email', $gsearch);
    //     $this->db->or_like('a.mobile_1', $gsearch);
    //     $this->db->or_like('a.mobile_2', $gsearch);
    //     $this->db->or_like('b.username', $gsearch);
    //     $this->db->or_like('b.name', $gsearch);
    //     $this->db->group_end();
    //     $this->db->where('a.status', 1);
    //     $this->db->where('a.tech_user_id', $user_id);
    //     $this->db->where('b.status', 1);
    //     $this->db->where('a.transfer_lead_status', 2);
    //     $this->db->order_by('a.id', 'desc');
    //     $this->db->select('a.*,b.name as tech_user_name,b.username as tech_username');
    //     $this->db->join("tbl_users b","a.tech_user_id=b.id","inner");
    //     return $this->db->count_all_results('tbl_lead_contact_user a');
    // }
    // public function get_result_transfer_search_user($limit, $start,$gsearch,$user_id) {
    //     $this->db->group_start();
    //     $this->db->or_like('a.first_name', $gsearch);
    //     $this->db->or_like('a.last_name', $gsearch);
    //     $this->db->or_like('a.email', $gsearch);
    //     $this->db->or_like('a.mobile_1', $gsearch);
    //     $this->db->or_like('a.mobile_2', $gsearch);
    //     $this->db->or_like('b.username', $gsearch);
    //     $this->db->or_like('b.name', $gsearch);
    //     $this->db->group_end();
    //     $this->db->where('a.status', 1);
    //     $this->db->where('a.tech_user_id', $user_id);
    //     $this->db->where('b.status', 1);
    //     $this->db->where('a.transfer_lead_status', 2);
    //     $this->db->order_by('a.id', 'desc');
    //     $this->db->select('a.*,b.name as tech_user_name,b.username as tech_username');
    //     $this->db->join("tbl_users b","a.tech_user_id=b.id","inner");
    //     $query = $this->db->get('tbl_lead_contact_user a');
    //     return $query->result();
    // }
    
    public function getInvoiceCustNAme($id){
        $this->db->where('id',$id);
        $this->db->where('status',1);
        $query = $this->db->get('tbl_users');
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
    public function activity($id){
        $this->db->where('status',1);
        $this->db->where('user_id',$id);
        $this->db->order_by('id','desc');
        $this->db->limit(1);
        $query = $this->db->get('tbl_log');
        return $query->result();
    }
    public function getDuplicateLead($userEmail,$mobile_no,$lead_id="")
    {
        if(!empty($lead_id))
        {
            $sql = "select email from tbl_lead_contact_user where (email = '".$userEmail."' || mobile_1 = '".$mobile_no."') && id != '".$lead_id."' &&  status!=3 UNION select email from tbl_leads where (email = '".$userEmail."' || phone = '".$mobile_no."') && lead_id !='".$lead_id."' && status!=3";
        }
        else
        {
            $sql = "select email from tbl_lead_contact_user where (email = '".$userEmail."' || mobile_1 = '".$mobile_no."') && status!=3 UNION select email from tbl_leads where (email = '".$userEmail."' || phone = '".$mobile_no."') && status!=3";
            
        }
        $query = $this->db->query($sql);
        if($query->num_rows()>0)
        {
            return true;
        }   
        return false;
        
    }
    public function  getSearchInput_count_user($id,$gsearch)
    {
        $this->db->group_start();
        $this->db->or_like('first_name',$gsearch);
        $this->db->or_like('last_name',$gsearch);
        $this->db->or_like('mobile_1',$gsearch);
        $this->db->or_like('mobile_2',$gsearch);
        $this->db->or_like('email',$gsearch);
        $this->db->or_like('lead_status',$gsearch);
        $this->db->or_like('description',$gsearch);
        $this->db->group_end();
        $this->db->where('status',1);
        $this->db->where('user_id',$id);
        $this->db->where('user_type', 1);
        return $this->db->count_all_results('tbl_lead_contact_user');
    }
    public function getSearchInput_user($id,$limit,$start,$gsearch){
        $this->db->group_start();
        $this->db->limit($limit, $start);
        $this->db->or_like('first_name',$gsearch);
        $this->db->or_like('last_name',$gsearch);
        $this->db->or_like('mobile_1',$gsearch);
        $this->db->or_like('mobile_2',$gsearch);
        $this->db->or_like('email',$gsearch);
        $this->db->or_like('lead_status',$gsearch);
        $this->db->or_like('description',$gsearch);
        $this->db->group_end();
        $this->db->where('status',1);
        $this->db->where('user_id',$id);
        $this->db->where('user_type',1);
        $this->db->order_by('id','desc');
        $query = $this->db->get('tbl_lead_contact_user');
        return $query->result();
    }
    public function getfirstnamecount_user($id,$first_name){
      $this->db->like('first_name',$first_name);
      $this->db->where('status',1);
      $this->db->where('user_id',$id);
      $this->db->where('user_type',1);
      return $this->db->count_all_results('tbl_lead_contact_user');        
    }
    public function getfirstname_user($id,$limit,$start,$first_name){
      $this->db->limit($limit,$start);
      $this->db->like('first_name',$first_name);
      $this->db->where('status',1);
      $this->db->where('user_type',1);
      $this->db->where('user_id',$id);
      $this->db->order_by('id','desc');
      $query =  $this->db->get('tbl_lead_contact_user');        
      return $query->result();
    }
    public function getlastnamecount_user($id,$first_name){
      $this->db->like('last_name',$first_name);
      $this->db->where('status',1);
      $this->db->where('user_id',$id);
      $this->db->where('user_type',1);
      return $this->db->count_all_results('tbl_lead_contact_user');        
    }
    public function getlastname_user($id,$limit,$start,$first_name){
      $this->db->limit($limit,$start);
      $this->db->like('last_name',$first_name);
      $this->db->where('status',1);
      $this->db->where('user_id',$id);
      $this->db->where('user_type',1);
      $this->db->order_by('id','desc');
      $query =  $this->db->get('tbl_lead_contact_user');        
      return $query->result();
    }
    public function getphonecount_user($id,$first_name){
      $this->db->like('mobile_1',$first_name);
      $this->db->where('status',1);
      $this->db->where('user_id',$id);
      $this->db->where('user_type',1);
      return $this->db->count_all_results('tbl_lead_contact_user');        
    }
    public function getphone_user($id,$limit,$start,$first_name){
      $this->db->limit($limit,$start);
      $this->db->like('mobile_1',$first_name);
      $this->db->where('status',1);
      $this->db->where('user_id',$id);
      $this->db->where('user_type',1);
      $this->db->order_by('id','desc');
      $query =  $this->db->get('tbl_lead_contact_user');        
      return $query->result();
    }
    public function getsecondphonecount_user($id,$first_name){
      $this->db->like('mobile_2',$first_name);
      $this->db->where('status',1);
      $this->db->where('user_id',$id);
      $this->db->where('user_type',1);
      return $this->db->count_all_results('tbl_lead_contact_user');        
    }
    public function getsecondphone_user($id,$limit,$start,$first_name){
      $this->db->limit($limit,$start);
      $this->db->like('mobile_2',$first_name);
      $this->db->where('status',1);
      $this->db->where('user_id',$id);
      $this->db->where('user_type',1);
      $this->db->order_by('id','desc');
      $query =  $this->db->get('tbl_lead_contact_user');        
      return $query->result();
    }
    public function getemailcount_user($id,$first_name){
      $this->db->like('email',$first_name);
      $this->db->where('status',1);
      $this->db->where('user_type',1);
      $this->db->where('user_id',$id);
      return $this->db->count_all_results('tbl_lead_contact_user');        
    }
    public function getemail_user($id,$limit,$start,$first_name){
      $this->db->limit($limit,$start);
      $this->db->like('email',$first_name);
      $this->db->where('status',1);
      $this->db->where('user_type',1);
      $this->db->where('user_id',$id);
      $this->db->order_by('id','desc');
      $query =  $this->db->get('tbl_lead_contact_user');        
      return $query->result();
    }
    public function getleadstatuscount_user($id,$first_name){
      $this->db->where('lead_status',$first_name);
      $this->db->where('status',1);
      $this->db->where('user_id',$id);
      $this->db->where('user_type',1);
      return $this->db->count_all_results('tbl_lead_contact_user');        
    }
    public function getleadstatus_user($id,$limit,$start,$first_name){
      $this->db->limit($limit,$start);
      $this->db->where('lead_status',$first_name);
      $this->db->where('status',1);
      $this->db->where('user_type',1);
      $this->db->where('user_id',$id);
      $this->db->order_by('id','desc');
      $query =  $this->db->get('tbl_lead_contact_user');        
      return $query->result();
    }
    public function getfromtoocount_user($id,$from,$too){
        $to_exp = explode('-',$too);
        $to_date = $to_exp[2].'-'.$to_exp[0].'-'.$to_exp[1];
        $from_exp = explode('-',$from);
        $from_date = $from_exp[2].'-'.$from_exp[0].'-'.$from_exp[1];
        $this->db->group_start();
        $this->db->where('created_date BETWEEN "'. $from_date. '" AND "'. $to_date. '" ');
        $this->db->where('status',1);
        $this->db->where('user_id',$id);
        $this->db->where('user_type',1);
        $this->db->group_end();
        return $this->db->count_all_results('tbl_lead_contact_user');
    }
    public function getfromtoo_user($id,$limit,$start,$from,$too){
        $this->db->limit($limit,$start);
        $to_exp = explode('-',$too);
        $to_date = $to_exp[2].'-'.$to_exp[0].'-'.$to_exp[1];
        $from_exp = explode('-',$from);
        $from_date = $from_exp[2].'-'.$from_exp[0].'-'.$from_exp[1];
        $this->db->group_start();
        $this->db->where('created_date BETWEEN "'. $from_date. '" AND "'. $to_date. '" ');
        $this->db->where('status',1);
        $this->db->where('user_type',1);
        $this->db->where('user_id',$id);
        $this->db->group_end();
        $this->db->order_by('id','desc');
        $query =  $this->db->get('tbl_lead_contact_user');
        return $query->result();
    }


    public function getplan($id){
        $this->db->where('status',1);
        $this->db->where('id',$id);
        $query = $this->db->get('tbl_lead_contact_user');
        return $query->result();

    }

    public function checkEmailHistory($id,$module_id){
        $this->db->where('status',1);
        $this->db->where('lead_id',$id);
        $this->db->where('module_type',$module_id);
        $query = $this->db->get('tbl_email');
        return $query->result();
    }

    public function updateEmailType($id){
        $this->db->where('id',$id);
        $this->db->set('module_type',5);
        $this->db->update('tbl_email');
        // echo $this->db->last_query();
        // die;
        if($this->db->update('tbl_email')){
            return true;
        }else{
            return false;
        }

    }

    public function savehisoryEmail($data){
        if($this->db->insert('tbl_email',$data)){
            return true;
        }else{
            return false;
        }
    }

    public function getvalue($id,$column_name){

        $this->db->select($column_name);
        $this->db->where('status',1);
        $this->db->where('id',$id);
        $query = $this->db->get('tbl_lead_contact_user');
        return $query->result();

    }
}
