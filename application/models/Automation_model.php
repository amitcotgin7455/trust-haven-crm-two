<?php
defined('BASEPATH') or exit('direct script no access allowed');

class Automation_model extends CI_Model
{

    // public function getidmonthlycheckup(){
    //     $this->db->order_by('id','desc');
    //     $this->db->limit(1);
    //     $query = $this->db->get('tbl_monthly_check');
    //     return $query->result();
    // }
    
    // public function getEmailOptOut($last_id){
        
    //     $this->db->where('id >',$last_id);
    //     $this->db->where('status',1);
    //     $this->db->where('user_type',2);
    //     $query = $this->db->get('tbl_lead_contact_user');
    //     return $query->result();
        
    // }

    // public function Save30daysdata($data){
    //     $record = array();
    //     for($i=0;$i<count($data);$i++)
    //     {   
    //         $sale_date = explode('-',$data[$i]->sale_date);
    //         $new_sale_date = $sale_date[2].'-'.$sale_date[0].'-'.$sale_date[1];
    //         $month_date = date("Y-m-d",strtotime($new_sale_date. " + 30 Days "));
    //         $date = date("m-d-Y", strtotime($month_date));
    //        $record[] = array(
    //             'contact_id'           => $data[$i]->id,
    //             'sale_date'    =>  $date
    //         );                
    //     }
    //     if($this->db->insert_batch('tbl_monthly_check',$record)){

    //         // echo $this->db->last_query(); die;
    //         return true;
    //     }
    //     else{
    //         return false;
    //     } 
    // }

    // public function Monthly_CheckUp($date){
    //     $this->db->where('sale_date',$date);
    //     $query = $this->db->get('tbl_monthly_check');
    //     return  $query->result();
    // }

    // public function get30SendMail($id){
    //     $this->db->where('id',$id);
    //     $this->db->where('email_opt_out',0);
    //     $this->db->where('status',1);
    //     $query = $this->db->get('tbl_lead_contact_user');
    //     return $query->result();
    // }

    // public function UpdateMailstatus($id){
    //     $this->db->set('mail_status',1);
    //     $this->db->where('id',$id);
    //     if($this->db->update('tbl_monthly_check')){
    //         return true;
    //     }
    //     else{
    //         return false;
    //     }
    // }

    // public function getNew30Days(){
    //     $this->db->where('mail_status',1);
    //     $query = $this->db->get('tbl_monthly_check');
    //     return $query->result();
    // }

    // public function InsertNew30Days($data){
    //     $record = array();
    //     for($i=0;$i<count($data);$i++)
    //     {   
    //         $sale_date = explode('-',$data[$i]->sale_date);
    //         $new_sale_date = $sale_date[2].'-'.$sale_date[0].'-'.$sale_date[1];
    //         $month_date = date("Y-m-d",strtotime($new_sale_date. " + 30 Days "));
    //         $date = date("m-d-Y", strtotime($month_date));
    //         $record[] = array(
    //             'contact_id'           => $data[$i]->contact_id,
    //             'sale_date'    =>  $date
    //         );                
    //     }
    //     $this->db->insert_batch('tbl_monthly_check',$record);
    //     // echo $this->db->last_query(); die;

            
    // }

    public function get30DaysOPTUser()
        {    
             $data = array();
             $this->db->where('email_opt_out!=',1);            
             $this->db->where('user_type',2);            
             $this->db->where('sale_date!=', '');            
             $this->db->where('status',1);
             $query = $this->db->get("tbl_lead_contact_user");
             $user_record = array();
             $days = 30;
             $current_date = date('Y-m-d');

             if($query->num_rows()>0)
             {
                $$insertArray = array();
                foreach($query->result() as $key=>$record)
                {
                    $getExistOptUser = $this->getExistOptUser($record->id)[0];
                    if($getExistOptUser)
                    {
                        $email_sent_date = date('Y-m-d',strtotime($getExistOptUser->created_date));
                        $month_date = date("Y-m-d",strtotime($email_sent_date. " + 30 Days "));
                        if($month_date <= $current_date && $getExistOptUser->mail_status==1)
                    
                    {
                    $insertArray = array(
                        'contact_id' => $record->id,
                        'sale_date' => $record->sale_date,
                        'mail_status' => 1,
                        'user_created_date' => $record->created_date,
                        'created_date' => date('Y-m-d H:i:s')
                    );    
                    $getExistOptUser = $this->insertOptOutUser($insertArray);
                    $this->get30SendMail($record->first_name,$record->last_name,$record->email,$record->customer_id,$record->mobile_1);
                    }
                    }
                    else
                    {
                    $sale_date = explode('-',$record->sale_date);
                    $new_sale_date = $sale_date[2].'-'.$sale_date[0].'-'.$sale_date[1];
                    $month_date = date("Y-m-d",strtotime($new_sale_date. " + 30 Days "));
                    
                    if($month_date <= $current_date)
                    {
                    $insertArray = array(
                        'contact_id' => $record->id,
                        'sale_date' => $record->sale_date,
                        'mail_status' => 1,
                        'user_created_date' => $record->created_date,
                        'created_date' => date('Y-m-d H:i:s')
                    );    
                    $getExistOptUser = $this->insertOptOutUser($insertArray);
                    $this->get30SendMail($record->first_name,$record->last_name,$record->email,$record->customer_id,$record->mobile_1);
                    }
                   }
                }
             }            
        }

        public function getExistOptUser($user_id)
        {
             $data = array();
             $this->db->where('contact_id',$user_id);         
            //  $this->db->where('mail_status',1);         
             $this->db->order_by('id','desc'); 
             $this->db->limit(1);        
             $query = $this->db->get("tbl_monthly_check");
             //echo $this->db->last_query(); die;
             if($query->num_rows()>0)
             {
                return $query->result();
             }            
             return false;
        }

        public function insertOptOutUser($data)
        {
            if($this->db->insert("tbl_monthly_check",$data))
            {
                //echo $this->db->last_query(); die;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function get30SendMail($first_name,$last_name,$email,$customer_id,$mobile_1){
            $get_lead_info = $this->getleadinfo($mobile_1)[0];
            $active_mail = active_mail()[0];
            $Firstname = $first_name;
            $Lastname = $last_name;
            $toName = $Firstname.' '.$Lastname;
            $toEmail = $email;
            $fromName = $active_mail->sender_name;
            $fromEmail = $active_mail->sender_email;
            $subject = 'Reminder for monthly PC Check up';
            $organization_name = $active_mail->sender_name;
            $organization_phone = $active_mail->organization_phone;
            $htmlMessage = '<body marginheight="0" marginwidth="0" topmargin="0" leftmargin="0" style="height: 100% !important; margin: 0; padding: 0; width: 100% !important;min-width: 100%;"><table name="bmeMainBody" style="background-color: #fff;" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#fff"><tbody><tr><td width="100%" valign="top" align="center"><table name="bmeMainColumnParentTable" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="bmeMainColumnParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px;"><table name="bmeMainColumn" class="" style="max-width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr><td class="bmeHolder" name="bmeMainContentParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;" width="100%" valign="top" align="center"><table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr><td class="blk_container bmeHolder" name="bmeHeader" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: #f2f2f2; padding: 30px 0;" width="100%" valign="top" bgcolor="#34495e" align="center"><div id="dv_9" class="blk_wrapper"><table class="blk" name="blk_image" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="bmeImage" style="border-collapse: collapse; padding:20px 20px;" align="center"><img src="https://www.trusthavensolution.com/assets/images/ths-logo.png" style="max-width: 237px; display: block; width: 100%;" alt="" width="100%" border="0" /></td></tr></tbody></table></td></tr></tbody></table><table name="blk_text" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td valign="top" align="center"><table name="tblText" style="float:left;background-color:transparent" width="600" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr><td name="tblCell" style="padding:10px 20px 0;font-family:Arial,Helvetica,sans-serif;font-size:16px;font-weight:normal;color:rgb(56,56,56);text-align:center" valign="top" align="left"><div style="line-height:200%"><span style="color: #333; line-height: 200%; font-weight: 600;center"><b>Reminder for monthly PC Check up</b></span></div></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></div></td></tr><tr><td class="blk_container bmeHolder" name="bmeBody" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: #fff;" width="100%" valign="top" bgcolor="#34495e" align="center"><div id="dv_13" class="blk_wrapper"><table class="blk" name="blk_divider" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="tblCellMain" style="padding: 5px 0px;"><table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;"  width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"><div style="line-height: 200%;"><span style="font-size: 16px; line-height: 200%;">Dear '.$toName.'</span></div></td></tr></tbody></table></td></tr><tr><td class="tblCellMain" style="padding: 5px 0px;"><table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <td name="tblCell" style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"> <div> <span style="font-size: 16px; color: #333; line-height: 150%;">This is Kevin from Trust Haven Solution. I hope this email finds you safe and well. In this email, we just wanted to inform you that as you are registered for our services, so you are eligible for the monthly PC checkup. So please do call to get your monthly checkup or to book an appointment simply reply to this email with the best date and time to contact you. <br><br><b> KINDLY IGNORE THIS EMAIL IF YOU HAVE ALREADY DONE WITH YOUR MONTHLY SERVICE.</b> </span></div></td></tr></tbody></table></td></tr><tr><td class="tblCellMain" style="padding: 10px 0px;"><table class="tblLine" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="tblCell"  style="padding:0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; font-weight: normal; color: rgb(56, 56, 56); text-align: left;" valign="top" align="left"><div style="line-height: 100%;"> <span style="font-size: 16px; color: #333; line-height: 150%;">And make sure that if you get a call regarding monthly PC check up so please make sure to ask your customer ID '.$customer_id.' number '.$mobile_1.'. In case of any queries please feel free to reach us on our toll-free number 1-800-235-0122 or write to us at help@trusthavensolution.com.</span></div></td></tr></tbody></table></td></tr></tbody></table></div></td></tr><tr><td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: #fff; padding-bottom: 30px;"width="100%" valign="top" bgcolor="#f2f2f2" align="center"><div id="dv_10" class="blk_wrapper"><table class="blk" name="blk_footer" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="tblCell" style="padding:0px 20px;" valign="top" align="left"><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"><span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">Thanks & Regards:</span></span></td></tr><tr><td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"><span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">'.$organization_name.'</span> </span></td></tr><tr><td name="bmeBadgeText" style="text-align:left; word-break: break-all; padding-bottom: 4px;" align="left"><span id="spnFooterText" style="font-weight: normal; font-size: 16px; line-height: 140%;">'.$organization_phone.'</span></span></td></tr></tbody></table></td></tr></tbody></table></div></td></tr><tr><td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(52, 73, 94);" width="100%" valign="top" bgcolor="#34495e"
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
            $decode = json_decode($result);
            $last_email_id = $decode->messageId;
            curl_close($ch);
            $emailHistory = array(
                'lead_id' => $get_lead_info->id,
                'user_id' => $get_lead_info->user_id,
                'sender_id' => $active_mail->id,
                'module_type' => 5,
                'too' => $toEmail,
                'subject' => $subject,
                'message' => $subject,
                'sent_by_name' => $active_mail->sender_name,
                'sent_by_email' => $active_mail->sender_email,
                'mail_status' => 1,
                'source_by' => 2,
                'lead_type' => 2,
                'created_at' => date('Y-m-d h:i:s'),
                'api_response_id'=> $last_email_id
            );
            $saveEmailhistory = $this->savehistory($emailHistory);
        }

        public function getleadinfo($mobile_1){
            $this->db->where('status',1);
            $this->db->where('mobile_1',$mobile_1);
            $query = $this->db->get('tbl_lead_contact_user');
            return $query->result();
        }

        public function savehistory($data){
            if($this->db->insert('tbl_email',$data)){
                return true;
            }
            else{
                return false;
            }
        }
     
}

  