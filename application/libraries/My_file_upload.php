<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_file_upload {

    protected  $ci;
	public function __construct() /* use a constructor, as you can't directly call a function*/
	{
	  $this->ci =& get_instance();
	}

   public function do_upload($data)
   {	
		$img_name       = $data['img_name'];
		$img_path       = $data['img_path'];
		$img_size       = $data['max_size'];
		$img_height     = $data['max_height'];
		$img_width      = $data['max_width'];
		$allowed_types  = $data['allowed_types'];

	    if(!empty($img_name))
        {
			$config = array(
			'upload_path' => $img_path,
			'allowed_types' => $allowed_types,
			'overwrite' => TRUE,
			'max_size' => $img_size, 
			'max_height' => $img_height,
			'max_width' =>  $img_width,
			'encrypt_name' => TRUE
			);

		    $this->ci->upload->initialize($config);
			if($this->ci->upload->do_upload($img_name))
			{
			  return array('message' => $this->ci->upload->data());
			}
			else
			{
			  return array('error' => $this->ci->upload->display_errors()); 
			}            
       }
       else
       {
       	 return false;
       }

    }   

}