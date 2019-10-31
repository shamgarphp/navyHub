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
               <span class="caption-subject bold uppercase">Check off State</span>
            </div>
             <div class="btn-group" style="float: right;">
               <a class="pull-right btn btn-warning btn-large" style="margin-right:40px" href="<?php echo site_url(); ?>/navy/submarine/checkOffExcel"><i class="fa fa-file-excel-o"></i> Export to Excel</a>
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
                  <th>Name</th>
                  <th>Information</th>
                  <th>Location</th>
                  <th>Latitude</th>
                  <th>Longitude</th>
                  <th>Actions</th>

                </tr>
              </thead>
              <tbody>
                <?php if(isset($Checklist1) && !empty($Checklist1)){?>
                <?php $i = 1; foreach($Checklist1 as $cl){?>
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
                  <td><?php if(!empty($cl['dtntm'])) { echo ucfirst($cl['dtntm']); } else { echo '---'; }?></td>
                  <td><?php if(!empty($cl['cl_name']) && !empty($cl['cl_name'])) { echo $cl['cl_name']; } else { echo '---'; }?></td>
                  <td><?php if(!empty($cl['cl_info'])) { echo ucfirst($cl['cl_info']); } else { echo '---'; }?></td>
                  <td><?php if(!empty($cl['cl_location'])) { echo ucfirst($cl['cl_location']); } else { echo '---'; }?></td>
                  <td><?php if(!empty($cl['cl_lat'])) { echo $cl['cl_lat']; } else { echo '---'; }?></td>
                  <td><?php if(!empty($cl['cl_long'])) { echo $cl['cl_long']; } else { echo '---'; }?></td>
                  

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
                          <a href="<?php echo base_url('navy/SubMarine/delete_cl?idpackage='.$cl['cid']);?>" onclick="return confirm('Are You Sure!');">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>Delete 
                          </a>
                        </li>
                         <li>
                          <a href="<?php echo base_url('clEdits?clId='.base64_encode($cl['cid']));?>">
                            <i class="icon-tag">
                            </i> Edit 
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
