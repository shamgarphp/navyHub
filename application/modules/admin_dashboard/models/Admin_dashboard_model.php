<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_dashboard_model extends CI_Model 
{
    private $events =      "events";
    private $services =    "services";
    private $products =    "packages";
    private $locations =   "locations";
    private $booking_customer =   "booking_customer_details";
	
    
	public function __construct()
	{
	    parent::__construct();
	}
  
  public  function count_events() 
	{
      $this->db->select();
      $this->db->from($this->events);
      $query = $this->db->get();
      if($query->num_rows() > 0)
      {
         return $query->num_rows();
      }
      else
      {
      	 return FALSE;
      } 
  } 

    public  function count_services() 
    {
        $this->db->select();
        $this->db->from($this->services);
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
          return $query->num_rows();
        }
        else
        {
            return FALSE;
        } 
    } 

    public  function count_products() 
    {
        $this->db->select();
        $this->db->from($this->products);
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
          return $query->num_rows();
        }
        else
        {
            return FALSE;
        } 
    } 

    public  function customers() 
    {
        $this->db->select();
        $this->db->from($this->booking_customer);
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
          return $query->num_rows();
        }
        else
        {
            return FALSE;
        } 
    } 

    
}
?>