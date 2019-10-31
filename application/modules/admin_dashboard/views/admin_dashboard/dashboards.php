<div class="page-content-wrapper">
  <!-- BEGIN CONTENT BODY -->
  <div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
    </div>
    <div class="portlet light bordered">
      <div class="portlet-title">
        <div class="caption font-dark">
          <i class="glyphicon glyphicon-home">
            </i>
          <span class="caption-subject bold uppercase"> Dashboard </span>
        </div>
        <div class="actions">
        </div>
      </div>
      <div id="main">
        <div class="middle">            
          <div class="box">
            <div id="content">
			
				<div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 blue" href="<?php echo base_url('event');?>">
                                <div class="visual">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value=""><?php if(isset($total_events) && !empty($total_events)) { echo $total_events; } ?></span>
                                    </div>
                                    <div class="desc">Events Total</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 red" href="<?php echo base_url('service');?>">
                                <div class="visual">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value=""><?php if(isset($total_services) && !empty($total_services)) { echo $total_services; } ?></span> </div>
                                    <div class="desc">Services Total</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 green" href="<?php echo base_url('package');?>">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value=""><?php if(isset($total_products) && !empty($total_products)) { echo $total_products; } ?></span>
                                    </div>
                                    <div class="desc">Products Total </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 purple" href="<?php echo base_url('customers');?>">
                                <div class="visual">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="details">
                                    <div class="number"> 
                                        <span data-counter="counterup" data-value=""><?php if(isset($customers) && !empty($customers)) { echo $customers; } ?></span></div>
                                    <div class="desc">Customers Total</div>
                                </div>
                            </a>
                        </div>


                       <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br> 

                    </div>
					
            </div>
            <span class="clear">
            </span>
          </div>
          <span class="clear">
          </span>
        </div>
        <span class="clear">
        </span>
      </div>
    </div>
  </div>
</div>
<!-- END PAGE BASE CONTENT -->
</div>
<!-- END CONTENT BODY -->
</div>


<!-- Styles -->
<style>
#chartdiv {
	width	: 100%;
	height	: 500px;
}
#piediv {
  width: 100%;
  height: 500px;
}
#registerdiv {
  width: 100%;
  height: 500px;
}	
#intern_job_div {
	width		: 100%;
	height		: 500px;
	font-size	: 11px;
}
#expensive {
	width	: 100%;
	height	: 500px;
}										
</style>