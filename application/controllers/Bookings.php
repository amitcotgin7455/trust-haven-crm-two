<?php
defined('BASEPATH') or exit('direct script no access allowed');

class Bookings extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        $this->load->library('session');
        if(($this->auth->user_info()->role_id!=1) && ($this->auth->user_info()->role_id!=4) && ($this->auth->user_info()->role_id!=3))

        {
            redirect(base_url());
        }
        $this->load->model('Sendmail_model');

    }

    public function index()
    {
        $gsearch = $this->input->get('s');
        $data['user_detail'] = $this->auth->user_info();
        $data['title'] = "Booking List";
        $data['active3'] = "Active";
        $link = base_url() . "list-booking";
        $limit = 15;
        $segment = $this->input->get('page');
        if ($data['user_detail']->role_id == 1 || $data['user_detail']->role_id == 4) {
            // count filter rows 
            if(!empty($this->input->get('first_name')) || !empty($this->input->get('last_name')) || !empty($this->input->get('phone_no')) || !empty($this->input->get('phone_no2')) || !empty($this->input->get('email')) || !empty($this->input->get('booking_date')) || !empty($this->input->get('time')) || !empty($this->input->get('timezone'))  || !empty($this->input->get('booking_status'))){
            $total_record =  $this->Booking_model->getfilter_count_admin($this->input->get());
            }
            elseif(!empty($this->input->get('from')) && !empty($this->input->get('too'))){
            $total_record =  $this->Booking_model->getfromtoo_count_admin($this->input->get('from'),$this->input->get('too'));
            }
            else{
            $total_record =  $this->Booking_model->get_count_leads_admin();
            }
            // count filter rows 

            // result filter rows 
            if(!empty($this->input->get('first_name')) || !empty($this->input->get('last_name')) || !empty($this->input->get('phone_no')) || !empty($this->input->get('phone_no2')) || !empty($this->input->get('email')) || !empty($this->input->get('booking_date')) || !empty($this->input->get('time')) || !empty($this->input->get('timezone'))  || !empty($this->input->get('booking_status'))){
            $result = $this->Booking_model->getfilter_result_admin($limit, $segment,$this->input->get());
            }
            elseif(!empty($this->input->get('from')) && !empty($this->input->get('too'))){
            $result = $this->Booking_model->getfromtoo_result_admin($limit, $segment,$this->input->get('from'),$this->input->get('too'));
            }
            else {
            $result = $this->Booking_model->get_result_leads_admin($limit, $segment);
            } 
            // result filter rows 

        } else {
            $login_user_id = $data['user_detail']->id;
            if(!empty($this->input->get('first_name')) || !empty($this->input->get('last_name')) || !empty($this->input->get('phone_no')) || !empty($this->input->get('phone_no2')) || !empty($this->input->get('email')) || !empty($this->input->get('booking_date')) || !empty($this->input->get('time')) || !empty($this->input->get('timezone'))  || !empty($this->input->get('booking_status'))){
            $total_record =  $this->Booking_model->getfilter_count_user($login_user_id,$this->input->get());
            }
            elseif(!empty($this->input->get('from')) && !empty($this->input->get('too'))){
            $total_record =  $this->Booking_model->getfromtoo_count_user($login_user_id,$this->input->get('from'),$this->input->get('too'));
            }
            else{
            $total_record =  $this->Booking_model->get_count_leads($login_user_id);
            }
            // count filter rows 

            // result filter rows 
            if(!empty($this->input->get('first_name')) || !empty($this->input->get('last_name')) || !empty($this->input->get('phone_no')) || !empty($this->input->get('phone_no2')) || !empty($this->input->get('email')) || !empty($this->input->get('booking_date')) || !empty($this->input->get('time')) || !empty($this->input->get('timezone'))  || !empty($this->input->get('booking_status'))){
            $result = $this->Booking_model->getfilter_result_user($login_user_id, $limit, $segment,$this->input->get());
            }
            elseif(!empty($this->input->get('from')) && !empty($this->input->get('too'))){
            $result = $this->Booking_model->getfromtoo_result_user($login_user_id, $limit, $segment,$this->input->get('from'),$this->input->get('too'));
            }   
            else{
            $result = $this->Booking_model->get_result_leads($login_user_id, $limit, $segment);
            }
            // result filter rows 
        }
        $parms = array(
            'limit' => $limit,
            'segment' => $segment,
            'total_record' => $total_record,
            'result'       => $result,
            'link'         => $link
        );
        $data['pagination'] = $this->pagination_setup($parms);
        $data['result']   =  $result;
        if(empty($data['result']) && !empty($_GET)){
            // $_SESSION['error'] = "No Data Found";
            // redirect(base_url() . 'list-lead');
        }
        $data['segment']    = $segment;
        $data['links']    = $data['pagination']['links'];
        $data['manage_column'] = $this->Booking_model->fetchManageColumn($data['user_detail']->id);
        $this->load->view('include/header', $data);
        $this->load->view('booking/listbooking', $data);
        $this->load->view('include/footer',$data);
    }
    public function create()
    {
        $data['user_detail'] = $this->auth->user_info();
        if ($data['user_detail']->role_id == 1 || $data['user_detail']->role_id == 4) {
            $data['select_name'] = $this->Booking_model->fetchSelectName(); 
        }
        else{
            $data['select_name'] = $this->Booking_model->fetchSelectNameUser($data['user_detail']->id); 
        }
        // if($data['user_detail'][0]->id)
        $data['title'] = "Create Booking";
        $data['active3'] = "Active";
        $this->load->view('include/header', $data);
        $this->load->view('booking/createbooking', $data);
        $this->load->view('include/footer',$data);
    }
    public function getBooking()
    {
        $name = $this->input->post('name');
        $data = $this->Booking_model->getBooking($name);
        echo json_encode($data);
    }
    public function addBooking()
    {  
        $data['user_detail'] = $this->auth->user_info();
        if (!isset($_POST['save']) && (!isset($_POST['save_new']))) {
            
            redirect(base_url('create-booking'));
        }
        // prx($_POST);
        if (isset($_POST['save'])) {

            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('mobile_1', 'Phone Number', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('time', 'Time', 'required');
            $this->form_validation->set_rules('date', 'Date', 'required');
            $this->form_validation->set_rules('timezone', 'Timezone', 'required');
            $this->form_validation->set_rules('booking_status', 'Booking Status', 'required');



            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Create Booking";
                $data['active3'] = "Active";
                $data['select_name'] = $this->Booking_model->fetchSelectName();
                $this->load->view('include/header', $data);
                $this->load->view('booking/createbooking', $data);
                $this->load->view('include/footer',$data);
            } else {
                $first_name = $this->input->post('first_name');
                $last_name = $this->input->post('last_name');
                $mobile_1 = $this->input->post('mobile_1');
                $mobile_2 = $this->input->post('mobile_2');
                $email = $this->input->post('email');
                $date = $this->input->post('date');
                $timezone = $this->input->post('timezone');
                $booking_status = $this->input->post('booking_status');
                if (empty($this->input->post('time'))) {
                    $time = 0;
                } else {
                    $time = $this->input->post('time');
                }
                $created_date = date('Y-m-d,h:i:s');
                $insert = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'mobile_1' => $mobile_1,
                    'mobile_2' => $mobile_2,
                    'email' => $email,
                    'date'=>  $date,
                    'time' => date('H:i',strtotime($time)),
                    'timezone' => $timezone,
                    'booking_status' => $booking_status,
                    'created_date' => $created_date,
                    'user_id'      => $data['user_detail']->id
                );
                $res = $this->Booking_model->insertData($insert);
                // log activity 
                $insert_id = $this->db->insert_id();
                $user_id           = $data['user_detail']->id;
                $id           = $insert_id;
                $log_title         = "Add Booking  - " . json_encode($insert);
                $log_create        = app_log_manage($user_id, $id, $log_title);
                // log activity ;
                if ($res) {  
                    $this->SendMailaddbooking($first_name,$email,$date,$time,$timezone,$insert_id,$user_id);
                    
                    $_SESSION['done'] = "Booking Added successfully";
                    redirect(base_url() . 'list-booking');
                } else {
                    
                    $_SESSION['error'] = "Booking Not Added successfully";
                    redirect(base_url() . 'list-booking');
                }
            }
        }
        if (isset($_POST['save_new'])) {
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('mobile_1', 'Phone Number', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('date', 'Date', 'required');
            $this->form_validation->set_rules('time', 'Time', 'required');
            $this->form_validation->set_rules('timezone', 'Timezone', 'required');
            $this->form_validation->set_rules('booking_status', 'Booking Status', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Create Booking";
                $data['active3'] = "Active";
                $data['select_name'] = $this->Booking_model->fetchSelectName();
                $this->load->view('include/header', $data);
                $this->load->view('booking/createbooking', $data);
                $this->load->view('include/footer',$data);
            } else {
                $first_name = $this->input->post('first_name');
                $last_name = $this->input->post('last_name');
                $mobile_1 = $this->input->post('mobile_1');
                $mobile_2 = $this->input->post('mobile_2');
                $email = $this->input->post('email');
                $date = $this->input->post('date');
                $timezone = $this->input->post('timezone');
                $booking_status = $this->input->post('booking_status');
                if (empty($this->input->post('time'))) {
                    $time = 0;
                } else {
                    $time = $this->input->post('time');
                }
                $created_date = date('Y-m-d,h:i:s');
                $insert = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'mobile_1' => $mobile_1,
                    'mobile_2' => $mobile_2,
                    'email' => $email,
                    'date'=>   $date,
                    'time' => date('H:i',strtotime($time)),
                    'timezone' => $timezone,
                    'booking_status' => $booking_status,
                    'created_date' => $created_date,
                    'user_id'      => $data['user_detail']->id
                );
                $res = $this->Booking_model->insertData($insert);
                // log activity 
                $insert_id = $this->db->insert_id();
                $user_id           = $data['user_detail']->id;
                $id           = $insert_id;
                $log_title         = "Add Booking  - " . json_encode($insert);
                $log_create        = app_log_manage($user_id, $id, $log_title);
                // log activity ;
                if ($res) {  
                    $this->SendMailaddbooking($first_name,$email,$date,$time,$timezone,$insert_id,$user_id);
                    
                    $_SESSION['done'] = "Booking Added successfully";
                    redirect(base_url() . 'create-booking');
                } else {
                    
                    $_SESSION['error'] = "Booking Not Added successfully";
                    redirect(base_url() . 'create-booking');
                }
            }
        }
    }

    public function SendMailaddbooking($first_name,$email,$date,$time,$timezone,$insert_id,$user_id){
        $active_mail = active_mail()[0];
        $getContactUserinfo = $this->Booking_model->getContactInfo($first_name);
        $getFirstName = $getContactUserinfo[0]->first_name;
        $getLastName = $getContactUserinfo[0]->last_name;
        $getCustomer_id = $getContactUserinfo[0]->customer_id;
        if($timezone==1){
            $getTimezone = "EST";
        }elseif($timezone==2){
            $getTimezone = "CST";
        }elseif($timezone==3){
            $getTimezone = "PST";
        }else{
            $getTimezone = "MST";
        }
         // send email invoice 
         $toName = $getFirstName .$getLastName;
         $toEmail = $email;
         $fromName = $active_mail->sender_name;
         $fromEmail = $active_mail->sender_email;
         $subject = 'Trust Haven Solution Booking Confirmation';
         $htmlMessage = '
         <body marginheight="0" marginwidth="0" topmargin="0" leftmargin="0" style="height: 100% !important; margin: 0; padding: 0; width: 100% !important;min-width: 100%;">
        <table name="bmeMainBody" style="background-color: #fff;" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#fff">
        <tbody>
        <tr>
        <td width="100%" valign="top" align="center">
        <table name="bmeMainColumnParentTable" width="600" cellspacing="0" cellpadding="0" border="0">
        <tbody>
        <tr>
        <td name="bmeMainColumnParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px;">
        <table name="bmeMainColumn" class="" style="max-width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
        <tbody>
        <tr>
        <td class="bmeHolder" name="bmeMainContentParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;" width="100%" valign="top" align="center">
        <table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
        <tbody>
        <tr>
        <td class="blk_container bmeHolder" name="bmeHeader" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: #f2f2f2; padding: 30px 0;" width="100%" valign="top" bgcolor="#34495e" align="center">
        <div id="dv_9" class="blk_wrapper">
        <table class="blk" name="blk_image" width="600" cellspacing="0" cellpadding="0" border="0">
        <tbody>
        <tr>
        <td>
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tbody>
        <tr>
        <td class="bmeImage" style="border-collapse: collapse; padding:20px 20px;" align="center">
        <img src="https://www.trusthavensolution.com/assets/images/ths-logo.png" style="max-width: 237px; display: block; width: 100%;" alt="" width="100%" border="0" />
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        </div>
        <div id="dv_15" class="blk_wrapper">
        <table class="blk" name="blk_text" width="600"cellspacing="0" cellpadding="0" border="0">
        <tbody>
        <tr>
        <td>
        <table class="bmeContainerRow"width="100%" cellspacing="0"cellpadding="0" border="0">
        <tbody>
        <tr>
        <td class="tdPart"valign="top"align="center">
        <tablename ="tblText" style="float:left; background-color:transparent;" width="600" cellspacing="0" cellpadding="0" border="0"align="left">
        <tbody>
        <tr>
        <td name="tblCell" style="padding:15px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left">
        <div style="line-height: 125%; text-align: center;">
        <span style="font-size: 35px; font-family: Poppins, sans-serif; color: #333; line-height: 125%;"><strong>Booking Confirmation</strong></span>
        </div>
        </td>
        </tr>
        </tbody>
        </tablename>
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        </div>
        </td>
        </tr>
        <tr>
        <td class="blk_container bmeHolder" name="bmeBody" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: #fff;" width="100%" valign="top" bgcolor="#34495e" align="center">
        <div id="dv_11" class="blk_wrapper">
        <table class="blk" name="blk_text" width="600" cellspacing="0" cellpadding="0" border="0">
        <tbody>
        <tr>
        <td>
        <table class="bmeContainerRow" width="100%" cellspacing="0" cellpadding="0" border="0">
        <tbody>
        <tr>
        <td class="tdPart" valign="top" align="center">
        <table name="tblText" style="float:left; background-color:transparent;" width="600" cellspacing="0" cellpadding="0" border="0" align="left">
        <tbody>
        <tr>
        <td name="tblCell" style="padding:10px 20px 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left">
        <div style="line-height: 200%;">
        <span style="font-size: 16px; font-family: "Lato", sans-serif; color: #333; line-height: 200%;">Dear '.$getFirstName.' '.$getLastName.'</span>
        </div>
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        </div>
        <div id="dv_13" class="blk_wrapper">
        <table class="blk" name="blk_divider" width="600" cellspacing="0" cellpadding="0" border="0">
        <tbody>
        <tr>
        <td class="tblCellMain" style="padding: 10px 0px;">
        <table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0">
        <tbody>
        <tr>
        <td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left">
        <div style="line-height: 200%;">
        <span style="font-size: 16px; font-family: "Lato", sans-serif; color: #333; line-height: 200%;">This is to inform you that your appointment as on <b>'.$date.'</b>/<b>'.date('h:i A', strtotime($time)).'</b> <b>'.$getTimezone.'</b> is confirmed for your monthly PC checkup.</span>
        </div>
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        <tr>
        <td class="tblCellMain" style="padding: 10px 0px;">
        <table class="tblLine"style="border-top-width: 0px; border-top-style: none; min-width: 1px;"width="100%" cellspacing="0"cellpadding="0" border="0">
        <tbody>
        <tr>
        <td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left">
        <div style="line-height: 200%;">
        <span style="font-size: 16px; font-family: "Lato", sans-serif; color: #333; line-height: 200%;">In case of any changes in date and time please feel free to reply on this email.</span>
        </div>
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        <tr>
        <td class="tblCellMain" style="padding: 10px 0px;"> <table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0">
        <tbody>
        <tr>
        <td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"> <div style="line-height: 200%;">
        <span style="font-size: 16px; font-family: "Lato", sans-serif; color: #333; line-height: 200%;">Our technicians will contact you on the booking date and make sure that you must ask them for your customer ID</span>
        </div>
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        </div>
        <tr>
        <td class="tblCellMain" style="padding: 10px 0px;">
        <table class="tblLine"style="border-top-width: 0px; border-top-style: none; min-width: 1px;"width="100%" cellspacing="0"cellpadding="0" border="0">
        <tbody>
        <tr>
        <td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left">
        <div style="line-height: 200%;">
        <span style="font-size: 16px; font-family: "Lato", sans-serif; color: #333; line-height: 200%;">In case of any further queries please feel free to reach us on our toll free number 1800-235-0122 or you can write us on help@trusthavensolution.com</span>
        </div>
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        <div id="dv_12" class="blk_wrapper">
        <table class="blk" name="blk_button" width="600" cellspacing="0" cellpadding="0" border="0">
        <tbody>
        <tr>
        <td width="20"></td>
        <td align="center">
        <table class="tblContainer" width="100%" cellspacing="0"cellpadding="0" border="0">
        <tbody>
        <tr>
        <td height="20">
        </td>
        </tr>
        <tr>
        <td height="20">
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        <td width="20"></td>
        </tr>
        </tbody>
        </table>
        </div>
        </td>
        </tr>
        <tr>
        <td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: #fff; padding-bottom: 30px;" width="100%" valign="top" bgcolor="#f2f2f2" align="center">
        <div id="dv_10" class="blk_wrapper">
        <table class="blk" name="blk_footer" width="600"cellspacing="0" cellpadding="0" border="0">
        <tbody>
        <tr>
        <td name="tblCell" style="padding:0px 20px;"valign="top" align="left">
        <table width="100%" cellspacing="0"cellpadding="0" border="0">
        <tbody>
        <tr>
        <td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left">
        <span id="spnFooterText" style="font-family: "Lato", sans-serif; font-weight: normal; font-size: 16px; line-height: 140%;">Regards:</span>
        </span>
        </td>
        </tr>
        <tr>
        <td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left">
        <span id="spnFooterText" style="font-family: "Lato", sans-serif; font-weight: normal; font-size: 16px; line-height: 140%;">Trust Haven Solution Inc:</span> </span>
        </td>
        </tr>
        <tr>
        <td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left">
        <span id="spnFooterText" style="font-family: "Lato", sans-serif; font-weight: normal; font-size: 16px; line-height: 140%;"> 1800-235-0122 </span>
        </span>
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        </div>
        </td>
        </tr>
        <tr>
        <td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(52, 73, 94);" width="100%" valign="top" bgcolor="#34495e" align="center">
        <div id="dv_10" class="blk_wrapper">
        <table class="blk" name="blk_footer" width="600" cellspacing="0" cellpadding="0" border="0">
        <tbody>
        <tr>
        <td name="tblCell" style="padding:10px 20px;" valign="top" align="center"  <table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tbody>
        <tr>
        <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center">
        <span id="spnFooterText" style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 23px; line-height: 140%; color: #fff;">Follow Us</span><br /><br />
        </td>
        </tr>
        <tr>
        <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center">
        <a href="https://www.facebook.com/trustheavensolution/" target="_blank"><img src="'.base_url().'facebook.png" alt="facebook" style="max-width:22px"></a>
        <a href="https://www.instagram.com/trusthavensolution/" target="_blank"><img src="'.base_url().'instagram.png" alt="instagram" style="max-width:22px"></a>
        <a href="https://twitter.com/trust_haven1"target="_blank">              <img src="'.base_url().'twitter.png" alt="twitter"style="max-width:22px;padding: 0 5px;"></a>
        </td>
        </tr>
        <tr>
        <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center">
        <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 12px; line-height: 140%; color: #fff;"> &copy; All rights reserved – Trust Haven Solution</p>
        </td>
        </tr>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        </div>
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        </body>	';
         $data = array(
             "sender" => array(
                 "email" => $fromEmail,
                 "name" => $fromName
             ),
             "to" => array(
                 array(
                     "email" => $toEmail,
                     "name" => $toName
                 )
             ),
             "subject" => $subject,
             "htmlContent" => '<html><head></head><body><p>' . $htmlMessage . '</p></p></body></html>'
         );
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, 'https://api.sendinblue.com/v3/smtp/email');
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_POST, 1);
         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
         $headers = array();
         $headers[] = 'Accept: application/json';
         $headers[] = 'Api-Key: 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';
         $headers[] = 'Content-Type: application/json';
         curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
         $result = curl_exec($ch);
         $decode = json_decode($result);
         $last_email_id = $decode->messageId;
         curl_close($ch);
         $emailHistory = array(
            'lead_id' => $insert_id,
            'user_id' => $user_id,
            'sender_id' => $active_mail->id,
            'module_type' => 6,
            'too' => $toEmail,
            'subject' => $subject,
            'message' => $htmlMessage,
            'sent_by_name' => $active_mail->sender_name,
            'sent_by_email' => $active_mail->sender_email,
            'mail_status' => 1,
            'source_by' => 3,
            'lead_type' => 2,
            'created_at' => date('Y-m-d h:i:s'),
            'api_response_id'=> $last_email_id
        );
        $saveEmailhistory = $this->Booking_model->savehistory($emailHistory);
         // send email invoice 
    }

    public function deleteBooking()
    {
        $data['user_detail'] = $this->auth->user_info();
        $delete_id = $this->input->post('leadIds');
        $sess = $this->Booking_model->deleteBooking($delete_id);
        // log activity 
        $insert_id = $delete_id;
        $user_id           = $data['user_detail']->id;
        $id           = $insert_id;
        $log_title         = "Delete Booking id  - " . $id;
        $log_create        = app_log_manage($user_id, $id, $log_title);
        // log activity ;
        if ($sess) {
            $this->session->set_flashdata('done', 'Lead Deleted successfully');
            redirect(base_url() . 'list-lead'); 
        }
    }

    public function detail()
    {
        $id = base64_decode($this->input->get('id'));
        $data['email_list'] = $this->Sendmail_model->getEmailList($id,6);
        $data['email_list_draft'] = $this->Sendmail_model->getEmailList_draft($id,6);
        $data['lead_detail'] = $this->Booking_model->detailBooking($id);
        $this->load->model('Invoice_model');
        $getname = $this->Invoice_model->getInvoiceCustNAme($data['lead_detail'][0]->first_name);
        $data['first_name'] =  $getname[0]->first_name;
        $data['last_name'] = $data['lead_detail'][0]->last_name;
        $data['user_id'] = $data['lead_detail'][0]->user_id;
        $data['user_name'] = $this->Booking_model->GetuserNameContacts($data['user_id']);
        $data['lead_added_name'] = $data['user_name'][0]->name;
        $data['user_detail'] = $this->auth->user_info();
        $data['title'] = "Detail Booking";
        $data['active3'] = "Active";
        $data['select_name'] = $this->Booking_model->fetchSelectName();
        $this->load->view('include/header', $data);
        $this->load->view('booking/updatebooking', $data);
        $this->load->view('include/footer',$data);
    }

    public function addNotes()
    {
        $module_id = trim($this->input->post('module_id'));
        $user_id = trim($this->input->post('user_id'));
        $module_type = trim($this->input->post('module_type'));
        $title = trim($this->input->post('title'));
        $module_name = trim($this->input->post('module_name'));
        $timezone =  date_default_timezone_set("US/Pacific");
        $pstTime =   date("F j, Y, g:i A");
        $created_date = trim($pstTime);
        $insert = array(
            'module_id' => $module_id,
            'user_id' => $user_id,
            'module_type' => $module_type,
            'title' => $title,
            'module_name' => $module_name,
            'created_date' => $created_date
        );
        $data['user_detail'] = $this->auth->user_info();
        $sess = $this->Booking_model->insertNotes($insert);
        // log activity 
        $insert_id = $this->db->insert_id();
        $user_id           = $data['user_detail']->id;
        $id           = $insert_id;
        $log_title         = "Add Notes Lead Module  - " . json_encode($insert);
        $log_create        = app_log_manage($user_id, $id, $log_title);
        // log activity 
        if (!empty($sess)) {
            echo 'Not inserted';
        } else {
            echo 'inserted';
        }
    }

    public function listNotes()
    {
        $first_name = trim($this->input->post('first_name'));
        $module_id = trim($this->input->post('module_id'));
        $module_type = trim($this->input->post('module_type'));
        $data = $this->Booking_model->listNotes($module_id, $module_type , $first_name);
        echo json_encode($data);
    }

    public function deleteNotes()
    {
        $id = trim($this->input->post('id'));
        $module_name = trim($this->input->post('module_name'));
        $sess = $this->Booking_model->deleteNotes($id);
        $data['user_detail'] = $this->auth->user_info();
        // log activity 
        $insert_id = $id;
        $user_id           = $data['user_detail']->id;
        $id           = $insert_id;
        $log_title         = "Delete Notes id Lead Module  - " . $id;
        $log_create        = app_log_manage($user_id, $id, $log_title);
        // log activity 
    }

    public function editNotes()
    {
        $id = trim($this->input->post('id'));
        $message = trim($this->input->post('message'));
        $module_name = trim($this->input->post('module_name'));
        $updated_date = trim($this->input->post('updated_date'));
        $data = array(
            'title' => $message,
            'module_name' => $module_name,
            'created_date' => $updated_date
        );
        $sess = $this->Booking_model->editNotes($id, $data);
        $data['user_detail'] = $this->auth->user_info();
        // log activity 
        $insert_id = $id;
        $user_id           = $data['user_detail']->id;
        $id           = $insert_id;
        $log_title         = "Update Notes Lead Module  - " . json_encode($data);
        $log_create        = app_log_manage($user_id, $id, $log_title);
        // log activity 
        if (!empty($sess)) {
            echo ' updated';
        } else {
            echo ' not updated';
        }
    }

    public function detailPageedit()
    {
        $hidden_id = $this->input->post('hidden_id');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $mobile_1 = $this->input->post('mobile_1');
        $mobile_2 = $this->input->post('mobile_2');
        $email = $this->input->post('email');
        $date = $this->input->post('date');
        $mod_date = date('Y-m-d,h:i:s');
        $time = $this->input->post('time');
        $timezone = $this->input->post('timezone');
        $booking_status = $this->input->post('booking_status');

        $update = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'mobile_1' => $mobile_1,
            'mobile_2' => $mobile_2,
            'email' => $email,
            'date'=>$date,
            'mod_date' => $mod_date,
            'time' => date('H:i',strtotime($time)),
            'timezone' => $timezone,
            'booking_status' => $booking_status
        );
        $sess = $this->Booking_model->updateDetail($hidden_id, $update);
        $data['user_detail'] = $this->auth->user_info();
        // log activity 
        $insert_id = $hidden_id;
        $user_id           = $data['user_detail']->id;
        $id           = $insert_id;
        $log_title         = "Update Booking Detail Page  - " . json_encode($update);
        $log_create        = app_log_manage($user_id, $id, $log_title);
        // log activity ;
        if (!empty($sess)) {
            echo ' updated';
        } else {
            echo ' not updated';
        }
    }
    public function updateBooking()
    {
        $data['user_detail'] = $this->auth->user_info();
        $hidden_id = $this->input->post('hidden_id');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $mobile_1 = $this->input->post('mobile_1');
        $mobile_2 = $this->input->post('mobile_2');
        $email = $this->input->post('email');
        $date = $this->input->post('date');
        $time = $this->input->post('time');
        $timezone = $this->input->post('timezone');
        $booking_status = $this->input->post('booking_status');
        $mod_date = date('Y-m-d,h:i:s');
        $update = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'mobile_1' => $mobile_1,
            'mobile_2' => $mobile_2,
            'email' => $email,
            'date'=>$date,
            'mod_date'=>$mod_date,
            'time' => date('H:i',strtotime($time)),    
            'timezone' => $timezone,
            'booking_status' => $booking_status,
            'user_id'      => $data['user_detail']->id
        );
        $res = $this->Booking_model->updateBookingdata($hidden_id, $update);
        // log activity 
        $insert_id = $hidden_id;
        $user_id           = $data['user_detail']->id;
        $id           = $insert_id;
        $log_title         = "Update Booking  - " . json_encode($update);
        $log_create        = app_log_manage($user_id, $id, $log_title);
        // log activity ;
        if ($res) {  
            
            $_SESSION['done'] = "Booking Updated successfully";
            redirect(base_url() . 'list-booking');
        } else {
            
            $_SESSION['error'] = "Booking Not Updated successfully";
            redirect(base_url() . 'list-booking');
        }
    }

    public function managecolumn()
    {
        $data['user_detail'] = $this->auth->user_info();
        if (empty($this->input->post('first_name_col'))) {
            $first_name_col = 0;
        } else {
            $first_name_col = $this->input->post('first_name_col');
        }
        if (empty($this->input->post('last_name_col'))) {
            $last_name_col = 0;
        } else {
            $last_name_col = $this->input->post('last_name_col');
        }
        if (empty($this->input->post('mobile_1_col'))) {
            $mobile_1_col = 0;
        } else {
            $mobile_1_col = $this->input->post('mobile_1_col');
        }
        if (empty($this->input->post('mobile_2_col'))) {
            $mobile_2_col = 0;
        } else {
            $mobile_2_col = $this->input->post('mobile_2_col');
        }
        if (empty($this->input->post('email_col'))) {
            $email_col = 0;
        } else {
            $email_col = $this->input->post('email_col');
        }
        if (empty($this->input->post('date_col'))) {
            $date_col = 0;
        } else {
            $date_col = $this->input->post('date_col');
        }
        if (empty($this->input->post('time_col'))) {
            $time_col = 0;
        } 
        else {
            $time_col = $this->input->post('time_col');
        }

        if (empty($this->input->post('booking_status_col'))) {
            $booking_status_col = 0;
        } 
        else {
            $booking_status_col = $this->input->post('booking_status_col');
        }
        
        $update = array(
            'first_name_col' => $first_name_col,
            'last_name_col' => $last_name_col,
            'mobile_1_col' => $mobile_1_col,
            'mobile_2_col' => $mobile_2_col,
            'email_col' => $email_col,
            'date_col' => $date_col,
            'booking_status_col' => $booking_status_col,
            'time_col' => $time_col
        );
        $sess = $this->Booking_model->manageColumn($data['user_detail']->id, $update);
        if (!empty($sess)) {
            redirect(base_url('list-booking'));
        } else {
            redirect(base_url('list-booking'));
        }
    }

    public function update()
    {
        $id = base64_decode($this->input->get('id'));
        $data['result'] = $this->Booking_model->getContacts($id);
        $data['select_name'] = $this->Booking_model->fetchSelectName();
        $data['user_detail'] = $this->auth->user_info();
        $data['title'] = "Update Booking";
        $data['active3'] = "Active";
        $this->load->view('include/header', $data);
        $this->load->view('booking/createbooking', $data);
        $this->load->view('include/footer',$data);
    }

    
    public function getValuebooking(){

        $id = $this->input->post('id');
        $column_name = $this->input->post('column_name');
        if($column_name=='txtDate'){
            $column_name = 'date';
        }
        $getvalue = $this->Booking_model->getvaluebooking($id,$column_name)[0];
        echo $getvalue->$column_name;
    
    }

    public function pagination_setup($parms)
    {
        $config['base_url'] = $parms['link'];
        $config['total_rows'] = $parms['total_record'];
        $config['per_page'] = $parms['limit'];
        $config["uri_segment"] = $parms['segment'];

        //config for bootstrap pagination class integration
        // $config['enable_query_strings']= true;
        // $config['use_page_numbers']= true;
        $config['page_query_string'] = true;
        $config['query_string_segment'] = 'page';
        $config['reuse_query_string'] = true;

        $config['full_tag_open'] = '<nav aria-label="Page navigation example " class="float-end"><ul class="pagination float-end pe-2">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_tag_open'] =  '<li class="page-item"> <span class="page-link" href="#">';
        $config['first_tag_close'] = '</span></li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="' . base_url('list-contact') . '">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';

        //config for bootstrap pagination class integration close

        $this->pagination->initialize($config);
        $data['page'] = $parms['segment'];
        $data["links"] = $this->pagination->create_links();
        return $data;
    }
}
