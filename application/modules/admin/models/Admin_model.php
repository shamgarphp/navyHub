<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model
{
    private $admin = "admin";
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getOne($email,$pwd)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $pwd);
        $query = $this->db->get($this->admin);
        if($query) 
        {
            return $query->row_array();
        } 
        else 
        {
            return FALSE;
        }  
    }

    public function check_user_email($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get($this->admin);
        if($query) 
        {
            return $query->row_array();
        } 
        else 
        {
            return FALSE;
        }  
    }

    public function get_user($id)
    {
        $this->db->where('admin_id', $id);
        $query = $this->db->get($this->admin);
        if($query)
        {
           return $query->row_array();   
        }
        else
        {
           return FALSE;
        }    
    }
    
    public function profile_update($data,$admin_id)
    {
      $this->db->where('admin_id',$admin_id);
      $this->db->update($this->admin,$data);
      if($this->db->affected_rows() > 0)
      {
         return TRUE;
      }
      else
      {
         return FALSE;
      }     
    } 

   public function updata_pass($data,$user_id)
   {
      $this->db->where('admin_id',$user_id);
      $query =$this->db->update($this->admin,$data); 
      if($query)
      {
        return true;
      }
      else
      {
         return FALSE;
      }
    }

}