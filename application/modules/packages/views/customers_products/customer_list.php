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
               <span class="caption-subject bold uppercase">CUSTOMERS LIST</span>
            </div>
          </div>
          <div class="portlet-body">
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
                  <th>Customer Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Party Date</th>
                  <th>Party Time</th>
                  <!-- <th>Total Amount</th>
                  <th>Discount Amount</th>
                  <th>Final Amount</th>
                  <th>Advance Amount</th> -->
                  <th>Actions</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php if(isset($customers_list) && !empty($customers_list)){?>
                <?php $i = 1; foreach($customers_list as $customer){?>
                <tr class="odd gradeX" >
                 
                  <td style="display: none">
                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                      <input type="checkbox" class="checkboxes" value="1" />
                      <span>
                      </span>
                    </label>
                  </td>

                  <td> <?php echo $i++; ?> </td>
                  <td><?php if(!empty($customer['name'])) { echo ucfirst($customer['name']); } else { echo '---'; }?></td>
                  <td><?php if(!empty($customer['phone']) && !empty($customer['alternative_phone'])) { echo $customer['phone'].' , '.$customer['alternative_phone']; } else { echo '---'; }?></td>
                  <td><?php if(!empty($customer['email'])) { echo ucfirst($customer['email']); } else { echo '---'; }?></td>
                  <td><?php if(!empty($customer['party_date'])) { echo ucfirst($customer['party_date']); } else { echo '---'; }?></td>
                  <td><?php if(!empty($customer['party_time'])) { echo $customer['party_time']; } else { echo '---'; }?></td>
                 
                  <!-- <td><?php if(!empty($customer['total_amount'])) { echo $customer['total_amount']; } else { echo '---'; }?></td>
                  <td><?php if(!empty($customer['discount_amount'])) { echo $customer['discount_amount']; } else { echo '---'; }?></td>
                  <td><?php if(!empty($customer['final_amount'])) { echo $customer['final_amount']; } else { echo '---'; }?></td>
                   <td><?php if(!empty($customer['advance_amount'])) { echo $customer['advance_amount']; } else { echo '---'; }?></td> -->
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Actions
                        <i class="fa fa-angle-down">
                        </i>
                      </button>
                      <ul class="dropdown-menu pull-left" role="menu">
                        <li>
                          <a href="<?php echo base_url('CustomerView?id='.base64_encode($customer['book_cust_id']));?>">
                            <i class="icon-docs">
                            </i> View 
                          </a>
                        </li>
                        
                        <li>
                          <a href="<?php echo base_url('packages/packages/delete_package?idpackage='.base64_encode($customer['book_cust_id']));?>" onclick="return confirm('Are You Sure');">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>Delete 
                          </a>
                        </li>
                       
                      </ul>
                    </div>
                  </td>                            
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
