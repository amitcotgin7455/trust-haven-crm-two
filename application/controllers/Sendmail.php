<?php
defined('BASEPATH') or exit('direct script no access allowed');

class Sendmail extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        if(($this->auth->user_info()->role_id!=1) && ($this->auth->user_info()->role_id!=4))
        {
            redirect(base_url());
        }
        $this->load->model('Sendmail_model', 'SendModel');
        //$this->load->model('Security_model', 'SecurityModel');
        //$this->load->model('User_model', 'UserList');
        //$this->load->model('Invoice_model');
    }

    //fucntion
    public function getMail(){
        $userID = $this->input->post('mail_user');
        $pageName = $this->input->post('mail_page');
        $mailModule = $this->input->post('mail_module');
        $mail_status = $this->input->post('mail_status');
        $data['getdraft_mail'] = $this->SendModel->getdraftmail($userID)[0];
        $data['activeSender'] = active_mail();
        if($mailModule==4){
            $data['mailModule'] = $this->input->post('mail_module');
            if($data['getdraft_mail']->lead_id){
            $data['draft_get_name'] = $this->SendModel->getuserDetailContact($data['getdraft_mail']->lead_id)[0];
            }
            $data['user_detail'] = $this->SendModel->getuserDetailContact($userID);
            $data['first_name'] = $data['user_detail'][0]->first_name;
        } elseif($mailModule==5){
            $data['mailModule'] = $this->input->post('mail_module');
            if($data['getdraft_mail']->lead_id){
                $data['draft_get_name'] = $this->SendModel->getuserDetailContact($data['getdraft_mail']->lead_id)[0];
            }
            $data['user_detail'] = $this->SendModel->getuserDetailContact($userID);
            $data['first_name'] = $data['user_detail'][0]->first_name;
        } else{
            $data['mailModule'] = $this->input->post('mail_module');
            $data['user_detail'] = $this->SendModel->getuserDetail($userID);
            $getID = $data['user_detail'][0]->first_name;
            if($data['getdraft_mail']->lead_id){
            $data['draft_get_name'] = $this->SendModel->getfirstName($data['getdraft_mail']->lead_id)[0];
            }
            $data['get_first_name'] = $this->SendModel->getfirstName($getID);
            $data['first_name'] = $data['get_first_name'][0]->first_name;
        }
        if($mail_status==2){
        $this->load->view('sendmail/draftmailform',$data);
        }else{
        $this->load->view('sendmail/index',$data);
        }
    }

    //sendmail-attachments
    public function mail_attachment() {
        $config['upload_path'] = 'attachment/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        $new_name = time() . $_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            $response = array('image_name' => null, 'message' => $error);
        }else{
            $data = array('upload_data' => $this->upload->data());
            $response = array('image_name' => $this->upload->data('file_name'), 'message' => 'File uploaded successfully');
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    //sendmail 
    public function sendmail()
    {
        $user_info = $this->auth->user_info();
        $hidden_id = $this->input->post('hidden_id');
        $senderemail = $this->input->post('senderemail');
        $sender_name = $this->input->post('sender_name');
        $attachment = $this->input->post('attachment');
        $sender_id = $this->input->post('sender_id');
        $lead_id = $this->input->post('lead_id');
        $module_name = $this->input->post('module_name');
        $too = $this->input->post('toemail');
        $cc = $this->input->post('emailtocc');
        $bcc = $this->input->post('emailtobcc');   
        $subject = $this->input->post('emailsubject');
        $message = $this->input->post('emailmessage');
        $attached_file = $this->input->post('attachment');
        $fileName =  $attached_file;
        $fullPath =  base_url() . 'attachment/' .$attached_file;
        $fromName =  $sender_name;
        $fromEmail = $senderemail;
        $c_subject = $subject;
        $htmlMessage = '<p><b>Message</b>'.$message.'</p>';
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
        $bcc_arr = array();
        $cc_arr = array();
        $attachment_arr = array();
        if ($bcc) {
            $data['bcc'] = array(
                array(
                    "email" => $bcc
                )
            );
        }
        if ($cc) {
            $data['cc'] = array(array(
                "email" => $cc
            ));
        }
        if ($attached_file) {
            $data['attachment'] = array(array(
                "url" => $fullPath,
                "name" => $fileName 
            ));
        }
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
        $api_response_id = $decode->messageId;
        curl_close($ch);
        $insert = array(
            'lead_id' => $lead_id,
            'sender_id' => $sender_id,
            'user_id'   => $user_info->id,
            'module_type' => $module_name,
            'too' => $too,
            'bcc' => $bcc,
            'cc' => $cc,
            'subject' => $subject,
            'sent_by_email' => $senderemail,
            'image' => $attachment,
            'sent_by_name' => $sender_name,
            'message' => $message,
            'source_by' => 1,
            'lead_type' => 2,
            'api_response_id' => $api_response_id,
            'created_at' => date('Y-m-d h:i:s'),
            'mail_status' => 1
        );
        if(!empty($hidden_id)){
        $save = $this->SendModel->sendMailupdate($insert,$hidden_id);
        }else{
        $save = $this->SendModel->sendMail($insert);
        }
        $_SESSION['done'] = 'Mail Sent successfully';
        $redirect_id = base64_encode($lead_id);
        if($module_name==4){
            $route = 'lead-detail?id='.$redirect_id.'';
        } else if($module_name==5){
            $route = 'contact-detail?id='.$redirect_id.'';
        } else if($module_name==6){
            $route = 'booking-detail?id='.$redirect_id.'';
        } else{
            $route = 'dashboard'; 
        }
        redirect(base_url($route)); 
    }

    //Default Template
    public function default_template(){
        $active_mail = active_mail()[0];
        $mail_template = $this->input->post('mail_template');
        $lead_id = $this->input->post('lead_id');
        $getresult = $this->SendModel->getleadDetail($lead_id);
        //get detail
        $firstname = $getresult[0]->first_name;
        $lastname = $getresult[0]->last_name;
        $toName = $firstname . $lastname;
        $organization_name = $active_mail->sender_name;
        $organization_phone = $active_mail->organization_phone;
        $sender_name = $active_mail->sender_name;
        $shedule_date = date('Y-m-d');
        //get details
        $template_body='';
        if($mail_template=='cancellation'){

            $template_body = '<html lang="en"> <head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"></head> <body style="margin: 0; padding: 100px; background-color: #f2f2f2; font-family: Arial, Helvetica, sans-serif; text-align: center;"> <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td style="background-color: #f2f2f2;text-align: center;padding: 30px 0;"> <img src="https://www.trusthavensolution.com/assets/images/ths-logo.png" alt="Trust Haven Solution Logo" style="margin: 30px auto;width: 200px;"> <h1 style="font-size: 20px; color: #333; font-weight: 600; margin: 0; padding: 5px;">Cancellation of your service contract</h1> </td> </tr> <tr> <td style="background-color: #fff; padding: 20px;"> <p style="font-size: 16px; color: #333; line-height: 1.5;">Hi ' . $toName . ',</p> <p style="font-size: 16px; color: #333; line-height: 1.5;">This is ' . $sender_name . ' from the Billing Team of Trust Haven Solution. I hope you are doing great. This email is to inform you that we received your email regarding the cancellation of the service. We tried to call you to discuss the matter; however, your number is not reachable.</p> <p style="font-size: 16px; color: #333; line-height: 1.5;">Please call us back on our toll-free number ' . $organization_phone . ' as soon as possible so that we can take appropriate action. Alternatively, you can write to us at info@trusthavensolution.com.</p> </td> </tr> <tr> <td style="background-color: #fff;padding: 30px;"> <p style="font-weight: bold;font-size: 16px;line-height: 1.4;">Best wishes:</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">Billing Team</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">' . $organization_name . '</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">' . $organization_phone . '</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">Email: info@trusthavensolution.com</p> </td> </tr> <tr> <td style="background-color: #34495e; text-align: center; padding: 20px;"> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 23px; line-height: 1.4; color: #fff !important;"> Follow Us</p> <a href="https://www.facebook.com/trustheavensolution/" target="_blank"><img src="' . base_url() . 'facebook.png" width="32" height="32" alt="Facebook" style="max-width:22px"></a> <a href="https://www.instagram.com/trusthavensolution/" target="_blank"><img src="' . base_url() . 'instagram.png" width="32" height="32" alt="Instagram" style="max-width:22px"></a> <a href="https://twitter.com/trust_haven1" target="_blank"><img src="' . base_url() . 'twitter.png" width="32" height="32" alt="Twitter" style="max-width:22px; padding: 0 5px;"></a> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 12px; line-height: 1.4; color: #fff !important;"> © All rights reserved – Trust Haven Solution</p> </td> </tr> </tbody> </table> </body> </html>';

        } else if($mail_template=='followup'){ 

            $template_body = '<html lang="en"><head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"></head> <body style="margin: 0; padding: 0; background-color: #f2f2f2; font-family: Arial, Helvetica, sans-serif;"> <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0"> <tbody><tr> <td style="background-color: #f2f2f2;text-align: center;padding: 30px 0;"> <img src="https://www.trusthavensolution.com/assets/images/ths-logo.png" alt="Trust Haven Solution Logo" style="margin: 30px auto;width: 200px;">  <h1 style="font-size: 20px; color: #333; font-weight: 600; margin: 0; padding: 5px;">Followup</h1></td> </tr> <tr> <td style="background-color: #fff; padding: 20px;"> <p style="font-size: 16px; color: #333; line-height: 1.5;">Dear ' . $firstname . ' ' . $lastname . ',</p> <p style="font-size: 16px; color: #333; line-height: 1.5;">This is Kevin from Trust Haven Solution. I hope you are doing great. This is just to check if everything is working fine with your computer since we have fixed it for you. In case if you need any kind of help please do call us on our toll-free number ' . $organization_phone . ' or you can write us back to this email.</p> </td> </tr> <tr> <td style="background-color: #fff; padding: 20px;"> <p style="font-size: 16px; color: #333; line-height: 1.5;">Your feedback is valuable to us, so we will be waiting for your valuable response.</p> </td> </tr> <tr> <td style="background-color: #ffffff;padding: 30px;"> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">Thanks &amp; Regards:</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">' . $organization_name . '</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">' . $organization_phone . '</p> </td> </tr> <tr> <td style="background-color: #34495e; text-align: center; padding: 20px;"> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 23px; line-height: 1.4; color: #fff;">Follow Us</p> <a href="https://www.facebook.com/trustheavensolution/" target="_blank"><img src="' . base_url() . 'facebook.png" width="32" height="32" alt="facebook" style="max-width:22px"></a> <a href="https://www.instagram.com/trusthavensolution/" target="_blank"><img src="' . base_url() . 'instagram.png"  width="32" height="32" alt="instagram" style="max-width:22px"></a> <a href="https://twitter.com/trust_haven1" target="_blank"><img src="' . base_url() . 'twitter.png" width="32" height="32" alt="twitter" style="max-width:22px; padding: 0 5px;"></a> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 12px; line-height: 1.4; color: #fff;">© All rights reserved – Trust Haven Solution</p> </td> </tr> </tbody></table> </body></html>';
       
        } else if($mail_template=='scheduled'){ 

            $template_body = '<!DOCTYPE html> <html lang="en"> <head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> </head> <body style="margin: 0; padding: 0; background-color: #f2f2f2; font-family: Arial, Helvetica, sans-serif;"> <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0"> <tr> <td style="background-color: #f2f2f2;text-align: center;padding: 30px 0;"> <img src="https://www.trusthavensolution.com/assets/images/ths-logo.png" alt="Trust Haven Solution Logo" style="margin: 30px auto;width: 200px;"> <h1 style="font-size: 20px; color: #333; font-weight: 600; margin: 0;">Scheduled Maintenance</h1> </td> </tr> <tr> <td style="background-color: #fff; padding: 20px;"> <p style="font-size: 16px; color: #333; line-height: 1.5;">Dear ' . $toName . ',</p> <p style="font-size: 16px; color: #333; line-height: 1.5;">This is to inform you that we will not be able to serve you on ' . $shedule_date . ' due to the Scheduled Maintenance of our internal systems. </p> <p style="font-size: 16px; color: #333; line-height: 1.5;">We apologize for the inconvenience, but in case of emergency, you can leave us a voice message or write us on our support email and we will get back to you ASAP.</p> </td> </tr> <tr> <td style="background-color: #fff; padding: 20px;"> <p style="font-size: 16px; color: #333; line-height: 1.5;">In case of any further queries, please feel free to reach us on our toll-free number ' . $organization_phone . ' or you can write us at help@trusthavensolution.com</p> </td> </tr> <tr> <td style="background-color: #ffffff; padding: 30px;"> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">Regards:</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">' . $organization_name . '</p> <p style="font-weight: normal; font-size: 16px; line-height: 1.4;">' . $organization_phone . '</p> </td> </tr> <tr> <td style="background-color: #34495e; text-align: center; padding: 20px;"> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 23px; line-height: 1.4; color: #fff;"> Follow Us</p> <a href="https://www.facebook.com/trustheavensolution/" target="_blank"><img src="' . base_url() . 'facebook.png" width="32" height="32" alt="facebook" style="max-width:22px"></a> <a href="https://www.instagram.com/trusthavensolution/" target="_blank"><img src="' . base_url() . 'instagram.png" width="32" height="32" alt="instagram" style="max-width:22px"></a> <a href="https://twitter.com/trust_haven1" target="_blank"><img src="' . base_url() . 'twitter.png" width="32" height="32" alt="twitter" style="max-width:22px; padding: 0 5px;"></a> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 12px; line-height: 1.4; color: #fff;"> &copy; All rights reserved – Trust Haven Solution</p> </td> </tr> </table> </body> </html>';
        }
        echo $template_body;
    }

    //get mail detail
    public function getmaildetail(){
        $emailId = $this->input->post('email_unique');
        $data['email_detail'] = $this->SendModel->getemailDetail($emailId);
        $this->load->view('sendmail/viewemaildetail',$data);
    }

    public function savedraft(){
        
        $user_info = $this->auth->user_info();
        $lead_id = $this->input->post('lead_id');
        $sender_id = $this->input->post('sender_id');
        $module_type = $this->input->post('module_type');
        $senderemail = $this->input->post('senderemail');
        $sendername = $this->input->post('sendername');
        $toemail = $this->input->post('toemail');
        $subject = $this->input->post('subject');
        $emailtocc = $this->input->post('emailtocc');
        $emailtobcc = $this->input->post('emailtobcc');
        $imgvalue = $this->input->post('imgvalue');
        $message = $this->input->post('message');
        $data = array(
            'lead_id' => $lead_id,
            'sender_id' => $sender_id,
            'user_id' => $user_info->id,
            'module_type' => $module_type,
            'too' => $toemail,
            'cc' => $emailtocc,
            'bcc' => $emailtobcc,
            'subject' => $subject,
            'sent_by_email' => $senderemail,
            'sent_by_name' => $sendername,
            'message' => $message,
            'source_by' => 1,
            'lead_type' => 2,
            'created_at' => date('Y-m-d h:i:s'),
            'mail_status' => 2,
            'image' => $imgvalue
        );
        $savedraft = $this->SendModel->savedraft($data);
        if($savedraft){
            echo "Message Draft Successfully !";
        }else{
            echo "Message Not Draft";
        }
    }
}
