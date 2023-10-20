<?php
defined('BASEPATH') or exit('direct script no access allowed');

class Automation extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        if(($this->auth->user_info()->role_id!=1) && ($this->auth->user_info()->role_id!=4))
        {
            redirect(base_url());
        }
        $this->load->model('Automation_model','Automation');


    }
    
    // public function monthly_checkup(){
    //     $getLastid = $this->Automation->getidmonthlycheckup();
    //     $last_id = $getLastid[0]->contact_id; 
    //     $getemailoptout = $this->Automation->getEmailOptOut($last_id);
    //     $this->get30DaysDatasave($getemailoptout);
    //     $current_date = date('m-d-Y');
    //     $monthly_checkup = $this->Automation->Monthly_CheckUp($current_date);
    //     $monthly_checkup_id = $monthly_checkup[0]->contact_id;
    //     $getmaildata = $this->Automation->get30SendMail($monthly_checkup_id);
    //     $mail_status = $monthly_checkup[0]->mail_status;
    //     $first_name = $getmaildata[0]->first_name;
    //     if($mail_status==0){
    //         $this->get30SendMail($first_name);
    //         $this->Automation->UpdateMailstatus($monthly_checkup[0]->id);
    //         $data = $this->Automation->getNew30Days();
    //         $this->Automation->InsertNew30Days($data);
    //     }
    // }
    

    // public function get30DaysDatasave($getemailoptout){
    //     $insert = $this->Automation->Save30daysdata($getemailoptout);
     
    // }
  
    public function get30SendMail($first_name){
        $Firstname = $first_name;
        $Lastname = 'Jaiswal';
        $toName = $Firstname.$Lastname;
        $toEmail = 'fazlu.cotginanalytics@gmail.com';
        $fromName = 'Trust Haven Solution Inc.';
        $fromEmail = 'ankit.cotginanalytics@gmail.com';
        $subject = 'Reminder for monthly PC Check up';
        $organization_name = 'Trust Haven Solution';
        $organization_phone = '1-800-235-0122';
        $htmlMessage = '<body marginheight="0" marginwidth="0" topmargin="0" leftmargin="0" style="height: 100% !important; margin: 0; padding: 0; width: 100% !important;min-width: 100%;"><table name="bmeMainBody" style="background-color: #fff;" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#fff"><tbody><tr><td width="100%" valign="top" align="center"><table name="bmeMainColumnParentTable" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="bmeMainColumnParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px;"><table name="bmeMainColumn" class="" style="max-width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr><td class="bmeHolder" name="bmeMainContentParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;" width="100%" valign="top" align="center"><table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr><td class="blk_container bmeHolder" name="bmeHeader" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: #f2f2f2; padding: 30px 0;" width="100%" valign="top" bgcolor="#34495e" align="center"><div id="dv_9" class="blk_wrapper"><table class="blk" name="blk_image" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="bmeImage" style="border-collapse: collapse; padding:20px 20px;" align="center"><img src="https://www.trusthavensolution.com/assets/images/ths-logo.png" style="max-width: 237px; display: block; width: 100%;" alt="" width="100%" border="0" /></td></tr></tbody></table></td></tr></tbody></table></div></td></tr><tr><td class="blk_container bmeHolder" name="bmeBody" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: #fff;" width="100%" valign="top" bgcolor="#34495e" align="center"><div id="dv_11" class="blk_wrapper"><table class="blk" name="blk_text" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td><table class="bmeContainerRow" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="tdPart" valign="top" align="center"><table name="tblText" style="float:left; background-color:transparent;" width="600" cellspacing="0" cellpadding="0" border="0" align="left"><tbody><tr><td name="tblCell" style="padding:10px 20px 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"><div style="line-height: 200%;"><span style="color: #333; line-height: 200%; font-weight: 600;">Reminder for monthly PC Check up</span></div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></div><div id="dv_13" class="blk_wrapper"><table class="blk" name="blk_divider" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="tblCellMain" style="padding: 5px 0px;"><table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;"  width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"><div style="line-height: 200%;"><span style="font-size: 16px; line-height: 200%;">Dear '.$toName.'</span></div></td></tr></tbody></table></td></tr><tr><td class="tblCellMain" style="padding: 5px 0px;"><table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"> <div> <span style="font-size: 16px; color: #333; line-height: 150%;">This is Kevin from Trust Haven Solution. I hope this email finds you safe and well. In this email, we just wanted to inform you that as you are registered for our services, so you are eligible for the monthly PC checkup. So please do call to get your monthly checkup or to book an appointment simply reply to this email with the best date and time to contact you. <br><br><b> KINDLY IGNORE THIS EMAIL IF YOU HAVE ALREADY DONE WITH YOUR MONTHLY SERVICE.</b> </span></div></td></tr></tbody></table></td></tr><tr><td class="tblCellMain" style="padding: 10px 0px;"><table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="tblCell"  style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"><div style="line-height: 100%;"> <span style="font-size: 16px; color: #333; line-height: 150%;">And make sure that if you get a call regarding monthly PC check up so please make sure to ask your customer ID number. In case of any queries please feel free to reach us on our toll-free number 1-800-235-0122 or write to us at help@trusthavensolution.com.</span></div></td></tr></tbody></table></td></tr></tbody></table></div></td></tr><tr><td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: #fff; padding-bottom: 30px;"width="100%" valign="top" bgcolor="#f2f2f2" align="center"><div id="dv_10" class="blk_wrapper"><table class="blk" name="blk_footer" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="tblCell" style="padding:0px 20px;" valign="top" align="left"><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"><span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">Thanks & Regards:</span></span></td></tr><tr><td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"><span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">'.$organization_name.'</span> </span></td></tr><tr><td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"><span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">'.$organization_phone.'</span></span></td></tr></tbody></table></td></tr></tbody></table></div></td></tr><tr><td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(52, 73, 94);" width="100%" valign="top" bgcolor="#34495e"
        align="center"><div id="dv_10" class="blk_wrapper"><table class="blk" name="blk_footer" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr>
        <td name="tblCell" style="padding:10px 20px;" valign="top" align="center"><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"><span id="spnFooterText" style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 23px; line-height: 140%; color: #fff;">Follow Us</span><br /><br /></td></tr><tr><td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"><a href="https://www.facebook.com/trustheavensolution/" target="_blank"><img src="'.base_url().'facebook.png" alt="facebook" style="max-width:22px"></a><a href="https://www.instagram.com/trusthavensolution/" target="_blank"><img src="'.base_url().'instagram.png" alt="instagram" style="max-width:22px"></a><a href="https://twitter.com/trust_haven1"target="_blank"><img src="'.base_url().'twitter.png" alt="twitter"style="max-width:22px;padding: 0 5px;"></a></td></tr><tr><td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"><p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 12px; line-height: 140%; color: #fff;"> &copy; All rights reserved – Trust Haven Solution</p></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></body>';
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
            "htmlContent" => '<html><head></head>' . $htmlMessage . '</html>'
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
        print_r($result);
        curl_close($ch);
    }
    /*Health PC Checkup*/

    /*Scheduled Maintenance*/
    public function scheduled_maintenance(){
        $Firstname = 'Ankit ';
        $Lastname = 'Jaiswal';
        $toName = $Firstname.$Lastname;
        $toEmail = 'ankit.cotginanalytics@gmail.com';
        $fromName = 'Trust Haven Solution Inc.';
        $fromEmail = 'fazlu.cotginanalytics@gmail.com';
        $subject = 'Scheduled Maintenance';
        $shedule_date = date('F d, Y');
        $organization_name = 'Trust Haven Solution';
        $organization_phone = '1-800-235-0122';
        $htmlMessage = '<body marginheight="0" marginwidth="0" topmargin="0" leftmargin="0" style="height: 100% !important; margin: 0; padding: 0; width: 100% !important;min-width: 100%;"><table name="bmeMainBody" style="background-color: #fff;" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#fff"><tbody><tr><td width="100%" valign="top" align="center"><table name="bmeMainColumnParentTable" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="bmeMainColumnParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px;"><table name="bmeMainColumn" class="" style="max-width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr><td class="bmeHolder" name="bmeMainContentParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;" width="100%" valign="top" align="center"><table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr><td class="blk_container bmeHolder" name="bmeHeader" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: #f2f2f2; padding: 30px 0;" width="100%" valign="top" bgcolor="#34495e" align="center"><div id="dv_9" class="blk_wrapper"><table class="blk" name="blk_image" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="bmeImage" style="border-collapse: collapse; padding:20px 20px;" align="center"><img src="https://www.trusthavensolution.com/assets/images/ths-logo.png" style="max-width: 237px; display: block; width: 100%;" alt="" width="100%" border="0" /></td></tr></tbody></table></td></tr></tbody></table></div></td></tr><tr><td class="blk_container bmeHolder" name="bmeBody" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: #fff;" width="100%" valign="top" bgcolor="#34495e" align="center"><div id="dv_11" class="blk_wrapper"><table class="blk" name="blk_text" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td><table class="bmeContainerRow" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="tdPart" valign="top" align="center"><table name="tblText" style="float:left; background-color:transparent;" width="600" cellspacing="0" cellpadding="0" border="0" align="left"><tbody><tr><td name="tblCell" style="padding:10px 20px 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: center;" valign="top" align="left"><div style="line-height: 200%;"><span style="font-size: 20px; color: #333; line-height: 200%; font-weight: 600;">Scheduled Maintenance</span></div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></div><div id="dv_13" class="blk_wrapper"><table class="blk" name="blk_divider" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="tblCellMain" style="padding: 5px 0px;"><table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"><div style="line-height: 200%;"><span style="font-size: 16px; color: #333; line-height: 200%;">Dear '.$toName.' </span></div></td></tr></tbody></table></td></tr><tr><td class="tblCellMain" style="padding: 5px 0px;"><table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"> <div> <span style="font-size: 16px; color: #333; line-height: 150%;">This is to inform you that we will not be able to serve you as on '.$shedule_date.' due to the Scheduled Maintenance of our internal systems. <br><br> We apologise for the inconvenience, but in case of emergency you can leave us a voice message or write us on our support email and we will get back to you ASAP.</span> </div> </td> </tr> </tbody> </table> </td> </tr> <tr> <td class="tblCellMain" style="padding: 10px 0px;"> <table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"> <div style="line-height: 100%;"> <span style="font-size: 16px; color: #333; line-height: 150%;">In case of any further queries please feel free to reach us on our toll free number '.$organization_phone.' or you can write us on help@trusthavensolution.com <br><br></span> </div> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> <tr> <td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: #fff; padding-bottom: 30px;"width="100%" valign="top" bgcolor="#f2f2f2" align="center"> <div id="dv_10" class="blk_wrapper"> <table class="blk" name="blk_footer" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px;" valign="top" align="left"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"> <span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">Regards:</span> </span> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"> <span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">'.$organization_name.'</span> </span> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"> <span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">'.$organization_phone.'</span> </span> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> <tr> <td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(52, 73, 94);" width="100%" valign="top" bgcolor="#34495e" align="center"> <div id="dv_10" class="blk_wrapper"> <table class="blk" name="blk_footer" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:10px 20px;" valign="top" align="center"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"> <span id="spnFooterText" style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 23px; line-height: 140%; color: #fff;">Follow Us</span><br /><br /> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"> <a href="https://www.facebook.com/trustheavensolution/" target="_blank"><img src="'.base_url().'facebook.png" alt="facebook" style="max-width:22px"></a><a href="https://www.instagram.com/trusthavensolution/" target="_blank"><img src="'.base_url().'instagram.png" alt="instagram" style="max-width:22px"></a><a href="https://twitter.com/trust_haven1"target="_blank"><img src="'.base_url().'twitter.png" alt="twitter"style="max-width:22px;padding: 0 5px;"></a> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 12px; line-height: 140%; color: #fff;"> &copy; All rights reserved – Trust Haven Solution</p> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </body>';
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
            "htmlContent" => '<html><head></head>' . $htmlMessage . '</html>'
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
        print_r($result);
        curl_close($ch);
    }
    /*Scheduled Maintenance*/

    /*Follow Up*/
    public function follow_up(){
        $firstname = 'Ankit ';
        $lastname = 'Jaiswal';
        $toName = $firstname.$lastname;
        $toEmail = 'ankit.cotginanalytics@gmail.com';
        $fromName = 'Trust Haven Solution Inc.';
        $fromEmail = 'noreply@trusthavensolution.com';
        $subject = 'Follow Up';
        $organization_name = 'Trust Haven Solution';
        $organization_phone = '1-800-235-0122';
        $htmlMessage = '<body marginheight="0" marginwidth="0" topmargin="0" leftmargin="0" style="height: 100% !important; margin: 0; padding: 0; width: 100% !important;min-width: 100%;"><table name="bmeMainBody" style="background-color: #fff;" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#fff"><tbody><tr> <td width="100%" valign="top" align="center"> <table name="bmeMainColumnParentTable" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="bmeMainColumnParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px;"> <table name="bmeMainColumn" class="" style="max-width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"> <tbody> <tr> <td class="bmeHolder" name="bmeMainContentParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;" width="100%" valign="top" align="center"> <table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"> <tbody> <tr> <td class="blk_container bmeHolder" name="bmeHeader" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: #f2f2f2; padding: 30px 0;" width="100%" valign="top" bgcolor="#34495e" align="center"> <div id="dv_9" class="blk_wrapper"> <table class="blk" name="blk_image" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td class="bmeImage" style="border-collapse: collapse; padding:20px 20px;" align="center"> <img src="https://www.trusthavensolution.com/assets/images/ths-logo.png" style="max-width: 237px; display: block; width: 100%;" alt="" width="100%" border="0" /> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> <tr> <td class="blk_container bmeHolder" name="bmeBody" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: #fff;" width="100%" valign="top" bgcolor="#34495e" align="center"> <div id="dv_13" class="blk_wrapper"> <table class="blk" name="blk_divider" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td class="tblCellMain" style="padding: 5px 0px;"> <table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"> <div> <span style="font-size: 16px; color: #333; line-height: 150%;"> Dear '.$firstname.' '.$lastname.', <br><br> This is Kevin from Trust Haven Solution. I hope you are doing great. This is just to check if everything is working fine with your computer since we have fixed it for you. In case if you need any kind of help please do call us on our toll free number '.$organization_phone.' or you can write us back to this email. </span> </div> </td> </tr> </tbody> </table> </td> </tr> <tr> <td class="tblCellMain" style="padding: 10px 0px;"> <table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"> <div style="line-height: 100%;"> <span style="font-size: 16px; color: #333; line-height: 150%;">Your feedback is valuable to us, so we will be waiting for your valuable response.</span> </div> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> <tr> <td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: #fff; padding-bottom: 30px;"width="100%" valign="top" bgcolor="#f2f2f2" align="center"> <div id="dv_10" class="blk_wrapper"> <table class="blk" name="blk_footer" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px;" valign="top" align="left"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"> <span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">Thanks & Regards:</span> </span> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"> <span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">'.$organization_name.'</span> </span> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"> <span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">'.$organization_phone.'</span> </span> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> <tr> <td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(52, 73, 94);" width="100%" valign="top" bgcolor="#34495e" align="center"> <div id="dv_10" class="blk_wrapper"> <table class="blk" name="blk_footer" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:10px 20px;" valign="top" align="center"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"> <span id="spnFooterText" style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 23px; line-height: 140%; color: #fff;">Follow Us</span><br /><br /> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"> <a href="https://www.facebook.com/trustheavensolution/" target="_blank"><img src="'.base_url().'facebook.png" alt="facebook" style="max-width:22px"></a> <a href="https://www.instagram.com/trusthavensolution/" target="_blank"><img src="'.base_url().'instagram.png" alt="instagram" style="max-width:22px"></a> <a href="https://twitter.com/trust_haven1"target="_blank"><img src="'.base_url().'twitter.png" alt="twitter"style="max-width:22px;padding: 0 5px;"></a> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 12px; line-height: 140%; color: #fff;"> &copy; All rights reserved – Trust Haven Solution</p> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </body>';
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
            "htmlContent" => '<html><head><title>Trust Haven Solution</title></head>' . $htmlMessage . '</html>'
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
        print_r($result);
        curl_close($ch);
    }
    /*Follow Up*/

    /*Cancellation*/
    public function cancellation(){
        $firstname = 'Ankit ';
        $lastname = 'Jaiswal';
        $toName = $firstname.$lastname;
        $toEmail = 'ankit.cotginanalytics@gmail.com';
        $fromName = 'Trust Haven Solution Inc.';
        $fromEmail = 'noreply@trusthavensolution.com';
        $subject = 'Cancellation of your service contract';
        $cancellation_date =  date('Y-m-d');
        $organization_name = 'Trust Haven Solution';
        $organization_phone = '1-800-235-0122';
        $sender_name = 'Kelvin'; 
        $htmlMessage = '<body marginheight="0" marginwidth="0" topmargin="0" leftmargin="0" style="height: 100% !important; margin: 0; padding: 0; width: 100% !important;min-width: 100%;"><table name="bmeMainBody" style="background-color: #fff;" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#fff"><tbody><tr><td width="100%" valign="top" align="center"><table name="bmeMainColumnParentTable" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="bmeMainColumnParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px;"><table name="bmeMainColumn" class="" style="max-width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr><td class="bmeHolder" name="bmeMainContentParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;" width="100%" valign="top" align="center"><table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr><td class="blk_container bmeHolder" name="bmeHeader" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: #f2f2f2; padding: 30px 0;" width="100%" valign="top" bgcolor="#34495e" align="center"> <div id="dv_9" class="blk_wrapper"> <table class="blk" name="blk_image" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td class="bmeImage" style="border-collapse: collapse; padding:20px 20px;" align="center"> <img src="https://www.trusthavensolution.com/assets/images/ths-logo.png" style="max-width: 237px; display: block; width: 100%;" alt="" width="100%" border="0" /> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> <tr> <td class="blk_container bmeHolder" name="bmeBody" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: #fff;" width="100%" valign="top" bgcolor="#34495e" align="center"> <div id="dv_11" class="blk_wrapper"> <table class="blk" name="blk_text" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td> <table class="bmeContainerRow" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td class="tdPart" valign="top" align="center"> <table name="tblText" style="float:left; background-color:transparent;" width="600" cellspacing="0" cellpadding="0" border="0" align="left"> <tbody> <tr> <td name="tblCell" style="padding:10px 20px 0; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"> <div style="line-height: 200%;"> <span style="font-size: 20px; color: #333; line-height: 200%; font-weight: 600;">Cancellation of your service contract</span> </div> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> <div id="dv_13" class="blk_wrapper"> <table class="blk" name="blk_divider" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td class="tblCellMain" style="padding: 5px 0px;"> <table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"> <div style="line-height: 200%;"> <span style="font-size: 16px; color: #333; line-height: 200%;">Hi '.$toName.' </span> </div> </td> </tr> </tbody> </table> </td> </tr> <tr> <td class="tblCellMain" style="padding: 5px 0px;"> <table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"> <div style="line-height: 200%;"> <span style="font-size: 16px; color: #333; line-height: 200%;">This is '.$sender_name.' from Billing Team of Trust Haven Solution. I hope you are doing great . This email is to inform that we received your email wherein you mentioned that you cancelled the service , we try to call you to discuss about the same however your number is not reachable.</span> </div> </td> </tr> </tbody> </table> </td> </tr> <tr> <td class="tblCellMain" style="padding: 10px 0px;"> <table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"> <div style="line-height: 200%;"> <span style="font-size: 16px; color: #333; line-height: 200%;">Please call us back on our toll free number '.$organization_phone.' ASAP so we will take action accordingly or you can write us on info@trusthavensolution.com</span> </div> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> <tr> <td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: #fff; padding-bottom: 30px;"width="100%" valign="top" bgcolor="#f2f2f2" align="center"> <div id="dv_10" class="blk_wrapper"> <table class="blk" name="blk_footer" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px;" valign="top" align="left"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"> <span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">Best wishes:</span> </span> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"> <span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">Billing Team</span> </span> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"> <span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">'.$organization_name.'</span> </span> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"> <span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">'.$organization_phone.'</span> </span> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"> <span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">Email : info@trusthavensolution.com</span> </span> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> <tr> <td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(52, 73, 94);" width="100%" valign="top" bgcolor="#34495e" align="center"> <div id="dv_10" class="blk_wrapper"> <table class="blk" name="blk_footer" width="600" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:10px 20px;" valign="top" align="center"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"> <span id="spnFooterText" style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 23px; line-height: 140%; color: #fff;">Follow Us</span><br /><br /> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"> <a href="https://www.facebook.com/trustheavensolution/" target="_blank"><img src="'.base_url().'facebook.png" alt="facebook" style="max-width:22px"></a> <a href="https://www.instagram.com/trusthavensolution/" target="_blank"><img src="'.base_url().'instagram.png" alt="instagram" style="max-width:22px"></a> <a href="https://twitter.com/trust_haven1"target="_blank"><img src="'.base_url().'twitter.png" alt="twitter"style="max-width:22px;padding: 0 5px;"></a> </td> </tr> <tr> <td name="bmeBadgeText" style="text-align:center; word-break: break-all;" align="center"> <p style="font-family: Poppins, sans-serif; font-weight: normal; font-size: 12px; line-height: 140%; color: #fff;"> &copy; All rights reserved – Trust Haven Solution</p> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </body>';
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
            "htmlContent" => '<html><head><title>Trust Haven Solution</title></head>' . $htmlMessage . '</html>'
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
        print_r($result);
        curl_close($ch);
    }
    /*Cancellation*/

    public function monthly_checkup()
    { 
        $getOptout = $this->Automation->get30DaysOPTUser();
        

    }
    
}
