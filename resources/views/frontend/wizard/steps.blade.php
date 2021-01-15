@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app')

@section('styles')
@endsection

@section('content')

<section class="slice py-5 fix-heigh">
    <div class="container">
        <div class="row row-grid">
            <div class="col-12 col-md-12 col-lg-12 order-md-1 pr-md-5">
                <p class="text-right mb-0">
                    <span>  اتصل بنا</span><span> / </span><span>الرئيسية    </span>
                </p>
                
                <h1 class="display-4 text-right text-lg-right mb-3">
                    <strong class="text-primary font-arabic">ثلاث خطوات</strong> 
                </h1>

                <h3 class="mt-2 mb-5 text-right">
                      تضمن لك استثمار أفضل لمدخراتك
                </h3>

                <span class="clearfix"></span>
                <form>
                    <div class="row">                             
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="text-center mb-5">
                                        <img src="{{ asset('frontend_assets/assets/img/new/steps/step-1.svg') }}" alt="" />
                                        <h5 class="mt-2">أبدأ بالاستثمار حالا</h5>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="text-center mb-5">
                                        <img src="{{ asset('frontend_assets/assets/img/new/steps/step-2.svg') }}" alt="" />
                                        <h5 class="mt-2">سوف يقوم مستشارك المالي بتصميم خطة استثمار تناسب احتياجاتك</h5>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="text-center mb-0">
                                        <img src="{{ asset('frontend_assets/assets/img/new/steps/step-3.svg') }}" alt="" />
                                        <h5 class="mt-2">قم بالإجابة عن أسئلتنا</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 text-center ">
                        <a href="{{ route('income', locale()) }}" class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary with-arrow">
                            <i class="fa fa-arrow-left"></i>
                            <span class="d-inline-block">إبدأ الان</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


@endsection