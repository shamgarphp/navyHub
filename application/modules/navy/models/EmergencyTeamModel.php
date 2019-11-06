<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EmergencyTeamModel extends CI_Model
{
    
    
    private $emergencyTeam =  "emergency_team";
  

	public function __construct() { parent::__construct(); }


    public function getEmergencyObjList()
    {
        $this->db->select();

        $query = $this->db->get($this->emergencyTeam);

        if($query)
        {
            return $query->result_array();   
        }
        else
        {
            return FALSE;
        }  
    }

    public function deleteEmergencyTeam($emtId)
    {
        $this->db->select();
        $this->db->from($this->emergencyTeam);
        $this->db->where('id',$emtId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
        {
            $result_img =  $query->result_array();
 
            $img_delete =  $this->db->delete('emergency_team', array('id' => $emtId));
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

    public function saveEmergencyTeam()
    { 
        $data = array(
         'et_id' => $this->input->post("et_id"),
         'et_name' => $this->input->post("et_name"),
         'date_of_creation' => $this->input->post("date_of_creation"),
         'date_of_updation' => $this->input->post("date_of_updation"),
          'strength' => $this->input->post("strength")
        );

        $insert = $this->db->insert('emergency_team', $data);
        $task_id = $this->db->insert_id();
        return $task_id;

    }  

    public function getEmergencyTeamById($emtId){
        $this->db->select('*');
        $this->db->from('emergency_team et');
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
    public function getMembersByTeamId($emtId){

        $this->db->select('*');
        $this->db->from('dose_history dh');
        $this->db->where('dh.et_id', $emtId);
       
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

    public function updateEmergencyTeam($emtId){

        $data = array(
         'et_id' => $this->input->post("et_id"),
         'et_name' => $this->input->post("et_name"),
         'date_of_creation' => $this->input->post("date_of_creation"),
         'date_of_updation' => $this->input->post("date_of_updation"),
          'strength' => $this->input->post("strength")
        );

        $this->db->where('id', $emtId);
        $update = $this->db->update('emergency_team', $data);

        $count_day = count($this->input->post('member'));

        for($x = 0; $x < $count_day; $x++) {
            
            $updateTeam = $this->getTeamIdByMemberIds($this->input->post('member')[$x]);
            $memId = $updateTeam['id'];

            $this->db->set('et_id',$emtId);
            $this->db->where('id',$memId);
            $this->db->update('dose_history');
            
        }
       
    }

     function fetch_emgTeam($member_id)
    {
        $this->db->where('id', $member_id);
       // $this->db->order_by('name', 'ASC');
        $query = $this->db->get('emergency_team');
        foreach($query->result() as $row)
        {   
           // $output['dose_history'] = 5;//$row->dose_history;
            $output['et_id'] = $row->et_id;
           /* $dose = $this->fetch_doseHistory($row->et_id);
           $output['dose_history'] = $dose;*/
        }
        return $output;
    }

     function fetch_doseHistory($member_id)
    {
        $this->db->where('id', $member_id);
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('dose_history');
        foreach($query->result() as $row)
        {
            $output['dose_history'] = 88;
           
        }
        return $output;
    }

    public function getTeamIdByMemberIds($memberIds){
        $this->db->where('id', $memberIds);
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('dose_history');
        foreach($query->result() as $row)
        {
            $output['id'] = $row->id;
           
        }
        return $output;
    }

}