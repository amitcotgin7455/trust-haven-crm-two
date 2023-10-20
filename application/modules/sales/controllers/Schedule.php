<?php
defined('BASEPATH')OR exit('direct script no access allowed');

class Schedule extends CI_Controller{

    function __construct()
    {   
        parent::__construct();
        $this->load->model('MassemailModel','MassEmail');

    }

    public function schedule_mail(){
        // echo 3993939; die;
        date_default_timezone_set('US/Pacific');
        $current_date = date('Y-m-d');  
        $current_time = date('H:i');
        $fetchschedule = $this->MassEmail->fetchSchedule($current_date,$current_time)[0];
        $agent_id =  $fetchschedule->agent_id;
        $fetchlead = $this->MassEmail->fetchLead($agent_id);
        // prx($fetchlead);
        for ($i=0; $i < count($fetchlead) ; $i++) { 
            $last_email_id = $this->sendScheduleMail($fetchlead[$i],$fetchschedule);
            $this->MassEmail->saveschedulehistory($fetchlead[$i],$fetchschedule,$last_email_id);
        }
        $this->MassEmail->updateSchedule($fetchschedule);
        
      }
    
      public function sendScheduleMail($fetchlead,$fetchschedule){ 
    
        $senderemail = $fetchschedule->from_email;
        $template_id = $fetchschedule->template_id;
        $too = $fetchlead->email; 
        $fromName = 'Trust Haven Solution';
        $fromEmail = $senderemail;
        $c_subject = 'Trust Haven Solution';
        $htmlMessage = "";
        $organization_name="Trust Haven Solution";
        $sender_name="Kevin";
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
        $last_email_id = json_decode($result);
        $last_email  =  $last_email_id->messageId;
        return $last_email;
        curl_close($ch); 
        
      }
    

}