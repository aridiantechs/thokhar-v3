<style type="text/css">
	svg.feather.feather-calendar {
    color: #000000;
}
</style>
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
					<div id="home" class="container tab-pane active"><br>
                 		
                 		@include('frontend.components.breadcrumb' , ['heading' => 'هل لديك مال نقدا؟'])
						
                        <div class="py-5 pl-lg-0">
							<h3 class="txt-blue-light text-right font-arabic">
							هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.
							</h3>
						</div>

                        <form id="qform" action="{{ route('wizard', locale()) }}" class="mt-3" method="POST">
							@csrf
							<input type="hidden" name="location" value="income">
                            <div class="row">

                              	<div class="col-md-12">
                                  	<div class="font-1 text-{{$align}} mb-3" >الرجاء اختيار توقيت الجلسة الاستشارية</div>
                                 	<div class="row flex-column-reverse flex-md-row w-form-inputs">
										<div class="col-md-5">
											<div class="form-group form-group-new mb-0">
												<div class="input-group">
													@include('frontend.inputs.input_group', [
		                                                'type' => 'text', 
		                                                'name' => 'consultation_date', 
		                                                'value' => '',
		                                                'old_val' => 'consultation_date',
													 	'placeholder' => 'الراتب المتوقع عند التقاعد',
		                                                'icon' => 'calendar',
		                                                'id' => 'consultationdatepicker',
		                                                'class' => 'text-input'

		                                        	])
												</div>
											</div>
										</div>

                                        <div class="col-md-7">
											<div class="form-group form-group-new mb-0">
												@include('frontend.inputs.input_group', [
		                                                'type' => 'time', 
		                                                'name' => 'consultation_date', 
		                                                'value' => '',
		                                                'old_val' => 'consultation_date',
													 	'placeholder' => 'المبلغ المستقطع للتأمينات',
													 	'no_icon' => true,
		                                                'icon' => 'clock',
		                                                'id' => '',

		                                        	])
											
											</div>                                          
                                        </div>
                                    </div>
                                    <button type="submit" class="btn-{{$align}} btn f-{{$align}} btn-big btn-gradient btn-rad35 btn-primary with-arrow mt-4">
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
							<a class="text-{{ $alignreverse }} nav-link success" href="#home">
							<span class="step-parent step-parent-1" data-bar="1"></span>
							<span class="step-text">
								<span>
								الدخل السنوي
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item" data-id="1">
							<a class="text-{{ $alignreverse }} nav-link success redirect" href="#net-worth">
							<span class="step-parent" data-bar="2"></span>
							<span class="step-text">
								<span>
								صافي الثروة
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{ $alignreverse }} nav-link success redirect" href="#gosi">
							<span class="step-parent" data-bar="6"></span>
							<span class="step-text">
								<span>
								التأمينات الاجتماعية
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{ $alignreverse }} nav-link success redirect" href="#">
							<span class="step-parent" data-bar="7"></span>
							<span class="step-text">
								<span>
								خطة الاستثمار
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{ $alignreverse }} nav-link success redirect" href="#risk">
							<span class="step-parent" data-bar="8"></span>
							<span class="step-text">
								<span>
								المخاطر
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{ $alignreverse }} nav-link active" href="#consultations">
							<span class="step-parent" data-bar="9"></span>
							<span class="step-text">
								<span>
								جلسة الاستشارة
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{ $alignreverse }} nav-link" href="#">
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
	window.start_point_bar = 6;
	window.location.hash = '#consultations';

	// date picker 
	$("#consultationdatepicker").datepicker({
	    startDate: '+7d'

	});

</script>

@include('frontend.partials.wizard_script')
