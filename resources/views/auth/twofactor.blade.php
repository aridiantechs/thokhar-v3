@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app', ['title' => $title1 ?? '2FA Auth'])

@section('styles')
<style type="text/css">
  .input-group .form-control:last-child, .input-group .form-control:first-child{
    border-radius: 10px !important
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
                    <span>  اتصل بنا</span><span> / </span><span>الرئيسية    </span>
                </p>
                <h1 class="display-4 text-{{$align}} text-md-{{$align}} mb-3">
                    <strong class="text-primary font-arabic">رمز التحقق</strong> 
                </h1>
                <h3 class="text-{{$align}} text-md-{{$align}} mb-3 ">
                    <strong class="font-arabic">
                    نحن دائما على استعداد لتزويدك بأعلى مستوى من الدعم
                    اللغاية بالنسبة لنا
                    </strong>
                </h3>
                <span class="clearfix"></span>

                @include('frontend.notifications.warning')
                
                <form method="POST" id="login__form" action="{{ route('verify.store', app()->getLocale()) }}">
                    @csrf
                    <div class="form-group form-group-new form-group-phone">
                      <div class="input-group d-flex {{-- justify-content-center justify-content-lg-end --}}">

                        <input type="tel" name="two_factor_code[]" maxlength="1" size="1" min="0" max="9" class="form-control v-code" pattern="[0-9]{1}"/>
                            
                        <input type="tel" name="two_factor_code[]" maxLength="1" size="1" min="0" max="9" class="form-control v-code" pattern="[0-9]{1}"/>

                        <input type="tel" name="two_factor_code[]" maxLength="1" size="1" min="0" max="9" class="form-control v-code" pattern="[0-9]{1}"/>

                        <input type="tel" name="two_factor_code[]" maxLength="1" size="1" min="0" max="9" class="form-control v-code" pattern="[0-9]{1}" />

                      </div>
                    </div>
                    <h3 class="text-center text-lg-{{$align}} mb-3 ">
                        <strong class="font-arabic" id="countdown">
                        إعادة الارسال خلال  <span id="minutes">{{ trans('lang.minutes') }}</span>:<span id="seconds">{{ trans('lang.seconds') }}</span> دقيقة *
                        </strong>
                    </h3>
                    <div class="mt-4 text-center text-lg-{{$align}}">
                        
                        <button type="submit" class="{{$btnAlign}} btn  btn-big btn-gradient btn-rad35 btn-primary with-arrow">
                        {{-- <i class="fa fa-arrow-left"></i> --}}
                        <span class="d-inline-block">{!! trans('lang.frontend.verify') !!}</span>
                        <i class="fa fa-arrow-{{$arrowAlign}}"></i>
                        </button>
                    </div>
                </form>


                <h5 class="mt-5 text-{{$align}} }}">
                  {{ trans('lang.frontend.two_factor_message') }}
                  <a href="{{ route('verify.resend', app()->getLocale()) }}">{{ trans('lang.frontend.two_factor_here') }}</a>.
                </h5>

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


$(document).ready(function() {
    const second = 1000,
      minute = second * 60,
      hour = minute * 60,
      day = hour * 24;

// let countDown = new Date('Sep 30, 2020 00:00:00').getTime(),
let countDown = new Date(convertDateForIos('{!! auth()->user()->two_factor_expires_at !!}')).getTime(),
    x = setInterval(function() {    

      let now = new Date().getTime(),
          distance = countDown - now;

      // document.getElementById('days').innerText = Math.floor(distance / (day)),
        // document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
        $('#minutes').text(Math.floor((distance % (hour)) / (minute))),
        // document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
        $('#seconds').text(Math.floor((distance % (minute)) / second));
        // document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);

      //do something later when date is reached
      if (distance < 0) {
        clearInterval(x);
        $('#countdown').html('<h2 class="text-danger">{{ trans('lang.code_expired') }}</h2>')
      }

    }, second)
});


</script>
@endsection