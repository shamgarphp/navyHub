<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('upload');
    }
    
    public function index() /*admin users login*/ 
    {
        $this->form_validation->set_rules('admin_email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('pass','Password','trim|required');
        if ($this->form_validation->run() == FALSE) 
        { 
            $this->load->view('login');
            /*admin front end validations*/
            $this->load->view('all_common_js/frontend_validation_js.php');    
        } 
        else 
        {  
			$email =   $this->input->post('admin_email');
            if (isset($email) && !empty($email))
            {
                $email  = $this->input->post('admin_email');
                $pwd    = base64_encode($this->input->post('pass'));
                $result = $this->Admin_model->getOne($email,$pwd);
                if (isset($result['admin_id']) && !empty($result['admin_id'])) 
                {
                    $newdata = array(
                        'email' => $result['email'],
                        'admin_id' => $result['admin_id'],
                        'admin_username' => $result['name'],
                        'logged_in' => TRUE
                    );
                    if ($newdata['logged_in'] == 1) 
                    {
                        $this->session->set_userdata($newdata);
                        $this->session->set_flashdata('success','Welcome '.$_SESSION['admin_username']);
                        redirect(base_url('admin_dashboard'));
                    } 
                    else 
                    {
                        $this->session->set_flashdata('error', 'Invalid details provided.');
                        redirect('admin');
                    }
                } 
                else 
                {
                    $this->session->set_flashdata('error', 'Invalid details provided.');
                    redirect('admin');
                }
            }
            else
            {
               $this->session->set_flashdata('error', 'Invalid details provided.');
                redirect('admin'); 
            }
            
        }    
    }
    
    public function update_user() /*This is the admin users registration*/ 
    {
        $admin_id  = $this->session->userdata('admin_id');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('admin_email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == FALSE) 
        {
            $data['admins_user_edit'] = $this->Admin_model->get_user($admin_id); 
            $data['file']          = 'admin_users/edit_user';
            $data['validation_js']       = 'admin/all_common_js/frontend_validation_js';
            /*load admin templeate.send all data this admin templeate*/
            $this->load->view('admin_template/main', $data);
        } 
        else
        {
            if (isset($_POST['update_user']) &&  !empty($_POST['update_user'])) 
            {     
                $data  = array(
                    'name' =>  $this->input->post("username"),
                    'email' => $this->input->post("admin_email"),
                    'created_on' => date('Y-m-d H:i:s')
                );
                
                $result = $this->Admin_model->profile_update($data,$admin_id);
                if ($result) 
                {     
                        $this->session->set_flashdata('success', 'Profile update successfully');
                        redirect('profile');
                } 
                else 
                {
                    $this->session->set_flashdata('error', 'User registration failed please  try again');
                    redirect('profile');
                }
            }
            else
            {
                $this->session->set_flashdata('error', 'User registration failed. Please try again');
                   redirect('profile');
            }       
        }
    }
    
    public  function  forgotpass_email()
    {
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        if ($this->form_validation->run() == FALSE) 
        { 
            $this->load->view('admin_users/forgotpass_email');
            /*admin front end validations*/
            $this->load->view('all_common_js/frontend_validation_js.php');    
        } 
        else 
        {  
            if (isset($_POST['admin_email']) &&  !empty($_POST['admin_email'])) 
            {  
                $email =   $this->input->post('email');
                if (isset($email) && !empty($email))
                {
                    $result = $this->Admin_model->check_user_email($email);
                    if (isset($result['admin_id']) && !empty($result['admin_id'])) 
                    {
                        $user_id = base64_encode($result['admin_id']);
                        $url = base_url()."create_pass?user_id=".$user_id;
                        $data_email = array(
                            'user_email' => $email,
                            'from' => 'info@legalbots.com',
                            'subject' => 'Registration Verification:',
                            'msg' => "<b style='color:MediumSeaGreen;'>Please <a href='".$url."'>Click here</a> to Reset your password.</b>"
                        );

                        /*This is the email custom library*/
                        $this->load->library('my_email_send');
                        /*This is the email  Custom library class and functions*/ 
                        $send_email = $this->my_email_send->sendMail($data_email);
                        if ($send_email) 
                        {
                            $this->session->set_flashdata('success', 'Please go to your email. and reset your Password.');
                            redirect('forgotpass');
                        } 
                        else 
                        {
                            $this->session->set_flashdata('error', 'Invalid details provided.');
                            redirect('forgotpass');
                        }
                    } 
                    else 
                    {
                        $this->session->set_flashdata('error', 'Invalid details provided.');
                        redirect('forgotpass');
                    }
                }
                else
                {
                    $this->session->set_flashdata('error', 'Invalid details provided.');
                    redirect('forgotpass'); 
                }
            }    
       }         
 
    }
    
    public function create_password() 
    {
        if (isset($_GET['user_id'])  && !empty($_GET['user_id']))
        {
            $user_id = base64_decode($_GET['user_id']);
            $this->form_validation->set_rules('user_pass','Password','required|trim|min_length[6]|max_length[12]');
            $this->form_validation->set_rules('conform_pass','Password Confirmation','required|matches[user_pass]',array('matches' => 'Password not matched.'));
            if ($this->form_validation->run() == FALSE) 
            {
                $this->load->view('admin_users/create_password');
                  /*admin front end validations*/
                //$this->load->view('cutom_common_js/admin_validation_js.php');
            } 
            else 
            {
                $pass =  $this->input->post("user_pass");
                if (isset($pass) && !empty($pass)) 
                {
                    $data = array(
                        'password' => base64_encode($this->input->post("user_pass")),
                        'updated_on' => date('Y-m-d H:i:s')
                    );

                    $result = $this->Admin_model->updata_pass($data,$user_id);
                    if ($result) 
                    {
                        $this->session->set_flashdata('success', 'Password created successfully!. Please Login!');
                         redirect('admin');
                    } 
                    else 
                    {
                        $this->session->set_flashdata('error', 'Password creation failed. Please try again.');
                        redirect('create_pass?user_id='.base64_encode($user_id));
                    }

                }
                
            }
        }
       
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin');
    }

    public function is_logged_in() 
    {
        $is_logged_in = $this->session->userdata('logged_in');
        if(!isset($is_logged_in) || $is_logged_in != TRUE && empty($this->session->userdata('admin_username')))
        {
            redirect('admin');    
        } 
    }  
   
    


}