<script>
      feather.replace({
          'width': '1em',
          'height': '1em'
      });


      $(document).ready(function(){

          $(".nav-tabs-wrapper.desktop .nav-tabs li .step-parent").each(function(idx, li) {
              console.log(idx)
              $(this).attr('data-bar',idx+1);
          });

          

          $('.nav-tabs-wrapper.desktop .nav-link .step-parent').each(function(i){
             
                  var start_point = $(this).position().top;

                  if((i+1) != $('.nav-tabs-wrapper.desktop .nav-link .step-parent').length){
                         
                     if($('.nav-tabs-wrapper.desktop .nav-link .step-parent').eq(i+1)){
                         var end_point = $('.nav-tabs-wrapper.desktop .nav-link .step-parent').eq(i+1);

                         var css = `step-parent-bar step-parent-bar-${i+1}`;
                         
                         if(window.start_point_bar > i+1){
                          css = `step-parent-bar success step-parent-bar-${i+1}`;
                         }

                          $('.nav-tabs-wrapper.desktop .vertical-line').append(`<div class="${css}" style="height:${(end_point.position().top - start_point)}px"></div>`);
                     }

                     
                  }     
          });

          $('.nav-tabs-wrapper.desktop .nav-item:not(.sub-item) .nav-link').click(function(){

             $('.nav-tabs-wrapper.desktop .step-parent-bar').removeClass('active').removeClass('success');
             $('.nav-tabs-wrapper.desktop .nav-item .nav-link').removeClass('success');
            
             
              var nav_item = $(this).closest('.nav-item');

              nav_item.prevAll().each(function(){

                  var bar = $(this).find('.step-parent').data('bar');
                  $(this).find('.nav-link').addClass('success');
                  $('.nav-tabs-wrapper.desktop .step-parent-bar-'+bar).addClass('success');

              });

          });

          $('.nav-tabs-wrapper.desktop .nav-item.sub-item .nav-link').click(function(){

             $('.nav-tabs-wrapper.desktop .step-parent-bar').removeClass('active').removeClass('success');
             $('.nav-tabs-wrapper.desktop .nav-item .nav-link').removeClass('success');
            
              var nav_item = $(this).closest('.nav-item');

              $('.nav-tabs-wrapper.desktop .nav-item[data-id='+$(this).data('parent-id')+']').find('.step-parent').addClass('size-big');

              nav_item.prevAll().each(function(){

                  var bar = $(this).find('.step-parent');
                  // bar.addClass('size-big');

                  bar = bar.data('bar');
                  $(this).find('.nav-link').addClass('success');
                  $('.nav-tabs-wrapper.desktop .step-parent-bar-'+bar).addClass('success');

              });

          });


      $('.navbar-toggler').removeAttr('data-toggle');

      $('.navbar-toggler').click(function(){
          $('#modal-nav').modal('show');
      });

  });


  $('.redirect').click(function(){
      $('body').removeClass('loaded');
  });

</script>




<script>

(function($, undefined) {

    "use strict";

    // When ready.
    $(function() {
        
        var $form = $( "#qform" );
        var $input = $form.find( "input:not(.text-input)" );

        $input.on( "keyup", function( event ) {
            
          // When user select text in the document, also abort.
          var selection = window.getSelection().toString();
          if ( selection !== '' ) {
              return;
          }
          
          // When the arrow keys are pressed, abort.
          if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
              return;
          }
          
          
          var $this = $( this );
          
          // Get the value.
          var input = $this.val();
          
          var input = input.replace(/[\D\s\._\-]+/g, "");
            input = input ? parseInt( input, 10 ) : 0;

            $this.val( function() {
                return ( input === 0 ) ? 0 : input.toLocaleString( "en-US" );
            });
            
        });
        
    });
})(jQuery);
</script>