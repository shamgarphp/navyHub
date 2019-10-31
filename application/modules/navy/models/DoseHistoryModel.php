<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class DoseHistoryModel extends CI_Model
{
    
    
    private $doseHistoryTeam =  "dose_history";
  

	public function __construct() { parent::__construct(); }


    public function getDoseHistoryObjList()
    {
        $this->db->select();

        $query = $this->db->get($this->doseHistoryTeam);

        if($query)
        {
            return $query->result_array();   
        }
        else
        {
            return FALSE;
        }  
    }

    public function deleteDoseHistory($doseId)
    {
        $this->db->select();
        $this->db->from($this->doseHistoryTeam);
        $this->db->where('id',$doseId);
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
        {
            $result_img =  $query->result_array();
 
            $img_delete =  $this->db->delete('dose_history', array('id' => $doseId));
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


    public function saveDoseHistory()
    { 
        $data = array(
         'p_id' => $this->input->post("p_id"),
         'name' => $this->input->post("name"),
         'dose_history' => $this->input->post("dose_history"),
         'et_id' => $this->input->post("et_id")
        );

        $insert = $this->db->insert('dose_history', $data);
        $task_id = $this->db->insert_id();

    }

    public function getDoseHistoryById($doseId){
        $this->db->select('*');
        $this->db->from('dose_history dh');
        $this->db->where('dh.id = '.$doseId);
       
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

    public function updateDoseHistory($doseId){

        $data = array(
         'p_id' => $this->input->post("p_id"),
         'name' => $this->input->post("name"),
         'dose_history' => $this->input->post("dose_history"),
         'et_id' => $this->input->post("et_id")
        );

        $this->db->where('id', $doseId);
        $update = $this->db->update('dose_history', $data);
       
    }


    public function getDoseHistoryObjByEmtid($emtId){
        $this->db->select('*');
        $this->db->from('dose_history dh');
        $this->db->where('et_id = '.$emtId);
       
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

    public function getTableMemberRow()
    {
        $sql = "SELECT * FROM dose_history ";
        $query = $this->db->query($sql, array(1));
        return $query->result_array();
    }

    /* get the brand data */
    public function getMemberData($id = null)
    {
        if($id) {
            $sql = "SELECT * FROM dose_history where id = ?";
            $query = $this->db->query($sql, array($id));
            return $query->row_array();
        }

        $sql = "SELECT * FROM dose_history ORDER BY id DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function fetch_doseHistory($member_id)
    {
        $this->db->where('id', $member_id);
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('dose_history');
        foreach($query->result() as $row)
        {
            $output['dose_history'] = $row->dose_history;
            $output['et_id'] = $row->et_id;
            $output['p_id'] = $row->p_id;
        }
        return $output;
    }
}