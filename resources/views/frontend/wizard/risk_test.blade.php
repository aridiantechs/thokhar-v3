@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app')

@section('styles')
<style>
    .risk-test .nav-tabs-wrapper.mobile .nav-tabs{
        justify-content: space-between;
    }
    .risk-test .nav-tabs-wrapper.mobile .nav-tabs .nav-item{
        position: static;
    }
    
    .risk-test .nav-tabs-wrapper > .horizontal-line{
        background: #B7CDCF;
        left: 5px;
        width: 99%;
        background: transparent linear-gradient(270deg, var(---2dd782) 0%, #FF5656 100%) 0% 0% no-repeat padding-box;
        background: transparent linear-gradient(270deg, #2DD782 0%, #FF5656 100%) 0% 0% no-repeat padding-box;
    }

    .risk-test .nav-tabs-wrapper.mobile .text-left.nav-link.active .step-text{
        width: 180px;
    }

    .risk-test .nav-tabs .nav-link .step-parent{
        border: 9px solid;
    }

    .risk-test .nav-tabs .nav-item:not(.sub-item) .nav-link.active .step-parent:before{

    }

    .risk-test  .nav-tabs .nav-link .step-parent{
        width: 35px;
        height: 35px;
    }

    .nav-item-risk-1 .step-parent{
        border-color: #F75B58 !important;
    }

    .nav-item-risk-2 .step-parent{
        border-color: #CF7460 !important;
    }

    .nav-item-risk-3 .step-parent{
        border-color: #8E9B6D !important;
    }

    .nav-item-risk-4 .step-parent{
        border-color: #65B476 !important;
    }

    .nav-item-risk-5 .step-parent{
        border-color: #2DD782 !important;
    }

    .risk-test .nav-tabs .nav-link .step-parent{
        background: #fff;      
    }

    .risk-test .nav-tabs .nav-link.active .step-parent{
            width: 40px;
            height: 40px;
            border:11px solid;
    }

    .LIST_UI li.BLUE{
        background-color: #01BAEF;
    }

    .LIST_UI_CIRCLE li{
        font-size: 19px;
    }

    .LIST_UI_CIRCLE li:before{
      	width: 25px;
		height: 25px;
		border-radius: 50%;
		top: 7px;
    }

    .LIST_UI_CIRCLE li.LBLUE:before{
    	background-color: #01BAEF;
    }

    .LIST_UI_CIRCLE li.BLUE:before{
    	background-color: #036EED;
    }

    .LIST_UI_CIRCLE li.GREEN:before{
    	background-color: #2DD782;
    }

    .LIST_UI_CIRCLE li.DARK:before{
    	background-color: #0B4F6C;
    }

    .text-lblue{
    	color:#01BAEF;
    }

    .text-blue{
    	color:#036EED;
    }

    .text-green{
    	color:#2DD782;
    }

    .text-ldark{
    	color:#0B4F6C;
    }
    .bottom-line{
        position: relative;
    }
    .bottom-line:after{
		content: "";
		position: absolute;
		width: 32px;
		height: 8px;
		background: #01BAEF;
		bottom: 0;
		right: 0;

    }

    .bottom-line.text-lblue:after{
    	background: #01BAEF;
    }

    .bottom-line.text-blue:after{
    	background: #036EED;
    }
 

    @media screen and (max-width: 991px){
      	#header-info{
			width: 100%;
		}

		.border-bottom-light{
			border-bottom: 0;
		}

		.border-right-light{
			border-right: 0;
		}

		.bottom-line:after{
			bottom: -18px;
		}
	}
	.modal-card {
	    background: #01baef;
	    border-radius: 20px;
	}
	.top_info__3_sub{
		font-size: 18px;
	}
</style>
@endsection

@section('content')
<section class="slice py-7 risk-test">
	<div class="container">
		<p class="text-right mb-0">
			<span>  اتصل بنا</span><span> / </span><span>الرئيسية    </span>
		</p>
		<div class="row">
			<div class="col-lg-8 order-2 order-lg-1 text-left float-lg-left text-left d-flex align-items-center risk-test-header">
				{{-- <button type="button" class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary d-none d-lg-inline-block">  
					<i class="fa fa-arrow-left"></i>
					<span class="d-inline-block font-arabic">تحميل التقرير</span>
				</button> --}}
				<div class="row ml-lg-3 ml-0  mt-5 mt-lg-0" id="header-info">
					<div class="col-4">
						<div>
							<p class="top_info__1">
								العمر حاليا
							</p>
							<span>
								<h3 class="top_info__2 mb-0">‏32 عام</h3>
							</span>
						</div>
					</div>
					<div class="col-4">
						<div>
							<p class="top_info__1">
								المبلغ الشهري
							</p>
							<span>
								<h3 class="top_info__2 mb-0">‏‏4 ألآف</h3>
							</span>
						</div>
					</div>
					<div class="col-4">
						<div>
							<p class="top_info__1">
								المبلغ المستثمر
							</p>
							<span>
								<h3 class="top_info__2 mb-0">‏‏100 ألف</h3>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 order-1 order-lg-2">
				<h1 class="display-4 text-right mb-3 mt-3 mt-lg-0"> <strong class="text-primary font-arabic">الإفصاح القانوني</strong> </h1>
			</div>
		</div>
		<h2 class="text-dark text-center my-5">
			هل أنت مستثمر مغامر ؟
		</h2>
		<div style="margin-top:135px !important">
			<div class="nav-tabs-wrapper mt-5 mobile ">
				<ul class="nav nav-tabs d-flex align-items-center">
					<li class="nav-item nav-item-risk-1">
						<a class="text-left nav-link" data-toggle="tab" href="#home">
							<span class="step-parent" data-bar="1"></span>
							<span class="step-text">
								<span>
								مستثمر طبيعي
								</span>
							</span>
						</a>
					</li>
					<li class="nav-item nav-item-risk-2">
						<a class="text-left nav-link" data-toggle="tab" href="#menu1">
							<span class="step-parent" data-bar="2"></span>
							<span class="step-text">
								<span>
								مستثمر طبيعي
								</span>
							</span>
						</a>
					</li>
					<li class="nav-item nav-item-risk-3">
						<a class="text-left nav-link active" data-toggle="tab" href="#menu1">
							<span class="step-parent" data-bar="3"></span>
							<span class="step-text">
								<span>
								مستثمر طبيعي
								</span>
							</span>
						</a>
					</li>
					<li class="nav-item nav-item-risk-4">
						<a class="text-left nav-link" data-toggle="tab" href="#menu1">
							<span class="step-parent" data-bar="4"></span>
							<span class="step-text">
								<span>
								مستثمر طبيعي
								</span>
							</span>
						</a>
					</li>
					<li class="nav-item nav-item-risk-5">
						<a class="text-left nav-link" data-toggle="tab" href="#menu1">
							<span class="step-parent" data-bar="5"></span>
							<span class="step-text">
								<span>
								مستثمر طبيعي
								</span>
							</span>
						</a>
					</li>
				</ul>
				<div class="horizontal-line">
				</div>
			</div>
		</div>
		<div class="card card-shadow mt-5">
			<div class="card-body">
				<div class="row border-bottom-light">
					<div class="col-12 col-lg-6">
						<h2 class="text-right d-none text-lblue bottom-line d-lg-block pb-4 mb-0 text-blue">توزيع الأصول الموصى به</h2>
					</div>
					<div class="col-12 col-lg-6">
						<h2 class="text-right d-none bottom-line d-lg-block pb-4 mb-0 text-lblue">التوقعات المالية</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-lg-6  text-center pt-lg-5 pt-0 border-right-light">
						<h2 class="text-right bottom-line mb-5 d-block d-lg-none text-blue">توزيع الأصول الموصى به</h2>
						<div class="text-center">
							<img src="{{ asset('frontend_assets/assets/img/new/risk-test/chart-1.svg') }}" class="img img-fluid" alt="">
						</div>
						<div class="row">
							<div class="col-md-6">
								<ul class="LIST__UL LIST_UI_CIRCLE text-right">
									<li class="BLUE">سهل ممتنع</li>
									<li class="GREEN"> عملي ويتيح التطبيق الفوري</li>
								</ul>
							</div>
							<div class="col-md-6">
								<ul class="LIST__UL LIST_UI_CIRCLE text-right">
									<li class="LBLUE">سهل ممتنع</li>
									<li class="DARK"> عملي ويتيح التطبيق الفوري</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-6 text-center pt-5">
						<h2 class="text-right  bottom-line mb-5 d-block d-lg-none text-blue">التوقعات المالية</h2>
						<div class="text-center">
							<img src="{{ asset('frontend_assets/assets/img/new/risk-test/chart-2.svg') }}" class="img-fluid img" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="info-card-1-1">
			<form action="" class="p-4">
				<div class="row">
					<div class="col-lg-3 d-flex align-items-center justify-content-center justify-content-lg-start order-2 order-lg-1">
						<button type="button" data-toggle="modal" data-target="#modal__1" class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary ">
							<i class="fa fa-arrow-left"></i>
							<span class="d-inline-block">إبدأ الآن</span>
						</button>
					</div>
					<div class="col-lg-9 order-1 order-lg-2">
						{{-- <div class="d-block d-lg-flex justify-content-end text-center text-lg-right">
							<div class="mb-3 d-block d-lg-none">
								<img src="{{ asset('frontend_assets/assets/img/new/risk-test/currency.svg') }}" alt="">
							</div>
							<div class="mb-4 mb-lg-0 w-100 mr-3 ">
								<h3 class="text-center text-lg-right top_info__3 mb-0">هل تريد تقريراً مخصصاً لك ؟</h3>
								<p class="text-center text-lg-right top_info__3_sub mb-0">
									تقرير مفصل يمنحك خطة استثمارية من الألف الى الياء<br>
									مع تواصل مباشر مع مستشار خبير
								</p>
							</div>
							<div class="d-none d-lg-inline-block">
								<img src="{{ asset('frontend_assets/assets/img/new/risk-test/currency.svg') }}" alt="">
							</div>
						</div> --}}
					</div>
				</div>
			</form>
		</div>
	</div>
</section>


<div class="modal fade modal-new" id="modal__1" tabindex="-1" role="dialog" aria-labelledby="modal__2Label" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl p-sm-1 pt-sm-0" role="document">
		<div class="modal-content modal-content-new text-center">
			<div class="modal-content-new">
				<div class="imgmd__1">
					<img alt="" src="{{ asset('frontend_assets/assets/img/new/modal/img-2.svg') }}" class="img-fluid modal-notify-img">
				</div>

				<div class="modal__lad text-center mt-4">
					<h3 class="font-arabic font-1 text-white">تم ارسال تقريرك الى بريدك الالكتروني</h3>
					<p class="font-2-sm mb-3">asbarakat@gmail.com</p>
				</div>

				<div class="modal-card">
					<div class="p-3">
						<div class="row">
							<div class="col-lg-3 d-flex align-items-center justify-content-center justify-content-lg-start order-2 order-lg-1">
								<a href="{{ route('plan', locale()) }}" class="btn-rtl btn  btn-big btn-light btn-rad35 btn-primary ">
									<i class="fa fa-arrow-left"></i>
									<span class="d-inline-block">إبدأ الآن</span>
								</a>
							</div>
							<div class="col-lg-9 order-1 order-lg-2">
								<div class="d-block d-lg-flex justify-content-end text-center text-lg-right">
									<div class="mb-3 d-block d-lg-none">
										<img class="modal-coin-img" src="{{ asset('frontend_assets/assets/img/new/risk-test/currency.svg') }}" alt="">
									</div>
									<div class="mb-4 mb-lg-0 w-100 mr-3 modal-message-card">
										<h3 class="text-center text-lg-right top_info__3 mb-0">هل تريد تقريراً مخصصاً لك ؟</h3>
										<p class="text-center text-white text-lg-right top_info__3_sub mb-0">
											تقرير مفصل يمنحك خطة استثمارية من الألف الى الياء<br>
											مع تواصل مباشر مع مستشار خبير
										</p>
									</div>
									<div class="d-none d-lg-inline-block">
										<img src="{{ asset('frontend_assets/assets/img/new/risk-test/currency.svg') }}" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
@endsection


@section('scripts')
<script>
    feather.replace({
        'width': '1em',
        'height': '1em'
    })
</script>

<script>
    feather.replace({
        'width': '1em',
        'height': '1em'
    });


    $(document).ready(function(){

        $('.nav-tabs-wrapper.desktop .nav-link .step-parent').each(function(i){
           
                var start_point = $(this).position().top;

                if((i+1) != $('.nav-tabs-wrapper.desktop .nav-link .step-parent').length){
                       
                       if($('.nav-tabs-wrapper.desktop .nav-link .step-parent').eq(i+1)){
                           var end_point = $('.nav-tabs-wrapper.desktop .nav-link .step-parent').eq(i+1);
                       $('.nav-tabs-wrapper.desktop .vertical-line').append(`<div class="step-parent-bar step-parent-bar-${i+1}" style="height:${(end_point.position().top - start_point)}px"></div>`);
                       }
                }     
        });

        $('.nav-tabs-wrapper.desktop .nav-item:not(.sub-item) .nav-link').click(function(){

           $('.nav-tabs-wrapper.desktop .step-parent-bar').removeClass('active').removeClass('success');
           $('.nav-tabs-wrapper.desktop .nav-item .nav-link').removeClass('success');
          
           
            var nav_item = $(this).closest('.nav-item');

            nav_item.prevAll().each(function(){

                var bar = $(this).find('.step-parent').data('bar');
                $(this).find('.nav-link').addClass('success');
                $('.nav-tabs-wrapper.desktop .step-parent-bar-'+bar).addClass('success');

            });

        });

        $('.nav-tabs-wrapper.desktop .nav-item.sub-item .nav-link').click(function(){

           $('.nav-tabs-wrapper.desktop .step-parent-bar').removeClass('active').removeClass('success');
           $('.nav-tabs-wrapper.desktop .nav-item .nav-link').removeClass('success');
          
            var nav_item = $(this).closest('.nav-item');

            $('.nav-tabs-wrapper.desktop .nav-item[data-id='+$(this).data('parent-id')+']').find('.step-parent').addClass('size-big');

            nav_item.prevAll().each(function(){

                var bar = $(this).find('.step-parent');
                // bar.addClass('size-big');

                bar = bar.data('bar');
                $(this).find('.nav-link').addClass('success');
                $('.nav-tabs-wrapper.desktop .step-parent-bar-'+bar).addClass('success');

            });

        });


	    $('.navbar-toggler').removeAttr('data-toggle');

	    $('.navbar-toggler').click(function(){
	        $('#modal-nav').modal('show');
	    });

    });

   


</script>
@endsection