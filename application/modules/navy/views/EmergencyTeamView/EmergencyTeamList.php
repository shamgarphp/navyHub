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
              <i class="fa fa-users"></i>
               <span class="caption-subject bold uppercase">Emergency Team</span>
            </div>
            
          </div>
           <a class="pull-right btn btn-warning btn-large" style="margin-right:40px" href="<?php echo site_url('navy/EmergencyTeam/genarateExcel'); ?>"><i class="fa fa-file-excel-o"></i> Export to Excel</a>
             <a href="<?php echo base_url('addEmergencyTeam'); ?>" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air"
              ><i class="fas fa-plus"></i>Add Emergency Team</a>
          <div class="portlet-body">
            <!-- <input id="myInput" type="text" placeholder="Search.." style="width: 555px;"><br><br> -->
            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
              <thead>
                <tr>

                  <th style="display: none">
                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                      <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                      <span>
                      </span>
                    </label>
                  </th>
                  <th>S.no</th>
                  <th>ET-Id</th>
                  <th>ET-Name</th>
                  <th>Date of Creation</th>
                  <th>Date of Updation</th>
                  <th>Strength</th>
                  <th>Actions</th>
                  
  
                </tr>
              </thead>
              <tbody>
                <?php if(isset($emergencyObj) && !empty($emergencyObj)){?>
                <?php $i = 1; foreach($emergencyObj as $emergency){?>
                <tr class="odd gradeX" >
                 
                  <td style="display: none">
                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                      <input type="checkbox" class="checkboxes" value="1" />
                      <span>
                      </span>
                    </label>
                  </td>
                  
                  <td> <?php echo $i++; ?> </td>
                  <td><?php if(!empty($emergency['et_id'])) { echo ucfirst($emergency['et_id']); } else { echo '---'; }?></td>
                   <td><?php if(!empty($emergency['et_name'])) { echo $emergency['et_name']; } else { echo '---'; }?></td>
                  <td><?php if(!empty($emergency['date_of_creation']) && !empty($emergency['date_of_creation'])) { echo $emergency['date_of_creation']; } else { echo '---'; }?></td>
                  <td><?php if(!empty($emergency['date_of_updation']) && !empty($emergency['date_of_updation'])) { echo $emergency['date_of_updation']; } else { echo '---'; }?></td>
                  <td><?php if(!empty($emergency['strength']) && !empty($emergency['strength'])) { echo $emergency['strength']; } else { echo '---'; }?></td>
                 
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Actions
                        <i class="fa fa-angle-down">
                        </i>
                      </button>
                      <ul class="dropdown-menu pull-left" role="menu">
                      <li>
                          <a href="<?php echo base_url('navy/EmergencyTeam/editEmergencyTeam?emtId='.$emergency['id']);?>">
                            <i class="icon-tag">
                            </i> Edit 
                          </a>
                        </li>
                        
                    <li>
                          <a href="<?php echo base_url('navy/EmergencyTeam/deleteEmergencyTeam?emtId='.$emergency['id']);?>" onclick="return confirm('Are You Sure');">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>Delete 
                          </a>
                        </li> 

                <!--         <li>
                          <a href="<?php// echo base_url('navy/EmergencyTeam/addMember?emtId='.$emergency['id']);?>">
                            <i class="icon-tag" aria-hidden="true"></i>Add Member 
                          </a>
                        </li>

                        <li>
                          <a href="<?php //echo base_url('navy/EmergencyTeam/deleteEmergencyTeam?emtId='.$emergency['id']);?>">
                            <i class="icon-tag" aria-hidden="true"></i>View Member 
                          </a>
                        </li> -->
                       
                                               
                </tr> 
                <?php }  } else { ?>                                
                <tr class="odd gradeX">
                  <h3 class="no_data" align="center">DATA NOT AVAILABLE
                  </h3>                                     
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
<script type="text/javascript">
  $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();

            $("#sample_1 tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
            
        });
</script>
