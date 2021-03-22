@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@php $direction = ($request->segment(1) == 'ar') ? 'right' : 'left' @endphp
<style type="text/css">

</style>
@endsection

@section('content')

   {{--  <div class="background_effect text-{{ $direction }}">
        <div class="container ">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="s-35"></div>
                    <p class="login_link text-center primary-link">
                        {{ trans('lang.frontend_about.about_us') }}
                    </p>
                    <h1 class="text-center page-heading text-dark">
                        {{ trans('lang.frontend_about.about_our_story') }}
                    </h1>

                    <div class="s-20"></div>
                </div>
            </div>
        </div>
        <div class="s-20"></div>
    </div>
        
        <div class="s-50"></div>

        <div class="container">
            <div class="row flex-column-reverse flex-md-row">
                <div class="col-md-4 col-sm-12 offset-lg-1 {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
                    <h1 class="page-heading invst_plan">
                        {{ trans('lang.frontend_about.about_coffee_started_it_all') }}
                    </h1>
                    <p>
                        {{ trans('lang.frontend_about.about_coffee_text') }}
                    </p>
                    
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <div class="" style="padding: 30px 10px;">
                        <img class="img img-responsive" src="{{ asset('frontend_assets/img/banner/coffee-illustrations.png') }}">
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="s-100"></div>


        <div class="container space-bottom">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <img class="img img-responsive" src="{{ asset('frontend_assets/img/banner/undraw_winners.png') }}">
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5 col-sm-12 {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
                    <h1 class="page-heading invst_plan">
                        {{ trans('lang.frontend_about.mission') }}
                    </h1>
                    <p>
                        {{ trans('lang.frontend_about.mission_text_report') }}
                    </p>
                    <ul>
                        <li><p><i class="fa fa-check-circle"></i>&nbsp{{ trans('lang.frontend_about.mission_li_1') }}</p></li>
                        <li><p><i class="fa fa-check-circle"></i>&nbsp{{ trans('lang.frontend_about.mission_li_2') }}</p></li>
                        <li><p><i class="fa fa-check-circle"></i>&nbsp{{ trans('lang.frontend_about.mission_li_3') }}</p></li>
                        <li><p><i class="fa fa-check-circle"></i>&nbsp{{ trans('lang.frontend_about.mission_li_4') }}</p></li>
                        
                    </ul>
                </div>
            </div>
        </div>

        <div class="s-100"></div>

        <div class="container">
            <div class="row flex-column-reverse flex-md-row">
                <div class="col-md-4 col-sm-12 offset-lg-1 {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
                    <h1 class="page-heading invst_plan">
                        {{ trans('lang.frontend_about.method') }}
                    </h1>
                    <p>
                        {{ trans('lang.frontend_about.method_text') }}
                    </p>
                    <ul>
                        <li><p><i class="fa fa-check-circle"></i>&nbsp{{ trans('lang.frontend_about.method_li_1') }}</p></li>
                        <li><p><i class="fa fa-check-circle"></i>&nbsp{{ trans('lang.frontend_about.method_li_2') }}</p></li>
                        <li><p><i class="fa fa-check-circle"></i>&nbsp{{ trans('lang.frontend_about.method_li_3') }}</p></li>
                        
                    </ul>
                </div>
                <div class="col-md-6 col-sm-12 ">
                    <div class="" style="padding: 30px 10px;">
                        <img class="img img-responsive" src="{{ asset('frontend_assets/img/banner/undraw_business.png') }}">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="background_effect_inverse">
            <div class="container">

                <div class="s-100"></div>

                <p class="login_link text-center primary-link">
                    {{ trans('lang.frontend_about.team') }}
                </p>
                <div class="s-35"></div>

                <div class="row text-{{ $direction }}">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">
                        <img src="{{ asset('frontend_assets/img/team/bakarman.png') }}" class="img img-fluid">
                        <p class="icon-p text_black m-3">
                            {{ trans('lang.frontend_about.bakarman') }}
                        </p>
                        <a href="https://www.linkedin.com/in/wbakarman" target="_blank"><i class="fa fa-linkedin fa-2x ml-3 mr-3 mb-5"></i></a>
                        <a href="https://twitter.com/wbakarman" target="_blank"><i class="fa fa-twitter fa-2x mr-3 mb-5"></i></a>
                    </div>

                    <div class="col-sm-3">
                        <img src="{{ asset('frontend_assets/img/team/alialsheri.png') }}" class="img img-fluid" style="border-radius: 5px;">
                        <p class="icon-p text_black m-3">
                            {{ trans('lang.frontend_about.ali') }}
                        </p>
                        <a href="https://www.linkedin.com/in/alialshehri" target="_blank"><i class="fa fa-linkedin fa-2x ml-3 mr-3 mb-5"></i></a>
                        <a href="https://twitter.com/CryptoAlshehri" target="_blank"><i class="fa fa-twitter fa-2x mr-3 mb-5"></i></a>
                    </div>
                    
                    
                </div>
            </div>
            <div class="s-100"></div>
        </div> --}}




<div class="footer-bg">
    <img src="{{ asset('frontend_assets/assets/img/new/footer-bg.svg') }}" class="w-100" alt="">
</div>
<!-- Main content -->
<section class="slice py-7">
    <div class="container">
        <div class="row row-grid">
            <div class="col-12 order-md-2 ">
                <p class="text-muted mb-4 text-{{$align}} font-arabic"><span> {{ trans('lang.Home') }}    </span><span> / </span><span>{{ trans('lang.about_thokhor') }}</span></p>
                <h1 class="display-4 text-lg-{{$align}} mb-3">
                    <a type="button" href="{{ route('login', locale()) }}" class="float-lg-{{$arrowAlign}} {{$btnAlign}} btn  btn-big btn-gradient btn-rad35 btn-primary">  
                    {{-- <i class="fa fa-arrow-left"></i> --}}
                        <span class="d-inline-block font-arabic">{{ trans('lang.Start Now') }}</span>
                        <i class="fa fa-arrow-{{$arrowAlign}}"></i>
                    </a>
                    <strong class="text-primary float-{{$align}} font-arabic">{{ trans('lang.about_thokhor') }}</strong> 
                </h1>
            </div>
        </div>
        <div class="row row-grid">
            <div class="col-12 col-lg-5">
                <h3 class="txt-blue-light font-arabic text-{{$align}}">
                    {{ trans('lang.frontend_about.about_section1_description') }}
                </h3>
            </div>
            <div class="col-12 col-lg-7 text-center">
                <figure class="w-100">
                    <img alt="Image placeholder" src="{{ asset('frontend_assets/assets/img/new/about/img-1.svg') }}" class="img-fluid">
                </figure>
            </div>
        </div>
        <div class="row  mt-5 pt-0 pt-lg-5">
            <div class="col-12 col-lg-8 {{--  order-1 order-lg-2 --}}">
                <h1 class="h-big font-arabic text-primary text-{{$align}}">
                    {{ trans('lang.frontend_about.why_thokar') }}
                </h1>
                <span class="clearfix"></span>
                <h3 class="txt-blue-light-1 font-arabic text-{{$align}}">
                    {{ trans('lang.frontend_about.why_thokar_desc') }}
                </h3>
                <div class="py-5 d-block d-lg-none">
                    <figure class="w-100">
                        <img alt="Image placeholder" src="{{ asset('frontend_assets/assets/img/new/about/about-2.png') }}" class="img-fluid w-100">
                    </figure>
                </div>
                {{-- <h3 class="txt-gray-light font-arabic text-{{$align}} mt-3">
                    عند الاستثمار بمبلغ 100 ألف ريال لمدة 25 سنة بنفسك ستحصل على أرباح تقدر بـ 330 ألف ريال ولكن في حالة الاستثمار عن طريق صناديق الاستثمار عند دفع 2% فقط ستفقد اكثر من نصف قيمة أرباحك بنهاية المدة 
                </h3> --}}
            </div>
            <div class="col-12 col-lg-4{{--  order-2 order-lg-1 --}} d-none d-lg-block">
                <div class="py-5">
                    <figure class="w-100">
                        <img alt="Image placeholder" src="{{ asset('frontend_assets/assets/img/new/about/about-2.png') }}" class="img-fluid w-100">
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <section class="section" style="background:url('{{ asset('frontend_assets/assets/img/new/about/bg-1.svg') }}');background-size: 100%;
        object-fit: cover;background-repeat: no-repeat;">
        <div class="container">
            <div class="mb-5">
                <h1 class="h-big font-arabic text-primary text-center">
                    {{ trans('lang.frontend_about.about_coffee_started_it_all') }}
                </h1>
                <h3 class="font-arabic text-center mt-5 px-5">
                    {{ trans('lang.frontend_about.about_coffee_text') }}
                </h3>
            </div>
            <div class="w-100 text-center mt-5 pt-5">
                <img alt="Image placeholder" src="{{ asset('frontend_assets/assets/img/new/about/img-3.svg') }}" class="img-fluid">
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <h1 class="h-big font-arabic text-success text-{{$align}}">
                    {{ trans('lang.frontend_about.mission') }}
                </h1>
                <h3 class="txt-blue-light font-arabic text-{{$align}} mb-5">
                    {{ trans('lang.frontend_about.mission_text') }}
                </h3>
                <ul class="LIST__UL text-{{$align}}">
                    <li>{{ trans('lang.frontend_about.mission_li_1') }}</li>
                    <li> {{ trans('lang.frontend_about.mission_li_2') }}</li>
                    <li> {{ trans('lang.frontend_about.mission_li_3') }}</li>
                    <li>
                        {{ trans('lang.frontend_about.mission_li_4') }}
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-6 text-center d-none d-lg-block">
                <figure class="w-100">
                    <img alt="Image placeholder" src="{{ asset('frontend_assets/assets/img/new/about/img-4.svg') }}" class="img-fluid">
                </figure>
            </div>
        </div>
    </div>
    <div class="my-5 py-lg-5">
        <div class="container">
            <div class="row row-grid">
                <div class="col-12 col-md-6 col-lg-6 text-center d-none d-lg-block">
                    <figure class="w-100">
                        <img alt="Image placeholder" src="{{ asset('frontend_assets/assets/img/new/about/img-5.svg') }}" class="img-fluid">
                    </figure>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <h1 class="h-big font-arabic text-primary text-{{$align}}">
                        {{ trans('lang.frontend_about.investment') }}
                    </h1>
                    <h3 class="txt-blue-light font-arabic text-{{$align}} mb-5">
                        {{ trans('lang.frontend_about.investment_text') }} 
                    </h3>
                    <ul class="LIST__UL text-{{$align}}">
                        <li>{{ trans('lang.frontend_about.investment_li_1') }}</li>
                        <li> {{ trans('lang.frontend_about.investment_li_2') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h1 class="h-big font-arabic text-primary text-{{$align}} mb-4">
            {{ trans('lang.frontend_about.team') }}
        </h1>
        <div class="team">
            <div class="row row-grid flex-column-reverse flex-lg-row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="team-member">
                        <div class="row">
                            <div class="col-4">
                                <div class="team__avatar">
                                    <img src="{{ asset('frontend_assets/assets/img/new/about/team/alialsheri.png') }}" class="w-100" alt="">
                                </div>
                            </div>
                            <div class="col-8 d-block d-flex align-items-end justify-content-end">
                                <div class="team__info m{{$alignShort}}-auto">
                                    <h3 class="txt-blue-light font-arabic text-{{$align}} mb-2">
                                        {{ trans('lang.frontend_about.team_member_1') }}
                                    </h3>
                                    <ul class="nav mt-lg-0 ml-auto nav-social-icons text-{{$align}} d-flex justify-content-start pr-0">
                                        <li class="nav-item">
                                            <a class="nav-link linkedin-a" href="#" target="_blank">
                                            <i class="fab fa-linkedin"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link snapchat-a" href="#" target="_blank">
                                            <i class="fab fa-snapchat"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link twitter-a" href="#" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="team-member">
                        <div class="row">
                            <div class="col-4">
                                <div class="team__avatar">
                                    <img src="{{ asset('frontend_assets/assets/img/new/about/team/alialsheri.png') }}" class="w-100" alt="">
                                </div>
                            </div>
                            <div class="col-8 d-block d-flex align-items-end justify-content-end">
                                <div class="team__info m{{$alignShort}}-auto">
                                    <h3 class="txt-blue-light font-arabic text-{{$align}} mb-2">
                                        {{ trans('lang.frontend_about.team_member_2') }}
                                    </h3>
                                    <ul class="nav mt-lg-0 ml-auto nav-social-icons text-{{$align}} d-flex justify-content-start pr-0">
                                        <li class="nav-item">
                                            <a class="nav-link linkedin-a" href="#" target="_blank">
                                            <i class="fab fa-linkedin"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link snapchat-a" href="#" target="_blank">
                                            <i class="fab fa-snapchat"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link twitter-a" href="#" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="subscription-section mt-5 pt-5">
            <div class="subscription-bar">
                
                {{-- For desktop --}}
                <div class="d-none d-md-block">
                    <div class="row">
                        <div class="col-md-6 d-flex align-items-center {{-- order-1 order-lg-1 justify-content-end --}} "> 
                            <h3 class="txt-blue-light font-arabic text-{{$align}} mb-3 mb-lg-0">
                                {{ trans('lang.frontend_legal.legal_form_heading') }}
                            </h3>
                        </div> 
                        <div class="col-md-6 ">
                             <form action="">
                                <div class="form-group form-group-new mb-0">                            
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="submit" class="btn bg__1 btn_in_group font-arabic">{{trans('lang.Subscribe Now')}}</button>
                                        </div>
                                        <input type="text" class="form-control text-{{$align}} font-arabic" placeholder="{{ trans('lang.frontend_legal.legal_form_input_placeholder') }}" aria-label="" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                 
                             </form>
                        </div>                       
                    </div>
                </div>

                {{-- For mobile --}}
                <div class="row d-block d-md-none">
                    <div class="col-md-6 d-flex align-items-center {{-- order-1 order-lg-1 justify-content-end  --}}"> 
                        <h2 class="txt-blue-light font-arabic text-{{$align}} mb-3 mb-lg-0">
                            النشرة البريدية
                        </h2>
                    </div>
                    <div class="col-md-6  order-2 order-lg-1">
                         <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control text-{{$align}} font-arabic" placeholder="لديك كوبون ؟" aria-label="" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group-prepend">
                                <button type="submit" class="text-{{$align}}  btn  btn-big btn-gradient btn-rad35 btn-primary ml-auto mt-3">{{trans('lang.Subscribe Now')}}</button>
                            </div>
                         </form>
                    </div>                    
                </div>
                
            </div>
        </div>
        <div class="footer-last-section mt-5 pt-5">
            <div class="text-center mb-4">
                <img src="{{ asset('frontend_assets/assets/img/new/logo-footer.svg') }}" alt="">
            </div>
            <ul class="nav mt-lg-0 ml-auto nav-social-icons text-center d-flex justify-content-center">
                <li class="nav-item">
                    <a class="nav-link linkedin-a" href="#" target="_blank">
                    <i class="fab fa-linkedin"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link snapchat-a" href="#" target="_blank">
                    <i class="fab fa-snapchat"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link twitter-a" href="#" target="_blank">
                    <i class="fab fa-twitter"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>



@endsection