
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
              <i class="fa fa-user" aria-hidden="true"></i>

          <span class="caption-subject bold uppercase">Update EmergencyTeam
          </span>
        </div>
      </div>
      <div class="portlet-body form">
          <?php foreach($emergencyObj as $emergency){?>
                  <form class="m-form m-form--fit m-form--label-align-right" name="insert_form" id="insert_form" method="POST" action="<?php echo base_url('updateEmergencyTeam?emtId='.$emergency['id']);?>">
        <div class="row">
         <div class="row ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <div class="col-md-5">
                       <h5>ET-ID</h5>
                        <input type="text" class="form-control m-input m-input--air"  name="et_id"  id="et_id"  placeholder="ET-ID" value="<?php echo ucfirst($emergency['et_id'])?>">
                      </div>
                    
                      <div class="col-md-5">
                        <h5>ET-Name</h5>
                         <input type="text" class="form-control m-input m-input--air"  name="et_name"  id="et_name"  placeholder="ET-Name " value="<?php echo ucfirst($emergency['et_name'])?>">
                      </div>


                      <div class="col-md-5">
                        <h5>Date of Creation</h5>
                         <input type="text" class="form-control m-input m-input--air"  name="date_of_creation"  id="date_of_creation"  placeholder="Date of Creation" value="<?php echo ucfirst($emergency['date_of_creation'])?>">
                      </div>

                      <div class="col-md-5">
                        <h5>Date of Updation</h5>
                         <input type="text" class="form-control m-input m-input--air"  name="date_of_updation"  id="date_of_updation"  placeholder="Date of Updation" value="<?php echo ucfirst($emergency['date_of_updation'])?>">
                      </div>

                       <div class="col-md-5">
                        <h5>Strength</h5>
                         <input type="text" class="form-control m-input m-input--air"  name="strength"  id="strength"  placeholder="Strength" value="<?php echo ucfirst($emergency['strength'])?>">
                      </div>
                      
                </div><br>
                <div class="row">
                  <div class="col-md-10">
                          <div class="table-repsonsive">
                            <span id="error"></span>
                            <table class="table table-bordered" id="item_table">
                            <thead>
                              <tr>
                               <th>Member Name</th>
                               <th>Dose History</th>
                               <th>ET Id</th> 
                               <th>P Id</th>                              
                               <th style="width: 10px;"><button type="button" id="add_row" class="btn btn-success btn-sm addDay"><span class="glyphicon glyphicon-plus"></span></button></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr id="row_1">                                
                              <td>                                
                                <select name="member[]" id="member_1" class="form-control" onchange="myFunction(1)">
                                  <option value="">Select Member</option>
                                    <?php foreach ($doseHistoryObj as $k => $v): ?>
                                    <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                                  <?php endforeach ?>
                              </select>
                              </td>
                              <td>
                                <input type="text" name="dose_history[]" id="dose_history_1" class="form-control" disabled autocomplete="off">                                
                              </td> 
                              <td>
                                <input type="text" name="et_id[]" id="et_id_1" class="form-control" disabled autocomplete="off">                                
                              </td>
                              <td>
                                <input type="text" name="p_id[]" id="p_id_1" class="form-control" disabled autocomplete="off">                                
                              </td>                               
                              </tr>
                            </tbody>
                            </table>
                            </div>
                      </div>
                </div>
          <?php } ?>
        </div>
      </div>
       <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
      <div class="form-actions">
        <button type="submit" class="btn btn-accent" name="add_user" id="add_user" value="add_user">Update</button>
        <button type="reset" class="btn btn-secondary reset" id="cancelBtn" style="background-color: lightgray;">Cancel</button>
      </div><br>
      <h4>Team Members</h4>
      <table class="table table-striped table-bordered table-hover table-checkable">
        <thead>
            <tr>
              <th>Sno</th>
              <th>Member Name</th>
              <th>Dose History</th>
            </tr>
        </thead>
        <tbody>
          <?php $sno = 1;
          if(sizeof($memberList)){
          foreach($memberList as $value){?>
          <tr>
            <td><?php echo $sno; ?></td>
            <td><?php echo $value['name']; ?></td>
            <td><?php echo $value['dose_history']; ?></td>
          </tr>
          <?php $sno++; } }else{?>
            <tr>
              <td colspan="3">No records found</td>
            </tr>
          <?php } ?>
        </tbody>        
      </table>
  </form>
</div>
</div>
</div>
</div>
<!-- END PAGE BASE CONTENT -->
</div>
<!-- END CONTENT BODY -->
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

<script type="text/javascript">
      $(document).ready(function(){
        // Add new row in the table 
    // $(".select_group").select2();
    $("#add_row").unbind('click').bind('click', function() {
      var table = $("#item_table");
      var count_table_tbody_tr = $("#item_table tbody tr").length;
      var row_id = count_table_tbody_tr + 1;

               var html = '<tr id="row_'+row_id+'">'+
                   
                    '<td>'+ 
                      '<select class="form-control select_group product" data-row-id="'+row_id+'" id="member_'+row_id+'" name="member[]" onchange="myFunction('+row_id+')">'+
                          '<option value="">Select</option>';
                        <?php foreach ($doseHistoryObj as $doseHistory) {?>
                          html += '<option value="<?php echo $doseHistory['id'];?>"><?php echo $doseHistory['name'];?></option>';
                        <?php }?>                       
                        
                        html += '</select>'+
                      '</td>'+
                      '<td><input type="text" name="dose_history[]" id="dose_history_'+row_id+'" class="form-control" disabled></td>'+
                      '<td><input type="text" name="et_id[]" id="et_id_'+row_id+'" class="form-control" disabled></td>'+
                      '<td><input type="text" name="p_id[]" id="p_id_'+row_id+'" class="form-control" disabled></td>'+

                    '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td>'
                    '</tr>';

                if(count_table_tbody_tr >= 1) {
                $("#item_table tbody tr:last").after(html);  
              }
              else {
                $("#item_table tbody").html(html);
              }
          });

        $(document).on('click', '.remove', function(){
              $(this).closest('tr').remove();
          });
    });
</script>

