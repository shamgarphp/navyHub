<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

     if ( ! function_exists('pr'))
     {
       function pr($data)
       {
          echo "<pre>";
		  print_r($data);
		  echo "<h2> In detail <h2>";
		  var_dump($data);
		  exit;
       }
     }
	 
	  if ( ! function_exists('prnot'))
     {
       function prnot($data)
       {
          echo "<pre>";
		  print_r($data);
		  //echo "<h2> In detail <h2>";
		  //var_dump($data);
		  
       }
     }
	 
	 if ( ! function_exists('current_date'))
     {
       function current_date()
       {
          return date('Y-m-d H:i:s');
		  
       }
     }