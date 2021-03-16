@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app')

@section('styles')
	<style>
		.d-inline-flex{
			display: inline-flex;
		}

		.j-flex-end{
			justify-content: flex-end;
		}
	</style>
@endsection

@section('content')

<!-- Main content -->
<section class="slice py-7">
	<div class="container">
		<div class="row row-grid">
			<div class="col-12 col-md-7 col-lg-6 pr-md-5">
				<!-- Heading -->
				<p class="text-muted mb-4 text-{{$align}} font-arabic">
					<span>الرئيسية    </span><span> / </span><span>عن ذخر</span>
				</p>
				<h1 class="display-4 mb-3 text-{{$align}}">
					<strong class="text-primary font-arabic ">{{ trans('lang.plan.Gold Plan') }}</strong>
				</h1>
				<h3 class="font-arabic my-5 text-{{$align}}">
					هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشـــــكلة
					فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير
					.مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً
				</h3>
			</div>
			<div class="col-12 col-md-5 col-lg-6 text-center">
			</div>
		</div>
		<div class="card card-new h-border">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6">
						<h3 class="font-arabic text-{{$align}}">مميزات الباقة الذهبية</h3>
					</div>
					<div class="col-md-6 d-inline-flex j-flex-end">
						<h3 class="d-flex mb-0">
							<div class="{{-- d-inline-block --}} card-price">600</div>
						</h3>
						<div class="{{-- d-inline-flex --}} card-price-currency font-arabic mt-2"> ريال سعودي</div>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row no-gutters">
					<div class="col-md-6">
						<div class="plans__page plans__page_1 border-2p-{{$align}}">
							<div class="plan__img  text-{{$align}} mb-3"> 
								<img src="{{ asset('frontend_assets/assets/img/new/plan-page/plan-1.svg') }}" style="height: 80px" alt="">
							</div>
							<div class="plan__content font-arabic text-{{$align}}">
								<h4 class="font-arabic font-b text-primary text-{{$align}} mb-3">{{ trans('lang.plan.Advisory Session for 30 Mins') }}</h4>
								<p>هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.</p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="plans__page plans__page_2">
							<div class="plan__img text-{{$align}} mb-3"> 
								<img src="{{ asset('frontend_assets/assets/img/new/plan-page/plan-2.svg') }}" style="height: 80px" alt="">
							</div>
							<div class="plan__content font-arabic text-{{$align}}">
								<h4 class="font-arabic font-b text-primary text-{{$align}} mb-3">{{ trans('lang.plan.Advisory Session for 30 Mins') }}</h4>
								<p>هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.</p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="plans__page plans__page_3 border-2p-{{$align}}">
							<div class="plan__img text-{{$align}} mb-3"> 
								<img src="{{ asset('frontend_assets/assets/img/new/plan-page/plan-3.svg') }}" style="height: 80px" alt="">
							</div>
							<div class="plan__content font-arabic text-{{$align}}">
								<h4 class="font-arabic font-b text-primary text-{{$align}} mb-3">{{ trans('lang.plan.Advisory Session for 30 Mins') }}</h4>
								<p>هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.</p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="plans__page plans__page_4">
							<div class="plan__img text-{{$align}} mb-3"> 
								<img src="{{ asset('frontend_assets/assets/img/new/plan-page/plan-4.svg') }}" style="height: 80px" alt="">
							</div>
							<div class="plan__content font-arabic text-{{$align}}">
								<h4 class="font-arabic font-b text-primary text-{{$align}} mb-3">{{ trans('lang.plan.Advisory Session for 30 Mins') }}</h4>
								<p>هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="text-center mt-3">
			<a href="{{ route('checkout', locale()) }}" class="btn-{{$align3letter}} btn  btn-big btn-gradient btn-rad35 btn-primary with-arrow">
				{{-- <i class="fa fa-arrow-left"></i> --}}
				<span class="d-inline-block">{{ trans('lang.plan.Buy now') }}</span>
				<i class="fa fa-arrow-{{$arrowAlign}}"></i>
			</a>
		</div>
	</div>
</section>

@endsection