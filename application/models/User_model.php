<?php 

defined('BASEPATH')OR exit('direct script no access allowed');



class User_model extends CI_Model{

    

    public function getRole($id="") {

        $data = array();

        if($id)

        {

            $this->db->where('id',$id);

        }

        $this->db->where('status!=','3');

        $this->db->where('id!=',1);

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



    public function getUser($username="",$id="",$email="") {

        $data = array();

        if($id) { $this->db->where('id!=',$id); }

        if($username) {

        $this->db->group_start();

        $this->db->where('username',$username); 

        if($email) { $this->db->or_where('email',$email); }

        $this->db->group_end();

        }

        $this->db->where('status!=','3');

        $query = $this->db->get('tbl_users');

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



    public function createUser($data){

        if($this->db->insert('tbl_users',$data)){

        //$this->db->insert_id();

        return true;

        }

        else

        {

            return false;

        }

    } 

    public function createColumn($data){

        if($this->db->insert('lead_manage_column',$data)){

        //$this->db->insert_id();

        return true;

        }

        else

        {

            return false;

        }

    } 



    public function get_user_record() {

        $this->db->where('status!=','3');

        return $this->db->count_all_results('tbl_users');

    }

    public function get_user_record_auth() {

        $this->db->where('status!=','3');

        return $this->db->count_all_results('tbl_user_auth');

        // echo $this->db->last_query();

        // die;

    }



    public function get_user_result($limit, $start, $id="") {

        $this->db->select('a.*,b.title as role');

        $this->db->join("tbl_role b","a.role_id=b.id","INNER");

        $this->db->where('a.status!=','3');

        $this->db->where('b.id!=','1');

        $this->db->limit($limit, $start);

        $this->db->order_by('a.id','desc');

        $query = $this->db->get('tbl_users a');

        return $query->result();

    }

    public function get_user_result_auth($limit, $start, $id="") {

        $this->db->select('a.*,b.name as username ,c.title as role');

        $this->db->join("tbl_users b","a.user_id=b.id","inner");

        $this->db->join("tbl_role c","b.role_id =c.id","inner");

        $this->db->where('a.status!=','3');

        $this->db->where('b.id!=','1');

        $this->db->limit($limit, $start);

        $this->db->order_by('a.id','desc');

        $query = $this->db->get('tbl_user_auth a');

        // echo $this->db->last_query();die;

        return $query->result();

    }



    public function update_user_status($id,$status)

    {

        $this->db->where("id",$id);

        if($this->db->update('tbl_users',['status' => $status]))

        {

            return true;

        }

        else

        {

            return false;

        }

    }



    public function getUserInfoRole(){

        $this->db->where('status',1);

        $this->db->where('id',3);

        $query = $this->db->get('tbl_role');

        return $query->result();



    }



    public function getUserInfo($id="",$role_type="") {

        $data = array();

        if($id)

        {

            $this->db->where('id',$id);

        }

        if($role_type)

        {

            $this->db->where('role_id',$role_type);

        }

        $this->db->where('status!=','3');

        $query = $this->db->get('tbl_users');

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

    public function editUser($record,$id)

    {

        $this->db->where('id',$id);

        if($this->db->update("tbl_users",$record))

        {

            return true;

        }

        else

        {

            return false;

        }



    }



    public function updatedays($days,$id){

       $id_imp = implode(',',$id);

       $this->db->where("id in ($id_imp)");

       if($this->db->update("tbl_user_auth",['expiry_days' => $days])){

        return true;

       }else{

        return false;

       }

       



       

    }



    public function get_user_login_activity($limit,$start,$auth_id="") {

        $this->db->select('a.*,c.name as username ,d.title as role');

        $this->db->join("tbl_user_auth b","a.user_auth_id=b.id","inner");

        $this->db->join("tbl_users c","b.user_id=c.id","inner");

        $this->db->join("tbl_role d","c.role_id =d.id","inner");
        
        $this->db->where('a.status!=','3');

        if($auth_id)

        {

        $this->db->where('a.user_auth_id',$auth_id);

        }

        $this->db->limit($limit, $start);

        $this->db->order_by('a.id','desc');

        $query = $this->db->get('tbl_user_login_activity a');
        return $query->result();

    }

    public function get_user_login_record_auth($auth_id="") {

        $this->db->where('status!=','3');

        if($auth_id)

        {

        $this->db->where('user_auth_id',$auth_id);

        }

        return $this->db->count_all_results('tbl_user_login_activity');

        // echo $this->db->last_query();

        // die;

    }

}

