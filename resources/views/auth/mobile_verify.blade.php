@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app', ['title' => $title1 ?? '2FA Auth'])

@section('styles')
<style type="text/css">
  .input-group .form-control:last-child, .input-group .form-control:first-child{
    border-radius: 10px !important
  }

  .focused .input-group .form-control{
    background: #FFFFFF 0% 0% no-repeat padding-box;
    box-shadow: 0px 0px 30px #0000001f !important;
  }

  .d-ltr{
    direction: ltr;
  } 
  .w-fit-content{
    width: fit-content;
  }
</style>
@endsection

@section('content')
<section class="slice py-0 py-lg-5 fix-heigh">
    <div class="container">
        <div class="row row-grid flex-column-reverse flex-lg-row">
            
            <div class="col-12 col-lg-6">
                <!-- Heading -->
                <p class="text-{{$align}} mb-0">
                  <span><a class="bc__color" href="{{route('/',app()->getLocale() ?? 'ar')}}">{{ trans('lang.Home') }}</a></span> <span> / </span><span> <a class="bc__color" href="{{route('login',app()->getLocale() ?? 'ar')}}"> {{ trans('lang.login') }} </a></span>
                </p>
                <h1 class="display-4 text-{{$align}} text-md-{{$align}} mb-3">
                    <strong class="text-primary font-arabic">{{ trans('lang.2fa.code') }}</strong> 
                </h1>
                <h3 class="text-{{$align}} text-md-{{$align}} mb-3 ">
                    <strong class="font-arabic">
                    نحن دائما على استعداد لتزويدك بأعلى مستوى من الدعم
                    اللغاية بالنسبة لنا
                    </strong>
                </h3>
                <span class="clearfix"></span>

                @include('frontend.notifications.warning')
                
                <form method="POST" class="login__form" action="{{ route('validate_phone', app()->getLocale()) }}">
                    @csrf
                    <div class="form-group form-group-new form-group-phone">
                      <div class="input-group d-flex d-ltr w-fit-content {{-- justify-content-center justify-content-lg-end --}}">

                        <input type="tel" name="mobile[]" maxlength="1" size="1" min="0" max="9" class="form-control v-code" pattern="[0-9]{1}"/>
                            
                        <input type="tel" name="mobile[]" maxLength="1" size="1" min="0" max="9" class="form-control v-code" pattern="[0-9]{1}"/>

                        <input type="tel" name="mobile[]" maxLength="1" size="1" min="0" max="9" class="form-control v-code" pattern="[0-9]{1}"/>

                        <input type="tel" name="mobile[]" maxLength="1" size="1" min="0" max="9" class="form-control v-code" pattern="[0-9]{1}" />

                      </div>
                    </div>
                   
                    <div class="mt-4 text-center text-lg-{{$align}}">
                        
                        <button type="submit" class="{{$btnAlign}} btn  btn-big btn-gradient btn-rad35 btn-primary with-arrow">
                        {{-- <i class="fa fa-arrow-left"></i> --}}
                        <span class="d-inline-block">{!! trans('lang.frontend.verify') !!}</span>
                        <i class="fa fa-arrow-{{$arrowAlign}}"></i>
                        </button>
                    </div>
                </form>

                {{-- <div class="login__or text-right ">
                  &mdash; {{ trans('lang.login_form.or') }} &mdash;
                </div> --}}
                {{-- <div class="regsiter__google text-right mt-4">
                    <a href="{{ route('login_with_another_account') }}">
                        <button class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary with-arrow">
                            {{ trans('lang.login_form.login_with_another_account') }}
                        </button>
                    </a>
                </div> --}}

            </div>
            <div class="col-12  col-lg-6 text-center">
              <!-- Image -->
              <figure class="w-100">
                  <img alt="Image placeholder" src="{{ asset('frontend_assets/assets/img/new/login-bg.svg') }}" class="img-fluid">
              </figure>
          </div>
        </div>
    </div>
</section>


@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/countdown/2.6.0/countdown.min.js"></script>

<script type="text/javascript">
    function InvalidMsg(textbox) {
        if (textbox.value == '') {
            textbox.setCustomValidity('{!! trans('lang.required_field') !!}');
        }
        else if (textbox.validity.typeMismatch){
            textbox.setCustomValidity('{!! trans('lang.valid_email') !!}');
        }
        else {
           textbox.setCustomValidity('');
        }
        return true;
    }


    $(function() {
      'use strict';

      var body = $('body');

      function goToNextInput(e) {
        var key = e.which,
          t = $(e.target),
          sib = t.next('input');

        if (key != 9 && (key < 48 || key > 57)) {
          e.preventDefault();
          return false;
        }

        if (key === 9) {
          return true;
        }

        if (!sib || !sib.length) {
          sib = body.find('input').eq(0);
        }
        sib.select().focus();

        // two-fa
        var count = 0;
        $('input[type=tel]').each(function(){
            
            if(parseInt($(this).val()) >= 0)
                count++;
            else
                count--;

            if(count == 4){
              $('#login__form').submit();
            }
        });
      }

      function onKeyDown(e) {
        var key = e.which;

        if (key === 9 || (key >= 48 && key <= 57)) {
          return true;
        }

        e.preventDefault();
        return false;
      }
      
      function onFocus(e) {
        $(e.target).select();
      }

      body.on('keyup', 'input', goToNextInput);
      body.on('keydown', 'input', onKeyDown);
      body.on('click', 'input', onFocus);

    })

    function resendSms(){
      // alert('sms resend')
    }

    function callNumber(){
      // alert('Calling')
    }
</script>




<script type="text/javascript">

{{-- {!! date("M d, Y h:m:s", strtotime('May 14, 2020 16:00:00')) !!} --}}
{{-- {!! auth()->user()->two_factor_expires_at !!} --}}

function convertDateForIos(date) {
    var arr = date.split(/[- :]/);
    date = new Date(arr[0], arr[1]-1, arr[2], arr[3], arr[4], arr[5]);
    return date;
}



</script>
@endsection