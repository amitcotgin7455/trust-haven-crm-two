<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
function app_log_manage($user_id,$id,$text)
{
    $CI =& get_instance();    
    $CI->load->database();
    $data = array(
        'user_id'      => $user_id,
        'insert_id'      => $id,
        'title'        => $text,
        'created_date' => date('Y-m-d H:i:s')
    );
    $CI->db->insert("tbl_log",$data);
}

//active email 
function active_mail(){
    $CI =& get_instance();    
    $CI->load->database();  
    $CI->db->where("sender_status",'1');
    $CI->db->where("status",'1');
    $activeEmail = $CI->db->get("tbl_email_setup");
    return $activeEmail->result();
}

function prx($data){
    echo "<pre>";
    print_r($data);
    die;
}