<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Package_model extends CI_Model
{
    private $service =  "services";
    private $events =   "events";
    private $package =  "packages";
    private $packag_images =  "package_images";
    private $locations =  "locations";
    private $main =  "package_main";
    private $price_data =  "price_location";
    private $price_type =  "price_type";
    private $service_categories =  "service_categories";
    private $booking_customer_details =  "booking_customer_details";
    private $customer_booking_products =  "customer_booking_products";
    
	public function __construct()
	{
	    parent::__construct();
	}

    
    public function save_package($data)
    {
        $this->db->insert($this->package,$data);
        if ($this->db->affected_rows() > 0 ) 
        {
            return $this->db->insert_id();
        }
        else
        {
            return FALSE;
        }
    }

    public function save_images($data_img)
    {
        $this->db->insert($this->packag_images,$data_img);
        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }       
    }  

    public function get_locations()
    {
        $this->db->select('location_id,location');
        $query = $this->db->get($this->locations);
        if($query)
        {
            return $query->result_array();   
        }
        else
        {
            return FALSE;
        }  
    }

    public function get_prict_type()
    {
        $this->db->select();
        $query = $this->db->get($this->price_type);
        if($query)
        {
            return $query->result_array();   
        }
        else
        {
            return FALSE;
        }  
    } 

    public function get_price($package_id)
    {
        $this->db->select('b.price,b.discount,b.price_id,b.location_id');
        $this->db->from('price_location as b');
        $this->db->where('b.package_id',$package_id);
        $query = $this->db->get();
        if($query->num_rows() > 0) 
        {
            return $query->result_array();
        } 
        else 
        {
            return FALSE;
        }   
    } 
	
	public function  getall_packages()
	{         
        $sql_query = "SELECT package_name,service_name,package_id,event_name,service_cat_name,realated_product FROM (SELECT a.name as package_name,a.package_id,a.realated_product,d.name as service_name,e.name as service_cat_name,(SELECT GROUP_CONCAT((select c.event_name FROM events as c where g.event_id = c.event_id)) as event_name FROM package_main as g where a.package_id = g.package_id) as event_name FROM packages as a 
        LEFT JOIN package_main as b ON a.package_id = b.package_id
        LEFT JOIN service_categories as e ON a.service_cat_id = e.category_id
        LEFT JOIN services as d ON a.service_id = d.service_id) as db GROUP BY package_id ORDER BY package_id desc";

        $query = $this->db->query($sql_query);  
        if ($query->num_rows() > 0) 
        {
           return $query->result_array();
        }
        else
        {
        	return FALSE;
        }
	} 


    // $this->db->select('a.name,a.description,c.event_name,d.name as service_name');
    //     $this->db->from('packages as a');
    //     $this->db->join('package_main as b','a.package_id = b.package_id','left');
    //     $this->db->join('events as c','b.event_id = c.event_id','left');
    //     $this->db->join('services as d','b.service_id = d.service_id','left');
    //     $this->db->join('package_images as e','a.package_id = e.package_id','left');
    //     $this->db->order_by('a.package_id','desc');
    //     $query = $this->db->get();
    //     echo $this->db->last_query();exit;
    //     if ($query->num_rows() > 0) 
    //     {
    //        return $query->result_array();
    //     }
    //     else
    //     {
    //         return FALSE;
    //     }


    public function package_view($package_id)
    {
        $this->db->select('a.name,a.description,a.price,a.price_addl_qty,a.catring_type,a.discount,a.min_qty,b.*');
        $this->db->from('packages as a');
        $this->db->where('a.package_id',$package_id);
        $this->db->join('package_images as b','a.package_id = b.package_id','left');
        $query = $this->db->get();
        if($query->num_rows() > 0) 
        {
            return $query->result_array();
        } 
        else 
        {
            return FALSE;
        }   
    } 

    

    public function edit_package($package_id)
    {
        $this->db->select();
        $this->db->from('packages');
        $this->db->where('package_id',$package_id);
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


    public function edit_package_event($package_id)
    {
        $this->db->select('a.event_id');
        $this->db->from('package_main as a');
        $this->db->where('a.package_id',$package_id);
        $query = $this->db->get();
        if($query->num_rows() > 0) 
        {
            return $query->result_array();
        } 
        else 
        {
            return FALSE;
        }   
    } 


    public function edit_package_img($package_id)
    {
        $this->db->select('a.*');
        $this->db->from('package_images as a');
        $this->db->where('a.package_id',$package_id);
        $query = $this->db->get();
        if($query->num_rows() > 0) 
        {
            return $query->result_array();
        } 
        else 
        {
            return FALSE;
        }   
    } 


    public  function location_ids($place_id,$package_id) 
    {
        $sql = "SELECT price_id,location_id,package_id from price_location WHERE location_id ='$place_id' AND package_id = '$package_id' "; 
        $query = $this->db->query($sql);
        if($query->num_rows() > 0) 
        {
           return $query->row_array();
        }
        else
        {
            return FALSE;
        }   
    }
 
    public function insert_price($data)
    {
        $this->db->insert($this->price_data,$data);
        if ($this->db->affected_rows() > 0 ) 
        {
           return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function update_price($data_price_update,$id_price,$package_id,$id_location)
    {
        $this->db->where('price_id',$id_price);
        $this->db->where('package_id',$package_id);
        $this->db->where('location_id',$id_location);
        $query = $this->db->update($this->price_data,$data_price_update);
        if($query) 
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }


    public function update_package($data,$package_id)
    {
        $this->db->where('package_id',$package_id);
        $query =  $this->db->update($this->package,$data);
        if($query) 
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function delete_events($package_id)
    {
        $this->db->where('package_id',$package_id);
        $this->db->delete($this->main);
        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }     
    }
 

    public function delete_package_img($package_img_id)
    {
        $this->db->select();
        $this->db->from($this->packag_images);
        $this->db->where('pack_img_id',$package_img_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
        {
            $result =  $query->row_array();
            unlink("uploads/packages/".$result['image']);
            $img_delete =  $this->db->delete('package_images', array('pack_img_id' => $package_img_id));
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


    // public function package_delete($package_id)
    // {
    //     $this->db->where('package_id',$package_id);
    //     $this->db->delete($this->package);
    //     if($this->db->affected_rows() > 0)
    //     {
    //         return TRUE;
    //     }
    //     else
    //     {
    //         return FALSE;
    //     }     
    // }

    public function package_delete($package_id)
    {
        $this->db->select();
        $this->db->from($this->packag_images);
        $this->db->where('package_id',$package_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
        {
            $result_img =  $query->result_array();
            if($result_img)
            {
                foreach ($result_img as $image) 
                { 
                    unlink("uploads/packages/".$image['image']);   
                } 
            }
 
            $img_delete =  $this->db->delete('packages', array('package_id' => $package_id));
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
 

    public function service_data()
    {
        $this->db->select();
        $this->db->from($this->service);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }

    public function event_data()
    {
        $this->db->select();
        $this->db->from($this->events);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }

    public function pack_main_data($data)
    {
        $this->db->insert($this->main,$data);
        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }       
    }

    public  function getservice_category($service_id) 
    {
        $this->db->select('name,category_id');
        $this->db->where('service_id',$service_id);
        $this->db->from($this->service_categories);
        $query = $this->db->get();
        if($query)
        {
         return $query->result_array(); 
        }
        else
        {
            return FALSE;
        } 
    }  

    public function getall_customers()
    {
        $this->db->select();
        $this->db->order_by('book_cust_id','desc');
        $query = $this->db->get($this->booking_customer_details);

        if($query)
        {
            return $query->result_array();   
        }
        else
        {
            return FALSE;
        }  
    }

    public function customer_view($cust_id)
    {
        $this->db->select();
        $this->db->from('booking_customer_details as a');
        $this->db->where('a.book_cust_id',$cust_id);
        // $this->db->join('package_images as b','a.package_id = b.package_id','left');
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

    public function customer_products($cust_id)
    {
        $this->db->select();
        $this->db->from('customer_booking_products as a');
        $this->db->where('a.book_cust_id',$cust_id);
        $query = $this->db->get();
        if($query->num_rows() > 0) 
        {
            return $query->result_array();
        } 
        else 
        {
            return FALSE;
        }   
    } 

    public function create_related_Product($data,$checkboxes)
    {
       
        $package_id = implode("','",$checkboxes); 
        $this->db->where("package_id IN ('".$package_id."')",NULL, false);
        $query = $this->db->update($this->package,$data);
       // echo $this->db->last_query();exit;
        if($query) 
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    } 

    public function create_related_Product2($data2,$checkboxes)
    {
       
        $package_id = implode("','",$checkboxes); 
        $this->db->where("package_id NOT IN ('".$package_id."')",NULL, false);
        $query = $this->db->update($this->package,$data2);
        if($query) 
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }     
    } 

    
}