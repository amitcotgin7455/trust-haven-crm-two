<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function userLogin($data,$login_step=""){
       $query = $this->db->get_where("tbl_users", $data);
       if($query->num_rows()>0)
       {
       $record = $query->result()[0];
       $get_device = $this->get_device();
        $get_user_agent = $this->get_user_agent();
        $get_ip = $this->get_ip();
        $get_os = $this->get_os();
        $get_browser = $this->get_browser();
        $getLocation = $this->getLocationByIp($get_ip);
        $systeminfo =  array(
            'get_device' => $get_device,
            'get_user_agent' => $get_user_agent,
            'get_ip' => $get_ip,
            'get_os' => $get_os,
            'get_browser' => $get_browser,
            'getLocation' => $getLocation
        );
       $user_data = array(
        'user_id' => $record->id,
        'username' => $record->username,
        'ip_address' => $_SERVER['REMOTE_ADDR'],
        'user_agent' =>  $_SERVER['HTTP_USER_AGENT'],
        'created_date' => date('Y-m-d H:i:s'),
        'system_info'  => $systeminfo
       );
       
       if($record->status==1)
       {
        
        $check_user = $this->checkUserLogin($record->id);
        // if(count($check_user)==1)
        // {
        //     $url = base_url().'/logout';
        //     echo "<script>alert('User already login on another device');
        //             window.location.href='$url';
        //             </script>";
        //     exit();
        // }
          

           $checkCookieExistorNot = $this->checkCookies($user_data);
           
           if($checkCookieExistorNot==true && empty($login_step))
           {
            //second perameter in updateLogoutActivity is used for login_status
           $user_auth = $this->updateLogoutActivity($_COOKIE,2);
           $this->session->set_userdata('isloggedIn', $user_data);
           // log activity 
           $insert_id = $record->id;
           $user_id           = $record->id;
           $id           = $insert_id;
           $log_title         = "Login User Name  - " .$record->username ;
           $log_create        = app_log_manage($user_id,$id,$log_title);	
           $checkUserAuth = $this->checkUserLogin($user_id);
           if(count($checkUserAuth)>1)
           {
               $this->auth_activity($user_id,3);
               redirect(base_url('logout'));
            }
            // if($checkUserAuth)
            $this->auth_activity($user_id,1);
            
            // log activity 
           redirect(base_url());
        }
        elseif($login_step==3 && $checkCookieExistorNot==false)
        {
            
            
           $user_auth = $this->manage_user_login($user_data);

           if($user_auth)
           {
            $logout_user_detail = $this->update_user_auth($user_auth,$user_data);
            $cookie_name = "userloggedIn";
            // $user_data['auth_user_id'] = "$user_auth";
            $cookie_expire_days = 30;
            $user_info = json_encode($user_data);
            $cookies_destroy_time = time() + (86400 * $cookie_expire_days);
            // echo $user_info; die;
            setcookie($cookie_name,$user_info,$cookies_destroy_time,"/");
            
            setcookie("user_auth_id",$user_auth);
                
           }
           $this->session->set_userdata('isloggedIn', $user_data);
           // log activity 
           $insert_id = $record->id;
           $user_id           = $record->id;
           $id           = $insert_id;
           $log_title         = "Login User Name ( First Time Login ) - " .$record->username ;
           $log_create        = app_log_manage($user_id,$id,$log_title);	
           $checkUserAuth = $this->checkUserLogin($user_id);
           if(count($checkUserAuth)>1)
           {
               $this->auth_activity($user_id,3);
               redirect(base_url('logout'));
            }
            // if($checkUserAuth)
            $this->auth_activity($user_id,1);
            
            // log activity 
           redirect(base_url());
        }
        else
        {
            //echo 3; die;

            //2 step verification;
            return $record;
        }
       }
       elseif($record->status==2)
       {
        
        echo 4; die;
        return 2;
       }
       elseif($record->status==3)
       {
        echo 5; die;
        return 3;
       }
    }
    else
    {
        return false;
    }
       
    }
    public function adminLogin($data){
       $query = $this->db->get_where("tbl_users", $data);
       if($query->num_rows()>0)
       {
       $record = $query->result()[0];
       $user_data = array(
        'user_id' => $record->id,
        'username' => $record->username
       );
       if($record->status==1)
       {
        $check_user = $this->checkUserLogin($record->id);
        // if(count($check_user)==1)
        // {
        //     $url = base_url().'/logout';
        //     echo "<script>alert('User already login on another device');
        //             window.location.href='$url';
        //             </script>";
        //     exit();
        // }
           $this->session->set_userdata('isloggedIn', $user_data);
            // log activity 
            $insert_id = $record->id;
            $user_id           = $record->id;
            $id           = $insert_id;
            $log_title         = "Login User Name  - " .$record->username ;
            $log_create        = app_log_manage($user_id,$id,$log_title);	
            $checkUserAuth = $this->checkUserLogin($user_id);
            if(count($checkUserAuth)>1)
            {
                $this->auth_activity($user_id,3);
                redirect(base_url('logout'));
            }
            // if($checkUserAuth)
            $this->auth_activity($user_id,1);
            // log activity 
           redirect(base_url());
       }
       elseif($record->status==2)
       {
         return 2;
       }
       elseif($record->status==3)
       {
        return 3;
       }
    }
    else
    {
        return false;
    }
       
    }
    public function userEmail($email,$id='')
    {
        if($id)
        {
        $this->db->where("id",$id);
        }
        $query = $this->db->get_where("tbl_users",array('email' => $email));
        
        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else
        {
        return 0;
        }
    }
    public function updatePassword($data,$id)
    {
        $this->db->where('id',$id);
        if($this->db->update("tbl_users",$data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function auth_activity($user_id,$auth_status,$login_status="")
    {
         $data = array();
          switch ($auth_status)
          {
            case 1 : $data = array('auth_status' => $auth_status,'user_id' => $user_id,'created_date' => date('Y-m-d H:i:s'));
            break;
            case 2 : $data = array('auth_status' => $auth_status,'mod_date' => date('Y-m-d H:i:s'));
            break;
            case 3 : $data = array('auth_status' => $auth_status,'mod_date' => date('Y-m-d H:i:s'));
            break;
          }
         
          if($auth_status==1)
          {
          if($login_status==1)
          {
            $this->db->where('auth_status',2);
            $this->db->where('user_id',$user_id);
            $this->db->update("tbl_authencticate_status",array('auth_status' => 1, 'mod_date' => date('Y-m-d H:i:s')));
            //echo $this->db->last_query(); die;
          }
          else
          {
          $this->db->insert("tbl_authencticate_status",$data);
          }
          }
          else
          {
            
            $userLastId = $this->getUserLastLoginId($user_id)[0];
            $this->db->where('user_id',$user_id);
            // $this->db->update("tbl_authencticate_status",$data);
            // echo $this->db->last_query(); die;
            if($this->db->update("tbl_authencticate_status",$data))
            {
                return true;
            }
          }
    }
    public function getUserLastLoginId($user_id)
    {
        $this->db->where("user_id",$user_id);
        $this->db->where("auth_status!=",3);
        $this->db->order_by("id","DESC");
        $query = $this->db->get("tbl_authencticate_status");
        return $query->result_array();  
      
    }
    public function getUserLogLastId($user_id)
    {
        $getLogId = "";
        $this->db->limit(1);
        $this->db->where("user_id",$user_id);
        $this->db->where("title like 'Login User Name%'");
        $this->db->order_by("id","DESC");
        $query = $this->db->get("tbl_log");
        $result =  $query->result();
        // $data['activity_detail'] = array('user' => '54566776');
        $data['activity_detail'] = $this->getUserLastActivity_id($result[0]->id,$user_id);
        return $data;
    }
    public function getUserLastActivity_id($user_last_id,$user_id)
    {
        
        $data = array();
        $this->db->where("id > ",$user_last_id);
        $this->db->where("user_id",$user_id);
        $this->db->limit(1);
        $this->db->order_by("id","DESC");
        $query = $this->db->get("tbl_log");
        if($query->num_rows()>0)
        {
        foreach($query->result() as $key=>$result)
        {
            $data[] = $result;
        }
        return $data;
    }
    return false;
        
    }
    public function getUserLoginTime($user_id)
    {
        $this->db->where('auth_status!=',3);
        $this->db->limit(1);
        $this->db->order_by('id','desc');
        $this->db->where('user_id',$user_id);
        $query = $this->db->get("tbl_authencticate_status")->result();
        return $query;
    }
    public function checkUserLogin($user_id)
    {
        $this->db->where('auth_status!=',3);
        // $this->db->limit(1);
        $this->db->order_by('id','desc');
        $this->db->where('user_id',$user_id);
        $query = $this->db->get("tbl_authencticate_status")->result();
        return $query;
    }
    public function userSleepMode($user_id,$auth_status)
    {
        $data = array('auth_status' => $auth_status,'mod_date' => date('Y-m-d H:i:s'));
        $this->db->order_by("id","desc");
        $this->db->limit(1);
        $this->db->where('user_id',$user_id);
        if($this->db->update("tbl_authencticate_status",$data))
        {
            return true;
        }
    }
     
    public function getUserListLoginTime()
    {
        $data = array();
        $this->db->where('auth_status!=',3);
        $this->db->order_by('created_date','asc');
        $query = $this->db->get("tbl_authencticate_status");
        if($query->num_rows()>0)
        {
            foreach($query->result() as $key=>$record)
            {
                $data[] = $record;
            }
            return $data;
        }
        return false;
    }
    public function getUserLogout($user_id)
    {
        $data = array('auth_status' => 3,'mod_date' => date('Y-m-d H:i:s'));
        $this->db->where('user_id',$user_id);
        $this->db->where('auth_status!=',3);
        $query = $this->db->update("tbl_authencticate_status",$data);
        if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getuserid($username){
        $this->db->where('status',1);
        $this->db->where('username',$username);
        $query = $this->db->get('tbl_users');
        return $query->result();
    }

    public function getDetailByuserid($user_id){
        $this->db->where('status',1);
        $this->db->where('id',$user_id);
        $query = $this->db->get('tbl_users');
        return $query->result();
    }

    public function getIpaddress($user_id){
        $this->db->where('status',1);
        $this->db->where('user_login_id',$user_id);
        $query = $this->db->get('tbl_user_login_activity');
        
        return $query->result();
    }

    public function emailotpsave($data){
     if($this->db->insert('tbl_otp',$data)){
        return true;
     }
     else{
        return false;
     }
    }

    public function getEmail($id){
        $this->db->where('status',1);
        $this->db->where('id',$id);
        $query = $this->db->get('tbl_users');
        return $query->result();
    }

    public function getOtpemail($user_id,$step,$type){
        $this->db->where('status',1);
        $this->db->where('otp_status',1);
        $this->db->where('user_id',$user_id);
        $this->db->where('otp_type',$type);
        $this->db->where('otp_verify_step',$step);
        $this->db->order_by('id','desc');
        $this->db->limit('1');
        $query = $this->db->get('tbl_otp');
        return $query->result();
    }

    public function updateEmailotpstatus($id,$step,$type){
        $this->db->set('verify_otp',1);
        $this->db->set('otp_status',1);
        $this->db->set('status',2);
        $this->db->where('otp_type',$type);
        $this->db->where('otp_verify_step',$step);
        $this->db->where('id',$id);
        $this->db->where('status',1);
        if($this->db->update('tbl_otp')){
           
            return true;
        }else{
            return false;
        }
    }

    public function manage_user_login($detail)
    {
        $data = array(
            'user_id'      => $detail['user_id'],
            'ip_address'   => $detail['ip_address'],
            'user_agent'   => $detail['user_agent'],
            'location'   => $detail['system_info']['getLocation']->city,
            'created_date' => date('Y-m-d H:i:s')
        );
        if($this->db->insert("tbl_user_auth",$data))
        {
            $auth_user_id = $this->db->insert_id();
            $this->manage_user_login_activity($auth_user_id,$detail,1);
            return $auth_user_id;
        }
    }

    public function manage_user_login_activity($user_auth_id,$data,$login_status)
    {
         $record = array(
            'user_auth_id' => $user_auth_id,
            'ip_address'   =>  $data['ip_address'],
            'user_agent'   =>  $data['user_agent'],
            'device_name'  =>  $data['system_info']['get_device'],
            'os_name'      =>  $data['system_info']['get_os'],
            'browser'      =>  $data['system_info']['get_browser'],
            'hostname'     =>  $data['system_info']['getLocation']->hostname,
            'city'         =>  $data['system_info']['getLocation']->city,
            'region'       =>  $data['system_info']['getLocation']->region,
            'country'      =>  $data['system_info']['getLocation']->country,
            'loc'          =>  $data['system_info']['getLocation']->loc,
            'org'          =>  $data['system_info']['getLocation']->org,
            'postal'       =>  $data['system_info']['getLocation']->postal,
            'timezone'     =>  $data['system_info']['getLocation']->timezone,
            'login_status' =>  $login_status,
            'login_date'   =>  date('Y-m-d H:i:s')
         );
         
         if($this->db->insert("tbl_user_login_activity",$record))
         {
            return true;
         }
    }

    public function getUserLoginStatus($user_id)
    {
        $query = $this->db->get_where("tbl_user_auth",array('user_id' => $user_id, 'cookie_expire_status' => 1))->result();
        return $query;

    }


    private static function get_user_agent() {
		return  $_SERVER['HTTP_USER_AGENT'];
	}

	public static function get_ip() {
		$mainIp = '';
		if (getenv('HTTP_CLIENT_IP'))
			$mainIp = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$mainIp = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$mainIp = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$mainIp = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
			$mainIp = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$mainIp = getenv('REMOTE_ADDR');
		else
			$mainIp = 'UNKNOWN';
		return $mainIp;
	}

	public static function get_os() {

		$user_agent = self::get_user_agent();
		$os_platform    =   "Unknown OS Platform";
		$os_array       =   array(
			'/windows nt 10/i'     	=>  'Windows 10',
			'/windows nt 6.3/i'     =>  'Windows 8.1',
			'/windows nt 6.2/i'     =>  'Windows 8',
			'/windows nt 6.1/i'     =>  'Windows 7',
			'/windows nt 6.0/i'     =>  'Windows Vista',
			'/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
			'/windows nt 5.1/i'     =>  'Windows XP',
			'/windows xp/i'         =>  'Windows XP',
			'/windows nt 5.0/i'     =>  'Windows 2000',
			'/windows me/i'         =>  'Windows ME',
			'/win98/i'              =>  'Windows 98',
			'/win95/i'              =>  'Windows 95',
			'/win16/i'              =>  'Windows 3.11',
			'/macintosh|mac os x/i' =>  'Mac OS X',
			'/mac_powerpc/i'        =>  'Mac OS 9',
			'/linux/i'              =>  'Linux',
			'/ubuntu/i'             =>  'Ubuntu',
			'/iphone/i'             =>  'iPhone',
			'/ipod/i'               =>  'iPod',
			'/ipad/i'               =>  'iPad',
			'/android/i'            =>  'Android',
			'/blackberry/i'         =>  'BlackBerry',
			'/webos/i'              =>  'Mobile'
		);

		foreach ($os_array as $regex => $value) {
			if (preg_match($regex, $user_agent)) {
				$os_platform    =   $value;
			}
		}   
		return $os_platform;
	}

	public static function  get_browser() {

		$user_agent= self::get_user_agent();

		$browser        =   "Unknown Browser";

		$browser_array  =   array(
			'/msie/i'       =>  'Internet Explorer',
			'/Trident/i'    =>  'Internet Explorer',
			'/firefox/i'    =>  'Firefox',
			'/safari/i'     =>  'Safari',
			'/chrome/i'     =>  'Chrome',
			'/edge/i'       =>  'Edge',
			'/opera/i'      =>  'Opera',
			'/netscape/i'   =>  'Netscape',
			'/maxthon/i'    =>  'Maxthon',
			'/konqueror/i'  =>  'Konqueror',
			'/ubrowser/i'   =>  'UC Browser',
			'/mobile/i'     =>  'Handheld Browser'
		);	

		foreach ($browser_array as $regex => $value) {

			if (preg_match($regex, $user_agent)) {
				$browser    =   $value;
			}

		}

		return $browser;

	}

	public static function  get_device(){

		$tablet_browser = 0;
		$mobile_browser = 0;

		if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
			$tablet_browser++;
		}

		if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
			$mobile_browser++;
		}

		if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
			$mobile_browser++;
		}

		$mobile_ua = strtolower(substr(self::get_user_agent(), 0, 4));
		$mobile_agents = array(
			'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
			'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
			'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
			'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
			'newt','noki','palm','pana','pant','phil','play','port','prox',
			'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
			'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
			'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
			'wapr','webc','winw','winw','xda ','xda-');

		if (in_array($mobile_ua,$mobile_agents)) {
			$mobile_browser++;
		}

		if (strpos(strtolower(self::get_user_agent()),'opera mini') > 0) {
			$mobile_browser++;
	            //Check for tablets on opera mini alternative headers
			$stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
			if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
				$tablet_browser++;
			}
		}

		if ($tablet_browser > 0) {
	           // do something for tablet devices
			return 'Tablet';
		}
		else if ($mobile_browser > 0) {
	           // do something for mobile devices
			return 'Mobile';
		}
		else {
	           // do something for everything else
			return 'Computer';
		}   
	}

    public function getLocationByIp($ip_address)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $details = json_decode(file_get_contents("http://ipinfo.io/$ip_address/json"));
        return $details; // -> "Mountain View"
    }

    public function checkCookies($data)
    {
        if(!empty($_COOKIE['userloggedIn']))
        {
            $cookies_Detail = json_decode($_COOKIE['userloggedIn']);
            if(($data['user_id']==$cookies_Detail->user_id) && ($data['username']==$cookies_Detail->username) && ($data['user_agent']==$cookies_Detail->user_agent))
            {
                //true : user cookie is exist. user has logged in already in this system or browser
                return true;
            }
            else
            {
                // false : cookies not exist means user attempt first time login into this system or browser. it's for two step verification
                return false;
            }
        }
        else
        {
        // false : cookies not exist means user attempt first time login into this system or browser. it's for two step verification
        return false;
        }
    }

    public function getUserInfo($id){
        $this->db->where('status',1);
        $this->db->where('id',$id);
        $query = $this->db->get('tbl_users');
        return $query->result();
    }

    public function updateLogoutActivity($user_detail,$login_status)
    {
        $record = json_decode($user_detail['userloggedIn']);
        $getUserAuth = $this->getUserAuthDetail($record)[0];
        $get_device = $this->get_device();
        $get_user_agent = $this->get_user_agent();
        $get_ip = $this->get_ip();
        $get_os = $this->get_os();
        $get_browser = $this->get_browser();
        $getLocation = $this->getLocationByIp($get_ip);
        if(!empty($getUserAuth))
        {
            $data = array(
              'user_auth_id'  => $getUserAuth->user_auth_id,
              'ip_address'    => $get_ip,
              'user_agent'    => $get_user_agent,
              'device_name'   => $get_device,
              'os_name'       => $get_os,
              'browser'       => $get_browser,
              'hostname'      => $getLocation->hostname,
              'city'          => $getLocation->city,
              'region'        => $getLocation->region,
              'country'       => $getLocation->country,
              'loc'           => $getLocation->loc,
              'org'           => $getLocation->org,
              'postal'        => $getLocation->postal,
              'timezone'      => $getLocation->timezone,
              'login_status'  => $login_status,
              'login_date'    => date('Y-m-d H:i:s'),
              'logout_date'   => date('Y-m-d H:i:s')
            );
            if($this->db->insert("tbl_user_login_activity",$data))
            {
                return true;
            }
            return false;
        }
    }

    public function getUserAuthDetail($record)
    {
        $this->db->where('login_date',$record->created_date);
        $result = $this->db->get('tbl_user_login_activity')->result();
        return $result;
    }

    public function getCookieDetail($user_detail)
    {
        $record = json_decode($user_detail['userloggedIn']);
       
        $getUserAuth = $this->getUserAuthDetailLogin($record)[0];
        return $getUserAuth;
    }

    public function getUserAuthDetailLogin($record)
    {
        $result = array();
        $this->db->where('login_date',$record->created_date);
        $this->db->select('a.*,b.expiry_days,b.cookie_expire_status');
        $this->db->join("tbl_user_auth b","a.user_auth_id=b.id","INNER");
        $result = $this->db->get('tbl_user_login_activity a')->result();
        return $result;
    }

    public function cookies_destroy_by_super_admin($auth_id)
    {
        $cookie = array(
            'cookie_expire_status' => 3,
            'cookies_expire_time'  => date('Y-m-d H:i:s')
        );
        $this->db->where('id',$auth_id);
        if($this->db->update("tbl_user_auth",$cookie))
        {
            return true;
        }
    }

    public function update_user_auth($user_auth_id,$user_detail)
    {
        $data = array(
            'cookies_expire_time' => date('Y-m-d H:i:s'),
            'cookie_expire_status' => 3
        );
        $this->db->where('user_id',$user_detail['user_id']);
        $this->db->where('id!=',$user_auth_id);
        if($this->db->update("tbl_user_auth",$data))
        {
            return true;
        }
        

    }
    public function getadmindetail(){
        $this->db->where('status',1);
        $this->db->where('role_id',1);
        $query = $this->db->get('tbl_users');
        return $query->result();
    }
}