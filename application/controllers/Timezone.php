<?php
defined('BASEPATH')OR exit('direct script no access allowed');
class Timezone extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->library('auth');
        if(($this->auth->user_info()->role_id!=1) && ($this->auth->user_info()->role_id!=3) && ($this->auth->user_info()->role_id!=4))
        {
            redirect(base_url());
        }
        
    }

    public function index(){ 
        
        //$this->getBooking();
        $data['title']="Dashboard";
        $this->load->view('include/header',$data);
        $this->load->view('login/dashboard',$data);
        $this->load->view('include/footer');
    }
    public function getTime()
    {
        echo date('Y-m-d :i:s'); die;
    }
    public function getBooking()
    {
        $booking_list = $this->Booking_model->getBookingOpenPending();
        $booking_open_list = array();
        $timezone = array(
            'EST' => 'US/Eastern',
            'CST' => 'US/Central',
            'PST' => 'US/Pacific',
            'MST' => 'US/Mountain'
        );
        $html = "";
        foreach($booking_list as $booking_reminder=>$booking_reminder_list)
        {
            switch($booking_reminder_list->timezone)
            {
                case 1 : $timezone_type = 'EST';
                break;
                case 2 : $timezone_type = 'CST';
                break;
                case 3 : $timezone_type = 'PST';
                break;
                case 4 : $timezone_type = 'MST';
                break;
            }
            $booking_date = $booking_reminder_list->date;
            $newDate = explode('-',$booking_date);
            $getTimeZoneDetail = $timezone[$timezone_type];
            date_default_timezone_set($getTimeZoneDetail);
            $current_time =  date('Y-m-d H:i:s');
            $booking_time = date('Y-m-d H:i',strtotime($newDate[2].$newDate[0].$newDate[1].$booking_reminder_list->time));
            $booking_time1 = date('m-d-Y H:i A',strtotime($newDate[2].$newDate[0].$newDate[1].$booking_reminder_list->time));
            $diff = (strtotime($booking_time)-strtotime($current_time));
            $getMin = ($diff/60);
            $max_time_limit = ($booking_reminder_list->reminder_status==1)?5:15;
            
            if($getMin < 0)
            {
                $this->Booking_model->statusUpdateOfreminder($booking_reminder_list->id,2);
            }
            else
            {   
                
                if($booking_reminder_list->reminder_time==2 && $booking_reminder_list->reminder_status==2)
                   {
                    $this->Booking_model->statusUpdateOfreminder($booking_reminder_list->id,3);
                   }
                   else
                   {
                    $this->Booking_model->statusUpdateOfreminder($booking_reminder_list->id,1);
                   }
            }
            if($getMin < $max_time_limit && $getMin > 0 && $booking_reminder_list->reminder_status!=2 &&  $booking_reminder_list->reminder_time!=2)
            {
               
                $html .= '<div class="toast fade show">
                <div class="toast-header">
                <strong class="me-auto"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="20" height="20" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g fill-rule="evenodd" clip-rule="evenodd"><path fill="#43a146" d="M256 0C114.8 0 0 114.8 0 256s114.8 256 256 256 256-114.8 256-256S397.2 0 256 0z" data-original="#4bae4f" class="" opacity="1"></path><path fill="#ffffff" d="M379.8 169.7c6.2 6.2 6.2 16.4 0 22.6l-150 150c-3.1 3.1-7.2 4.7-11.3 4.7s-8.2-1.6-11.3-4.7l-75-75c-6.2-6.2-6.2-16.4 0-22.6s16.4-6.2 22.6 0l63.7 63.7 138.7-138.7c6.2-6.3 16.4-6.3 22.6 0z" data-original="#ffffff" class=""></path></g></g></svg>
                   Booking Reminder
                    </strong>
                    <small>just now</small>
                    <button type="button" class="btn btn-close" data-bs-dismiss="toast" onClick=CloseBookingByUser('.$booking_reminder_list->id.','.$max_time_limit.')></button>
                </div>
                <div class="toast-body">
                <strong style="color:#0a71ad;">
                '.$booking_reminder_list->first.' '.$booking_reminder_list->last_name.'
                                    </strong><br>
                    '.$booking_time1.' ( '.$timezone_type .' )'.'
                </div>
                <div class="toast-footer"  style="padding-left:2px;" >
                <button type="button" class="btn btn_save" data-dismiss="modal" onClick=gotBookingByUser('.$booking_reminder_list->id.')>Got it</button>
                </div>
            </div>';
            }
            
            
        }
         echo $html;
    }
    public function CloseBookingByUser()
    {
        $data['user_detail'] = $this->auth->user_info();
        $booking_id = $this->input->post('booking_id');
        $status = $this->input->post('status');
        $time_slot = $this->input->post('time_slot');
        if(!empty($booking_id) && !empty($status))
        {
        if($this->Booking_model->CloseBookingByUser($booking_id,$status,$time_slot))
        {
                $insert_id = $booking_id;
                $user_id           = $data['user_detail']->id;
                $id           = $insert_id;
                $log_title         = "Booking Reminder Closed  - " . $insert_id;
                $log_create        = app_log_manage($user_id, $id, $log_title);
        }
        }
    }
    public function gotBookingByUser()
    {
        $data['user_detail'] = $this->auth->user_info();
        $booking_id = $this->input->post('booking_id');
        $status = $this->input->post('status');
        if(!empty($booking_id) && !empty($status))
        {
        if($this->Booking_model->gotBookingByUser($booking_id,$status))
        {
                $insert_id = $booking_id;
                $user_id           = $data['user_detail']->id;
                $id                = $insert_id;
                $log_title         = "Booking Reminder Closed  - " . $insert_id;
                $log_create        = app_log_manage($user_id, $id, $log_title);
        }
        }
    }

    public function getRecentBookings()
    {

        $booking_list = $this->Booking_model->getBookingOpenPending();
        $booking_open_list = array();
        $timezone = array(
            'EST' => 'US/Eastern',
            'CST' => 'US/Central',
            'PST' => 'US/Pacific',
            'MST' => 'US/Mountain'
        );
        $html = "";
        foreach($booking_list as $booking_reminder=>$booking_reminder_list)
        {
            switch($booking_reminder_list->timezone)
            {
                case 1 : $timezone_type = 'EST';
                break;
                case 2 : $timezone_type = 'CST';
                break;
                case 3 : $timezone_type = 'PST';
                break;
                case 4 : $timezone_type = 'MST';
                break;
            }
            $remind_status = "";
            switch($booking_reminder_list->remind_time_status)
            {
                case 1 : $remind_status = 'close Remind';
                break;
                case 2 : $timezone_type = 'Got Remind';
                break;
            }
            $booking_date = $booking_reminder_list->date;
            $newDate = explode('-',$booking_date);
            $getTimeZoneDetail = $timezone[$timezone_type];
            date_default_timezone_set($getTimeZoneDetail);
            $current_time =  date('Y-m-d H:i:s');
            $booking_time = date('Y-m-d H:i',strtotime($newDate[2].$newDate[0].$newDate[1].$booking_reminder_list->time));
            $booking_time1 = date('m-d-Y H:i A',strtotime($newDate[2].$newDate[0].$newDate[1].$booking_reminder_list->time));
            $diff = (strtotime($booking_time)-strtotime($current_time));
            $getMin = ($diff/60);
            
             
            if($remind_status==null && ($getMin > 0))
            {
              $remind_status = "Upcoming";
            }

            if($remind_status==null && ($getMin < 0))
            {
              $remind_status = "Pending";
            }
              $html .= '<div class="div1">
                  <div><h5>'.$booking_reminder_list->first.' '. $booking_reminder_list->last_name .' </h5></div>
                    <div class="d-flex justify-content-between">
                      <p>Time: <span>'. $booking_time1 .' <b>('.$timezone_type.')</b></span></p>
                      <p>Status: <span class="text-success"><b>'.$remind_status.'</b></span></p>
                    </div>
              </div>';
        }

        echo $html;

    }


    public function getRecentExpirePlans()
    {
        $getExpireLead = $this->Contacts_model->getExpireLead();
        $html = "";
        foreach($getExpireLead as $expire_lead=>$expire_lead_list)
        {
            $exp = explode('-',$expire_lead_list->plan_detail->expire_date);
            $exp_date = $exp[2].'-'.$exp[0].'-'.$exp[1].' 23:59:59';
            date_default_timezone_set('US/Pacific');
            $current_time =  date('Y-m-d H:i:s');
            $timezone_type = "US/Pacific";
            $diff = (strtotime($exp_date)-strtotime($current_time));
            $days_diffrence = ($diff/86400);
           
            if($days_diffrence<15 && $days_diffrence >= 0)
            {
                $expire_status = "Expire Soon";
            }
            elseif($days_diffrence<0)
            {
                $expire_status = "Expired";
            }
            if($days_diffrence<15)
            {
              $html .= '<a href="'.base_url('contact-detail?id='.base64_encode($expire_lead_list->plan_detail->lead_id)).'"><div class="div1">
                  <div><h5>'.$expire_lead_list->first_name.' '. $expire_lead_list->last_name .'</h5></div>
                  <div><h5>Email Id : '.$expire_lead_list->email .'</h5></div>
                    <div class="d-flex justify-content-between">
                      <p>Time: <span>'. $expire_lead_list->plan_detail->expire_date .' <b>('.$timezone_type.')</b></span></p>
                      <p>Status: <span class="text-success"><b>'.$expire_status.'</b></span></p>
                    </div>
              </div></a>';
            }
        }

        echo $html;

    }
}
