@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app')

@section('content')

<div class="s-50"></div>

<section class="slice">
    <div class="container">

         <div class="row row-grid">
            <div class="col-12 order-md-2 ">
                  <p class="text-muted mb-0 text-{{$align}} font-arabic"><span>{{ trans('lang.Home') }}     </span><span> / </span><span>{{ \Str::lower(trans('lang.frontend_legal.legal')) }}</span></p>
                <h1 class="display-4 text-{{$align}} mb-3">
                    <a type="button" href="{{ route('login', locale()) }}" class="float-lg-{{$arrowAlign}} {{$btnAlign}} btn  btn-big btn-gradient btn-rad35 btn-primary d-none d-lg-inline-block">  
                        {{--  <i class="fa fa-arrow-left"></i> --}}
                        <span class="d-inline-block font-arabic">{{ trans('lang.Start Now') }}</span>
                        <i class="fa fa-arrow-{{$arrowAlign}}"></i>
                   </a>
                    <strong class="text-primary font-arabic"> {{ trans('lang.frontend_legal.legal') }}</strong> 
                </h1>
            </div>
        </div>

        <div class="row row-grid">
            <div class="col-12 col-lg-5">
               <div style="position: relative; height: 100%">
                    <h3 class="txt-blue-light font-arabic text-{{$align}} stick_to_bottom">
                        {{ trans('lang.frontend_legal.legal_head_text') }}
                    </h3>
               </div>
                
            </div>
            <div class="col-12  col-lg-7 text-center">                
                <figure class="w-100">
                    <img alt="Image placeholder" src="{{ asset('frontend_assets/assets/img/new/legal-disclosure/img-1.svg') }}" class="img-fluid">
                </figure>
            </div>
        </div>
        <div class="text-{{$align}} d-inline-block d-lg-none mt-5 w-100">
            <button type="button" class="btn-big btn-gradient btn-rad35 btn-primary">  
                 {{-- <i class="fa fa-arrow-left"></i> --}}
                <span class="d-inline-block font-arabic">{{ trans('lang.Start Now') }}</span>
                <i class="fa fa-arrow-{{$arrowAlign}}"></i>
           </button>
        </div>
 </div>


    </section> 

    <section>
        <div class="container">
            <div class="mb-5">                   
                <h3 class="font-arabic text-{{$align}} mt-lg-5 px-lg-5">
                    {{ trans('lang.frontend_legal.legal_paragraph') }}
                </h3>

                <h1 class="font-arabic text-{{$align}} text-dark my-5 px-lg-5">
                    {{ trans('lang.frontend_legal.legal_sub_heading1') }}
                </h1>

                <ul class="LIST__UL text-{{$align}} legal-li">
                    <li>{{ trans('lang.frontend_legal.legal_sub_points1') }}</li>

                    <li>{{ trans('lang.frontend_legal.legal_sub_points2') }}</li>
                    <li>{{ trans('lang.frontend_legal.legal_sub_points3') }}</li>
                    <li>{{ trans('lang.frontend_legal.legal_sub_points4') }}</li>
                    <li>{{ trans('lang.frontend_legal.legal_sub_points5') }}</li>
                </ul>
            </div>
        </div>

</section>


<div class="container">

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
                    <div class="col-md-6 d-flex align-items-center {{-- order-1 order-lg-1 justify-content-end --}} "> 
                        <h2 class="txt-blue-light font-arabic text-{{$align}} mb-3 mb-lg-0">
                            {{ trans('lang.frontend_legal.legal_form_heading') }}
                        </h2>
                    </div>
                    <div class="col-md-6  order-2 order-lg-1">
                         <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control text-{{$align}} font-arabic" placeholder="{{ trans('lang.frontend_legal.legal_form_input_placeholder') }}" aria-label="" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group-prepend">
                                <button type="submit" class="text-{{$align}}  btn  btn-big btn-gradient btn-rad35 btn-primary ml-auto mt-3">{{trans('lang.Subscribe Now')}}</button>
                            </div>
                         </form>
                    </div>                    
                </div>
                
            </div>

    </div>


    <div class="footer-last-section mt-5 py-7">
        
        <div class="text-center mb-4">
            <img src="{{ asset('frontend_assets/assets/img/new/logo-footer.svg') }}" alt="">
        </div>

        <ul class="nav mt-lg-0 ml-auto nav-social-icons text-center d-flex justify-content-center">
                    
            <li class="nav-item">
                <a class="nav-link instagram-a" href="#" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
             <li class="nav-item">
                <a class="nav-link facebook-a" href="#" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link snapchat-a" href="#" target="_blank">
                    <i class="fab fa-snapchat"></i>
                </a>
            </li>

        </ul>

    </div>
    
</div>

@endsection