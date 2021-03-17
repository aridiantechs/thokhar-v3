<style type="text/css">
.div-wrapper{
    height: unset;
}
</style>

<section class="slice py-3 pb-5 fix-height" id="income">
	<div class="mt-2">
		<div class="nav-tabs-wrapper mt-5 mobile d-block d-lg-none">
			<ul class="nav nav-tabs d-flex align-items-center">
				<li class="nav-item nav-item-1">
					<a class="text-{{$align}} nav-link" href="#">
						<span class="step-parent" data-bar="1"></span>
					</a>
				</li>
				<li class="nav-item nav-item-2">
					<a class="text-{{$align}} nav-link" href="#">
					<span class="step-parent" data-bar="2"></span>
					<span class="step-text">
					<span>
					Data
					</span>
					</span>
					</a>
				</li>
				<li class="nav-item nav-item-3">
					<a class="text-{{$align}} nav-link active" data-toggle="tab" href="#menu1">
					<span class="step-parent" data-bar="3"></span>
					<span class="step-text">
					<span>
					التأمينات الاجتماعية
					</span>
					</span>
					</a>
				</li>
				
			</ul>
			<div class="horizontal-line">
				<div class="step-parent-bar step-parent-bar-1" ></div>
				<div class="step-parent-bar step-parent-bar-2" ></div>
				<div class="step-parent-bar step-parent-bar-3" ></div>
				<div class="step-parent-bar step-parent-bar-4" ></div>
				<div class="step-parent-bar step-parent-bar-5 success" ></div>
				
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row row-grid">
			<div class="col-12 col-lg-9 {{-- order-md-1 --}} pr-md-5">
				@include('frontend.notifications.ajax-warning')
				<div class="tab-content">
					<div id="home" class="container tab-pane active">
						<br>
						@include('frontend.components.breadcrumb' , ['heading' => trans('lang.wizard_q.Do you have money')])

						<div class="card card-shadow has-bg-right bg-1">
							<div class="card-body p-0">

								<div class="row row-grid">

									<div class="col-12 col-md-7 col-lg-6">

										<div class="p-3">
											<h1 class="display-4 text-center text-md-{{$align}} mb-3 ">
												<strong class="text-primary-1 font-arabic">{{ trans('lang.awareness.Reach To The Financial Freedom') }} </strong>
											</h1>
											<h4 class="txt-blue-light text-{{$align}} font-arabic">
												هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.

											</h4>
										</div>

									</div>

									<div class="col-12 col-md-5 col-lg-6 text-left d-flex align-items-end">
										<figure class="w-100 div-wrapper">
											<img alt="" src="{{ asset('frontend_assets/assets/img/new/investment-plan/img-1.svg') }}" class="img-fluid">
										</figure>
									</div>
									
								</div>

							</div>
						</div>

						
						
						<form id="qform" action="{{ route('wizard', locale()) }}" class="mt-3" method="POST">
							@csrf
							<input type="hidden" name="location" value="investing">
							<div class="row w-form-inputs">
								
								<div class="col-md-6">
									<div class="form-group form-group-new mb-0">
										@include('frontend.inputs.input_group', [
                                                'type' => 'text', 
                                                'name' => 'saving_plan[current_saving_balance]', 
                                                'value' => currency($user_questionnaire->saving_plan["saving_plan"]["current_saving_balance"] ?? '', 0),
                                                'old_val' => "saving_plan.current_saving_balance",
                                                'placeholder' => 'المبلغ بالريال', 
                                                'no_icon' => true,
                                                'label' => trans('lang.wizard_q.Initial amount ( one time )')

                                        ])
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-group-new mb-0">
										@include('frontend.inputs.input_group', [
                                                'type' => 'text', 
                                                'name' => 'saving_plan[monthly_saving_plan_for_retirement]', 
                                                'value' => currency($user_questionnaire->saving_plan["saving_plan"]["monthly_saving_plan_for_retirement"] ?? '', 0),
                                                'old_val' => "saving_plan.monthly_saving_plan_for_retirement",
                                                'placeholder' => 'المبلغ بالريال', 
                                                'no_icon' => true,
                                                'label' => trans('lang.wizard_q.Monthly investing Payment')

                                        ])
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-group-new mb-0">
										@include('frontend.inputs.input_group', [
                                                'type' => 'text', 
                                                'name' => 'saving_plan[annual_increase_in_saving_plan]', 
                                                'value' => currency($user_questionnaire->saving_plan["saving_plan"]["annual_increase_in_saving_plan"] ?? '', 0),
                                                'old_val' => "saving_plan.annual_increase_in_saving_plan",
                                                'placeholder' => 'المبلغ بالريال', 
                                                'no_icon' => true,
                                                'label' => trans('lang.wizard_q.Magic of compounding returns')

                                        ])
									</div>
								</div>
								
								<div class="col-md-6">
									<button type="submit" class="btn-{{$align}} btn f-{{$align}} btn-big btn-gradient btn-rad35 btn-primary with-arrow stick_to_bottom" style="{{$align}}: 15px;">
										{{-- <i class="fa fa-arrow-{{$align}}"></i> --}}
										<span class="d-inline-block p-0-1">{{ trans('lang.question.next') }}</span>
										<i class="fa fa-arrow-{{$arrowAlign}}"></i>
									</button>
								</div>
							</div>
						</form>
					</div>
									   	
				</div>
			</div>
			<div class="col-12 col-lg-3 text-center">
				<!-- Desktop -->
				<div class="nav-tabs-wrapper desktop d-none d-lg-block">
					<ul class="nav nav-tabs d-block d-ltr">
						<li class="nav-item">
							<a class="text-{{ $alignreverse }} nav-link success" data-toggle="tab" href="#income">
							<span class="step-parent step-parent-1" data-bar="1"></span>
							<span class="step-text">
								<span>
									{{ trans('lang.question_headings.income') }}
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item" data-id="1">
							<a class="text-{{ $alignreverse }} nav-link success" href="#net-worth">
							<span class="step-parent" data-bar="2"></span>
							<span class="step-text">
								<span>
									{{ trans('lang.question_headings.net_assets') }}
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{ $alignreverse }} nav-link success" href="#gosi">
							<span class="step-parent" data-bar="6"></span>
							<span class="step-text">
								<span>
									{{ trans('lang.question_headings.gosi') }}
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{ $alignreverse }} nav-link active" href="#investing-plan">
							<span class="step-parent" data-bar="7"></span>
							<span class="step-text">
								<span>
									{{ trans('lang.question_headings.investing_plan') }}
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{ $alignreverse }} nav-link redirect" href="#risk">
							<span class="step-parent" data-bar="8"></span>
							<span class="step-text">
								<span>
									{{ trans('lang.question_headings.risk') }}
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{ $alignreverse }} nav-link" data-toggle="tab" href="#consultations">
							<span class="step-parent" data-bar="9"></span>
							<span class="step-text">
								<span>
									{{ trans('lang.question_headings.Counseling session') }}
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{ $alignreverse }} nav-link" data-toggle="tab" href="#report">
							<span class="step-parent" data-bar="10"></span>
							<span class="step-text">
								<span>
									{{ trans('lang.question_headings.report') }}
								</span>
							</span>
							</a>
						</li>
						
					</ul>
					
					<div class="vertical-line"></div>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	window.start_point_bar = 4;
	window.location.hash = '#investing-plan';

</script>

@include('frontend.partials.wizard_script')
