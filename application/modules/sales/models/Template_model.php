<?php
class Template_model extends CI_Model{


public function GetAdminResult(){
    $this->db->where('status',1);
    $query = $this->db->get('tbl_template');
    return $query->result();
}

public function GetUserResult($id){
$this->db->where('status',1);
$this->db->where('user_id',$id);
$query = $this->db->get('tbl_template');
return $query->result();

}

public function insertData($data){
if($this->db->insert('tbl_template' , $data)){
    return true;
}
else{
    return false;
}
}

public function deleteRecord($id){
    $this->db->set('status',3);
    $this->db->where('status',1);
    $this->db->where('template_id',$id);
    if($this->db->update('tbl_template')){
    return true;
    }else{
    return false;
    }
}

}