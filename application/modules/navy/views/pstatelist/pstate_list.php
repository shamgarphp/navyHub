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
               <span class="caption-subject bold uppercase">Personnel Lists</span>
            </div>
            <div>
              <a class="pull-right btn btn-warning btn-large" style="margin-right:40px" href="<?php echo site_url('navy/SubMarine/psatateExcel'); ?>"><i class="fa fa-file-excel-o"></i> Export to Excel</a>
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
                  <th>Area</th>
                  
                  <th>Location</th>
                  <th>U-Name</th>
                  <th>Number of Personnel</th>
                  <th>Actions</th>
  
                </tr>
              </thead>
              <tbody>
                <?php if(isset($PstateLists) && !empty($PstateLists)){?>
                <?php $i = 1; foreach($PstateLists as $PstateList){?>
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
                  <td><?php if(!empty($PstateList['dtntm'])) { echo ucfirst($PstateList['dtntm']); } else { echo '---'; }?></td>
                   <td><?php if(!empty($PstateList['area'])) { echo $PstateList['area']; } else { echo '---'; }?></td>
                  
                  <td><?php if(!empty($PstateList['location'])) { echo ucfirst($PstateList['location']); } else { echo '---'; }?></td>
                  <td><?php if(!empty($PstateList['uname']) && !empty($PstateList['uname'])) { echo $PstateList['uname']; } else { echo '---'; }?></td>
                  <td><?php if(!empty($PstateList['num_p'])) { echo ucfirst($PstateList['num_p']); } else { echo '---'; }?></td>
                 
        
                
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Actions
                        <i class="fa fa-angle-down">
                        </i>
                      </button>
                      <ul class="dropdown-menu pull-left" role="menu">
                       <li>
                          <a href="<?php echo base_url('PstateListView?id='.base64_encode($PstateList['pid']));?>">
                            <i class="icon-docs">
                            </i> View 
                          </a>
                        </li> 
                        
                   <li>
                          <a href="<?php echo base_url('navy/SubMarine/delete_pstate?idpackage='.$PstateList['pid']);?>" onclick="return confirm('Are You Sure');">
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
