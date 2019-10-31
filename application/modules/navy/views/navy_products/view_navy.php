<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
  <!-- BEGIN CONTENT BODY -->
  <div class="page-content">
    <div class="row">
      <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box red">
          <div class="portlet-title">
             <div class="caption">
            <i class="fa fa-picture"></i>Customer Details</div>
        <div class="tools">
            <a href="javascript:;" class="collapse"> </a>
            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
            <a href="javascript:;" class="reload"> </a>
            <a href="javascript:;" class="remove"> </a>
        </div>
            
            <div class="actions">
            </div>
          </div>
          <div class="portlet-body">
           <div class="table-scrollable">
                                        <table class="table table-condensed table-hover">
                                            <thead>
                                                <tr>  
                                                    <th> Customer Name </th>
                                                    <th> Phone </th>
                                                    <th> Email </th>
                                                    <th> Party Date </th>
                                                    <th> Party Time </th>
                                                    <th> Advance Amount </th>
                                                    <th> Total Amount </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php if(!empty($customer_view['name'])) { echo ucfirst($customer_view['name']); } else { echo '---'; }?> </td>
                                                    <td> <?php if(!empty($customer_view['phone']) && !empty($customer_view['alternative_phone'])) { echo $customer_view['phone']; } else { echo '---'; }?> </td>
                                                    <td> <?php if(!empty($customer_view['email'])) { echo ucfirst($customer_view['email']); } else { echo '---'; } ?> </td>
                                                    <td> <?php if(!empty($customer_view['party_date'])) { echo ucfirst($customer_view['party_date']); } else { echo '---'; }?> </td>
                                                   
                                                    <td> <?php if(!empty($customer_view['party_time'])) { echo ucfirst($customer_view['party_time']); } else { echo '---'; }?> </td>
                                                   
                                                    <td> <?php if(!empty($customer_view['advance_amount'])) { echo ucfirst($customer_view['advance_amount']); } else { echo '---'; }?> </td>
                                                    <td> <?php if(!empty($customer_view['total_amount'])) { echo ucfirst($customer_view['total_amount']); } else { echo '---'; }?> </td>
                                                   
                                                </tr>
                                                
                                            </tbody>
                                        </table><br><br>

                                        <table class="table table-condensed table-hover">
                                            <thead>
                                                <tr>  
                                                    <th> Venu Type </th>
                                                    <th> Venue Location </th>
                                                    <th> Venue Add Line1 </th>
                                                    <th> Venue Add Line2 </th>
                                                    <th> Venue Pincode </th>
                                                    <th> Venue Landmark </th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php if(!empty($customer_view['venu_type'])) { echo ucfirst($customer_view['venu_type']); } else { echo '---'; }?> </td>
                                                    <td> <?php if(!empty($customer_view['venue_location'])) { echo $customer_view['venue_location']; } else { echo '---'; }?> </td>
                                                    <td> <?php if(!empty($customer_view['venue_add_line1'])) { echo ucfirst($customer_view['venue_add_line1']); } else { echo '---'; } ?> </td>
                                                    <td> <?php if(!empty($customer_view['venue_add_line2'])) { echo ucfirst($customer_view['venue_add_line2']); } else { echo '---'; }?> </td>
                                                   
                                                    <td> <?php if(!empty($customer_view['venu_pincode'])) { echo ucfirst($customer_view['venu_pincode']); } else { echo '---'; }?> </td>
                                                   
                                                    <td> <?php if(!empty($customer_view['venue_land_mark'])) { echo ucfirst($customer_view['venue_land_mark']); } else { echo '---'; }?> </td> 
                                                </tr>
                                                
                                            </tbody>
                                        </table><br><br>

                                         <table class="table table-condensed table-hover">
                                            <thead>
                                                <tr>  
                                                    <th> Permenent Address </th>
                                                    <th> Permenent Adress Landmark </th>
                                                    <th> Permenent Adress Pincode </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php if(!empty($customer_view['permenent_add'])) { echo ucfirst($customer_view['permenent_add']); } else { echo '---'; }?> </td>
                                                    <td> <?php if(!empty($customer_view['pert_add_landmark'])) { echo $customer_view['pert_add_landmark']; } else { echo '---'; }?> </td>
                                                    <td> <?php if(!empty($customer_view['per_add_pincode'])) { echo ucfirst($customer_view['per_add_pincode']); } else { echo '---'; } ?> </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>


                                    </div>
          </div>
        </div>


        <!-- END EXAMPLE TABLE PORTLET-->
      </div>

      <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box red">
          <div class="portlet-title">
             <div class="caption">
            <i class="fa fa-picture"></i>Customer Products</div>
        <div class="tools">
            <a href="javascript:;" class="collapse"> </a>
            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
            <a href="javascript:;" class="reload"> </a>
            <a href="javascript:;" class="remove"> </a>
        </div>
            
            <div class="actions">
            </div>
          </div>
          <div class="portlet-body">
           <div class="table-scrollable">
                                        <table class="table table-condensed table-hover">
                                            <thead>
                                                <tr>  
                                                    <th> Product </th>
                                                    <th> Price </th>
                                                    <th> Discount </th>  
                                                    <th> Discount Amount</th>  
                                                </tr>
                                            </thead>

                                            <tbody>

                                            <?php $total_discount_amount = 0; if(isset($customer_products) && !empty($customer_products)) { ?>
                                            <?php foreach($customer_products as $customer_product) {  ?>
                                                <tr>
                                                    <td><?php if(!empty($customer_product['product'])) { echo ucfirst($customer_product['product']); } else { echo '---'; }?> </td>

                                                    <td> <?php if(!empty($customer_product['price']))  { echo $customer_product['price']; } else { echo '---'; }?> </td>

                                                    <td> <?php if(!empty($customer_product['discount'])) { echo ucfirst($customer_product['discount'].'%'); } else { echo '---'; } ?> </td>

                                                    <td><?php if(!empty($customer_product["price"]) && !empty($customer_product["discount"])){ $discount_amount =  (int)($customer_product["price"]/100 * $customer_product["discount"]); echo $discount_amount; } ?></td> 
                                                </tr>

                                                <?php $total_discount_amount += $discount_amount; ?>

                                            <?php } } ?>
                                                
                                            </tbody>

                                        </table>
                                
                                    </div>
          </div>
        </div>


        <!-- END EXAMPLE TABLE PORTLET-->
      </div>


       <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box red">
          <div class="portlet-title">
             <div class="caption">
            <i class="fa fa-picture"></i>Product Amount Details</div>
        <div class="tools">
            <a href="javascript:;" class="collapse"> </a>
            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
            <a href="javascript:;" class="reload"> </a>
            <a href="javascript:;" class="remove"> </a>
        </div>
            
            <div class="actions">
            </div>
          </div>
          <div class="portlet-body">
           <div class="table-scrollable">
                                       
                                    <table class="table table-condensed table-hover">
                                            <thead>
                                                <tr>  
                                                    <th> Total Amount </th>
                                                    <th> Discount Amount </th>
                                                    <th> Advance Amount </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> <?php if(!empty($customer_view['final_amount'])) { echo $customer_view['final_amount']; } else { echo '---'; }?> </td>
                                                    <td> <?php if(!empty($total_discount_amount)) {  echo $total_discount_amount; } else { echo '---'; } ?> </td>
                                                    <td> <?php if(!empty($customer_view['advance_amount'])) { echo$customer_view['advance_amount']; } else { echo '---'; } ?> </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>

                                    </div>
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
