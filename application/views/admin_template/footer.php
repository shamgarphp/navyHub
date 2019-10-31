 </div>
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> 
                
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->

    <?php if($this->session->flashdata('success')) {  ?>
    <script type="text/javascript">
    toastr.success("<?php echo $this->session->flashdata('success'); ?>", "", {
    "closeButton": "true",
    "progressBar": "true",
    "positionClass": "toast-top-right",
     "timeOut": "5000",
     "extendedTimeOut": "1000"  
    });
    </script> 
    <?php  } if($this->session->flashdata('error')){ ?>
    <script type="text/javascript">
    toastr.error("<?php echo $this->session->flashdata('error');?>", "", {
    "closeButton": "true",
    "progressBar": "true",
    "positionClass": "toast-top-right"
    });
    </script> 
    <?php } ?>  
    
    <?php 
    $err = validation_errors();
    $err_msg   = str_replace(array("\r","\n"), '\n', $err);
    if(isset($err_msg) &&  $err_msg != ""){?>
    <script type="text/javascript">
    toastr.error("<?php echo $err_msg; ?>", "", {
    "closeButton": "true",
    "progressBar": "true"
    });
    </script> 
    <?php  } ?>     

        