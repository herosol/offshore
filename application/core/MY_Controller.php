<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
    public $data = array();

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('twilio');
        $this->data['site_settings'] = $this->getSiteSettings();
        $this->data['page'] = $this->uri->segment(1);
        // $this->data['mem_data'] = $this->getActiveMem();
        $this->ip_address=getUserIpAddr();
        $this->data['page_404']=false;
    }
    function sendMessage($mem_data)        {
        $settings = $this->getSiteSettings();
                 
        $from = $settings->site_noreply_email;
        $subject = $mem_data['name']." asks a query about ".$mem_data['subject']." on ".$settings->site_name;
        $emailto=$settings->site_email_send;
         
        $this->load->library('email');
        $this->email->set_mailtype("html"); 
        $this->email->set_newline("\r\n"); 
        $this->email->from($from,$settings->site_name);    
        $this->email->to($emailto);
        $this->email->subject($subject);
        $arr=array( 
            'subject'=>$mem_data['subject'],
            'phone'=>$mem_data['phone'],
            'email'=>$mem_data['email'],
            'name'=>$mem_data['name'],
            'message'=>$mem_data['msg'],
            'site_name'=> $settings->site_name, 
        );           
        $this->data['email_body']=$arr;
        $this->data['email_subject']=$subject;
        $this->data['settings']=$settings;
        $message = $this->load->view('includes/contact_template',$this->data,TRUE); 
        // pr($message);
        $this->email->message($message); 
        if($this->email->send()){
            return true;            
        }            
        else{ 
            $error=$this->email->print_debugger();
            print_r($this->email->print_debugger());die;
            return $error;
        }        
    }
    function sendLoanRequest($mem_data)        {
        $settings = $this->getSiteSettings();
                 
        $from = $settings->site_noreply_email;
        $subject = "Your request for loan sent successfully on ".$settings->site_name;
        $emailto=$mem_data['email'];
         
        $this->load->library('email');
        $this->email->set_mailtype("html"); 
        $this->email->set_newline("\r\n"); 
        $this->email->from($from,$settings->site_name);    
        $this->email->to($emailto);
        $this->email->subject($subject);        
        $this->data['email_body']=$mem_data;
        $this->data['email_subject']=$subject;
        $this->data['settings']=$settings;
        $this->data['user']=true;
        $message = $this->load->view('includes/email_template',$this->data,TRUE); 
        // pr($message);
        $this->email->message($message); 
        if($this->email->send()){
            return true;            
        }            
        else{ 
            $error=$this->email->print_debugger();
            print_r($this->email->print_debugger());die;
            return $error;
        }        
    }
    function sendLoanRequestAdmin($mem_data)        {
        $settings = $this->getSiteSettings();
                 
        $from = $settings->site_noreply_email;
        $subject = $mem_data['name']." sent loan request on ".$settings->site_name;
        $emailto=$settings->site_email_send;
         
        $this->load->library('email');
        $this->email->set_mailtype("html"); 
        $this->email->set_newline("\r\n"); 
        $this->email->from($from,$settings->site_name);    
        $this->email->to($emailto);
        $this->email->subject($subject);        
        $this->data['email_body']=$mem_data;
        $this->data['email_subject']=$subject;
        $this->data['settings']=$settings;
        $message = $this->load->view('includes/email_template',$this->data,TRUE); 
        // pr($message);
        $this->email->message($message); 
        if($this->email->send()){
            return true;            
        }            
        else{ 
            $error=$this->email->print_debugger();
            print_r($this->email->print_debugger());die;
            return $error;
        }        
    }
    function send_website_email($mem_data,$key)        {
		$name=$mem_data['name'];			
		$settings = $this->getSiteSettings();			
		$msg_body=getSiteText('email',$key);			
		eval("\$msg_body = \"$msg_body\";");			
		if(!empty($mem_data['link'])){	
			if($key=='forgot_password'){
				$msg_body.="<p><a href='{$mem_data['link']}' style='background:#37b36f;color:#fff;padding:5px 20px;border-radius:4px; text-decoration: none;'>Reset Password</a></p>";
			}
			else{
				$msg_body.="<p><a href='{$mem_data['link']}' style='background:#37b36f;color:#fff;padding:5px 20px;border-radius:4px; text-decoration: none;'>Activate Your Account</a></p>";
			}
			
		}			
		$emailto = $mem_data['email'];
		$subject = $settings->site_name." - ".getSiteText('email', $key,'subject');
		$from=$settings->site_noreply_email; 
		$this->load->library('email');
		$this->email->set_mailtype("html"); 
		$this->email->set_newline("\r\n"); 
		$this->email->from($from);    
		$this->email->to($emailto);
		$this->email->subject($subject);
		$arr=array( 
			'name'=>$mem_data['name'],
			'email'=>$mem_data['email'],
			'site_name'=> $settings->site_name, 
			'link'=> $mem_data['link'], 
		);            
		$this->data['email_body']=$msg_body;
		$this->data['email_subject']=$subject;
		$message = $this->load->view('includes/email_template',$this->data,TRUE); 
		$this->email->message($message); 
		if($this->email->send()){
			return true;            
		}            
		else{ 
			$error=$this->email->print_debugger();
			print_r($this->email->print_debugger());die;
			return $error;
        }        
	}
    public function isMemLogged($type, $member_type='',$is_verified = true, $type_arr = array('buyer','owner'), $phone_verified = false)
    {
        
        if(!empty($member_type)){
            if($type!=$member_type){
                redirect('dashboard', 'refresh');
                exit;
            }
        }
        
        if (intval($this->session->mem_id) < 1 || !$this->session->has_userdata('mem_type') || $this->session->mem_type != $type) {
            $remember_cookie = $this->input->cookie('ricoza_remember');
            if($remember_cookie && $row = $this->master->getRow('members', array('mem_remember' => $remember_cookie))) {
                $this->session->set_userdata('mem_id', $row->mem_id);
                $this->session->set_userdata('mem_type', $row->mem_type);

                /*
                if(empty($row->mem_verified) || $row->mem_verified==0){
                    redirect('phone-verification', 'refresh');
                    exit;
                }
                */
            } else {
                $this->session->set_userdata('redirect_url', currentURL());
                redirect('signin', 'refresh');
                exit;
            }
        }
        $this->type_logged_checked($type_arr);
        if($is_verified)
            $this->is_verified();

        // if($phone_verified)
        //     $this->is_phone_verified();
    }

    public function type_logged_checked($type_arr)
    {
        if ($this->session->mem_type && !in_array($this->session->mem_type, $type_arr)) {
            redirect('signin', 'refresh');
            exit;
        }
    }

    function is_verified()
    {
        if(empty($this->data['mem_data']->mem_verified) || $this->data['mem_data']->mem_verified == 0) {
            redirect('email-verification', 'refresh');
            exit;
        }
        if($row = $this->master->getRow('members', array('mem_id' => $this->session->mem_id,'mem_type'=>'owner'))){
            
            if($row->mem_admin_verify==0){
                $this->session->set_userdata('mem_type', $row->mem_type);
                redirect('admin-verification', 'refresh');
            }
        }
        
    }

    function is_phone_verified()
    {
        if(empty($this->data['mem_data']->mem_phone_verified) || $this->data['mem_data']->mem_phone_verified == 0) {
            redirect('phone-verification', 'refresh');
            exit;
        }
    }

    public function MemLogged()
    {
        $remember_cookie = $this->input->cookie('ricoza_remember');
        if($remember_cookie && $row = $this->master->getRow('members', array('mem_remember' => $remember_cookie))) {
            $this->session->set_userdata('mem_id', $row->mem_id);
            $this->session->set_userdata('mem_type', $row->mem_type);
            redirect('dashboard', 'refresh');
            exit;
        } elseif (($this->session->mem_id > 0) && $this->session->has_userdata('mem_type')) {
            redirect('dashboard', 'refresh');
            exit;
        }
    }

    function getActiveMem()
    {
        $row = $this->master->getRow('members', array('mem_id' => $this->session->mem_id));
        /*
        if($row && $this->session->mem_type == 'sitter') {
            $row->mem_sub_subjects = $this->master->query("select s.*, ts.mem_id from tbl_subjects s,tbl_sitter_subjects ts where s.id = ts.subject_id and s.status = 1 and ts.type = 'sub' and ts.mem_id = ".$this->session->mem_id);
            $row->mem_main_sub = $this->master->getRow('sitter_subjects', array('mem_id' => $this->session->mem_id,'type' => 'main'));
            // $row->mem_gems = get_mem_gems($this->session->mem_id);
        pr($row);
        }
        */
        return $row;
    }

    function getSiteSettings()
    {
        return $this->master->getRow("siteadmin", array('site_id' => '1'));
    }

    function send_site_email($mem_data, $key)
    {

        // $this->load->model('member_model', 'member');
        $settings = $this->data['site_settings'];
        // $mem_row = $this->member->getMember($mem_id);
        
        $name = $mem_data['name'];
        // $name=$mem_row->mem_fname . ' ' . $mem_row->mem_lname;
        
        $msg_body = getSiteText('email', $key);
        eval("\$msg_body = \"$msg_body\";");
        
        if(!empty($mem_data['link'])){
            // $verify_link = site_url('verification/' .$mem_row->mem_code);
            $msg_body.="<p><a href='{$mem_data['link']}' style='color: #37b36f; text-decoration: none;'>".$mem_data['link']."</a></p>";
        }

        // $emailto = $mem_row->mem_email;
        $emailto = $mem_data['email'];
        $subject = $settings->site_name." - ".getSiteText('email', $key,'subject');
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html;charset=utf-8\r\n";
        $headers .= "From: " . $settings->site_name . " <" . $settings->site_email . ">" . "\r\n";
        $headers .= "Reply-To: " . $settings->site_name . " <" . $settings->site_email . ">" . "\r\n";

        $this->data['email_body'] = $msg_body;
        $this->data['email_subject'] = $subject;
        $ebody = $this->load->view('includes/template-email', $this->data, TRUE);
        if (@mail($emailto, $subject, $ebody, $headers)) {
            return 1;
        } else {
            return 0;
        }
    }

    /*
    function send_signup_email($mem_id)
    {

        $this->load->model('member_model', 'member');
        $settings = $this->data['site_settings'];
        $mem_row = $this->member->getMember($mem_id);
        $verify_link = site_url('verification/' .$mem_row->mem_code);
        $msg_body = "<h4 style='text-align:left;padding:0px 20px;margin-bottom:0px;'>Dear " . $mem_row->mem_fname . ' ' . $mem_row->mem_lname . ",</h4>
        <p style='text-align:left;padding:5px 20px;'>" . getSiteText('email','signup') . "</p>
        <p style='text-align:left;padding:5px 20px;'>Please click on the link below to verify your account.</p>
        <p style='text-align:left;padding:5px 20px;'><a href='$verify_link'>".$verify_link."</a></p>";

        $emailto = $mem_row->mem_email;
        $subject = "Thank you for registering with ".$settings->site_name;
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html;charset=utf-8\r\n";
        $headers .= "From: " . $settings->site_name . " <" . $settings->site_email . ">" . "\r\n";
        $headers .= "Reply-To: " . $settings->site_name . " <" . $settings->site_email . ">" . "\r\n";

        $this->data['email_body'] = $msg_body;
        $this->data['email_subject'] = $subject;
        $ebody = $this->load->view('includes/template-email', $this->data, TRUE);

        if (@mail($emailto, $subject, $ebody, $headers)) {
            return 1;
        } else {
            return 0;
        }
    }
    */
}

class Admin_Controller extends CI_Controller
{

    protected $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->data['adminsite_setting'] = $this->getAdmineSettings();
    }

    public function isLogged()
    {
        if ($this->session->loged_in < 1) {
            $this->session->set_userdata('admin_redirect_url', currentURL());
            redirect(ADMIN . '/login', 'refresh');
            exit;
        }
    }

    public function logged()
    {
        if ($this->session->loged_in > 0) {
            redirect(ADMIN , 'refresh');
            exit;
        }
    }

    function getAdmineSettings()
    {
        return $this->master->getRow("siteadmin", array('site_id' => '1'));
    }
}
?>