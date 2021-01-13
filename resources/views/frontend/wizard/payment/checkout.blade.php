@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app')

@section('styles')
<script src="https://secure-global.paytabs.com/payment/js/paylib.js"></script>
<style type="text/css">
  @media screen and (max-width: 992px){
    .form-group.card-group-input .input-group {
        padding-right: 72px;
    }
    span.icon-2 img{
      max-width: 45px;
    }
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

                    <p class="text-muted text-right mb-0"><span> ابدأ تجربتك</span><span> / </span><span>خطط الدفع</span></p>

                    <h1 class="display-4 text-right mb-3">
                        <strong class="text-primary font-arabic">الباقة الذهبية</strong>
                    </h1>
 

                    <span class="clearfix"></span>
                        <form action="{{ route('payment', locale()) }}" id="payform" method="POST">
                            @csrf
                        	<span id="paymentErrors"></span>
                            <div class="row">

                                <div class="col-md-6 order-lg-1 order-2">

                                  <div class="form-group form-group-new">
                                     <label for="" class="font-1 text-right w-100 font-arabic">ملخص الطلب</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <button class="btn bg__1 btn_in_group font-arabic" type="button">ارسال</button>
                                      </div>
                                      <input type="text" class="form-control input-big text-right font-arabic" placeholder="لديك كوبون ؟" aria-label="" aria-describedby="basic-addon1">
                                    </div>
                                  </div>

                                  <div class="card card-shadow">

                                    <div class="LIST__1">
                                      <ul class="LIST__1_ul mb-0">
                                        <li class="d-flex justify-content-between">
                                          <span class="LIST__1_li_1">
                                            600
                                          </span>
                                          <span class="LIST__1_li_2 font-arabic">
                                            الباقة الذهبية
                                          </span>
                                        </li>

                                        <li class="d-flex justify-content-between">
                                          <span class="LIST__1_li_1">
                                            90
                                          </span>
                                          <span class="LIST__1_li_2 font-arabic">
                                            ضريبة القيمة المضافة
                                          </span>
                                        </li>

                                        <li class="d-flex justify-content-between">
                                          <span class="LIST__1_li_1">
                                            -90
                                          </span>
                                          <span class="LIST__1_li_2 font-arabic">
                                            الخصم
                                          </span>
                                        </li>

                                        <li class="d-flex active justify-content-between">
                                          <span class="LIST__1_li_1">
                                            600
                                          </span>
                                          <span class="LIST__1_li_2 font-arabic">
                                            الباقة الذهبية
                                          </span>
                                        </li>

                                      </ul>
                                    </div>
                                    
                                  </div>
                                  
                                  
                                    
                                </div>

                                <div class="col-md-6 order-lg-2 order-1">

                                    <div class="card-wrapper">

                                      <div class="form-group card-group-input form-group-new">
                                            <label for="" class="font-1 text-right w-100 font-arabic">بيانات البطاقة</label>
                                            <div class="input-group">
                                                <div class="icon-right">
                                                    <span class="icon-1">
                                                        <img src="{{ asset('frontend_assets/assets/img/new/checkout/check.svg') }}" class="" alt="">
                                                    </span>
                                                    <span class="icon-2">
                                                        <img src="{{ asset('frontend_assets/assets/img/new/checkout/visa.svg') }}" class="" alt="">
                                                    </span>
                                                </div>

                                                <input type="text" data-paylib="number" size="20" class="form-control input-big card-input" placeholder="3233    2000    2333    0000">

                                            </div>
                                        </div>
                                            
                                        <div class="row">

                                            <div class="col-md-4">

                                            	<div class="form-group form-group-new">
                                                  	<div class="input-group">
                                                      	<input type="text" data-paylib="cvv" size="4" class="form-control input-big text-right font-arabic" placeholder="كود ">
                                                  	</div>
                                              	</div>

                                            </div>
                                            <div class="col-md-4">

                                              	<div class="form-group form-group-new">
                                                  	<div class="input-group">
                                                      	<input type="text" data-paylib="expyear" size="4" class="form-control input-big text-right font-arabic" placeholder="العام">
                                                  	</div>
                                              	</div>
                                              
                                            </div>
                                            <div class="col-md-4">

											<div class="form-group form-group-new">
												<div class="input-group">
													<input type="text" data-paylib="expmonth" size="2" class="form-control input-big text-right font-arabic" placeholder="الشهر">
												</div>
											</div>
                                              
                                            </div>
                                       
                                        </div>                                      
                                    </div>

                                    <div class="form-group form-group-new mb-0">
                                          <div class="input-group">
                                              <input type="text" class="form-control input-big text-right font-arabic" placeholder="الاسم على البطاقة">
                                          </div>
                                      </div>                                      
                                    
                                </div>

                            </div>


                            <div class="row">
                              <div class="col-12">
                                <div class="mt-4 text-right">
                                    <button type="submit" class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary font-arabic with-arrow">
                                       <i class="fa fa-arrow-left"></i>
                                      <span class="d-inline-block">ادفع الآن</span>
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
      paylib.handleError(document.getElementById('paymentErrors'), response); 
    }
  }
});
</script>
@endsection