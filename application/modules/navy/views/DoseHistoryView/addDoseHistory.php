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

          <span class="caption-subject bold uppercase">Add Dose History 
          </span>
        </div>
      </div>
      <div class="portlet-body form">
         <form class="m-form m-form--fit m-form--label-align-right" name="insert_form" id="insert_form" method="POST" action="<?php echo base_url('saveDoseHistory'); ?>">
        <div class="row">
          <div class="form-group col-sm-12">
            <label for="username">P-ID
            </label>
            <div class="col-md-5">
              <input type="text" class="form-control m-input m-input--air"  name="p_id"  id="p_id"  placeholder="P-ID">
            </div>
          </div>
          <div class="form-group col-sm-12">
            <label for="username">Name
            </label>
            <div class="col-md-5">
              <input type="text" class="form-control m-input m-input--air"  name="name"  id="name"  placeholder="Name">
            </div>
          </div>
            <div class="form-group col-sm-12">
            <label for="username">Dose History
            </label>
            <div class="col-md-5">
              <input type="text" class="form-control m-input m-input--air"  name="dose_history"  id="dose_history"  placeholder="Dose History">
            </div>
          </div>
            <div class="form-group col-sm-12">
            <label for="username">ET-ID
            </label>
            <div class="col-md-5">
              <input type="text" class="form-control m-input m-input--air"  name="et_id"  id="et_id"  placeholder="ET-ID">
            </div>
          </div>
        </div>
      </div>
       <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
      <div class="form-actions">
        <button type="submit" class="btn btn-accent" name="add_user" id="add_user" value="add_user">Add</button>
        <button type="reset" class="btn btn-secondary reset" id="cancelBtn" style="background-color: lightgray;">Cancel</button>
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
