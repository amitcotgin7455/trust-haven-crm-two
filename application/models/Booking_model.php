<?php
defined('BASEPATH') or exit('direct script no access allowed');
class Booking_model extends CI_Model
{
    public function insertData($data)
    {   
        if ($this->db->insert('tbl_bookings', $data)) {
            return true;
        } else {
            return false;
        }
    }
    public function fetchSelectName()
    {
        $this->db->group_start();
        $this->db->or_where('lead_status', 2);
        $this->db->or_where('user_type', 2);
        $this->db->group_end();
        $this->db->where('status', 1);
        $query = $this->db->get('tbl_lead_contact_user');
        return $query->result();
    }
    public function fetchSelectNameUser($id)
    {
        $this->db->group_start();
        $this->db->or_where('lead_status', 2);
        $this->db->or_where('user_type', 2);
        $this->db->group_end();
        $this->db->where('status', 1);
        $this->db->where('user_id', $id);
        $query = $this->db->get('tbl_lead_contact_user');
        return $query->result();
    }
    public function manageColumn($id, $update)
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
    public function deleteBooking($ids)
    {
        $this->db->set('status', 3);
        $this->db->where_in('id', $ids);
        if ($this->db->update('tbl_bookings')) {
            return true;
        } else {
            false;
        }
    }
    public function detailBooking($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_bookings');
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result();
    }
    public function GetuserNameContacts($user_id)
    {
        $this->db->where('id', $user_id);
        $this->db->where('status', 1);
        $query = $this->db->get('tbl_users');
        return $query->result();
    }
    public function updateDetail($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        if ($this->db->update('tbl_bookings', $data)) {
            return true;
        } else {
            return false;
        }
    }
    public function getContacts($id)
    {
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get('tbl_bookings');
        return $query->result();
    }
    public function updateBookingdata($hidden_id, $update)
    {    
        $this->db->where('id', $hidden_id);
        if ($this->db->update('tbl_bookings', $update)) {
           return true;
        } else {
          return  false;
        }
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
        // $this->db->select('a.title as title ,a.id as note_id ,a.module_id as ,a.module_name as module_name ,a.created_date as created_date ,b.first_name as first_name,c.id');
        // $this->db->join('tbl_notes a ','a.module_id=c.id','left');
        // $this->db->join('tbl_lead_contact_user b','c.first_name=b.id','left');
        // $this->db->where('c.status',1);
        // $this->db->where('a.module_id',$module_id);
        // $this->db->where('b.id',$first_name);
        // $this->db->where('a.module_type',$module_type);
        // $query = $this->db->get('tbl_bookings c');
        // echo $this->db->last_query();
        // die;
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
    public function getBooking($id)
    {
        $this->db->where('status', 1);
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_lead_contact_user');
        return $query->result();
    }
    // super admin and manager models Booking 
    public function get_count_leads_admin()
    {
        $this->db->select('a.*, b.first_name as first');
        $this->db->join('tbl_lead_contact_user b' , 'a.first_name=b.id','inner');
        $this->db->where('a.status',1);
        $this->db->order_by('a.id', 'desc');
        return  $this->db->count_all_results('tbl_bookings a');
    }
    public function get_result_leads_admin($limit, $start)
    {
        $this->db->select('a.*, b.first_name as first');
        $this->db->join('tbl_lead_contact_user b' , 'a.first_name=b.id','inner');
        $this->db->where('a.status',1);
        $this->db->limit($limit, $start);
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get('tbl_bookings a');
        return $query->result();
    }
    public function  getSearchInput_count_admin($gsearch)
    {
        $this->db->group_start();
        $this->db->or_like('b.first_name', $gsearch);
        $this->db->or_like('a.last_name', $gsearch);
        $this->db->or_like('a.mobile_1', $gsearch);
        $this->db->or_like('a.mobile_2', $gsearch);
        $this->db->or_like('a.email', $gsearch);
        $this->db->or_like('a.date', $gsearch);
        $this->db->or_like('a.time', $gsearch);
        $this->db->group_end();
        $this->db->select('a.*, b.first_name as first');
        $this->db->join('tbl_lead_contact_user b' , 'a.first_name=b.id','inner');
        $this->db->where('a.status',1);
        $this->db->order_by('a.id', 'desc');
        return $this->db->count_all_results('tbl_bookings a');
    
    }
    public function getSearchInput_admin($gsearch, $limit, $start)
    {
        $this->db->group_start();
        $this->db->or_like('b.first_name', $gsearch);
        $this->db->or_like('a.last_name', $gsearch);
        $this->db->or_like('a.mobile_1', $gsearch);
        $this->db->or_like('a.mobile_2', $gsearch);
        $this->db->or_like('a.email', $gsearch);
        $this->db->or_like('a.date', $gsearch);
        $this->db->or_like('a.time', $gsearch);
        $this->db->group_end();
        $this->db->select('a.*, b.first_name as first');
        $this->db->join('tbl_lead_contact_user b' , 'a.first_name=b.id','inner');
        $this->db->where('a.status',1);
        $this->db->order_by('a.id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('tbl_bookings a');
        return $query->result();
        
    }
    public function filterLeadstatus_count_admin($lead_status)
    {
        $this->db->select('a.*, b.first_name as first');
        $this->db->join('tbl_lead_contact_user b' , 'a.first_name=b.id','inner');
        $this->db->where('a.status',1);
        $this->db->where('a.booking_status',$lead_status);
        $this->db->order_by('a.id', 'desc');
        $this->db->count_all_results('tbl_bookings a');    
    }
    public function filterLeadstatus_admin($lead_status, $limit, $start)
    {
        $this->db->select('a.*, b.first_name as first');
        $this->db->join('tbl_lead_contact_user b' , 'a.first_name=b.id','inner');
        $this->db->where('a.status',1);
        $this->db->where('a.booking_status',$lead_status);
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get('tbl_bookings a');  
        return $query->result();
    }
    public function filterLeadDays_count_admin($getnumber)
    {
        $sql = "select count(id) as count from tbl_bookings WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'$getnumber' DAY) AND status = 1 ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadDays_admin($getnumber, $limit, $start)
    {   
        $sql = "SELECT `a`.*, `b`.`first_name` as `first` FROM `tbl_bookings` `a` INNER JOIN `tbl_lead_contact_user` `b` ON `a`.`first_name`=`b`.`id` WHERE `a`.`status` = 1  AND `a`.`created_date`>= DATE_ADD(CURDATE(), INTERVAL -'$getnumber' DAY) ORDER BY `a`.`id` DESC LIMIT";
        if ($start) {
            $sql .= " $start,$limit";
        } else {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadWeek_count_admin($getnumber)
    {
        $sql = "select count(id) as count from tbl_bookings WHERE created_date>= DATE_ADD(NOW(), INTERVAL -'$getnumber' WEEK) AND status = 1   ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadWeek_admin($getnumber, $limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`first_name` as `first` FROM `tbl_bookings` `a` INNER JOIN `tbl_lead_contact_user` `b` ON `a`.`first_name`=`b`.`id` WHERE `a`.`status` = 1  AND `a`.`created_date`>= DATE_ADD(CURDATE(), INTERVAL -'$getnumber' WEEK) ORDER BY `a`.`id` DESC LIMIT";
        if ($start) {
            $sql .= " $start,$limit";
        } else {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadMonth_count_admin($getnumber)
    {
        $sql = "select count(id) as count from tbl_bookings WHERE created_date>= DATE_ADD(NOW(), INTERVAL -'$getnumber' MONTH) AND status = 1   ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadMonth_admin($getnumber, $limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`first_name` as `first` FROM `tbl_bookings` `a` INNER JOIN `tbl_lead_contact_user` `b` ON `a`.`first_name`=`b`.`id` WHERE `a`.`status` = 1  AND `a`.`created_date`>= DATE_ADD(CURDATE(), INTERVAL -'$getnumber' MONTH) ORDER BY `a`.`id` DESC LIMIT";
        if ($start) {
            $sql .= " $start,$limit";
        } else {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadtoday_count_admin()
    {
        $sql = "select count(id) as count from tbl_bookings where date(created_date) = CURDATE() AND status = 1   ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadtoday_admin($limit, $start)
    {
        
        $sql = "SELECT `a`.*, `b`.`first_name` as `first` FROM `tbl_bookings` `a` INNER JOIN `tbl_lead_contact_user` `b` ON `a`.`first_name`=`b`.`id` WHERE `a`.`status` = 1  AND date(`a`.`created_date`) = CURDATE() ORDER BY `a`.`id` DESC LIMIT";
        if ($start) {
            $sql .= " $start,$limit";
        } else {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadweeks_count_admin()
    {
        $sql = "SELECT COUNT(id) as count FROM tbl_bookings WHERE WEEK(created_date) = WEEK(CURRENT_DATE()) AND status=1   ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadweeks_admin($limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`first_name` as `first` FROM `tbl_bookings` `a` INNER JOIN `tbl_lead_contact_user` `b` ON `a`.`first_name`=`b`.`id` WHERE `a`.`status` = 1  AND WEEK(`a`.`created_date`) = WEEK(CURRENT_DATE()) ORDER BY `a`.`id` DESC LIMIT";
        if ($start) {
            $sql .= " $start,$limit";
        } else {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadmonths_count_admin()
    {
        $sql = "SELECT COUNT(id) AS count FROM tbl_bookings WHERE MONTH(created_date) = MONTH(CURRENT_DATE()) AND status = 1 ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadmonths_admin($limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`first_name` as `first` FROM `tbl_bookings` `a` INNER JOIN `tbl_lead_contact_user` `b` ON `a`.`first_name`=`b`.`id` WHERE `a`.`status` = 1  AND MONTH(`a`.`created_date`) = MONTH(CURRENT_DATE()) ORDER BY `a`.`id` DESC LIMIT";
        if ($start) {
            $sql .= " $start,$limit";
        } else {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        // echo $this->db->last_query();
        return $query->result();
    }
    public function filterLeadyear_count_admin()
    {
        $sql = "SELECT COUNT(id) AS count FROM tbl_bookings WHERE YEAR(created_date) = YEAR(CURRENT_DATE()) AND status = 1  ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadyear_admin($limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`first_name` as `first` FROM `tbl_bookings` `a` INNER JOIN `tbl_lead_contact_user` `b` ON `a`.`first_name`=`b`.`id` WHERE `a`.`status` = 1  AND YEAR(`a`.`created_date`) = YEAR(CURRENT_DATE()) ORDER BY `a`.`id` DESC LIMIT";
        if ($start) {
            $sql .= " $start,$limit";
        } else {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast30days_count_admin()
    {
        $sql = "select count(id) as count from tbl_bookings WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'30' DAY) AND status = 1   ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast30days_admin($limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`first_name` as `first` FROM `tbl_bookings` `a` INNER JOIN `tbl_lead_contact_user` `b` ON `a`.`first_name`=`b`.`id` WHERE `a`.`status` = 1  AND `a`.`created_date` >= DATE_ADD(CURDATE(), INTERVAL -'30' DAY) ORDER BY `a`.`id` DESC LIMIT";
        if ($start) {
            $sql .= " $start,$limit";
        } else {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast60days_count_admin()
    {
        $sql = "select count(id) as count from tbl_bookings WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'60' DAY) AND status = 1   ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast60days_admin($limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`first_name` as `first` FROM `tbl_bookings` `a` INNER JOIN `tbl_lead_contact_user` `b` ON `a`.`first_name`=`b`.`id` WHERE `a`.`status` = 1  AND `a`.`created_date` >= DATE_ADD(CURDATE(), INTERVAL -'60' DAY) ORDER BY `a`.`id` DESC LIMIT";
        if ($start) {
            $sql .= " $start,$limit";
        } else {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast90days_count_admin()
    {
        $sql = "select count(id) as count from tbl_bookings WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'90' DAY) AND status = 1   ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast90days_admin($limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`first_name` as `first` FROM `tbl_bookings` `a` INNER JOIN `tbl_lead_contact_user` `b` ON `a`.`first_name`=`b`.`id` WHERE `a`.`status` = 1  AND `a`.`created_date` >= DATE_ADD(CURDATE(), INTERVAL -'90' DAY) ORDER BY `a`.`id` DESC LIMIT";
        if ($start) {
            $sql .= " $start,$limit";
        } else {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getfromtoo_count_admin($from,$too){
        $to_exp = explode('-',$too);
        $to_date = $to_exp[2].'-'.$to_exp[0].'-'.$to_exp[1];
        $from_exp = explode('-',$from);
        $from_date = $from_exp[2].'-'.$from_exp[0].'-'.$from_exp[1];
        $this->db->select('a.*, b.first_name as first');
        $this->db->join('tbl_lead_contact_user b' , 'a.first_name=b.id','inner');
        $this->db->group_start();
        $this->db->where('a.created_date BETWEEN "'. $from_date. '" AND "'. $to_date. '" ');
        $this->db->where('a.status',1);
        $this->db->group_end();
        $this->db->order_by('a.id', 'desc');
        return $this->db->count_all_results('tbl_bookings a');
    }
    public function getfromtoo_result_admin($limit,$start,$from,$too){
        $to_exp = explode('-',$too);
        $to_date = $to_exp[2].'-'.$to_exp[0].'-'.$to_exp[1];
        $from_exp = explode('-',$from);
        $from_date = $from_exp[2].'-'.$from_exp[0].'-'.$from_exp[1];
        $this->db->limit($limit,$start);
        $this->db->select('a.*, b.first_name as first');
        $this->db->join('tbl_lead_contact_user b' , 'a.first_name=b.id','inner');
        $this->db->group_start();
        $this->db->where('a.created_date BETWEEN "'. $from_date. '" AND "'. $to_date. '" ');
        $this->db->where('a.status',1);
        $this->db->group_end();
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get('tbl_bookings a');
        return $query->result();
    }
  public function getfilter_count_admin($data){
        // prx($data);
        $time = explode(' ',$data['time']) ;
        $time_format = date('H:i', strtotime($data['time'])); 
        
        $this->db->group_start();
        if($data['first_name']){
        $this->db->or_like('b.first_name',$data['first_name']);
        }
        if($data['last_name']){
        $this->db->or_like('a.last_name',$data['last_name']);
        }
        if($data['phone_no']){
        $this->db->or_like('a.mobile_1',$data['phone_no']);
        }
        if($data['phone_no2']){
        $this->db->or_like('a.mobile_2',$data['phone_no2']);
        }
        if($data['email']){
        $this->db->or_like('a.email',$data['email']);
        }
        if($data['booking_date']){
        $this->db->or_like('a.date',$data['booking_date']);
        }
        if($data['time']){
        $this->db->or_like('a.time',$time_format);
        }
        if($data['timezone']){
        $this->db->or_like('a.timezone',$data['timezone']);
        }
        if($data['booking_status']){
        $this->db->or_like('a.booking_status',$data['booking_status']);
        }
        $this->db->group_end();
        $this->db->select('a.*, b.first_name as first');
        $this->db->join('tbl_lead_contact_user b' , 'a.first_name=b.id','inner');
        $this->db->where('a.status',1);
        $this->db->order_by('a.id', 'desc');
        return $this->db->count_all_results('tbl_bookings a');  
        
    }
    public function getfilter_result_admin($limit, $start,$data){
        $time = explode(' ',$data['time']);
        $time_format = date('H:i', strtotime($data['time'])); 
        $this->db->group_start();
        if($data['first_name']){
        $this->db->or_like('b.first_name',$data['first_name']);
        }
        if($data['last_name']){
        $this->db->or_like('a.last_name',$data['last_name']);
        }
        if($data['phone_no']){
        $this->db->or_like('a.mobile_1',$data['phone_no']);
        }
        if($data['phone_no2']){
        $this->db->or_like('a.mobile_2',$data['phone_no2']);
        }
        if($data['email']){
        $this->db->or_like('a.email',$data['email']);
        }
        if($data['booking_date']){
        $this->db->or_like('a.date',$data['booking_date']);
        }
        if($data['time']){
        $this->db->or_like('a.time',$time_format);
        }
        if($data['timezone']){
        $this->db->or_like('a.timezone',$data['timezone']);
        }
        if($data['booking_status']){
        $this->db->or_like('a.booking_status',$data['booking_status']);
        }
        $this->db->group_end();
        $this->db->select('a.*, b.first_name as first');
        $this->db->join('tbl_lead_contact_user b' , 'a.first_name=b.id','inner');
        $this->db->where('a.status',1);
        $this->db->limit($limit,$start);
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get('tbl_bookings a');
        return $query->result();
    
    }
    // super admin and manager models Booking 
    // user  models Booking 
    public function get_count_leads($id)
    {   
        $this->db->select('a.*, b.first_name as first');
        $this->db->join('tbl_lead_contact_user b' , 'a.first_name=b.id','inner');
        $this->db->where('a.status',1);
        $this->db->order_by('a.id', 'desc');
        return  $this->db->count_all_results('tbl_bookings a');
    }
    public function get_result_leads($id ,$limit, $start)
    {   
        $this->db->select('a.*, b.first_name as first');
        $this->db->join('tbl_lead_contact_user b' , 'a.first_name=b.id','inner');
        $this->db->where('a.status',1);
        
        $this->db->order_by('a.id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('tbl_bookings a');
        return $query->result();
    }
    public function  getSearchInput_count($id,$gsearch)
    {
        $this->db->group_start();
        $this->db->or_like('b.first_name', $gsearch);
        $this->db->or_like('a.last_name', $gsearch);
        $this->db->or_like('a.mobile_1', $gsearch);
        $this->db->or_like('a.mobile_2', $gsearch);
        $this->db->or_like('a.email', $gsearch);
        $this->db->or_like('a.date', $gsearch);
        $this->db->or_like('a.time', $gsearch);
        $this->db->group_end();
        $this->db->select('a.*, b.first_name as first');
        $this->db->join('tbl_lead_contact_user b' , 'a.first_name=b.id','inner');
        $this->db->where('a.status',1);
        
        $this->db->order_by('a.id', 'desc');
        return $this->db->count_all_results('tbl_bookings a');
    
    }
    public function getSearchInput($id, $gsearch, $limit, $start)
    {
        $this->db->group_start();
        $this->db->or_like('b.first_name', $gsearch);
        $this->db->or_like('a.last_name', $gsearch);
        $this->db->or_like('a.mobile_1', $gsearch);
        $this->db->or_like('a.mobile_2', $gsearch);
        $this->db->or_like('a.email', $gsearch);
        $this->db->or_like('a.date', $gsearch);
        $this->db->or_like('a.time', $gsearch);
        $this->db->group_end();
        $this->db->select('a.*, b.first_name as first');
        $this->db->join('tbl_lead_contact_user b' , 'a.first_name=b.id','inner');
        $this->db->where('a.status',1);
        
        $this->db->order_by('a.id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('tbl_bookings a');
        return $query->result();
        
    }
    public function filterLeadstatus_count($id,$lead_status)
    {
        $this->db->select('a.*, b.first_name as first');
        $this->db->join('tbl_lead_contact_user b' , 'a.first_name=b.id','inner');
        $this->db->where('a.status',1);
        $this->db->where('a.booking_status',$lead_status);
        
        $this->db->order_by('a.id', 'desc');
        $this->db->count_all_results('tbl_bookings a');    
    }
    public function filterLeadstatus($id,$lead_status, $limit, $start)
    {
        $this->db->select('a.*, b.first_name as first');
        $this->db->join('tbl_lead_contact_user b' , 'a.first_name=b.id','inner');
        $this->db->where('a.status',1);
        $this->db->where('a.booking_status',$lead_status);
        
        $this->db->order_by('a.id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('tbl_bookings a');  
        return $query->result();
    }
    public function filterLeadDays_count($id,$getnumber)
    {
        $sql = "select count(id) as count from tbl_bookings WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'$getnumber' DAY) AND status = 1 AND user_id=$id";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadDays($id,$getnumber, $limit, $start)
    {   
        $sql = "SELECT `a`.*, `b`.`first_name` as `first` FROM `tbl_bookings` `a` INNER JOIN `tbl_lead_contact_user` `b` ON `a`.`first_name`=`b`.`id` WHERE `a`.`status` = 1  AND `a`.`created_date`>= DATE_ADD(CURDATE(), INTERVAL -'$getnumber' DAY) AND `a`.`user_id`=$id ORDER BY `a`.`id` DESC LIMIT";
        if ($start) {
            $sql .= " $start,$limit";
        } else {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadWeek_count($id,$getnumber)
    {
        $sql = "select count(id) as count from tbl_bookings WHERE created_date>= DATE_ADD(NOW(), INTERVAL -'$getnumber' WEEK) AND status = 1 AND user_id=$id  ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadWeek($id,$getnumber, $limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`first_name` as `first` FROM `tbl_bookings` `a` INNER JOIN `tbl_lead_contact_user` `b` ON `a`.`first_name`=`b`.`id` WHERE `a`.`status` = 1  AND `a`.`created_date`>= DATE_ADD(CURDATE(), INTERVAL -'$getnumber' WEEK) AND `a`.`user_id`=$id ORDER BY `a`.`id` DESC LIMIT";
        if ($start) {
            $sql .= " $start,$limit";
        } else {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadMonth_count($id,$getnumber)
    {
        $sql = "select count(id) as count from tbl_bookings WHERE created_date>= DATE_ADD(NOW(), INTERVAL -'$getnumber' MONTH) AND status = 1  AND user_id=$id ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadMonth($id,$getnumber, $limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`first_name` as `first` FROM `tbl_bookings` `a` INNER JOIN `tbl_lead_contact_user` `b` ON `a`.`first_name`=`b`.`id` WHERE `a`.`status` = 1  AND `a`.`created_date`>= DATE_ADD(CURDATE(), INTERVAL -'$getnumber' MONTH) AND `a`.`user_id`=$id ORDER BY `a`.`id` DESC LIMIT";
        if ($start) {
            $sql .= " $start,$limit";
        } else {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadtoday_count($id)
    {
        $sql = "select count(id) as count from tbl_bookings where date(created_date) = CURDATE() AND status = 1  AND user_id=$id ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadtoday($id,$limit, $start)
    {
        
        $sql = "SELECT `a`.*, `b`.`first_name` as `first` FROM `tbl_bookings` `a` INNER JOIN `tbl_lead_contact_user` `b` ON `a`.`first_name`=`b`.`id` WHERE `a`.`status` = 1  AND date(`a`.`created_date`) = CURDATE() AND `a`.`user_id`=$id ORDER BY `a`.`id` DESC LIMIT";
        if ($start) {
            $sql .= " $start,$limit";
        } else {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadweeks_count($id)
    {
        $sql = "SELECT COUNT(id) as count FROM tbl_bookings WHERE WEEK(created_date) = WEEK(CURRENT_DATE()) AND status=1  AND user_id=$id ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadweeks($id,$limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`first_name` as `first` FROM `tbl_bookings` `a` INNER JOIN `tbl_lead_contact_user` `b` ON `a`.`first_name`=`b`.`id` WHERE `a`.`status` = 1  AND WEEK(`a`.`created_date`) = WEEK(CURRENT_DATE()) AND `a`.`user_id`=$id ORDER BY `a`.`id` DESC LIMIT";
        if ($start) {
            $sql .= " $start,$limit";
        } else {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadmonths_count($id)
    {
        $sql = "SELECT COUNT(id) AS count FROM tbl_bookings WHERE MONTH(created_date) = MONTH(CURRENT_DATE()) AND status = 1 AND user_id=$id ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadmonths($id ,$limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`first_name` as `first` FROM `tbl_bookings` `a` INNER JOIN `tbl_lead_contact_user` `b` ON `a`.`first_name`=`b`.`id` WHERE `a`.`status` = 1  AND MONTH(`a`.`created_date`) = MONTH(CURRENT_DATE()) AND `a`.`user_id`=$id ORDER BY `a`.`id` DESC LIMIT";
        if ($start) {
            $sql .= " $start,$limit";
        } else {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadyear_count($id)
    {
        $sql = "SELECT COUNT(id) AS count FROM tbl_bookings WHERE YEAR(created_date) = YEAR(CURRENT_DATE()) AND status = 1 AND user_id=$id ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadyear($id, $limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`first_name` as `first` FROM `tbl_bookings` `a` INNER JOIN `tbl_lead_contact_user` `b` ON `a`.`first_name`=`b`.`id` WHERE `a`.`status` = 1  AND YEAR(`a`.`created_date`) = YEAR(CURRENT_DATE()) AND `a`.`user_id`=$id ORDER BY `a`.`id` DESC LIMIT";
        if ($start) {
            $sql .= " $start,$limit";
        } else {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast30days_count($id)
    {
        $sql = "select count(id) as count from tbl_bookings WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'30' DAY) AND status = 1  AND user_id = $id ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast30days($id,$limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`first_name` as `first` FROM `tbl_bookings` `a` INNER JOIN `tbl_lead_contact_user` `b` ON `a`.`first_name`=`b`.`id` WHERE `a`.`status` = 1  AND `a`.`created_date` >= DATE_ADD(CURDATE(), INTERVAL -'30' DAY) AND `a`.`user_id`=$id ORDER BY `a`.`id` DESC LIMIT";
        if ($start) {
            $sql .= " $start,$limit";
        } else {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast60days_count($id)
    {
        $sql = "select count(id) as count from tbl_bookings WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'60' DAY) AND status = 1  AND user_id=$id ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast60days($id,$limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`first_name` as `first` FROM `tbl_bookings` `a` INNER JOIN `tbl_lead_contact_user` `b` ON `a`.`first_name`=`b`.`id` WHERE `a`.`status` = 1  AND `a`.`created_date` >= DATE_ADD(CURDATE(), INTERVAL -'60' DAY) AND `a`.`user_id`=$id ORDER BY `a`.`id` DESC LIMIT";
        if ($start) {
            $sql .= " $start,$limit";
        } else {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast90days_count($id)
    {
        $sql = "select count(id) as count from tbl_bookings WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'90' DAY) AND status = 1 AND user_id=$id  ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast90days($id,$limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`first_name` as `first` FROM `tbl_bookings` `a` INNER JOIN `tbl_lead_contact_user` `b` ON `a`.`first_name`=`b`.`id` WHERE `a`.`status` = 1  AND `a`.`created_date` >= DATE_ADD(CURDATE(), INTERVAL -'90' DAY) AND `a`.`user_id`=$id ORDER BY `a`.`id` DESC LIMIT";
        if ($start) {
            $sql .= " $start,$limit";
        } else {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }


    public function getfromtoo_count_user($id,$from,$too){
        $to_exp = explode('-',$too);
        $to_date = $to_exp[2].'-'.$to_exp[0].'-'.$to_exp[1];
        $from_exp = explode('-',$from);
        $from_date = $from_exp[2].'-'.$from_exp[0].'-'.$from_exp[1];
        $this->db->select('a.*, b.first_name as first');
        $this->db->join('tbl_lead_contact_user b' , 'a.first_name=b.id','inner');
        $this->db->group_start();
        $this->db->where('a.created_date BETWEEN "'. $from_date. '" AND "'. $to_date. '" ');
        $this->db->where('a.status',1);
        $this->db->where('a.user_id',$id);
        $this->db->group_end();
        $this->db->order_by('a.id', 'desc');
        return  $this->db->count_all_results('tbl_bookings a');
    }
    public function getfromtoo_result_user($id,$limit,$start,$from,$too){
        $to_exp = explode('-',$too);
        $to_date = $to_exp[2].'-'.$to_exp[0].'-'.$to_exp[1];
        $from_exp = explode('-',$from);
        $from_date = $from_exp[2].'-'.$from_exp[0].'-'.$from_exp[1];
        $this->db->limit($limit,$start);
        $this->db->select('a.*, b.first_name as first');
        $this->db->join('tbl_lead_contact_user b' , 'a.first_name=b.id','inner');
        $this->db->group_start();
        $this->db->where('a.created_date BETWEEN "'. $from_date. '" AND "'. $to_date. '" ');
        $this->db->where('a.status',1);
        $this->db->where('a.user_id',$id);
        $this->db->group_end();
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get('tbl_bookings a');
        return $query->result();
    }
  public function getfilter_count_user($id,$data){
        $time = explode(' ',$data['time']) ;
        $time_format = date('H:i', strtotime($data['time'])); 
        $this->db->group_start();
        if($data['first_name']){
        $this->db->or_like('b.first_name',$data['first_name']);
        }
        if($data['last_name']){
        $this->db->or_like('a.last_name',$data['last_name']);
        }
        if($data['phone_no']){
        $this->db->or_like('a.mobile_1',$data['phone_no']);
        }
        if($data['phone_no2']){
        $this->db->or_like('a.mobile_2',$data['phone_no2']);
        }
        if($data['email']){
        $this->db->or_like('a.email',$data['email']);
        }
        if($data['booking_date']){
        $this->db->or_like('a.date',$data['booking_date']);
        }
        if($data['time']){
        $this->db->or_like('a.time',$time_format);
        }
        if($data['timezone']){
        $this->db->or_like('a.timezone',$data['timezone']);
        }
        if($data['booking_status']){
        $this->db->or_like('a.booking_status',$data['booking_status']);
        }
        $this->db->group_end();
        $this->db->select('a.*, b.first_name as first');
        $this->db->join('tbl_lead_contact_user b' , 'a.first_name=b.id','inner');
        $this->db->where('a.status',1);
        $this->db->where('a.user_id',$id);
        $this->db->order_by('a.id', 'desc');
        return $this->db->count_all_results('tbl_bookings a');

    }
    public function getfilter_result_user($id,$limit, $start,$data){
        $time = explode(' ',$data['time']) ;
        $time_format = date('H:i', strtotime($data['time'])); 
        $this->db->group_start();
        if($data['first_name']){
        $this->db->or_like('b.first_name',$data['first_name']);
        }
        if($data['last_name']){
        $this->db->or_like('a.last_name',$data['last_name']);
        }
        if($data['phone_no']){
        $this->db->or_like('a.mobile_1',$data['phone_no']);
        }
        if($data['phone_no2']){
        $this->db->or_like('a.mobile_2',$data['phone_no2']);
        }
        if($data['email']){
        $this->db->or_like('a.email',$data['email']);
        }
        if($data['booking_date']){
        $this->db->or_like('a.date',$data['booking_date']);
        }
        if($data['time']){
        $this->db->or_like('a.time',$time_format);
        }
        if($data['timezone']){
        $this->db->or_like('a.timezone',$data['timezone']);
        }
        if($data['booking_status']){
        $this->db->or_like('a.booking_status',$data['booking_status']);
        }
        $this->db->group_end();
        $this->db->select('a.*, b.first_name as first');
        $this->db->join('tbl_lead_contact_user b' , 'a.first_name=b.id','inner');
        $this->db->where('a.status',1);
        $this->db->where('a.user_id',$id);
        $this->db->limit($limit,$start);
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get('tbl_bookings a');
        return $query->result();
    
    }

    // user models Booking 
    public function bookingType($type)
    {
        if($type==1)
        {
            $this->db->where('booking_status!=',3);
        }
        else
        {
            $this->db->where('booking_status',3);   
        }
        $this->db->where("status",1);
        $query = $this->db->get("tbl_bookings");
         return $query->num_rows();
    }
    public function getContactInfo($id){
        $this->db->where('id',$id);
        $this->db->where('user_type',2);
        $this->db->where('status',1);
        $query = $this->db->get('tbl_lead_contact_user');
        return $query->result();
            
    }
   
    public function getBookingOpenPending()
    {
        $data = array();
        $this->db->select('a.*, b.first_name as first');
        $this->db->join('tbl_lead_contact_user b' , 'a.first_name=b.id','inner');
        $this->db->where('a.status',1);
        $this->db->where('b.status',1);
        //$this->db->where('a.booking_reminder_status!=',2);
        //$this->db->where('a.reminder_status!=',2);
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get('tbl_bookings a');
        if($query->num_rows()>0)
        {
            foreach($query->result() as $key=>$record)
            {
                $data[] = $record;
            }
            return $data;
            
        }
        return false;
    }
    public function CloseBookingByUser($booking_id,$status,$time_slot)
    {
        $reminder_time = ($time_slot==15)?1:2;
        $this->db->where('id',$booking_id);
        if($this->db->update('tbl_bookings',array('reminder_status' => 1,'booking_reminder_status' => 1, 'reminder_time' => $reminder_time,'remind_time_status' => $reminder_time)))
        {
            return true;
        }
    }
    public function gotBookingByUser($booking_id,$status)
    {
        $this->db->where('id',$booking_id);
        if($this->db->update('tbl_bookings',array('reminder_status' => 2,'booking_reminder_status' => 2,'remind_time_status' => 2)))
        {
            return true;
        }
    }
    public function statusUpdateOfreminder($booking_id,$status)
    {
        if($status==1)
        {
            $data = array(
                'booking_reminder_status' => $status,
            ); 
        }
        else if($status==3)
        {
            $data = array(
                'booking_reminder_status' => 1,
                'reminder_time' => null,
                'reminder_status' => null,
            ); 
        }
        else
        {
            $data = array(
                'booking_reminder_status' => $status,
                'reminder_time' => 2,
                'reminder_status' => 2,
            );
        }
        $this->db->where("id",$booking_id);
        if($this->db->update("tbl_bookings",$data))
        {
            return true;
        }
    }

    public function savehistory($data){
        if($this->db->insert('tbl_email',$data)){
            return true;
        }else{
            return false;
        }
    }

    public function getvaluebooking($id,$column_name){
        $this->db->select('a.'.$column_name);
        $this->db->join('tbl_lead_contact_user b','a.first_name=b.id','left');
        $this->db->where('a.status',1);
        $this->db->where('a.id',$id);
        $query = $this->db->get('tbl_bookings a');
        return $query->result();

    }
    
        
}
