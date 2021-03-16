@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app')

@section('styles')
<style type="text/css">
.slice.homepage-section{
    background-image: url('{{ ($request->segment(1) == 'ar') ? asset('frontend_assets/assets/img/new/bg-home-3.svg') : asset('frontend_assets/assets/img/new/bg-home-en-4.svg') }}');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: bottom;
    height: calc(100vh - (82px + 83px));
}
.header-bottom-bg {
    display: none;
}

@media screen and (max-width: 992px)
{
    .header-bottom-bg {
        display: block;
    }
    .slice.homepage-section{
        background-image: unset;
        height: auto;
    }
}
</style>
@endsection

@section('content')

{{-- <section class="slice homepage-section" >
    <div class="container">
        <div class="row row-grid">
            <div class="col-12  col-lg-6 d-none d-lg-block text-center">
               
            </div>
            <div class="col-12  col-lg-6  pr-md-5">
                <!-- Heading -->

                <h6 class="mb-0 text-lg-right text-center font-3 font-arabic">ذخر عالمك للثراء</h6>
                
                <h1 class="h-big text-gray-light-1 font-arabic text-lg-right text-center">
                   {{ ($request->segment(1) == 'ar') ? althraa_site_description_ar() : althraa_site_description() }}
                </h1>

                <span class="clearfix"></span>
                        
                <div class="mt-4 text-lg-right text-center">
                    <a href="{{ route('login', app()->getLocale()) }}" class="btn-rtl btn btn-big btn-gradient btn-rad35 btn-primary">
                         <i class="fa fa-arrow-left"></i>
                        <span class="d-inline-block font-arabic">ابدأ الآن بدون مقابل</span>
                    </a>
                </div> 
            </div>
        </div>
    </div>
</section>

<div class="text-center d-block d-lg-none">
    <img src="{{ asset('frontend_assets/assets/img/new/bg-mobile.svg') }}" class="w-100" alt="">
</div> --}}





<section class="slice homepage-section" >
    <div class="container">
        <div class="row row-grid">
            <div class="col-12  col-lg-6  pr-md-5">
                <!-- Heading -->

                <h6 class="mb-0 text-lg-{{$align}} text-center font-3 font-arabic">ذخر عالمك للثراء</h6>
                
                <h1 class="h-big text-gray-light-1 font-arabic text-lg-{{$align}} text-center">
                    {{ trans('lang.Take control of your money') }}
                </h1>

                <span class="clearfix"></span>
                        
                <div class="mt-4 text-lg-{{$align}} text-center">
                    <a href="{{ route('login', app()->getLocale()) }}" class="{{$btnAlign}} btn btn-big btn-gradient btn-rad35 btn-primary">
                        {{-- <i class="fa fa-arrow-right"></i> --}}
                       <span class="d-inline-block font-arabic">{{ trans('lang.Start Now') }}</span>
                       <i class="fa fa-arrow-{{$arrowAlign}}"></i>
                   </a>
                </div>
               
            </div>
            <div class="col-12  col-lg-6 d-none d-lg-block text-center">
               
            </div>
            
        </div>

    </div>


</section>

<div class="text-center d-block d-lg-none">

    <img src="{{ asset('frontend_assets/assets/img/new/bg-mobile.svg') }}" class="w-100" alt="">
    
</div>

@endsection