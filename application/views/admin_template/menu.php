<?php
 
 function main_menu_active($selected_class,$selected_method)
 {
   $ci =& get_instance();
   $class = $ci->router->fetch_class(); //current class
   $method = $ci->router->fetch_method(); // current method
   if (($class == $selected_class) && (in_array($method, $selected_method)))
   {
       return "active open"; 
   }  
   return false;
 }
?>
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> 
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">    
  <!--start this div closed in footer siddhu -->
  <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
      <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
 <!--       <li class="nav-item <?php //echo main_menu_active("admin_dashboards",array("index")); ?>">
          <a href="<?php //echo base_url('admin_dashboard'); ?>" class="nav-link ">
            <i class="glyphicon glyphicon-home">
            </i>
            <span class="title">Dashboard</span>
          </a>
        </li> 

        <li class="nav-item <?php //echo main_menu_active("events",array("index","add_event","view_event","event_edit")); ?>" >
              <a href="<?php //echo base_url('event'); ?>" class="nav-link">
            <i class="fa fa-calendar" aria-hidden="true"></i> 
                <span class="title">Events</span>
              </a>
        </li>

        <li class="nav-item <?php //echo main_menu_active("services",array("index","add_service","view_service","service_edit","")); ?>" >
              <a href="<?php //echo base_url('service'); ?>" class="nav-link">
               <i class="fa fa-wrench" aria-hidden="true"></i>
                <span class="title">Service</span>
              </a>
        </li>

        <li class="nav-item <?php //echo main_menu_active("packages",array("index","add_package","view_package","package_edit")); ?>" >
              <a href="<?php //echo base_url('package'); ?>" class="nav-link">
               <i class="fa fa-list" aria-hidden="true"></i>

                <span class="title">Products</span>
              </a>
        </li>

         <li class="nav-item <?php //echo main_menu_active("location",array("index")); ?>" >
              <a href="<?php //echo base_url('location'); ?>" class="nav-link">
               <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span class="title">Locations</span>
              </a>
        </li>  

        <li class="nav-item <?php //echo main_menu_active("packages",array("customers_products","view_customer")); ?>" >
              <a href="<?php //echo base_url('customers'); ?>" class="nav-link">
               <i class="fa fa-users"></i>
                <span class="title">Customers/Products</span>
              </a>
        </li> -->  

         <li class="nav-item <?php echo main_menu_active("navy",array("navy_products")); ?>" >
              <a href="<?php echo base_url('navyCustomers'); ?>" class="nav-link">
               <i class="fa fa-users"></i>
                <span class="title">MPP Param</span>
              </a>
        </li>
        <li class="nav-item <?php echo main_menu_active("submarine",array("marineList")); ?>" >
              <a href="<?php echo base_url('submarinelist'); ?>" class="nav-link">
               <i class="fa fa-users"></i>
                <span class="title">Submarine RS</span>
              </a>
        </li>

         <li class="nav-item <?php echo main_menu_active("submarine",array("PstateList")); ?>" >
              <a href="<?php echo base_url('PstateList'); ?>" class="nav-link">
               <i class="fa fa-users"></i>
                <span class="title">Personnel state</span>
              </a>
        </li>
         <li class="nav-item <?php echo main_menu_active("submarine",array("Checklist1")); ?>" >
              <a href="<?php echo base_url('checklist1'); ?>" class="nav-link">
               <i class="fa fa-users"></i>
                <span class="title">Checkoff State</span>
              </a>
        </li>
        <li class="nav-item <?php echo main_menu_active("submarine",array("rmcList")); ?>" >
              <a href="<?php echo base_url('rmcReport'); ?>" class="nav-link">
               <i class="fa fa-users"></i>
                <span class="title">RMG  Report</span>
              </a>
        </li>

        <li class="nav-item <?php echo main_menu_active("submarine",array("waterBoatList")); ?>" >
              <a href="<?php echo base_url('waterBoatReport'); ?>" class="nav-link">
               <i class="fa fa-users"></i>
                <span class="title">Water Boat  Report</span>
              </a>
        </li>

        <li class="nav-item <?php echo main_menu_active("submarine",array("esvList")); ?>" >
              <a href="<?php echo base_url('esvReport'); ?>" class="nav-link">
               <i class="fa fa-users"></i>
                <span class="title">ESV  Report</span>
              </a>
        </li>

        <li class="nav-item <?php echo main_menu_active("submarine",array("weatherStationList")); ?>" >
              <a href="<?php echo base_url('weatherStation'); ?>" class="nav-link">
               <i class="fa fa-users"></i>
                <span class="title">Weather Station</span>
              </a>
        </li>

        <li class="nav-item <?php echo main_menu_active("submarine",array("getThreshold")); ?>" >
              <a href="<?php echo base_url('thersholdList'); ?>" class="nav-link">
               <i class="fa fa-users"></i>
                <span class="title">Rad Threshold</span>
              </a>
        </li>

        <li class="nav-item <?php echo main_menu_active("submarine",array("getAgmsReportList")); ?>" >
              <a href="<?php echo base_url('agmsReportList'); ?>" class="nav-link">
               <i class="fa fa-users"></i>
                <span class="title">AGMS Report</span>
              </a>
        </li>
        <li class="nav-item <?php echo main_menu_active("submarine",array("getAGMSChannel")); ?>" >
              <a href="<?php echo base_url('agmsChannelList'); ?>" class="nav-link">
               <i class="fa fa-users"></i>
                <span class="title">AGMS Channel</span>
              </a>
        </li>

        <li class="nav-item <?php echo main_menu_active("submarine",array("getRGMSChannel")); ?>" >
              <a href="<?php echo base_url('rgmsChannelList'); ?>" class="nav-link">
               <i class="fa fa-users"></i>
                <span class="title">RGMS Channel</span>
              </a>
        </li>

      <!--   <li class="nav-item <?php //echo main_menu_active("submarine",array("getEmergencyTeamList")); ?>" >
              <a href="<?php //echo base_url('emergencyTeamList'); ?>" class="nav-link">
               <i class="fa fa-users"></i>
                <span class="title">Emergency Team Data </span>
              </a>
        </li> -->

     <!--    <li class="nav-item <?php //echo main_menu_active("submarine",array("getEmergencyWorkList")); ?>" >
              <a href="<?php //echo base_url('emergencyWorkList'); ?>" class="nav-link">
               <i class="fa fa-users"></i>
                <span class="title">Emergency Work Data </span>
              </a>
        </li> -->

        <li class="nav-item <?php echo main_menu_active("EmergencyTeam",array("getEmergencyObjList")); ?>" >
              <a href="<?php echo base_url('emergencyTeamObj'); ?>" class="nav-link">
               <i class="fa fa-users"></i>
                <span class="title">Emergency Team </span>
              </a>
        </li> 
        <li class="nav-item <?php echo main_menu_active("DoseHistory",array("getDoseHistoryObjList")); ?>" >
              <a href="<?php echo base_url('doseHistoryObj'); ?>" class="nav-link">
               <i class="fa fa-users"></i>
                <span class="title">Dose History</span>
              </a>
        </li>

        <li class="nav-item <?php echo main_menu_active("EmergencyTask",array("getEmergencyTaskObjList")); ?>" >
              <a href="<?php echo base_url('emergencyTaskObj'); ?>" class="nav-link">
               <i class="fa fa-users"></i>
                <span class="title">Emergency Task </span>
              </a>
        </li>
   

       <!--  <li class="nav-item <?php //echo main_menu_active("Location",array("add_banners")); ?>" >
              <a href="<?php //echo base_url('banners'); ?>" class="nav-link">
               <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span class="title">Banners</span>
              </a>
        </li>   -->  

       
      <br> <br> <br> <br> <br> <br> <br><br> <br> <br> <br> <br> <br> <br><br> <br> <br> <br> <br> <br> <br><br> <br> <br> <br> <br> <br><br> <br> <br>


</ul>
<!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->
