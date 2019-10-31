<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?php echo admin_asset_url(); ?>global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo admin_asset_url(); ?>global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
  <!-- BEGIN CONTENT BODY -->
  <div class="page-content">
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
      <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
          <div class="portlet-title">
            <div class="caption font-dark">
             <i class="fa fa-list" aria-hidden="true"></i>
               <span class="caption-subject bold uppercase">PRODUCT LIST
              </span>
            </div>
           <div class="actions">
              <div class="btn-group">
                <a href="<?php echo base_url('add_package'); ?>" class="btn sbold green" role="button">Add Product
                  <i class="fa fa-plus"></i>
                </a>
              </div>
            </div>  
          </div>
          <div class="portlet-body">
            <form action="<?php echo base_url('RelatedProduct'); ?>" method="POST">
            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
              <thead>
                <tr>
                  <th >
                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                      <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                      <span>
                      </span>
                    </label>
                  </th>
                  <th>S.no</th>
                  <th>Product</th>
                  <th>Service</th>
                  <th>Service Category</th>
                  <th>Events</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php if(isset($package_list) && !empty($package_list)){?>
                <?php $i = 1; foreach($package_list as $package){?>
                <tr class="odd gradeX" >
                 
                  <td>
                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                      <input type="checkbox" class="checkboxes" value="<?php echo $package['package_id']; ?>" name="realated_product[]"/ <?php if(isset($package['realated_product']) && !empty($package['realated_product']) && $package['realated_product'] == 1){ echo "checked"; } ?>>
                      <span>
                      </span>
                    </label>
                  </td>

                  <td> <?php echo $i++; ?> </td>
                  <td><?php if(!empty($package['package_name'])) { echo ucfirst($package['package_name']); } else { echo '---'; }?></td>
                  <td><?php if(!empty($package['service_name'])) { echo ucfirst($package['service_name']); } else { echo '---'; }?></td>
                  <td><?php if(!empty($package['service_cat_name'])) { echo ucfirst($package['service_cat_name']); } else { echo '---'; }?></td>
                  <td><?php if(!empty($package['service_cat_name'])) { echo ucfirst($package['service_cat_name']); } else { echo '---'; }?></td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Actions
                        <i class="fa fa-angle-down">
                        </i>
                      </button>
                      <ul class="dropdown-menu pull-left" role="menu">
                        <li>
                          <a href="<?php echo base_url('package_view?idpackage='.base64_encode($package['package_id']));?>">
                            <i class="icon-docs">
                            </i> View 
                          </a>
                        </li>
                        <li>
                          <a href="<?php echo base_url('package_edit?idpackage='.base64_encode($package['package_id']));?>">
                            <i class="icon-tag">
                            </i> Edit 
                          </a>
                        </li>
                        <li>
                          <a href="<?php echo base_url('packages/packages/delete_package?idpackage='.base64_encode($package['package_id']));?>" onclick="return confirm('Are You Sure');">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>Delete 
                          </a>
                        </li>
                        <li>
                          <a href="<?php echo base_url('menu?idpackage='.base64_encode($package['package_id']));?>">
                            <i class="fa fa-plus"></i> Add Menu 
                          </a>
                        </li>
                      </ul>
                    </div>
                  </td>                            
                </tr> 
                <?php }  } else { ?>                                
                <tr class="odd gradeX">
                  <h3 class="no_data" align="center">DATA NOT AVAILABLE
                  </h3>                                     
                </tr>
                <?php } ?>          
              </tbody>
            </table>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
            <input type="submit" name="Related_products" class="btn sbold green" value="Add Related Products">
          </form>
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
