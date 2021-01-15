@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app')

@section('styles')
<style type="text/css">
    .input-group-prepend svg{
        color: #ffffff;
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

                <p class="text-right mb-0">

                  <span>  اتصل بنا</span><span> / </span><span>الرئيسية    </span>

                </p>
                
                <h1 class="display-4 text-right text-lg-right mb-5">
                    <strong class="text-primary font-arabic">الوصول للحرية المالية</strong> 
                </h1>
                
                <span class="clearfix"></span>

                    @include('frontend.notifications.warning')

                    <form action="{{ route('questionnaire', locale()) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row flex-column-reverse flex-lg-row">
                                    
                                    <div class="col-md-4">

                                        <div class="form-group form-group-new mb-0 mb-lg-0 mb-5">
                                            <h4 class="text-right font-arabic"><span class="color-red">*</span>عمرك الان </h4>
                                            
                                            @include('frontend.inputs.input_group', [
                                                'type' => 'text', 
                                                'name' => 'investing_amount[years_old]', 
                                                'value' => currency($user_questionnaire->investing_amount["investing_amount"]["years_old"] ?? '', 0),
                                                'old_val' => "investing_amount.age_today",
                                                'placeholder' => "0",
                                                ])

                                        </div>
                                        
                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group form-group-new mb-5 mb-lg-0">
                                            <h4 class="text-right font-arabic"><span class="color-red">*</span> مبلغ الاستثمار الشهري </h4>
                                            
                                            @include('frontend.inputs.input_group', [
                                                'type' => 'text', 
                                                'name' => 'investing_amount[monthly_amount]', 
                                                'value' => currency($user_questionnaire->investing_amount["investing_amount"]["monthly_amount"] ?? '', 0),
                                                'old_val' => "investing_amount.monthly_amount",
                                                ])

                                        </div>
                                        
                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group form-group-new mb-5 mb-lg-0">
                                            <h4 class="text-right font-arabic"><span class="color-red">*</span> مبلغ الاستثمار الأولي </h4>

                                            @include('frontend.inputs.input_group', [
                                                'type' => 'text', 
                                                'name' => 'investing_amount[initial_amount]',
                                                'value' => currency($user_questionnaire->investing_amount["investing_amount"]["initial_amount"] ?? '', 0),
                                                'old_val' => "investing_amount.initial_amount",
                                                ])
                                        </div>
                                    </div>

                                </div>
                                
                                
                            </div>
                            
                        </div>


                        <h3 class="text-right text-lg-right mb-3 mt-3">
                              <strong class="font-arabic">
                                في حالة عدم إدخاله يتم احتساب عمر التقاعد عند 60 عام
                              </strong>
                        </h3>

                            <div class="mt-4 text-lg-right text-center mt-5">
                                <button type="submit" class="btn-rtl btn btn-big btn-gradient btn-rad35 btn-primary with-arrow">
                                     <i class="fa fa-arrow-left"></i>
                                    <span class="d-inline-block">التالي</span>
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
            return false;
        }
     }
</script>
@endsection