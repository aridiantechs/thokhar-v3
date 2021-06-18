@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app')

@section('styles')
<style type="text/css">
    /* .input-group-prepend svg{
        color: #ffffff;
    } */
    @media screen and (max-width : 400px)
    {
        .form-group h4
        {
            font-size: 18px;
        }
    }

    @media only screen and (max-width: 1430px) and (min-width: 1000px)
    {
        .form-group h4
        {
            font-size: 16px;
        }
    }
</style>
@endsection


@section('content')

{{-- @dd($user_questionnaire->investing_amount["investing_amount"]["initial_amount"]) --}}
<section class="slice py-7 fix-heigh">
    <div class="container">
        <div class="row row-grid">
            
            <div class="col-12 col-lg-12">
                <!-- Heading -->

                <p class="text-{{$align}} mb-0">

                    <span>{{ trans('lang.Home') }}</span> <span> / </span><span>  {{ trans('lang.investing_amount.title') }} </span>

                </p>
                
                <h1 class="display-4 text-{{$align}} text-lg-{{$align}} mb-5">
                    <strong class="text-primary font-arabic">{{ trans('lang.awareness.Reach To The Financial Freedom') }}</strong> 
                </h1>
                
                <span class="clearfix"></span>

                    @include('frontend.notifications.warning')

                    <form action="{{ route('questionnaire', locale()) }}" id="investing_form" method="POST">
                        @csrf
                        <input type="hidden" name="location" value="investing-amount">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row flex-column-reverse flex-lg-row">

                                    <div class=" col-lg-4 col-md-12 col-sm-12">

                                        <div class="form-group form-group-new mb-0 mb-lg-0 mb-5">
                                            
                                            @include('frontend.inputs.input_group', [
                                                'type' => 'text', 
                                                'name' => 'investing_amount[annual_increase_in_saving_plan]', 
                                                'value' => currency($user_questionnaire->investing_amount["investing_amount"]["annual_increase_in_saving_plan"] ?? '', 0),
                                                'old_val' => "investing_amount.age_today",
                                                'placeholder' => "0",
                                                'label' => trans('lang.question.annual_increase_in_saving_plan')
                                                ])

                                        </div>
                                        
                                    </div>
                                    
                                    <div class=" col-lg-4 col-md-12 col-sm-12">

                                        <div class="form-group form-group-new mb-5 mb-lg-0">
                                            
                                            @include('frontend.inputs.input_group', [
                                                'type' => 'text', 
                                                'name' => 'investing_amount[initial_amount]',
                                                'value' => currency($user_questionnaire->investing_amount["investing_amount"]["initial_amount"] ?? '', 0),
                                                'old_val' => "investing_amount.initial_amount",
                                                'label' => trans('lang.investing_amount.Initial amount ( one time )'),
                                                ])

                                        </div>
                                    </div>
                                    
                                    <div class=" col-lg-4 col-md-12 col-sm-12">

                                        <div class="form-group form-group-new mb-5 mb-lg-0">
                                            @include('frontend.inputs.input_group', [
                                                'type' => 'text', 
                                                'name' => 'investing_amount[monthly_amount]', 
                                                'value' => currency($user_questionnaire->investing_amount["investing_amount"]["monthly_amount"] ?? '', 0),
                                                'old_val' => "investing_amount.monthly_amount",
                                                'label' => trans('lang.investing_amount.Monthly investing Payment')
                                                ])

                                        </div>
                                        
                                    </div>

                                    

                                </div>
                                
                                
                            </div>
                            
                        </div>


                        <h3 class="text-{{$align}} text-lg-{{$align}} mb-3 mt-3">
                              <strong class="font-arabic">
                                {{ trans('lang.investing_amount.Retire age( 60 as default and can not changes )') }}
                              </strong>
                        </h3>

                            <div class="mt-4 text-lg-{{$align}} text-center mt-5">
                                <button type="submit" class="{{$btnAlign}} btn btn-big btn-gradient btn-rad35 btn-primary with-arrow">
                                    {{--  <i class="fa fa-arrow-left"></i> --}}
                                    <span class="d-inline-block">{{ trans('lang.question.next') }}</span>
                                    <i class="fa fa-arrow-{{$arrowAlign}}"></i>
                                </button>
                            </div>

                    </form>
                
            </div>
        </div>
    </div>
</section>
@endsection


@section('scripts')
<script type="text/javascript">
    "use strict";
     $('.input-big').keyup(function(){
        $(this).each(function(){
            if(isNum($(this).val())){
                $(this).prev().find('svg').css("color", "#2bd687");
            }
            else{
                $(this).prev().find('svg').css("color", "red");
            }
        });
     });


    function isNum(number){
        var intRegex = /^\d+$/;
        var floatRegex = /^((\d+(\.\d *)?)|((\d*\.)?\d+))$/;

        var str = number;
        if(intRegex.test(str) || floatRegex.test(str)) {
           return true;
        }
        else{
            if (str.indexOf(',') > -1){
                return true;
            }
            else{
                return false;
            }
        }
     }

        $('.input-big:not([name="investing_amount[years_old]"])').on( "keyup", function( event ) {
            
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
                    } );
        } );
        
        /**
         * ==================================
         * When Form Submitted
         * ==================================
         */
        $('#investing_form').on( "submit", function( event ) {
            
            var $this = $( this );
            var n = '';
            $('.form-control').each(function(i, obj) {
                
                $(this).val($(this).val().replace(/,/g,''));
                
            });
            

        
            
        });
</script>
@endsection