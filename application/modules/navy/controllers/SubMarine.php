<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class SubMarine extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sub_Marine_Model');
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

 
    public function delete_smrs() /*admin user delete*/ 
    {  
        if (isset($_GET['idpackage']) && !empty($_GET['idpackage'])) 
        { 
            $package_id     = $_GET['idpackage'];
            $result = $this->Sub_Marine_Model->delete_smrs($package_id);
            if ($result) 
            {
                $this->session->set_flashdata('success', 'Delete Successfully!');
              redirect('submarinelist'); 
            } 
            else 
            {
                $this->session->set_flashdata('error', 'Delete failed!');
                redirect('submarinelist');  
            }
        }
        else
        {
            $this->session->set_flashdata('error', 'Delete failed!');
             redirect('submarinelist');  
        }
           
    }


    public function marineList()
    {

        $data['smrsObj']   =  $this->Sub_Marine_Model->getall_customers(); 
        $data['file']      = 'navy/sub_marine_view/marine_list';
        $data['table_js']  = 'admin/all_common_js/admin_tables_js.php';
        $this->load->view('admin_template/main',$data); 
    } 

    

    

    //update marine
        public function smrsEdit() 
    {  
        if (isset($_GET['smrsId']) && !empty($_GET['smrsId'])) 
        {    
            $smrsId  = base64_decode($_GET['smrsId']);
            $data['smrsEdit'] = $this->Sub_Marine_Model->smrsEdit($smrsId); 
            if (sizeof($data['smrsEdit']) > 0) 
            {
               
                $data['file']           = 'navy/sub_marine_view/smrs_edit';
                //$data['custom_js']      = 'packages/package/js/package_js';
                /*event front end  validations*/
              //  $data['validation_js']       = 'admin/all_common_js/frontend_validation_js';
                /*load admin templeate.send all data this admin templeate*/
                $this->load->view('admin_template/main', $data);
            }
            if(!empty($_POST['update_smrs']) && isset($_POST['update_smrs'])){
                 $data = array(

                            'dtntm' => $this->input->post("dtntm"),
                            'compartment' => $this->input->post("compartment"),
                            'rgms_channel' => $this->input->post("rgms_channel"),
                            'radiation_level' => $this->input->post("radiation_level"),
                            'radsit' => $this->input->post("radsit"),
                               
                    );
        
                    $result = $this->Sub_Marine_Model->update_smrs($data,$smrsId);
                    $this->session->set_flashdata('success','Updated Successfully!');
                        redirect('submarinelist'); 
            } 
           
            
        }
        else
        {
           $this->session->set_flashdata('error', 'updated failed. please try again!');
           redirect('submarinelist'); 
        }
    }


    public function PstateList()
    {
        $data['PstateLists']   =  $this->Sub_Marine_Model->getall_Pstates();
        $data['file']      = 'navy/pstatelist/pstate_list';
        $data['table_js']  = 'admin/all_common_js/admin_tables_js.php';
        $this->load->view('admin_template/main',$data); 
    } 
    public function Checklist1()
    {
        $data['Checklist1']   =  $this->Sub_Marine_Model->getall_Checklist1();
       // print_r($data['Checklist1']);exit;
        $data['file']      = 'navy/checkoff/checkoff_list';

        $data['table_js']  = 'admin/all_common_js/admin_tables_js.php';
        $this->load->view('admin_template/main',$data); 
    } 


    public function delete_pstate() 
    {  
        if (isset($_GET['idpackage']) && !empty($_GET['idpackage'])) 
        { 
            $package_id     = $_GET['idpackage'];
            $result = $this->Navy_model->delete_pstate($package_id);
            if ($result) 
            {
                $this->session->set_flashdata('success', 'Delete Successfully!');
              redirect('navyCustomers'); 
            } 
            else 
            {
                $this->session->set_flashdata('error', 'Delete failed!');
                redirect('navyCustomers');  
            }
        }
        else
        {
            $this->session->set_flashdata('error', 'Delete failed!');
             redirect('navyCustomers');  
        }
           
    }

    public function getThreshold()
    {
        $data['thresholdObj']   =  $this->Sub_Marine_Model->getThreshold();
      
        $data['file']      = 'navy/threshold_view/threshold_list';

        $data['table_js']  = 'admin/all_common_js/admin_tables_js.php';
        $this->load->view('admin_template/main',$data); 
    } 


    public function delete_threshold() 
    {  
        if (isset($_GET['idpackage']) && !empty($_GET['idpackage'])) 
        { 
            $package_id     = $_GET['idpackage'];
            $result = $this->Sub_Marine_Model->delete_threshold($package_id);
            if ($result) 
            {
                $this->session->set_flashdata('success', 'Delete Successfully!');
              redirect('thersholdList'); 
            } 
            else 
            {
                $this->session->set_flashdata('error', 'Delete failed!');
                redirect('thersholdList');  
            }
        }
        else
        {
            $this->session->set_flashdata('error', 'Delete failed!');
             redirect('thersholdList');  
        }
           
    }

    //update marine
        public function thresholdEdit() 
    {  
        if (isset($_GET['thresholdId']) && !empty($_GET['thresholdId'])) 
        {    
            $thresholdId  = base64_decode($_GET['thresholdId']);
            $data['thresholdEdit'] = $this->Sub_Marine_Model->thresholdEdit($thresholdId); 
           
           /* $this->form_validation->set_rules('package_name','product','required|trim|strtolower');
            $this->form_validation->set_rules('service','service','required|trim');
            $this->form_validation->set_rules('events[]','events','required|trim');
            $this->form_validation->set_rules('price','price','required|trim');
             $this->form_validation->set_rules('discount','discount','required|trim');
            $this->form_validation->set_rules('package_desc','package description','required|trim');
            $this->form_validation->set_rules('price_type','price type','required|trim');*/
            if (sizeof($data['thresholdEdit']) > 0) 
            {
               
                $data['file']           = 'navy/threshold_view/threshold_edit';
                //$data['custom_js']      = 'packages/package/js/package_js';
                /*event front end  validations*/
              //  $data['validation_js']       = 'admin/all_common_js/frontend_validation_js';
                /*load admin templeate.send all data this admin templeate*/
                $this->load->view('admin_template/main', $data);
            }
            if(!empty($_POST['thresholdEdit']) && isset($_POST['thresholdEdit'])){
                 $data = array(

                            'power' => $this->input->post("power"),
                            'compartment' => $this->input->post("compartment"),
                            'threshold' => $this->input->post("threshold"),
                    );
        
                    $result = $this->Sub_Marine_Model->update_threshold($data,$thresholdId);
                    $this->session->set_flashdata('success','Updated Successfully!');
                        redirect('thersholdList'); 
            } 
           
            
        }
        else
        {
           $this->session->set_flashdata('error', 'updated failed. please try again!');
           redirect('thersholdList'); 
        }
    }


    public function genarateExcel() {

        $this->load->model('Sub_Marine_Model');
        $this->load->library('excel');
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        if($_GET['type'] == 'smrs'){
        $object = $this->getSmrsObj( $object);
        }
        
         $object_writer = PHPExcel_IOFactory::createWriter($object,'Excel5');
         header('Content-Type: application/vnd.ms-excel');
         header('Content-Disposition: attachment;filename="Emp.xls"');
         $object_writer->save('php://output');
     }

    public function getSmrsObj( $object)
    {
        $table_columns = array("Date And Time","Name","Area","Loation","RGMS Channel","Rad Type","Radiation Level","Unit","Radsit");
        $column = 0;

        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;

        }
         $employee_data   =  $this->Sub_Marine_Model->getall_customers(); 
         $excel_row = 2;
        foreach ($employee_data as $row) {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0,$excel_row,$row['dtntm']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1,$excel_row,$row['uname']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2,$excel_row,$row['area']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3,$excel_row,$row['location']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4,$excel_row,$row['rgms_channel']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5,$excel_row,$row['rad_type']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6,$excel_row,$row['radiation_level']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7,$excel_row,$row['unit']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8,$excel_row,$row['radsit']);
             $excel_row++;
        
        } 
        return $object;
    }

    public function getAGMSChannel()
    {
        $data['agmsChannelObj']   =  $this->Sub_Marine_Model->getAGMSChannel();
      
        $data['file']      = 'navy/agms_channel/agms_channel_list';

        $data['table_js']  = 'admin/all_common_js/admin_tables_js.php';
        $this->load->view('admin_template/main',$data); 
    } 


     public function delete_agmsChannel() 
    {  
        if (isset($_GET['chid']) && !empty($_GET['chid'])) 
        { 
            $child_id     = $_GET['chid'];
            $result = $this->Sub_Marine_Model->delete_agmsChannel($child_id);
            if ($result) 
            {
                $this->session->set_flashdata('success', 'Delete Successfully!');
              redirect('agmsChannelList'); 
            } 
            else 
            {
                $this->session->set_flashdata('error', 'Delete failed!');
                redirect('agmsChannelList');  
            }
        }
        else
        {
            $this->session->set_flashdata('error', 'Delete failed!');
             redirect('agmsChannelList');  
        }
           
    }

    //update marine
        public function agmsChannelEdit() 
    { 
        if (isset($_GET['chid']) && !empty($_GET['chid'])) 
        {    
            $chid  = base64_decode($_GET['chid']);
            $data['agmsChannelEdit'] = $this->Sub_Marine_Model->agmsChannelEdit($chid); 
         
       
            if (sizeof($data['agmsChannelEdit']) > 0) 
            {
               
                $data['file']           = 'navy/agms_channel/agms_channel_edit';
                //$data['custom_js']      = 'packages/package/js/package_js';
                /*event front end  validations*/
              //  $data['validation_js']       = 'admin/all_common_js/frontend_validation_js';
                /*load admin templeate.send all data this admin templeate*/
                $this->load->view('admin_template/main', $data);
            }
            if(!empty($_POST['agmsChannelEdit']) && isset($_POST['agmsChannelEdit'])){
                 $data = array(

                            'location' => $this->input->post("location"),
                            'compartment' => $this->input->post("compartment"),
                            'area' => $this->input->post("area"),
                            'rad_type' => $this->input->post("rad_type"),
                    );
        
                    $result = $this->Sub_Marine_Model->update_agmsChannel($data,$chid);
                    $this->session->set_flashdata('success','Updated Successfully!');
                        redirect('agmsChannelList'); 
            } 
           
            
        }
        else
        {
           $this->session->set_flashdata('error', 'updated failed. please try again!');
           redirect('agmsChannelList'); 
        }
    }



    public function getRGMSChannel()
    {
        $data['rgmsChannelObj']   =  $this->Sub_Marine_Model->getRGMSChannel();
      
        $data['file']      = 'navy/rgms_channel/rgms_channel_list';

        $data['table_js']  = 'admin/all_common_js/admin_tables_js.php';
        $this->load->view('admin_template/main',$data); 
    } 


     public function delete_rgmsChannel() 
    {  
        if (isset($_GET['chid']) && !empty($_GET['chid'])) 
        { 
            $child_id     = $_GET['chid'];
            $result = $this->Sub_Marine_Model->delete_rgmsChannel($child_id);
            if ($result) 
            {
                $this->session->set_flashdata('success', 'Delete Successfully!');
              redirect('rgmsChannelList'); 
            } 
            else 
            {
                $this->session->set_flashdata('error', 'Delete failed!');
                redirect('rgmsChannelList');  
            }
        }
        else
        {
            $this->session->set_flashdata('error', 'Delete failed!');
             redirect('rgmsChannelList');  
        }
           
    }

    //update marine
        public function rgmsChannelEdit() 
    { 
        if (isset($_GET['chid']) && !empty($_GET['chid'])) 
        {    
            $chid  = base64_decode($_GET['chid']);
            $data['rgmsChannelEdit'] = $this->Sub_Marine_Model->rgmsChannelEdit($chid); 
         
       
            if (sizeof($data['rgmsChannelEdit']) > 0) 
            {
               
                $data['file']           = 'navy/rgms_channel/rgms_channel_edit';
                //$data['custom_js']      = 'packages/package/js/package_js';
                /*event front end  validations*/
              //  $data['validation_js']       = 'admin/all_common_js/frontend_validation_js';
                /*load admin templeate.send all data this admin templeate*/
                $this->load->view('admin_template/main', $data);
            }
            if(!empty($_POST['rgmsChannelEdit']) && isset($_POST['rgmsChannelEdit'])){
                 $data = array(

                            'location' => $this->input->post("location"),
                            'compartment' => $this->input->post("compartment"),
                            'area' => $this->input->post("area"),
                            'rad_type' => $this->input->post("rad_type"),
                    );
        
                    $result = $this->Sub_Marine_Model->update_rgmsChannel($data,$chid);
                    $this->session->set_flashdata('success','Updated Successfully!');
                        redirect('rgmsChannelList'); 
            } 
           
            
        }
        else
        {
           $this->session->set_flashdata('error', 'updated failed. please try again!');
           redirect('rgmsChannelList'); 
        }
    }



    public function getEmergencyTeamList()
    {
        $data['emergencyTeamObj']   =  $this->Sub_Marine_Model->getEmergencyTeamList();
      
        $data['file']      = 'navy/emergency_team/emergency_team_list';

        $data['table_js']  = 'admin/all_common_js/admin_tables_js.php';
        $this->load->view('admin_template/main',$data); 
    } 


    public function deleteEmergencyTeam() 
    {  
        if (isset($_GET['id']) && !empty($_GET['id'])) 
        { 
            $id     = $_GET['id'];
            $result = $this->Sub_Marine_Model->deleteEmergencyTeam($id);
            if ($result) 
            {
                $this->session->set_flashdata('success', 'Delete Successfully!');
              redirect('emergencyTeamList'); 
            } 
            else 
            {
                $this->session->set_flashdata('error', 'Delete failed!');
                redirect('emergencyTeamList');  
            }
        }
        else
        {
            $this->session->set_flashdata('error', 'Delete failed!');
             redirect('emergencyTeamList');  
        }
           
    }

    //update marine
        public function emergencyTeamEdit() 
    { 
        if (isset($_GET['id']) && !empty($_GET['id'])) 
        {    
            $id  = base64_decode($_GET['id']);
            $data['emergencyTeamEdit'] = $this->Sub_Marine_Model->emergencyTeamEdit($id); 
         
       
            if (sizeof($data['emergencyTeamEdit']) > 0) 
            {
               
                $data['file']           = 'navy/emergency_team/emergency_team_edit';
                //$data['custom_js']      = 'packages/package/js/package_js';
                /*event front end  validations*/
              //  $data['validation_js']       = 'admin/all_common_js/frontend_validation_js';
                /*load admin templeate.send all data this admin templeate*/
                $this->load->view('admin_template/main', $data);
            }
            if(!empty($_POST['emergencyTeamEdit']) && isset($_POST['emergencyTeamEdit'])){
                 $data = array(

                            'dtandtm' => $this->input->post("dtandtm"),
                            'name' => $this->input->post("name"),
                            'phone_no' => $this->input->post("phone_no"),
                            'dose_history' => $this->input->post("dose_history"),
                    );
        
                    $result = $this->Sub_Marine_Model->update_emergencyTeam($data,$id);
                    $this->session->set_flashdata('success','Updated Successfully!');
                        redirect('emergencyTeamList'); 
            } 
           
            
        }
        else
        {
           $this->session->set_flashdata('error', 'updated failed. please try again!');
           redirect('emergencyTeamList'); 
        }
    }

    public function getEmergencyWorkList()
    {
        $data['emergencyWorkObj']   =  $this->Sub_Marine_Model->getEmergencyWorkList();
      
        $data['file']      = 'navy/emergency_work/emergency_work_list';

        $data['table_js']  = 'admin/all_common_js/admin_tables_js.php';
        $this->load->view('admin_template/main',$data); 
    } 


    public function deleteEmergencyWork() 
    {  
        if (isset($_GET['id']) && !empty($_GET['id'])) 
        { 
            $id     = $_GET['id'];
            $result = $this->Sub_Marine_Model->deleteEmergencyWork($id);
            if ($result) 
            {
                $this->session->set_flashdata('success', 'Delete Successfully!');
              redirect('emergencyWorkList'); 
            } 
            else 
            {
                $this->session->set_flashdata('error', 'Delete failed!');
                redirect('emergencyWorkList');  
            }
        }
        else
        {
            $this->session->set_flashdata('error', 'Delete failed!');
             redirect('emergencyWorkList');  
        }
           
    }

    public function emgWorkexcel() {

        $this->load->model('Sub_Marine_Model');
        $this->load->library('excel');
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        
        $table_columns = array("Date And Time","Team","Compartment","Expected Time","Expected Dose","Time For Wmsv","Time For 100ns");
        $column = 0;

        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;

        }
         $employee_data   =  $this->Sub_Marine_Model->getEmergencyWorkList(); 
         $excel_row = 2;
        foreach ($employee_data as $row) {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0,$excel_row,$row['dtandtm']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1,$excel_row,$row['team']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2,$excel_row,$row['compartment']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3,$excel_row,$row['expected_time']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4,$excel_row,$row['expected_dose']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5,$excel_row,$row['time_for_wmsv']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6,$excel_row,$row['time_for_100ns']);
            
             $excel_row++;
        
        } 
         $object_writer = PHPExcel_IOFactory::createWriter($object,'Excel5');
         header('Content-Type: application/vnd.ms-excel');
         header('Content-Disposition: attachment;filename="Emp.xls"');
         $object_writer->save('php://output');
     }

     public function emgTeamexcel() {

        $this->load->model('Sub_Marine_Model');
        $this->load->library('excel');
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        
        $table_columns = array("Date And Time","Name","Phn No.","Dose History ");
        $column = 0;

        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;

        }
         $employee_data   =  $this->Sub_Marine_Model->getEmergencyTeamList(); 
         $excel_row = 2;
        foreach ($employee_data as $row) {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0,$excel_row,$row['dtandtm']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1,$excel_row,$row['name']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2,$excel_row,$row['phone_no']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3,$excel_row,$row['dose_history']);
          
            
             $excel_row++;
        
        } 
         $object_writer = PHPExcel_IOFactory::createWriter($object,'Excel5');
         header('Content-Type: application/vnd.ms-excel');
         header('Content-Disposition: attachment;filename="EmgTeamexcel.xls"');
         $object_writer->save('php://output');
     }

    public function RGMSexcel() {

        $this->load->model('Sub_Marine_Model');
        $this->load->library('excel');
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        
        $table_columns = array("Location","Compartment","Area","Rad Type");
        $column = 0;

        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;

        }
         $employee_data   =  $this->Sub_Marine_Model->getRGMSChannel(); 
         $excel_row = 2;
        foreach ($employee_data as $row) {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0,$excel_row,$row['location']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1,$excel_row,$row['compartment']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2,$excel_row,$row['area']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3,$excel_row,$row['rad_type']);
          
            
             $excel_row++;
        
        } 
         $object_writer = PHPExcel_IOFactory::createWriter($object,'Excel5');
         header('Content-Type: application/vnd.ms-excel');
         header('Content-Disposition: attachment;filename="RGMSexcel.xls"');
         $object_writer->save('php://output');
     }

         public function AGMSexcel() {

        $this->load->model('Sub_Marine_Model');
        $this->load->library('excel');
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        
        $table_columns = array("Location","Compartment","Area","Rad Type");
        $column = 0;

        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;

        }
         $employee_data   =  $this->Sub_Marine_Model->getAGMSChannel(); 
         $excel_row = 2;
        foreach ($employee_data as $row) {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0,$excel_row,$row['location']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1,$excel_row,$row['compartment']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2,$excel_row,$row['area']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3,$excel_row,$row['rad_type']);
          
            
             $excel_row++;
        
        } 
         $object_writer = PHPExcel_IOFactory::createWriter($object,'Excel5');
         header('Content-Type: application/vnd.ms-excel');
         header('Content-Disposition: attachment;filename="AGMSexcel.xls"');
         $object_writer->save('php://output');
     }

     public function getAgmsReportList()
    {

        $data['agmsObj']   =  $this->Sub_Marine_Model->getAgmsReportList(); 
        $data['file']      = 'navy/agms_view/agms_list';
        $data['table_js'] = 'navy/agms_view/js/table_js';
        $data['custom_js'] = 'navy/agms_view/js/custom_js';
        $this->load->view('admin_template/main',$data); 

    }

    public function deleteAGRMS()
    { 
        if (isset($_GET['idpackage']) && !empty($_GET['idpackage'])) 
        { 
            $package_id     = $_GET['idpackage'];
            $result = $this->Sub_Marine_Model->deleteAGRMS($package_id);
            if ($result) 
            {
                $this->session->set_flashdata('success', 'Delete Successfully!');
              redirect('agmsReportList'); 
            } 
            else 
            {
                $this->session->set_flashdata('error', 'Delete failed!');
                redirect('agmsReportList');  
            }
        }
        else
        {
            $this->session->set_flashdata('error', 'Delete failed!');
             redirect('agmsReportList');  
        }
           
    } 
    public function AGMSReportexcel() {

        $this->load->model('Sub_Marine_Model');
        $this->load->library('excel');
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        
        $table_columns = array("Date And Time","Name","Area","Location","Latitude","Longitude","R-Type","Channel No","Radiation Level","Unit");
        $column = 0;

        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;

        }
         $employee_data   =  $this->Sub_Marine_Model->getAgmsReportList(); 
         $excel_row = 2;
        foreach ($employee_data as $row) {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0,$excel_row,$row['dtandtm']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1,$excel_row,$row['uname']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2,$excel_row,$row['area']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3,$excel_row,$row['location']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4,$excel_row,$row['latitude']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5,$excel_row,$row['longitude']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6,$excel_row,$row['rtype']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7,$excel_row,$row['channel_no']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8,$excel_row,$row['radiation_level']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9,$excel_row,$row['unit']);
             $excel_row++;
        
        } 
         $object_writer = PHPExcel_IOFactory::createWriter($object,'Excel5');
         header('Content-Type: application/vnd.ms-excel');
         header('Content-Disposition: attachment;filename="AGMSReportexcel.xls"');
         $object_writer->save('php://output');
     }


     public function thresholdexcel() {

        $this->load->model('Sub_Marine_Model');
        $this->load->library('excel');
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        
        $table_columns = array("Compartment","Power","Threshold");
        $column = 0;

        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;

        }
         $employee_data   =  $this->Sub_Marine_Model->getThreshold(); 
         $excel_row = 2;
        foreach ($employee_data as $row) {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0,$excel_row,$row['compartment']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1,$excel_row,$row['power']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2,$excel_row,$row['threshold']);
             $excel_row++;
        
        } 
         $object_writer = PHPExcel_IOFactory::createWriter($object,'Excel5');
         header('Content-Type: application/vnd.ms-excel');
         header('Content-Disposition: attachment;filename="thresholdexcel.xls"');
         $object_writer->save('php://output');
     }


     //weatherStation screen

    public function weatherStationList()
    {
        $data['weatherStationObj']   =  $this->Sub_Marine_Model->weatherStationList();
        $data['file']      = 'navy/weather_station/weather_station_list';
        $data['table_js']  = 'admin/all_common_js/admin_tables_js.php';
        $this->load->view('admin_template/main',$data); 
    }

    public function delete_weatherStation() 
    {  
        if (isset($_GET['idpackage']) && !empty($_GET['idpackage'])) 
        { 
            $package_id     = $_GET['idpackage'];
            $result = $this->Sub_Marine_Model->delete_weatherStation($package_id);
            if ($result) 
            {
                $this->session->set_flashdata('success', 'Delete Successfully!');
              redirect('weatherStation'); 
            } 
            else 
            {
                $this->session->set_flashdata('error', 'Delete failed!');
                redirect('weatherStation');  
            }
        }
        else
        {
            $this->session->set_flashdata('error', 'Delete failed!');
             redirect('weatherStation');  
        }
           
    }

    public function weatherStationexcel() {

        $this->load->model('Sub_Marine_Model');
        $this->load->library('excel');
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        
        $table_columns = array("Date And Time ","Wind Direction ","Wind Speed");
        $column = 0;

        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;

        }
         $employee_data   =  $this->Sub_Marine_Model->weatherStationList(); 
         $excel_row = 2;
        foreach ($employee_data as $row) {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0,$excel_row,$row['dtntm']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1,$excel_row,$row['wind_direction']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2,$excel_row,$row['wind_speed']);
             $excel_row++;
        
        } 
         $object_writer = PHPExcel_IOFactory::createWriter($object,'Excel5');
         header('Content-Type: application/vnd.ms-excel');
         header('Content-Disposition: attachment;filename="weatherStationexcel.xls"');
         $object_writer->save('php://output');
     }


      //ESV screen
    public function esvList()
    {
        $data['esvObj']   =  $this->Sub_Marine_Model->esvList();
        $data['file']      = 'navy/esv_report/esv_list';
        $data['table_js']  = 'admin/all_common_js/admin_tables_js.php';
        $this->load->view('admin_template/main',$data); 
    }

    public function delete_esv() 
    {  
        if (isset($_GET['idpackage']) && !empty($_GET['idpackage'])) 
        { 
            $package_id     = $_GET['idpackage'];
            $result = $this->Sub_Marine_Model->delete_esv($package_id);
            if ($result) 
            {
                $this->session->set_flashdata('success', 'Delete Successfully!');
              redirect('esvReport'); 
            } 
            else 
            {
                $this->session->set_flashdata('error', 'Delete failed!');
                redirect('esvReport');  
            }
        }
        else
        {
            $this->session->set_flashdata('error', 'Delete failed!');
             redirect('esvReport');  
        }
           
    }

    public function esvexcel() {

        $this->load->model('Sub_Marine_Model');
        $this->load->library('excel');
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        
        $table_columns = array("Date And Time ","Name ","Area","Location","Latitude","Longitude","R-Type","Channel No","Radiation Level","Unit");
        $column = 0;

        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;

        }
         $employee_data   =  $this->Sub_Marine_Model->esvList(); 
         $excel_row = 2;
        foreach ($employee_data as $row) {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0,$excel_row,$row['dtandtm']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1,$excel_row,$row['uname']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2,$excel_row,$row['area']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3,$excel_row,$row['location']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4,$excel_row,$row['latitude']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5,$excel_row,$row['longitude']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6,$excel_row,$row['rtype']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7,$excel_row,$row['channel_no']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8,$excel_row,$row['radiation_level']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9,$excel_row,$row['unit']);
             $excel_row++;
        
        } 
         $object_writer = PHPExcel_IOFactory::createWriter($object,'Excel5');
         header('Content-Type: application/vnd.ms-excel');
         header('Content-Disposition: attachment;filename="esvexcel.xls"');
         $object_writer->save('php://output');
     }

     //waterBoat screen
    public function waterBoatList()
    {
        $data['waterBoatObj']   =  $this->Sub_Marine_Model->waterBoatList();
        $data['file']      = 'navy/water_boat_report/waterboat_list';
        $data['table_js']  = 'admin/all_common_js/admin_tables_js.php';
        $this->load->view('admin_template/main',$data); 
    }

    public function delete_waterBoat() 
    {  
        if (isset($_GET['idpackage']) && !empty($_GET['idpackage'])) 
        { 
            $package_id     = $_GET['idpackage'];
            $result = $this->Sub_Marine_Model->delete_waterBoat($package_id);
            if ($result) 
            {
                $this->session->set_flashdata('success', 'Delete Successfully!');
              redirect('waterBoatReport'); 
            } 
            else 
            {
                $this->session->set_flashdata('error', 'Delete failed!');
                redirect('waterBoatReport');  
            }
        }
        else
        {
            $this->session->set_flashdata('error', 'Delete failed!');
             redirect('waterBoatReport');  
        }
           
    }

    public function waterBoatexcel() {

        $this->load->model('Sub_Marine_Model');
        $this->load->library('excel');
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        
        $table_columns = array("Date And Time ","Location","Latitude","Longitude","Radiation_level" );
        $column = 0;

        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;

        }
         $employee_data   =  $this->Sub_Marine_Model->waterBoatList(); 
         $excel_row = 2;
        foreach ($employee_data as $row) {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0,$excel_row,$row['dtandtm']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1,$excel_row,$row['Location']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2,$excel_row,$row['Latitude']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3,$excel_row,$row['Longitude']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4,$excel_row,$row['Radiation_level']);
             $excel_row++;
        
        } 
         $object_writer = PHPExcel_IOFactory::createWriter($object,'Excel5');
         header('Content-Type: application/vnd.ms-excel');
         header('Content-Disposition: attachment;filename="waterBoatexcel.xls"');
         $object_writer->save('php://output');
     }

     //  RMC Screen

    public function rmcList()
    {
        $data['rmcObj']   =  $this->Sub_Marine_Model->rmcList();
        $data['file']      = 'navy/rmc_report/rmc_list';
        $data['table_js']  = 'admin/all_common_js/admin_tables_js.php';
        $this->load->view('admin_template/main',$data); 
    } 

    public function delete_rmc() 
    {  
        if (isset($_GET['idpackage']) && !empty($_GET['idpackage'])) 
        { 
            $package_id     = $_GET['idpackage'];
            $result = $this->Sub_Marine_Model->delete_rmc($package_id);
            if ($result) 
            {
                $this->session->set_flashdata('success', 'Delete Successfully!');
              redirect('rmcReport'); 
            } 
            else 
            {
                $this->session->set_flashdata('error', 'Delete failed!');
                redirect('rmcReport');  
            }
        }
        else
        {
            $this->session->set_flashdata('error', 'Delete failed!');
             redirect('rmcReport');  
        }
           
    }


    public function rmcExcel() {

        $this->load->model('Sub_Marine_Model');
        $this->load->library('excel');
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        
        $table_columns = array("Date And Time ","Location","Latitude","Longitude","Radiation_level" );
        $column = 0;

        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;

        }
         $employee_data   =  $this->Sub_Marine_Model->rmcList(); 
         $excel_row = 2;
        foreach ($employee_data as $row) {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0,$excel_row,$row['dtandtm']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1,$excel_row,$row['Location']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2,$excel_row,$row['Latitude']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3,$excel_row,$row['Longitude']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4,$excel_row,$row['Radiation_level']);
             $excel_row++;
        
        } 
         $object_writer = PHPExcel_IOFactory::createWriter($object,'Excel5');
         header('Content-Type: application/vnd.ms-excel');
         header('Content-Disposition: attachment;filename="rmcExcel.xls"');
         $object_writer->save('php://output');
     }

     public function checkOffExcel() {

        $this->load->model('Sub_Marine_Model');
        $this->load->library('excel');
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        
        $table_columns = array("Date And Time ","cl Name","cl Info","cl Location","cl Lat","cl Long","UName","Area" );
        $column = 0;

        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;

        }
         $employee_data   =  $this->Sub_Marine_Model->getall_Checklist1(); 
         $excel_row = 2;
        foreach ($employee_data as $row) {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0,$excel_row,$row['dtntm']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1,$excel_row,$row['cl_name']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2,$excel_row,$row['cl_info']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3,$excel_row,$row['cl_location']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4,$excel_row,$row['cl_lat']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5,$excel_row,$row['cl_long']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6,$excel_row,$row['uname']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7,$excel_row,$row['area']);
             $excel_row++;
        
        } 
         $object_writer = PHPExcel_IOFactory::createWriter($object,'Excel5');
         header('Content-Type: application/vnd.ms-excel');
         header('Content-Disposition: attachment;filename="checkOffExcel.xls"');
         $object_writer->save('php://output');
     }

     public function psatateExcel() {

        $this->load->model('Sub_Marine_Model');
        $this->load->library('excel');
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        
        $table_columns = array("Date And Time ","Area","UName","Location","Number of Personnel");
        $column = 0;

        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;

        }
         $employee_data   =  $this->Sub_Marine_Model->getall_Pstates(); 
         $excel_row = 2;
        foreach ($employee_data as $row) {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0,$excel_row,$row['dtntm']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1,$excel_row,$row['area']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2,$excel_row,$row['uname']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3,$excel_row,$row['location']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4,$excel_row,$row['num_p']);
        
             $excel_row++;
        
        } 
         $object_writer = PHPExcel_IOFactory::createWriter($object,'Excel5');
         header('Content-Type: application/vnd.ms-excel');
         header('Content-Disposition: attachment;filename="psatateExcel.xls"');
         $object_writer->save('php://output');
     }



}


