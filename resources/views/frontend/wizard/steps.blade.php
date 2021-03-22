@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app')

@section('styles')
@endsection

@section('content')

<section class="slice py-5 fix-heigh">
    <div class="container">
        <div class="row row-grid">
            <div class="col-12 col-md-12 col-lg-12 order-md-1 pr-md-5">
                <p class="text-{{$align}} mb-0">
                    <span>  اتصل بنا</span><span> / </span><span>الرئيسية    </span>
                </p>
                
                <h1 class="display-4 text-{{$align}} text-lg-{{$align}} mb-3">
                    <strong class="text-primary font-arabic">{{ trans('lang.3_steps_page') }}</strong> 
                </h1>

                <h3 class="mt-2 mb-5 text-{{$align}}">
                      {{ trans('lang.steps.help you with more value to your savings') }}
                </h3>

                <span class="clearfix"></span>
                <form>
                    <div class="row">                             
                        <div class="col-md-12">
                            <div class="row">

                                <div class="col-lg-4">
                                    <div class="text-center mb-0">
                                        <img src="{{ asset('frontend_assets/assets/img/new/steps/step-3.svg') }}" alt="" />
                                        <h5 class="mt-2">{{ trans('lang.steps.Answer our personal survey') }}</h5>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="text-center mb-5">
                                        <img src="{{ asset('frontend_assets/assets/img/new/steps/step-2.svg') }}" alt="" />
                                        <h5 class="mt-2">{{ trans('lang.steps.Financial Advisor will design investing plan tailored to your needs') }}</h5>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="text-center mb-5">
                                        <img src="{{ asset('frontend_assets/assets/img/new/steps/step-1.svg') }}" alt="" />
                                        <h5 class="mt-2">{{ trans('lang.steps.Start investing like a Pro right a way') }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 text-center ">
                        <a href="{{ route('wizard', locale()) }}" class="btn-{{$align3letter}} btn  btn-big btn-gradient btn-rad35 btn-primary with-arrow">
                            {{-- <i class="fa fa-arrow-left"></i> --}}
                            <span class="d-inline-block">{{ trans('lang.steps.Start Now') }}</span>
                            <i class="fa fa-arrow-{{$arrowAlign}}"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


@endsection