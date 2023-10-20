<?php
defined('BASEPATH') OR exit('No direct access allowed !');

class CI_auth {
    
    public $user_detail;
    public $CI;
    public function __construct()
    {
        
		error_reporting(E_ERROR | E_PARSE);
        $this->CI =& get_instance();
        if(empty($this->CI->session->userdata('isloggedIn')))
        {
            
            if((ucfirst($this->CI->router->class))!='Login')
            {
            redirect(base_url());
            }
        }
        else
        {
            // prx($_COOKIE);
            $this->user_detail = $this->CI->session->userdata('isloggedIn');    
            $this->user_info();
            // if(empty($this->user_info()))
            // {
            //     unset($_SESSION['isloggedIn']);
            //     redirect(base_url());
            // }
            
        }
        
    }
    public function routes($role_id)
    {
        
            switch($role_id)
            {
                case 1:
                redirect(base_url('admin'));
                break;
                case 2:
                redirect(base_url('sales'));
                break;
                case 3:
                redirect(base_url('tech'));
                break;
                case 4:
                redirect(base_url('admin'));
                break;
        }
    }
    
    public function user_info()
    {
        
        $user_record = array();
        $user_login_info = array(
            'a.id' => $this->user_detail['user_id'],
            'a.username' => $this->user_detail['username'],
            'a.status' => 1
        );
        $this->CI->db->select('a.*,b.title as role_type');
        $this->CI->db->join('tbl_role b',"a.role_id=b.id","INNER");
        $query = $this->CI->db->get_where("tbl_users a",$user_login_info);
        $record = $query->result()[0];
        if((ucfirst($this->CI->router->class))=='Login')
        {
        $this->routes($record->role_id);
        }
        return $record; 
       }

}
