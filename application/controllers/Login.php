<?php
defined('BASEPATH') OR exit('direct script no access allowed');
require FCPATH . 'vendor/autoload.php';
use Twilio\Rest\Client;
class Login extends CI_Controller {
	public function __construct()
	{
		parent:: __construct();
		$this->load->library('auth');
		$this->load->model('Login_model');
		
		
		
	}
	public function index()
	{	
		$userActivity = $this->checkUserActivity();
		$data['title']="Trust Haven Crm Login Page";
		$this->load->view('login/login',$data);
	}
	public function loginUser(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[25]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		if($this->form_validation->run()==FALSE){
			$data['title']="Trust Haven Crm Login Page";
			$this->load->view('login/login',$data);
		}
		else{
            // if(!isset($_COOKIE['userloggedIn']))

			// $getuserid = $this->Login_model->getuserid($this->input->post('username'))[0];
			// $user_login_status = $this->Login_model->getUserLoginStatus($getuserid->id);
			
			// $ip_address = $this->Login_model->getIpaddress($getuserid[0]->id);

			// if(empty($ip_address)){
			// 	$this->Twosetpverification($getuserid);
			// }else{
			// 	$this->Twosetpverificationcheck($ip_address);
			// }
			// prx($_COOKIE);
			$username= $this->input->post('username');
			$password= $this->input->post('password');
			$data=array(
				'username'=> $username,
				'password'=> md5($password),
			);
			$field_encrypt = base64_encode(json_encode($data));
			$user_status = $this->Login_model->userLogin($data);
			
			//prx($user_status);
			if(is_object($user_status))
			{
				$data['user_detail'] = $user_status;
				$data['title']="2 step verification";
				$url = base64_encode(json_encode($data['user_detail'])).'&user_status='.$field_encrypt.'&status='.base64_encode("2-step-verification").'&is='.base64_encode('true');
				redirect(base_url('login/verfication?user='.$url));
				//$this->load->view('login/email_verify',$data);
			}
			else
			{
			if($user_status==2)
			{
				$this->session->set_flashdata('error','Your Acount Has Been InActive! Please try to contact to admin');
		     	redirect('Login');
			}
			elseif($user_status==3)
			{
				$this->session->set_flashdata('error','Your Acount has been blocked');
		     	redirect('Login');
			}
			elseif($user_status==false)
			{
				$this->session->set_flashdata('error','Please Check Your Username And Password');
		      	redirect('Login');
			}
		}
		}
	}
	public 	function checkUserActivity() {
		$current_time = date('Y-m-d H:i:s');
		$getLoggedinUser = $this->Login_model->getUserListLoginTime();
		$login_min = 0;
		foreach($getLoggedinUser as $user=>$userList)
		{
			
			$login_time = date('Y-m-d H:i:s',strtotime($userList->created_date));
            $diff = (strtotime($current_time)-strtotime($login_time));
            $login_min = ($diff/60);
            if($login_min>600)
			{
				$this->Login_model->getUserLogout($userList->user_id);
			}
		}
		
	}


	public function firstverification($getuserid,$user_detail,$step){
		$getuser= base64_encode($getuserid->id);
		$otp = random_int(100000, 999999);
		$data = array(
			'user_id' => $getuserid->id,
			'user_role' => $getuserid->role_id,
			'user_name' => $getuserid->username,
			'otp_verify_step' => $step,
			'otp_type'    => 1,
			'otp' => $otp,	
			'otp_date_time' => date('Y-m-d h:i:s')
		);
	   $sendotp = $this->Login_model->emailotpsave($data);
	   $sendotpmail = $this->Sendotpmail($data);
	   if($sendotp){
		   
		   redirect(base_url('login/checkemailotp?userid='.$getuser.'&user_status='.$user_detail.'&step='.base64_encode($step)).'&type='.base64_encode('email'));
	   }else{
		redirect(base_url());
	   }
	}

	public function checkemailotp(){
		if(!($this->input->get('userid'))){
			echo "Invalid Url";
			exit();
		}
		$data['user_id'] = $this->input->get('userid');
		$data['step'] = $this->input->get('step');
		$data['type'] = $this->input->get('type');
		$data['user_status'] = $this->input->get('user_status');
		$data['title']="Trust Haven Crm First Verification Page";
		$this->load->view('login/firstverification',$data);
	}

	public function check_firstverification(){
		 $user_id = $this->input->post('user_id');
		 $otp = $this->input->post('otp');
		 $type = $this->input->post('type');
		 $step = $this->input->post('step');
		 $user_input_status = $this->input->post('user_status');
		//  prx($_POST);
		 //1-email,2-mobile
		 $otp_type = ($type=='mobile')?2:1;
		 $getotp = $this->Login_model->getOtpemail($user_id,$step,$otp_type);
		
		 if($otp==$getotp[0]->otp){
			 $updateotpstatus = $this->Login_model->updateEmailotpstatus($getotp[0]->id,$step,$otp_type);
			 $getuserid = $this->Login_model->getUserInfo($user_id)[0];
			if($step==1 && $otp_type==1)
			{
				$otp = random_int(100000, 999999);
				$user_detail['user_id'] = $user_id;
				$user_detail['otp'] = $otp;
				$data = array(
					'user_id' => $user_id,
					'user_role' => $getuserid->role_id,
					'user_name' => $getuserid->username,
					'otp' => $otp,
					'otp_verify_step' => 2,	
					'otp_type' => 2,	
					'otp_date_time' => date('Y-m-d h:i:s')
				);
				$sendotp = $this->Login_model->emailotpsave($data);
				
			$this->mobileSendOtp($user_detail,2);	
			redirect(base_url('login/checkemailotp?userid='.base64_encode($user_id).'&user_status='.$user_input_status.'&step='.base64_encode(2).'&type='.base64_encode('mobile')));
			}
			elseif($step==1 && $otp_type==2)
			{
				$otp = random_int(100000, 999999);
				$data = array(
					'user_id' => $getuserid->id,
					'user_role' => $getuserid->role_id,
					'user_name' => $getuserid->username,
					'otp_verify_step' => 2,
					'otp_type'    => 1,
					'otp' => $otp,	
					'otp_date_time' => date('Y-m-d h:i:s')
				);
			   $sendotp = $this->Login_model->emailotpsave($data);
			   $sendotpmail = $this->Sendotpmail($data);
			  
			   redirect(base_url('login/checkemailotp?userid='.base64_encode($getuserid->id).'&user_status='.$user_input_status.'&step='.base64_encode(2).'&type='.base64_encode('email')));
			}
			elseif($step==2)
			{
				$user_record_input = json_decode(base64_decode($user_input_status));
				$data=array(
					'username'=> $user_record_input->username,
					'password'=> $user_record_input->password,
				);
				//3 verification done
				$user_status = $this->Login_model->userLogin($data,3);
			     
			}
		 }else{
           
			$this->session->set_flashdata('error','Enter Invalid Otp');
			redirect(base_url('login/checkemailotp?userid='.base64_encode($user_id).'&user_status='.$user_input_status.'&step='.base64_encode($step).'&type='.base64_encode($type)));
		 }
	}

	public function Sendotpmail($data){
		$email = $this->Login_model->getadmindetail()[0];
		$getemailadmin =  $email->email;
		$email = $getemailadmin;
		$getemail = $email;
		$fromName = $data['user_name'].' '.'Email Verification Otp';
		$fromEmail = "fazlu.cotginanalytics@gmail.com";
		$c_subject = 'Trust Haven Solution Email Verification Otp';
		$htmlMessage = '<p>Hi,<br><br><br>Please use the following. One Time Password (OTP) to access the form '.$data['otp'].'.  Do not share this OTP with anyone.
		<b><br><br><br>Thank You!<br><br><br>Trust Haven Solution INC.</p>';
		$data = array(
			"sender" => array(
				"email" => $fromEmail,
				"name" => $fromName
			),
			"to" => array(
				array(
					"email" => $email
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
		curl_close($ch);
	   }

	// public function setipaddress($user_id){
	// 	$cookie_name = "ip_address";
	// 	$cookie_value = rand();
	// 	setcookie($cookie_name, $cookie_value,time() + (10 * 365 * 24 * 60 * 60), "/"); 
	// 	echo $user_id;
	// 	echo "<br>";
	// 	echo   $_COOKIE[$cookie_name];
	// 	die;
	// }

	public function verfication()
	{
		$email = $this->Login_model->getadmindetail()[0];
		$data['mobile'] =  $email->mobile;
		$data['email'] =  $email->email;
		$get_url = $this->input->get('user');
		$get_step = $this->input->get('status');
		$status = $this->input->get('is');
		$user_input_detail = $this->input->get('user_status');
		//$url = base64_encode(json_encode($data['user_detail'])).'&status='.base64_encode("2-step-verification").'&is='.base64_encode('true');
		$user_detail = json_decode(base64_decode($get_url));
		if((is_object($user_detail)==true) && (base64_decode($get_step)=="2-step-verification") && (base64_decode($status)=='true'))
		{
			
			$data['user_detail'] = base64_encode(json_encode($user_detail));
			$data['title']       = "2 Step Verification";
			$data['user_status'] = $user_input_detail;
			$this->load->view("login/email_verify",$data);
		}
		else
		{
			echo 'Url Not valid';
			exit();
		}


	}

	public function userVerifyReq()
	{
		$this->form_validation->set_rules('verfication', 'verfication', 'trim|required');
		if($this->form_validation->run()==FALSE){
			$data['title']="2 Step Verification";
			$this->load->view('login/email_verify',$data);
		}
		else
		{
			$user_info = $this->input->post('user_id');
			$verfication_type = $this->input->post('verfication');
			$user_status = $this->input->post('user_detail');
			$user_detail = json_decode(base64_decode($user_info));
           
			if($verfication_type=='email')
			{
			$this->firstverification($user_detail,$user_status,1);
			}

			if($verfication_type=='mobile')
			{
			$this->mobile_verify($user_detail,$user_status,1);
			}
			
	    }
      }

	  public function mobile_verify($getuserid,$user_status,$step)
	  {

		$getuser= base64_encode($getuserid->id);
		$otp = random_int(100000, 999999);
		$data = array(
			'user_id' => $getuserid->id,
			'user_role' => $getuserid->role_id,
			'user_name' => $getuserid->username,
			'otp' => $otp,
			'otp_verify_step' => $step,	
			'otp_type' => 2,	
			'otp_date_time' => date('Y-m-d h:i:s')
		);
	   $sendotp = $this->Login_model->emailotpsave($data,$step);
	   $sendotpmail = $this->mobileSendOtp($data,$step);
	   if($sendotp){
		   redirect(base_url('login/checkemailotp?userid='.$getuser.'&user_status='.$user_status.'&step='.base64_encode($step).'&type='.base64_encode('mobile')));
	   }else{
		redirect(base_url());
	   }
		
	  }

	  public function mobileSendOtp($data,$step)
	  {
		$email = $this->Login_model->getadmindetail()[0];
		$getphoneadmin =  $email->mobile;
		$sid = "ACe223d0ee43067ac92fad8723c4139151";
		$token = "55e34cd8631503aac372061e5dabe02d";
		$client = new Client($sid, $token);
		$getuser= base64_encode($data['user_id']);
		// return true;
		// Use the Client to make requests to the Twilio REST API
		// echo 4545656; die;
		$send = $client->messages->create(
			// The number you'd like to send the message to
			"+91.$getphoneadmin",
			[   
				// A Twilio phone number you purchased at https://console.twilio.com
				'from' => '+19167392516',
				// The body of the text message you'd like to send
				'body' => "Hi, Please use the following. One Time Password (OTP) to access the form ". $data['otp'].".  Do not share this OTP with anyone. \r\nThank You! \r\nTrust Haven Solution INC."
			]
		);
		if($send){
			return true;
		}
		else
		{
			return false;
		}
	  }

	  public function signin()
	{	
		$userActivity = $this->checkUserActivity();
		$data['title']="Trust Haven Crm Login Page";
		$this->load->view('login/login-new',$data);
	}
}
