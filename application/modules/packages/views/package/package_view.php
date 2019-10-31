<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
  <!-- BEGIN CONTENT BODY -->
  <div class="page-content">
    <div class="row">
      <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
          <div class="portlet-title">
            <div class="caption font-dark">
              <i class="fa fa-list" aria-hidden="true"></i>
              <span class="caption-subject bold uppercase">Product view 
              </span>
            </div>
            <div class="actions">
            </div>
          </div>
          <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="">
              <thead>
                <tr>
                </tr>
              </thead>
              <tbody>
                <?php if (isset($package_view) && !empty($package_view)) { ?> 
                <tr class="odd gradeX" >
                  <div class="form-group">
                    <div class="form-group">
                      <span class="caption-subject bold uppercase">Product : 
                      </span>
                      <p class="form-control-static">
                        <?php if(!empty($package_view['0']['name'])) { echo ucfirst($package_view['0']['name']); } else { echo 'data not available'; } ?>
                      </p>
                    </div>
<!-- 
                    <?php if(!empty($package_view['0']['catring_type'])) { ?>
                    <div class="form-group">
                      <span class="caption-subject bold uppercase">Price : 
                      </span>
                      <p class="form-control-static">
                        <?php if($package_view['0']['catring_type'] == 1){ echo "Veg";} else { echo "Non-Veg"; }    ?>
                      </p>
                    </div>

                    <?php } ?> -->

                     <div class="form-group">
                      <span class="caption-subject bold uppercase">Price : 
                      </span>
                      <p class="form-control-static">
                        <?php if(!empty($package_view['0']['price'])) { echo '₹'.ucfirst($package_view['0']['price']); } else { echo 'data not available'; } ?>
                      </p>
                    </div>

                    <div class="form-group">
                      <span class="caption-subject bold uppercase">Min Quantity : 
                      </span>
                      <p class="form-control-static">
                        <?php if(!empty($package_view['0']['min_qty'])) { echo ucfirst($package_view['0']['min_qty']); } else { echo 'data not available'; } ?>
                      </p>
                    </div>

                    <div class="form-group">
                      <span class="caption-subject bold uppercase">Price For Additional Quantity:</span>
                      <p class="form-control-static">
                        <?php if(!empty($package_view['0']['price_addl_qty'])) { echo ucfirst($package_view['0']['price_addl_qty']); } else { echo 'data not available'; } ?>
                      </p>
                    </div>

                     <div class="form-group">
                      <span class="caption-subject bold uppercase">Discount:</span>
                      <p class="form-control-static">
                        <?php if(!empty($package_view['0']['discount'])) { echo ucfirst($package_view['0']['discount']); } else { echo 'data not available'; } ?>
                      </p>
                    </div>
            
                      <div class="form-group">
                      <span class="caption-subject bold uppercase">Description: 
                      </span>
                      <p class="form-control-static">
                        <?php if(!empty($package_view['0']['description'])) { echo ucfirst($package_view['0']['description']); } else { echo 'data not available'; } ?>
                      </p>
                    </div><br>

                    <div class="form-group">
                      <span class="caption-subject bold uppercase">IMAGE :
                      </span>
                      <br>
                      <p class="form-control-static">
       
                      <?php  if(isset($package_view['0']['image']) && !empty($package_view['0']['image'])) { ?> 
                      <?php foreach ($package_view as $package) { ?>
                      
                      <label class="form-group">&emsp;&ensp;
                      <img src="<?php echo base_url('uploads/packages/'.$package['image']); ?>" height="100" width="100">
                      </label>
                      <?php } } else { ?>
                      <tr class="odd gradeX">
                      <td>Data Not available</td>                                     
                      </tr>
                      <?php } ?>  
                      </p>
                    </div>
                  </div>
                </tr> 
                <?php } else { ?>                                
                <tr class="odd gradeX">
                  <td>Data Not available
                  </td>                                     
                </tr>
                <?php } ?>  
              </tbody>
            </table>
          </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
      </div>
    </div>
    <!-- END PAGE BASE CONTENT -->
  </div>
  <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
