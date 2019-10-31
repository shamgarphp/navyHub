<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EmergencyTaskModel extends CI_Model
{
    
    
    private $emergencyTask =  "emergency_task";
  

	public function __construct() { parent::__construct(); }


    public function getEmergencyTaskObjList()
    {
        $this->db->select();

        $query = $this->db->get($this->emergencyTask);

        if($query)
        {
            return $query->result_array();   
        }
        else
        {
            return FALSE;
        }  
    }

    public function deleteEmergencyTask($emtId)
    {
        $this->db->select();
        $this->db->from($this->emergencyTask);
        $this->db->where('id',$emtId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
        {
            $result_img =  $query->result_array();
 
            $img_delete =  $this->db->delete('emergency_task', array('id' => $emtId));
            if ($img_delete)
            {
                return TRUE;
            }
            else
            {
                 return FALSE;
            }

        }
        else
        {
           return FALSE;
        } 
    }

    public function saveEmergencyTask()
    { 
        $data = array(
         'area' => $this->input->post("area"),
          'uname' => $this->input->post("uname"),
         'location' => $this->input->post("location"),
         'task' => $this->input->post("task"),
         'dispution' => $this->input->post("dispution"),
         'date_time' => $this->input->post("date_time"),
         'time_for_micro' => $this->input->post("time_for_micro"),
         'time_10m' => $this->input->post("time_10m"),
          'expected_dose' => $this->input->post("expected_dose"),
         'expection_time' => $this->input->post("expection_time")
        );

        $insert = $this->db->insert('emergency_task', $data);
        $task_id = $this->db->insert_id();

    }  

    public function getEmergencyTaskById($emtId){
        $this->db->select('*');
        $this->db->from('emergency_task et');
        $this->db->where('et.id = '.$emtId);
       
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
        {
            return $query->result_array();
        }
        else
        {
            return FALSE;
        }
    }

    public function updateEmergencyTask($emtId){
        
        $data = array(
         'area' => $this->input->post("area"),
         'location' => $this->input->post("location"),
         'uname' => $this->input->post("uname"),
          'task' => $this->input->post("task"),
         'dispution' => $this->input->post("dispution"),
         'date_time' => $this->input->post("date_time"),
         'time_for_micro' => $this->input->post("time_for_micro"),
         'time_10m' => $this->input->post("time_10m"),
         'expected_dose' => $this->input->post("expected_dose"),
         'expection_time' => $this->input->post("expection_time"),
         'et_id' => $this->input->post('member')
        );

        $this->db->where('id', $emtId);
        $update = $this->db->update('emergency_task', $data);
       
    }

    public function fetch_area(){
      //  $this->db->order_by("name", "ASC");
        $query = $this->db->get("area");
        return $query->result();
    }

    function fetch_location($area_id)
    {
        $this->db->where('aid', $area_id);
        $this->db->order_by('lname', 'ASC');
        $query = $this->db->get('location');
        $output = '<option value="">Select Location</option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->lid.'">'.$row->lname.'</option>';
        }
        return $output;
 }

}