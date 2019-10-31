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
          <span class="caption-subject bold uppercase">Threshold Update
          </span>
        </div>
      </div>
      <div class="portlet-body form">
        <form  action="" method="POST" enctype="multipart/form-data" id="package_update_form">
        <div class="row">
 
          <div class="form-group col-sm-12">
            <span class="caption-subject bold uppercase">Compartment</span>
            <div class="input-group">
              <input type="text" class="form-control" id="compartment" placeholder="Compartment" name="compartment" value="<?php if(isset($thresholdEdit['compartment']) && !empty($thresholdEdit['compartment'])){ echo $thresholdEdit['compartment']; } ?>">
              <span class="input-group-addon">
              </span>
            </div>
          </div>
          <div class="form-group col-sm-12">
            <span class="caption-subject bold uppercase">Power</span>
            <div class="input-group">
              <input type="text" class="form-control" id="power" placeholder="Power" name="power" value="<?php if(isset($thresholdEdit['power']) && !empty($thresholdEdit['power'])){ echo $thresholdEdit['power']; } ?>">
              <span class="input-group-addon">
              </span>
            </div>
          </div>
          <div class="form-group col-sm-12">
            <span class="caption-subject bold uppercase">Threshold</span>
            <div class="input-group">
              <input type="text" class="form-control" id="threshold" placeholder="Threshold" name="threshold" value="<?php if(isset($thresholdEdit['threshold']) && !empty($thresholdEdit['threshold'])){ echo $thresholdEdit['threshold']; } ?>">
              <span class="input-group-addon">
              </span>
            </div>
          </div>
        </div>
        <br> 

          </div> 

      

    

      </div>
      <div class="form-actions">
        <button type="submit" class="btn sbold green" name="thresholdEdit"  id="thresholdEdit" value="thresholdEdit">Update
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
