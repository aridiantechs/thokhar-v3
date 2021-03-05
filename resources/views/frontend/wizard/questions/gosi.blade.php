
<section class="slice py-3 pb-5 fix-height" id="income">
	<div class="mt-5">
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
						@include('frontend.components.breadcrumb' , ['heading' => 'هل لديك مال نقدا؟   '])

						<div class="card card-shadow has-bg-right bg-1">
							<div class="card-body p-0">

								<div class="row row-grid">

									<div class="col-12 col-md-7 col-lg-6">

										<div class="p-5 pl-lg-0">
											<h1 class="display-4 text-center text-md-right mb-3 ">
												<strong class="text-primary-1 font-arabic">مقدمة </strong>
											</h1>
											<h4 class="txt-blue-light text-{{$align}} font-arabic">
											هذا النـص يمكـن أن يتـــم تركيبه على أي تصمـــــيم دون مشكــــــلة فلن يبدو وكأنه نص منسوخ، غــــــير منظم، غير منسق، أو حتى مفهوم. لأنه مــــــازال نصاً بديلاً ومؤقتاً
											</h4>
										</div>

									</div>

									<div class="col-12 col-md-5 col-lg-6 text-left d-flex align-items-end">
										<figure class="w-100 div-wrapper">
											<img alt="" src="{{ asset('frontend_assets/assets/img/new/goci/img-1.svg') }}" class="img-fluid">
										</figure>
									</div>
									
								</div>

							</div>
						</div>

						
						
						<form id="qform" action="{{ route('wizard', locale()) }}" class="mt-3" method="POST">
							@csrf
							<input type="hidden" name="location" value="gosi">
							<div class="row w-form-inputs">
								<div class="col-md-3">
									<div class="form-group form-group-new mb-0">
										@include('frontend.inputs.input_group', [
                                                'type' => 'text', 
                                                'name' => 'gosi[strating_year_in_plan]', 
                                                'value' => $user_questionnaire->gosi["gosi"]["strating_year_in_plan"] ?? '',
                                                'old_val' => "gosi.strating_year_in_plan",
                                                'placeholder' => 'المبلغ بالريال', 
                                                'icon' => 'calendar',
                                                'id' => 'datepicker',

                                        ])
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group form-group-new mb-0">
										@include('frontend.inputs.input_group', [
                                                'type' => 'text', 
                                                'name' => 'gosi[expecting_salary_at_retirement]', 
                                                'value' => currency($user_questionnaire->gosi["gosi"]["expecting_salary_at_retirement"] ?? '', 0),
                                                'old_val' => "gosi.expecting_salary_at_retirement",
                                                'placeholder' => 'المبلغ بالريال', 
                                                'no_icon' => true,

                                        ])
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group form-group-new mb-0">
										@include('frontend.inputs.input_group', [
                                                'type' => 'text', 
                                                'name' => 'gosi[monthly_subscription]', 
                                                'value' => currency($user_questionnaire->gosi["gosi"]["monthly_subscription"] ?? '', 0),
                                                'old_val' => "gosi.monthly_subscription",
                                                'placeholder' => 'المبلغ بالريال', 
                                                'no_icon' => true,

                                        ])
									</div>
								</div>
								<div class="col-md-3">
									<button type="submit" class="btn-{{$align}} btn f-{{$align}} btn-big btn-gradient btn-rad35 btn-primary with-arrow">
										{{-- <i class="fa fa-arrow-{{$align}}"></i> --}}
										<span class="d-inline-block p-0-1">التالي</span>
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
								الدخل السنوي
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item" data-id="1">
							<a class="text-{{ $alignreverse }} nav-link success" href="#net-worth">
							<span class="step-parent" data-bar="2"></span>
							<span class="step-text">
								<span>
								صافي الثروة
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{ $alignreverse }} nav-link active" href="#gosi">
							<span class="step-parent" data-bar="6"></span>
							<span class="step-text">
								<span>
								التأمينات الاجتماعية
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{ $alignreverse }} nav-link redirect" href="#investing-plan">
							<span class="step-parent" data-bar="7"></span>
							<span class="step-text">
								<span>
								خطة الاستثمار
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{ $alignreverse }} nav-link redirect" href="#risk">
							<span class="step-parent" data-bar="8"></span>
							<span class="step-text">
								<span>
								المخاطر
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{ $alignreverse }} nav-link" data-toggle="tab" href="#consultations">
							<span class="step-parent" data-bar="9"></span>
							<span class="step-text">
								<span>
								جلسة الاستشارة
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{ $alignreverse }} nav-link" data-toggle="tab" href="#">
							<span class="step-parent" data-bar="10"></span>
							<span class="step-text">
								<span>
								التقرير
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
	window.start_point_bar = 3;
	window.location.hash = '#gosi';

	$("#datepicker").datepicker({
	    format: "yyyy",
	    viewMode: "years", 
	    minViewMode: "years",
	    endDate: '+0d',

	});
</script>

@include('frontend.partials.wizard_script')
