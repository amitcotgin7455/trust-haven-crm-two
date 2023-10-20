<?php
defined('BASEPATH') OR exit('direct script no access allowed');

class Log extends CI_Controller{

function __construct()
{
    parent::__construct();
    $this->load->library('auth');

}

public function index(){
$data['user_detail'] = $this->auth->user_info();
$activity = $this->Lead_model->activity($data['user_detail']->id);

$userdatetime =  $activity[0]->created_date;
 $userdate    = date('Y/m/d h:i',strtotime($userdatetime)) ;
 "<br>";
$usertime    = date('h:i:s',strtotime($userdatetime)) ;
$userhour    = date('h',strtotime($userdatetime)) ;
$userminute    = date('i',strtotime($userdatetime));


 $currentdatetime = date('Y-m-d h:i');
$currentdate    = date('Y-m-d',strtotime($currentdatetime)) ;
$currenttime    = date('h:i:s',strtotime($currentdatetime)) ;
$currenthour    = date('h',strtotime($currentdatetime)) ;
$currentminute    = date('i',strtotime($currentdatetime)) ;




}


}