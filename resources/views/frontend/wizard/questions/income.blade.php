
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
					Data 1
					</span>
					</span>
					</a>
				</li>
				<li class="nav-item nav-item-3">
					<a class="text-{{$align}} nav-link active" data-toggle="tab" href="#menu1">
					<span class="step-parent" data-bar="3"></span>
					<span class="step-text">
					<span>
					الدخل السنوي
					</span>
					</span>
					</a>
				</li>
				
			</ul>
			<div class="horizontal-line">
				<div class="step-parent-bar step-parent-bar-1"></div>
				<div class="step-parent-bar step-parent-bar-2"></div>
				<div class="step-parent-bar step-parent-bar-3"></div>
				
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
						@include('frontend.components.breadcrumb' , ['heading' => 'الباقة الذهبية '])
						<div class="card card-shadow has-bg-right">
							<div class="card-body p-0">
								<div class="row row-grid">
									<div class="col-12 col-lg-7">
										<div class="p-4">
											<p class="text-muted mb-0">
											<h4 class="txt-blue-light text-{{$align}} font-arabic">
												هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غـير منظم، منسق، أو حتى مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً  هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غـير منظم،
											</h4>
										</div>
									</div>
									<div class="col-12 col-lg-5 text-center">
										<!-- Image -->
										<figure class="w-100 div-wrapper">
											<img alt="" src="{{ asset('frontend_assets/assets/img/new/income/bg-1.svg') }}" class="img-fluid">
										</figure>
									</div>
								</div>
							</div>
						</div>
						<h3 class="txt-blue-light text-{{$align}} font-arabic">
							{{ trans('lang.income.Annual Income') }}
						</h3>
						<form id="qform" action="{{ route('wizard', locale()) }}" class="mt-3" method="POST">
							@csrf
							<input type="hidden" name="location" value="income">
							<div class="row w-form-inputs">
								<div class="col-md-9">
									<div class="form-group form-group-new mb-0">										

										@include('frontend.inputs.input_group', [
                                                'type'  => 'text', 
                                                'name'  => 'income[income]', 
                                                'value' => currency($user_questionnaire->income["income"]["income"] ?? '', 0),
                                                'old_val' => "investing_amount.monthly_amount",
                                                'placeholder' => 'المبلغ بالريال', 
                                                'label' => trans('lang.wizard_q.Annual Income'),

                                        ])

									</div>
								</div>
								<div class="col-md-3">
									<button type="submit" class="btn-{{$align}} btn f-{{$align}} btn-big btn-gradient btn-rad35 btn-primary with-arrow stick_to_bottom" style="{{$align}}: 15px;">
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
							<a class="text-{{ $alignreverse }} nav-link active" href="#income">
							<span class="step-parent step-parent-1" data-bar="1"></span>
							<span class="step-text">
								<span>
									{{ trans('lang.question_headings.income') }}
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item" data-id="1">
							<a class="text-{{ $alignreverse }} nav-link redirect" href="#net-worth">
							<span class="step-parent" data-bar="2"></span>
							<span class="step-text">
								<span>
									{{ trans('lang.question_headings.net_assets') }}
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{ $alignreverse }} nav-link redirect" href="#gosi">
							<span class="step-parent" data-bar="6"></span>
							<span class="step-text">
								<span>
									{{ trans('lang.question_headings.gosi') }}
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{ $alignreverse }} nav-link redirect" href="#investing-plan">
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
							<a class="text-{{ $alignreverse }} nav-link" href="#consultations">
							<span class="step-parent" data-bar="9"></span>
							<span class="step-text">
								<span>
									{{ trans('lang.question_headings.Counseling session') }}
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{ $alignreverse }} nav-link" href="#report">
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
	window.start_point_bar = 1;
	window.location.hash = '#income';

</script>

@include('frontend.partials.wizard_script')
