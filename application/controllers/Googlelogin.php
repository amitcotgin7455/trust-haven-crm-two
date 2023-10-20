<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Googlelogin extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->model('Login_model');
	require_once APPPATH.'third_party/src/Google_Client.php';
	require_once APPPATH.'third_party/src/contrib/Google_Oauth2Service.php';
}

	
	public function login()
	{
	
		$clientId = '4262447850-2tb8f3m18kdqqs8s40jbgj4nfmidn61f.apps.googleusercontent.com'; //Google client ID
		$clientSecret = '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'; //Google client secret
		$redirectURL = base_url() .'googlelogin/login';
		$gClient = new Google_Client();
		$gClient->setApplicationName('Login');
		$gClient->setClientId($clientId);
		$gClient->setClientSecret($clientSecret);
		$gClient->setRedirectUri($redirectURL);
		$google_oauthV2 = new Google_Oauth2Service($gClient);
		if(isset($_GET['code']))
		{
			$gClient->authenticate($_GET['code']);
			$_SESSION['token'] = $gClient->getAccessToken();
			header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
		}
		if (isset($_SESSION['token'])) 
		{
			$gClient->setAccessToken($_SESSION['token']);
		}
		if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
			// echo "<pre>";
			// print_r($userProfile);
			// die;
			$data=array(
				'email'=> $userProfile['email'],
				'status'=> 1,
				'role_id'=> 1
			);
			
			$user_status = $this->Login_model->adminLogin($data);
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
		else 
		{
            $url = $gClient->createAuthUrl();
		    header("Location: $url");
            exit;
        }
	}	
}
