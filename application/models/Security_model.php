<?php 
defined('BASEPATH')OR exit('direct script no access allowed');

class Security_model extends CI_Model{

    public function insertRemote($data){
        if($this->db->insert('tbl_remote',$data)){
        return true;
        }
        else
        {
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

    public function editPermissionCat($record,$id)
    {
        $this->db->where('id',$id);
        if($this->db->update("tbl_permission_category",$record))
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function checkPermissionCat($title,$id="")
    {   
        if($id)
        {
        $this->db->where('id!=',$id);
        }
        $query = $this->db->get_where("tbl_permission_category",['title' => $title]);
        if($query->num_rows()>0)
        {
            return false;
        }
        else
        {
            return true;
        }

    }


    public function get_permissionCat_record() {
        $this->db->where('status!=','3');
        return $this->db->count_all_results('tbl_permission_category');
    }

    public function get_permissionCat_result($limit, $start, $id="") {
        $this->db->where('status!=','3');
        $this->db->limit($limit, $start);
        $this->db->order_by('id','desc');
        $query = $this->db->get('tbl_permission_category');

        return $query->result();
    }

    public function checkSaleTitle($title,$id="")
    {   
        if($id)
        {
        $this->db->where('id!=',$id);
        }
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

    public function insertPermissionCat($data){
        if($this->db->insert('tbl_permission_category',$data)){
        return true;
        }
        else{
            return false;
        }
    } 

    public function checkWorkTitle($title,$id="")
    {   
        if($id)
        {
        $this->db->where('id!=',$id);
        }
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

    public function getPermissionCatInfo($id="") {
        $data = array();
        if($id)
        {
            $this->db->where('id',$id);
        }
        $this->db->where('status!=','3');
        $query = $this->db->get('tbl_permission_category');
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

    public function update_permissionCat_status($id,$status)
    {
        $this->db->where("id",$id);
        if($this->db->update('tbl_permission_category',['status' => $status]))
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function update_permissionSec_status($id,$status)
    {
        $this->db->where("id",$id);
        if($this->db->update('tbl_permission',['status' => $status]))
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function get_permissionSec_record() {
        $this->db->where('status!=','3');
        return $this->db->count_all_results('tbl_permission');
    }

    public function get_permissionSec_result($limit, $start, $id="") {
        $this->db->select('a.*,b.title as category_name');
        $this->db->join('tbl_permission_category b','a.permission_cat_id=b.id','LEFT');
        $this->db->where('a.status!=','3');
        $this->db->where('b.status!=','3');
        $this->db->limit($limit, $start);
        $this->db->order_by('a.id','desc');
        $query = $this->db->get('tbl_permission a');
        return $query->result();
    }

    public function checkPermissionSec($title,$id="")
    {   
        if($id)
        {
        $this->db->where('id!=',$id);
        }
        $query = $this->db->get_where("tbl_permission",['title' => $title]);
        if($query->num_rows()>0)
        {
            return false;
        }
        else
        {
            return true;
        }

    }

    public function insertPermissionSec($data){
        if($this->db->insert('tbl_permission',$data)){
        return true;
        }
        else{
            return false;
        }
    } 

    public function getPermissionSecInfo($id="") {
        $data = array();
        if($id)
        {
            $this->db->where('id',$id);
        }
        $this->db->where('status!=','3');
        $query = $this->db->get('tbl_permission');
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

    public function editPermissionSec($record,$id)
    {
        $this->db->where('id',$id);
        if($this->db->update("tbl_permission",$record))
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function get_role_record() {
        $this->db->where('status!=','3');
        $this->db->where('id!=','1');
        return $this->db->count_all_results('tbl_role');
    }

    public function get_role_result($limit, $start, $id="") {
        $this->db->where('status!=','3');
        $this->db->where('id!=','1');
        $this->db->limit($limit, $start);
        $this->db->order_by('id','desc');
        $query = $this->db->get('tbl_role');

        return $query->result();
    }
    public function getRoleInfo($id="") {
        $data = array();
        if($id)
        {
            $this->db->where('id',$id);
        }
        $this->db->where('status!=','3');
        $query = $this->db->get('tbl_role');
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

    public function checkRole($title,$id="")
    {   
        if($id)
        {
        $this->db->where('id!=',$id);
        }
        $query = $this->db->get_where("tbl_role",['title' => $title]);
        if($query->num_rows()>0)
        {
            return false;
        }
        else
        {
            return true;
        }

    }

    public function insertRole($data){
        if($this->db->insert('tbl_role',$data)){
        return true;
        }
        else
        {
            return false;
        }
    } 

    

    public function updateRolestatus($id,$status)
    {
        $this->db->where("id",$id);
        if($this->db->update('tbl_role',['status' => $status]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function getPermissionSecCategory($cat_id) {
        $data = array();
        if($cat_id)
        {
            $this->db->where('permission_cat_id',$cat_id);
        }
        $this->db->where('status!=','3');
        $query = $this->db->get('tbl_permission');
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

    public function getCatPermission()
    {
        $data = array();
        $category = $this->getPermissionCatInfo();
        foreach($category as $catList)
        {
            $data[] = $catList;
            $catList->section =  $this->getPermissionSecCategory($catList->id);
        }
        return $data;
    }

    public function get_count_log()
    {
        $this->db->where('status', 1);
        $this->db->order_by('id', 'desc');
        return $this->db->count_all_results('tbl_log');
    }

    public function get_result_log($limit, $start)
    {
        $data = array();
        $this->db->limit($limit, $start);
        $this->db->select("a.*,b.name,c.title as role");
        $this->db->join("tbl_users b","a.user_id=b.id","LEFT");
        $this->db->join("tbl_role c","b.role_id=c.id","LEFT");
        $this->db->order_by('a.id','desc');
        $query = $this->db->get('tbl_log a');
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


    public function get_count_search_log($gsearch)
    {   
        $data = array();
        $this->db->group_start();
        $this->db->or_like('a.title', $gsearch);
        $this->db->or_like('b.name', $gsearch);
        $this->db->or_like('c.title', $gsearch);
        $this->db->group_end();
        $this->db->select("a.*,b.name,c.title as role");
        $this->db->join("tbl_users b","a.user_id=b.id","LEFT");
        $this->db->join("tbl_role c","b.role_id=c.id","LEFT");
        $this->db->order_by('a.id','desc');
        $this->db->where('a.status', 1);
        return $this->db->count_all_results('tbl_log a'); 
        
        
    }
    public function get_count_date_log($gsearch)
    {   
        $date = explode('-',$gsearch);
        $date_format  = $date[2].'-'.$date[0].'-'.$date[1];
        $this->db->select("a.*,b.name,c.title as role");
        $this->db->join("tbl_users b","a.user_id=b.id","LEFT");
        $this->db->join("tbl_role c","b.role_id=c.id","LEFT");
        $this->db->order_by('a.id','desc');
        $this->db->where('a.status', 1);
        $this->db->like('a.created_date', $date_format);
        return $this->db->count_all_results('tbl_log a'); 

    }
    public function get_result_search_log($limit, $segment, $gsearch)
    {   
        $data = array();
        $this->db->group_start();
        $this->db->or_like('a.title', $gsearch);
        $this->db->or_like('b.name', $gsearch);
        $this->db->or_like('c.title', $gsearch);
        $this->db->group_end();
        $this->db->select("a.*,b.name,c.title as role");
        $this->db->join("tbl_users b","a.user_id=b.id","LEFT");
        $this->db->join("tbl_role c","b.role_id=c.id","LEFT");
        $this->db->order_by('a.id','desc');
        $this->db->where('a.status', 1);            
        $this->db->limit($limit, $segment);
        $query = $this->db->get('tbl_log a'); 
        return $query->result();
        
    }
    public function get_result_date_log($limit, $segment, $gsearch)
    {   
        $date = explode('-',$gsearch);
        $date_format  = $date[2].'-'.$date[0].'-'.$date[1];
        $this->db->select("a.*,b.name,c.title as role");
        $this->db->join("tbl_users b","a.user_id=b.id","LEFT");
        $this->db->join("tbl_role c","b.role_id=c.id","LEFT");
        $this->db->like('a.created_date', $date_format);
        $this->db->order_by('a.id','desc');
        $this->db->where('a.status', 1);            
        $this->db->limit($limit, $segment);
        $query = $this->db->get('tbl_log a'); 
        return $query->result();
        
    }

    public function updatePermissionRole($role_id,$permission,$all_section_id)
    {
        $role_status=0;
       for($i=0;$i<count($all_section_id);$i++)
       {
        $role_status = (in_array($all_section_id[$i],$permission)) ? 1:2;
        $this->ExistPermission($all_section_id[$i],$role_id,$role_status);
       }
    }

    public function ExistPermission($section_id,$role_id,$role_status)
    {
        $query = $this->db->get_where('tbl_permission_role',['role_id' => $role_id,'permission_id' => $section_id]);
        if($query->num_rows()>0)
        {
            $this->updatePermissionSection($section_id,$role_id,$role_status);
        }
        else
        {
            $this->insertPermissionSection($section_id,$role_id,$role_status);
        }

    }

    public function insertPermissionSection($section_id,$role_id,$role_status)
    {
        $data = array
        (
            'role_id'       => $role_id,
            'permission_id' => $section_id,
            'status'        => $role_status
        );
        $this->db->insert("tbl_permission_role",$data);
    }
    public function updatePermissionSection($section_id,$role_id,$role_status)
    {
        $this->db->where("role_id",$role_id);
        $this->db->where("permission_id",$section_id);
        $this->db->update("tbl_permission_role",['status' => $role_status]);
    }

    public function getRolePermission($role_id)
    {
        $data = array();
        $query = $this->db->get_where("tbl_permission_role",['role_id' => $role_id,'status' => 1]);
        if($query->num_rows()>0)
        {
            foreach($query->result() as $record)
            {
                $data[] = $record->permission_id;
            }
            return $data;
        }
        return $data;
    }

    public function updateProfile($data,$user_id)
    {
     $this->db->where('id',$user_id);
     if($this->db->update('tbl_users',$data))
     {
        return true;
     }    
     else
     {
        return false;
     }
    }

    public function checkUserName($username,$id)
    {
        $this->db->where('id!=',$id);
        $query = $this->db->get_where("tbl_users",array('username' => $username));
        if ($query->num_rows())
        {
              return true;
        }
        else
        {
            return false;
        }
    }

}
