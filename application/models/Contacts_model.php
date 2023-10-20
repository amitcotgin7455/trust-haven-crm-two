<?php
defined('BASEPATH') or exit('direct script no access allowed');
class Contacts_model extends CI_Model
{
    public function insertData($data)
    {
        $data = $this->db->insert('tbl_lead_contact_user', $data);
        if ($data) {
         return true;
        } else {
         return   false;
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
    public function detailContact($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_lead_contact_user');
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $this->db->where('user_type', 1);
        $query = $this->db->get();
        return $query->result();
    }
    public function fetchRemote()
    {
        $this->db->where('status', 1);
        $query = $this->db->get('tbl_remote');
        return $query->result();
    }
    public function fetchSale()
    {
        $this->db->where('status', 1);
        $query = $this->db->get('tbl_sale_status');
        return $query->result();
    }
    public function fetchPlan()
    {
        $this->db->where('status', 1);
        $query = $this->db->get('tbl_plan');
        return $query->result();
    }
    public function fetchWorked()
    {
        $this->db->where('status', 1);
        $query = $this->db->get('tbl_work_status');
        return $query->result();
    }
    public function detailContacts($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_lead_contact_user');
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result();
    }
    public function getContacts($id)
    {
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get('tbl_lead_contact_user');
        return $query->result();
    }
    public function GetuserNameContacts($user_id)
    {
        $this->db->where('id', $user_id);
        $this->db->where('status', 1);
        $query = $this->db->get('tbl_users');
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
    public function updateDetail($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        if ($this->db->update('tbl_lead_contact_user', $data)) {
            return true;
        } else {
            return false;
        }
    }
    public function updateContactdata($hidden_id, $update)
    {
        $this->db->where('id', $hidden_id);
        if ($this->db->update('tbl_lead_contact_user', $update)) {
          return  true;
        } else {
            return false;
        }
    }
    public function deleteContacts($ids)
    {
        $this->db->set('status', 3);
        $this->db->where_in('id', $ids);
        if ($this->db->update('tbl_lead_contact_user')) {
            return true;
        } else {
            false;
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
    public function listNotes($module_id, $module_type)
    {
        $this->db->where('module_id', $module_id);
        $this->db->where('status', 1);
        $this->db->where('module_type', $module_type);
        $query = $this->db->get('tbl_notes');
        return $query->result();
    }
    public function deleteNotes($id)
    {
        $this->db->where('id', $id);
        if ($this->db->delete('tbl_notes')) {
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
    // super admin and manager models contact 
    public function get_count_leads_admin()
    {   
        // echo 89893 ; die;
        $this->db->select('a.*,b.title as remote_title,c.title as work_title,d.title as sale_title ,e.title as plan_title');
        $this->db->join("tbl_remote b","a.remote_id=b.id","left");
        $this->db->join("tbl_work_status c","a.worked_id=c.id","left");
        $this->db->join("tbl_sale_status d","a.sale_id=d.id","left");
        $this->db->join("tbl_plan e","a.amc_plan=e.id","left");
        $this->db->where('a.user_type', 2);
        $this->db->where('a.status', 1);
        $this->db->order_by('a.id', 'desc');
        return $this->db->count_all_results('tbl_lead_contact_user a');
        // echo $this->db->last_query();
        // die;
    }
    public function get_result_leads_admin($limit, $start)
    {  
        $this->db->limit($limit, $start);
        $this->db->select('a.*,b.title as remote_title,c.title as work_title,d.title as sale_title ,e.title as plan_title');
        $this->db->join("tbl_remote b","a.remote_id=b.id","left");
        $this->db->join("tbl_work_status c","a.worked_id=c.id","left");
        $this->db->join("tbl_sale_status d","a.sale_id=d.id","left");
        $this->db->join("tbl_plan e","a.amc_plan=e.id","left");
        $this->db->where('a.user_type', 2);
        $this->db->where('a.status', 1);
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get('tbl_lead_contact_user a');
        return $query->result();
    }
    public function  getSearchInput_count_admin($gsearch)
    {
        $this->db->group_start();
        $this->db->or_like('a.first_name', $gsearch);
        $this->db->or_like('a.last_name', $gsearch);
        $this->db->or_like('a.mobile_1', $gsearch);
        $this->db->or_like('a.mobile_2', $gsearch);
        $this->db->or_like('a.email', $gsearch);
        $this->db->or_like('a.customer_id', $gsearch);
        $this->db->or_like('a.email_opt_out', $gsearch);
        $this->db->or_like('a.plan_status', $gsearch);
        $this->db->or_like('a.plan', $gsearch);
        $this->db->or_like('a.amount', $gsearch);
        $this->db->or_like('a.remote_id', $gsearch);
        $this->db->or_like('a.sale_id', $gsearch);
        $this->db->or_like('a.worked_id', $gsearch);
        $this->db->or_like('a.work_status', $gsearch);
        $this->db->or_like('a.courtesy', $gsearch);
        $this->db->or_like('a.bbb', $gsearch);
        $this->db->or_like('a.ha', $gsearch);
        $this->db->or_like('a.fb', $gsearch);
        $this->db->or_like('a.google', $gsearch);
        $this->db->or_like('a.service', $gsearch);
        $this->db->or_like('a.sale_date', $gsearch);
        $this->db->or_like('a.description', $gsearch);
        $this->db->or_like('b.title', $gsearch);
        $this->db->or_like('c.title', $gsearch);
        $this->db->or_like('d.title', $gsearch);
        $this->db->group_end();
        $this->db->select('a.*,b.title as remote_title,c.title as work_title,d.title as sale_title');
        $this->db->join("tbl_remote b","a.remote_id=b.id","left");
        $this->db->join("tbl_work_status c","a.worked_id=c.id","left");
        $this->db->join("tbl_sale_status d","a.sale_id=d.id","left");
        $this->db->where('a.user_type', 2);
        $this->db->where('a.status', 1);
        $this->db->order_by('a.id', 'desc');
        return $this->db->count_all_results('tbl_lead_contact_user a');
       
    }
    public function getSearchInput_admin($gsearch, $limit, $start)
    {   $this->db->limit($limit, $start);
        $this->db->group_start();
        $this->db->or_like('a.first_name', $gsearch);
        $this->db->or_like('a.last_name', $gsearch);
        $this->db->or_like('a.mobile_1', $gsearch);
        $this->db->or_like('a.mobile_2', $gsearch);
        $this->db->or_like('a.email', $gsearch);
        $this->db->or_like('a.customer_id', $gsearch);
        $this->db->or_like('a.email_opt_out', $gsearch);
        $this->db->or_like('a.plan_status', $gsearch);
        $this->db->or_like('a.plan', $gsearch);
        $this->db->or_like('a.amount', $gsearch);
        $this->db->or_like('a.remote_id', $gsearch);
        $this->db->or_like('a.sale_id', $gsearch);
        $this->db->or_like('a.worked_id', $gsearch);
        $this->db->or_like('a.work_status', $gsearch);
        $this->db->or_like('a.courtesy', $gsearch);
        $this->db->or_like('a.bbb', $gsearch);
        $this->db->or_like('a.ha', $gsearch);
        $this->db->or_like('a.fb', $gsearch);
        $this->db->or_like('a.google', $gsearch);
        $this->db->or_like('a.service', $gsearch);
        $this->db->or_like('a.sale_date', $gsearch);
        $this->db->or_like('a.description', $gsearch);
        $this->db->or_like('b.title', $gsearch);
        $this->db->or_like('c.title', $gsearch);
        $this->db->or_like('d.title', $gsearch);
        $this->db->group_end();
        $this->db->select('a.*,b.title as remote_title,c.title as work_title,d.title as sale_title');
        $this->db->join("tbl_remote b","a.remote_id=b.id","left");
        $this->db->join("tbl_work_status c","a.worked_id=c.id","left");
        $this->db->join("tbl_sale_status d","a.sale_id=d.id","left");
        $this->db->where('a.user_type', 2);
        $this->db->where('a.status', 1);
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get('tbl_lead_contact_user a');
        return $query->result();
    }
    public function filterLeadDays_count_admin($getnumber)
    {   
        $sql = "select count(id) as count from tbl_lead_contact_user WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'$getnumber' DAY) AND status = 1 AND user_type = 2  ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadDays_admin($getnumber, $limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`title` as `remote_title`, `c`.`title` as `work_title`, `d`.`title` as `sale_title` FROM `tbl_lead_contact_user` `a` LEFT JOIN `tbl_remote` `b` ON `a`.`remote_id`=`b`.`id` LEFT JOIN `tbl_work_status` `c` ON `a`.`worked_id`=`c`.`id` LEFT JOIN `tbl_sale_status` `d` ON `a`.`sale_id`=`d`.`id` WHERE `a`.`user_type` = 2 AND `a`.`status` = 1 AND `a`.`created_date`>= DATE_ADD(CURDATE(), INTERVAL -'$getnumber' DAY) ORDER BY `a`.`id` DESC LIMIT";
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
        $sql = "select count(id) as count from tbl_lead_contact_user WHERE created_date>= DATE_ADD(NOW(), INTERVAL -'$getnumber' WEEK) AND status = 1 AND user_type = 2  ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadWeek_admin($getnumber, $limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`title` as `remote_title`, `c`.`title` as `work_title`, `d`.`title` as `sale_title` FROM `tbl_lead_contact_user` `a` LEFT JOIN `tbl_remote` `b` ON `a`.`remote_id`=`b`.`id` LEFT JOIN `tbl_work_status` `c` ON `a`.`worked_id`=`c`.`id` LEFT JOIN `tbl_sale_status` `d` ON `a`.`sale_id`=`d`.`id` WHERE `a`.`user_type` = 2 AND `a`.`status` = 1 AND `a`.`created_date`>= DATE_ADD(CURDATE(), INTERVAL -'$getnumber' WEEK) ORDER BY `a`.`id` DESC LIMIT";
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
        $sql = "select count(id) as count from tbl_lead_contact_user WHERE created_date>= DATE_ADD(NOW(), INTERVAL -'$getnumber' MONTH) AND status = 1 AND user_type = 2  ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadMonth_admin($getnumber, $limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`title` as `remote_title`, `c`.`title` as `work_title`, `d`.`title` as `sale_title` FROM `tbl_lead_contact_user` `a` LEFT JOIN `tbl_remote` `b` ON `a`.`remote_id`=`b`.`id` LEFT JOIN `tbl_work_status` `c` ON `a`.`worked_id`=`c`.`id` LEFT JOIN `tbl_sale_status` `d` ON `a`.`sale_id`=`d`.`id` WHERE `a`.`user_type` = 2 AND `a`.`status` = 1 AND `a`.`created_date`>= DATE_ADD(CURDATE(), INTERVAL -'$getnumber' MONTH) ORDER BY `a`.`id` DESC LIMIT";
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
        
        $sql = "select count(id) as count from tbl_lead_contact_user where date(created_date) = CURDATE() AND status = 1 AND user_type = 2  ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadtoday_admin($limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`title` as `remote_title`, `c`.`title` as `work_title`, `d`.`title` as `sale_title` FROM `tbl_lead_contact_user` `a` LEFT JOIN `tbl_remote` `b` ON `a`.`remote_id`=`b`.`id` LEFT JOIN `tbl_work_status` `c` ON `a`.`worked_id`=`c`.`id` LEFT JOIN `tbl_sale_status` `d` ON `a`.`sale_id`=`d`.`id` WHERE `a`.`user_type` = 2 AND `a`.`status` = 1 AND  date(`a`.`created_date`)= CURDATE() ORDER BY `a`.`id` DESC LIMIT";
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
        $sql = "SELECT COUNT(id) as count FROM tbl_lead_contact_user WHERE WEEK(created_date) = WEEK(CURRENT_DATE()) AND status = 1 AND user_type = 2  ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadweeks_admin($limit, $start)
    {
                
        $sql = "SELECT `a`.*, `b`.`title` as `remote_title`, `c`.`title` as `work_title`, `d`.`title` as `sale_title` FROM `tbl_lead_contact_user` `a` LEFT JOIN `tbl_remote` `b` ON `a`.`remote_id`=`b`.`id` LEFT JOIN `tbl_work_status` `c` ON `a`.`worked_id`=`c`.`id` LEFT JOIN `tbl_sale_status` `d` ON `a`.`sale_id`=`d`.`id` WHERE `a`.`user_type` = 2 AND `a`.`status` = 1 AND  week(`a`.`created_date`) = WEEK(CURRENT_DATE()) ORDER BY `a`.`id` DESC LIMIT";
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
        $sql = "SELECT COUNT(id) AS count FROM tbl_lead_contact_user WHERE MONTH(created_date) = MONTH(CURRENT_DATE()) AND status = 1 AND user_type = 2";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadmonths_admin($limit, $start)
    {   
        $sql = "SELECT `a`.*, `b`.`title` as `remote_title`, `c`.`title` as `work_title`, `d`.`title` as `sale_title` FROM `tbl_lead_contact_user` `a` LEFT JOIN `tbl_remote` `b` ON `a`.`remote_id`=`b`.`id` LEFT JOIN `tbl_work_status` `c` ON `a`.`worked_id`=`c`.`id` LEFT JOIN `tbl_sale_status` `d` ON `a`.`sale_id`=`d`.`id` WHERE `a`.`user_type` = 2 AND `a`.`status` = 1 AND  MONTH(`a`.`created_date`) = MONTH(CURRENT_DATE()) ORDER BY `a`.`id` DESC LIMIT";
        if ($start) {
            $sql .= " $start,$limit";
        } else {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadyear_count_admin()
    {
        $sql = "SELECT COUNT(id) AS count FROM tbl_lead_contact_user WHERE YEAR(created_date) = YEAR(CURRENT_DATE()) AND status = 1 AND user_type = 2 ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadyear_admin($limit, $start)
    {   
        $sql = "SELECT `a`.*, `b`.`title` as `remote_title`, `c`.`title` as `work_title`, `d`.`title` as `sale_title` FROM `tbl_lead_contact_user` `a` LEFT JOIN `tbl_remote` `b` ON `a`.`remote_id`=`b`.`id` LEFT JOIN `tbl_work_status` `c` ON `a`.`worked_id`=`c`.`id` LEFT JOIN `tbl_sale_status` `d` ON `a`.`sale_id`=`d`.`id` WHERE `a`.`user_type` = 2 AND `a`.`status` = 1 AND  YEAR(`a`.`created_date`) = YEAR(CURRENT_DATE()) ORDER BY `a`.`id` DESC LIMIT";
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
        $sql = "select count(id) as count from tbl_lead_contact_user WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'30' DAY) AND status = 1 AND user_type = 2  ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast30days_admin($limit, $start)
    {   
        $sql = "SELECT `a`.*, `b`.`title` as `remote_title`, `c`.`title` as `work_title`, `d`.`title` as `sale_title` FROM `tbl_lead_contact_user` `a` LEFT JOIN `tbl_remote` `b` ON `a`.`remote_id`=`b`.`id` LEFT JOIN `tbl_work_status` `c` ON `a`.`worked_id`=`c`.`id` LEFT JOIN `tbl_sale_status` `d` ON `a`.`sale_id`=`d`.`id` WHERE `a`.`user_type` = 2 AND `a`.`status` = 1 AND  `a`.`created_date` >= DATE_ADD(CURDATE(), INTERVAL -'30' DAY) ORDER BY `a`.`id` DESC LIMIT";
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
        $sql = "select count(id) as count from tbl_lead_contact_user WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'60' DAY) AND status = 1 AND user_type = 2  ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast60days_admin($limit, $start)
    {   
        $sql = "SELECT `a`.*, `b`.`title` as `remote_title`, `c`.`title` as `work_title`, `d`.`title` as `sale_title` FROM `tbl_lead_contact_user` `a` LEFT JOIN `tbl_remote` `b` ON `a`.`remote_id`=`b`.`id` LEFT JOIN `tbl_work_status` `c` ON `a`.`worked_id`=`c`.`id` LEFT JOIN `tbl_sale_status` `d` ON `a`.`sale_id`=`d`.`id` WHERE `a`.`user_type` = 2 AND `a`.`status` = 1 AND  `a`.`created_date` >= DATE_ADD(CURDATE(), INTERVAL -'60' DAY) ORDER BY `a`.`id` DESC LIMIT";
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
        $sql = "select count(id) as count from tbl_lead_contact_user WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'90' DAY) AND status = 1 AND user_type = 2  ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast90days_admin($limit, $start)
    {   
        $sql = "SELECT `a`.*, `b`.`title` as `remote_title`, `c`.`title` as `work_title`, `d`.`title` as `sale_title` FROM `tbl_lead_contact_user` `a` LEFT JOIN `tbl_remote` `b` ON `a`.`remote_id`=`b`.`id` LEFT JOIN `tbl_work_status` `c` ON `a`.`worked_id`=`c`.`id` LEFT JOIN `tbl_sale_status` `d` ON `a`.`sale_id`=`d`.`id` WHERE `a`.`user_type` = 2 AND `a`.`status` = 1 AND  `a`.`created_date` >= DATE_ADD(CURDATE(), INTERVAL -'90' DAY) ORDER BY `a`.`id` DESC LIMIT";
        if ($start) {
            $sql .= " $start,$limit";
        } else {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getfilter_count_admin($data){
        // prx($data);
        $to_expiry_date = explode('-',$data['to_expiry_date']);
        $to_expiry_date_format = $to_expiry_date[2].'-'.$to_expiry_date[0].'-'.$to_expiry_date[1];
        $from_expiry_date = explode('-',$data['from_expiry_date']);
        $from_expiry_date_format = $from_expiry_date[2].'-'.$from_expiry_date[0].'-'.$from_expiry_date[1];
        $sale_date = explode('-',$data['sale_date']);
        $sale_date_format = $sale_date[2].'-'.$sale_date[0].'-'.$sale_date[1];
        
        if(empty($data['from_expiry_date']) && (empty($data['to_expiry_date'])))
        {
            $this->db->group_start();
        }
        if($data['first_name']){
         $this->db->or_like('a.first_name', $data['first_name']);
        }
        if($data['last_name']){
         $this->db->or_like('a.last_name', $data['last_name']);
        }
        if($data['phone_no']){
        $this->db->or_like('a.mobile_1', $data['phone_no']);
        }
        if($data['phone_no2']){
        $this->db->or_like('a.mobile_2', $data['phone_no2']);
        }
        if($data['email']){
        $this->db->or_like('a.email', $data['email']);
        }
        if($data['customer_id']){
        $this->db->or_like('a.customer_id', $data['customer_id']);
        }
        if($data['email_opt_out']){
        $this->db->or_like('a.email_opt_out', $data['email_opt_out']);
        }
        if($data['plan_status']){
         $this->db->or_like('a.plan_status', $data['plan_status']);
        }
        if($data['amc_plan']){
         $this->db->or_like('a.amc_plan', $data['amc_plan']);
        }
        if($data['amount']){
         $this->db->or_like('a.amount', $data['amount']);
        }
        if($data['plan']){
         $this->db->or_like('a.plan', $data['plan']);
        }
        if($data['remote_by']){
         $this->db->or_like('a.remote_id', $data['remote_by']);
        }
        if($data['sale_by']){
         $this->db->or_like('a.sale_id', $data['sale_by']);
        }
        if($data['worked_by']){
         $this->db->or_like('a.worked_id', $data['worked_by']);
        }
        if($data['work_status']){
         $this->db->or_like('a.work_status', $data['work_status']);
        }
        if($data['courtesy']){
         $this->db->or_like('a.courtesy', $data['courtesy']);
        }
        if($data['bbb']){
         $this->db->or_like('a.bbb', $data['bbb']);
        }
        if($data['ha']){
         $this->db->or_like('a.ha', $data['ha']);
        }
        if($data['fb']){
         $this->db->or_like('a.fb', $data['fb']);
        }
        if($data['google']){
         $this->db->or_like('a.google', $data['google']);
        }
        if($data['service']){
         $this->db->or_like('a.service', $data['service']);
        }
        if($data['sale_date']){
         $this->db->or_like('a.sale_date', $data['sale_date']);
        }
        if(!empty($data['from_expiry_date']) && (empty($data['to_expiry_date'])))
        {
        $this->db->where('a.expiry_date >=', $from_expiry_date_format);
        $this->db->where('a.expiry_date <=', $to_expiry_date_format);
        }
        if(empty($data['from_expiry_date']) && (empty($data['to_expiry_date'])))
        {
            $this->db->group_end();
        }
        $this->db->select('a.*,b.title as remote_title,c.title as work_title,d.title as sale_title');
        $this->db->join("tbl_remote b","a.remote_id=b.id","left");
        $this->db->join("tbl_work_status c","a.worked_id=c.id","left");
        $this->db->join("tbl_sale_status d","a.sale_id=d.id","left");
        $this->db->where('a.user_type', 2);
        $this->db->where('a.status', 1);
        $this->db->order_by('a.id', 'desc');
        return $this->db->count_all_results('tbl_lead_contact_user a');  
        
    }

    public function getfilter_result_admin($limit,$start,$data){
        
        $to_expiry_date = explode('-',$data['to_expiry_date']);
        $to_expiry_date_format = $to_expiry_date[2].'-'.$to_expiry_date[0].'-'.$to_expiry_date[1];
        $from_expiry_date = explode('-',$data['from_expiry_date']);
        $from_expiry_date_format = $from_expiry_date[2].'-'.$from_expiry_date[0].'-'.$from_expiry_date[1];
        $sale_date = explode('-',$data['sale_date']);
        $sale_date_format = $sale_date[2].'-'.$sale_date[0].'-'.$sale_date[1];
        if(empty($data['from_expiry_date']) && (empty($data['to_expiry_date'])))
        {
        $this->db->group_start();
        }
        if($data['first_name']){
         $this->db->or_like('a.first_name', $data['first_name']);
        }
        if($data['last_name']){
         $this->db->or_like('a.last_name', $data['last_name']);
        }
        if($data['phone_no']){
        $this->db->or_like('a.mobile_1', $data['phone_no']);
        }
        if($data['phone_no2']){
        $this->db->or_like('a.mobile_2', $data['phone_no2']);
        }
        if($data['email']){
        $this->db->or_like('a.email', $data['email']);
        }
        if($data['customer_id']){
        $this->db->or_like('a.customer_id', $data['customer_id']);
        }
        if($data['email_opt_out']){
        $this->db->or_like('a.email_opt_out', $data['email_opt_out']);
        }
        if($data['plan_status']){
         $this->db->or_like('a.plan_status', $data['plan_status']);
        }
        if($data['amc_plan']){
         $this->db->or_like('a.amc_plan', $data['amc_plan']);
        }
        if($data['amount']){
         $this->db->or_like('a.amount', $data['amount']);
        }
        if($data['plan']){
         $this->db->or_like('a.plan', $data['plan']);
        }
        if($data['remote_by']){
         $this->db->or_like('a.remote_id', $data['remote_by']);
        }
        if($data['sale_by']){
         $this->db->or_like('a.sale_id', $data['sale_by']);
        }
        if($data['worked_by']){
         $this->db->or_like('a.worked_id', $data['worked_by']);
        }
        if($data['work_status']){
         $this->db->or_like('a.work_status', $data['work_status']);
        }
        if($data['courtesy']){
         $this->db->or_like('a.courtesy', $data['courtesy']);
        }
        if($data['bbb']){
         $this->db->or_like('a.bbb', $data['bbb']);
        }
        if($data['ha']){
         $this->db->or_like('a.ha', $data['ha']);
        }
        if($data['fb']){
         $this->db->or_like('a.fb', $data['fb']);
        }
        if($data['google']){
         $this->db->or_like('a.google', $data['google']);
        }
        if($data['service']){
         $this->db->or_like('a.service', $data['service']);
        }
        if($data['sale_date']){
        $this->db->or_like('a.sale_date', $data['sale_date']);
        }
        if(!empty($data['from_expiry_date']) && (!empty($data['to_expiry_date'])))
        {
        $this->db->where('a.expiry_date >=', $from_expiry_date_format);
        $this->db->where('a.expiry_date <=', $to_expiry_date_format);
        }
        if(empty($data['from_expiry_date']) && (empty($data['to_expiry_date'])))
        {
        $this->db->group_end();
        }
        $this->db->select('a.*,b.title as remote_title,c.title as work_title,d.title as sale_title');
        $this->db->join("tbl_remote b","a.remote_id=b.id","left");
        $this->db->join("tbl_work_status c","a.worked_id=c.id","left");
        $this->db->join("tbl_sale_status d","a.sale_id=d.id","left");
        $this->db->where('a.user_type', 2);
        $this->db->where('a.status', 1);
        $this->db->limit($limit,$start);
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get('tbl_lead_contact_user a');
        return $query->result();
    }
    public function getfromtoocount($from,$too){
        $to_exp = explode('-',$too);
        $to_date = $to_exp[2].'-'.$to_exp[0].'-'.$to_exp[1];
        $from_exp = explode('-',$from);
        $from_date = $from_exp[2].'-'.$from_exp[0].'-'.$from_exp[1];
        $this->db->select('a.*,b.title as remote_title,c.title as work_title,d.title as sale_title');
        $this->db->join("tbl_remote b","a.remote_id=b.id","left");
        $this->db->join("tbl_work_status c","a.worked_id=c.id","left");
        $this->db->join("tbl_sale_status d","a.sale_id=d.id","left");
        $this->db->where('a.created_date BETWEEN "'. $from_date. '" AND "'. $to_date. '" ');
        $this->db->where('a.status',1);
        $this->db->where('a.user_type',2);
        $this->db->order_by('a.id', 'desc');
        return $this->db->count_all_results('tbl_lead_contact_user a');
       
    }

    public function getfromtoo($limit,$start,$from,$too){
        $to_exp = explode('-',$too);
        $to_date = $to_exp[2].'-'.$to_exp[0].'-'.$to_exp[1];
        $from_exp = explode('-',$from);
        $from_date = $from_exp[2].'-'.$from_exp[0].'-'.$from_exp[1];
        $this->db->select('a.*,b.title as remote_title,c.title as work_title,d.title as sale_title');
        $this->db->join("tbl_remote b","a.remote_id=b.id","left");
        $this->db->join("tbl_work_status c","a.worked_id=c.id","left");
        $this->db->join("tbl_sale_status d","a.sale_id=d.id","left");
        $this->db->group_start();
        $this->db->where('a.created_date BETWEEN "'. $from_date. '" AND "'. $to_date. '" ');
        $this->db->where('a.status',1);
        $this->db->where('a.user_type',2);
        $this->db->group_end();
        $this->db->limit($limit,$start);
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get('tbl_lead_contact_user a');
        return $query->result();
    }
    // super admin and manager models contact 

    // user  models contact 
    public function get_count_leads($id)
    {
        $this->db->select('a.*,b.title as remote_title,c.title as work_title,d.title as sale_title, e.title as plan_title');
        $this->db->join("tbl_remote b","a.remote_id=b.id","left");
        $this->db->join("tbl_work_status c","a.worked_id=c.id","left");
        $this->db->join("tbl_sale_status d","a.sale_id=d.id","left");
        $this->db->join("tbl_plan e","a.amc_plan=e.id","left");
        $this->db->where('a.user_type', 2);
        $this->db->where('a.status', 1);
        $this->db->where('a.user_id', $id);
        $this->db->order_by('a.id', 'desc');
        return $this->db->count_all_results('tbl_lead_contact_user a');
    }
                        
    public function get_result_leads($id, $limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('a.*,b.title as remote_title,c.title as work_title,d.title as sale_title, e.title as plan_title');
        $this->db->join("tbl_remote b","a.remote_id=b.id","left");
        $this->db->join("tbl_work_status c","a.worked_id=c.id","left");
        $this->db->join("tbl_sale_status d","a.sale_id=d.id","left");
        $this->db->join("tbl_plan e","a.amc_plan=e.id","left");
        $this->db->where('a.user_type', 2);
        $this->db->where('a.status', 1);
        $this->db->where('a.user_id', $id);
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get('tbl_lead_contact_user a');
        return $query->result();
    }
    public function  getSearchInput_count($id, $gsearch)
    {
        $this->db->group_start();
        $this->db->or_like('a.first_name', $gsearch);
        $this->db->or_like('a.last_name', $gsearch);
        $this->db->or_like('a.mobile_1', $gsearch);
        $this->db->or_like('a.mobile_2', $gsearch);
        $this->db->or_like('a.email', $gsearch);
        $this->db->or_like('a.customer_id', $gsearch);
        $this->db->or_like('a.email_opt_out', $gsearch);
        $this->db->or_like('a.plan_status', $gsearch);
        $this->db->or_like('a.plan', $gsearch);
        $this->db->or_like('a.amount', $gsearch);
        $this->db->or_like('a.remote_id', $gsearch);
        $this->db->or_like('a.sale_id', $gsearch);
        $this->db->or_like('a.worked_id', $gsearch);
        $this->db->or_like('a.work_status', $gsearch);
        $this->db->or_like('a.courtesy', $gsearch);
        $this->db->or_like('a.bbb', $gsearch);
        $this->db->or_like('a.ha', $gsearch);
        $this->db->or_like('a.fb', $gsearch);
        $this->db->or_like('a.google', $gsearch);
        $this->db->or_like('a.service', $gsearch);
        $this->db->or_like('a.sale_date', $gsearch);
        $this->db->or_like('a.description', $gsearch);
        $this->db->or_like('b.title', $gsearch);
        $this->db->or_like('c.title', $gsearch);
        $this->db->or_like('d.title', $gsearch);
        $this->db->select('a.*,b.title as remote_title,c.title as work_title,d.title as sale_title');
        $this->db->join("tbl_remote b","a.remote_id=b.id","left");
        $this->db->join("tbl_work_status c","a.worked_id=c.id","left");
        $this->db->join("tbl_sale_status d","a.sale_id=d.id","left");
        $this->db->where('a.user_type', 2);
        $this->db->where('a.status', 1);
        $this->db->where('a.user_id', $id);
        $this->db->group_end();
        $this->db->order_by('a.id', 'desc');
        return $this->db->count_all_results('tbl_lead_contact_user a');
    }
    public function getSearchInput($id, $gsearch, $limit, $start)
    {    
        $this->db->limit($limit, $start);
        $this->db->group_start();
        $this->db->or_like('a.first_name', $gsearch);
        $this->db->or_like('a.last_name', $gsearch);
        $this->db->or_like('a.mobile_1', $gsearch);
        $this->db->or_like('a.mobile_2', $gsearch);
        $this->db->or_like('a.email', $gsearch);
        $this->db->or_like('a.customer_id', $gsearch);
        $this->db->or_like('a.email_opt_out', $gsearch);
        $this->db->or_like('a.plan_status', $gsearch);
        $this->db->or_like('a.plan', $gsearch);
        $this->db->or_like('a.amount', $gsearch);
        $this->db->or_like('a.remote_id', $gsearch);
        $this->db->or_like('a.sale_id', $gsearch);
        $this->db->or_like('a.worked_id', $gsearch);
        $this->db->or_like('a.work_status', $gsearch);
        $this->db->or_like('a.courtesy', $gsearch);
        $this->db->or_like('a.bbb', $gsearch);
        $this->db->or_like('a.ha', $gsearch);
        $this->db->or_like('a.fb', $gsearch);
        $this->db->or_like('a.google', $gsearch);
        $this->db->or_like('a.service', $gsearch);
        $this->db->or_like('a.sale_date', $gsearch);
        $this->db->or_like('a.description', $gsearch);
        $this->db->or_like('b.title', $gsearch);
        $this->db->or_like('c.title', $gsearch);
        $this->db->or_like('d.title', $gsearch);
        $this->db->group_end();
        $this->db->select('a.*,b.title as remote_title,c.title as work_title,d.title as sale_title');
        $this->db->join("tbl_remote b","a.remote_id=b.id","left");
        $this->db->join("tbl_work_status c","a.worked_id=c.id","left");
        $this->db->join("tbl_sale_status d","a.sale_id=d.id","left");
        $this->db->where('a.user_type', 2);
        $this->db->where('a.status', 1);
        $this->db->where('a.user_id', $id);
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get('tbl_lead_contact_user a');
        return $query->result();
    }
    public function filterLeadDays_count($id, $getnumber)
    {
        $sql = "select count(id) as count from tbl_lead_contact_user WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'$getnumber' DAY) AND status = 1 AND user_type = 2  AND user_id = $id ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadDays($id, $getnumber, $limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`title` as `remote_title`, `c`.`title` as `work_title`, `d`.`title` as `sale_title` FROM `tbl_lead_contact_user` `a` LEFT JOIN `tbl_remote` `b` ON `a`.`remote_id`=`b`.`id` LEFT JOIN `tbl_work_status` `c` ON `a`.`worked_id`=`c`.`id` LEFT JOIN `tbl_sale_status` `d` ON `a`.`sale_id`=`d`.`id` WHERE `a`.`user_type` = 2 AND `a`.`status` = 1 AND `a`.`created_date`>= DATE_ADD(CURDATE(), INTERVAL -'$getnumber' DAY) AND `a`.`user_id`= $id ORDER BY `a`.`id` DESC LIMIT";
        if ($start) {
            $sql .= " $start,$limit";
        } else {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadWeek_count($id, $getnumber)
    {
        $sql = "select count(id) as count from tbl_lead_contact_user WHERE created_date>= DATE_ADD(NOW(), INTERVAL -'$getnumber' WEEK) AND status = 1 AND user_type = 2  AND user_id = $id ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadWeek($id, $getnumber, $limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`title` as `remote_title`, `c`.`title` as `work_title`, `d`.`title` as `sale_title` FROM `tbl_lead_contact_user` `a` LEFT JOIN `tbl_remote` `b` ON `a`.`remote_id`=`b`.`id` LEFT JOIN `tbl_work_status` `c` ON `a`.`worked_id`=`c`.`id` LEFT JOIN `tbl_sale_status` `d` ON `a`.`sale_id`=`d`.`id` WHERE `a`.`user_type` = 2 AND `a`.`status` = 1 AND `a`.`created_date`>= DATE_ADD(CURDATE(), INTERVAL -'$getnumber' WEEK) AND `a`.`user_id`= $id ORDER BY `a`.`id` DESC LIMIT";
        if ($start) {
            $sql .= " $start,$limit";
        } else {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadMonth_count($id, $getnumber)
    {
        $sql = "select count(id) as count from tbl_lead_contact_user WHERE created_date>= DATE_ADD(NOW(), INTERVAL -'$getnumber' MONTH) AND status = 1 AND user_type = 2  AND user_id = $id ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadMonth($id, $getnumber, $limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`title` as `remote_title`, `c`.`title` as `work_title`, `d`.`title` as `sale_title` FROM `tbl_lead_contact_user` `a` LEFT JOIN `tbl_remote` `b` ON `a`.`remote_id`=`b`.`id` LEFT JOIN `tbl_work_status` `c` ON `a`.`worked_id`=`c`.`id` LEFT JOIN `tbl_sale_status` `d` ON `a`.`sale_id`=`d`.`id` WHERE `a`.`user_type` = 2 AND `a`.`status` = 1 AND `a`.`created_date`>= DATE_ADD(CURDATE(), INTERVAL -'$getnumber' MONTH) AND `a`.`user_id`= $id ORDER BY `a`.`id` DESC LIMIT";
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
        $sql = "select count(id) as count from tbl_lead_contact_user where date(created_date) = CURDATE() AND status = 1 AND user_type = 2  AND user_id = $id ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadtoday($id, $limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`title` as `remote_title`, `c`.`title` as `work_title`, `d`.`title` as `sale_title` FROM `tbl_lead_contact_user` `a` LEFT JOIN `tbl_remote` `b` ON `a`.`remote_id`=`b`.`id` LEFT JOIN `tbl_work_status` `c` ON `a`.`worked_id`=`c`.`id` LEFT JOIN `tbl_sale_status` `d` ON `a`.`sale_id`=`d`.`id` WHERE `a`.`user_type` = 2 AND `a`.`status` = 1 AND  date(`a`.`created_date`)= CURDATE() AND `a`.`user_id`= $id ORDER BY `a`.`id` DESC LIMIT";
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
        $sql = "SELECT COUNT(id) as count FROM tbl_lead_contact_user WHERE WEEK(created_date) = WEEK(CURRENT_DATE()) AND status=1 AND user_type = 2  AND user_id = $id ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadweeks($id, $limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`title` as `remote_title`, `c`.`title` as `work_title`, `d`.`title` as `sale_title` FROM `tbl_lead_contact_user` `a` LEFT JOIN `tbl_remote` `b` ON `a`.`remote_id`=`b`.`id` LEFT JOIN `tbl_work_status` `c` ON `a`.`worked_id`=`c`.`id` LEFT JOIN `tbl_sale_status` `d` ON `a`.`sale_id`=`d`.`id` WHERE `a`.`user_type` = 2 AND `a`.`status` = 1 AND  week(`a`.`created_date`) = WEEK(CURRENT_DATE()) AND `a`.`user_id`= $id ORDER BY `a`.`id` DESC LIMIT";
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
        $sql = "SELECT COUNT(id) AS count FROM tbl_lead_contact_user WHERE MONTH(created_date) = MONTH(CURRENT_DATE()) AND status = 1 AND user_type = 2  AND user_id = $id";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadmonths($id, $limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`title` as `remote_title`, `c`.`title` as `work_title`, `d`.`title` as `sale_title` FROM `tbl_lead_contact_user` `a` LEFT JOIN `tbl_remote` `b` ON `a`.`remote_id`=`b`.`id` LEFT JOIN `tbl_work_status` `c` ON `a`.`worked_id`=`c`.`id` LEFT JOIN `tbl_sale_status` `d` ON `a`.`sale_id`=`d`.`id` WHERE `a`.`user_type` = 2 AND `a`.`status` = 1 AND  MONTH(`a`.`created_date`) = MONTH(CURRENT_DATE())  AND `a`.`user_id`= $id ORDER BY `a`.`id` DESC LIMIT";
        if ($start) {
            $sql .= " $start,$limit";
        } else {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        // echo $this->db->last_query();
        return $query->result();
    }
    public function filterLeadyear_count($id)
    {
        $sql = "SELECT COUNT(id) AS count FROM tbl_lead_contact_user WHERE YEAR(created_date) = YEAR(CURRENT_DATE()) AND status = 1 AND user_type = 2  AND user_id = $id";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function filterLeadyear($id, $limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`title` as `remote_title`, `c`.`title` as `work_title`, `d`.`title` as `sale_title` FROM `tbl_lead_contact_user` `a` LEFT JOIN `tbl_remote` `b` ON `a`.`remote_id`=`b`.`id` LEFT JOIN `tbl_work_status` `c` ON `a`.`worked_id`=`c`.`id` LEFT JOIN `tbl_sale_status` `d` ON `a`.`sale_id`=`d`.`id` WHERE `a`.`user_type` = 2 AND `a`.`status` = 1 AND  YEAR(`a`.`created_date`) = YEAR(CURRENT_DATE()) AND `a`.`user_id`= $id  ORDER BY `a`.`id` DESC LIMIT";
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
        $sql = "select count(id) as count from tbl_lead_contact_user WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'30' DAY) AND status = 1 AND user_type = 2  AND user_id = $id  ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast30days($id, $limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`title` as `remote_title`, `c`.`title` as `work_title`, `d`.`title` as `sale_title` FROM `tbl_lead_contact_user` `a` LEFT JOIN `tbl_remote` `b` ON `a`.`remote_id`=`b`.`id` LEFT JOIN `tbl_work_status` `c` ON `a`.`worked_id`=`c`.`id` LEFT JOIN `tbl_sale_status` `d` ON `a`.`sale_id`=`d`.`id` WHERE `a`.`user_type` = 2 AND `a`.`status` = 1 AND  `a`.`created_date` >= DATE_ADD(CURDATE(), INTERVAL -'30' DAY) AND `a`.`user_id`=$id ORDER BY `a`.`id` DESC LIMIT";
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
        $sql = "select count(id) as count from tbl_lead_contact_user WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'60' DAY) AND status = 1 AND user_type = 2  AND user_id = $id  ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast60days($id, $limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`title` as `remote_title`, `c`.`title` as `work_title`, `d`.`title` as `sale_title` FROM `tbl_lead_contact_user` `a` LEFT JOIN `tbl_remote` `b` ON `a`.`remote_id`=`b`.`id` LEFT JOIN `tbl_work_status` `c` ON `a`.`worked_id`=`c`.`id` LEFT JOIN `tbl_sale_status` `d` ON `a`.`sale_id`=`d`.`id` WHERE `a`.`user_type` = 2 AND `a`.`status` = 1 AND  `a`.`created_date` >= DATE_ADD(CURDATE(), INTERVAL -'60' DAY) AND `a`.`user_id`=$id ORDER BY `a`.`id` DESC LIMIT";
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
        $sql = "select count(id) as count from tbl_lead_contact_user WHERE created_date>= DATE_ADD(CURDATE(), INTERVAL -'90' DAY) AND status = 1 AND user_type = 2  AND user_id = $id  ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getLast90days($id, $limit, $start)
    {
        $sql = "SELECT `a`.*, `b`.`title` as `remote_title`, `c`.`title` as `work_title`, `d`.`title` as `sale_title` FROM `tbl_lead_contact_user` `a` LEFT JOIN `tbl_remote` `b` ON `a`.`remote_id`=`b`.`id` LEFT JOIN `tbl_work_status` `c` ON `a`.`worked_id`=`c`.`id` LEFT JOIN `tbl_sale_status` `d` ON `a`.`sale_id`=`d`.`id` WHERE `a`.`user_type` = 2 AND `a`.`status` = 1 AND  `a`.`created_date` >= DATE_ADD(CURDATE(), INTERVAL -'90' DAY) AND `a`.`user_id`=$id ORDER BY `a`.`id` DESC LIMIT";
        if ($start) {
            $sql .= " $start,$limit";
        } else {
            $sql .= " $limit";
        }
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getfilter_count_user($id,$data){
        $to_expiry_date = explode('-',$data['to_expiry_date']);
        $to_expiry_date_format = $to_expiry_date[2].'-'.$to_expiry_date[0].'-'.$to_expiry_date[1];
        $from_expiry_date = explode('-',$data['from_expiry_date']);
        $from_expiry_date_format = $from_expiry_date[2].'-'.$from_expiry_date[0].'-'.$from_expiry_date[1];
        $sale_date = explode('-',$data['sale_date']);
        $sale_date_format = $sale_date[2].'-'.$sale_date[0].'-'.$sale_date[1];
        if(empty($data['from_expiry_date']) && (empty($data['to_expiry_date'])))
        {
            $this->db->group_start();
        }
        if($data['first_name']){
         $this->db->or_like('a.first_name', $data['first_name']);
        }
        if($data['last_name']){
         $this->db->or_like('a.last_name', $data['last_name']);
        }
        if($data['phone_no']){
        $this->db->or_like('a.mobile_1', $data['phone_no']);
        }
        if($data['phone_no2']){
        $this->db->or_like('a.mobile_2', $data['phone_no2']);
        }
        if($data['email']){
        $this->db->or_like('a.email', $data['email']);
        }
        if($data['customer_id']){
        $this->db->or_like('a.customer_id', $data['customer_id']);
        }
        if($data['email_opt_out']){
        $this->db->or_like('a.email_opt_out', $data['email_opt_out']);
        }
        if($data['plan_status']){
         $this->db->or_like('a.plan_status', $data['plan_status']);
        }
        if($data['amc_plan']){
         $this->db->or_like('a.amc_plan', $data['amc_plan']);
        }
        if($data['amount']){
         $this->db->or_like('a.amount', $data['amount']);
        }
        if($data['plan']){
         $this->db->or_like('a.plan', $data['plan']);
        }
        if($data['remote_by']){
         $this->db->or_like('a.remote_id', $data['remote_by']);
        }
        if($data['sale_by']){
         $this->db->or_like('a.sale_id', $data['sale_by']);
        }
        if($data['worked_by']){
         $this->db->or_like('a.worked_id', $data['worked_by']);
        }
        if($data['work_status']){
         $this->db->or_like('a.work_status', $data['work_status']);
        }
        if($data['courtesy']){
         $this->db->or_like('a.courtesy', $data['courtesy']);
        }
        if($data['bbb']){
         $this->db->or_like('a.bbb', $data['bbb']);
        }
        if($data['ha']){
         $this->db->or_like('a.ha', $data['ha']);
        }
        if($data['fb']){
         $this->db->or_like('a.fb', $data['fb']);
        }
        if($data['google']){
         $this->db->or_like('a.google', $data['google']);
        }
        if($data['service']){
         $this->db->or_like('a.service', $data['service']);
        }
        if($data['sale_date']){
        $this->db->or_like('a.sale_date', $data['sale_date']);
        }
        if(!empty($data['from_expiry_date']) && (!empty($data['to_expiry_date'])))
        {
        $this->db->where('a.expiry_date >=', $from_expiry_date_format);
        $this->db->where('a.expiry_date <=', $to_expiry_date_format);
        }
        if(empty($data['from_expiry_date']) && (empty($data['to_expiry_date'])))
        {
            $this->db->group_end();
        }
        $this->db->group_end();
        $this->db->select('a.*,b.title as remote_title,c.title as work_title,d.title as sale_title');
        $this->db->join("tbl_remote b","a.remote_id=b.id","left");
        $this->db->join("tbl_work_status c","a.worked_id=c.id","left");
        $this->db->join("tbl_sale_status d","a.sale_id=d.id","left");
        $this->db->where('a.user_type', 2);
        $this->db->where('a.user_id',$id);
        $this->db->where('a.status', 1);
        $this->db->order_by('a.id', 'desc');
        return $this->db->count_all_results('tbl_lead_contact_user a');
         
    }

    public function getfilter_result_user($id,$limit,$start,$data){
        
        $to_expiry_date = explode('-',$data['to_expiry_date']);
        $to_expiry_date_format = $to_expiry_date[2].'-'.$to_expiry_date[0].'-'.$to_expiry_date[1];
        $from_expiry_date = explode('-',$data['from_expiry_date']);
        $from_expiry_date_format = $from_expiry_date[2].'-'.$from_expiry_date[0].'-'.$from_expiry_date[1];
        $sale_date = explode('-',$data['sale_date']);
        $sale_date_format = $sale_date[2].'-'.$sale_date[0].'-'.$sale_date[1];
        if(empty($data['from_expiry_date']) && (empty($data['to_expiry_date'])))
        {
        $this->db->group_start();
        }
        if($data['first_name']){
         $this->db->or_like('a.first_name', $data['first_name']);
        }
        if($data['last_name']){
         $this->db->or_like('a.last_name', $data['last_name']);
        }
        if($data['phone_no']){
        $this->db->or_like('a.mobile_1', $data['phone_no']);
        }
        if($data['phone_no2']){
        $this->db->or_like('a.mobile_2', $data['phone_no2']);
        }
        if($data['email']){
        $this->db->or_like('a.email', $data['email']);
        }
        if($data['customer_id']){
        $this->db->or_like('a.customer_id', $data['customer_id']);
        }
        if($data['email_opt_out']){
        $this->db->or_like('a.email_opt_out', $data['email_opt_out']);
        }
        if($data['plan_status']){
         $this->db->or_like('a.plan_status', $data['plan_status']);
        }
        if($data['amount']){
         $this->db->or_like('a.plan_status', $data['amount']);
        }
        if($data['plan']){
         $this->db->or_like('a.plan', $data['plan']);
        }
        if($data['remote_by']){
         $this->db->or_like('a.remote_id', $data['remote_by']);
        }
        if($data['sale_by']){
         $this->db->or_like('a.sale_id', $data['sale_by']);
        }
        if($data['worked_by']){
         $this->db->or_like('a.worked_id', $data['worked_by']);
        }
        if($data['work_status']){
         $this->db->or_like('a.work_status', $data['work_status']);
        }
        if($data['courtesy']){
         $this->db->or_like('a.courtesy', $data['courtesy']);
        }
        if($data['bbb']){
         $this->db->or_like('a.bbb', $data['bbb']);
        }
        if($data['ha']){
         $this->db->or_like('a.ha', $data['ha']);
        }
        if($data['fb']){
         $this->db->or_like('a.fb', $data['fb']);
        }
        if($data['google']){
         $this->db->or_like('a.google', $data['google']);
        }
        if($data['service']){
         $this->db->or_like('a.service', $data['service']);
        }
        if($data['sale_date']){
        $this->db->or_like('a.sale_date', $data['sale_date']);
        }
        if(!empty($data['from_expiry_date']) && (!empty($data['to_expiry_date'])))
        {
        $this->db->where('a.expiry_date >=', $from_expiry_date_format);
        $this->db->where('a.expiry_date <=', $to_expiry_date_format);
        }
        if(empty($data['from_expiry_date']) && (empty($data['to_expiry_date'])))
        {
        $this->db->group_end();
        }
        $this->db->select('a.*,b.title as remote_title,c.title as work_title,d.title as sale_title');
        $this->db->join("tbl_remote b","a.remote_id=b.id","left");
        $this->db->join("tbl_work_status c","a.worked_id=c.id","left");
        $this->db->join("tbl_sale_status d","a.sale_id=d.id","left");
        $this->db->where('a.user_type', 2);
        $this->db->where('a.user_id',$id);
        $this->db->where('a.status', 1);
        $this->db->limit($limit,$start);
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get('tbl_lead_contact_user a');
        return $query->result();
    }
    public function getfromtoocount_user($id,$from,$too){
        $to_exp = explode('-',$too);
        $to_date = $to_exp[2].'-'.$to_exp[0].'-'.$to_exp[1];
        $from_exp = explode('-',$from);
        $from_date = $from_exp[2].'-'.$from_exp[0].'-'.$from_exp[1];
        $this->db->select('a.*,b.title as remote_title,c.title as work_title,d.title as sale_title');
        $this->db->join("tbl_remote b","a.remote_id=b.id","left");
        $this->db->join("tbl_work_status c","a.worked_id=c.id","left");
        $this->db->join("tbl_sale_status d","a.sale_id=d.id","left");
        $this->db->where('a.created_date BETWEEN "'. $from_date. '" AND "'. $to_date. '" ');
        $this->db->where('a.status',1);
        $this->db->where('a.user_type',2);
        $this->db->where('a.user_id',$id);
        $this->db->order_by('a.id', 'desc');
        return $this->db->count_all_results('tbl_lead_contact_user a');
       
    }

    public function getfromtoo_user($id,$limit,$start,$from,$too){
        $to_exp = explode('-',$too);
        $to_date = $to_exp[2].'-'.$to_exp[0].'-'.$to_exp[1];
        $from_exp = explode('-',$from);
        $from_date = $from_exp[2].'-'.$from_exp[0].'-'.$from_exp[1];
        $this->db->select('a.*,b.title as remote_title,c.title as work_title,d.title as sale_title');
        $this->db->join("tbl_remote b","a.remote_id=b.id","left");
        $this->db->join("tbl_work_status c","a.worked_id=c.id","left");
        $this->db->join("tbl_sale_status d","a.sale_id=d.id","left");
        $this->db->group_start();
        $this->db->where('a.created_date BETWEEN "'. $from_date. '" AND "'. $to_date. '" ');
        $this->db->where('a.status',1);
        $this->db->where('a.user_type',2);
        $this->db->where('a.user_id',$id);
        $this->db->group_end();
        $this->db->limit($limit,$start);
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get('tbl_lead_contact_user a');
        return $query->result();
    }

    // user models contact 
    public function CheckUserManageColumn($id)
    {
        $this->db->where('user_id', $id);
        $query = $this->db->get('lead_manage_column');
        if ($query->num_rows()==0) {
            return true;
        } else {
            return false;
        }
    }
    public function AddManageColumn($user_id,$data)
    {
        $data['user_id'] = $user_id;
        if($this->db->insert('lead_manage_column',$data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function manage_amc_plan($data)
    {
        if(!empty($data))
        {
            if($this->db->insert("tbl_manage_plan",$data))
            {
                return true;
            }
            return false;
        }
    }
    public function getPlanDays($plan_id)
    {
        $detail = $this->db->get_where("tbl_plan",array('id' => $plan_id))->result();
        return $detail[0];
    }

    public function getCustomerId($customer_id,$id="")
    {
        $data = array();
        $this->db->where("customer_id",$customer_id);
        $this->db->where("status!=",3);
        if($id)
        {
        $this->db->where("id!=",$id);
        }
        $query = $this->db->get("tbl_lead_contact_user");
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

    public function checkExpire_date($expire_date,$lead_id)
    {
        $this->db->where('id',$lead_id);
        $this->db->where('expiry_date',$expire_date);
        $this->db->where('status',1);
        $res=$this->db->get('tbl_lead_contact_user');
        if($res->num_rows()==0)
        {
            return true;
        }
        return false;
    }

    public function expire_date_log($expire_date,$sale_date,$lead_id)
    {
        $data = array(
            'lead_id'      =>  $lead_id,
            'expire_date'  =>  $expire_date,
            'sale_date'    =>  $sale_date,
            'created_date' =>  date('Y-m-d H:i:s')
        );
        if($this->db->insert("tbl_lead_expire_date_log",$data))
        {
            return true;
        }
        return false;
    }

    public function getExpireLead()
    {
        $data = array();
        $this->db->select("first_name,last_name,id,expiry_date, sale_date,email");
        $this->db->where("status",1);
        $this->db->where("lead_status",2);
        $this->db->where("expiry_date!=",NULL);
        $this->db->where("sale_date!=",NULL);
        $this->db->order_by("expiry_date","desc");
        $query = $this->db->get("tbl_lead_contact_user");
        if($query->num_rows()>0)
        {
            foreach($query->result() as $key=>$record)
            {
                $record->plan_detail = $this->getExpirePlanDetail($record->id)[0];
                $data[] = $record;
            }
            return $data;
        }
        return false;
        
    }

    public function getExpirePlanDetail($lead_id)
     {
        $data = array();
        $this->db->where("status",1);
        $this->db->where("lead_id",$lead_id);
        $this->db->order_by("id","desc");
        $this->db->limit(1);
        $query = $this->db->get("tbl_lead_expire_date_log");
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
}
    