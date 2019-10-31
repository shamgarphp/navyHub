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
               <span class="caption-subject bold uppercase">MPP PARAMETERS</span>
            </div>
            <div>
                 <a class="pull-right btn btn-warning btn-large" style="margin-right:40px" href="<?php echo site_url('navy/Navy/mppExcel'); ?>"><i class="fa fa-file-excel-o"></i> Export to Excel</a>
            </div>
          </div>
          <div class="portlet-body">
            <input id="myInput" type="text" placeholder="Search.." style="width: 555px;"><br><br>
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
                  <th>Date&Time</th>
                  <th>Power</th>
                  <th>Pressure kg/cm2</th>
                  <th>Temperature(c)</th>
                  <th>Volume Compansator</th>
                  <th>Feed Water</th>
                  <th>Sustain time/hrs</th>
                  <th>Water Feed in Core</th>
                  <th>Water Level(NHS)</th>
                  <th>Pressure in cmptmnt</th>
                  <th>Camp in Cmptmt</th>
                  <th>Cooling Means</th>
                  <th>Actions</th>
                 
                  
                  
                </tr>
              </thead>
              <tbody>
                <?php if(isset($customers_list) && !empty($customers_list)){?>
                <?php $i = 1; foreach($customers_list as $customer){?>
                <tr class="odd gradeX" >
                <!--  
                  <td style="display: none">
                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                      <input type="checkbox" class="checkboxes" value="1" />
                      <span>
                      </span>
                    </label>
                  </td> -->

                  <td> <?php echo $i++; ?> </td>
                  <td><?php if(!empty($customer['dtntm'])) { echo ucfirst($customer['dtntm']); } else { echo '---'; }?></td>
                  <td><?php if(!empty($customer['power']) && !empty($customer['power'])) { echo $customer['power']; } else { echo '---'; }?></td>
                  <td><?php if(!empty($customer['pressurekgcm'])) { echo ucfirst($customer['pressurekgcm']); } else { echo '---'; }?></td>
                  <td><?php if(!empty($customer['temparaturec'])) { echo ucfirst($customer['temparaturec']); } else { echo '---'; }?></td>
                  <td><?php if(!empty($customer['volumec'])) { echo $customer['volumec']; } else { echo '---'; }?></td>
                  <td><?php if(!empty($customer['feedwaterav'])) { echo $customer['feedwaterav']; } else { echo '---'; }?></td>
                  <td><?php if(!empty($customer['s_time'])) { echo $customer['s_time']; } else { echo '---'; }?></td>
                  <td><?php if(!empty($customer['waterfeedinc'])) { echo $customer['waterfeedinc']; } else { echo '---'; }?></td>
                  <td><?php if(!empty($customer['waterlevelinnhs'])) { echo $customer['waterlevelinnhs']; } else { echo '---'; }?></td>
                   <td><?php if(!empty($customer['pressureinc'])) { echo $customer['pressureinc']; } else { echo '---'; }?></td>
                  <td><?php if(!empty($customer['tempinc'])) { echo $customer['tempinc']; } else { echo '---'; }?></td>
                  <td><?php if(!empty($customer['cmeans'])) { echo $customer['cmeans']; } else { echo '---'; }?></td> 
                 
                
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Actions
                        <i class="fa fa-angle-down">
                        </i>
                      </button>
                      <ul class="dropdown-menu pull-left" role="menu">
                       <!--  <li>
                          <a href="<?php //echo base_url('CustomerView?id='.base64_encode($customer['id']));?>">
                            <i class="icon-docs">
                            </i> View 
                          </a>
                        </li> -->
                        
                        <li>
                          <a href="<?php echo base_url('navy/Navy/delete_navy?idpackage='.$customer['id']);?>" onclick="return confirm('Are You Sure');">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>Delete 
                          </a>
                        </li>
                       
                                               
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
