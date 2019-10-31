
<script src="<?php echo base_url('admin_assets');?>/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
   
<!-- <script src="<?php //echo base_url('admin_assets');?>/demo/default/custom/crud/datatables/extensions/responsive.js" type="text/javascript"></script>

 -->
 <script src="<?php echo base_url('admin_assets');?>/demo/default/custom/crud/datatables/extensions/buttons.js" type="text/javascript"></script>

 <script src="<?php echo base_url('admin_assets');?>/demo/default/custom/crud/forms/widgets/select2.js" type="text/javascript"></script>

<script src="<?php echo base_url('admin_assets');?>/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
 <script src="<?php echo base_url('admin_assets');?>/vendors_styles/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>

 <script src="<?php echo base_url('admin_assets');?>/demo/default/custom/crud/forms/widgets/bootstrap-timepicker.js" type="text/javascript"></script>
 

<script type="text/javascript">

	$('.agms_report').DataTable({
			   responsive: true,
			   columnDefs:[
		       { responsivePriority: 1, targets: 0 },
		       { responsivePriority: 2, targets: -1 }
			  ]
	});

</script>

