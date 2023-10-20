<?php 
defined('BASEPATH')OR exit('direct script no access allowed');

class Module_model extends CI_Model{

    public function insertRemote($data){
        if($this->db->insert('tbl_remote',$data)){
         return true;
        }
        else{
            return false;
        }
    } 

    // public function fetchRemote(){
    //     $this->db->from('tbl_remote');
    //     $query = $this->db->get();
    //    return $query->result();
    // }


    public function get_remote_status_record() {
        $this->db->where('status!=','3');
        return $this->db->count_all_results('tbl_remote');
    }

    public function get_remote_result($limit, $start, $id="") {
        $this->db->where('status!=','3');
        $this->db->limit($limit, $start);
        $this->db->order_by('id','desc');
        $query = $this->db->get('tbl_remote');

        return $query->result();
    }

    public function update_remote_status($id,$status)
    {
        $this->db->where("id",$id);
        if($this->db->update('tbl_remote',['status' => $status]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getRemoteInfo($id="") {
        $data = array();
        if($id)
        {
            $this->db->where('id',$id);
        }
        $this->db->where('status!=','3');
        $query = $this->db->get('tbl_remote');
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $key=>$list)
            {
                $data[] = $list;
            }
            return $data;
        }
        return false;
    }

    public function editRemote($record,$id)
    {
        $this->db->where('id',$id);
        if($this->db->update("tbl_remote",$record))
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function checkRemoteTitle($title,$id="")
    {   
        if($id)
        {
        $this->db->where('id!=',$id);
        }
        $this->db->where('status!=','3');
        $query = $this->db->get_where("tbl_remote",['title' => $title]);
        if($query->num_rows()>0)
        {
            return false;
        }
        else
        {
            return true;
        }

    }

    public function insertSale($data){
        if($this->db->insert('tbl_sale_status',$data)){
            return true;
        }
        else{
            return false;
        }
    } 

    public function get_sale_status_record() {
        $this->db->where('status!=','3');
        return $this->db->count_all_results('tbl_sale_status');
    }

    public function get_sale_result($limit, $start, $id="") {
        $this->db->where('status!=','3');
        $this->db->limit($limit, $start);
        $this->db->order_by('id','desc');
        $query = $this->db->get('tbl_sale_status');

        return $query->result();
    }

    public function checkSaleTitle($title,$id="")
    {   
        if($id)
        {
        $this->db->where('id!=',$id);
        }
        $this->db->where('status!=',3);
        $query = $this->db->get_where("tbl_sale_status",['title' => $title]);
        if($query->num_rows()>0)
        {
            return false;
        }
        else
        {
            return true;
        }

    }

    public function getSaleInfo($id="") {
        $data = array();
        if($id)
        {
            $this->db->where('id',$id);
        }
        $this->db->where('status!=','3');
        $query = $this->db->get('tbl_sale_status');
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $key=>$list)
            {
                $data[] = $list;
            }
            return $data;
        }
        return false;
    }

    public function editSaleStatus($record,$id)
    {
        $this->db->where('id',$id);
        if($this->db->update("tbl_sale_status",$record))
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function update_sale_status($id,$status)
    {
        $this->db->where("id",$id);
        $this->db->update('tbl_sale_status',['status' => $status]);
        echo $this->db->last_query(); die;
        if($this->db->update('tbl_sale_status',['status' => $status]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function insertWork($data){
        if($this->db->insert('tbl_work_status',$data)){
            return true;
        }
        else{
            return false;
        }
    } 

    public function insertPlan($data){
        if($this->db->insert('tbl_plan',$data)){
            return true;
        }
        else{
            return false;
        }
    }

    public function get_work_status_record() {
        $this->db->where('status!=','3');
        return $this->db->count_all_results('tbl_work_status');
    }

    public function get_plan_record() {
        $this->db->where('status!=','3');
        return $this->db->count_all_results('tbl_plan');
    }

    public function get_work_result($limit, $start, $id="") {
        $this->db->where('status!=','3');
        $this->db->limit($limit, $start);
        $this->db->order_by('id','desc');
        $query = $this->db->get('tbl_work_status');

        return $query->result();
    }

    public function get_plan_result($limit, $start, $id="") {
        $this->db->where('status!=','3');
        $this->db->limit($limit, $start);
        $this->db->order_by('id','desc');
        $query = $this->db->get('tbl_plan');

        return $query->result();
    }

    public function checkWorkTitle($title,$id="")
    {   
        if($id)
        {
        $this->db->where('id!=',$id);
        }
        $this->db->where('status!=','3');
        $query = $this->db->get_where("tbl_work_status",['title' => $title]);
        if($query->num_rows()>0)
        {
            return false;
        }
        else
        {
            return true;
        }

    }
    public function checkplanTitle($title,$id="")
    {   
        if($id)
        {
        $this->db->where('id!=',$id);
        }
        $this->db->where('status!=','3');
        $query = $this->db->get_where("tbl_plan",['title' => $title]);
        if($query->num_rows()>0)
        {
            return false;
        }
        else
        {
            return true;
        }

    }

    public function getWorkInfo($id="") {
        $data = array();
        if($id)
        {
            $this->db->where('id',$id);
        }
        $this->db->where('status!=','3');
        $query = $this->db->get('tbl_work_status');
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $key=>$list)
            {
                $data[] = $list;
            }
            return $data;
        }
        return false;
    }
    public function getPlanInfo($id="") {
        $data = array();
        if($id)
        {
            $this->db->where('id',$id);
        }
        $this->db->where('status!=','3');
        $query = $this->db->get('tbl_plan');
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $key=>$list)
            {
                $data[] = $list;
            }
            return $data;
        }
        return false;
    }

    public function editWorkStatus($record,$id)
    {
        $this->db->where('id',$id);
        if($this->db->update("tbl_work_status",$record))
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function editPlanStatus($record,$id)
    {
        $this->db->where('id',$id);
        if($this->db->update("tbl_plan",$record))
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function update_work_status($id,$status)
    {
        $this->db->where("id",$id);
        $this->db->update('tbl_work_status',['status' => $status]);
        echo $this->db->last_query(); die;
        if($this->db->update('tbl_work_status',['status' => $status]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function update_plan_status($id,$status)
    {
        $this->db->where("id",$id);
        $this->db->update('tbl_plan',['status' => $status]);
        echo $this->db->last_query(); die;
        if($this->db->update('tbl_plan',['status' => $status]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
