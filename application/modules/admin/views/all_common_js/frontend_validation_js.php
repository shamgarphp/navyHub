<script>
$(document).ready(function() { 

  $('#add_event').click(function(e) 
  {
      if($('#event_name').val() == '')
      {
        toastr["error"]("Event Name is required!");
        e.preventDefault();
      }
  });
 
  $('#update_event').click(function(e) 
  {
      if($('#event_name').val() == '')
      {
        toastr["error"]("Event Name is required!");
        e.preventDefault();
      }
  });

  $('#add_service').click(function(e) 
  {
      if($('#service_name').val() == '')
      {
        toastr["error"]("Service Name is required!");
        e.preventDefault();
      }
  });

  $('#update_service').click(function(e) 
  {
      if($('#service_name').val() == '')
      {
        toastr["error"]("Service Name is required!");
        e.preventDefault();
      }
  });

  $('#add_package').click(function(e) 
  {
       if($('#package_name').val() == '')
      {
        toastr["error"]("Package Name is required!");
        e.preventDefault();
      }
      if($('#price_type').val() == '')
      {
        toastr["error"]("Price type is required!");
        e.preventDefault();
      }
      if($('#price').val() == '')
      {
        toastr["error"]("Price is required!");
        e.preventDefault();
      }

      if($('#service').val() == '')
      {
        toastr["error"]("Service is required!");
        e.preventDefault();
      }

      if($('#discount').val() == '')
      {
        toastr["error"]("Discount is required!");
        e.preventDefault();
      }

      // if($('#package_desc').val() == '')
      // {
      //   toastr["error"]("Package Description is required!");
      //   e.preventDefault();
      // }

       var user_events = [];  
       $(':checkbox:checked').each(function(i){
        user_events[i] = $(this).val();
       });
      
       if(user_events.length === 0) 
       {
         toastr["error"]("Please select atleast one event!");
         e.preventDefault();
       }
  });


  $('#add_menu').click(function(e) 
  {
      if($('#menu_name').val() == '')
      {
        toastr["error"]("Menu Name is required!");
        e.preventDefault();
      }
  });


  $('#update_package').click(function(e) 
  {
    
      if($('#package_name').val() == '')
      {
        toastr["error"]("Package Name is required!");
        e.preventDefault();
      }
      if($('#price_type').val() == '')
      {
        toastr["error"]("Price type is required!");
        e.preventDefault();
      }
      if($('#price').val() == '')
      {
        toastr["error"]("Price is required!");
        e.preventDefault();
      }
      if($('#service').val() == '')
      {
        toastr["error"]("Service is required!");
        e.preventDefault();
      }

       var user_events = [];  
       $(':checkbox:checked').each(function(i){
        user_events[i] = $(this).val();
       });
      
       if(user_events.length === 0) 
       {
         toastr["error"]("Please select atleast one event!");
         e.preventDefault();
       }
  });
 
 $('#admin_email').click(function(e) 
  {
      if($('#email_admin').val() == '')
      {
        toastr["error"]("Email field is required");
        e.preventDefault();
      }
  });

  $('#forgot_pass').click(function(e) 
  {
      var admin_email = $('#admin_email').val();
      if($('#admin_email').val() == '')
      {
          toastr["error"]("Email field is required!");
          e.preventDefault();
      }
      if($('#admin_email').val() != '')
      {
          if (!validateEmail(admin_email)) 
          {
              toastr["error"]("Invalid email address!");
              e.preventDefault();
          }
      }
  });


  $('#admin_login').click(function(e) 
  {
      var admin_email = $('#admin_email').val();
      if($('#admin_email').val() == '')
      {
          toastr["error"]("Email field is required!");
          e.preventDefault();
      }
      if($('#admin_email').val() != '')
      {
          if (!validateEmail(admin_email)) 
          {
              toastr["error"]("Invalid email address!");
              e.preventDefault();
          }
      }
      if($('#pass').val() == '')
      {
          toastr["error"]("Password field is required!");
          e.preventDefault();  
      }
  });
 
  function validateEmail(email) {
  var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
  if (filter.test(email)) 
  {
   return true;
  }
  else 
  {
   return false;
  }
}

  toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
  }
});

</script>