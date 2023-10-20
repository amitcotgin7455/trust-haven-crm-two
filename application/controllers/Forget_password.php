<?php
defined('BASEPATH') OR exit('direct script no access allowed');

class Forget_password extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		
		$this->load->model('Login_model');
		
		
		
	}
	public function index()
	{	
		$data['title']="Trust Haven Crm Login Page";
		$this->load->view('login/forget_password',$data);
	}

	public function loginUser(){

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');

		if($this->form_validation->run()==FALSE){
			$data['title']="Trust Haven Crm Login Page";
			$this->load->view('login/login',$data);
		}
		else{
			$username= $this->input->post('username');
			$password= $this->input->post('password');
			$data=array(
				'username'=> $username,
				'password'=> md5($password),
			);
			
			$user_status = $this->Login_model->userLogin($data);

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

	public function forgetPassword()
	{
		$this->form_validation->set_rules('email', 'email', 'trim|required|min_length[5]|max_length[50]');

		if($this->form_validation->run()==false)
		{
			$data['title'] = "Trust Haven Crm Forget Password";
			$this->load->view('login/forget_password',$data);
		}
		else
	    {
			//check email exist or not
			$email = $this->input->post('email');
			$checkUser = $this->Login_model->userEmail($email);
			
			if($checkUser)
			{

                 $this->ForgetMail($email,$checkUser);
			}
			else
			{
				$this->session->set_flashdata('error','Email id does not exist');
		      	redirect('forget_password/forgetPassword');
			}

		}
	}


	public function ForgetMail($email,$user_detail)
	{
	$activeMail = active_mail()[0];
	$name = $user_detail[0]->name;
	$toName =  $name;
    $toEmail = $email;
    $fromName = $activeMail->sender_name;
    $fromEmail = $activeMail->sender_email;
    $subject = 'Forget Password';
	$link    = base_url().'update_password?user='.base64_encode($email).'&id='.base64_encode($user_detail[0]->id).'&status='.base64_encode('true');
	
    $htmlMessage = '<p>Trust Haven Solution,<br> 
	<a href="'.$link.'">	
	Clike here to update your password
	</a></p>';

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
        "htmlContent" => '<html><head></head><body><p>'.$htmlMessage.'</p></p></body></html>'
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
	$this->session->set_flashdata('success','Please check your email');
	redirect(base_url('forget-password'));
	}

	public function update_password()
	{
		$data['id'] = base64_decode($this->input->get('id'));
		$data['user'] = base64_decode($this->input->get('user'));
		$data['status'] = base64_decode($this->input->get('status'));
		
		if(!empty($data['id']) && !empty($data['user']) && !empty($data['status']))
		{
			$checkUser = $this->Login_model->userEmail($data['user'],$data['id']);
			if(empty($checkUser))
			{
				$this->session->set_flashdata('error','User does not exist');
				redirect(base_url());
			}
		}
		else
		{
			$this->session->set_flashdata('error','User does not exist');
			redirect(base_url());
		}
		$data['title']="Trust Haven Crm Password Update";
		$this->load->view('login/update_password',$data);
	}

	public function change_password()
	{
		$this->form_validation->set_rules('new_password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[8]');
		
		if($this->form_validation->run()==FALSE)
		{
			$data['title'] = "Trust Haven Crm Forget Password";
			$this->load->view('login/update_password',$data);
		}
		else
	    {
			$new_password = $this->input->post('new_password');
			$id = $this->input->post('id');
			$user = $this->input->post('user');
			$confirm_password = $this->input->post('confirm_password');
			$link    = base_url().'update_password?user='.base64_encode($user).'&id='.base64_encode($id).'&status='.base64_encode('true');
            if($new_password!=$confirm_password)
			{
				$this->session->set_flashdata('error','Password and confirm password not matched');
				redirect($link);
			}
			else
			{
			$checkUser = $this->Login_model->userEmail($user,$id);
			if(empty($checkUser))
			{
				$this->session->set_flashdata('error','User does not exist');
				redirect(base_url());
			}
			else
			{
				$update = array(
					'password' => md5($new_password)
				);
				if($this->Login_model->updatePassword($update,$id))
				{
					$this->session->set_flashdata('success','Password Updated Successfully');
				    redirect(base_url());
				}
				else
				{
					$this->session->set_flashdata('error','Password Not updated');
				    redirect(base_url());
				}
			}
			}


	}
}
}
