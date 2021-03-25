@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app')

@section('styles')

@endsection

@section('content')
        

        
        {{-- <div class="col-md-4 login__container">
            <h2 class="login__heading {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">{{ trans('lang.login') }}</h2>
            <form method="POST" action="{{ route('authenticate', app()->getLocale()) }}">
                @csrf
                <div class="form-group" >
                    
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                </div>

                <button type="submit" class="button button__block">
                  {{ trans('lang.login') }}
                </button>
                    
            </form> --}}

<section class="slice py-7 fix-heigh">
  <div class="container">
    <div class="row row-grid flex-column-reverse flex-lg-row">
      
      <div class="col-12 col-lg-6 pr-md-5">
        <p class="{{$textAlign}} mb-0">
          <span>{{ trans('lang.Home') }}</span> <span> / </span><span>  {{ trans('lang.login') }} </span>
        </p>
        <h1 class="display-4 {{$textAlign}} {{$textAlignMd}}mb-3">
          <strong class="text-primary font-arabic">{{ trans('lang.login') }}</strong> 
        </h1>

        <h5 class="{{$textAlign}} mt-4 mb-4">تحكم باستثمار أموالك بشكل كامل باحترافية
تحكم باستثمار أموالك بشكل كامل باحترافية</h5>
        <span class="clearfix"></span>

        {{-- @if (session('error'))
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card-body">
                    <div class="alert alert-warning" role="alert">
                        {{ session('error')}} {{ \Session::put('error', '') }}
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        @endif --}}

        @include('frontend.notifications.warning')
        <form method="POST" action="{{ route('authenticate', app()->getLocale()) }}">
          @csrf
          <div class="form-group form-group-new">
            <div class="input-group">
              <input 
                type="text" 
                name="phone_number" 
                id="phone" 
                type="tel" 
                class="form-control input-big @error('phone_number') is-invalid @enderror"
                placeholder="{{ trans('lang.register_form.phone_number') }}"
                placeholder="رقم الهاتف"
                value=" {{ old('phone_number') }}" 
                >
              <div class="input-group-append">
                <span class="input-group-text">
                  <i data-feather="smartphone"></i>
                  <!-- <img alt="Image placeholder" src="assets/img/new/input/phone.svg" class="img-fluid" style=""> -->
                </span>
              </div>


              {{-- @error('phone_number')
                  <span class="invalid-feedback" role="alert" style="display: block;">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror --}}

            </div>
          </div>
          
          <div class="mt-4 text-lg-{{$align}} text-center">
            <button type="submit" class="{{$btnAlign}} btn btn-big btn-gradient btn-rad35 btn-primary with-arrow">
              {{-- @if ($request->segment(1) == 'ar')
                <i class="fa fa-arrow-left"></i>
              @endif --}}
              <span class="d-inline-block">{{ trans('lang.login') }}</span>
              <i class="fa fa-arrow-{{$arrowAlign}}"></i>
              
            </button>
          </div>
        </form>
      </div>
      <div class="col-12 col-lg-6 text-center">
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
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"></script>
<script type="text/javascript">
    
var telInput = $("#phone_");
  // errorMsg = $("#error-msg"),
  // validMsg = $("#valid-msg");

// initialise plugin
telInput.intlTelInput({

  allowExtensions: true,
  formatOnDisplay: true,
  autoFormat: true,
  autoHideDialCode: true,
  autoPlaceholder: true,
  defaultCountry: "auto",
  ipinfoToken: "yolo",

  nationalMode: false,
  numberType: "MOBILE",
  //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
  preferredCountries: ['sa'],
  preventInvalidNumbers: true,
  separateDialCode: false,
  initialCountry: "SA",
  geoIpLookup: function(callback) {
  $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
    var countryCode = (resp && resp.country) ? resp.country : "";
    callback(countryCode);
  });
},
   utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"
});

var reset = function() {
  telInput.removeClass("error");
};


telInput.blur(function() {
  reset();
  if ($.trim(telInput.val())) {
    if (telInput.intlTelInput("isValidNumber")) {
      // validMsg.removeClass("hide");
    } else {
      telInput.addClass("error");
      // errorMsg.removeClass("hide");
    }
    console.log($('.selected-dial-code').text());
  }
});

// on keyup / change flag: reset
telInput.on("keyup change", reset);

</script>
@endsection