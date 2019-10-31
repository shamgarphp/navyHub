<!-- start editor  -->
<script src="https://cdn.ckeditor.com/4.9.2/basic/ckeditor.js"></script> 
<script>  
CKEDITOR.replace('package_desc');  
</script>
<!-- end editor  -->

<script type="text/javascript">
$(document).ready(function() {

/*Start  data clear package add page*/
$('#add_package_reset').click(function(){
        $('#add_package_form')[0].reset();
 });
/*End  data clear package add page */

/*Start  data clear package edit page*/
$('#package_update').click(function() {
        $('#package_update_form')[0].reset();
 });
/*End  data clear package edit page */


});

/*Product image remove*/
function deleteimage($image_id)
{
	var img_id = $image_id;
	var answer = confirm ("Are you sure? you want to delete this image.");
	if (answer)
	{
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('packages/packages/packag_img_remove');?>",
        data: {img_id: img_id},
        success: function (data) 
        {
           if(data != '') 
           {
             $('#img_id_'+img_id).remove();
           }
           else 
           {
             toastr["error"]("Image Delete Failed!");
           } 
        }
	   });
    }
}


/*Start get service category*/ 
    $('select[name="service"]').on('change', function() {
         var service_id = $(this).val();
         if(service_id) 
         {
            $.ajax({
               url: "<?php echo base_url('packages/packages/service_category'); ?>",
               type: "POST",
               data: {service_id: service_id},
               dataType: "json",
               success: function(data) {

                    if(data != '')
                    {
                        $('select[name="service_category"]').empty();
                        $.each(data, function(key, service_cat) {
                         $('select[name="service_category"]').append('<option value="'+service_cat.category_id+'">'+service_cat.name+'</option>');
                        });
                    }
                    else
                    { 
                        $('.service_category').html('<option value="">'+"Data not available"+'</option>');
                    }
                    
               }
            });
         } 
         else 
         {
            $('select[name="service_category"]').empty();
         }
    });

   /*End get service category*/

  var countryVal;
   $("#cat_type").change(function() 
   {

     var newVal = $(this).val();
      
      if (!confirm("If incase add catering service choose this type. other wise leave it?")) 
      {
         $(this).val(countryVal); //set back
         return;                           
      }
         
   });


</script>


