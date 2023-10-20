<?php
defined('BASEPATH') OR die('direct script no access allowed');

class Payment_model extends CI_Model{

    public function updatePaymentstatus($id){
        $this->db->where('id',$id);
        $this->db->set('payment_status',2);
        $this->db->set('payment_date',date('Y-m-d h:i:s'));
        if($this->db->update('tbl_invoice')){
            return true;
        }
        else{
            return false;
        }
    }
}
