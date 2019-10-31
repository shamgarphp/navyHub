
<script src="<?php echo base_url('admin_assets');?>/demo/default/custom/crud/wizard/wizard.js" type="text/javascript"></script>
<!-- <script src="<?php //echo base_url('admin_assets');?>/demo/default/custom/crud/wizard/wizard.js" type="text/javascript"></script> -->
<script src="<?php echo base_url('admin_assets');?>/demo/base/scripts.bundle.js" type="text/javascript"></script>
<script type="text/javascript">
    


 // $('.attendence_list').DataTable( {
 //               responsive: true,
 //               columnDefs:[
 //               { responsivePriority: 1, targets: 0 },
 //               { responsivePriority: 2, targets: -1 }
 //              ]
 // });


</script>


<script type="text/javascript">

/*Start select multiple checkbox*/
$('#quetion_all').click(function() {

    if ($(this).is(':checked')) 
    {
        $('input:checkbox').attr('checked', true);
    } 
    else 
    {
        $('input:checkbox').attr('checked', false);
    }

});
/*End select multiple checkbox*/


/* Start employees status change*/ 
function register_status_change(emp_id,val) {

        var result = confirm("Are you sure you want to change status?");
        if (result) 
        {
            var form = {id:emp_id,emp_status:val};
            $.ajax({

                url: '<?php echo base_url('users/users/user_status'); ?>',
                type: 'POST',
                data: form,
                success: function(msg) {
                     if (msg == 1) 
                     {
                       $('#status_'+emp_id).replaceWith('<a href="javascript:;" class="btn btn-xs btn-primary" id="status_'+emp_id+'" onclick="register_status_change('+emp_id+',1)"> ACTIVE</a>');
                     } 
                     else if (msg == 0) 
                     {
                       $('#status_'+emp_id).replaceWith('<a href="javascript:;" class="btn btn-xs btn-danger" id="status_'+emp_id+'" onclick="register_status_change('+emp_id+',0)"> IN-ACTIVE </a>');
                     }
                     else 
                     {
                        toastr["error"](msg);
                     }
                }

            });
        }
       
}
 /* End employees status change*/ 


</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>

<script src="<?php echo base_url('admin_assets/other_plugins/select2/docs/js'); ?>/bootstrap.min.js"></script>
<script src="<?php echo base_url('admin_assets/other_plugins/select2/docs/js'); ?>/anchor.min.js"></script>




 <script>
      anchors.options.placement = 'left';
      anchors.add('.container h1, .container h2, .container h3, .container h4, .container h5');

      // Set the "bootstrap" theme as the default theme for all Select2
      // widgets.
      //
      // @see https://github.com/select2/select2/issues/2927
      $.fn.select2.defaults.set( "theme", "bootstrap" );

      var placeholder = "Select an option";

      $( ".select2-single, .select2-multiple" ).select2( {
        placeholder: placeholder,
        width: null,
        containerCssClass: ':all:'
      } );

      $( ".select2-allow-clear" ).select2( {
        allowClear: true,
        placeholder: placeholder,
        width: null,
        containerCssClass: ':all:'
      } );

      // @see https://select2.github.io/examples.html#data-ajax
      function formatRepo( repo ) {
        if (repo.loading) return repo.text;

        var markup = "<div class='select2-result-repository clearfix'>" +
          "<div class='select2-result-repository__avatar'><img src='" + repo.owner.avatar_url + "' /></div>" +
          "<div class='select2-result-repository__meta'>" +
            "<div class='select2-result-repository__title'>" + repo.full_name + "</div>";

        if ( repo.description ) {
          markup += "<div class='select2-result-repository__description'>" + repo.description + "</div>";
        }

        markup += "<div class='select2-result-repository__statistics'>" +
              "<div class='select2-result-repository__forks'><span class='glyphicon glyphicon-flash'></span> " + repo.forks_count + " Forks</div>" +
              "<div class='select2-result-repository__stargazers'><span class='glyphicon glyphicon-star'></span> " + repo.stargazers_count + " Stars</div>" +
              "<div class='select2-result-repository__watchers'><span class='glyphicon glyphicon-eye-open'></span> " + repo.watchers_count + " Watchers</div>" +
            "</div>" +
          "</div></div>";

        return markup;
      }

      function formatRepoSelection( repo ) {
        return repo.full_name || repo.text;
      }

      $( ".js-data-example-ajax" ).select2({
        width : null,
        containerCssClass: ':all:',
        ajax: {
          url: "https://api.github.com/search/repositories",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            return {
              q: params.term, // search term
              page: params.page
            };
          },
          processResults: function (data, params) {
            // parse the results into the format expected by Select2
            // since we are using custom formatting functions we do not need to
            // alter the remote JSON data, except to indicate that infinite
            // scrolling can be used
            params.page = params.page || 1;

            return {
              results: data.items,
              pagination: {
                more: (params.page * 30) < data.total_count
              }
            };
          },
          cache: true
        },
        escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: formatRepo,
        templateSelection: formatRepoSelection
      });

      $( "button[data-select2-open]" ).click( function() {
        $( "#" + $( this ).data( "select2-open" ) ).select2( "open" );
      });

      $( ":checkbox" ).on( "click", function() {
        $( this ).parent().nextAll( "select" ).prop( "disabled", !this.checked );
      });

      // copy Bootstrap validation states to Select2 dropdown
      //
      // add .has-waring, .has-error, .has-succes to the Select2 dropdown
      // (was #select2-drop in Select2 v3.x, in Select2 v4 can be selected via
      // body > .select2-container) if _any_ of the opened Select2's parents
      // has one of these forementioned classes (YUCK! ;-))
      $( ".select2-single, .select2-multiple, .select2-allow-clear, .js-data-example-ajax" ).on( "select2:open", function() {
        if ( $( this ).parents( "[class*='has-']" ).length ) {
          var classNames = $( this ).parents( "[class*='has-']" )[ 0 ].className.split( /\s+/ );

          for ( var i = 0; i < classNames.length; ++i ) {
            if ( classNames[ i ].match( "has-" ) ) {
              $( "body > .select2-container" ).addClass(classNames[ i ] );
            }
          }
        }
      });
    </script>

