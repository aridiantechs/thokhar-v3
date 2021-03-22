@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app')

@section('styles')
<style type="text/css">
</style>
@endsection

@section('content')
<section class="slice py-7">
    <div class="container">
        <div class="row row-grid">
            <div class="col-12 order-md-2 ">
                <p class="text-{{$align}} mb-0">
                    <span>{{ trans('lang.Home') }}    </span> <span> / </span><span>  {{ trans('lang.Contact Us') }} </span>
                </p>
                <h1 class="display-4 text-{{$align}} text-md-{{$align}} mb-3">
                    <strong class="text-primary font-arabic">{{ trans('lang.Contact Us') }} </strong> 
                </h1>
            </div>
        </div>
        <div class="row row-grid">
            <div class="col-12 col-md-7 col-lg-6 pr-md-5">
                <!-- Heading -->
                <!--  <p class="text-muted text-center text-md-{{$align}} mb-0"><span>Home</span><span> / </span><span>Login</span></p> -->
                <h3 class="text-{{$align}} text-md-{{$align}} mb-3 ">
                    <strong class="font-arabic">
                    نحن دائما على استعداد لتزويدك بأعلى مستوى من الدعم
                    العلاقة بيننا  وبين كل عميل مهمة .للغاية بالنسبة لنا
                    </strong>
                </h3>


                @include('frontend.notifications.success')
                @include('frontend.notifications.warning')
                <form method="POST" action="{{ route('contact', locale()) }}" class="mt-3">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-new">
                                        <div class="input-group">
                                            <input id="inputEmail" type="email" class="form-control input-big text-{{$align}}" name="email" value="" required autocomplete="email" placeholder="{{ trans('lang.frontend_contact.contact_email_placeholder') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-new">
                                        <div class="input-group">
                                            <input id="inputName" type="text" class="form-control input-big text-{{$align}}" name="name" value="" required autocomplete="email" placeholder="{{ trans('lang.frontend_contact.contact_name_placeholder') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-new mb-0">
                                        <div class="input-group">
                                            <textarea id="inputMessage" class="form-control input-big text-{{$align}}"  cols="30" rows="5" name="message" value="" required placeholder="{{ trans('lang.frontend_contact.contact_message_placeholder') }}"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" text-{{$align}} ">
                                <button type="submit" class="{{$btnAlign}} btn btn-big btn-gradient btn-rad35 btn-primary mt-4">
                                    {{-- <i class="fa fa-arrow-left"></i> --}}
                                    <span class="d-inline-block">{{ trans('lang.frontend_contact.contact_send') }}</span>
                                    <i class="fa fa-arrow-{{$arrowAlign}}"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-5 col-lg-6 text-center">
                <figure class="w-100">
                    <img alt="Image placeholder" src="{{ asset('frontend_assets/assets/img/new/contact-us/bg.svg') }}" class="img-fluid">
                </figure>
            </div>
            
        </div>
    </div>
</section>
@endsection