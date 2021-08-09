@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app')

@section('styles')
@endsection

@section('content')
<section class="slice py-7 fix-heigh">
    <div class="container">


        <p class="text-{{$align}} mb-0">

            <span><a class="bc__color" href="{{route('/',app()->getLocale() ?? 'ar')}}">{{ trans('lang.Home') }}</a></span> <span> / </span><span><a class="bc__color" href="{{route('awareness',app()->getLocale() ?? 'ar')}}">  {{ \Str::ucFirst(trans('lang.awareness.title')) }} </a></span>

        </p>
        
        

        <div class="row">
            <div class="col-lg-6"> 
                <h1 class="display-4 text-{{$align}} text-lg-{{$align}} mb-3">
                    <strong class="text-primary font-arabic">{{ trans('lang.awareness.Reach To The Financial Freedom')  }}</strong> 
                </h1>
                <h3 class="text-{{$align}} text-lg-{{$align}} mb-0">
                    <strong class="font-arabic">
                        {{ trans('lang.awareness.awareness_title') }}
                    </strong>                  
                </h3>
                <h3 class="text-{{$align}} text-lg-{{$align}} mb-5 mt-1">
                    <strong class="font-arabic">
                        {{ trans('lang.awareness.awareness_details') }}
                    </strong>                  
                </h3>

                <div class="text-lg-{{$align}} text-center">
                    <a href="{{ route('investing-amount', app()->getLocale()) }}" class="{{$btnAlign}} btn btn-big btn-gradient btn-rad35 btn-primary with-arrow">
                        {{--  <i class="fa fa-arrow-left"></i> --}}
                        <span class="d-inline-block">{{ trans('lang.question.next') }}</span>
						<i class="fa fa-arrow-{{$arrowAlign}}"></i>
                    </a>
                </div>

            </div>
            
            <div class="col-12 col-lg-6  text-center">
                <figure class="w-100">
                    <img alt="Image placeholder" src="{{ asset('frontend_assets/assets/img/new/Awareness/bg.svg') }}" class="img-fluid">
                </figure>
            </div>
            
        </div>

        

        
    </div>
</section>
@endsection