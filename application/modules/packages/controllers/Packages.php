<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Packages extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Package_model');
        modules::run('admin/admin/is_logged_in');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['package_list'] =  $this->Package_model->getall_packages(); 
        $data['file']         = 'packages/package/pakage_list';
        $data['table_js']    = 'admin/all_common_js/admin_tables_js.php';
        $this->load->view('admin_template/main',$data); 
    }

    public function add_package()
    {   
        $this->form_validation->set_rules('package_name','product','required|trim|strtolower');
        $this->form_validation->set_rules('service','service','required|trim');
        $this->form_validation->set_rules('events[]','events','required|trim');
        $this->form_validation->set_rules('price','price','required|trim');
        $this->form_validation->set_rules('discount','discount','required|trim');
        $this->form_validation->set_rules('package_desc','package description','required|trim');
        $this->form_validation->set_rules('price_type','price type','required|trim');
        if ($this->form_validation->run() == FALSE)
        {
            $data['price_types'] = $this->Package_model->get_prict_type();  
            $data['file'] = 'packages/package/add_package';             
            $data['custom_js']   = 'packages/package/js/package_js';
            $data['validation_js'] = 'admin/all_common_js/frontend_validation_js';
            $data['list_service'] = $this->Package_model->service_data();
            $data['list_event'] = $this->Package_model->event_data();
            $this->load->view('admin_template/main',$data);
        }
        else
        {
            if(isset($_POST['add_package']) && !empty($_POST['add_package']))
            {               
                $data = array(

                     'name' => $this->input->post("package_name"),
                     'description' => $this->input->post("package_desc"),
                     'service_id' => $this->input->post("service"), 
                     'service_cat_id' => $this->input->post("service_category"), 
                     'price_type_id' => $this->input->post("price_type"), 
                     'price' => $this->input->post("price"), 
                     'min_qty' => $this->input->post("min_qty"), 
                     'price_addl_qty' => $this->input->post("add_qty_price"), 
                     'discount' => $this->input->post("discount"), 
                     // 'catring_type' => $this->input->post("cat_type"), 
                     'status'  => 1,
                     'created_on' => date('Y-m-d H:i:s') 
                );

                $result = $this->Package_model->save_package($data);    

                if($result)
                {
                    $package_id  = $result;
                    if (isset($_FILES['package_image']['name']) && !empty($_FILES['package_image']['name'][0])) 
                    {
                        $file_count  = count($_FILES['package_image']['name']);
                        
                        for($i = 0; $i < $file_count; $i++)
                        {
                            $_FILES['file']['name']     = $_FILES['package_image']['name'][$i];
                            $_FILES['file']['type']     = $_FILES['package_image']['type'][$i];
                            $_FILES['file']['tmp_name'] = $_FILES['package_image']['tmp_name'][$i];
                            $_FILES['file']['error']    = $_FILES['package_image']['error'][$i];
                            $_FILES['file']['size']     = $_FILES['package_image']['size'][$i];

                            /*create img required details size,path*/
                            $img_data = array(
                                'img_name' => 'file',
                                'img_path' => './uploads/packages',
                                'max_size' => '',
                                'allowed_types' => 'gif|jpg|png|jpeg',
                                'max_height' => '',
                                'max_width' => ''
                            );
                            /*This is the file upload Custom library file*/
                            $this->load->library('my_file_upload');
                            $file     = $this->my_file_upload->do_upload($img_data);
                            if(isset($file['message']['file_name']) && !empty($file['message']['file_name']))
                            {
                                $filename = preg_replace("/[^A-Za-z0-9\_\-\.]/",'',basename($file['message']['file_name']));
                                $filename = $filename;
                            }
                            
                            $data_img   = array(
                            'image' => $filename, 
                            'package_id' => $package_id, 
                            ); 

                            $result_img = $this->Package_model->save_images($data_img);
                        }
                    }

                    if (isset($_POST['events'],$package_id) && !empty($_POST['events']) && !empty($package_id))
                    {    
                        $event  = $this->input->post("events");
                        $count  = count($this->input->post("events"));
                    
                        for($i = 0; $i < $count; $i++)
                        {
                            $data_package   = array(
                            'event_id' => $event[$i], 
                            'package_id' => $package_id
                            ); 

                            $result_package = $this->Package_model->pack_main_data($data_package);
                        }
                    }  

                    $this->session->set_flashdata('success', 'Add Product successfully!'); 
                    redirect('package');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Add Product failed.Please try again!'); 
                    redirect('add_package');
                }           
            }
            else
            {
               $this->session->set_flashdata('error', 'Add Product failed.Please try again!'); 
                    redirect('add_package'); 
            }
        }
        
    }

    public function view_package() 
    {      
        $package_id = base64_decode($_GET['idpackage']); 
        if (isset($_GET['idpackage']) && !empty($_GET['idpackage'])) 
        {
            $package_id              = base64_decode($_GET['idpackage']);
            $data['package_view']     = $this->Package_model->package_view($package_id);
            $data['file']             = 'packages/package/package_view';
             /*load admin templeate.send all data this admin templeate*/
            $this->load->view('admin_template/main', $data);
        }
    }  

    public function package_edit() 
    { 
        if (isset($_GET['idpackage']) && !empty($_GET['idpackage'])) 
        {    
            $package_id  = base64_decode($_GET['idpackage']);
            $data['packge_edit'] = $this->Package_model->edit_package($package_id); 
            $data['packge_edit_event'] = $this->Package_model->edit_package_event($package_id); 
            $data['all_locations'] = $this->Package_model->get_locations(); 
            $data['location_price'] = $this->Package_model->get_price($package_id); 
            $data['packge_edit_img'] = $this->Package_model->edit_package_img($package_id);
            $data['price_types'] = $this->Package_model->get_prict_type();

            $this->form_validation->set_rules('package_name','product','required|trim|strtolower');
            $this->form_validation->set_rules('service','service','required|trim');
            $this->form_validation->set_rules('events[]','events','required|trim');
            $this->form_validation->set_rules('price','price','required|trim');
             $this->form_validation->set_rules('discount','discount','required|trim');
            $this->form_validation->set_rules('package_desc','package description','required|trim');
            $this->form_validation->set_rules('price_type','price type','required|trim');
            if ($this->form_validation->run() == FALSE) 
            {
                $data['list_service_edit'] = $this->Package_model->service_data();
                $data['list_event'] = $this->Package_model->event_data();
                $data['file']           = 'packages/package/package_edit';
                $data['custom_js']      = 'packages/package/js/package_js';
                /*event front end  validations*/
                $data['validation_js']       = 'admin/all_common_js/frontend_validation_js';
                /*load admin templeate.send all data this admin templeate*/
                $this->load->view('admin_template/main', $data);
            } 
            else 
            {
                if (!empty($_POST['update_package']) && isset($_POST['update_package'])) 
                {
                    $data = array(

                             'name' => $this->input->post("package_name"),
                             'service_id' => $this->input->post("service"), 
                             'price_type_id' => $this->input->post("price_type"), 
                             'price' => $this->input->post("price"), 
                             'min_qty' => $this->input->post("min_qty"), 
                             'price_addl_qty' => $this->input->post("add_qty_price"), 
                             'discount' => $this->input->post("discount"), 
                             'description' => $this->input->post("package_desc"),
                             // 'catring_type' => $this->input->post("cat_type"), 
                             'updated_on' => date('Y-m-d H:i:s')  
                    );
        
                    $result = $this->Package_model->update_package($data,$package_id);

                    if ($result) 
                    {
                        if (isset($_POST['location'],$_POST['price_location'],$_POST['discount_location'],$package_id) && !empty($package_id))
                        {   
                            $count_location  = count($this->input->post("location"));
                            $location  = $this->input->post("location");
                            $price  = $this->input->post("price_location");
                            $discount  = $this->input->post("discount_location");

                            for($i = 0; $i < $count_location; $i++)
                            {   
                                $place_id      = $location[$i];
                                $data_location_ids = $this->Package_model->location_ids($place_id,$package_id);

                                $id_location   = $data_location_ids['location_id'];
                                $id_package   = $data_location_ids['package_id'];
                                $id_price   = $data_location_ids['price_id'];
                                if ($id_location != $place_id && $id_package != $package_id) 
                                {
                                    $data_price   = array(
                                    'location_id' => $location[$i], 
                                    'price' => $price[$i], 
                                    'discount' => $discount[$i], 
                                    'package_id' => $package_id,
                                    'created_on' => date('Y-m-d H:i:s') 
                                    ); 

                                    $result_price = $this->Package_model->insert_price($data_price);
                                }
                                else
                                {
                                     $data_price_update   = array(
                                    'price' => $price[$i], 
                                    'discount' => $discount[$i],
                                    'updated_on' => date('Y-m-d H:i:s')  
                                    ); 

                                    $result_price = $this->Package_model->update_price($data_price_update,$id_price,$package_id,$id_location);
                                }    
                            }
                        }  
                      

                        if (isset($_FILES['package_image']['name']) && !empty($_FILES['package_image']['name'][0])) 
                        {
                            $file_count  = count($_FILES['package_image']['name']);
                            
                            for($i = 0; $i < $file_count; $i++)
                            {
                                $_FILES['file']['name']     = $_FILES['package_image']['name'][$i];
                                $_FILES['file']['type']     = $_FILES['package_image']['type'][$i];
                                $_FILES['file']['tmp_name'] = $_FILES['package_image']['tmp_name'][$i];
                                $_FILES['file']['error']    = $_FILES['package_image']['error'][$i];
                                $_FILES['file']['size']     = $_FILES['package_image']['size'][$i];

                                /*create img required details size,path*/
                                $img_data = array(
                                    'img_name' => 'file',
                                    'img_path' => './uploads/packages',
                                    'max_size' => '',
                                    'allowed_types' => 'gif|jpg|png',
                                    'max_height' => '',
                                    'max_width' => ''
                                );
                                /*This is the file upload Custom library file*/
                                $this->load->library('my_file_upload');
                                $file     = $this->my_file_upload->do_upload($img_data);
                                if(isset($file['message']['file_name']) && !empty($file['message']['file_name']))
                                {
                                    $filename = preg_replace("/[^A-Za-z0-9\_\-\.]/",'',basename($file['message']['file_name']));
                                    $filename = $filename;
                                }
                                
                                $data_img   = array(
                                'image' => $filename, 
                                'package_id' => $package_id, 
                                ); 

                                $result_img = $this->Package_model->save_images($data_img);
                            }        
                        }

                        $event_delete  = $this->Package_model->delete_events($package_id);

                        if (isset($_POST['events'],$package_id) && !empty($_POST['events']) && !empty($package_id))
                        {    
                            $event  = $this->input->post("events");
                            $count  = count($this->input->post("events"));
                        
                            for($i = 0; $i < $count; $i++)
                            {
                                $data_package   = array(
                                'event_id' => $event[$i], 
                                'package_id' => $package_id
                                ); 

                                $result_package = $this->Package_model->pack_main_data($data_package);
                            }
                        }  

                        $this->session->set_flashdata('success','Updated Successfully!');
                        redirect('package'); 
                    } 
                    else 
                    {
                        $this->session->set_flashdata('error', 'updated failed. please try again!');
                        redirect('package_edit?&idpackage='.base64_encode($package_id));
                    }
                    
                }
                else
                {
                    $this->session->set_flashdata('error', 'updated failed. please try again!');
                    redirect('package_edit?&idpackage='.base64_encode($package_id));  
                }
            }
            
        }
        else
        {
           $this->session->set_flashdata('error', 'updated failed. please try again!');
           redirect('package'); 
        }
    }


    public function delete_package() /*admin user delete*/ 
    {  
        if (isset($_GET['idpackage']) && !empty($_GET['idpackage'])) 
        {
            $package_id     = base64_decode($_GET['idpackage']);
            $result = $this->Package_model->package_delete($package_id);
            if ($result) 
            {
                $this->session->set_flashdata('success', 'Delete Successfully!');
              redirect('package'); 
            } 
            else 
            {
                $this->session->set_flashdata('error', 'Delete failed!');
                redirect('package');  
            }
        }
        else
        {
            $this->session->set_flashdata('error', 'Delete failed!');
             redirect('package');  
        }
           
    }

    
    public function packag_img_remove() 
    {
        if (isset($_POST['img_id']) && !empty($_POST['img_id'])) 
        {
            $img_id = $this->input->post('img_id'); 
            $package_img_id  = $img_id;
            $result = $this->Package_model->delete_package_img($package_img_id);
            echo $result;    
        } 
        else 
        {
              return false;   
        }
    }

    public function service_category() /*get practice area skills*/
    {
        if (isset($_POST['service_id']) && !empty($_POST['service_id'])) 
        {
            $service_id  = $_POST['service_id'];
            $service_category_data = $this->Package_model->getservice_category($service_id);
            echo json_encode($service_category_data);  
        }
        else 
        {
            return false;   
        }
    }  


    public function customers_products()
    {
        $data['customers_list'] =  $this->Package_model->getall_customers(); 
        $data['file']         = 'packages/customers_products/customer_list';
        $data['table_js']    = 'admin/all_common_js/admin_tables_js.php';
        $this->load->view('admin_template/main',$data); 
    } 

    public function view_customer() 
    {       
        if (isset($_GET['id']) && !empty($_GET['id'])) 
        {
            $customer_id = base64_decode($_GET['id']); 
            $data['customer_view']     = $this->Package_model->customer_view($customer_id);
            $data['customer_products']     = $this->Package_model->customer_products($customer_id);
            $data['file']             = 'packages/customers_products/customer_view';
             /*load admin templeate.send all data this admin templeate*/
            $this->load->view('admin_template/main', $data);
        }
    }  

    public function create_related_Products() 
    {
        if (isset($_POST['Related_products']) && !empty($_POST['Related_products'])) 
        {
            $checkboxes = $_POST['realated_product'];
            $data   = array(
                'realated_product' => 1, 
            ); 

            $InResult = $this->Package_model->create_related_Product($data,$checkboxes);
            $data2   = array(
                'realated_product' => 0, 
            );

            $NotInResult = $this->Package_model->create_related_Product2($data2,$checkboxes);

            if($InResult)
            {
                $this->session->set_flashdata('success', 'Realated product create successfully!');  
                redirect("package");
            }
            else
            {
                $this->session->set_flashdata('error', 'Realated product create failed! Try again.');  
                redirect("package");
            }  
                                   
        } 
        
    }


}