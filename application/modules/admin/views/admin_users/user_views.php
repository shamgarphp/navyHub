<!-- BEGIN PAGE LEVEL PLUGINS -->
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
              <i class="icon-settings font-dark">
              </i>
              <span class="caption-subject bold uppercase">Admin User View 
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
                <?php if (isset($view_user_view) &&  count($view_user_view) > 0  && !empty($view_user_view)) { ?>
                <?php foreach ($view_user_view as $view_users_view) { ?>
                <tr class="odd gradeX" >
                  <div class="form-group">
                    <div class="form-group">
                      <span class="caption-subject bold uppercase">ID : 
                      </span>
                      <p class="form-control-static">
                      <p class="form-control-static">
                        <?php echo ucfirst($view_users_view['admin_id']); ?>
                      </p>
                    </div>
                    <span class="caption-subject bold uppercase">Username :
                    </span>
                    <p class="form-control-static">
                      <?php echo ucfirst($view_users_view['username']); ?>
                    </p>
                    <div class="form-group">
                      <span class="caption-subject bold uppercase">Email :
                      </span>
                      <p class="form-control-static">
                        <?php echo ucfirst($view_users_view['email']); ?>
                      </p>
                    </div>
                    <div class="form-group">
                      <span class="caption-subject bold uppercase">Firstname :
                      </span>
                      <p class="form-control-static">
                        <?php echo ucfirst($view_users_view['first_name']);?>
                      </p>
                    </div>
                    <div class="form-group">
                      <span class="caption-subject bold uppercase">Lastname :
                      </span>
                      <p class="form-control-static">
                        <?php echo ucfirst($view_users_view['last_name']);?>
                      </p>
                    </div>
                    <div class="form-group">
                      <span class="caption-subject bold uppercase">Phone :
                      </span>
                      <p class="form-control-static">
                        <?php echo $view_users_view['phone'];?>
                      </p>
                    </div>
                    <div class="form-group">
                      <span class="caption-subject bold uppercase">Gender :
                      </span>
                      <p class="form-control-static">
                        <?php echo ucfirst($view_users_view['gender']); ?>
                      </p>
                    </div>
                    <div class="form-group">
                      <span class="caption-subject bold uppercase">Address:
                      </span>
                      <p class="form-control-static">
                        <?php echo ucfirst($view_users_view['address']); ?>
                      </p>
                    </div>
                    <div class="form-group">
                      <span class="caption-subject bold uppercase">Role Id:
                      </span>
                      <p class="form-control-static">
                        <?php echo ucfirst($view_users_view['name']); ?>
                      </p>
                    </div>
                    <div class="form-group">
                      <span class="caption-subject bold uppercase">Image
                      </span>
                      <br>
                      <p class="form-control-static">
                        <img src="<?php echo base_url('uploads/admin_users/'.$view_users_view['image']);?>" height="100" width="100">
                      </p>
                    </div>
                  </div>
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
