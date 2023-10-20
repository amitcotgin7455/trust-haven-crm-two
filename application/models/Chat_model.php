<?php 

defined('BASEPATH') OR exit('direct script no access allowed');





class Chat_model extends CI_Model{



    // public function fetchChatUSer($id){

    //     $this->db->where('status',1);

    //     $this->db->where('id !=',$id);

    //     $query = $this->db->get('tbl_users');

    //     return $query->result();

    // }

    public function fetchChatUSer($id){  

        $data = array();

        $this->db->where('status',1);

        $this->db->where('id !=',$id);

        $query = $this->db->get('tbl_users');

        if($query->num_rows()>0)

        {

            foreach($query->result() as $key=>$record)

            {

                $record->user_log_status = $this->getUserLoginTime($record->id)[0];

                $record->last_message    = $this->getLastMessage($record->id)[0];

                $data[] = $record;

            }

            return $data;

        }

       return false;

    }



    public function fetchUSer($id){

        $this->db->where('status',1);

        $this->db->where('id',$id);

        $query = $this->db->get('tbl_users');

        return $query->result();

    }



    //get chatbox

    public function getindividualChatbox($receiverID){

        $this->db->where('status',1);

        $this->db->where('id',$receiverID);

        $query = $this->db->get('tbl_users');

        return $query->result();

	}



    //get individual chats

    public function getmessage($id, $user){

        $this->db->select('tbl_users.id,tbl_users.name,tbl_users.username,tbl_users.image,tbl_messages.id as messageid,tbl_messages.receiver_id,tbl_messages.sender_id,tbl_messages.message,tbl_messages.attachment,tbl_messages.message_date,tbl_messages.status')->join('tbl_users', 'tbl_messages.sender_id = tbl_users.id', 'left');

		$where = "( tbl_messages.sender_id = '$user' AND tbl_messages.receiver_id = '$id' OR 

		tbl_messages.sender_id = '$id' AND tbl_messages.receiver_id = '$user' )";

		$this->db->where($where);

		$result = $this->db->get('tbl_messages')->result();

		return $result;

	}



    //insert into tbl_messages

    public function sentMessage($data){

        if($this->db->insert('tbl_messages',$data))

        {

        return true;

        }

        return false;

    }



    //attachment

    public function sentattachmentMessage($data){

        if($this->db->insert('tbl_messages',$data))

        {

        return true;

        }

        return false;

    }



    //delete from tbl_messages

    public function deletechatMessage($id,$user){

        $this->db->where("id", $id);

        $this->db->where("sender_id", $user);

        if ($this->db->update('tbl_messages', ['status' => '3'])) {

            return true;

        } else {

            return false;

        }

    }



    //last login

    public function getUserLoginTime($user_id)

    {

        

        // $this->db->where('auth_status!=',3);

        $this->db->limit(1);

        $this->db->order_by('id','desc');

        $this->db->where('user_id',$user_id);

        $query = $this->db->get("tbl_authencticate_status")->result();

        //echo $this->db->last_query(); die;

        

        return $query;

    }



    // last message

    public function getLastMessage($user_id)

    {

        

        // $this->db->where('auth_status!=',3);

        $this->db->limit(1);

        $this->db->order_by('id','desc');

        $this->db->group_start();

        $this->db->or_where("receiver_id",$user_id);

        $this->db->or_where("sender_id",$user_id);

        $this->db->group_end();

        $this->db->where('status',1);

        $query = $this->db->get("tbl_messages")->result();

        return $query;

    }



    //Auth Status

    public function AuthStatusUser($user_id)

    {

        $this->db->limit(1);

        $this->db->order_by('id','desc');

        $this->db->where('user_id',$user_id);

        $query = $this->db->get("tbl_authencticate_status")->result();

        return $query;

    }
    
         //get typing status
   public function getTypingstatus($id, $user){
        $this->db->select('id,sender_id,typing_status');
		$where = "sender_id = '$user' AND receiver_id = '$id' OR 
		sender_id = '$id' AND receiver_id = '$user'";
		$this->db->where($where);
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
		$result = $this->db->get('tbl_messages')->result();
		return $result;
	}
	
	public function sendtypingStatus($id,$status_id){

        $this->db->set('typing_status',$status_id);
        $this->db->where('id',$id);
        if($this->db->update('tbl_messages')) {
            return true;
        } else{
            return false;
        }
    }



}

