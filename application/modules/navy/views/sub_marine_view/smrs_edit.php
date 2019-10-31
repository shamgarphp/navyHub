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
          <span class="caption-subject bold uppercase">Submarine Update
          </span>
        </div>
      </div>
      <div class="portlet-body form">
        <form  action="" method="POST" enctype="multipart/form-data" id="package_update_form">
        <div class="row">
          <div class="form-group col-sm-12">
            <span class="caption-subject bold uppercase">Date and Time</span>
            <div class="input-group">
              <input type="Date" class="form-control" id="dtntm" placeholder="Date & Time" name="dtntm" value="<?php if(isset($smrsEdit['dtntm']) && !empty($smrsEdit['dtntm'])){ echo $smrsEdit['dtntm']; } ?>">
              <span class="input-group-addon">
              </span>
            </div>
          </div>
          <div class="form-group col-sm-12">
            <span class="caption-subject bold uppercase">Compartment</span>
            <div class="input-group">
              <input type="text" class="form-control" id="compartment" placeholder="Compartment" name="compartment" value="<?php if(isset($smrsEdit['compartment']) && !empty($smrsEdit['compartment'])){ echo $smrsEdit['compartment']; } ?>">
              <span class="input-group-addon">
              </span>
            </div>
          </div>
          <div class="form-group col-sm-12">
            <span class="caption-subject bold uppercase">RGMS Channel</span>
            <div class="input-group">
              <input type="text" class="form-control" id="rgms_channel" placeholder="RGMS channel" name="rgms_channel" value="<?php if(isset($smrsEdit['rgms_channel']) && !empty($smrsEdit['rgms_channel'])){ echo $smrsEdit['rgms_channel']; } ?>">
              <span class="input-group-addon">
              </span>
            </div>
          </div>
          <div class="form-group col-sm-12">
            <span class="caption-subject bold uppercase">Radiation Level</span>
            <div class="input-group">
              <input type="text" class="form-control" id="radiation_level" placeholder="Radiation Level" name="radiation_level" value="<?php if(isset($smrsEdit['radiation_level']) && !empty($smrsEdit['radiation_level'])){ echo $smrsEdit['radiation_level']; } ?>">
              <span class="input-group-addon">
              </span>
            </div>
          </div>
          <div class="form-group col-sm-12">
            <span class="caption-subject bold uppercase"> RADSIT </span>
            <div class="input-group">
              <input type="text" class="form-control" id="radsit" placeholder="RADSIT " name="radsit" value="<?php if(isset($smrsEdit['radsit']) && !empty($smrsEdit['radsit'])){ echo $smrsEdit['radsit']; } ?>">
              <span class="input-group-addon">
              </span>
            </div>
          </div>
        </div>
        <br> 

          </div> 

      

    

      </div>
      <div class="form-actions">
        <button type="submit" class="btn sbold green" name="update_smrs"  id="update_smrs" value="update_smrs">Update
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
