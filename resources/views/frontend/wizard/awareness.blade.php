@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app')

@section('styles')
@endsection

@section('content')
<section class="slice py-7 fix-heigh">
    <div class="container">


        <p class="text-{{$align}} mb-0">

          <span>  اتصل بنا</span><span> / </span><span>الرئيسية    </span>

        </p>
        
        

        <div class="row">
            <div class="col-lg-6"> 
                <h1 class="display-4 text-{{$align}} text-lg-{{$align}} mb-3">
                    <strong class="text-primary font-arabic">الوصول للحرية المالية</strong> 
                </h1>
                <h3 class="text-{{$align}} text-lg-{{$align}} mb-3 my-5">
                  <strong class="font-arabic">
                    ستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. ستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                  </strong>
              </h3>

                <div class="mt-4 text-lg-{{$align}} text-center">
                    <a href="{{ route('investing-amount', app()->getLocale()) }}" class="{{$btnAlign}} btn btn-big btn-gradient btn-rad35 btn-primary with-arrow">
                        {{--  <i class="fa fa-arrow-left"></i> --}}
                        <span class="d-inline-block">ارسال</span>
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