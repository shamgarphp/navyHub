  <div class="page-content-wrapper">
  <!-- BEGIN CONTENT BODY -->
  <div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">      
    </div>
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->

    <div class="portlet light bordered">
      <div class="portlet-title">
        <div class="caption font-dark">
            <i class="fa fa-list" aria-hidden="true"></i>
          <span class="caption-subject bold uppercase">Product Update
          </span>
        </div>
      </div>
      <div class="portlet-body form">
        <form  action="" method="POST" enctype="multipart/form-data" id="package_update_form">
        <div class="row">
          <div class="form-group col-sm-12">
            <span class="caption-subject bold uppercase">Product</span>
            <div class="input-group">
              <input type="text" class="form-control" id="package_name" placeholder="Product name" name="package_name" value="<?php if(isset($packge_edit['name']) && !empty($packge_edit['name'])){ echo $packge_edit['name']; } ?>">
              <span class="input-group-addon">
              </span>
            </div>
          </div>
        </div>
        <br> 

        <div class="form-group">
                   <span class="caption-subject bold uppercase">Price Type </span>
                  <div class="input-group">
                      <select name="price_type" id="price_type" class="form-control">
                          <option value="">Select</option> 
                        <?php $pric_type_id = $packge_edit['price_type_id']; if (isset($price_types) && !empty($price_types)) { ?>
                         <?php foreach ($price_types as $price_type) { ?>
                            <option value="<?php echo $price_type['price_type_id'];?>" <?php if($pric_type_id == $price_type['price_type_id']){ echo 'selected'; } ?>><?php echo $price_type['price_type'];?></option>
                        <?php } } ?>  

                        </select>
                     <span class="input-group-addon">     
                     </span>
                  </div>
          </div><br>

    <!-- <?php if(!empty($price_type['catring_type'])) { ?>
          <div class="form-group">
                   <span class="caption-subject bold uppercase">Catering Type</span>
                  <div class="input-group">
                      <select name="cat_type" id="cat_type" class="form-control">
                          <option value="">Select type</option> 
                          <option value="1" <?php if($price_type['catring_type'] == 1){ echo 'selected'; } ?>>Veg</option> 
                          <option value="2" <?php if($price_type['catring_type'] == 2){ echo 'selected'; } ?>>Non-Veg</option>   
                 </select>
                     <span class="input-group-addon">     
                     </span>
                  </div>
          </div><br>

           <?php } ?> -->

                 <div class="row">
                    <div class="col-lg-3">
                       <span class="caption-subject bold uppercase">Price</span>
                      <div class="field_w_search">
                       <input type="number" class="form-control" id="price" placeholder="Enter price" name="price" value="<?php if(isset($packge_edit['price']) && !empty($packge_edit['price'])){ echo $packge_edit['price']; } ?>">
                      </div>
                    </div> 
                    <div class="col-lg-3">
                       <span class="caption-subject bold uppercase">Min Quantity</span>
                      <div class="field_w_search">
                       <input type="number" class="form-control" id="min_qty" placeholder="Enter minmum quantity" name="min_qty" value="<?php if(isset($packge_edit['min_qty']) && !empty($packge_edit['min_qty'])){ echo $packge_edit['min_qty']; } ?>">
                      </div>
                    </div>
                     <div class="col-lg-3">
                       <span class="caption-subject bold uppercase">Price Per Addl Quantity</span>
                      <div class="field_w_search">
                       <input type="number" class="form-control" id="add_qty_price" placeholder=" Price per additional quantity" name="add_qty_price" value="<?php if(isset($packge_edit['price_addl_qty']) && !empty($packge_edit['price_addl_qty'])){ echo $packge_edit['price_addl_qty']; } ?>">
                      </div>
                    </div>
                    <div class="col-lg-3">
                       <span class="caption-subject bold uppercase">Discount(%)</span>
                      <div class="field_w_search">
                        <input type="number" class="form-control" id="discount" placeholder="Enter Discount" name="discount" value="<?php if(isset($packge_edit['discount']) && !empty($packge_edit['discount'])){ echo $packge_edit['discount']; } ?>">
                      </div>
                    </div>                  
                </div><br><br>

          <div class="form-group">
                 <span class="caption-subject bold uppercase">Service</span>
                <div class="input-group">
                    <select name="service" class="form-control" id="service">
                       <?php  if (isset($list_service_edit) && !empty($list_service_edit)) { ?>
                       <?php foreach ($list_service_edit as $service) { ?>
                          <option value="<?php echo $service['service_id'];?>" <?php if($packge_edit['service_id'] == $service['service_id']){ echo 'selected'; }  ?> ><?php echo $service['name'];?>
                          </option>
                        <?php } } ?>  
                      </select>
                   <span class="input-group-addon">     
                   </span>
                </div>
          </div><br>
      
               
                <?php 
                 $events_ids = [];
                if (isset($packge_edit_event) && !empty($packge_edit_event)) 
                {
                   foreach ($packge_edit_event as $event) 
                   { 
                      $event_id[] = $event['event_id'];
                   } 

                   $events_ids = $event_id; 
                } 
                ?> 

              <div class="form-group">
              <span class="caption-subject bold uppercase">Events</span>
              <div class="mt-checkbox-inline">
                <?php if (isset($list_event) && !empty($list_event)) { ?>
                <?php foreach ($list_event as $event) { ?>
                <?php if(!empty($event['event_name'])) { ?>

                <label class="mt-checkbox">
                <input type="checkbox" class="events" id="inlineCheckbox1" value="<?php echo $event['event_id'];?>" name="events[]"  <?php if(in_array($event['event_id'], $events_ids)){ echo 'checked';  } ?>> 
                <?php  echo $event['event_name']; ?>
                <span></span>
                </label>

                <?php } ?> 
                <?php } } ?>  
              </div>
              </div> 

           <span class="caption-subject bold uppercase">Price Per City Wise</span>
           <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover table-checkable order-column " id="sample_1">
              <thead>
                <tr>
                  <th>City</th>
                  <th>Price</th>
                  <th>Discount</th>
                </tr>
              </thead>
              <tbody>
               
               <?php 
                if (isset($location_price) && !empty($location_price)) 
                {
                   foreach ($location_price as $price) 
                   { 
                      $price_name[$price['location_id']] = $price['price'];
                      $discount[$price['location_id']] = $price['discount'];   
                   } 
                } 
                ?>  

              <tr class="odd gradeX" >
                <td><lable>All</lable></td>
                <td><input type="number" name="price-all"   value="<?php if(isset($packge_edit['price']) && !empty($packge_edit['price'])){ echo $packge_edit['price']; }else { echo '0'; } ?>" disabled></td>
                <td><input type="number" name="discount-all"  value="<?php if(isset($packge_edit['discount']) && !empty($packge_edit['discount'])){ echo $packge_edit['discount']; }else { echo '0'; } ?>" disabled></td>
              </tr>
              <?php if (isset($all_locations) && !empty($all_locations)){?>
              <?php foreach ($all_locations as $location) { ?>

              <tr  class="odd gradeX">
                  <td><input type="hidden"  id="all_locations" name="location[]" value="<?php echo $location['location_id']; ?>"><?php echo $location['location']; ?></td>
                  <td><input type="number"  name="price_location[]"  value="<?php if (isset($price_name[$location['location_id']])){ echo $price_name[$location['location_id']]; }?>"></td>
                  <td><input type="number"  name="discount_location[]" value="<?php if (isset($discount[$location['location_id']])){ echo $discount[$location['location_id']]; }?>"></td>
              </tr>

              <?php } } ?>
             
              </tbody>
            </table>
           </div>
          </div> 

       <div class="row">
          <div class="col-lg-12">
            <span class="caption-subject bold uppercase">Description</span>
            <div class="field_w_search">
              <textarea name="package_desc" id="package_desc"><?php if(isset($packge_edit['description']) && !empty($packge_edit['description'])){ echo $packge_edit['description']; }  ?> </textarea>
            </div>
          </div>                   
       </div><br><br> 

        <div class="row">       
        <div class="form-group col-sm-12">
         
          <span align="center">
           
            <?php if (isset($packge_edit_img['0']['image']) && !empty($packge_edit_img['0']['image'])){?>
            <?php foreach ($packge_edit_img as $packge) { ?>
            
              <label id="img_id_<?php echo $packge['pack_img_id']; ?>">
              <img src="<?php echo base_url('uploads/packages/'.$packge['image']); ?>" height="100" width="100" ><a style="color:red;"  onclick="deleteimage('<?php echo $packge['pack_img_id']; ?>')">X</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
             </label>
            <?php } } ?>  
           <input type="file" id="package_image" name="package_image[]" class="form-control" multiple="multiple">
        
          </span>
         </div>
        </div>

      </div>
      <div class="form-actions">
        <button type="submit" class="btn sbold green" name="update_package"  id="update_package" value="update_package">Update
        </button> 
         <a   id="package_update" class="btn sbold red" class="btn default">Reset</a> 
      </div>
       <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
  </form>
</div>
</div>
</div>
</div>
<!-- END PAGE BASE CONTENT -->
</div>
<!-- END CONTENT BODY -->
</div>
