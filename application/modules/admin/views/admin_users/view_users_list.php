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
              <i class="icon-settings font-dark">
              </i>
              <span class="caption-subject bold uppercase">Admin Users
              </span>
            </div>
            <div class="actions">
              <div class="btn-group">
                <a href="<?php echo base_url('admin_add'); ?>" class="btn sbold green" role="button">Add User
                  <i class="fa fa-plus">
                  </i>
                </a>
              </div>
            </div>
          </div>
          <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
              <thead>
                <tr>
                  <th>
                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                      <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                      <span>
                      </span>
                    </label>
                  </th>
                  <th>S.no</th>
                  <th>UserName</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Phone</th>                 
                  <th>Role</th>
                  <th>Actions</th>
                  <!--  <th> Status </th>  -->
                </tr>
              </thead>
              <tbody>
                <?php if(isset($view_users_list['resultSet']) && count($view_users_list['resultSet'])>0 && !empty($view_users_list['resultSet'])){?>
                <?php $i = 1; foreach($view_users_list['resultSet'] as $view_user_list){?>
                <tr class="odd gradeX" >
                  <td>
                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                      <input type="checkbox" class="checkboxes" value="1" />
                      <span>
                      </span>
                    </label>
                  </td>
                  <td> <?php echo $i++; ?> </td>
                  <td><?php echo ucfirst($view_user_list['username']);?></td>
                  <td> <?php echo ucfirst($view_user_list['email']); ?></td>  
                  <td><?php echo ucfirst($view_user_list['gender']); ?></td>                                        
                  <td><?php echo ucfirst($view_user_list['phone']); ?></td>
                  <td><?php echo ucfirst($view_user_list['name']); ?></td> 
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Actions
                        <i class="fa fa-angle-down">
                        </i>
                      </button>
                      <ul class="dropdown-menu pull-left" role="menu">
                        <li>
                          <a href="<?php echo base_url('admin/adminusers/view?view_user_id='.base64_encode($view_user_list['admin_id']));?>">
                            <i class="icon-docs">
                            </i> View 
                          </a>
                        </li>
                        <li>
                          <a href="<?php echo base_url('admin/adminusers/edit?edit_user_id='.base64_encode($view_user_list['admin_id']));?>">
                            <i class="icon-tag">
                            </i> Edit 
                          </a>
                        </li>
                        <li>
                          <a href="<?php echo base_url('admin/adminusers/delete?delete_user_id='.base64_encode($view_user_list['admin_id']));?>" onclick="return confirm('Are You Sure');">
                            <i class="icon-user">
                            </i>Delete 
                          </a>
                        </li>
                      </ul>
                    </div>
                  </td>                            
                </tr> 
                <?php }  }else{ ?>                                
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
