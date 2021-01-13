    <script src="{{ asset('frontend_assets/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/assets/libs/svg-injector/dist/svg-injector.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/assets/libs/feather-icons/dist/feather.min.js') }}"></script>
    <!-- Quick JS -->
    <script src="{{ asset('frontend_assets/assets/js/quick-website.js') }}"></script>
    <!-- Feather Icons -->
    <script>
        feather.replace({
            'width': '1em',
            'height': '1em'
        })
    </script>

    <script>
        feather.replace({
            'width': '1em',
            'height': '1em'
        });


        $(document).ready(function(){

            $('.nav-tabs-wrapper.desktop .nav-link .step-parent').each(function(i){
               
                    var start_point = $(this).position().top;

                    if((i+1) != $('.nav-tabs-wrapper.desktop .nav-link .step-parent').length){
                           
                           if($('.nav-tabs-wrapper.desktop .nav-link .step-parent').eq(i+1)){
                               var end_point = $('.nav-tabs-wrapper.desktop .nav-link .step-parent').eq(i+1);
                           $('.nav-tabs-wrapper.desktop .vertical-line').append(`<div class="step-parent-bar step-parent-bar-${i+1}" style="height:${(end_point.position().top - start_point)}px"></div>`);
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

       


    </script>