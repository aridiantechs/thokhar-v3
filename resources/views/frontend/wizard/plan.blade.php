@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app')

@section('styles')
@endsection

@section('content')

<!-- Main content -->
<section class="slice py-7">
	<div class="container">
		<div class="row row-grid">
			<div class="col-12 col-md-5 col-lg-6 text-center">
			</div>
			<div class="col-12 col-md-7 col-lg-6 pr-md-5">
				<!-- Heading -->
				<p class="text-muted mb-4 text-right font-arabic">
					<span>{{ trans('lang.Home') }}    </span><span> / </span><span>{{ trans('lang.report.about_thokhor') }}</span>
				</p>
				<h1 class="display-4 mb-3 text-right">
					<strong class="text-primary font-arabic ">الباقة الذهبية</strong>
				</h1>
				<h3 class="font-arabic my-5 text-right">
					هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشـــــكلة
					فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير
					.مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً
				</h3>
			</div>
		</div>
		<div class="card card-new h-border">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6">
						<h3 class="d-flex mb-0">
							<div class="d-inline-block card-price">600</div>
						</h3>
						<div class="d-inline-flex card-price-currency font-arabic"> {{ trans('lang.report.SAR') }}</div>
					</div>
					<div class="col-md-6">
						<h3 class="font-arabic text-right">مميزات الباقة الذهبية</h3>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row no-gutters">
					<div class="col-md-6">
						<div class="plans__page plans__page_1 border-2p-right">
							<div class="plan__img  text-right mb-3"> 
								<img src="{{ asset('frontend_assets/assets/img/new/plan-page/plan-1.svg') }}" style="height: 80px" alt="">
							</div>
							<div class="plan__content font-arabic text-right">
								<h4 class="font-arabic font-b text-primary text-right mb-3">جلسة استشارية نصف ساعة</h4>
								<p>هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.</p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="plans__page plans__page_2">
							<div class="plan__img text-right mb-3"> 
								<img src="{{ asset('frontend_assets/assets/img/new/plan-page/plan-2.svg') }}" style="height: 80px" alt="">
							</div>
							<div class="plan__content font-arabic text-right">
								<h4 class="font-arabic font-b text-primary text-right mb-3">جلسة استشارية نصف ساعة</h4>
								<p>هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.</p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="plans__page plans__page_3 border-2p-right">
							<div class="plan__img text-right mb-3"> 
								<img src="{{ asset('frontend_assets/assets/img/new/plan-page/plan-3.svg') }}" style="height: 80px" alt="">
							</div>
							<div class="plan__content font-arabic text-right">
								<h4 class="font-arabic font-b text-primary text-right mb-3">جلسة استشارية نصف ساعة</h4>
								<p>هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.</p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="plans__page plans__page_4">
							<div class="plan__img text-right mb-3"> 
								<img src="{{ asset('frontend_assets/assets/img/new/plan-page/plan-4.svg') }}" style="height: 80px" alt="">
							</div>
							<div class="plan__content font-arabic text-right">
								<h4 class="font-arabic font-b text-primary text-right mb-3">جلسة استشارية نصف ساعة</h4>
								<p>هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="text-center mt-3">
			<a href="{{ route('checkout', locale()) }}" class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary with-arrow">
				<i class="fa fa-arrow-left"></i>
				<span class="d-inline-block">اشترك الآن</span>
			</a>
		</div>
	</div>
</section>

@endsection