
<div class="page-content-wrapper">
   <div class="page-content">
      <div class="page-head">
      </div>
      <div class="portlet light bordered">
         <div class="portlet-title">
            <div class="caption font-red-sunglo">
               <i class="icon-settings font-red-sunglo"></i>
               <span class="caption-subject bold uppercase">Add AGRMS</span>
            </div>
            <div class="actions">
            </div>
         </div>
         <div class="portlet-body form">
            <form action="<?php echo base_url('saveAGMS'); ?>" method="POST" id="add_event_form">
              <div class="form-group">
                   <span class="caption-subject bold uppercase">Location</span>
                  <div class="input-group">
                     <input type="text" class="form-control" id="location" placeholder="Location" name="location">
                     <span class="input-group-addon">     
                     </span>
                  </div>
              </div>
              <div class="form-group">
                   <span class="caption-subject bold uppercase">Compartment</span>
                  <div class="input-group">
                     <input type="text" class="form-control" id="compartment" placeholder="Compartment" name="compartment">
                     <span class="input-group-addon">     
                     </span>
                  </div>
              </div>
              <div class="form-group">
                   <span class="caption-subject bold uppercase">Area</span>
                  <div class="input-group">
                     <input type="text" class="form-control" id="area" placeholder="Area" name="area">
                     <span class="input-group-addon">     
                     </span>
                  </div>
              </div>
              <div class="form-group">
                   <span class="caption-subject bold uppercase">Rad Type</span>
                  <div class="input-group">
                     <input type="text" class="form-control" id="radType" placeholder="Rad Type" name="radType">
                     <span class="input-group-addon">     
                     </span>
                  </div>
              </div>

               <div class="form-actions">
                  <button type="submit" class="btn blue" name="saveAGMS" id="saveAGMS" value="saveAGMS">Submit</button>
                 <a id="add_event_reset" class="btn sbold red" class="btn default">Reset</a> 
               </div>

               <!-- <input type="hidden" name="<?php //echo $this->security->get_csrf_token_name();?>" value="<?php //echo $this->security->get_csrf_hash();?>"> -->

            </form>
         </div>
      </div>
   </div>
</div>
</div>
</div>