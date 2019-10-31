<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Mails_model extends CI_Model  {


  public function __construct()
  {
    parent::__construct();
	$this->load->library('email');
  }
	public function sendMail($to,$message,$template)
	{
	 
	  	$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'uvizag@gmail.com',
			'smtp_pass' => '',
			'mailtype'  => 'html', 
			'charset'   => 'utf-8',
			'newline'   => "\r\n",
			'wordwrap'   => TRUE,
			'smtp_timeout'   => 30
			
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("html");
		
		
		$this->email->from('info@overallfree.com', 'admin');
		$this->email->to($to);
		
		if($template == 'register'){
		$this->email->subject('Registration Verification:');
		$msg = '<style>
body {
    overflow-x: hidden;
}
body,ul,h1,h2,h3,h4,h5,h6{
	margin:0;
	padding:0;
	list-style:none;
	letter-spacing:0.2px;
}
a{Cursor:pointer}

.theme-layout {
    float: left;
	width:100%;
}
.theme-layout.boxed {
    margin:0 auto;
    width:1230px;
    display:block;
    float: none;
    overflow:hidden;
    position:relative;
    z-index:0;
    background:none repeat scroll 0 0 #FFFFFF;

    -webkit-box-shadow:0 0 10px #000000;
    -moz-box-shadow:0 0 10px #000000;
    -ms-box-shadow:0 0 10px #000000;
    -o-box-shadow:0 0 10px #000000;
    box-shadow:0 0 10px #000000;
}
.form-button,
.submit1 a
{
background-color:#930000;
}

.form-button {
    border:0 none;
    color:#FFFFFF;
    float:left;
    font-family:arial;
    font-size:12px;
    padding:17px 30px;
    margin-top:20px;	
    -webkit-border-radius:5px;
    -moz-border-radius:5px;
    -ms-border-radius:5px;
    -o-border-radius:5px;
    border-radius:5px;
}
</style>
<div class="theme-layout">
<div style="border:dashed 1px #910000; width:600px; margin:10px auto; color:#7C7C7C; height:427px;">
<div align="center" style="margin-top:10px;"><img src='.base_url('assets/images/emaillogo.png').' align="middle" class="img-responsive"></div><div style="padding:30px;"><p><h5> <strong>Please confirm your email address by clicking the link below.</strong></h5></p><p><h5>We may need to send you critical information about our service and it is important that we have an accurate email address.</h5></p><p align="center"><a href='.base_url('users/activeuser/'.$message).'>Activate your Account</a></p></div><div style="width:100%; height:122px; margin-top:60PX; background-color:#EFEFEF"><div style="padding:20px;"><p><h5> <strong>Thanks,</strong></h5></p><p><h5> <strong>Sarada Seva Sangam</strong></h5></p></div></div></div></div>';
		}else if($template == 'forgetPassword'){
		$this->email->subject('Forget Password - sarada seva sagam:');
		$msg = '<style>
body {
    overflow-x: hidden;
}
body,ul,h1,h2,h3,h4,h5,h6{
	margin:0;
	padding:0;
	list-style:none;
	letter-spacing:0.2px;
}
a{Cursor:pointer}

.theme-layout {
    float: left;
	width:100%;
}
.theme-layout.boxed {
    margin:0 auto;
    width:1230px;
    display:block;
    float: none;
    overflow:hidden;
    position:relative;
    z-index:0;
    background:none repeat scroll 0 0 #FFFFFF;

    -webkit-box-shadow:0 0 10px #000000;
    -moz-box-shadow:0 0 10px #000000;
    -ms-box-shadow:0 0 10px #000000;
    -o-box-shadow:0 0 10px #000000;
    box-shadow:0 0 10px #000000;
}
.form-button,
.submit1 a
{
background-color:#930000;
}

.form-button {
    border:0 none;
    color:#FFFFFF;
    float:left;
    font-family:arial;
    font-size:12px;
    padding:17px 30px;
    margin-top:20px;	
    -webkit-border-radius:5px;
    -moz-border-radius:5px;
    -ms-border-radius:5px;
    -o-border-radius:5px;
    border-radius:5px;
}
</style>
<div class="theme-layout">
<div style="border:dashed 1px #910000; width:600px; margin:10px auto; color:#7C7C7C; height:427px;">
<div align="center" style="margin-top:10px;"><img src='.base_url('assets/images/emaillogo.png').' align="middle" class="img-responsive"></div><div style="padding:30px;"><p><h5> <strong>Please Create new password. Please</strong></h5><a href='.base_url('users/newpassword/'.$message).'>Click here</a>to create</p></div><div style="width:100%; height:122px; margin-top:60PX; background-color:#EFEFEF"><div style="padding:20px;"><p><h5> <strong>Thanks,</strong></h5></p><p><h5> <strong>Sarada Seva Sangam</strong></h5></p></div></div></div></div>';			
		}else if($template == 'adminusers'){
		$this->email->subject('Login Details - sarada seva sagam:');
		$msg = "Please login into your account. Please <a href=".base_url('admin').">Click here</a> to Create </br><p>Username: ".$message['username']."</p><p>Password: ".$message['password']."</p>";			
		}else if($template == 'contact'){
		$this->email->subject('Contact us Details - sarada seva sagam:');
		$num = isset($message['number'])?$message['number']:'';
		$msg = '<style>
body {
    overflow-x: hidden;
}
body,ul,h1,h2,h3,h4,h5,h6{
	margin:0;
	padding:0;
	list-style:none;
	letter-spacing:0.2px;
}
a{Cursor:pointer}

.theme-layout {
    float: left;
	width:100%;
}
.theme-layout.boxed {
    margin:0 auto;
    width:1230px;
    display:block;
    float: none;
    overflow:hidden;
    position:relative;
    z-index:0;
    background:none repeat scroll 0 0 #FFFFFF;

    -webkit-box-shadow:0 0 10px #000000;
    -moz-box-shadow:0 0 10px #000000;
    -ms-box-shadow:0 0 10px #000000;
    -o-box-shadow:0 0 10px #000000;
    box-shadow:0 0 10px #000000;
}
.form-button,
.submit1 a
{
background-color:#930000;
}

.form-button {
    border:0 none;
    color:#FFFFFF;
    float:left;
    font-family:arial;
    font-size:12px;
    padding:17px 30px;
    margin-top:20px;	
    -webkit-border-radius:5px;
    -moz-border-radius:5px;
    -ms-border-radius:5px;
    -o-border-radius:5px;
    border-radius:5px;
}
</style>
<div class="theme-layout">
<div style="border:dashed 1px #910000; width:600px; margin:10px auto; color:#7C7C7C; height:427px;">
<div align="center" style="margin-top:10px;"><img src='.base_url('assets/images/emaillogo.png').' align="middle" class="img-responsive"></div><div style="padding:30px;"><p><b>Name:</b> '.$message['name'].'</p>
<p><b>Email:</b> '.$message['email'].'</p>
<p><b>Message:</b> '.$message['msg'].'</p><p><b>Phone no:</b>'.$num.'</p></div><div style="width:100%; height:122px; margin-top:60PX; background-color:#EFEFEF"><div style="padding:20px;"><p><h5> <strong>Thanks,</strong></h5></p><p><h5> <strong>Sarada Seva Sangam</strong></h5></p></div></div></div></div>';
		
       
		}
		
		
		$this->email->message($msg);
		if ( ! $this->email->send()) {
			show_error($this->email->print_debugger());
		}else{
			return true;
		} 
		
		
	}
	
	public function serverEmail($to,$message,$template)
	{
		$config['protocol'] = "smtp";
		$config['smtp_crypto'] = "ssl";
		$config['smtp_host'] = 'sg2plcpnl0007.prod.sin2.secureserver.net';
		$config['smtp_port'] = '465';
		$config['smtp_user'] = 'info@vizagupdates.com';
		$config['smtp_pass'] = '';
		$config['mailtype'] = 'html';
		$config['charset'] = 'utf-8';
		$config['newline'] = "\r\n";
		$config['wordwrap'] = TRUE;
		$config['smtp_timeout'] = 30;
		
		$this->email->initialize($config); 
		$this->email->set_newline("\r\n");
		
		$this->email->from('info@vizagupdates.com', 'Vizag updates');
		$this->email->to($to); 
		$this->email->subject('Activation link...! Vizag updates');
		$msg = "Thanks for signing up! Your account has been created. Please <a href=".base_url('users/activeuser/'.$message).">Click here</a> to <b>Activation</b>";
		$this->email->message($msg);
        $this->email->send();
		echo $this->email->print_debugger();	
	}
	
	
	
}