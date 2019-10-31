<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EmergencyTeam extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
       
        $this->load->model('EmergencyTeamModel');
        $this->load->model('DoseHistoryModel');
        modules::run('admin/admin/is_logged_in');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['package_list'] =  $this->Package_model->getall_packages(); 
        $data['file']         = 'packages/package/pakage_list';
        $data['table_js']    = 'admin/all_common_js/admin_tables_js.php';
        $this->load->view('admin_template/main',$data); 
    }

 
   
    public function getEmergencyObjList()
    {
        $data['emergencyObj']   =  $this->EmergencyTeamModel->getEmergencyObjList();
        $data['file']      = 'navy/EmergencyTeamView/EmergencyTeamList';

        $data['table_js']  = 'admin/all_common_js/admin_tables_js.php';
        $this->load->view('admin_template/main',$data); 
    }

    public function deleteEmergencyTeam()
    { 
        if (isset($_GET['emtId']) && !empty($_GET['emtId'])) 
        { 
            $emtId     = $_GET['emtId'];
            $result = $this->EmergencyTeamModel->deleteEmergencyTeam($emtId);
            if ($result) 
            {
                $this->session->set_flashdata('success', 'Delete Successfully!');
              redirect('emergencyTeamObj'); 
            } 
            else 
            {
                $this->session->set_flashdata('error', 'Delete failed!');
                redirect('emergencyTeamObj');  
            }
        }
        else
        {
            $this->session->set_flashdata('error', 'Delete failed!');
             redirect('emergencyTeamObj');  
        }
           
    } 

    public function genarateExcel() {

        $this->load->model('EmergencyTeamModel');
        $this->load->library('excel');
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        $table_columns = array("ET_Id","ET_Name","Created Date","Updation Date","Strngth");
        $column = 0;

        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;

        }
         $emergencyObj   =  $this->EmergencyTeamModel->getEmergencyObjList(); 
         $excel_row = 2;
        foreach ($emergencyObj as $emergency) {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0,$excel_row,$emergency['et_id']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1,$excel_row,$emergency['et_name']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2,$excel_row,$emergency['date_of_creation']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3,$excel_row,$emergency['date_of_updation']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4,$excel_row,$emergency['strength']);
             $excel_row++;
        
        } 

        $object_writer = PHPExcel_IOFactory::createWriter($object,'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="EmergencyTeam.xls"');
        $object_writer->save('php://output');
    }

    public function addEmergencyTeam()
    {   
      $data['file']        = 'navy/EmergencyTeamView/addEmergencyTeam';
      $data['validation_js']  = 'admin/all_common_js/frontend_validation_js';
      $this->load->view('admin_template/main',$data);
    }

    public function saveEmergencyTeam(){

      if(isset($_POST['add_emergencyTeam']) && !empty($_POST['add_emergencyTeam'])){
        $teamId = $this->EmergencyTeamModel->saveEmergencyTeam();
        redirect('editEmergencyTeam?emtId='.$teamId);
      }
    }

    public function editEmergencyTeam(){

      $emtId = $_GET['emtId'];
      $data['doseHistoryObj']   =  $this->DoseHistoryModel->getDoseHistoryObjList();
      $data['emergencyObj'] =  $this->EmergencyTeamModel->getEmergencyTeamById($emtId);
      $data['file']        = 'navy/EmergencyTeamView/editEmergencyTeamView';
      $data['validation_js']  = 'admin/all_common_js/frontend_validation_js';
      $this->load->view('admin_template/main',$data);
      
    }

    public function updateEmergencyTeam(){
      $emtId = $_GET['emtId'];
      $result = $this->EmergencyTeamModel->updateEmergencyTeam($emtId);
      redirect('emergencyTeamObj');
    }



     public function addMember()
    { 
        if (isset($_GET['emtId']) && !empty($_GET['emtId'])) 
        {
            $emtId    = $_GET['emtId'];
            $data['doseHistoryObj']   =  $this->DoseHistoryModel->getDoseHistoryObjByEmtid($emtId);
            $data['file']        = 'navy/EmergencyTeamView/addMember';
            $this->load->view('admin_template/main',$data);
        }
           
    } 


     public function saveMember()
    { 
        if (isset($_GET['emtId']) && !empty($_GET['emtId'])) 
        {
            $data['emtId']    = $_GET['emtId'];echo "string".$_GET['emtId'];die();
            $data['doseHistoryObj']   =  $this->DoseHistoryModel->getDoseHistoryObjList();
            $data['file']        = 'navy/EmergencyTeamView/addMember';
            $this->load->view('admin_template/main',$data);
        }
           
    } 

    function fetch_emgTeam()
    {
        if($_GET['member_id'])
        {
            echo json_encode($this->EmergencyTeamModel->fetch_emgTeam($_GET['member_id']));
        }
    }



     
}