<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Navy_model extends CI_Model
{
    
    private $mpp =  "mpp";
    
	public function __construct()
	{
	    parent::__construct();
	}


    public function delete_navy($package_id)
    {
        $this->db->select();
        $this->db->from($this->mpp);
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
 
            $img_delete =  $this->db->delete('mpp', array('id' => $package_id));
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
        $query = $this->db->get($this->mpp);

        if($query)
        {
            return $query->result_array();   
        }
        else
        {
            return FALSE;
        }  
    }


    
}