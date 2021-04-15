@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app')

@section('styles')
<link rel="stylesheet" href="{{url('/')}}/frontend_assets/assets/css/modern-tabs.css">
<style>
    
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
		@if ($request->segment(1) == 'ar')
			right: 0;
		@else
			left: 0;
		@endif

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
		.nav-tabs .nav-item:not(.sub-item) .nav-link.active .step-text span {
		    font-size: 13px;
		}
		.risk-test .nav-tabs-wrapper.mobile .nav-link.active .step-text {
		    width: 110px !important;
		}
		.report .nav-tabs-wrapper > .horizontal-line {
		    width: 98% !important;
		}

		.no-m-3{
			margin-top: 0 !important;
		}
		.no-p-3{
			padding-top:0  !important; 
		}
	}
	.modal-card {
	    background: #01baef;
	    border-radius: 20px;
	}
	.top_info__3_sub{
		font-size: 18px;
	}

	.no-m-3{
		margin-top: 3rem;
	}

	.no-p-3{
		padding-top: 3rem;
	}

	.risk-test .nav-tabs-wrapper.mobile .text-right.nav-link.active .step-text {
		width: 180px;
	}

	.nav-tabs-wrapper.mobile .text-right.nav-link.active .step-text {
		display: block !important;
		position: absolute;
		bottom: 100%;
		width: 150px;
		bottom: calc(100% + 20px);
		display: block;
		left: 50%;
		transform: translateX(-50%);
	}

	.flex-row-r{
		flex-flow: row-reverse;
	}

	
	.risk-test .nav-tabs-wrapper.mobile .nav-tabs {
	    padding-right: 0;
	}

	.nav-tabs-wrapper.mobile .nav-tabs .nav-item:not(.sub-item) .nav-link.active .step-text span{
	    width: 100%;
	}
	.w-custom{
		position: relative;
		top: -170px;
		margin: auto;
		width: fit-content
	}

	.report .nav-tabs-wrapper > .horizontal-line{
        background: #B7CDCF;
        left: 5px;
        width: 99%;
        background: transparent linear-gradient(270deg, var(---2dd782) 0%, #FF5656 100%) 0% 0% no-repeat padding-box;
        @if ($request->segment(1) == 'en')
			background: transparent linear-gradient(270deg, #FF5656 0%,#2dd782 100%) 0% 0% no-repeat padding-box;
        @else
            background: transparent linear-gradient(270deg, #2DD782 0%, #FF5656 100%) 0% 0% no-repeat padding-box;
		@endif
    }
</style>
@endsection

@section('content')
<section class="slice py-7 risk-test">
	<div class="container">
		<p class="text-{{$align}} mb-0">
			<span><a class="bc__color" href="{{route('/',app()->getLocale() ?? 'ar')}}">{{ trans('lang.Home') }}</a></span> <span> / </span><span> <a class="bc__color" href="{{route('risk-test',app()->getLocale() ?? 'ar')}}"> {{ trans('lang.question_headings.Risk Test') }} </a></span>
		</p>
		<div class="row">
			<div class="col-lg-5 {{-- order-1 order-lg-2 --}}">
				<h1 class="display-4 text-{{$align}} mb-3 mt-3 mt-lg-0"> <strong class="text-primary font-arabic">{{ trans('lang.free_report') }}</strong> </h1>
			</div>
			<div class="col-lg-7 order-2 order-lg-1 text-{{$align}} float-lg-{{$align}} text-{{$align}} d-flex align-items-center risk-test-header">
				{{-- <button type="button" class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary d-none d-lg-inline-block">  
					<i class="fa fa-arrow-left"></i>
					<span class="d-inline-block font-arabic">تحميل التقرير</span>
				</button> --}}
				<div class="row ml-lg-3 ml-0  mt-5 mt-lg-0 w-100" id="header-info">
					<div class="col-4">
						<div>
							<p class="">
								{{ trans('lang.report.current_age') }}
							</p>
							<span>
								<h3 class="top_info__2 mb-0">‏{{ $current_age ?? 0 }}</h3>
							</span>
						</div>
					</div>
					<div class="col-4">
						<div>
							<p class="">
								{{ trans('lang.question.Monthly investing Payment') }}
							</p>
							<span>
								<h3 class="top_info__2 mb-0">‏‏{{ currency($investing_amount['investing_amount']['monthly_amount'] ?? 0) }} </h3>
							</span>
						</div>
					</div>
					<div class="col-4">
						<div>
							<p class="">
								{{ trans('lang.financial_plan.Invested amount') }}
							</p>
							<span>
								<h3 class="top_info__2 mb-0">{{ currency($investing_amount['investing_amount']['initial_amount'] ?? 0) }}</h3>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<h2 class="text-dark text-center my-5">
			{{ trans('lang.report.Are you risk taker') }}
		</h2>
		<div style="margin-top:100px !important">
			<div class="row">
				<div class="col-1"></div>
				<div class="col-10">

					<div class="report m-top-p5">
						<div class="nav-tabs-wrapper mt-5 mobile ">
							<ul class="nav nav-tabs d-flex align-items-center">
								<li class="nav-item nav-item-risk-5">
									<a class="text-{{$align}} nav-link " onclick="indicator('Very_Conservative_Investor')" data-toggle="tab" href="#very_conservative">
										<span class="step-parent" data-bar="1"></span>
										<span class="step-text">
											<span>
											{{ trans('lang.report.very_conservative') }}
											</span>
										</span>
										
									</a>
								</li>
								<li class="nav-item nav-item-risk-4">
									<a class="text-{{$align}} nav-link " onclick="indicator('Conservative_Investor')" data-toggle="tab" href="#">
										<span class="step-parent" data-bar="2"></span>
										<span class="step-text">
											<span>
												{{ trans('lang.report.conservative') }}
											</span>
										</span>
										
									</a>
								</li>
								
								<li class="nav-item nav-item-risk-3">
									<a class="text-{{$align}} nav-link active" onclick="indicator('Natrual_Investor')" data-toggle="tab" href="#">
										<span class="step-parent" data-bar="3"></span>
										<span class="step-text">
											<span>
												{{ trans('lang.report.natural') }}
											</span>
										</span>
										
									</a>
								</li>
								<li class="nav-item nav-item-risk-2">
									<a class="text-{{$align}} nav-link " onclick="indicator('Aggressive_Investor')" data-toggle="tab" href="#">
										<span class="step-parent" data-bar="4"></span>
										<span class="step-text">
											<span>
												{{ trans('lang.report.agressive') }}
											</span>
										</span>
										
									</a>
								</li>
								<li class="nav-item nav-item-risk-1">
									<a class="text-{{$align}} nav-link " onclick="indicator('Very_Aggressive_Investor')" data-toggle="tab" href="#">
										<span class="step-parent" data-bar="5"></span>
										<span class="step-text">
											<span>
											{{ trans('lang.report.very_agressive') }}
											</span>
										</span>
										
									</a>
								</li>
							</ul>
							<div class="horizontal-line">
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>

		<div class="tab-content">

			<div id="very_conservative" class="container tab-pane active">
				<div class="card card-shadow no-m-3">
					<div class="card-body">
						<div class="row border-bottom-light">
							<div class="col-12 col-lg-6">
								<h2 class="text-{{$align}} d-none bottom-line d-lg-block pb-4 mb-0 text-lblue"> {{ trans('lang.report.Financial Projections') }}</h2>
							</div>
							<div class="col-12 col-lg-6">
								<h2 class="text-{{$align}} d-none text-lblue bottom-line d-lg-block pb-4 mb-0 text-blue"> {{ trans('lang.report.Recommended asset allocation') }}</h2>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 text-center no-p-3">
								<h2 class="text-{{$align}}  bottom-line mb-5 d-block d-lg-none text-blue">{{ trans('lang.report.Financial Projections') }}</h2>
								<h1 id="value_at_retirement_b">
									{{ currency(end($value_at_retirement)['value_end_year'] ?? 0) }}
								</h1>
								<span>
									{{ trans('lang.current_state.at_age') }} <span id="age">60</span> {{ trans('lang.current_state.you_will_have_savings_balance_of') }}  <span id="value_at_retirement">{{ currency(end($value_at_retirement)['value_end_year'] ?? 0) }}</span> 
								<div class="text-center">
									<canvas id="myChart" width="400" height="250"></canvas>
								</div>
							</div>
							<div class="col-12 col-lg-6  text-center pt-lg-5 pt-0 border-{{$align}}-light">
								<h2 class="text-{{$align}} bottom-line mb-5 d-block d-lg-none text-blue"> {{ trans('lang.report.Recommended asset allocation') }}</h2>
								<div class="text-center">
									
									<canvas id="donut_chart" width="250" height="250"></canvas>

								</div>

								<div class="w-custom text-center">
									<h5>{{ trans('lang.financial_plan.Invested amount') }}</h5>
									<span style="font-size: 2rem;">{{ $investing_amount['investing_amount']['initial_amount'] ?? 0 }}</span>
									<h5>{{ trans('lang.report.SAR') }}</h5>
								</div>

								<div class="row">
									<div class="col-md-6">
										<ul class="LIST__UL LIST_UI_CIRCLE text-{{$align}}">
											<li class="BLUE">{!! trans('lang.report.cash_and_equivalent') !!}</li>
											<li class="DARK">{!! trans('lang.report.fix_income')  !!}</li>							
										</ul>
									</div>
									<div class="col-md-6">
										<ul class="LIST__UL LIST_UI_CIRCLE text-{{$align}}">
											<li class="LBLUE">{!! trans('lang.report.equities') !!}</li>
											<li class="GREEN">{!! trans('lang.report.alternative_investment') !!}</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			
		</div>
		<div class="info-card-1-1">
			<form action="" class="p-4">
				<div class="row">
					{{-- <div class="col-lg-9">
						<div class="d-block d-lg-flex justify-content-end text-center text-lg-{{$align}}">
							<div class="mb-3 d-block d-lg-none">
								<img src="{{ asset('frontend_assets/assets/img/new/risk-test/currency.svg') }}" alt="">
							</div>
							<div class="mb-4 mb-lg-0 w-100 mr-3 ">
								<h3 class="text-center text-lg-{{$align}} top_info__3 mb-0">هل تريد تقريراً مخصصاً لك ؟</h3>
								<p class="text-center text-lg-{{$align}} top_info__3_sub mb-0">
									تقرير مفصل يمنحك خطة استثمارية من الألف الى الياء<br>
									مع تواصل مباشر مع مستشار خبير
								</p>
							</div>
							<div class="d-none d-lg-inline-block">
								<img src="{{ asset('frontend_assets/assets/img/new/risk-test/currency.svg') }}" alt="">
							</div>
						</div>
					</div> --}}
					<div class="col-lg-3 d-flex justify-content-center justify-content-lg-start">
						<button type="button" data-toggle="modal" data-target="#modal__1" class="btn-{{$align3letter}} btn  btn-big btn-gradient btn-rad35 btn-primary ">
							{{-- <i class="fa fa-arrow-{{$align}}"></i> --}}
							<span class="d-inline-block">{{ trans('lang.question.next') }}</span>
							<i class="fa fa-arrow-{{$arrowAlign}}"></i>
						</button>
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
					<p class="font-2-sm mb-3">{{ auth()->user()->email }}</p>
				</div>

				<div class="modal-card">
					<div class="p-3">
						<div class="row">
							<div class="col-lg-3 d-flex align-items-center justify-content-center justify-content-lg-start order-2 order-lg-1">
								<a href="{{ route('plan', locale()) }}" class="{{$btnAlign}} btn  btn-big btn-light btn-rad35 btn-primary ">
									{{-- <i class="fa fa-arrow-{{$align}}"></i> --}}
									<span class="d-inline-block">إبدأ الآن</span>
									<i class="fa fa-arrow-{{$arrowAlign}}"></i>
								</a>
							</div>
							<div class="col-lg-9 {{-- order-1 order-lg-2 --}}">
								<div class="d-block d-lg-flex justify-content-end text-center text-lg-{{$align}}">
									
									<div class="d-none d-lg-inline-block">
										<img src="{{ asset('frontend_assets/assets/img/new/risk-test/currency.svg') }}" alt="">
									</div>
									<div class="mb-4 mb-lg-0 w-100 mr-3 modal-message-card">
										<h3 class="text-center text-lg-{{$align}} top_info__3 mb-0">هل تريد تقريراً مخصصاً لك ؟</h3>
										<p class="text-center text-white text-lg-{{$align}} top_info__3_sub mb-0">
											تقرير مفصل يمنحك خطة استثمارية من الألف الى الياء<br>
											مع تواصل مباشر مع مستشار خبير
										</p>
									</div>
									<div class="mb-3 d-block d-lg-none">
										<img class="modal-coin-img" src="{{ asset('frontend_assets/assets/img/new/risk-test/currency.svg') }}" alt="">
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

{{-- @dd($value_at_retirement) --}}

@section('scripts')
<script>
    feather.replace({
        'width': '1em',
        'height': '1em'
    })
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');


var value_at_retirement_options = {
    	responsive: true,
    	legend: {
	        display: false
	    },
        scales: {
	        xAxes: [{
	            gridLines: {
	                color: "rgba(0, 0, 0, 0)",
	            },
	            ticks: {
                    fontColor: "rgba(0,0,0,0.5)",
                    fontStyle: "bold",
                    beginAtZero: true,
                    maxTicksLimit: 20,
                    padding: 20,
                    userCallback: function(value, index, values) {
                        value = value.toString();
                        if($(window).width() < 760)
                          return value;
                        else
                          return 'SAR ' + value;
                    },
                    userCallback: function(tick, index, array) {
                      if($(window).width() < 760){
                        return (index % 3) ? "" : tick;
                      }
                      else{
                        return (index % 2) ? "" : tick;
                      }
                    }
                }
	        }],
	        yAxes: [{
	            
	        }]
	    }
    };


var value_at_retirement_data = {
        labels: [
	    			@foreach ($value_at_retirement as $key => $element)
	        			{!! $key . ',' !!}
	        		@endforeach
        		],
        datasets: [{
            label: '',
            data: [
            		@foreach ($value_at_retirement as $key => $element)
	        			{!! $element['value_end_year'] . ',' !!}
	        		@endforeach
            	],
            backgroundColor: [
                'rgba(255, 99, 132, 0)',
            ],
            borderColor: [
                '#3095fd'
            ],
            "borderWidth": 5,
		    "pointRadius": 0,
		    "pointBackgroundColor" : "#3095fd",
			"pointBorderWidth": 1,
			"pointHoverRadius": 5,
			"pointHoverBackgroundColor": "#ffffff",
			"pointHoverBorderColor": "#3095fd",
			"pointHoverBorderWidth": 6,
			"pointHitRadius": 10,
			"pointHoverRadius": 10,
        }]
    }


var myLineChart = new Chart(ctx, {
    type: 'line',
    data: value_at_retirement_data,
    options: value_at_retirement_options
});
</script>




<script>

var options = {
  	percentageInnerCutout: 90,
  	cutoutPercentage: 90,
	title: {
		display: false,
		text: ""
	},
  	animation: {
		animateScale: true,
		animateRotate: true
	},
  	responsive: true,
  	maintainAspectRatio: false,
    
  	legend: {
  		display: false,
		position: 'bottom',
		labels:{
			boxWidth: 10,
			padding: 12
        }
	},
	tooltips: {
      callbacks: {
        label: function(tooltipItem, data) {
          var dataset = data['datasets'][0];
		  /* console.log(dataset['data'][tooltipItem['index']]); */
          /* var percent = Math.round((dataset['data'][tooltipItem['index']] / dataset["_meta"][0]['total']) * 100) */
          return data['labels'][tooltipItem['index']] + ': ' +dataset['data'][tooltipItem['index']] + '%';
        }
      },
	},
};

var data_set = [];
@foreach ($asset_class as $key => $element)
	data_set['{{ $key }}'] = {
    labels: ["{{ trans('lang.report.cash_and_equivalent') }}", "{{ trans('lang.report.equities') }}", "{!! trans('lang.report.fix_income') !!}", "{{ trans('lang.report.alternative_investment') }}", ],
    datasets: [{
        label: "Test",
        data: [{{ implode(',', $element) }}],
        backgroundColor: [
            '#036EED',
            '#01BAEF',
            '#0B4F6C',
            '#2DD782',
            
        ],
        borderColor: [
            '#036EED',
            '#01BAEF',
            '#0B4F6C',
            '#2DD782',
            
        ],
        borderWidth: 1

    }]
}
@endforeach





var donut_chart = document.getElementById('donut_chart').getContext('2d');
var myChart = new Chart(donut_chart, {
    type: 'doughnut',
    data: data_set['Natrual_Investor'],
    options : options
});



function indicator(value){
	
	myChart.destroy()
	// myLineChart.destroy()

	var value_at_retirement = 0

	myChart = new Chart(donut_chart, {
	    type: 'doughnut',
	    data: data_set[value],
	    options : options
	});


	$.ajax({
        url: "{{ route('get-value-at-retirement', locale()) }}",
        type: "post",
        headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
        data: {
        	val: value
        },

        success: function (response) {

        	var dataset = [];

        	$.each(response.value_at_retirement_graph, function( index, value ) {
				dataset.push(value['value_end_year']);
			});
           	
		    myLineChart.data.datasets[0].data = dataset

		    myLineChart.update();

			$('#value_at_retirement').text(response.value_at_retirement)
			$('#value_at_retirement_b').text(response.value_at_retirement)

        },
        
    });

}
</script>



@endsection

