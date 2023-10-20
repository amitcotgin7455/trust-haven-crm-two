<?php
defined('BASEPATH') OR exit('direct script no access allowed');
 class Chat extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        // if(($this->auth->user_info()->role_id!=1) && ($this->auth->user_info()->role_id!=4))
        // {
        //     redirect(base_url());
        // }
        $this->load->helper(array('form', 'url'));
        $this->load->model('Login_model','LoginModel');
        $this->load->model('Chat_model');
    } 
    //USER LIST
    public function fetchchatUser(){
        $user_id = $this->input->post('user_id');
        $data['fetchchatUser'] = $this->Chat_model->fetchChatUSer($user_id);
        $this->load->view('chat/chatusers',$data);
    }
    //get chat box
    public function getChatbox(){
        $receiver_id = $this->input->post('receiver_id');
        $sender_id = $this->input->post('sender_id');
        $data['auth_status'] = $this->Chat_model->AuthStatusUser($receiver_id);
        $data['receiver_data'] = $this->Chat_model->getindividualChatbox($receiver_id);
        $data['user_id'] = $sender_id;
        $this->load->view('chat/chatbox',$data);
		//print_r(json_encode($returnVal,true));
    }
    //get user chat Box Inner Message
    public function getMessage(){
        $receiver_id = $this->input->post('receiver');
        $sender_id = $this->input->post('sender');
        $data['getmessage'] = $this->Chat_model->getmessage($receiver_id, $sender_id);
        $data['user_id'] = $sender_id;
        $this->load->view('chat/chatmessagebox',$data);
		//print_r(json_encode($returnVal,true));
    }
    //get no messages
    public function getNoMessage(){
        $data['name']  = $this->input->post('name');
		$this->load->view('chat/chatnotmessageyet',$data);
	}
 
    //insert chat message
    public function sendmessage(){
        if(isset($_POST['data'])){
            $jsonDecode = json_decode($_POST['data'],true);
            $arr = array(
                'message_date' => date('Y-m-d H:i:s'),
                'sender_id' => $jsonDecode['senderID'],
                'receiver_id' => $jsonDecode['receiverID'],
                'message' => $jsonDecode['message'],
            );
           
            if($this->Chat_model->sentMessage($arr))
            {    
                $insert_id = $this->db->insert_id();
                $user_id           = $jsonDecode['senderID'];
                $id                = $insert_id;
                $log_title         = "Chat Panel - ".$jsonDecode['message'] . " - " . json_encode($jsonDecode);
               
                $log_create        = app_log_manage($user_id, $id, $log_title);
            }
        }
    }
    //send attachments
    public function sendattachment(){
        $receiver_id = $this->input->post('receiver_id');
        $sender_id = $this->input->post('sender_id');
        // File upload configuration
        $config['upload_path'] = FCPATH . 'file/chat/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|xls|xlsx|mp4|avi|mov';
        $config['max_size'] = 10240; // Maximum file size in kilobytes (10MB)
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('attachment')) {
            $error = $this->upload->display_errors();
            echo $error;
        } else {
            $upload_data = $this->upload->data();
            $data = array(
                'sender_id' => $sender_id, 
                'receiver_id' => $receiver_id, 
                'message_date' => date('Y-m-d H:i:s'),
                'attachment' => $upload_data['file_name'] // Add uploaded file name
            );
            if($this->Chat_model->sentattachmentMessage($data))
            {
                $insert_id = $this->db->insert_id();
                $user_id           = $sender_id;
                $id                = $insert_id;
                $log_title         = "Chat Panel -  File Uploaded - " . json_encode($insert_id);
                $log_create        = app_log_manage($user_id, $id, $log_title);
            }
        }
    }
    //delete message
    public function delete_message(){
        $message_id = $this->input->post('id');
        $sender_id = $this->input->post('sender_id');
        $this->Chat_model->deletechatMessage($message_id,$sender_id);
    }
    //get user activity
    public function get_user_activity()
    {
        $data['user_detail'] = $this->auth->user_info(); 
        $user_id           = $data['user_detail']->id;
        $record              = $this->LoginModel->getUserLogLastId($user_id);
        
        if($record['activity_detail'])
        {
            $login_time = date('Y-m-d h:i:s',strtotime($record['activity_detail'][0]->created_date));
            $current_time = date('Y-m-d h:i:s');
            $diff = (strtotime($current_time)-strtotime($login_time));
            $getMin = ($diff/60);
            if($getMin>1)
            {
                $this->LoginModel->auth_activity($user_id,2);
            }
            else
            {
                //$this->LoginModel->auth_activity($user_id,1,$login_status=2 already login);
                $this->LoginModel->auth_activity($user_id,1,1);
            }
        }
        else
        {
            $getLoginTime = $this->LoginModel->getUserLoginTime($user_id)[0];
            $login_time = $getLoginTime->created_date;
            $current_time = date('Y-m-d h:i:s');
            $diff = (strtotime($current_time)-strtotime($login_time));
            $getMin = ($diff/60);
            if($getMin>1)
            {
                $this->LoginModel->auth_activity($user_id,2);
            }
            else
            {
                $this->LoginModel->auth_activity($user_id,1);
            }
            
        }
        
    }
        //typing notification
    public function send_typing_status(){
        $sender_id = $this->input->post('sender');
        $receiver_id = $this->input->post('receiver');
        $status_id = $this->input->post('status');  
        $getlast_id = $this->Chat_model->getTypingstatus($sender_id,$receiver_id);  
        $last_id =$getlast_id[0]->id;
        $update = $this->Chat_model->sendtypingStatus($last_id,$status_id);
        //return $getmessage;
    }

    public function get_typing_status(){
        $sender_id = $this->input->post('sender');
        $receiver_id = $this->input->post('receiver');
        $getresult = $this->Chat_model->getTypingstatus($sender_id,$receiver_id);
        $typing_indicate = $getresult[0]->typing_status;
        $msg_sender = $getresult[0]->sender_id;
        if (!empty($typing_indicate) && $msg_sender == $sender_id) {  
            if ($typing_indicate == '1') {
                echo 'typing...';
            } else {
                echo '';
            }
        } else {
            echo '';
        }
    }
 }