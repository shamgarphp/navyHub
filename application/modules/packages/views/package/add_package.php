<div class="page-content-wrapper">
   <div class="page-content">
      <div class="page-head">
      </div>
      <div class="portlet light bordered">
         <div class="portlet-title">
            <div class="caption font-red-sunglo">
               <i class="fa fa-list" aria-hidden="true"></i>
               <span class="caption-subject bold uppercase">Add Product</span>
            </div>
            <div class="actions">
            </div>
         </div>
         <div class="portlet-body form">
            <form  action="" method="POST" enctype="multipart/form-data" id="add_package_form">

               <div class="row">
                <div class="col-lg-4">
                <span class="caption-subject bold uppercase">Name</span>
                <div class="field_w_search">
                <input type="text" class="form-control" id="package_name" placeholder="Product name" name="package_name">
                </div>
                </div> 

              <!--   <div class="col-lg-4">
                <span class="caption-subject bold uppercase">Catering Type</span>
                <div class="field_w_search">
                <select name="cat_type" id="cat_type" class="form-control">
                          <option value="">Select type</option> 
                          <option value="1">Veg</option> 
                          <option value="2">Non-Veg</option>   
                 </select>
                </div>
                </div> -->

               <div class="col-lg-4">
                <span class="caption-subject bold uppercase">Price Type</span>
                <div class="field_w_search">
                <select name="price_type" id="price_type" class="form-control">
                          <option value="">Select</option> 
                        <?php if (isset($price_types) && !empty($price_types)) { ?>
                         <?php foreach ($price_types as $price_type) { ?>
                            <option value="<?php echo $price_type['price_type_id'];?>" ><?php echo $price_type['price_type'];?></option>
                        <?php } } ?>  

                        </select>
                </div>
                </div>   

                </div><br><br>  


                 <div class="row">
                    <div class="col-lg-3">
                       <span class="caption-subject bold uppercase">Price</span>
                      <div class="field_w_search">
                       <input type="number" class="form-control" id="price" placeholder="Enter price" name="price">
                      </div>
                    </div> 
                    
                    <div class="col-lg-3">
                       <span class="caption-subject bold uppercase">Min Quantity</span>
                      <div class="field_w_search">
                       <input type="number" class="form-control" id="min_qty" placeholder="Enter minmum quantity" name="min_qty">
                      </div>
                    </div>
                     <div class="col-lg-3">
                       <span class="caption-subject bold uppercase">Price Per Addl Quantity</span>
                      <div class="field_w_search">
                       <input type="number" class="form-control" id="add_qty_price" placeholder=" Price per additional quantity" name="add_qty_price">
                      </div>
                    </div>
                    <div class="col-lg-3">
                       <span class="caption-subject bold uppercase">Discount(%)</span>
                      <div class="field_w_search">
                        <input type="number" class="form-control" id="discount" placeholder="Enter Discount" name="discount">
                      </div>
                    </div>                  
                </div><br><br>

               <div class="row">
               
                <div class="col-lg-6">
                <span class="caption-subject bold uppercase">Service</span>
                <div class="field_w_search">
              <select class="form-control" name="service" id="service">
                        <option value="">Select Service</option>
                         <?php if (isset($list_service) && !empty($list_service)) { ?>
                         <?php foreach ($list_service as $service) { ?>
                          
                            <option value="<?php echo $service['service_id']?>" ><?php echo $service['name'];?></option>
                          <?php } } ?>  
                        </select>
                </div>
                </div>

               <div class="col-lg-6">
                <span class="caption-subject bold uppercase">Service Category</span>
                <div class="field_w_search">
               <select class="form-control service_category" name="service_category" id="service_category">
                      
                      </select>
                </div>
                </div>   

                </div><br><br>  
        

                 <div class="form-group">
                <span class="caption-subject bold uppercase">Events</span>
                <div class="mt-checkbox-inline">
                  <?php if (isset($list_event) && !empty($list_event)) { ?>
                  <?php foreach ($list_event as $event) { ?>
                  <?php if(!empty($event['event_name'])) { ?>

                  <label class="mt-checkbox">
                  <input type="checkbox" class="events" id="inlineCheckbox1" value="<?php echo $event['event_id']?>" name="events[]"> 
                  <?php  echo $event['event_name']; ?>
                  <span></span>
                  </label>

                  <?php } ?> 
                  <?php } } ?>  
                </div>
                 </div> 

              
               <div class="row">
                    <div class="col-lg-12">
                       <span class="caption-subject bold uppercase">Description</span>
                      <div class="field_w_search">
                        <textarea name="package_desc" id="package_desc" required=""> </textarea>
                      </div>
                    </div>                   
                </div><br> 

            <div class="form-group">
                <input type="file" id="package_image" name="package_image[]" multiple="multiple" class="form-control" required="" required="">
            </div> 

               <div class="form-actions">
                  <button type="submit" class="btn blue" name="add_package" id="add_package" value="add_package">Submit</button>
                 <a id="add_package_reset" class="btn sbold red" class="btn default">Reset</a> 
               </div>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
            </form>
         </div>
      </div>
   </div>
</div>
</div>
</div>