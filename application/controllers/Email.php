<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
    }
    
    function send(){
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.example.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'user@example.com';
        $mail->Password = '********';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
        
        $mail->setFrom('info@example.com', 'CodexWorld');
        $mail->addReplyTo('info@example.com', 'CodexWorld');
        
        // Add a recipient
        $mail->addAddress('john.doe@gmail.com');
        
        // Add cc or bcc 
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');
        
        // Email subject
        $mail->Subject = 'Send Email via SMTP using PHPMailer in CodeIgniter';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
        $mailContent = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
            <p>This is a test email sending using SMTP mail server with PHPMailer.</p>";
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        }
    }
    public function sendmail()
    {
        $email = "fazlu.cotginanalytics@gmail.com";
        $toName = "fazlu Rahman";
        $toEmail = $email;
        $fromName = 'Trust Haven';
        $fromEmail = 'amitkumar.cotginanalytics@gmail.com';
        $subject = 'Trust Haven Invoice';
        $htmlMessage = "Welcome to trust hevan crm";
        $fileName =  "invoice.pdf";
        $fullPath =  "https://www.cotginanalytics.in/front_assets/invoice.pdf";

        // $fullPath = "https://gateforumonline.com/wp-content/uploads/2021/10/POSOCO.pdf";
        // $fileName = "POSOCO.pdf";

        $data = array(
            "sender" => array(
                "email" => $fromEmail,
                "name" =>  $fromName         
            ),
            "to" => array(
                array(
                    "email" => $toEmail,
                    "name" => $toName 
                    )
            ), 
            "attachment" => array(
                array(
                    "url" => $fullPath,
                    "name" => $fileName 
                    )
            ), 
            "subject" => $subject,
            "htmlContent" => '<!DOCTYPE html> <html> <body> <p>'.$htmlMessage.'</p></p></body></html>'
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

    
}