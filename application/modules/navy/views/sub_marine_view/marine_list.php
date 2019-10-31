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
               <span class="caption-subject bold uppercase">SUBMERINE</span>
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
                  <th>U-Name</th>
                  <th>Area</th>
                  <th>Location</th>
                  <th>RGMS Channel</th>
                  <th>Rad Type</th>
                  <th>Radiation Level(c)</th>
                  <th>Unit</th>
                  <th>Radsit</th>
                  <!-- <th>Compartment</th>
                  <th>RGMS Channel</th>
                  <th>Radiation Level(c)</th>
                  <th>Radsit</th> -->
                  <th>Actions</th>

                </tr>
              </thead>
               <a class="pull-right btn btn-warning btn-large" style="margin-right:40px" href="<?php echo site_url('navy/SubMarine/genarateExcel?type=smrs'); ?>"><i class="fa fa-file-excel-o"></i> Export to Excel</a>
              <tbody>
                <?php if(isset($smrsObj) && !empty($smrsObj)){?>
                <?php $i = 1; foreach($smrsObj as $smrs){?>
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
                  <td><?php if(!empty($smrs['dtntm'])) { echo ucfirst($smrs['dtntm']); } else { echo '---'; }?></td>
                  <td><?php if(!empty($smrs['uname']) && !empty($smrs['uname'])) { echo $smrs['uname']; } else { echo '---'; }?></td>
                  <td><?php if(!empty($smrs['area'])) { echo ucfirst($smrs['area']); } else { echo '---'; }?></td>
                  <td><?php if(!empty($smrs['location'])) { echo ucfirst($smrs['location']); } else { echo '---'; }?></td>
                  <td><?php if(!empty($smrs['rgms_channel'])) { echo ucfirst($smrs['rgms_channel']); } else { echo '---'; }?></td>
                  <td><?php if(!empty($smrs['rad_type'])) { echo ucfirst($smrs['rad_type']); } else { echo '---'; }?></td>
                  <td><?php if(!empty($smrs['radiation_level'])) { echo ucfirst($smrs['radiation_level']); } else { echo '---'; }?></td>
                  <td><?php if(!empty($smrs['unit'])) { echo ucfirst($smrs['unit']); } else { echo '---'; }?></td>
                  <td><?php if(!empty($smrs['radsit'])) { echo $smrs['radsit']; } else { echo '---'; }?></td>
                  

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
                          <a href="<?php echo base_url('navy/SubMarine/delete_smrs?idpackage='.$smrs['id']);?>" onclick="return confirm('Are You Sure');">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>Delete 
                          </a>
                        </li>
                         <li>
                          <a href="<?php echo base_url('smrsEdits?smrsId='.base64_encode($smrs['id']));?>">
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
