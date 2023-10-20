<?php 
defined('BASEPATH')OR exit('direct script no access allowed');

class Setting_model extends CI_Model{

    public function insertRemote($data){
        if($this->db->insert('tbl_remote',$data)){
        $this->db->insert_id();
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


    public function get_count() {
        return $this->db->count_all_results('tbl_remote');
    }

    public function get_authors($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('tbl_remote');

        return $query->result();
    }
}

