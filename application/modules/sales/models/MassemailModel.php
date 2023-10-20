<?php 

class MassemailModel extends CI_Model{

public function fetchagent(){

    $this->db->where('role_id','2');
    $this->db->where('status',1);
    $query = $this->db->get('tbl_users');
    return $query->result();

}

public function fetchemail(){
    $this->db->where('status',1);
    $query = $this->db->get('tbl_email_setup');
    return $query->result();
}

public function insertMass($data){
   if($this->db->insert('tbl_mass_email',$data)) {
    return true;
   }
   else{
    return false;
    die;
   }
}

public function fetchLead($id){
    $this->db->where('status',1);
    $this->db->where('user_id',$id);
    $query = $this->db->get('tbl_leads');
    return $query->result();
}

public function masshistory($last_id,$agent_id,$fetchlead,$last_email_id){
    $record = array(
            'mass_email_id' => $last_id,
            'agent_id'      => $agent_id,
            'lead_id'      => $fetchlead->lead_id,
            'lead_type'      => 2,
            'email_status'      => 1,
            'api_response_id'      => $last_email_id,
            'created_date'    => date('Y-m-d h:i:s')
        );
    if($this->db->insert('tbl_mass_lead',$record)){
        return true; 
    }
    else{
        return false;
    }
    }

    public function fetchSchedule($date,$time){
        $this->db->where('schedule_date',$date);
        $this->db->where('schedule_time',$time);
        $query = $this->db->get('tbl_mass_email');
        return $query->result();    
    }

    public function updateSchedule($data){
        $this->db->set('mass_status',1);
        $this->db->where('id',$data->id);;
        if($this->db->update('tbl_mass_email')){
            return true;
        }
        else{
            return false;
        }
    }

    public function saveschedulehistory($fetchlead,$fetchschedule,$last_email_id){
            
        $record = array(
            'mass_email_id' => $fetchschedule->id,
            'agent_id'      => $fetchschedule->agent_id,
            'lead_id'      => $fetchlead->lead_id,
            'lead_type'      => 2,
            'email_status'      =>2,
            'api_response_id'      =>$last_email_id,
            'mod_date'    => date('Y-m-d h:i:s')
        );   
        if($this->db->insert('tbl_mass_lead',$record)){
            return true; 
        }
        else{
            return false;
        }
    }

    public function getselectedlead($email_id){
        $email =  explode(',',$email_id[0]);
        $email_emp = implode(',',$email);
        $this->db->where('status',1);
        $this->db->where("lead_id in (".$email_emp.")");
        $query = $this->db->get('tbl_leads');
        return $query->result();
    }

    public function Insertpopup($data,$template_id,$senderemail,$module_type,$sender_id,$user_id,$sent_by_name,$sent_by_email){
    if($template_id==1) {
    $template_name = "Cancellation Mail";
    }elseif($template_id==2){
    $template_name="Follow Up Mail";
    }else{
    $template_name="Schedule Maintenence";
    }
     $record=array();
     for ($i=0; $i < count($data) ; $i++) { 
        $record[] = array(
         'lead_id' => $data[$i]->lead_id,
         'sender_id' => $sender_id,
         'user_id' => $user_id,
         'module_type' => $module_type,
         'too' => $data[$i]->email,
         'subject' => $template_name,
         'message' => $template_name,
         'sent_by_name' => $sent_by_name,
         'sent_by_email' => $sent_by_email,
         'created_at' => date('Y-m-d')
        );
    }
    if($this->db->insert_batch('tbl_email',$record)){
        return true;
    }
    else{
      return false;
    }

    }
    
    public function getleadinfo($lead_id){
        // echo $lead_id;
        // die;
        $this->db->where('status',1);
        $this->db->where('lead_id',$lead_id);
        $query = $this->db->get('tbl_leads');
        return $query->result();
    }

    public function schedulemassmail_count($mass_status){
        $this->db->select('a.*,a.id as listid,  b.id,b.name as username');
        $this->db->join('tbl_users b','a.agent_id=b.id','left');
        $this->db->where('a.status',1);
        $this->db->where('b.status',1);
        $this->db->where('a.mass_status',$mass_status);
        return $this->db->count_all_results('tbl_mass_email a');
    
    }

    public function schedulemassmail($mass_status,$limit,$start){
        
        $this->db->select('a.*,a.id as listid,  b.id,b.name as username');
        $this->db->join('tbl_users b','a.agent_id=b.id','left');
        $this->db->where('a.status',1);
        $this->db->where('b.status',1);
        $this->db->where('a.mass_status',$mass_status);
        $this->db->order_by('a.id','desc');
        $this->db->limit($limit,$start);
        $query = $this->db->get('tbl_mass_email a');
        return $query->result();
    }

    public function schedulemassmail_count_rows($mass_status){
        $this->db->select('a.*,a.id as listid,  b.id,b.name as username');
        $this->db->join('tbl_users b','a.agent_id=b.id','left');
        $this->db->where('a.status',1);
        $this->db->where('b.status',1);
        $this->db->where('a.mass_status',$mass_status);
        return $this->db->count_all_results('tbl_mass_email a');
    
    }

    public function schedulemassmail_search_count($mass_status,$search){
     
        $this->db->group_start();
        $this->db->or_like('b.name',$search);
        $this->db->or_like('a.schedule_date',$search);
        $this->db->or_like('a.schedule_time',$search);
        $this->db->or_like('a.created_date',$search);
        $this->db->or_like('a.mod_date',$search);
        $this->db->or_like('a.mass_status',$search);
        $this->db->group_end();
        $this->db->select('a.*,a.id as listid,  b.id,b.name as username');
        $this->db->join('tbl_users b','a.agent_id=b.id','left');
        $this->db->where('a.status',1);
        $this->db->where('b.status',1);
        $this->db->where('a.mass_status',$mass_status);
        return $this->db->count_all_results('tbl_mass_email a');

    
    }

    public function schedulemassmail_search($mass_status,$search,$limit,$start){
        
        $this->db->group_start();
        $this->db->or_like('b.name',$search);
        $this->db->or_like('a.schedule_date',$search);
        $this->db->or_like('a.schedule_time',$search);
        $this->db->or_like('a.created_date',$search);
        $this->db->or_like('a.mod_date',$search);
        $this->db->or_like('a.mass_status',$search);
        $this->db->group_end();  
        $this->db->select('a.*,a.id as listid,  b.id,b.name as username');
        $this->db->join('tbl_users b','a.agent_id=b.id','left');
        $this->db->where('a.status',1);
        $this->db->where('b.status',1);
        $this->db->where('a.mass_status',$mass_status);
        $this->db->order_by('a.id','desc');
        $this->db->limit($limit,$start);
        $query = $this->db->get('tbl_mass_email a');
        return $query->result();
    }

    public function getMassemail($id){
        $this->db->where('status',1);
        $this->db->where('id',$id);
        $query = $this->db->get('tbl_mass_email');
        return $query->result();
    }   

    public function updatemassemail($hidden_id,$data){
    $this->db->where('id',$hidden_id);
    if($this->db->update('tbl_mass_email',$data)){
        return true;
    }else{
        return false;
    }
    }

    public function updateMass($data,$last_id){
        $this->db->where('status',1);
        $this->db->where('id',$last_id);
        if($this->db->update('tbl_mass_email',$data)){
            return true;
        }else{
            return false;
        }
    }

    public function getsender_id($email){
        $this->db->where('sender_email',$email);
        $query = $this->db->get('tbl_email_setup');
        return $query->result();
    }

    public function savehistory($data){
        if($this->db->insert('tbl_email',$data)){
            return true; 
        }else{
            return false;
        }
    }
   
}
