<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_dashboards extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        /*if user not loged in redirect to home page*/
        modules::run('admin/admin/is_logged_in');
        $this->load->model('Admin_dashboard_model','dashboard');
        $this->load->library('upload');
    }
    
  	public function index()
  	{
        $data['file'] = 'admin_dashboard/admin_dashboard/dashboards.php';
        $data['total_events']     = $this->dashboard->count_events();
        $data['total_services']     = $this->dashboard->count_services();
        $data['total_products']     = $this->dashboard->count_products();
        $data['customers']     = $this->dashboard->customers();
        $this->load->view('admin_template/main', $data); 
  	}
	
}