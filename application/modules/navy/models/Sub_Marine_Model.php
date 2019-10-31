<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sub_Marine_Model extends CI_Model
{
    
    private $smrs =  "smrs";
    private $pstates =  "p_state";
    private $cstates =  "checkoff_gps";
    private $rmcReport =  "rmc_report";
    private $waterorboatReport =  "waterorboat_report";
    private $esvReport =  "esv";
    private $weatherStation =  "weather_station";
    private $radThreshhold =  "rad_threshhold";
    private $agmsReport =  "agms_report";
    private $agmsChannel =  "agms_channel";
    private $rgmsChannel =  "rgms_channel";
    private $emergencyTeamData =  "emergency_team_data";
    private $emergencyWork =  "emergency_work";

	public function __construct() { parent::__construct(); }


    public function delete_smrs($package_id)
    {
        $this->db->select();
        $this->db->from($this->smrs);
        $this->db->where('id',$package_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
        {
            $result_img =  $query->result_array();
          /*  if($result_img)
            {
                foreach ($result_img as $image) 
                { 
                    unlink("uploads/packages/".$image['image']);   
                } 
            }*/
 
            $img_delete =  $this->db->delete('smrs', array('id' => $package_id));
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

    public function getall_customers()
    {
        $this->db->select();
        //$this->db->order_by('book_cust_id','desc');
        $query = $this->db->get($this->smrs);

        if($query)
        {
            return $query->result_array();   
        }
        else
        {
            return FALSE;
        }  
    }

      public function smrsEdit($smrsId)
    {
        $this->db->select();
        $this->db->from('smrs');
        $this->db->where('id',$smrsId);
        $query = $this->db->get();
        if($query->num_rows() > 0) 
        {
            return $query->row_array();
        } 
        else 
        {
            return FALSE;
        }   
    }

     public function update_smrs($data,$smrsId)
    {
        $this->db->where('id',$smrsId);
        $query =  $this->db->update($this->smrs,$data);
        if($query) 
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }


    public function getall_Pstates()
    {
        $this->db->select();
        $query = $this->db->get($this->pstates);
        if($query)
        {
            return $query->result_array();   
        }
        else
        {
            return FALSE;
        }  
    }
    public function getall_Checklist1()
    {
        $this->db->select();
        $query = $this->db->get($this->cstates);
        if($query)
        {
            return $query->result_array();   
        }
        else
        {
            return FALSE;
        }  
    }

    public function delete_pstate($package_id)
    {
        $this->db->select();
        $this->db->from($this->pstates);
        $this->db->where('pid',$package_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
        {
            $result_img =  $query->result_array();
          /*  if($result_img)
            {
                foreach ($result_img as $image) 
                { 
                    unlink("uploads/packages/".$image['image']);   
                } 
            }*/
 
            $img_delete =  $this->db->delete('p_state', array('pid' => $package_id));
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

    public function delete_cl($package_id)
    {
        $this->db->select();
        $this->db->from($this->cstates);
        $this->db->where('cid',$package_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
        {
            $result_img =  $query->result_array();
          /*  if($result_img)
            {
                foreach ($result_img as $image) 
                { 
                    unlink("uploads/packages/".$image['image']);   
                } 
            }*/
 
            $img_delete =  $this->db->delete('checkoff_gps', array('cid' => $package_id));
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

    public function rmcList()
    {
        $this->db->select();
        $query = $this->db->get($this->rmcReport);
        if($query)
        {
            return $query->result_array();   
        }
        else
        {
            return FALSE;
        }  
    }


    public function delete_rmc($package_id)
    {
        $this->db->select();
        $this->db->from($this->rmcReport);
        $this->db->where('id',$package_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
        {
            $result_img =  $query->result_array();
          /*  if($result_img)
            {
                foreach ($result_img as $image) 
                { 
                    unlink("uploads/packages/".$image['image']);   
                } 
            }*/
 
            $img_delete =  $this->db->delete('rmc_report', array('id' => $package_id));
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

    public function waterBoatList()
    {
        $this->db->select();
        $query = $this->db->get($this->waterorboatReport);
        if($query)
        {
            return $query->result_array();   
        }
        else
        {
            return FALSE;
        }  
    }

     public function delete_waterBoat($package_id)
    {
        $this->db->select();
        $this->db->from($this->waterorboatReport);
        $this->db->where('id',$package_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
        {
            $result_img =  $query->result_array();
          /*  if($result_img)
            {
                foreach ($result_img as $image) 
                { 
                    unlink("uploads/packages/".$image['image']);   
                } 
            }*/
 
            $img_delete =  $this->db->delete('waterorboat_report', array('id' => $package_id));
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

    public function esvList()
    {
        $this->db->select();
        $query = $this->db->get($this->esvReport);
        if($query)
        {
            return $query->result_array();   
        }
        else
        {
            return FALSE;
        }  
    }

     public function delete_esv($package_id)
    {
        $this->db->select();
        $this->db->from($this->esvReport);
        $this->db->where('id',$package_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
        {
            $result_img =  $query->result_array();
          /*  if($result_img)
            {
                foreach ($result_img as $image) 
                { 
                    unlink("uploads/packages/".$image['image']);   
                } 
            }*/
 
            $img_delete =  $this->db->delete('esv_report', array('id' => $package_id));
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


    public function weatherStationList()
    {
        $this->db->select();
        $query = $this->db->get($this->weatherStation);
        if($query)
        {
            return $query->result_array();   
        }
        else
        {
            return FALSE;
        }  
    }

     public function delete_weatherStation($package_id)
    {
        $this->db->select();
        $this->db->from($this->weatherStation);
        $this->db->where('wid',$package_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
        {
            $result_img =  $query->result_array();
          /*  if($result_img)
            {
                foreach ($result_img as $image) 
                { 
                    unlink("uploads/packages/".$image['image']);   
                } 
            }*/
 
            $img_delete =  $this->db->delete('weather_station', array('wid' => $package_id));
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

     public function delete_threshold($package_id)
    {
        $this->db->select();
        $this->db->from($this->radThreshhold);
        $this->db->where('rth_id',$package_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
        {
            $result_img =  $query->result_array();
          /*  if($result_img)
            {
                foreach ($result_img as $image) 
                { 
                    unlink("uploads/packages/".$image['image']);   
                } 
            }*/
 
            $img_delete =  $this->db->delete('rad_threshhold', array('rth_id' => $package_id));
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

    public function getThreshold()
    {
        $this->db->select();
        //$this->db->order_by('book_cust_id','desc');
        $query = $this->db->get($this->radThreshhold);

        if($query)
        {
            return $query->result_array();   
        }
        else
        {
            return FALSE;
        }  
    }

      public function thresholdEdit($thresholdId)
    {
        $this->db->select();
        $this->db->from('rad_threshhold');
        $this->db->where('rth_id',$thresholdId);
        $query = $this->db->get();
        if($query->num_rows() > 0) 
        {
            return $query->row_array();
        } 
        else 
        {
            return FALSE;
        }   
    }

    public function update_threshold($data,$thresholdId)
    { 
        $this->db->where('rth_id',$thresholdId);
        $query =  $this->db->update($this->radThreshhold,$data);
        if($query) 
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function getAgmsReportList()
    {
        $this->db->select();
        $query = $this->db->get($this->agmsReport);
        if($query)
        {
            return $query->result_array();   
        }
        else
        {
            return FALSE;
        }  
    }


    public function deleteAGRMS($package_id)
    {
        $this->db->select();
        $this->db->from($this->agmsReport);
        $this->db->where('id',$package_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
        {
            $result_img =  $query->result_array();
          /*  if($result_img)
            {
                foreach ($result_img as $image) 
                { 
                    unlink("uploads/packages/".$image['image']);   
                } 
            }*/
 
            $img_delete =  $this->db->delete('agms_report', array('id' => $package_id));
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

     public function getAGMSChannel()
    {
        $this->db->select();
        $query = $this->db->get($this->agmsChannel);
        if($query)
        {
            return $query->result_array();   
        }
        else
        {
            return FALSE;
        }  
    }

     public function delete_agmsChannel($child_id)
    {
        $this->db->select();
        $this->db->from($this->agmsChannel);
        $this->db->where('chid',$child_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
        {
            $result_img =  $query->result_array();
          /*  if($result_img)
            {
                foreach ($result_img as $image) 
                { 
                    unlink("uploads/packages/".$image['image']);   
                } 
            }*/
 
            $img_delete =  $this->db->delete('agms_channel', array('chid' => $child_id));
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

    public function update_agmsChannel($data,$chid)
    { 
        $this->db->where('chid',$chid);
        $query =  $this->db->update($this->agmsChannel,$data);
        if($query) 
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function agmsChannelEdit($chid)
    {
        $this->db->select();
        $this->db->from('agms_channel');
        $this->db->where('chid',$chid);
        $query = $this->db->get();
        if($query->num_rows() > 0) 
        {
            return $query->row_array();
        } 
        else 
        {
            return FALSE;
        }   
    }


    public function getRGMSChannel()
    {
        $this->db->select();
        $query = $this->db->get($this->rgmsChannel);
        if($query)
        {
            return $query->result_array();   
        }
        else
        {
            return FALSE;
        }  
    }

     public function delete_rgmsChannel($child_id)
    {
        $this->db->select();
        $this->db->from($this->rgmsChannel);
        $this->db->where('chid',$child_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
        {
            $result_img =  $query->result_array();
          /*  if($result_img)
            {
                foreach ($result_img as $image) 
                { 
                    unlink("uploads/packages/".$image['image']);   
                } 
            }*/
 
            $img_delete =  $this->db->delete('rgms_channel', array('chid' => $child_id));
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

    public function update_rgmsChannel($data,$chid)
    { 
        $this->db->where('chid',$chid);
        $query =  $this->db->update($this->rgmsChannel,$data);
        if($query) 
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function rgmsChannelEdit($chid)
    {
        $this->db->select();
        $this->db->from('rgms_channel');
        $this->db->where('chid',$chid);
        $query = $this->db->get();
        if($query->num_rows() > 0) 
        {
            return $query->row_array();
        } 
        else 
        {
            return FALSE;
        }   
    }

    public function getEmergencyTeamList()
    {
        $this->db->select();
        $query = $this->db->get($this->emergencyTeamData);
        if($query)
        {
            return $query->result_array();   
        }
        else
        {
            return FALSE;
        }  
    }


     public function deleteEmergencyTeam($id)
    {
        $this->db->select();
        $this->db->from($this->emergencyTeamData);
        $this->db->where('id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
        {
            $result_img =  $query->result_array();
          /*  if($result_img)
            {
                foreach ($result_img as $image) 
                { 
                    unlink("uploads/packages/".$image['image']);   
                } 
            }*/
 
            $img_delete =  $this->db->delete('emergency_team_data', array('id' => $id));
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

    public function update_emergencyTeam($data,$id)
    { 
        $this->db->where('id',$id);
        $query =  $this->db->update($this->emergencyTeamData,$data);
        if($query) 
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function emergencyTeamEdit($id)
    {
        $this->db->select();
        $this->db->from('emergency_team_data');
        $this->db->where('id',$id);
        $query = $this->db->get();
        if($query->num_rows() > 0) 
        {
            return $query->row_array();
        } 
        else 
        {
            return FALSE;
        }   
    }

    public function getEmergencyWorkList()
    {
        $this->db->select();
        $query = $this->db->get($this->emergencyWork);
        if($query)
        {
            return $query->result_array();   
        }
        else
        {
            return FALSE;
        }  
    }


     public function deleteEmergencyWork($id)
    {
        $this->db->select();
        $this->db->from($this->emergencyWork);
        $this->db->where('id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
        {
            $result_img =  $query->result_array();
          /*  if($result_img)
            {
                foreach ($result_img as $image) 
                { 
                    unlink("uploads/packages/".$image['image']);   
                } 
            }*/
 
            $img_delete =  $this->db->delete('emergency_Work', array('id' => $id));
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
   
}