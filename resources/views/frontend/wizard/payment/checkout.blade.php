@inject('request', 'Illuminate\Http\Request')
@extends('frontend.layouts.app')
@section('styles')
<script src="https://secure-global.paytabs.com/payment/js/paylib.js"></script>
<style type="text/css">
   @media screen and (max-width: 992px){
   .form-group.card-group-input .input-group {
   padding-right: 72px !important;
   }
   span.icon-2 img{
   max-width: 45px;
   }
   }

   .br-10{
      border-radius: 10px !important;
   }

   .icon-left{
    position: absolute;
    left: 10px;
    top: 50%;
    z-index: 99;
    transform: translateY(-50%);
   }


  .form-group.card-group-input .input-group {
    @if ($request->segment(1) == 'ar')
      padding-right: 180px;
      padding-left: unset;
		@else
      padding-left: 180px;
      padding-right: unset;
		@endif
    
  }
   
</style>
@endsection
@section('content')
<section class="slice py-5 fix-heigh">
   <div class="container">
      <div class="row row-grid">
         <!--  <div class="col-12 col-md-5 col-lg-6 order-md-2 text-center">
            <figure class="w-100">
                <img alt="Image placeholder" src="assets/img/svg/illustrations/illustration-3.svg" class="img-fluid mw-md-120">
            </figure>
            </div> -->
         <div class="col-12 col-md-12 col-lg-12  pr-md-5">
            <!-- Heading -->
            <p class="text-muted text-{{$align}} mb-0"><span><a class="bc__color" href="{{route('/',app()->getLocale() ?? 'ar')}}">{{ trans('lang.Home') }}</a></span> <span> / </span><span> <a class="bc__color" href="{{route('checkout',app()->getLocale() ?? 'ar')}}"> {{ trans('lang.checkout.title') }} </a></span></p>
            <h1 class="display-4 text-{{$align}} mb-3">
               <strong class="text-primary font-arabic">{{ trans('lang.plan.Gold Plan') }}</strong>
            </h1>
            <span class="clearfix"></span>
            <div id="paymentErrors"></div>
            <form action="{{ route('payment', locale()) }}" id="payform" method="POST">
               @csrf
               <div class="row">
                <div class="col-md-6 {{-- order-lg-2 order-1 --}}">
                   <div class="card-wrapper">
                      <div class="form-group card-group-input form-group-new">
                         <label for="" class="font-1 text-{{$align}} w-100 font-arabic">{{ trans('lang.checkout.Card information') }}</label>
                         <div class="input-group">
                            <div class="icon-{{$align}}">
                               <span class="icon-2">
                               <img src="{{ asset('frontend_assets/assets/img/new/checkout/visa.svg') }}" class="" alt="">
                               </span>
                               <span class="icon-1">
                               <img src="{{ asset('frontend_assets/assets/img/new/checkout/check.svg') }}" class="" alt="">
                               </span>
                            </div>
                            <input type="text" data-paylib="number" size="20" class="form-control input-big card-input text-{{$arrowAlign}}" style="direction: ltr" placeholder="3233    2000    2333    0000">
                         </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                           <div class="form-group form-group-new">
                              <div class="input-group">
                                 <input type="text" data-paylib="expmonth" size="2" class="form-control input-big text-{{$align}} font-arabic" placeholder="{{trans('lang.checkout.month')}}">
                              </div>
                           </div>
                        </div>
                         <div class="col-md-4">
                            <div class="form-group form-group-new">
                               <div class="input-group">
                                  <input type="text" data-paylib="expyear" size="4" class="form-control input-big text-{{$align}} font-arabic" placeholder="{{trans('lang.checkout.year')}}">
                               </div>
                            </div>
                         </div>
                         <div class="col-md-4">
                            <div class="form-group form-group-new">
                               <div class="input-group">
                                  <input type="text" data-paylib="cvv" size="4" class="form-control input-big text-{{$align}} font-arabic" placeholder="{{trans('lang.checkout.code')}}">
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="form-group form-group-new mb-0">
                      <div class="input-group">
                         @include('frontend.inputs.input_group', [
                         'placeholder' => trans('lang.checkout.name_in_card'), 
                         'type' => 'text', 
                         'name' => 'title', 
                         'value' => '',
                         'old_val' => "title",
                         'id' => "name",
                         'icon' => "no-icon",
                         ]
                         )
                      </div>
                   </div>
                </div>
                <div class="col-md-6 {{-- order-lg-1 order-2 --}}">
                    <div class="form-group form-group-new">
                      <label for="" class="font-1 text-{{$align}} w-100 font-arabic">{{trans('lang.checkout.summary')}}</label>
                      <div class="input-group">
                          <input type="text" name="coupon" class="form-control input-big text-{{$align}} font-arabic" placeholder="{{trans('lang.frontend_legal.legal_form_input_placeholder')}}" aria-label="" aria-describedby="basic-addon1">
                          <div class="input-group-prepend">
                            <button class="btn bg__1 btn_in_group font-arabic br-10" type="button">{{trans('lang.checkout.Apply')}}</button>
                          </div>
                      </div>
                    </div>
                    <div class="card card-shadow">
                      <div class="LIST__1">
                          <ul class="LIST__1_ul mb-0">
                            <li class="d-flex justify-content-between">
                              <span class="LIST__1_li_2 font-arabic">
                              {{ trans('lang.plan.Gold Plan') }}
                              </span>
                              <span class="LIST__1_li_1">
                              600
                              </span>
                            </li>
                            <li class="d-flex justify-content-between">
                              <span class="LIST__1_li_2 font-arabic">
                                {{ trans('lang.checkout.vat') }}
                              </span>
                              <span class="LIST__1_li_1">
                              90
                              </span>
                            </li>
                            <li class="d-flex justify-content-between">
                              <span class="LIST__1_li_2 font-arabic">
                              {{ trans('lang.checkout.Discount') }}
                              </span>
                              <span class="LIST__1_li_1">
                              -90
                              </span>
                            </li>
                            <li class="d-flex active justify-content-between">
                              <span class="LIST__1_li_2 font-arabic">
                              {{ trans('lang.plan.Gold Plan') }}
                              </span>
                              <span class="LIST__1_li_1">
                              600
                              </span>
                            </li>
                          </ul>
                      </div>
                    </div>
                </div>
               </div>
               <div class="row">
                  <div class="col-12">
                     <div class="mt-4 text-{{$align}}">
                        <button type="submit" class="btn-{{$align3letter}} btn  btn-big btn-gradient btn-rad35 btn-primary font-arabic with-arrow">
                        {{-- <i class="fa fa-arrow-left"></i> --}}
                        <span class="d-inline-block"> {{trans('lang.checkout.Pay Now')}}</span>
                        <i class="fa fa-arrow-{{$arrowAlign}}"></i>
                        </button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>
@endsection
@section('scripts')
<script type="text/javascript">
   var myform = document.getElementById('payform');
   paylib.inlineForm({
     'key': 'CDKMTH-MHT7H9-9Q22Q2-HVM69D',
     'form': myform,
     'autosubmit': true,
     'callback': function(response) {
       document.getElementById('paymentErrors').innerHTML = '';
       if (response.error) { 
         paylib.handleError($('#paymentErrors').html(`
         	<div class="alert alert-danger alert-dismissible fade show text-right font-arabic" role="alert">
   
                      <div class="alert-icon">
                        <i class="fas fa-times"></i>
                      </div>
   
                      <h5>
                       رسالة الخطأ
                     </h5>
                     <p class="text-dark"> `+response.errorText+`</p>
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
   
                   </div>`)); 
        	$('.slice').removeClass('fix-heigh');
       }
       else{
       	document.getElementById('paymentErrors').innerHTML = '';
       	$('.slice').addClass('fix-heigh')
       }
     }
   });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js" integrity="sha512-sR3EKGp4SG8zs7B0MEUxDeq8rw9wsuGVYNfbbO/GLCJ59LBE4baEfQBVsP2Y/h2n8M19YV1mujFANO1yA3ko7Q==" crossorigin="anonymous"></script>
<script>
   $(document).ready(function(){
      $('[data-paylib="number"]').inputmask({"mask": "9999 9999 9999 9999"}); //specifying options
      $('[data-paylib="expmonth"]').inputmask({"mask": "99"});
      $('[data-paylib="expyear"]').inputmask({"mask": "9999"});
      $('[data-paylib="cvv"]').inputmask({"mask": "999"});
   })
</script>
@endsection