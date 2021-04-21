@inject('request', 'Illuminate\Http\Request')
{{-- {{ dd($data['constants']) }} --}}
@extends('dashboard.layouts.user_layout.user_report')

@section('styles')
<link rel="stylesheet" href="{{url('/')}}/frontend_assets/assets/css/modern-tabs.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/rickshaw/1.6.6/rickshaw.css">
<link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/dashboard/css/print.css?v1') }}">

@php 
	if($request->segment(1) == 'ar'){
		$direction = 'right';
		$direction_op = 'left';
	}
	else{
		$direction = 'left';
		$direction_op = 'right';
	}
@endphp
<style>
	{!! ($request->segment(1) == 'ar') ? '.progressbar li:after{ right: -50%; }' : '' !!}
	.financial-position tr td:first-child {
	    text-align: {{ ($request->segment(1) == 'ar') ? 'right' : 'left' }};
	}


	.factor span:first-child {
	    border-top-{{ $direction }}-radius: 10px;
	    border-bottom-{{ $direction }}-radius: 10px;
	}
	.factor span:last-child {
	    border-top-{{ $direction_op }}-radius: 10px;
	    border-bottom-{{ $direction_op }}-radius: 10px;
	}

	.factor-s span:first-child {
	    border-top-{{ $direction }}-radius: 10px;
	    border-bottom-{{ $direction }}-radius: 10px;
	}
	.factor-vs span:first-child {
	    border-top-{{ $direction }}-radius: 10px;
	    border-bottom-{{ $direction }}-radius: 10px;
	}
	.factor-s span:last-child {
	    border-top-{{ $direction_op }}-radius: 10px;
	    border-bottom-{{ $direction_op }}-radius: 10px;
	}
	.factor-vs span:last-child {
	    border-top-{{ $direction_op }}-radius: 10px;
	    border-bottom-{{ $direction_op }}-radius: 10px;
	}
	.financial-position tr td {
	    text-align: {{ $direction_op }};
	}

	#disclaimer{
		page-break-before: always;
	}


	#intro, #table_of_contents, #about_us, #personal_information, #personal_indicators, #asset_allocation, #financial_forecast{
		page-break-after: always;
	}
	.highlight{
	  	background-color: #000000 !important;
	    color: #fff !important;
	    font-family: 'Cairo', sans-serif;
	}

	.background_effect{
	    background-size: cover;
	    background-position: 100% 100%;
	    background-repeat: no-repeat;
	}

	.container-fluid{
		margin-bottom: 5rem !important;
		margin-top: 0 !important;
		max-width:100% !important;
	}

	.b-shadow{
		box-shadow: 0px 2px 7px 3px #e7e7e7;
	}

	.mt-4r{
		margin-top: 4rem !important;
	}

	.report .nav-tabs-wrapper > .horizontal-line{
        background: #B7CDCF;
        left: 5px;
        width: 99%;
        background: transparent linear-gradient(270deg, var(---2dd782) 0%, #FF5656 100%) 0% 0% no-repeat padding-box;
        @if ($request->segment(1) == 'ar')
			background: transparent linear-gradient(270deg, #FF5656 0%,#2dd782 100%) 0% 0% no-repeat padding-box;
        @else
            background: transparent linear-gradient(270deg, #2DD782 0%, #FF5656 100%) 0% 0% no-repeat padding-box;
		@endif
    }

	.blur{
		color: transparent !important;
   		text-shadow: 0 0 4px rgba(0,0,0,0.5);
		-webkit-touch-callout: none; /* iOS Safari */
			-webkit-user-select: none; /* Safari */
			-khtml-user-select: none; /* Konqueror HTML */
			-moz-user-select: none; /* Old versions of Firefox */
				-ms-user-select: none; /* Internet Explorer/Edge */
					user-select: none; /* Non-prefixed version, currently
										supported by Chrome, Edge, Opera and Firefox */
	}
</style>

@endsection

@section('content')
{{-- {{ dd($data) }} --}}
<div id="HTMLtoPDF" class="container {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }} " >
	
	@php 
	// $pointer = '<img src="' . asset('backend_assets/dashboard/images/pdf_icons/Polygon1.png') . '"><br><p>'.trans('lang.you').'</p>';
	$pointer = 'active';
	@endphp

	<div id="intro" class="container-fluid mt-4r b-shadow mb-1 background_effect " style="background-image: url('{{ asset('frontend_assets/assets/img/report/report-clouds-full-bg.svg') }}')">
		<div class="row">
			<div class="col-1"></div>
			<div class="col-8">
				<br><br><br><br><br><br>
				<br><br><br><br><br>
				<h2 class="mt-5 pt-5 mb-4">
	                {{ 'thokhor' }}
	                {{-- {{ althraa_site_title() }} --}}
	            </h2>
	            <br><br><br><br><br>
	            <h1 class="heading-main">{{ trans('lang.report.PERSONAL_FINANCIAL_PLAN') }}</h1>
	            <h1 class="user-main mt-3">{{auth()->user()->name ?? ''}}</h1>
			</div>
		</div>

		<br><br><br><br><br>
		<br><br><br><br><br>
		
		
		<div class="row mt-5">
			<div class="col-3"></div>
			<div class="col-7">
				<img
                  class="img img-responsive image-main"
                  src="
                    {{ asset('frontend_assets/assets/img/report/person-with-plant.png') }}"
                  alt="Banner image"
                />
			</div>
		</div>

		<br><br><br><br><br><br><br><br>
		
		{{-- <p class="text-center mr-5 pb-3">{{ trans('lang.thokhor_dot_com') }}</p> --}}
		
	</div>




	{{-- Page 2 start --}}


	<div id="table_of_contents" class="container-fluid b-shadow mb-1 parent-report background_effect" style="background-image: url('{{ asset('frontend_assets/assets/img/report/report-clouds-full-bg-2.svg') }}')">
		<div class="row">
			<div class="col-1"></div>
			<div class="col-8">
				<br><br><br><br><br>
				
				<h2 class="mt-5 pt-5 mb-4">
	                {{ 'thokhor' }}
	                {{-- {{ althraa_site_title() }} --}}
	            </h2>
	            <br><br><br><br><br>
	            <h1 class="heading-main">{{ trans('lang.report.TABLE_OF_CONTENTS') }}</h1>
			</div>
		</div>

		<br><br><br><br><br>
		
		<div class="row mt-5">
			<div class="col-1"></div>
			<div class="col-9 tb-content">
				<P>{{ trans('lang.report.about_thokhor') }}</P>
				<P>{{ trans('lang.report.financial_health_checkup') }}</P>
				<P>{{ trans('lang.report.personal_indicators') }}</P>
				<P>{{ trans('lang.report.asset_allocation') }}</P>
				<P>{{ trans('lang.report.financil_forcast') }}</P>
				<P>{{ trans('lang.report.investing_plan') }}</P>
				<P>{{ trans('lang.disclaimer') }}</P>
			</div>

			{{-- <div class="col-1 tb-content">
				<P>01</P>
				<P>02</P>
				<P>03</P>
				<P>04</P>
				<P>05</P>
				<P>06</P>
				
			</div> --}}
		</div>


		<br><br><br><br><br>
		<br><br><br><br><br>
		<br><br><br><br><br>
		<br><br><br><br><br>
		<br><br><br>
		
		
		{{-- <p class="text-center mr-5">{{ trans('lang.thokhor_dot_com') }}</p> --}}
	</div>




	{{-- Page 3 start --}}


	<div id="about_us" class="container-fluid b-shadow mb-1 parent-report background_effect" style="background-image: url('{{ asset('frontend_assets/assets/img/report/report-clouds-full-bg-2.svg') }}')">
		<div class="row">
			<div class="col-1 rem-col"></div>
			<div class="col-10">
				<h2 class="mt-5 pt-5 mb-4">
	                {{ 'thokhor' }}
	                {{-- {{ althraa_site_title() }} --}}
	            </h2>
	            <br><br>
	            <h1 class="heading-main">{!! trans('lang.report.thank_you_for') !!}</h1>
	            <br>
	            <p class="text-primary">{{ trans('lang.report.we_hope') }}</p>
			</div>
		</div>

		<br><br>
		
		<div class="row mt-5">
			<div class="col-1"></div>
			<div class="col-5">
				<img class="img img-fluid img-left" style="max-height: 250px" src="{{ asset('frontend_assets/img/banner/undraw_winners1.png') }}">

				<h1 class="page-heading invst_plan mt-5 pt-3">
                        {{ trans('lang.frontend_about.mission') }}
                </h1>
                <p class="mt-4 mb-5">
                    {{ trans('lang.frontend_about.mission_text_report') }}
                </p>
                <ul>
                    <li><p><i class="fa fa-check-circle"></i>&nbsp{{ trans('lang.frontend_about.mission_li_1') }}</p></li>
                    <li><p><i class="fa fa-check-circle"></i>&nbsp{{ trans('lang.frontend_about.mission_li_2') }}</p></li>
                    <li><p><i class="fa fa-check-circle"></i>&nbsp{{ trans('lang.frontend_about.mission_li_3') }}</p></li>
                    <li><p><i class="fa fa-check-circle"></i>&nbsp{{ trans('lang.frontend_about.mission_li_4') }}</p></li>
                    
                </ul>

			</div>
			<div class="col-5">
				<img class="img img-fluid img-right" style="max-height: 250px" src="{{ asset('frontend_assets/img/banner/undraw_business1.png') }}">

				<h1 class="page-heading invst_plan mt-5 pt-3">
                        {{ trans('lang.frontend_about.method') }}
                </h1>
                <p class="mt-4 mb-5">
                    {{ trans('lang.frontend_about.method_text') }}
                </p>
                <ul>
                    <li><p><i class="fa fa-check-circle"></i>&nbsp{{ trans('lang.frontend_about.method_li_1') }}</p></li>
                    <li><p><i class="fa fa-check-circle"></i>&nbsp{{ trans('lang.frontend_about.method_li_2') }}</p></li>
                    <li><p><i class="fa fa-check-circle"></i>&nbsp{{ trans('lang.frontend_about.method_li_3') }}</p></li>
                    
                </ul>
			</div>

			
			
		</div>
		<br><br><br><br><br>
		<br><br><br><br><br>
		<br><br><br><br>
		{{-- <p class="text-center mr-5">{{ trans('lang.thokhor_dot_com') }}</p> --}}
	</div>




	{{-- page 4 start --}}

	<div id="personal_information" class="container-fluid b-shadow mb-1 parent-report background_effect" style="background-image: url('{{ asset('frontend_assets/assets/img/report/report-clouds-full-bg-2.svg') }}')" >
		<div class="row">
			<div class="col-1 rem-col"></div>
			<div class="col-10">
				<h2 class="mt-5 mb-4">
	                {{ 'thokhor' }}
	                {{-- {{ althraa_site_title() }} --}}
	            </h2>
	            
	            <h1 class="heading-secondary">{{ trans('lang.report.financial_health_checkup') }}</h1>

	            <p class="text-secondary mt-2">{{ trans('lang.report.personal_information') }}</p>
	            
			</div>
		</div>

		
		
		<div class="row mt-1 personal-info">
			<div class="col-1 rem-col"></div>
			@php
				$profile=auth()->user()->profile();
			@endphp
			<div class="col-3">
				<p>{{ trans('lang.report.name') }}</p>
				<b>{{auth()->user()->name ?? ''}}</b>
			</div>
			
			<div class="col-3">
				<p>{{ trans('lang.report.education') }}</p>
				<b>{{$profile['personal_info']['education_level'] ?? ''}}</b>
			</div>
			
			<div class="col-2">
				<p>{{ trans('lang.report.current_age') }}</p>
				<b>{{$profile['personal_info']['years_old'] ?? ''}}</b>
			</div>
			
			<div class="col-3">
				<p>{{ trans('lang.report.planned_retirement_age') }}</p>
				<b>{{$profile['personal_info']['retirement_age'] ?? ''}}</b>
			</div>
			
			<br><br>
			
			
		</div>

		<div class="row">
			<div class="col-1 rem-col"></div>
			<div class="col-10">
				<p class="text-secondary mt-3">{{ trans('lang.report.financial_position_today') }}</p>
				
			</div>
		</div>
		<div class="row financial-position">
			<div class="col-1"></div>
			<div class="col-5">
				<table>
					<tr>
						<td>{{ trans('lang.report.monthly_income_today') }}</td>
						<td class="blur">4,167 SAR</td>
					</tr>
					<tr>
						<td>{{ trans('lang.question.gosi_or_ppa_monthly_subscription') }}</td>
						<td class="blur"> 20,000 SAR</td>
					</tr>
					<tr>
						<td>{{ trans('lang.question.monthly_saving_plan_for_retirement') }}</td>
						<td class="blur"> 800,000 SAR</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.monthly_saving_percentage_today') }}</td>
						<td class="blur">19680 %</td>
					</tr>
					
				</table>
			</div>
			<div class="col-5">
				<table>
					<tr>
						<td>{{ trans('lang.report.total_assets_today') }}</td>
						<td class="blur">240,045 SAR</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.total_liabilities_today') }}</td>
						<td class="blur"> 0</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.net_worth') }}</td>
						<td class="blur">0 SAR</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.accomulative_saving_today') }}</td>
						<td class="blur">5,000 SAR</td>
					</tr>
					
				</table>
			</div>
			<div class="col-1"></div>
		</div>
		<div class="row">
			<div class="col-1 rem-col"></div>
			<div class="col-10 to-12">
				<p class="text-secondary mt-5">{{ trans('lang.report.current_asset_allocation') }}</p>
				<div class="row mb-5">
					
						<div class="col-lg-4 col-md-4 col-sm-4 col-12"></div>
						<div class="col-lg-4 col-md-4 col-4 col-sm-4 col-12 text-center">
							<canvas id="DonutChartSelectedAsset" width="100" height="100"></canvas>
						    <!--graph inner-->
						    <br>
						    <p class="text-center inner_price donut_inner blur">
						    	30000 SAR
						    </p>
						    <p class="text-center donut_inner blur">
						    	{{-- {{ percentage(100) }} --}}
						    	100%
						    </p>
						    

						    {{-- <div class="s-50"></div> --}}
						</div>
						
					
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table">
								<tbody>
									<tr>
										<td>
											<div class="table_color" style="background-color: #3B83FF;"></div>
										</td>
										<td>
											<p>{{ trans('lang.report.cash_and_equivalent') }}</p>
										</td>
										<td>
											<p class="text_black text-left blur">
												4 %
											</p>
										</td>
										<td>
											<p class="text_black text-left blur">
												10000 SAR
												{{-- {{ currencyR((percentage($data['cashAndEquivlentPercentage'],1) * $data['totalAssetsToday']) / 100 ) }} --}}
											</p>
										</td>
									</tr>
									<tr>
										<td>
											<div class="table_color" style="background-color: #2dd782;"></div>
										</td>
										<td>
											<p>{{ trans('lang.report.equities') }}</p>
										</td>
										<td>
											<p class="text_black text-left blur">
												2 %
											</p>
										</td>
										<td>
											<p class="text_black text-left blur">
												10000 SAR
												{{-- {{ currencyR((percentage($data['equitiesPercentage'], 1) * $data['totalAssetsToday'])/100) }}  --}}
											</p>
										</td>
									</tr>
									<tr>
										<td>
											<div class="table_color" style="background-color: #FFE700;"></div>
										</td>
										<td>
											<p>{{ trans('lang.report.fix_income') }}</p>
										</td>
										<td>
											<p class="text_black text-left blur">
												52 %
											</p>
										</td>
										<td>
											<p class="text_black text-left blur">
												10000 SAR
												{{-- {{ currencyR((percentage($data['fixIncomePercentage'], 1) * $data['totalAssetsToday']) / 100) }}  --}}
											</p>
										</td>
									</tr>
									<tr>
										<td>
											<div class="table_color" style="background-color: #01baef;"></div>
										</td>
										<td>
											<p>{{ trans('lang.report.alternative_investment') }}</p>
										</td>
										<td>
											<p class="text_black text-left blur">
												100 %
											</p>
										</td>
										<td>
											<p class="text_black text-left blur">
												10000 SAR
												{{-- {{ currencyR((percentage($data['alternativeInvestmentsPercentage'], 1) * $data['totalAssetsToday']) / 100) }} --}}
											</p>
										</td>
									</tr>
									<tr>
										<td>
											<div class="table_color" style="background-color: #ffffff;"></div>
										</td>
										<td>
											<p>{{ trans('lang.report.total') }}</p>
										</td>
										<td>
											<p class="text_black text-left blur">
												100 %
											</p>
										</td>
										<td>
											<p class="text_black text-left blur">
												240,045 SAR
											</p>
										</td>
									</tr>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br><br><br><br>
		<br><br><br><br>
		{{-- <p class="text-center mr-5">{{ trans('lang.thokhor_dot_com') }}</p> --}}
	</div>



	{{-- Page 5 start --}}


	<div id="personal_indicators" class="container-fluid b-shadow mb-1 parent-report background_effect" style="background-image: url('{{ asset('frontend_assets/assets/img/report/report-clouds-full-bg-2.svg') }}')" >
		<div class="row">
			<div class="col-1 rem-col"></div>
			<div class="col-10">
				{{-- <br><br><br><br><br> --}}
				<h2 class="mt-5 mb-4">
	                {{ 'thokhor' }}
	                {{-- {{ althraa_site_title() }} --}}
	            </h2>
	            <br><br>
	            <h1 class="heading-main">{{ trans('lang.report.personal_indicators') }}</h1>
	            
			</div>
		</div>
 

		<div class="row">
			<div class="col-1"></div>
			<div class="col-10">

				<p class="text-secondary mt-5">
					{{ trans('lang.report.monthly_saving_rate') }} 
				</p>

				<div class="report m-top-p5">
					<div class="nav-tabs-wrapper mt-5 mobile ">
						<ul class="nav nav-tabs d-flex align-items-center">
							<li class="nav-item nav-item-risk-1">
								<a class="text-{{$align}} nav-link " href="#">
									<span class="step-parent" data-bar="1"></span>
									<span class="step-text">
										<span>
										{{trans('lang.you')}}
										</span>
									</span>
									<div class="bottom-text">
										{{ trans('lang.report.little_saver') }}
									</div>
								</a>
							</li>
							<li class="nav-item nav-item-risk-2">
								<a class="text-{{$align}} nav-link " href="#">
									<span class="step-parent" data-bar="2"></span>
									<span class="step-text">
										<span>
										 {{trans('lang.you')}}
										</span>
									</span>
									<div class="bottom-text">
										 {{ trans('lang.report.good_saver') }}
									</div>
								</a>
							</li>
							<li class="nav-item nav-item-risk-3">
								<a class="text-{{$align}} nav-link " href="#">
									<span class="step-parent" data-bar="3"></span>
									<span class="step-text">
										<span>
										 {{trans('lang.you')}}
										</span>
									</span>
									<div class="bottom-text">
										{{ trans('lang.report.great_saver') }}
									</div>
								</a>
							</li>
							<li class="nav-item nav-item-risk-4">
								<a class="text-{{$align}} nav-link " href="#">
									<span class="step-parent" data-bar="4"></span>
									<span class="step-text">
										<span>
										 {{trans('lang.you')}}
										</span>
									</span>
									<div class="bottom-text">
										 {{ trans('lang.report.rich_saver') }}
									</div>
								</a>
							</li>
							<li class="nav-item nav-item-risk-5">
								<a class="text-{{$align}} nav-link {!!  $pointer !!}" href="#">
									<span class="step-parent" data-bar="5"></span>
									<span class="step-text">
										<span>
										{{trans('lang.you')}}
										</span>
									</span>
									<div class="bottom-text">
										 {{ trans('lang.report.wealthy_saver') }}
									</div>
								</a>
							</li>
						</ul>
						<div class="horizontal-line">
						</div>
					</div>
				</div>
				
			</div>
			<div class="col-1"></div>
		</div>



		<div class="row">
			<div class="col-1"></div>
			<div class="col-10">

				<p class="text-secondary mt-5">
					{{ trans('lang.report.Current_Networth_amount') }} 
				</p>

				<div class="report m-top-p5">
					<div class="nav-tabs-wrapper mt-5 mobile ">
						<ul class="nav nav-tabs d-flex align-items-center">
							<li class="nav-item nav-item-risk-1">
								<a class="text-{{$align}} nav-link " href="#">
									<span class="step-parent" data-bar="1"></span>
									<span class="step-text">
										<span>
										{{trans('lang.you')}}
										</span>
									</span>
									<div class="bottom-text">
										{{ trans('lang.report.poor_saver') }}
									</div>
								</a>
							</li>
							<li class="nav-item nav-item-risk-2">
								<a class="text-{{$align}} nav-link {!! $pointer !!}" href="#">
									<span class="step-parent" data-bar="2"></span>
									<span class="step-text">
										<span>
										 {{trans('lang.you')}}
										</span>
									</span>
									<div class="bottom-text">
										 {{ trans('lang.report.fair_saver') }}
									</div>
								</a>
							</li>
							<li class="nav-item nav-item-risk-3">
								<a class="text-{{$align}} nav-link" href="#">
									<span class="step-parent" data-bar="3"></span>
									<span class="step-text">
										<span>
										 {{trans('lang.you')}}
										</span>
									</span>
									<div class="bottom-text">
										{{ trans('lang.report.ghani_saver') }}
									</div>
								</a>
							</li>
							
						</ul>
						<div class="horizontal-line">
						</div>
					</div>
				</div>
				
			</div>
			<div class="col-1"></div>
		</div>

		

		<div class="row">
			<div class="col-1"></div>
			<div class="col-10">

				<p class="text-secondary mt-5">
					{{ trans('lang.report.early_retirement_possibility') }}
				</p>

				<div class="report m-top-p5">
					<div class="nav-tabs-wrapper mt-5 mobile ">
						<ul class="nav nav-tabs d-flex align-items-center">
							<li class="nav-item nav-item-risk-1">
								<a class="text-{{$align}} nav-link" href="#">
									<span class="step-parent" data-bar="1"></span>
									<span class="step-text">
										<span>
										{{trans('lang.you')}}
										</span>
									</span>
									<div class="bottom-text">
										{{ trans('lang.report.poor') }}
									</div>
								</a>
							</li>
							<li class="nav-item nav-item-risk-2">
								<a class="text-{{$align}} nav-link" href="#">
									<span class="step-parent" data-bar="2"></span>
									<span class="step-text">
										<span>
										 {{trans('lang.you')}}
										</span>
									</span>
									<div class="bottom-text">
										 {{ trans('lang.report.fair') }}
									</div>
								</a>
							</li>
							<li class="nav-item nav-item-risk-3">
								<a class="text-{{$align}} nav-link " href="#">
									<span class="step-parent" data-bar="3"></span>
									<span class="step-text">
										<span>
										 {{trans('lang.you')}}
										</span>
									</span>
									<div class="bottom-text">
										{{ trans('lang.report.healthy') }}
									</div>
								</a>
							</li>
							<li class="nav-item nav-item-risk-4">
								<a class="text-{{$align}} nav-link {!!  $pointer !!}" href="#">
									<span class="step-parent" data-bar="4"></span>
									<span class="step-text">
										<span>
										 {{trans('lang.you')}}
										</span>
									</span>
									<div class="bottom-text">
										 {{ trans('lang.report.very_healthy') }}
									</div>
								</a>
							</li>
							<li class="nav-item nav-item-risk-5">
								<a class="text-{{$align}} nav-link" href="#">
									<span class="step-parent" data-bar="5"></span>
									<span class="step-text">
										<span>
										{{trans('lang.you')}}
										</span>
									</span>
									<div class="bottom-text">
										 {{ trans('lang.report.early_retire_person') }}
									</div>
								</a>
							</li>
						</ul>
						<div class="horizontal-line">
						</div>
					</div>
				</div>
				
			</div>
			<div class="col-1"></div>
		</div>

		
		<div class="row">
			<div class="col-1"></div>
			<div class="col-10">

				<p class="text-secondary mt-5">
					{{ trans('lang.report.investing_diversity') }}
				</p>

				<div class="report m-top-p5">
					<div class="nav-tabs-wrapper mt-5 mobile ">
						<ul class="nav nav-tabs d-flex align-items-center">
							<li class="nav-item nav-item-risk-1">
								<a class="text-{{$align}} nav-link " href="#">
									<span class="step-parent" data-bar="1"></span>
									<span class="step-text">
										<span>
										{{trans('lang.you')}}
										</span>
									</span>
									<div class="bottom-text">
										{{ trans('lang.report.poor') }}
									</div>
								</a>
							</li>
							<li class="nav-item nav-item-risk-2">
								<a class="text-{{$align}} nav-link {!!  $pointer !!}" href="#">
									<span class="step-parent" data-bar="2"></span>
									<span class="step-text">
										<span>
										 {{trans('lang.you')}}
										</span>
									</span>
									<div class="bottom-text">
										 {{ trans('lang.report.fair') }}
									</div>
								</a>
							</li>
							<li class="nav-item nav-item-risk-3">
								<a class="text-{{$align}} nav-link " href="#">
									<span class="step-parent" data-bar="3"></span>
									<span class="step-text">
										<span>
										 {{trans('lang.you')}}
										</span>
									</span>
									<div class="bottom-text">
										{{ trans('lang.report.good') }}
									</div>
								</a>
							</li>
							<li class="nav-item nav-item-risk-4">
								<a class="text-{{$align}} nav-link " href="#">
									<span class="step-parent" data-bar="4"></span>
									<span class="step-text">
										<span>
										 {{trans('lang.you')}}
										</span>
									</span>
									<div class="bottom-text">
										 {{ trans('lang.report.great') }}
									</div>
								</a>
							</li>
						</ul>
						<div class="horizontal-line">
						</div>
					</div>
				</div>
				
			</div>
			<div class="col-1"></div>
		</div>

		
		<br><br><br><br><br><br>
		{{-- <p class="text-center mr-5">{{ trans('lang.thokhor_dot_com') }}</p> --}}
	</div>





	{{-- Page 6 start --}}


	<div id="asset_allocation" class="container-fluid b-shadow mb-1 parent-report background_effect" style="background-image: url('{{ asset('frontend_assets/assets/img/report/report-clouds-full-bg-2.svg') }}')" >
		<div class="row">
			<div class="col-1 rem-col"></div>
			<div class="col-10">
				<h2 class="mt-5 mb-4">
	                {{ 'thokhor' }}
	                {{-- {{ althraa_site_title() }} --}}
	            </h2>
	            <h1 class="heading-main mt-2">{{ trans('lang.report.asset_allocation') }}</h1>
	            
			</div>
		</div>

		

		<div class="row">
			<div class="col-1"></div>
			<div class="col-10">

				<p class="text-secondary mt-5">
					{{ trans('lang.report.early_retirement_possibility') }}
				</p>

				<div class="report m-top-p5">
					<div class="nav-tabs-wrapper mt-5 mobile ">
						<ul class="nav nav-tabs d-flex align-items-center">
							<li class="nav-item nav-item-risk-1">
								<a class="text-{{$align}} nav-link" href="#">
									<span class="step-parent" data-bar="1"></span>
									<span class="step-text">
										<span>
										{{trans('lang.you')}}
										</span>
									</span>
									<div class="bottom-text">
										{{ trans('lang.report.very_conservative') }}
									</div>
								</a>
							</li>
							<li class="nav-item nav-item-risk-2">
								<a class="text-{{$align}} nav-link {!!  $pointer !!}" href="#">
									<span class="step-parent" data-bar="2"></span>
									<span class="step-text">
										<span>
										 {{trans('lang.you')}}
										</span>
									</span>
									<div class="bottom-text">
										 {{ trans('lang.report.conservative') }}
									</div>
								</a>
							</li>
							<li class="nav-item nav-item-risk-3">
								<a class="text-{{$align}} nav-link " href="#">
									<span class="step-parent" data-bar="3"></span>
									<span class="step-text">
										<span>
										 {{trans('lang.you')}}
										</span>
									</span>
									<div class="bottom-text">
										{{ trans('lang.report.natural') }}
									</div>
								</a>
							</li>
							<li class="nav-item nav-item-risk-4">
								<a class="text-{{$align}} nav-link " href="#">
									<span class="step-parent" data-bar="4"></span>
									<span class="step-text">
										<span>
										 {{trans('lang.you')}}
										</span>
									</span>
									<div class="bottom-text">
										 {{ trans('lang.report.agressive') }}
									</div>
								</a>
							</li>
							<li class="nav-item nav-item-risk-5">
								<a class="text-{{$align}} nav-link" href="#">
									<span class="step-parent" data-bar="5"></span>
									<span class="step-text">
										<span>
										{{trans('lang.you')}}
										</span>
									</span>
									<div class="bottom-text">
										 {{ trans('lang.report.very_agressive') }}
									</div>
								</a>
							</li>
						</ul>
						<div class="horizontal-line">
						</div>
					</div>
				</div>
				
			</div>
			<div class="col-1"></div>
		</div>



		<br>

		<div class="row">
			<div class="col-1 rem-col"></div>
			<div class="col-10 to-12">
				<p class="text-secondary mt-5">{{ trans('lang.report.recommended_assets_allocation') }}</p>
				<div class="row mb-5">
					
						<div class="col-lg-3 col-md-3 col-3"></div>
						<div class="col-lg-4 col-md-4 col-12 text-center">
							<canvas id="DonutChartSelectedAssetRecommended" width="400" height="400"></canvas>
						    <!--graph inner-->
						    <br>
						    <p class="text-center inner_price donut_inner blur">
						    	5,000 SAR 
						    </p>
						    <p class="text-center donut_inner blur">
						    	{{-- {{ percentage(100) }} --}}
						    	100%
						    </p>
						    <br>

						    {{-- <div class="s-50"></div> --}}
						</div>
						
					
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table">
								<tbody>
									<tr>
										<td>
											<div class="table_color" style="background-color: #3B83FF;"></div>
										</td>
										<td>
											<p>{{ trans('lang.report.cash_and_equivalent') }}</p>
										</td>
										<td>
											<p class="text_black text-left blur">
												10 %
											</p>
										</td>
										<td>
											<p class="text_black text-left blur">
												
												500 SAR
											
												{{-- {{ currencyR((percentage($data['cashAndEquivlentPercentage'],1) * $data['totalAssetsToday']) / 100 ) }} --}}
											</p>
										</td>
									</tr>
									<tr>
										<td>
											<div class="table_color" style="background-color: #2dd782;"></div>
										</td>
										<td>
											<p>{{ trans('lang.report.equities') }}</p>
										</td>
										<td>
											<p class="text_black text-left blur">
												
												55 %
											
											</p>
										</td>
										<td>
											<p class="text_black text-left blur">
												10000
												{{-- {{ currencyR((percentage($data['equitiesPercentage'], 1) * $data['totalAssetsToday'])/100) }}  --}}
											</p>
										</td>
									</tr>
									<tr>
										<td>
											<div class="table_color" style="background-color: #FFE700;"></div>
										</td>
										<td>
											<p>{{ trans('lang.report.fix_income') }}</p>
										</td>
										<td>
											<p class="text_black text-left blur">
												15 %
											</p>
										</td>
										<td>
											<p class="text_black text-left blur">
												750 SAR
												{{-- {{ currencyR((percentage($data['fixIncomePercentage'], 1) * $data['totalAssetsToday']) / 100) }}  --}}
											</p>
										</td>
									</tr>
									<tr>
										<td>
											<div class="table_color" style="background-color: #01baef;"></div>
										</td>
										<td>
											<p>{{ trans('lang.report.alternative_investment') }}</p>
										</td>
										<td>
											<p class="text_black text-left blur">
												20 %
											</p>
										</td>
										<td>
											<p class="text_black text-left blur">
												1000 SAR
												{{-- {{ currencyR((percentage($data['alternativeInvestmentsPercentage'], 1) * $data['totalAssetsToday']) / 100) }} --}}
											</p>
										</td>
									</tr>
									<tr>
										<td>
											<div class="table_color" style="background-color: #ffffff;"></div>
										</td>
										<td>
											<p>{{ trans('lang.report.total') }}</p>
										</td>
										<td>
											<p class="text_black text-left blur">
												100 %
											</p>
										</td>
										<td>
											<p class="text_black text-left blur">
												5000 SAR
											</p>
										</td>
									</tr>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		

		<br>
		{{-- <p class="text-center mr-5">{{ trans('lang.thokhor_dot_com') }}</p> --}}
	</div>





	{{-- Page 7 start --}}


	<div id="financial_forecast" class="container-fluid b-shadow mb-1 parent-report background_effect" style="background-image: url('{{ asset('frontend_assets/assets/img/report/report-clouds-full-bg-2.svg') }}')" >
		<div class="row">
			<div class="col-1 rem-col"></div>
			<div class="col-10">
				<h2 class="mt-5 mb-2">
	                {{ 'thokhor' }}
	                {{-- {{ althraa_site_title() }} --}}
	            </h2>
	            <p class="heading-secondary mt-5">{{ trans('lang.report.financil_forcast') }}</p>
	            <p class="alertBox__p">
	              <span>{{ trans('lang.financial_plan.congratulations') }}</span>&nbsp;{{ trans('lang.current_state.at_age') }} 60 {{ trans('lang.current_state.you_will_have_savings_balance_of') }} <span>4,664,933 SAR</span>
	            </p>
			</div>
		</div>

		<br><br>

		<div class="row">
			<div class="col-1 rem-col"></div>
			<div class="col-lg-8 col-md-10 col-sm-10 col-10" >
				
				<canvas id="myChart" ></canvas>
				
			</div>
		</div>


		

		{{-- <br><br><br><br><br> --}}

		<div class="row financial-position">
			<div class="col-1 rem-col"></div>
			<div class="col-5">
				<p class="text-secondary mt-5">{{ trans('lang.report.assumptions') }}</p>
				<table>
					<tr>
						<td>{{ trans('lang.report.current_age') }}</td>
						<td class="blur">17</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.planned_retirement_age') }}</td>
						<td class="blur">60</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.monthly_saving_plan') }}</td>
						<td class="blur">800000 SAR</td>
					</tr>
					<tr>
						<td>
							{{ trans('lang.report.monthly_saving_today') }}
							{{-- {{ trans('lang.report.monthly_saving_today') .trans('lang.report.of_monthly_income') }} --}}
						</td>
						<td class="blur">
						19680 %
							{{-- {!! ($request->segment(1) == 'ar') ? trans('lang.report.of_monthly_income') . percentage($data['monthlySavingPercentageToday']) : percentage($data['monthlySavingPercentageToday']) . trans('lang.report.of_monthly_income') !!} --}}
						</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.accumulative_saving_today') }}</td>
						<td class="blur">5000 SAR</td>
					</tr>

					<tr>
						<td><b style="color: #000000;"> * {{ trans('lang.report.All_returns_will_be_fully_reinvested') }}</b></td>
						
					</tr>
					<tr>
						<td><b style="color: #000000;"> * {{ trans('lang.report.No_redemption_amount_before_retirement_year') }}</b></td>
						
					</tr>
					
				</table>
			</div>
			<div class="col-5">
				<p class="text-secondary mt-5">{{ trans('lang.report.returns_assumptions') }}</p>
				<table>
					<tr>
						<td>{{ trans('lang.report.cash_and_equivalent') }}</td>
						<td class="blur">2 %</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.equities') }}</td>
						<td class="blur">10 %</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.fix_income') }}</td>
						<td class="blur">5 %</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.alternative_investment') }}</td>
						<td class="blur">12 %</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.net_return_before_reitement') }}</td>
						<td class="blur">4 %</td>
					</tr>
					
					{{-- <tr>
						<td>{{ trans('lang.report.net_return_after_reitement') }}</td>
						<td>{{ percentage($data['netReturnAfterRetirement']) }}</td>
					</tr> --}}
					
				</table>
			</div>
			
		</div>

		<div class="row financial-position">
			<div class="col-1 rem-col"></div>
			<div class="col-5">
				<p class="text-secondary mt-5">{{ trans('lang.report.income_and_wealth_at_retirement') }}</p>
				<table>
					{{-- <tr>
						<td>Status at retirement</td>
						<td>Based on assets allocation</td>
					</tr> --}}
					<tr>
						<td>{{ trans('lang.report.retirement_plan_value_at') }} 0 {{ trans('lang.report.years_old') }}</td>
						<td class="blur">4,664,933 SAR</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.total_monthly_income') }}</td>
						<td class="blur">69,300 SAR</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.income_from_retirement_plan') }}</td>
						<td class="blur">15,550 SAR</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.income_from_GOSI_or_PPA') }}</td>
						<td class="blur">53,750 SAR</td>
					</tr>
					
				</table>
			</div>
			
		</div>
		<br><br><br>
		{{-- <p class="text-center mr-5">{{ trans('lang.thokhor_dot_com') }}</p> --}}
	</div>



	{{-- Page 7 with table start --}}


	<div id="table-break"  class="container-fluid b-shadow parent-report background_effect" style="background-image: url('{{ asset('frontend_assets/assets/img/report/report-clouds-full-bg-2.svg') }}')" >
		
		<div class="row">
			<div class="col-1"></div>
			<div class="col-10">
				{{-- <br><br><br><br><br> --}}
				<h2 class="mt-1 mb-2">
	                {{ 'thokhor' }}
	            </h2>
	            <h1 class="text-secondary">{{ trans('lang.report.investing_plan') }}</h1>
	            
			</div>
		</div>

		<div class="row" >
			<div class="col-md-1"></div>
		    <div class="col-md-10">
		    	

		      	<div class="table-responsive">
					<table class="table table-striped">
						<thead>
						  <tr>
							<th class="btm_table">{{ trans('lang.financial_plan.year') }} #</th>
							<th class="btm_table">{{ trans('lang.financial_plan.age') }}</th>
							<th class="btm_table">{{ trans('lang.financial_plan.value_beginning_year') }}</th>
							<th class="btm_table">{{ trans('lang.financial_plan.contributions') }}</th>
							<th class="btm_table">{{ trans('lang.financial_plan.returns') }}</th>
							<th class="btm_table">{{ trans('lang.financial_plan.value_end_year') }}</th>
						  </tr>
						</thead>
						<tbody>
							<tr>
							<td class="btm_table_td">
							1
							</td>
							<td class="btm_table_td">
							17
							</td>
							<td class="btm_table_td">
							5,000 SAR
							</td>
							<td class="btm_table_td">
							5,000 SAR
							</td>
							<td class="btm_table_td">
							664 SAR
							</td>
							<td class="btm_table_td">
							10,664 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							2
							</td>
							<td class="btm_table_td">
							18
							</td>
							<td class="btm_table_td">
							10,664 SAR
							</td>
							<td class="btm_table_td">
							5,250 SAR
							</td>
							<td class="btm_table_td">
							1,176 SAR
							</td>
							<td class="btm_table_td">
							17,090 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							3
							</td>
							<td class="btm_table_td">
							19
							</td>
							<td class="btm_table_td">
							17,090 SAR
							</td>
							<td class="btm_table_td">
							5,513 SAR
							</td>
							<td class="btm_table_td">
							1,756 SAR
							</td>
							<td class="btm_table_td">
							24,359 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							4
							</td>
							<td class="btm_table_td">
							20
							</td>
							<td class="btm_table_td">
							24,359 SAR
							</td>
							<td class="btm_table_td">
							5,788 SAR
							</td>
							<td class="btm_table_td">
							2,412 SAR
							</td>
							<td class="btm_table_td">
							32,559 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							5
							</td>
							<td class="btm_table_td">
							21
							</td>
							<td class="btm_table_td">
							32,559 SAR
							</td>
							<td class="btm_table_td">
							6,078 SAR
							</td>
							<td class="btm_table_td">
							3,150 SAR
							</td>
							<td class="btm_table_td">
							41,787 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							6
							</td>
							<td class="btm_table_td">
							22
							</td>
							<td class="btm_table_td">
							41,787 SAR
							</td>
							<td class="btm_table_td">
							6,381 SAR
							</td>
							<td class="btm_table_td">
							3,980 SAR
							</td>
							<td class="btm_table_td">
							52,148 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							7
							</td>
							<td class="btm_table_td">
							23
							</td>
							<td class="btm_table_td">
							52,148 SAR
							</td>
							<td class="btm_table_td">
							6,700 SAR
							</td>
							<td class="btm_table_td">
							4,912 SAR
							</td>
							<td class="btm_table_td">
							63,761 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							8
							</td>
							<td class="btm_table_td">
							24
							</td>
							<td class="btm_table_td">
							63,761 SAR
							</td>
							<td class="btm_table_td">
							7,036 SAR
							</td>
							<td class="btm_table_td">
							5,954 SAR
							</td>
							<td class="btm_table_td">
							76,750 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							9
							</td>
							<td class="btm_table_td">
							25
							</td>
							<td class="btm_table_td">
							76,750 SAR
							</td>
							<td class="btm_table_td">
							7,387 SAR
							</td>
							<td class="btm_table_td">
							7,119 SAR
							</td>
							<td class="btm_table_td">
							91,257 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							10
							</td>
							<td class="btm_table_td">
							26
							</td>
							<td class="btm_table_td">
							91,257 SAR
							</td>
							<td class="btm_table_td">
							7,757 SAR
							</td>
							<td class="btm_table_td">
							8,419 SAR
							</td>
							<td class="btm_table_td">
							107,433 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							11
							</td>
							<td class="btm_table_td">
							27
							</td>
							<td class="btm_table_td">
							107,433 SAR
							</td>
							<td class="btm_table_td">
							8,144 SAR
							</td>
							<td class="btm_table_td">
							9,868 SAR
							</td>
							<td class="btm_table_td">
							125,446 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							12
							</td>
							<td class="btm_table_td">
							28
							</td>
							<td class="btm_table_td">
							125,446 SAR
							</td>
							<td class="btm_table_td">
							8,552 SAR
							</td>
							<td class="btm_table_td">
							11,480 SAR
							</td>
							<td class="btm_table_td">
							145,478 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							13
							</td>
							<td class="btm_table_td">
							29
							</td>
							<td class="btm_table_td">
							145,478 SAR
							</td>
							<td class="btm_table_td">
							8,979 SAR
							</td>
							<td class="btm_table_td">
							13,272 SAR
							</td>
							<td class="btm_table_td">
							167,729 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							14
							</td>
							<td class="btm_table_td">
							30
							</td>
							<td class="btm_table_td">
							167,729 SAR
							</td>
							<td class="btm_table_td">
							9,428 SAR
							</td>
							<td class="btm_table_td">
							15,261 SAR
							</td>
							<td class="btm_table_td">
							192,418 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							15
							</td>
							<td class="btm_table_td">
							31
							</td>
							<td class="btm_table_td">
							192,418 SAR
							</td>
							<td class="btm_table_td">
							9,900 SAR
							</td>
							<td class="btm_table_td">
							17,467 SAR
							</td>
							<td class="btm_table_td">
							219,785 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							16
							</td>
							<td class="btm_table_td">
							32
							</td>
							<td class="btm_table_td">
							219,785 SAR
							</td>
							<td class="btm_table_td">
							10,395 SAR
							</td>
							<td class="btm_table_td">
							19,911 SAR
							</td>
							<td class="btm_table_td">
							250,091 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							17
							</td>
							<td class="btm_table_td">
							33
							</td>
							<td class="btm_table_td">
							250,091 SAR
							</td>
							<td class="btm_table_td">
							10,914 SAR
							</td>
							<td class="btm_table_td">
							22,616 SAR
							</td>
							<td class="btm_table_td">
							283,621 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							18
							</td>
							<td class="btm_table_td">
							34
							</td>
							<td class="btm_table_td">
							283,621 SAR
							</td>
							<td class="btm_table_td">
							11,460 SAR
							</td>
							<td class="btm_table_td">
							25,608 SAR
							</td>
							<td class="btm_table_td">
							320,689 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							19
							</td>
							<td class="btm_table_td">
							35
							</td>
							<td class="btm_table_td">
							320,689 SAR
							</td>
							<td class="btm_table_td">
							12,033 SAR
							</td>
							<td class="btm_table_td">
							28,913 SAR
							</td>
							<td class="btm_table_td">
							361,635 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							20
							</td>
							<td class="btm_table_td">
							36
							</td>
							<td class="btm_table_td">
							361,635 SAR
							</td>
							<td class="btm_table_td">
							12,635 SAR
							</td>
							<td class="btm_table_td">
							32,564 SAR
							</td>
							<td class="btm_table_td">
							406,834 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							21
							</td>
							<td class="btm_table_td">
							37
							</td>
							<td class="btm_table_td">
							406,834 SAR
							</td>
							<td class="btm_table_td">
							13,266 SAR
							</td>
							<td class="btm_table_td">
							36,592 SAR
							</td>
							<td class="btm_table_td">
							456,692 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							22
							</td>
							<td class="btm_table_td">
							38
							</td>
							<td class="btm_table_td">
							456,692 SAR
							</td>
							<td class="btm_table_td">
							13,930 SAR
							</td>
							<td class="btm_table_td">
							41,034 SAR
							</td>
							<td class="btm_table_td">
							511,656 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							23
							</td>
							<td class="btm_table_td">
							39
							</td>
							<td class="btm_table_td">
							511,656 SAR
							</td>
							<td class="btm_table_td">
							14,626 SAR
							</td>
							<td class="btm_table_td">
							45,929 SAR
							</td>
							<td class="btm_table_td">
							572,211 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							24
							</td>
							<td class="btm_table_td">
							40
							</td>
							<td class="btm_table_td">
							572,211 SAR
							</td>
							<td class="btm_table_td">
							15,358 SAR
							</td>
							<td class="btm_table_td">
							51,320 SAR
							</td>
							<td class="btm_table_td">
							638,889 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							25
							</td>
							<td class="btm_table_td">
							41
							</td>
							<td class="btm_table_td">
							638,889 SAR
							</td>
							<td class="btm_table_td">
							16,125 SAR
							</td>
							<td class="btm_table_td">
							57,255 SAR
							</td>
							<td class="btm_table_td">
							712,269 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							26
							</td>
							<td class="btm_table_td">
							42
							</td>
							<td class="btm_table_td">
							712,269 SAR
							</td>
							<td class="btm_table_td">
							16,932 SAR
							</td>
							<td class="btm_table_td">
							63,785 SAR
							</td>
							<td class="btm_table_td">
							792,986 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							27
							</td>
							<td class="btm_table_td">
							43
							</td>
							<td class="btm_table_td">
							792,986 SAR
							</td>
							<td class="btm_table_td">
							17,778 SAR
							</td>
							<td class="btm_table_td">
							70,966 SAR
							</td>
							<td class="btm_table_td">
							881,730 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							28
							</td>
							<td class="btm_table_td">
							44
							</td>
							<td class="btm_table_td">
							881,730 SAR
							</td>
							<td class="btm_table_td">
							18,667 SAR
							</td>
							<td class="btm_table_td">
							78,859 SAR
							</td>
							<td class="btm_table_td">
							979,257 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							29
							</td>
							<td class="btm_table_td">
							45
							</td>
							<td class="btm_table_td">
							979,257 SAR
							</td>
							<td class="btm_table_td">
							19,601 SAR
							</td>
							<td class="btm_table_td">
							87,532 SAR
							</td>
							<td class="btm_table_td">
							1,086,389 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							30
							</td>
							<td class="btm_table_td">
							46
							</td>
							<td class="btm_table_td">
							1,086,389 SAR
							</td>
							<td class="btm_table_td">
							20,581 SAR
							</td>
							<td class="btm_table_td">
							97,056 SAR
							</td>
							<td class="btm_table_td">
							1,204,026 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							31
							</td>
							<td class="btm_table_td">
							47
							</td>
							<td class="btm_table_td">
							1,204,026 SAR
							</td>
							<td class="btm_table_td">
							21,610 SAR
							</td>
							<td class="btm_table_td">
							107,513 SAR
							</td>
							<td class="btm_table_td">
							1,333,148 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							32
							</td>
							<td class="btm_table_td">
							48
							</td>
							<td class="btm_table_td">
							1,333,148 SAR
							</td>
							<td class="btm_table_td">
							22,690 SAR
							</td>
							<td class="btm_table_td">
							118,988 SAR
							</td>
							<td class="btm_table_td">
							1,474,826 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							33
							</td>
							<td class="btm_table_td">
							49
							</td>
							<td class="btm_table_td">
							1,474,826 SAR
							</td>
							<td class="btm_table_td">
							23,825 SAR
							</td>
							<td class="btm_table_td">
							131,576 SAR
							</td>
							<td class="btm_table_td">
							1,630,227 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							34
							</td>
							<td class="btm_table_td">
							50
							</td>
							<td class="btm_table_td">
							1,630,227 SAR
							</td>
							<td class="btm_table_td">
							25,016 SAR
							</td>
							<td class="btm_table_td">
							145,382 SAR
							</td>
							<td class="btm_table_td">
							1,800,625 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							35
							</td>
							<td class="btm_table_td">
							51
							</td>
							<td class="btm_table_td">
							1,800,625 SAR
							</td>
							<td class="btm_table_td">
							26,267 SAR
							</td>
							<td class="btm_table_td">
							160,518 SAR
							</td>
							<td class="btm_table_td">
							1,987,409 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							36
							</td>
							<td class="btm_table_td">
							52
							</td>
							<td class="btm_table_td">
							1,987,409 SAR
							</td>
							<td class="btm_table_td">
							27,580 SAR
							</td>
							<td class="btm_table_td">
							177,106 SAR
							</td>
							<td class="btm_table_td">
							2,192,096 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							37
							</td>
							<td class="btm_table_td">
							53
							</td>
							<td class="btm_table_td">
							2,192,096 SAR
							</td>
							<td class="btm_table_td">
							28,959 SAR
							</td>
							<td class="btm_table_td">
							195,282 SAR
							</td>
							<td class="btm_table_td">
							2,416,337 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							38
							</td>
							<td class="btm_table_td">
							54
							</td>
							<td class="btm_table_td">
							2,416,337 SAR
							</td>
							<td class="btm_table_td">
							30,407 SAR
							</td>
							<td class="btm_table_td">
							215,191 SAR
							</td>
							<td class="btm_table_td">
							2,661,935 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							39
							</td>
							<td class="btm_table_td">
							55
							</td>
							<td class="btm_table_td">
							2,661,935 SAR
							</td>
							<td class="btm_table_td">
							31,927 SAR
							</td>
							<td class="btm_table_td">
							236,994 SAR
							</td>
							<td class="btm_table_td">
							2,930,856 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							40
							</td>
							<td class="btm_table_td">
							56
							</td>
							<td class="btm_table_td">
							2,930,856 SAR
							</td>
							<td class="btm_table_td">
							33,524 SAR
							</td>
							<td class="btm_table_td">
							260,864 SAR
							</td>
							<td class="btm_table_td">
							3,225,244 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							41
							</td>
							<td class="btm_table_td">
							57
							</td>
							<td class="btm_table_td">
							3,225,244 SAR
							</td>
							<td class="btm_table_td">
							35,200 SAR
							</td>
							<td class="btm_table_td">
							286,992 SAR
							</td>
							<td class="btm_table_td">
							3,547,436 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							42
							</td>
							<td class="btm_table_td">
							58
							</td>
							<td class="btm_table_td">
							3,547,436 SAR
							</td>
							<td class="btm_table_td">
							36,960 SAR
							</td>
							<td class="btm_table_td">
							315,584 SAR
							</td>
							<td class="btm_table_td">
							3,899,980 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							43
							</td>
							<td class="btm_table_td">
							59
							</td>
							<td class="btm_table_td">
							3,899,980 SAR
							</td>
							<td class="btm_table_td">
							38,808 SAR
							</td>
							<td class="btm_table_td">
							346,865 SAR
							</td>
							<td class="btm_table_td">
							4,285,653 SAR
							</td>
							</tr>

							<tr class="highlight">
							<td class="btm_table_td">
							44
							</td>
							<td class="btm_table_td">
							60
							</td>
							<td class="btm_table_td">
							4,285,653 SAR
							</td>
							<td class="btm_table_td">
							0 SAR
							</td>
							<td class="btm_table_td">
							379,280 SAR
							</td>
							<td class="btm_table_td">
							4,664,933 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							45
							</td>
							<td class="btm_table_td">
							61
							</td>
							<td class="btm_table_td">
							4,664,933 SAR
							</td>
							<td class="btm_table_td">
							0 SAR
							</td>
							<td class="btm_table_td">
							186,597 SAR
							</td>
							<td class="btm_table_td">
							4,851,531 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							46
							</td>
							<td class="btm_table_td">
							62
							</td>
							<td class="btm_table_td">
							4,851,531 SAR
							</td>
							<td class="btm_table_td">
							0 SAR
							</td>
							<td class="btm_table_td">
							194,061 SAR
							</td>
							<td class="btm_table_td">
							5,045,592 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							47
							</td>
							<td class="btm_table_td">
							63
							</td>
							<td class="btm_table_td">
							5,045,592 SAR
							</td>
							<td class="btm_table_td">
							0 SAR
							</td>
							<td class="btm_table_td">
							201,824 SAR
							</td>
							<td class="btm_table_td">
							5,247,416 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							48
							</td>
							<td class="btm_table_td">
							64
							</td>
							<td class="btm_table_td">
							5,247,416 SAR
							</td>
							<td class="btm_table_td">
							0 SAR
							</td>
							<td class="btm_table_td">
							209,897 SAR
							</td>
							<td class="btm_table_td">
							5,457,312 SAR
							</td>
							</tr>

							<tr>
							<td class="btm_table_td">
							49
							</td>
							<td class="btm_table_td">
							65
							</td>
							<td class="btm_table_td">
							5,457,312 SAR
							</td>
							<td class="btm_table_td">
							0 SAR
							</td>
							<td class="btm_table_td">
							218,292 SAR
							</td>
							<td class="btm_table_td">
							5,675,605 SAR
							</td>
							</tr>

						</tbody>
					</table>
		      	</div>
		    </div>
		</div>

		<br><br><br>
		{{-- <p class="text-center mr-5">{{ trans('lang.thokhor_dot_com') }}</p> --}}
	</div>



	{{-- Page 8 start --}}


	<div id="parent-report" class="container-fluid b-shadow mb-5 background_effect" style="background-image: url('{{ asset('frontend_assets/assets/img/report/report-clouds-full-bg-2.svg') }}')" {{ $not_found ?? '' }}>
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<br><br><br><br><br>
				<h2 class="mt-5 pt-5 mb-4">
	                {{ 'thokhor' }}
	                {{-- {{ althraa_site_title() }} --}}
	            </h2>
	            <br><br>
	            <h1 class="heading-main">{{ trans('lang.report.Investing_Plan') }}</h1>
	            
			</div>
		</div>

		<div class="row investing-plan">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<p class="text-secondary mt-5">{{ trans('lang.report.Investments_Seletion') }}</p>
				<table class="tbl-assumptions">
					<thead>
						<tr>
							<th>{{ trans('lang.report.ASSET_CLASS') }}</th>
							<th>{{ trans('lang.report.OOPTION_1') }}</th>
							<th>{{ trans('lang.report.OOPTION_2') }}</th>
							<th>{{ trans('lang.report.OOPTION_3') }}</th>
						</tr>
					</thead>
					<tr>
						<td>{{ trans('lang.report.cash_and_equivalent') }}</td>
						<td class="blur">(012013) صندوق الراجحي للمضاربة بالبضائع بالريال</td>
						<td class="blur">(045002) صندوق الأهلي للمتاجرة بالريال السعودي</td>
						<td class="blur">(159002) صندوق ألفا للمرابحة</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.equities') }}</td>
						<td class="blur">iShares MSCI USA Islamic UCITS ETF</td>
						<td class="blur">(030003) صندوق جدوى للأسهم السعودية - الفئة ب</td>
						<td class="blur">(9400) صندوق فالكم المتداول للأسهم السعودية</td>
					</tr>
					<tr>
						{{-- @dd($constants) --}}
						<td>{{ trans('lang.report.fix_income') }}</td>
						<td class="blur">(009045) صندوق سامبا لصكوك الشركات-فئة ب</td>
						<td class="blur">(012036) صندوق الراجحي للصكوك</td>
						<td class="blur">(9404) صندوق الإنماء المتداول للصكوك</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.alternative_investment') }}</td>
						<td class="blur">(4339) صندوق دراية ريت</td>
						<td class="blur">(4348) صندوق الخبير ريت</td>
						<td class="blur">(9405) صندوق البلاد المتداول للمتاجرة بالذهب</td>
					</tr>
					{{-- <tr>
						<td>{{ trans('lang.report.total') }}</td>
						@foreach($constants->where('constant_meta_type', 'Asset Class (Total)') as $constant)
							<td >{{ $constant->constant_value }}</td>
						@endforeach
					</tr> --}}
					
				</table>
			</div>
			
		</div>


		<div class="row investing-plan">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<p class="text-secondary mt-5">{{ trans('lang.report.Capitel_Deployment') }}</p>
				<table>
					<thead>
						<tr>
							<th>{{ trans('lang.report.ASSET_CLASS') }}</th>
							<th>{{ trans('lang.report.PAYMENTS') }}</th>
							<th>{{ trans('lang.report.NO_OF_FUNDS') }}</th>
							<th>{{ trans('lang.report.ASSET_ALLOCATION') }}</th>
							<th>{{ trans('lang.report.INVESABLE_AMOUNT') }}</th>
						</tr>
					</thead>
					<tr>
						{{-- @dd($constants->where('constant_attribute', 'Number Of Funds 1')->first()->constant_value) --}}

						<td>{{ trans('lang.report.cash_and_equivalent') }}</td>
						<td class="blur">{{ trans('lang.report.1_payment') }}</td>
						<td class="blur">1</td>
						<td class="blur">10 %</td>
						<td class="blur">500 SAR</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.equities') }}</td>
						<td class="blur">{{ trans('lang.report.4_payment_over_one_year') }}</td>
						<td class="blur">2</td>
						<td class="blur">55 %</td>
						<td class="blur">2,750 SAR </td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.fix_income') }}</td>
						<td class="blur">{{ trans('lang.report.1_payment') }}</td>
						<td class="blur">1</td>
						<td class="blur">15 %</td>
						<td class="blur">750 SAR</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.alternative_investment') }}</td>
						<td class="blur">{{ trans('lang.report.Manual_process') }}</td>
						<td class="blur">2</td>
						<td class="blur">20 %</td>
						<td class="blur">1,000 SAR</td>
					</tr>
					<tr>
						<td>{{ trans('lang.report.Total') }}</td>
						<td class="blur"></td>
						<td class="blur">6</td>
						<td class="blur">100 %</td>
						<td class="blur">5,000 SAR </td>
					</tr>
					
					
					
				</table>

				<div class="mt-5">
					<a href="https://www.surveymonkey.com/r/3MX5GTV" target="_blank" class="survey_link" >{{ trans('lang.report.please_could_you_response_to_the_following_survey') }}</a>
				</div>

			</div>
			
		</div>
		

		<br><br><br><br><br>
		<br><br><br><br><br>
		<br><br><br><br><br>
		
	</div>




	{{-- Page 9 start --}}


	<div id="disclaimer" class="container-fluid b-shadow parent-report background_effect" style="background-image: url('{{ asset('frontend_assets/assets/img/report/report-clouds-full-bg-2.svg') }}')" >
		<div class="row">
			<div class="col-1 rem-col"></div>
			<div class="col-10">
				{{-- <br><br><br><br><br> --}}
				<h2 class="mt-5 mb-2">
	                {{ 'thokhor' }}
	                {{-- {{ althraa_site_title() }} --}}
	            </h2>

	          
	            
	            <h1 class="heading-main text-center">{{ trans('lang.disclaimer') }}</h1>

	             <div class="text-center">
	           	 <img src="{{ asset('frontend_assets/assets/img/report/disclaimer.svg')}}" style="width: 40%" alt="">
	           </div>
	            
			</div>
		</div>


		{{-- @if($request->segment(1) == 'en')
			<div class="row mt-2">
				<div class="col-1 rem-col"></div>
				<div class="col-10 to-12">

					<h1>{{ trans('lang.frontend_legal.about_our_services') }}</h1>
	            	<p class="text-justify">{{ trans('lang.frontend_legal.about_our_services_text') }}</p>
	            	<br>


		            <h1>{{ trans('lang.frontend_legal.purpose') }}</h1>
		            <p class="text-justify">{{ trans('lang.frontend_legal.purpose_text') }}</p>
		            <br>

		            <h1>{{ trans('lang.frontend_legal.stake_and_responsabilities') }}</h1>
	                <p class="text-justify">{{ trans('lang.frontend_legal.stake_and_responsabilities_text_1') }}</p>
	                
	                <p class="text-justify">{{ trans('lang.frontend_legal.stake_and_responsabilities_text_2') }}</p>
	                

				</div>
			</div>
		@else --}}
			<div class="row mt-2">
					<div class="col-1 rem-col"></div>
					<div class="col-10 to-12">
						<br><br><br>
					
						<p class="text-justify">{{ trans('lang.pdf_disclaimer') }}</p>
						<p class="text-justify">{{ trans('lang.pdf_disclaimer_para_2') }}</p>
						<ol class="disclaimer">
							<li><p class="text-justify" >{{ trans('lang.pdf_disclaimer_li_1') }}</p></li>
							<li><p class="text-justify" >{{ trans('lang.pdf_disclaimer_li_2') }}</p></li>
							<li><p class="text-justify" >{{ trans('lang.pdf_disclaimer_li_3') }}</p></li>
							<li><p class="text-justify" >{{ trans('lang.pdf_disclaimer_li_4') }}</p></li>
						</ol>
						<p class="text-justify">{{ trans('lang.pdf_disclaimer_para_3') }}</p>
						<br><br><br>
						<br><br><br>
					</div>
			</div>
		{{-- @endif --}}

		{{-- <p class="text-center mr-5">{{ trans('lang.thokhor_dot_com') }}</p> --}}
	</div>

</div>


@endsection

@section('scripts')
{{-- <script src="html2pdf.bundle.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.1/html2pdf.bundle.min.js" integrity="sha512-vDKWohFHe2vkVWXHp3tKvIxxXg0pJxeid5eo+UjdjME3DBFBn2F8yWOE0XmiFcFbXxrEOR1JriWEno5Ckpn15A==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

{{-- <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script> --}}


<script>
// $(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
// });
</script>


<script type="text/javascript">
$(document).ready(function(){
	setTimeout(
		function() {
			// window.print();
			// $("br").remove();
			// $("body").remove();
			// window.close();
			// window.top.close();
			// $("#parent-report").addClass('container');

			// var element = document.getElementById('printable');
			// html2pdf(element);

		},
	2000);
});
</script>

<script type="text/javascript">
/////////////////////////////////////
/*
|-------------------------------
|		Donut Chart Selected Asset
|-------------------------------
*/
var ctx = document.getElementById("DonutChartSelectedAsset");
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: [
    	'Cash and Equivalent', 
    	'Equities', 
    	'Fix income', 
    	'Alternative investments',
    ],
    datasets: [{
		label: [
			'Cash and Equivalent', 
			'Equities', 
			'Fix income', 
			'Alternative investments',
		],
		data: [20, 40, 51, 90, 20, 0, 10],
		
		backgroundColor: [
			'#3B83FF',
			'#2dd782',
			'#FFE700',
			'#01baef',
		],
		borderColor: [
			'#3B83FF',
			'#2dd782',
			'#FFE700',
			'#01baef',
		],
		borderWidth: 1
		}]
  },
  options: {
  	aspectRatio: 1,
   	cutoutPercentage: 60,
    responsive: true,
    legend: { 
    	position: 'none',
    },
}
});







/////////////////////////////////////
/*
|-------------------------------
|		Donut Chart Selected Asset Recommended
|-------------------------------
*/
var ctx = document.getElementById("DonutChartSelectedAssetRecommended");
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: [
    	'Cash and Equivalent', 
    	'Equities', 
    	'Fix income', 
    	'Alternative investments',
    	
    ],
    datasets: [{
		label: [
			'Cash and Equivalent', 
	    	'Equities', 
	    	'Fix income', 
	    	'Alternative investments',
	    	
		],
		data: [20, 40, 51, 90, 20, 0, 10],
		
		backgroundColor: [
			'#3B83FF',
			'#2dd782',
			'#FFE700',
			'#01baef',
			
		],
		borderColor: [
			'#3B83FF',
			'#2dd782',
			'#FFE700',
			'#01baef',
			
		],
		borderWidth: 1
		}]
  },
  options: {
   	cutoutPercentage: 60,
    responsive: true,
    legend: { 
    	position: 'none',
    },
}
});







/////////////////////////////////////
/*
|-------------------------------
|		Financial Forecast
|-------------------------------
*/

var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels:[20, 40, 51, 90, 20, 0, 10],
        datasets: [{
              type: 'line',
              label: 'Before Retirement',
               "fill": false,
               "lineTension": 0.1,
               "backgroundColor": [
                "#ff0e0e"
                
               ],
               "borderColor": [
                "#ff0e0e"
               ],
               "borderCapStyle": "butt",
               "borderDash": [],
               "borderDashOffset": 0,
               "borderJoinStyle": "miter",
               "pointBorderColor": [
                "#ff0e0e"
               ],
               "pointBackgroundColor": "#ffffff00",
               "pointBorderWidth": 1,
               "pointHoverRadius": 5,
               "pointHoverBackgroundColor": "#ff0e0e",
               "pointHoverBorderColor": "#ff0e0e",
               "pointHoverBorderWidth": 2,
               "pointRadius": 1,
               "pointHitRadius": 10,
			   data: [20, 40, 51, 90, 20, 0, 10],
            },{
            label: 'Contribution',
            data: [20, 40, 51, 90, 20, 0, 10],
            backgroundColor: '#2dd782',
            borderColor: '#2dd782',
            borderWidth: 1
        	},{
          	type: 'line',
            backgroundColor: '#ff87a0',
            borderColor: '#ff87a0',
            data: [20, 40, 51, 90, 20, 0, 10],

            "lineTension": 0.1,
             "backgroundColor": [
              "#f0f0f0fa"
              
             ],
             "borderColor": [
              "#f0f0f0fa"
             ],
             "borderCapStyle": "butt",
             "borderDash": [],
             "borderDashOffset": 0,
             "borderJoinStyle": "miter",
             "pointBorderColor": [
              "#f0f0f0fa"
             ],
             "pointBackgroundColor": "#ffffff00",
             "pointBorderWidth": 1,
             "pointHoverRadius": 5,
             "pointHoverBackgroundColor": "#f0f0f0fa",
             "pointHoverBorderColor": "#f0f0f0fa",
             "pointHoverBorderWidth": 2,
             "pointRadius": 1,
             "pointHitRadius": 10,
            label: 'Maximum Uncertainty',
            fill: '+1'
          }, {
            type: 'line',
            backgroundColor: '#9966ff',
            borderColor: '#9966ff',
			data: [20, 40, 51, 90, 20, 0, 10],
            "fill": false,
             "lineTension": 0.1,
             "backgroundColor": [
              "#f0f0f0fa"
              
             ],
             "borderColor": [
              "#f0f0f0fa"
             ],
             "borderCapStyle": "butt",
             "borderDash": [],
             "borderDashOffset": 0,
             "borderJoinStyle": "miter",
             "pointBorderColor": [
              "#f0f0f0fa"
             ],
             "pointBackgroundColor": "#ffffff00",
             "pointBorderWidth": 1,
             "pointHoverRadius": 5,
             "pointHoverBackgroundColor": "#f0f0f0fa",
             "pointHoverBorderColor": "#f0f0f0fa",
             "pointHoverBorderWidth": 2,
             "pointRadius": 1,
             "pointHitRadius": 10,
            label: 'Minimum Uncertainty',
            fill: false
          }
        ]
    },
    options: {
        maintainAspectRatio: true,
        legend: {
            position: "bottom"
        },
        legend: {
	        display: false
	    },
	    tooltips: {
	        callbacks: {
	           label: function(tooltipItem) {
	           		if($(window).width() < 760){
                        return tooltipItem.yLabel;
                    }
                    else{
                    }
                      
	           }
	        }
	    },

        scales: {
            yAxes: [{
                  display: true,
                  position: 'right',
                ticks: {
                    fontColor: "rgba(0,0,0,0.5)",
                    fontStyle: "bold",
                    beginAtZero: true,
                    maxTicksLimit: 20,
                    padding: 20,
                    // userCallback: function(value, index, values) {
                    //     value = value.toString();
                    //     if($(window).width() < 760)
                    //       return value;
                    //     else
                    //       return 'SAR ' + value;
                    // },
                    userCallback: function(tick, index, array) {
                      if($(window).width() < 760){
                        return (index % 3) ? "" : tick;
                      }
                      else{
                        return (index % 2) ? "" : 'SAR ' + (Math.round(tick * 100) / 100).toLocaleString();
                      }
                    }
                },
                gridLines: {
                    drawTicks: false,
                    display: false
                }

            }],
            xAxes: [{
                gridLines: {
                    zeroLineColor: "transparent"
                },
                ticks: {
                    padding: 20,
                    fontColor: "rgba(0,0,0,0.5)",
                    fontStyle: "bold",
                    callback: function(tick, index, array) {
                      if($(window).width() < 760){
                        return (index % 3) ? "" : tick;
                      }
                      else{
                        return (index % 1) ? "" : tick;
                      }
                    }
                    
                }
            }]
        },
        responsive: true,
        plugins: {
          filler: {
            propagate: false
          },
          'samples-filler-analyser': {
            target: 'chart-analyser'
          }
        }
    }
    // options: {
    //     scales: {
    //         yAxes: [{
    //             ticks: {
    //                 beginAtZero: true
    //             }
    //         }]
    //     }
    // }
});
</script>

<script type="text/javascript">
// function addScript(url) {
    // var script = document.createElement('script');
    // script.type = 'application/javascript';
    // script.src = url;
    // document.head.appendChild(script);
// }
// addScript('{{ asset('backend_assets/dashboard/js/print.js') }}');

$(document).ready(function(){
	setTimeout(
		function() {			
			// html2pdf(document.body, {
			//   pagebreak: { mode: 'avoid-all' , before: '#table-break', }
			// });
		},
	500);
});

$(document).ready(function(){
	setTimeout(
		function() {
			function myFunction(x) {

				if (x.matches) { // If media query matches
				    // $('.col-1').removeClass('col-1');
				    $('.col-5').toggleClass('col-12');
				    $('.rem-col').remove();
				    // $('.col-5').toggleClass('col-10');
				    $('.col-9.factor').removeClass('col-9').addClass('col-12');
				    $('.col-10.to-12').removeClass('col-10').addClass('col-12');
				    $('.col-8.to-10').removeClass('col-8').addClass('col-10');
				    $('#HTMLtoPDF:not(.background_effect) > div').addClass('container');
				 } 
				}

				var x = window.matchMedia("(max-width: 700px)")
				myFunction(x) // Call listener function at run time
				x.addListener(myFunction) // Attach listener function on state changes
		},
	1000);
});

</script>

@endsection