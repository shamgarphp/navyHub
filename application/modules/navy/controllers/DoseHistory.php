<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class DoseHistory extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
       
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

 
   
    public function getDoseHistoryObjList()
    {
        $data['doseHistoryObj']   =  $this->DoseHistoryModel->getDoseHistoryObjList();
        $data['file']      = 'navy/DoseHistoryView/DoseHistoryList';

        $data['table_js']  = 'admin/all_common_js/admin_tables_js.php';
        $this->load->view('admin_template/main',$data); 
    }

    public function deleteDoseHistory()
    { 
        if (isset($_GET['doseId']) && !empty($_GET['doseId'])) 
        { 
            $doseId     = $_GET['doseId'];
            $result = $this->DoseHistoryModel->deleteDoseHistory($doseId);
            if ($result) 
            {
                $this->session->set_flashdata('success', 'Delete Successfully!');
              redirect('doseHistoryObj'); 
            } 
            else 
            {
                $this->session->set_flashdata('error', 'Delete failed!');
                redirect('doseHistoryObj');  
            }
        }
        else
        {
            $this->session->set_flashdata('error', 'Delete failed!');
             redirect('doseHistoryObj');  
        }
           
    } 

    public function genarateExcel() {

        $this->load->model('EmergencyTeamModel');
        $this->load->library('excel');
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        $table_columns = array("P-Id","Name","Dose History","ET_Id");
        $column = 0;

        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;

        }
         $doseHistoryObj   =  $this->DoseHistoryModel->getDoseHistoryObjList();
         $excel_row = 2;
        foreach ($doseHistoryObj as $doseHistory) {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0,$excel_row,$doseHistory['p_id']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1,$excel_row,$doseHistory['name']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2,$excel_row,$doseHistory['dose_history']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3,$excel_row,$doseHistory['et_id']);
            
             $excel_row++;
        
        } 

        $object_writer = PHPExcel_IOFactory::createWriter($object,'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="DoseHistory.xls"');
        $object_writer->save('php://output');
    }

    public function addDoseHistory()
    {   
      $data['file']        = 'navy/DoseHistoryView/addDoseHistory';
      $data['validation_js']  = 'admin/all_common_js/frontend_validation_js';
      $this->load->view('admin_template/main',$data);
    }

    public function saveDoseHistory(){

      if(isset($_POST['add_user']) && !empty($_POST['add_user'])){
        $result = $this->DoseHistoryModel->saveDoseHistory();
        redirect('doseHistoryObj');
      }
    }

    public function editDoseHistory(){

      $doseId = $_GET['doseId'];
      $data['doseHistoryObj'] =  $this->DoseHistoryModel->getDoseHistoryById($doseId);
      $data['file']        = 'navy/DoseHistoryView/editDoseHistory';
      $data['validation_js']  = 'admin/all_common_js/frontend_validation_js';
      $this->load->view('admin_template/main',$data);
      
    }

    public function updateDoseHistory(){
      $doseId = $_GET['doseId'];
      $result = $this->DoseHistoryModel->updateDoseHistory($doseId);
      redirect('doseHistoryObj');
    }

    public function getTableMemberRow()
    {
        $members = $this->DoseHistoryModel->getActiveMemberData();
        echo json_encode($members);
    }

    public function getMemberValueById()
    {
        $member = $this->input->post('member');
        if($member) {
            $member_data = $this->DoseHistoryModel->getMemberData($member);
            echo json_encode($member_data);
        }
    }

    function fetch_doseHistory()
    {
        if($_GET['member_id'])
        {
            echo json_encode($this->DoseHistoryModel->fetch_doseHistory($_GET['member_id']));
        }
    }

}