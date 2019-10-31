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
              <i class="fa fa-user" aria-hidden="true"></i>

          <span class="caption-subject bold uppercase">Profile 
          </span>
        </div>
      </div>
      <div class="portlet-body form">
        <form  action="" method="POST" >
        <div class="row">
          <div class="form-group col-sm-12">
            <label for="username">UserName
            </label>
            <div class="input-group">
              <input type="text" class="form-control" id="username" placeholder="UserName" name="username" value="<?php echo $admins_user_edit['name']; ?>">
              <span class="input-group-addon">
              </span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-sm-12">
            <label>Email Address
            </label>
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-envelope">
                </i>
              </span>
              <input type="text" class="form-control" autocomplete="off" placeholder="Email Address" name="admin_email" id="admin_email"  value="<?php echo $admins_user_edit['email']; ?>"> 
            </div>
          </div>
        </div>
      </div>
       <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
      <div class="form-actions">
        <button type="submit" class="btn sbold green" name="update_user"  id="update_user" value="submit">Update
        </button> 
         <a   id="user_cancel" class="btn sbold red" class="btn default">Reset</a> 
      </div>
  </form>
</div>
</div>
</div>
</div>
<!-- END PAGE BASE CONTENT -->
</div>
<!-- END CONTENT BODY -->
</div>
