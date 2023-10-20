<?php
defined('BASEPATH')OR exit('direct script no access allowed');

class Massemail extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        $this->load->library('auth');
        if(($this->auth->user_info()->role_id!=1) && ($this->auth->user_info()->role_id!=4) && ($this->auth->user_info()->role_id!=2))
        {
            redirect(base_url());
        }
        $this->load->model('MassemailModel','MassEmail');
        // $this->load->library('pagination');
    }

    public function index(){
        if($this->input->get('scheduled')==1){
            $mass_status = 2;
            $data['active'] = "active";
        }elseif($this->input->get('sent')==1){
            $mass_status = 1;
            $data['active1'] = "active";
        }else{
            $mass_status = 3;
            $data['active2'] = "active";
        }
        $search = $this->input->get('s');
        $data['user_detail'] = $this->auth->user_info();
        $data['role_id']     = $data['user_detail']->role_id;
        $data['name']     = $data['user_detail']->name;
        //  pagination
        $link = base_url() . "sales/list-massemail/";
        $limit = 15;
        $total_record = array();
        $segment = $this->input->get('page'); 
        if($this->input->get('s')){
            $total_record =  $this->MassEmail->schedulemassmail_search_count($mass_status,$search);
            $result = $this->MassEmail->schedulemassmail_search($mass_status,$search,$limit, $segment);
        }else{
            $total_record =  $this->MassEmail->schedulemassmail_count($mass_status);
            $result = $this->MassEmail->schedulemassmail($mass_status,$limit, $segment);
            $data['total_row'] =  $this->MassEmail->schedulemassmail_count_rows($mass_status);
        }
        $parms = array(
            'limit' => $limit,
            'segment' => $segment,
            'total_record' => $total_record,
            'result'       => $result,
            'link'         => $link
        ); 
        $data['pagination'] = $this->pagination_setup($parms);
        $data['segment']    = $segment;
        $data['links']    = $data['pagination']['links'];
        $data['result']   =  $result;
        //  pagination 
        $data['title'] = "List Mass Email";
        $this->load->view('include/header',$data);
        if($this->input->get('scheduled')==1){
        $this->load->view('massemail/schedule_list',$data);
        }elseif($this->input->get('sent')==1){
        $this->load->view('massemail/sent_list',$data);
        }else{
        $this->load->view('massemail/stopped_list',$data);
        }
        $this->load->view('include/footer',$data);
    }

    public function create(){
        $id  = $this->input->get('id');
        $idG =  base64_decode($id);
        $data['ddresult'] = $this->MassEmail->getMassemail($idG)[0];
        if($data['ddresult']->id){
            $data['user_detail'] = $this->auth->user_info();
            $data['role_id']     = $data['user_detail']->role_id;
            $data['name']     = $data['user_detail']->name;
            $data['agent'] = $this->MassEmail->fetchagent();
            $data['email'] = $this->MassEmail->fetchemail();
            $this->load->view('include/header',$data);
            $this->load->view('massemail/updatemass',$data);
            $this->load->view('include/footer',$data);   
        }else{
            $data['user_detail'] = $this->auth->user_info();
            $data['role_id']     = $data['user_detail']->role_id;
            $data['name']     = $data['user_detail']->name;
            $data['agent'] = $this->MassEmail->fetchagent();
            $data['email'] = $this->MassEmail->fetchemail();
            $data['title'] = "Send Mass Email"; 
            $data['active'] = "Active";
            $this->load->view('include/header',$data);
            $this->load->view('massemail/create',$data);
            $this->load->view('include/footer',$data);
        }
    }

    public function savemass(){
        
        if(!isset($_POST['sendmass']) && !isset($_POST['schedulemass'])){
            redirect(base_url('sales/create-massemail'));
        }
        if(isset($_POST['sendmass']) || isset($_POST['schedulemass'])){
            $this->form_validation->set_rules('agent_id','Agent Name','required');
            $this->form_validation->set_rules('template_id','Template','required');
            $this->form_validation->set_rules('from_email','From Email','required|trim');
            $this->form_validation->set_rules('reply_to','Reply To','required|trim');
            
            if($this->form_validation->run()==FALSE){
                $data['title'] = "Send Mass Email";
                $data['active'] = "Active";
                $data['agent'] = $this->MassEmail->fetchagent();
                $data['email'] = $this->MassEmail->fetchemail();
                $data['user_detail'] = $this->auth->user_info();
                $data['role_id']     = $data['user_detail']->role_id;
                $data['name']     = $data['user_detail']->name;
                $this->load->view('include/header',$data);
                $this->load->view('massemail/create',$data);
                $this->load->view('include/footer',$data);
            }else{  
                $agent_id = $this->input->post('agent_id');
                $template_id = $this->input->post('template_id');
                $from_email = $this->input->post('from_email');
                $reply_to = $this->input->post('reply_to');
                $mass_email_type = $this->input->post('mass_email_type');
                $schedule_date = $this->input->post('schedule_date');
                $schedule_time = $this->input->post('schedule_time');
                $data = array();            
                if($mass_email_type==1){
                    $data = array(
                        'agent_id' => $agent_id,
                        'template_id' => $template_id,
                        'from_email' => $from_email,
                        'reply_email' => $reply_to,
                        'mass_email_type' => $mass_email_type,
                        'mass_status' => 1,
                        'schedule_date' => $schedule_date,
                        'schedule_time' => $schedule_time,
                        'created_date' => date('Y-m-d h:i:s')
                    );
                    $this->sentimmedate($data,$agent_id);
                }else{
                    $data = array(
                        'agent_id' => $agent_id,
                        'template_id' => $template_id,
                        'from_email' => $from_email,
                        'reply_email' => $reply_to,
                        'mass_email_type' => $mass_email_type,
                        'mass_status' => 2,
                        'schedule_date' => $schedule_date,
                        'schedule_time' => $schedule_time,  
                        'created_date' => date('Y-m-d h:i:s')
                    );
                    $this->sentMasschedule($data,$agent_id);
                }
                
            }
        }

    }

    public function sentimmedate($data,$agent_id,$hidden_id=''){
        $last_id='';
        $last_id = $hidden_id;   
        $fetchlead = $this->MassEmail->fetchLead($agent_id);
        $this->Sendmassmale($fetchlead,$data,$last_id);
    }

    public function Sendmassmale($fetchlead,$data,$last_id=''){
        if($last_id){
            $sendmass = $this->MassEmail->updateMass($data,$last_id);
            $last_insert_id = $last_id;
            $sendemail = "";
        }else{
            $sendmass = $this->MassEmail->insertMass($data);
            $last_insert_id = $this->db->insert_id();
            $sendemail = "";
            
        }
        for ($i=0; $i <count($fetchlead) ; $i++) { 
         $sendemail = $this->SendMassmultiple($fetchlead[$i],$data);
        //  echo $sendemail; die;
         if($sendemail)
         {
         $this->SendMassmailHistory($last_insert_id,$data,$fetchlead[$i],$sendemail);
         }
        }
        $_SESSION['done'] = 'Send Mass Email successfully';
        redirect(base_url().'sales/create-massemail');
     
    } 


    public function SendMassmultiple($row,$datadetail){
    
        $getsender_id = $this->MassEmail->getsender_id($datadetail['from_email'])[0];
        $getleadinfo = $this->MassEmail->getleadinfo($row->lead_id)[0];
        $senderemail = $datadetail['from_email'];
        $template_id = $datadetail['template_id'];
        $too = $row->email; 
        $fromName = $getsender_id->sender_name;
        $fromEmail = $senderemail;
        if($datadetail['template_id']==1){
            $subject = "Cancellation Mail";
        }
        elseif($datadetail['template_id']==2){
            $subject = "Follow Up Mail";
        }
        else{
            $subject = "Schedule Maintenance Mail";
        }
        $c_subject = $subject;
        $htmlMessage = "";
        $toName = $getleadinfo->name.' '.$getleadinfo->last_name;
        $organization_name= $getsender_id->sender_name;
        $sender_name= $getsender_id->sender_name;
        $shedule_date = date('Y-m-d');
        $organization_phone= $getsender_id->organization_phone;
        if($template_id==1){

            $htmlMessage = '<html lang="en"> <head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"></head> <body style="margin: 0; padding: 100px; background-color: #fffff; font-family: Arial, Helvetica, sans-serif; text-align: center;"> <table align="center" role="presentation" width="40%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td style="background-color: #f2f2f2;text-align: center;padding: 30px 0;"> <img src="https://www.trusthavensolution.com/assets/images/ths-logo.png" alt="Trust Haven Solution Logo" style="margin: 30px auto;width: 200px;"> <h1 style="font-size: 20px; color: #333; font-weight: 600; margin: 0; padding: 5px;">Cancellation of your service contract</h1> </td> </tr> <tr> <td style="background-color: #fff; padding: 20px;"> <p style="font-size: 16px; color: #333; line-height: 1.5;">Hi ' . $toName . ',</p> <p style="font-size: 16px; color: #333; line-height: 1.5;">This is ' . $sender_name . ' from the Billing Team of Trust Haven Solution. I hope you are doing great. This email is to inform you that we received your email regarding the cancellation of the service. We tried to call you to discuss the matter; however, your number is not reachable.</p> <p style="font-size: 16px; color: #333; line-height: 1.5;">Please call us back on our toll-free number ' . $organization_phone . ' as soon as possible so that we can take appropriate action. Alternatively, you can write to us at info@trusthavensolution.com.</p> </td> </tr> <tr> <td style="background-color: #fff;padding: 30px;"> <p style="font-weight: bold;font-size: 16px;line-height: 1.4;">Best wishes:</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">Billing Team</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">' . $organization_name . '</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">' . $organization_phone . '</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">Email: info@trusthavensolution.com</p> </td> </tr> <tr> <td style="background-color: #34495e; text-align: center; padding: 20px;"> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 23px; line-height: 1.4; color: #fff !important;"> Follow Us</p> <a href="https://www.facebook.com/trustheavensolution/" target="_blank"><img src="' . base_url() . 'facebook.png" alt="Facebook" style="max-width:22px"></a> <a href="https://www.instagram.com/trusthavensolution/" target="_blank"><img src="' . base_url() . 'instagram.png" alt="Instagram" style="max-width:22px"></a> <a href="https://twitter.com/trust_haven1" target="_blank"><img src="' . base_url() . 'twitter.png" alt="Twitter" style="max-width:22px; padding: 0 5px;"></a> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 12px; line-height: 1.4; color: #fff !important;"> © All rights reserved – Trust Haven Solution</p> </td> </tr> </tbody> </table> </body> </html>';

        } else if($template_id==2){ 

            $htmlMessage = '<html lang="en"><head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"></head> <body style="margin: 0; padding: 0; background-color: #fffff; font-family: Arial, Helvetica, sans-serif;"> <table align="center" role="presentation" width="40%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="background-color: #f2f2f2;text-align: center;padding: 30px 0;"> <img src="https://www.trusthavensolution.com/assets/images/ths-logo.png" alt="Trust Haven Solution Logo" style="margin: 30px auto;width: 200px;">  <h1 style="font-size: 20px; color: #333; font-weight: 600; margin: 0; padding: 5px;">Followup</h1></td> </tr> <tr> <td style="background-color: #fff; padding: 20px;"> <p style="font-size: 16px; color: #333; line-height: 1.5;">Dear ' . $toName . ',</p> <p style="font-size: 16px; color: #333; line-height: 1.5;">This is Kevin from Trust Haven Solution. I hope you are doing great. This is just to check if everything is working fine with your computer since we have fixed it for you. In case if you need any kind of help please do call us on our toll-free number ' . $organization_phone . ' or you can write us back to this email.</p> </td> </tr> <tr> <td style="background-color: #fff; padding: 20px;"> <p style="font-size: 16px; color: #333; line-height: 1.5;">Your feedback is valuable to us, so we will be waiting for your valuable response.</p> </td> </tr> <tr> <td style="background-color: #ffffff;padding: 30px;"> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">Thanks &amp; Regards:</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">' . $organization_name . '</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">' . $organization_phone . '</p> </td> </tr> <tr> <td style="background-color: #34495e; text-align: center; padding: 20px;"> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 23px; line-height: 1.4; color: #fff;">Follow Us</p> <a href="https://www.facebook.com/trustheavensolution/" target="_blank"><img src="' . base_url() . 'facebook.png" alt="facebook" style="max-width:22px"></a> <a href="https://www.instagram.com/trusthavensolution/" target="_blank"><img src="' . base_url() . 'instagram.png" alt="instagram" style="max-width:22px"></a> <a href="https://twitter.com/trust_haven1" target="_blank"><img src="' . base_url() . 'twitter.png" alt="twitter" style="max-width:22px; padding: 0 5px;"></a> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 12px; line-height: 1.4; color: #fff;">© All rights reserved – Trust Haven Solution</p> </td> </tr> </tbody></table> </body></html>';
       
        } else if($template_id==3){ 
            
            $htmlMessage = '<!DOCTYPE html> <html lang="en"> <head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> </head> <body style="margin: 0; padding: 0; background-color: #ffff; font-family: Arial, Helvetica, sans-serif;"> <table align="center" role="presentation" width="40%" cellspacing="0" cellpadding="0" border="0"> <tr> <td style="background-color: #f2f2f2;text-align: center;padding: 30px 0;"> <img src="https://www.trusthavensolution.com/assets/images/ths-logo.png" alt="Trust Haven Solution Logo" style="margin: 30px auto;width: 200px;"> <h1 style="font-size: 20px; color: #333; font-weight: 600; margin: 0;">Scheduled Maintenance</h1> </td> </tr> <tr> <td style="background-color: #fff; padding: 20px;"> <p style="font-size: 16px; color: #333; line-height: 1.5;">Dear ' . $toName . ',</p> <p style="font-size: 16px; color: #333; line-height: 1.5;">This is to inform you that we will not be able to serve you on ' . $shedule_date . ' due to the Scheduled Maintenance of our internal systems. </p> <p style="font-size: 16px; color: #333; line-height: 1.5;">We apologize for the inconvenience, but in case of emergency, you can leave us a voice message or write us on our support email and we will get back to you ASAP.</p> </td> </tr> <tr> <td style="background-color: #fff; padding: 20px;"> <p style="font-size: 16px; color: #333; line-height: 1.5;">In case of any further queries, please feel free to reach us on our toll-free number ' . $organization_phone . ' or you can write us at help@trusthavensolution.com</p> </td> </tr> <tr> <td style="background-color: #ffffff; padding: 30px;"> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">Regards:</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">' . $organization_name . '</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">' . $organization_phone . '</p> </td> </tr> <tr> <td style="background-color: #34495e; text-align: center; padding: 20px;"> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 23px; line-height: 1.4; color: #fff;"> Follow Us</p> <a href="https://www.facebook.com/trustheavensolution/" target="_blank"><img src="' . base_url() . 'facebook.png" alt="facebook" style="max-width:22px"></a> <a href="https://www.instagram.com/trusthavensolution/" target="_blank"><img src="' . base_url() . 'instagram.png" alt="instagram" style="max-width:22px"></a> <a href="https://twitter.com/trust_haven1" target="_blank"><img src="' . base_url() . 'twitter.png" alt="twitter" style="max-width:22px; padding: 0 5px;"></a> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 12px; line-height: 1.4; color: #fff;"> &copy; All rights reserved – Trust Haven Solution</p> </td> </tr> </table> </body> </html>';
        }
        $data = array(
            "sender" => array(
                "email" => $fromEmail,
                "name" => $fromName,
            ),
            "to" => array(
                array(
                    "email" => $too
                )
            ),
            "replyTo" => array(
                "email" => $datadetail['reply_email'],
                "name" => $getsender_id->sender_name
            ),
            "subject" => $c_subject,
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
        return $last_email_id;
        curl_close($ch);
   }

   public function SendMassmailHistory($last_insert_id,$data,$datadetail,$last_email_id){

    // create tbl_email history 
    $getsender_id = $this->MassEmail->getsender_id($data['from_email'])[0];
    if($data['template_id']==1){
        $template_name = "Cancellation";
    }elseif($data['template_id']==2){
        $template_name = "Follow Up";
    }else{
        $template_name = "Schedule";
    }
    $emailHistory = array(
        'lead_id' => $datadetail->lead_id,
        'user_id' => $datadetail->user_id,
        'sender_id' => $getsender_id->id,
        'module_type' => 1,
        'too' => $datadetail->email,
        'subject' => $template_name,
        'message' => $template_name,
        'sent_by_name' => $getsender_id->sender_name,
        'sent_by_email' => $getsender_id->sender_email,
        'mail_status' => 1,
        'source_by' => 2,
        'lead_type' => 1,
        'created_at' => date('Y-m-d h:i:s'),
        'api_response_id' =>$last_email_id
    );
    $savehistory = $this->MassEmail->savehistory($emailHistory);
    // create tbl_email history 

    $last_id = $last_insert_id;
    $agent_id = $datadetail->user_id;
    // $fetchlead = $this->MassEmail->fetchLead($agent_id);
    $masshistory = $this->MassEmail->masshistory($last_id,$agent_id,$datadetail,$last_email_id);
   }


   public function sentMasschedule($data){
        $sendmass = $this->MassEmail->insertMass($data);
        if($sendmass){
        $_SESSION['done'] = 'Schedule Mass Email Created successfully';
        redirect(base_url().'sales/create-massemail');
        }else{
        $_SESSION['error'] = 'Schedule Mass Email Not Created successfully';
        redirect(base_url().'sales/create-massemail');
        }
    }

  public function schedule_mail(){
   
    $current_date = date('Y-m-d');  
    $current_time = date('H:i');
    $fetchschedule = $this->MassEmail->fetchSchedule($current_date,$current_time)[0];
    // prx($fetchschedule);
    $agent_id =  $fetchschedule->agent_id;
    $fetchlead = $this->MassEmail->fetchLead($agent_id);

    for ($i=0; $i < count($fetchlead) ; $i++) { 
        $last_email_id = $this->sendScheduleMail($fetchlead[$i],$fetchschedule);
        $this->MassEmail->saveschedulehistory($fetchlead[$i],$fetchschedule,$last_email_id);
        // save email history tbl_email 
        $getsender_id = $this->MassEmail->getsender_id($fetchschedule->from_email)[0];
        if($fetchschedule->template_id==1){
            $template_name = "Cancellation";
        }elseif($fetchschedule->template_id==2){
            $template_name = "Follow Up";
        }else{
            $template_name = "Schedule";
        }
        $emailHistory = array(
            'lead_id' => $fetchlead[$i]->lead_id,
            'user_id' => $fetchlead[$i]->user_id,
            'sender_id' => $getsender_id->id,
            'module_type' => 1,
            'too' => $fetchlead[$i]->email,
            'subject' => $template_name,
            'message' => $template_name,
            'sent_by_name' => $getsender_id->sender_name,
            'sent_by_email' => $fetchschedule->from_email,
            'mail_status' => 1,
            'source_by' => 2,
            'lead_type' => 1,
            'created_at' => date('Y-m-d h:i:s'),
            'api_response_id'=> $last_email_id
        );
        $saveEmailhistory = $this->MassEmail->savehistory($emailHistory);
        // save email history tbl_email 

    }
    $this->MassEmail->updateSchedule($fetchschedule);
    
  }

  public function sendScheduleMail($fetchlead,$fetchschedule){ 
    
    $getsender_id = $this->MassEmail->getsender_id($fetchschedule->from_email)[0];
    $senderemail = $fetchschedule->from_email;
    $template_id = $fetchschedule->template_id;
    $too = $fetchlead->email; 
    $fromName = $getsender_id->sender_name;
    $fromEmail = $senderemail;
    if($fetchschedule->template_id==1){
        $subject = "Cancellation Mail";
    }
    elseif($fetchschedule->template_id==2){
        $subject = "Follow Up Mail";
    }
    else{
        $subject = "Schedule Maintenance Mail";
    }
    $c_subject = $subject;
    $htmlMessage = "";
    $organization_name=$getsender_id->sender_name;
    $sender_name= $getsender_id->sender_name;
    $shedule_date = date('Y-m-d');
    $organization_phone="1-800-235-0122";
    $getleadinfo = $this->MassEmail->getleadinfo($fetchlead->lead_id)[0];
    $toName = $getleadinfo->name.' '.$getleadinfo->last_name;
    
    if($template_id==1){

        $htmlMessage = '<html lang="en"> <head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"></head> <body style="margin: 0; padding: 100px; background-color: #fffff; font-family: Arial, Helvetica, sans-serif; text-align: center;"> <table align="center" role="presentation" width="40%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td style="background-color: #f2f2f2;text-align: center;padding: 30px 0;"> <img src="https://www.trusthavensolution.com/assets/images/ths-logo.png" alt="Trust Haven Solution Logo" style="margin: 30px auto;width: 200px;"> <h1 style="font-size: 20px; color: #333; font-weight: 600; margin: 0; padding: 5px;">Cancellation of your service contract</h1> </td> </tr> <tr> <td style="background-color: #fff; padding: 20px;"> <p style="font-size: 16px; color: #333; line-height: 1.5;">Hi ' . $toName . ',</p> <p style="font-size: 16px; color: #333; line-height: 1.5;">This is ' . $sender_name . ' from the Billing Team of Trust Haven Solution. I hope you are doing great. This email is to inform you that we received your email regarding the cancellation of the service. We tried to call you to discuss the matter; however, your number is not reachable.</p> <p style="font-size: 16px; color: #333; line-height: 1.5;">Please call us back on our toll-free number ' . $organization_phone . ' as soon as possible so that we can take appropriate action. Alternatively, you can write to us at info@trusthavensolution.com.</p> </td> </tr> <tr> <td style="background-color: #fff;padding: 30px;"> <p style="font-weight: bold;font-size: 16px;line-height: 1.4;">Best wishes:</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">Billing Team</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">' . $organization_name . '</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">' . $organization_phone . '</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">Email: info@trusthavensolution.com</p> </td> </tr> <tr> <td style="background-color: #34495e; text-align: center; padding: 20px;"> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 23px; line-height: 1.4; color: #fff !important;"> Follow Us</p> <a href="https://www.facebook.com/trustheavensolution/" target="_blank"><img src="' . base_url() . 'facebook.png" alt="Facebook" style="max-width:22px"></a> <a href="https://www.instagram.com/trusthavensolution/" target="_blank"><img src="' . base_url() . 'instagram.png" alt="Instagram" style="max-width:22px"></a> <a href="https://twitter.com/trust_haven1" target="_blank"><img src="' . base_url() . 'twitter.png" alt="Twitter" style="max-width:22px; padding: 0 5px;"></a> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 12px; line-height: 1.4; color: #fff !important;"> © All rights reserved – Trust Haven Solution</p> </td> </tr> </tbody> </table> </body> </html>';

    } else if($template_id==2){ 

        $htmlMessage = '<html lang="en"><head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"></head> <body style="margin: 0; padding: 0; background-color: #fffff; font-family: Arial, Helvetica, sans-serif;"> <table align="center" role="presentation" width="40%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="background-color: #f2f2f2;text-align: center;padding: 30px 0;"> <img src="https://www.trusthavensolution.com/assets/images/ths-logo.png" alt="Trust Haven Solution Logo" style="margin: 30px auto;width: 200px;">  <h1 style="font-size: 20px; color: #333; font-weight: 600; margin: 0; padding: 5px;">Followup</h1></td> </tr> <tr> <td style="background-color: #fff; padding: 20px;"> <p style="font-size: 16px; color: #333; line-height: 1.5;">Dear ' . $toName . ',</p> <p style="font-size: 16px; color: #333; line-height: 1.5;">This is Kevin from Trust Haven Solution. I hope you are doing great. This is just to check if everything is working fine with your computer since we have fixed it for you. In case if you need any kind of help please do call us on our toll-free number ' . $organization_phone . ' or you can write us back to this email.</p> </td> </tr> <tr> <td style="background-color: #fff; padding: 20px;"> <p style="font-size: 16px; color: #333; line-height: 1.5;">Your feedback is valuable to us, so we will be waiting for your valuable response.</p> </td> </tr> <tr> <td style="background-color: #ffffff;padding: 30px;"> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">Thanks &amp; Regards:</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">' . $organization_name . '</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">' . $organization_phone . '</p> </td> </tr> <tr> <td style="background-color: #34495e; text-align: center; padding: 20px;"> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 23px; line-height: 1.4; color: #fff;">Follow Us</p> <a href="https://www.facebook.com/trustheavensolution/" target="_blank"><img src="' . base_url() . 'facebook.png" alt="facebook" style="max-width:22px"></a> <a href="https://www.instagram.com/trusthavensolution/" target="_blank"><img src="' . base_url() . 'instagram.png" alt="instagram" style="max-width:22px"></a> <a href="https://twitter.com/trust_haven1" target="_blank"><img src="' . base_url() . 'twitter.png" alt="twitter" style="max-width:22px; padding: 0 5px;"></a> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 12px; line-height: 1.4; color: #fff;">© All rights reserved – Trust Haven Solution</p> </td> </tr> </tbody></table> </body></html>';
   
    } else if($template_id==3){ 
        
        $htmlMessage = '<!DOCTYPE html> <html lang="en"> <head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> </head> <body style="margin: 0; padding: 0; background-color: #ffff; font-family: Arial, Helvetica, sans-serif;"> <table align="center" role="presentation" width="40%" cellspacing="0" cellpadding="0" border="0"> <tr> <td style="background-color: #f2f2f2;text-align: center;padding: 30px 0;"> <img src="https://www.trusthavensolution.com/assets/images/ths-logo.png" alt="Trust Haven Solution Logo" style="margin: 30px auto;width: 200px;"> <h1 style="font-size: 20px; color: #333; font-weight: 600; margin: 0;">Scheduled Maintenance</h1> </td> </tr> <tr> <td style="background-color: #fff; padding: 20px;"> <p style="font-size: 16px; color: #333; line-height: 1.5;">Dear ' . $toName . ',</p> <p style="font-size: 16px; color: #333; line-height: 1.5;">This is to inform you that we will not be able to serve you on ' . $shedule_date . ' due to the Scheduled Maintenance of our internal systems. </p> <p style="font-size: 16px; color: #333; line-height: 1.5;">We apologize for the inconvenience, but in case of emergency, you can leave us a voice message or write us on our support email and we will get back to you ASAP.</p> </td> </tr> <tr> <td style="background-color: #fff; padding: 20px;"> <p style="font-size: 16px; color: #333; line-height: 1.5;">In case of any further queries, please feel free to reach us on our toll-free number ' . $organization_phone . ' or you can write us at help@trusthavensolution.com</p> </td> </tr> <tr> <td style="background-color: #ffffff; padding: 30px;"> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">Regards:</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">' . $organization_name . '</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">' . $organization_phone . '</p> </td> </tr> <tr> <td style="background-color: #34495e; text-align: center; padding: 20px;"> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 23px; line-height: 1.4; color: #fff;"> Follow Us</p> <a href="https://www.facebook.com/trustheavensolution/" target="_blank"><img src="' . base_url() . 'facebook.png" alt="facebook" style="max-width:22px"></a> <a href="https://www.instagram.com/trusthavensolution/" target="_blank"><img src="' . base_url() . 'instagram.png" alt="instagram" style="max-width:22px"></a> <a href="https://twitter.com/trust_haven1" target="_blank"><img src="' . base_url() . 'twitter.png" alt="twitter" style="max-width:22px; padding: 0 5px;"></a> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 12px; line-height: 1.4; color: #fff;"> &copy; All rights reserved – Trust Haven Solution</p> </td> </tr> </table> </body> </html>';
    $data = array(
        "sender" => array(
            "email" => $fromEmail,
            "name" => $fromName
        ),
        "to" => array(
            array(
                "email" => $too
            )
        ),
        "replyTo" => array(
            "email" => $fetchschedule->reply_mail,
            "name" => $getsender_id->sender_name
        ),
        "subject" => $c_subject,
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
    $last_email_id = json_decode($result);
    $last_email  =  $last_email_id->messageId;
    return $last_email;
    curl_close($ch); 
    
  }
}

  public function selectedusermail(){
    $template_id = $this->input->post('template_id');
    $senderemail = $this->input->post('sender_email');
    $email_id = $this->input->post('email_id');
    $module_type = $this->input->post('module_type');
    $sender_id = $this->input->post('sender_id');
    $user_id = $this->input->post('user_id');
    $sent_by_name = $this->input->post('sent_by_name');
    $sent_by_email = $this->input->post('sent_by_email');
    $data = $this->MassEmail->getselectedlead($email_id);
    //$insert_data = $this->MassEmail->Insertpopup($data,$template_id,$senderemail,$module_type,$sender_id,$user_id,$sent_by_name,$sent_by_email);
    for ($i=0; $i < count($data) ; $i++) { 
        $this->selectsendmail($data[$i],$template_id,$senderemail,$module_type);
    }
    $_SESSION['done'] = 'Email Send successfully';
    redirect(base_url().'sales/');
    // if($insert_data){
    //     $_SESSION['done'] = 'Email Send successfully';
    //     redirect(base_url().'sales/');
    // }
    // else{
    //     $_SESSION['error'] = 'Email Not Send successfully';
    //     redirect(base_url().'sales/');
    // }
  }


  public function selectsendmail($row,$template_id,$senderemail,$module_type){
    
    $getsender_id = $this->MassEmail->getsender_id($senderemail)[0];
    $senderemail = $senderemail;
    $template_id = $template_id;
    $too = $row->email; 
    $firstname = $row->name;
    $lastname = $row->last_name;
    $fromName = $getsender_id->sender_name;
    $fromEmail = $senderemail;
    if($template_id==1){
        $subject = "Cancellation Mail";
    }
    elseif($template_id==2){
        $subject = "Follow Up Mail";
    }
    else{
        $subject = "Schedule Maintenance Mail";
    }
    $c_subject = $subject;
    $htmlMessage = "";
    $shedule_date = '';
    $organization_phone= $getsender_id->organization_phone;
    if($template_id==1){
        $htmlMessage = '<html lang="en"> <head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"></head> <body style="margin: 0; padding: 100px; background-color: #fffff; font-family: Arial, Helvetica, sans-serif; text-align: center;"> <table align="center" role="presentation" width="40%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td style="background-color: #f2f2f2;text-align: center;padding: 30px 0;"> <img src="https://www.trusthavensolution.com/assets/images/ths-logo.png" alt="Trust Haven Solution Logo" style="margin: 30px auto;width: 200px;"> <h1 style="font-size: 20px; color: #333; font-weight: 600; margin: 0; padding: 5px;">Cancellation of your service contract</h1> </td> </tr> <tr> <td style="background-color: #fff; padding: 20px;"> <p style="font-size: 16px; color: #333; line-height: 1.5;">Hi '.$firstname.' '.$lastname.',</p> <p style="font-size: 16px; color: #333; line-height: 1.5;">This is ' . $fromName . ' from the Billing Team of Trust Haven Solution. I hope you are doing great. This email is to inform you that we received your email regarding the cancellation of the service. We tried to call you to discuss the matter; however, your number is not reachable.</p> <p style="font-size: 16px; color: #333; line-height: 1.5;">Please call us back on our toll-free number ' . $organization_phone . ' as soon as possible so that we can take appropriate action. Alternatively, you can write to us at info@trusthavensolution.com.</p> </td> </tr> <tr> <td style="background-color: #fff;padding: 30px;"> <p style="font-weight: bold;font-size: 16px;line-height: 1.4;">Best wishes:</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">Billing Team</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">' . $fromName . '</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">' . $organization_phone . '</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">Email: info@trusthavensolution.com</p> </td> </tr> <tr> <td style="background-color: #34495e; text-align: center; padding: 20px;"> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 23px; line-height: 1.4; color: #fff !important;"> Follow Us</p> <a href="https://www.facebook.com/trustheavensolution/" target="_blank"><img src="' . base_url() . 'facebook.png" alt="Facebook" style="max-width:22px"></a> <a href="https://www.instagram.com/trusthavensolution/" target="_blank"><img src="' . base_url() . 'instagram.png" alt="Instagram" style="max-width:22px"></a> <a href="https://twitter.com/trust_haven1" target="_blank"><img src="' . base_url() . 'twitter.png" alt="Twitter" style="max-width:22px; padding: 0 5px;"></a> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 12px; line-height: 1.4; color: #fff !important;"> © All rights reserved – Trust Haven Solution</p> </td> </tr> </tbody> </table> </body> </html>';
            
    } else if($template_id==2){ 

        $htmlMessage = '<html lang="en"><head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"></head> <body style="margin: 0; padding: 0; background-color: #fff; font-family: Arial, Helvetica, sans-serif;"> <table align="center" role="presentation" width="40%" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="background-color: #f2f2f2;text-align: center;padding: 30px 0;"> <img src="https://www.trusthavensolution.com/assets/images/ths-logo.png" alt="Trust Haven Solution Logo" style="margin: 30px auto;width: 200px;">  <h1 style="font-size: 20px; color: #333; font-weight: 600; margin: 0; padding: 5px;">Followup</h1></td> </tr> <tr> <td style="background-color: #fff; padding: 20px;"> <p style="font-size: 16px; color: #333; line-height: 1.5;">Dear ' . $firstname . ' ' . $lastname . ',</p> <p style="font-size: 16px; color: #333; line-height: 1.5;">This is Kevin from Trust Haven Solution. I hope you are doing great. This is just to check if everything is working fine with your computer since we have fixed it for you. In case if you need any kind of help please do call us on our toll-free number ' . $organization_phone . ' or you can write us back to this email.</p> </td> </tr> <tr> <td style="background-color: #fff; padding: 20px;"> <p style="font-size: 16px; color: #333; line-height: 1.5;">Your feedback is valuable to us, so we will be waiting for your valuable response.</p> </td> </tr> <tr> <td style="background-color: #ffffff;padding: 30px;"> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">Thanks &amp; Regards:</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">' . $fromName . '</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">' . $organization_phone . '</p> </td> </tr> <tr> <td style="background-color: #34495e; text-align: center; padding: 20px;"> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 23px; line-height: 1.4; color: #fff;">Follow Us</p> <a href="https://www.facebook.com/trustheavensolution/" target="_blank"><img src="' . base_url() . 'facebook.png" alt="facebook" style="max-width:22px"></a> <a href="https://www.instagram.com/trusthavensolution/" target="_blank"><img src="' . base_url() . 'instagram.png" alt="instagram" style="max-width:22px"></a> <a href="https://twitter.com/trust_haven1" target="_blank"><img src="' . base_url() . 'twitter.png" alt="twitter" style="max-width:22px; padding: 0 5px;"></a> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 12px; line-height: 1.4; color: #fff;">© All rights reserved – Trust Haven Solution</p> </td> </tr> </tbody></table> </body></html>';
   
    } else if($template_id==3){ 
        
        $htmlMessage = '<!DOCTYPE html> <html lang="en"> <head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> </head> <body style="margin: 0; padding: 0; background-color: #fff; font-family: Arial, Helvetica, sans-serif;"> <table align="center" role="presentation" width="40%" cellspacing="0" cellpadding="0" border="0"> <tr> <td style="background-color: #f2f2f2;text-align: center;padding: 30px 0;"> <img src="https://www.trusthavensolution.com/assets/images/ths-logo.png" alt="Trust Haven Solution Logo" style="margin: 30px auto;width: 200px;"> <h1 style="font-size: 20px; color: #333; font-weight: 600; margin: 0;">Scheduled Maintenance</h1> </td> </tr> <tr> <td style="background-color: #fff; padding: 20px;"> <p style="font-size: 16px; color: #333; line-height: 1.5;">Dear ' . $firstname . ' ' . $lastname . ',</p> <p style="font-size: 16px; color: #333; line-height: 1.5;">This is to inform you that we will not be able to serve you on ' . $shedule_date . ' due to the Scheduled Maintenance of our internal systems. </p> <p style="font-size: 16px; color: #333; line-height: 1.5;">We apologize for the inconvenience, but in case of emergency, you can leave us a voice message or write us on our support email and we will get back to you ASAP.</p> </td> </tr> <tr> <td style="background-color: #fff; padding: 20px;"> <p style="font-size: 16px; color: #333; line-height: 1.5;">In case of any further queries, please feel free to reach us on our toll-free number ' . $organization_phone . ' or you can write us at help@trusthavensolution.com</p> </td> </tr> <tr> <td style="background-color: #ffffff; padding: 30px;"> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">Regards:</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">' . $fromName . '</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">' . $organization_phone . '</p> </td> </tr> <tr> <td style="background-color: #34495e; text-align: center; padding: 20px;"> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 23px; line-height: 1.4; color: #fff;"> Follow Us</p> <a href="https://www.facebook.com/trustheavensolution/" target="_blank"><img src="' . base_url() . 'facebook.png" alt="facebook" style="max-width:22px"></a> <a href="https://www.instagram.com/trusthavensolution/" target="_blank"><img src="' . base_url() . 'instagram.png" alt="instagram" style="max-width:22px"></a> <a href="https://twitter.com/trust_haven1" target="_blank"><img src="' . base_url() . 'twitter.png" alt="twitter" style="max-width:22px; padding: 0 5px;"></a> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 12px; line-height: 1.4; color: #fff;"> &copy; All rights reserved – Trust Haven Solution</p> </td> </tr> </table> </body> </html>';
    }
    $data = array(
        "sender" => array(
            "email" => $fromEmail,
            "name" => $fromName
        ),
        "to" => array(
            array(
                "email" => $too
            )
        ),
        "subject" => $c_subject,
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
        'lead_id' => $row->lead_id,
        'user_id' => $row->user_id,
        'sender_id' => $getsender_id->id,
        'module_type' => $module_type,
        'too' => $row->email,
        'subject' => $subject,
        'message' => $subject,
        'sent_by_name' => $getsender_id->sender_name,
        'sent_by_email' => $getsender_id->sender_email,
        'mail_status' => 1,
        'source_by' => 4,
        'lead_type' => 1,
        'created_at' => date('Y-m-d h:i:s'),
        'api_response_id'=> $last_email_id
    );
    $saveEmailhistory = $this->MassEmail->savehistory($emailHistory);
  }

  public function updatemass(){
    if(!isset($_POST['sendmass']) && !isset($_POST['schedulemass'])){
        redirect(base_url('sales/create-massemail'));
    }
    if(isset($_POST['sendmass']) || isset($_POST['schedulemass'])){
            $hidden_id = $this->input->post('hidden_id');
            $agent_id = $this->input->post('agent_id');
            $template_id = $this->input->post('template_id');
            $from_email = $this->input->post('from_email');
            $reply_to = $this->input->post('reply_to');
            $mass_email_type = $this->input->post('mass_email_type');
            $mass_status = $this->input->post('mass_status');
            $schedule_date = $this->input->post('schedule_date');
            $schedule_time = $this->input->post('schedule_time');
            $data = array();            
            if($mass_email_type==1){
                $data = array(
                    'agent_id' => $agent_id,
                    'template_id' => $template_id,
                    'from_email' => $from_email,
                    'reply_email' => $reply_to,
                    'mass_email_type' => $mass_email_type,
                    'mass_status' => 1,
                    'schedule_date' => $schedule_date,
                    'schedule_time' => $schedule_time,
                    'created_date' => date('Y-m-d h:i:s')
                );
                $this->sentimmedate($data,$agent_id,$hidden_id);
            }elseif($mass_status==1){
            $data = array(
                'agent_id' => $agent_id,
                'template_id' => $template_id,
                'from_email' => $from_email,
                'reply_email' => $reply_to,
                'mass_email_type' => $mass_email_type,
                'mass_status' => 1,
                'schedule_date' => $schedule_date,
                'schedule_time' => $schedule_time,
                'created_date' => date('Y-m-d h:i:s')
            );
            $this->sentimmedate($data,$agent_id,$hidden_id);
            }
            else{
                $data = array(
                    'agent_id' => $agent_id,
                    'template_id' => $template_id,
                    'from_email' => $from_email,
                    'reply_email' => $reply_to,
                    'mass_email_type' => 2,
                    'mass_status' => $mass_status,
                    'schedule_date' => $schedule_date,
                    'schedule_time' => $schedule_time,  
                    'created_date' => date('Y-m-d h:i:s')
                );
                // prx($data);
                $update = $this->MassEmail->updatemassemail($hidden_id,$data);
                if($update){
                    $_SESSION['done'] = 'Email Update Successfully!';
                    redirect(base_url().'sales/list-massemail/');
                }else{
                    $_SESSION['error'] = 'Email Not Updated!';
                    redirect(base_url().'sales/list-massemail/');
                }
            }
            
        }
  }

  

  public function pagination_setup($parms)
  { 

    //   prx($parms);
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

      $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="' . base_url('sales/list-massemail/') . '">';
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
