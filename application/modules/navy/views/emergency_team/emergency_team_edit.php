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
          <span class="caption-subject bold uppercase">Emergency Team Update
          </span>
        </div>
      </div>
      <div class="portlet-body form">
        <form  action="" method="POST" enctype="multipart/form-data" id="package_update_form">
        <div class="row">

           <div class="form-group col-sm-12">
            <span class="caption-subject bold uppercase">Date And Time</span>
            <div class="input-group">
              <input type="text" class="form-control" id="dtandtm" placeholder="Location" name="dtandtm" value="<?php if(isset($emergencyTeamEdit['dtandtm']) && !empty($emergencyTeamEdit['dtandtm'])){ echo $emergencyTeamEdit['dtandtm']; } ?>">
              <span class="input-group-addon">
              </span>
            </div>
          </div>
 
          <div class="form-group col-sm-12">
            <span class="caption-subject bold uppercase">Name</span>
            <div class="input-group">
              <input type="text" class="form-control" id="name" placeholder="Compartment" name="name" value="<?php if(isset($emergencyTeamEdit['name']) && !empty($emergencyTeamEdit['name'])){ echo $emergencyTeamEdit['name']; } ?>">
              <span class="input-group-addon">
              </span>
            </div>
          </div>
          <div class="form-group col-sm-12">
            <span class="caption-subject bold uppercase">Phn No</span>
            <div class="input-group">
              <input type="text" class="form-control" id="phone_no" placeholder="phone_no" name="phone_no" value="<?php if(isset($emergencyTeamEdit['phone_no']) && !empty($emergencyTeamEdit['phone_no'])){ echo $emergencyTeamEdit['phone_no']; } ?>">
              <span class="input-group-addon">
              </span>
            </div>
          </div>
          <div class="form-group col-sm-12">
            <span class="caption-subject bold uppercase">Dose History</span>
            <div class="input-group">
              <input type="text" class="form-control" id="dose_history" placeholder="dose_history" name="dose_history" value="<?php if(isset($emergencyTeamEdit['dose_history']) && !empty($emergencyTeamEdit['dose_history'])){ echo $emergencyTeamEdit['dose_history']; } ?>">
              <span class="input-group-addon">
              </span>
            </div>
          </div>
        </div>
        <br> 

          </div> 

      

    

      </div>
      <div class="form-actions">
        <button type="submit" class="btn sbold green" name="emergencyTeamEdit"  id="emergencyTeamEdit" value="emergencyTeamEdit">Update
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
