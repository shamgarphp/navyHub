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

          <span class="caption-subject bold uppercase">Add Emergency Team
          </span>
        </div>
      </div>
      <div class="portlet-body form">
         <form class="m-form m-form--fit m-form--label-align-right" name="insert_form" id="insert_form" method="POST" action="<?php echo base_url('saveEmergencyTeam'); ?>">
        <div class="row">
          <div class="form-group col-sm-5">
            <label for="username">ET-ID
            </label>
           
              <input type="text" class="form-control m-input m-input--air"  name="et_id"  id="et_id"  placeholder="ET-ID">
           
          </div>
            <div class="form-group col-sm-5">
            <label for="username">ET-Name
            </label>
              <input type="text" class="form-control m-input m-input--air"  name="et_name"  id="et_name"  placeholder="ET-Name">
          </div>
            <div class="form-group col-sm-5">
            <label for="username">Date of Creation
            </label>
              <input type="date" class="form-control m-input m-input--air"  name="date_of_creation"  id="date_of_creation"  placeholder="Date of Creation">
          </div>
           <div class="form-group col-sm-5">
            <label for="username">Date of Updation
            </label>
           
              <input type="date" class="form-control m-input m-input--air"  name="date_of_updation"  id="date_of_updation"  placeholder="Date of Updation">
           
          </div>
           <div class="form-group col-sm-5">
            <label for="username">Strength
            </label>
            
              <input type="text" class="form-control m-input m-input--air"  name="strength"  id="strength"  placeholder="Strength">
           
          </div>
        </div>
      </div>
       <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
      <div class="form-actions">
        <button type="submit" class="btn btn-accent" name="add_emergencyTeam" id="add_emergencyTeam" value="add_emergencyTeam">Add</button>
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
