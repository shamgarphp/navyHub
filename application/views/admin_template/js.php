        <script src="<?php echo admin_asset_url(); ?>global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo admin_asset_url(); ?>global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo admin_asset_url(); ?>global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo admin_asset_url(); ?>global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo admin_asset_url(); ?>global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->		
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo admin_asset_url(); ?>global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo admin_asset_url(); ?>layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo admin_asset_url(); ?>layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo admin_asset_url(); ?>layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="<?php echo admin_asset_url(); ?>layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->

        <!-- Ajax Starts-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
        <!-- Ajax Ends-->

    <script>
        $(document).ready(function(){
            $('#area').change(function(){
                var area_id = $('#area').val();
                if(area_id != '')
                {
                    $.ajax({
                        url:"<?php echo base_url(); ?>navy/EmergencyTask/fetch_location",
                        method:"GET",
                        data:{area_id:area_id},
                        success:function(data)
                        {
                            console.log(data);
                            $('#location').html(data);
                        }
                    });

                }
                else
                {
                    $('#location').html('<option value="">Select Location</option>');
                }
            });

            // $('#member_1').change(function(){
            //     var member_id = $('#member_1').val();
            //     if(member_id != '')
            //     {
            //         $.ajax({
            //             url:"<?php //echo base_url(); ?>navy/DoseHistory/fetch_doseHistory",
            //             method:"GET",
            //             dataType: "json",
            //             data:{member_id:member_id},
            //             success:function(data)
            //             {
            //                 // console.log(data['dose_history']);
            //                 $('#dose_history_1').val(data['dose_history']);
            //                 $('#et_id_1').val(data['et_id']);
            //                 $('#p_id_1').val(data['p_id']);
            //             }
            //         });

            //     }
            //     // else
            //     // {
            //     //     $('#dose_history_1').html('<option value="">Select Member</option>');
            //     // }
            // });          
    });
    </script>

    <script>
        function myFunction(row_id) {
          var member_id = $("#member_"+row_id).val();
            if(member_id != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>navy/DoseHistory/fetch_doseHistory",
                    method:"GET",
                    dataType: "json",
                    data:{member_id:member_id},
                    success:function(data)
                    {
                        // console.log(data['dose_history']);
                        $("#dose_history_"+row_id).val(data['dose_history']);
                        $("#et_id_"+row_id).val(data['et_id']);
                        $("#p_id_"+row_id).val(data['p_id']);
                    }
                });

            }
        }

       
    </script>
    <script>
     function emgTask() {
          var member_id = $("#member").val();
            if(member_id != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>navy/EmergencyTeam/fetch_emgTeam",
                    method:"GET",
                    dataType: "json",
                    data:{member_id:member_id},
                    success:function(data)
                    {
                        //$("#dose_history").val(5);
                        //console.log(data['et_id']);
                        $("#et_id").val(data['et_id']);
                        
                    }
                });

            }
        }
    </script>