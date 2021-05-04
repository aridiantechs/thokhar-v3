<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" integrity="sha512-yVvxUQV0QESBt1SyZbNJMAwyKvFTLMyXSyBHDO4BG5t7k/Lw34tyqlSDlKIrIENIzCl+RVUNjmCPG+V/GMesRw==" crossorigin="anonymous" />

<style type="text/css">
	svg.feather.feather-calendar {
    color: #000000;
	
}

@media screen and (max-width : 1200px)
    {
        input::-webkit-input-placeholder, textarea, textarea::-webkit-input-placeholder {
			font-size: 12px !important;
		}
    }

	.alert-warning{
		color: #676742 !important;
	}
</style>
<section class="slice py-3 pb-5 fix-height" id="income">
	<div class="mt-5">
		<div class="nav-tabs-wrapper mt-9rem mobile d-block d-lg-none">
			<ul class="nav nav-tabs d-flex align-items-center">
				<li class="nav-item nav-item-1">
					
				</li>
				<li class="nav-item nav-item-2">
					<a class="text-{{$align}} nav-link"  href="#report">
					<span class="step-parent" data-bar="2"></span>
					<span class="step-text">
					<span>
					
					</span>
					</span>
					</a>
				</li>
				<li class="nav-item nav-item-3">
					<a class="text-{{$align}} nav-link active" data-toggle="tab" href="#">
					<span class="step-parent" data-bar="3"></span>
					<span class="step-text">
					<span>
						{{ trans('lang.question_headings.Counseling session') }}
					</span>
					</span>
					</a>
				</li>
				<li class="nav-item nav-item-4">
					<a class="text-left nav-link success" href="#risk">
					 <span class="step-parent" data-bar="4"></span>
					 <span class="step-text">
			            <span>
			                 Data 3
			            </span>
			        </span>
					</a>
				</li>

				<li class="nav-item nav-item-5">
					<a class="text-left nav-link success" href="#investing-plan">
					 <span class="step-parent" data-bar="5"></span>
					 <span class="step-text">
				            <span>
				                Data 4
				            </span>
				        </span>
					</a>
				</li>
			</ul>
			<div class="horizontal-line">

                <div class="step-parent-bar step-parent-bar-1" ></div>
                <div class="step-parent-bar step-parent-bar-2" ></div>
                <div class="step-parent-bar step-parent-bar-3" ></div>
                <div class="step-parent-bar step-parent-bar-4 success" ></div>
               
                <div class="step-parent-bar step-parent-bar-5 success"></div>
                <div class="step-parent-bar step-parent-bar-6 success"></div>

            </div>
		</div>
	</div>
	<div class="container">
		<div class="row row-grid">
			<div class="col-12 col-lg-9 {{-- order-md-1 --}} pr-md-5">
				@include('frontend.notifications.ajax-warning')
				<div class="tab-content">
					<div id="home" class="container tab-pane active"><br>
                 		
                 		@include('frontend.components.breadcrumb' , ['heading' => trans('lang.consultation_session')])
						
                        <div class="py-5 pl-lg-0">
							<h3 class="txt-blue-light text-{{$align}} font-arabic">
								{{ trans('lang.Your financial advisor and preparing your personal investing plan , based on your input') }}
							</h3>
						</div>
						@if (auth()->user()->consultation && auth()->user()->consultation->status !='CANCELLED')
							<div class="alert alert-warning fade show">
								<h4 class="alert-heading"><i class="fas fa-exclamation-triangle"></i>Warning!</h4>
								<p>You have already made an appointment.</p>
							</div>
							<form id="qform" action="{{ route('wizard', locale()) }}" class="mt-3" method="POST">
								@csrf
								<input type="hidden" name="location" value="get_report">
								<div class="row">
									<div class="col-md-12">
									</div>
									<button type="submit" class="btn-{{$align}} btn f-{{$align}} btn-big btn-gradient btn-rad35 btn-primary with-arrow mt-4">
										{{-- <i class="fa fa-arrow-{{$align}}"></i> --}}
										<span class="d-inline-block p-0-1">{{ trans('lang.question.next') }}</span>
										<i class="fa fa-arrow-{{$arrowAlign}}"></i>
									</button>
								</div>
							</form>
						@else
							<form id="qform" action="{{ route('wizard', locale()) }}" class="mt-3" method="POST">
								@csrf
								<input type="hidden" name="location" value="consultations">
								<div class="row">

									<div class="col-md-12">
										<div class="font-1 text-{{$align}} mb-3" >الرجاء اختيار توقيت الجلسة الاستشارية</div>
										<div class="row flex-column-reverse flex-md-row w-form-inputs">
											<div class="col-md-5">
												<div class="form-group form-group-new mb-0">		
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

											<div class="col-md-7">
												<div class="form-group form-group-new mb-0">
													{{-- @include('frontend.inputs.input_group', [
															'type' => 'time', 
															'name' => 'consultation_date', 
															'value' => '',
															'old_val' => 'consultation_date',
															'placeholder' => 'المبلغ المستقطع للتأمينات',
															'no_icon' => true,
															'icon' => 'clock',
															'id' => '',
															'class' => 'text-input'

														]) --}}
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text"><i data-feather="clock"></i></span>
														</div>
														<select data-placeholder="Choose a slot..." class="form-control input-big text-input chosen-select" name="slot" id="slot">

														</select>	
													</div>										
													
												</div>                                          
											</div>
										</div>
										<button type="submit" class="btn-{{$align}} btn f-{{$align}} btn-big btn-gradient btn-rad35 btn-primary with-arrow mt-4">
											{{-- <i class="fa fa-arrow-{{$align}}"></i> --}}
											<span class="d-inline-block p-0-1">{{ trans('lang.question.next') }}</span>
											<i class="fa fa-arrow-{{$arrowAlign}}"></i>
										</button>
									</div>
								</div>
							</form>
						@endif

                        

						
                    </div>									   	
				</div>
			</div>
			<div class="col-12 col-lg-3 text-center">
				<!-- Desktop -->
				<div class="nav-tabs-wrapper desktop d-none d-lg-block">
					<ul class="nav nav-tabs d-block d-ltr">
						<li class="nav-item">
							<a class="text-{{ $alignreverse }} nav-link success" href="#income">
							<span class="step-parent step-parent-1" data-bar="1"></span>
							<span class="step-text">
								<span>
									{{ trans('lang.question_headings.income') }}
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item" data-id="1">
							<a class="text-{{ $alignreverse }} nav-link success redirect" href="#net-worth">
							<span class="step-parent" data-bar="2"></span>
							<span class="step-text">
								<span>
									{{ trans('lang.question_headings.net_assets') }}
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{ $alignreverse }} nav-link success redirect" href="#gosi">
							<span class="step-parent" data-bar="6"></span>
							<span class="step-text">
								<span>
									{{ trans('lang.question_headings.gosi') }}
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{ $alignreverse }} nav-link success redirect" href="#investing-plan">
							<span class="step-parent" data-bar="7"></span>
							<span class="step-text">
								<span>
									{{ trans('lang.question_headings.investing_plan') }}
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{ $alignreverse }} nav-link success redirect" href="#risk">
							<span class="step-parent" data-bar="8"></span>
							<span class="step-text">
								<span>
									{{ trans('lang.question_headings.risk') }}
								</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{ $alignreverse }} nav-link active" href="#consultations">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js" integrity="sha512-rMGGF4wg1R73ehtnxXBt5mbUfN9JUJwbk21KMlnLZDJh7BkPmeovBuddZCENJddHYYMkCh9hPFnPmS9sspki8g==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script>
	window.start_point_bar = 6;
	window.location.hash = '#consultations';

	// date picker 
	$("#consultationdatepicker").datepicker({
	    startDate: '+1d',
		endDate: '+7d'

	});


</script>

@include('frontend.partials.wizard_script')

<script>
	$(document).ready(function(){
		
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		
		$('[name="consultation_date"]').on('change',function(){

			$('body').removeClass('loaded').addClass('fade-loading');
			
			$.ajax({
				type: "GET",
				url: "{{url('/')}}/{{locale()}}/get_slots",
				data:{
					consultation_date: $(this).val(),
				},
				
				success: function(res){

					$('#slot').html('');
					$('body').addClass('loaded').removeClass('fade-loading');

					if (res.status=="success") {

						$.each( res.data, function(k, v) {
							$('#slot').append(`<option value=${v.id}>${v.slot}</option>`);
						});

					}else {
						$('#slot').append(`<option value=>No slots available</option>`);
					}
					
				}
			});
		})
	})
</script>
