
<section class="slice py-3 pb-5 " id="net-worth">
	<div class="mt-5">
		<div class="nav-tabs-wrapper mt-5 mobile d-block d-lg-none">
			<ul class="nav nav-tabs d-flex align-items-center">
				<li class="nav-item nav-item-1">
					<a class="text-{{$align}} nav-link"  href="#">
						<span class="step-parent" data-bar="1"></span>
					</a>
				</li>
				<li class="nav-item nav-item-2">
					<a class="text-{{$align}} nav-link"  href="#">
					<span class="step-parent" data-bar="2"></span>
					<span class="step-text">
					<span>
					Data 1
					</span>
					</span>
					</a>
				</li>
				<li class="nav-item nav-item-3">
					<a class="text-{{$align}} nav-link active" data-toggle="tab" href="#">
					<span class="step-parent" data-bar="3"></span>
					<span class="step-text">
					<span>
					صافي الثروة
					</span>
					</span>
					</a>
				</li>
				<li class="nav-item nav-item-4">
					<a class="text-{{$align}} nav-link success" href="{{ route('income', locale()) }}">
					<span class="step-parent" data-bar="4"></span>
					<span class="step-text">
					<span>
					الدخل السنوي
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
				
		</div>
	</div>
	<div class="container">
		<div class="row row-grid">
			<div class="col-12 col-lg-9 {{-- order-md-1 --}} pr-md-5">
				@include('frontend.notifications.warning')
				<form id="qform" action="{{ route('wizard', locale()) }}">
				<input type="hidden" name="location" value="net-worth">
				<div class="tab-content">
					<div id="net-worth-intro" class="container tab-pane active"><br>

	             		@include('frontend.components.breadcrumb' , ['heading' => 'صافي الثروة   '])

						@include('frontend.components.net_worth_card', [
							'image' => 'assets/img/new/net-worth-introduction/bg-1.svg',
							'text' => 'هتعتقد نجوى أن صافي ثروتها هو النقد الوحيد في حسابها المصـرفي لكن صافي ثروتها أكبر بكثير من ذلك.',
							'btn_class' => ''
						])
					</div>

                    <div id="cash_and_deposit" class="container tab-pane">
						<br>						
						
						@include('frontend.components.breadcrumb' , ['heading' => 'هل لديك مال نقدا؟'])

						@include('frontend.components.net_worth_card', [
								'image' => 'assets/img/new/net-worth-cash/bg-1.svg',
								'text' => 'هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غـير منظم، منسق، أو حتى مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً  هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة',
								'btn_class' => 'd-none'
							])
						
						<div class="mt-3 ">
							<div class="row flex-column-reverse flex-md-row w-form-inputs">
								<div class="col-md-9">
									<div class="form-group form-group-new mb-0">
										@include('frontend.inputs.input_group', [
                                            'type' => 'text', 
                                            'name' => 'net_assets[financial_assets][cash_and_deposit]', 
                                            'value' => currency($user_questionnaire->net_assets["net_assets"]["financial_assets"]["cash_and_deposit"] ?? '', 0),
                                            'old_val' => "_net_assets.financial_assets.cash_and_deposit",
                                            'placeholder' => 'المبلغ بالريال', 

                                        ])
									</div>
								</div>
								<div class="col-md-3">
									<button type="button" onclick="next()" class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary with-arrow">
										{{-- <i class="fa fa-arrow-left"></i> --}}
										<span class="d-inline-block">التالي</span>
										<i class="fa fa-arrow-{{$arrowAlign}}"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
					<div id="equities" class="container tab-pane fade">

						<br>

						@include('frontend.components.breadcrumb' , ['heading' => '   الأسهم'])

						@include('frontend.components.net_worth_card', [
								'image' => 'assets/img/new/net-worth-cash/bg-1.svg',
								'text' => 'هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غـير منظم، منسق، أو حتى مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً  هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة',
								'btn_class' => 'd-none'
							])
						
						<div class="mt-3 ">
							<div class="row flex-column-reverse flex-md-row w-form-inputs">
								<div class="col-md-9">
									<div class="form-group form-group-new mb-0">
										@include('frontend.inputs.input_group', [
                                            'type' => 'text', 
                                            'name' => 'net_assets[financial_assets][equities]', 
                                            'value' => currency($user_questionnaire->net_assets["net_assets"]["financial_assets"]["equities"] ?? '', 0),
                                            'old_val' => "net_assets.financial_assets.equities",
                                            'placeholder' => 'المبلغ بالريال', 

                                        ])
									</div>
								</div>
								<div class="col-md-3">
									<button type="button" onclick="next()" class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary with-arrow">
										{{-- <i class="fa fa-arrow-left"></i> --}}
										<span class="d-inline-block">التالي</span>
										<i class="fa fa-arrow-{{$arrowAlign}}"></i>
									</button>
								</div>
							</div>
						</div>

					</div>
					<div id="bonds" class="container tab-pane fade">
						
						<br>

						@include('frontend.components.breadcrumb' , ['heading' => ' السندات والصكوك'])

						@include('frontend.components.net_worth_card', [
								'image' => 'assets/img/new/net-worth-cash/bg-1.svg',
								'text' => 'هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غـير منظم، منسق، أو حتى مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً  هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة',
								'btn_class' => 'd-none'
							])
						
						<div class="mt-3 ">
							<div class="row flex-column-reverse flex-md-row w-form-inputs">
								<div class="col-md-9">
									<div class="form-group form-group-new mb-0">
										@include('frontend.inputs.input_group', [
                                            'type' => 'text', 
                                            'name' => 'net_assets[financial_assets][bonds]', 
                                            'value' => currency($user_questionnaire->net_assets["net_assets"]["financial_assets"]["bonds"] ?? '', 0),
                                            'old_val' => "net_assets.financial_assets.bonds",
                                            'placeholder' => 'المبلغ بالريال', 

                                        ])
									</div>
								</div>
								<div class="col-md-3">
									<button type="button" onclick="next()" class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary with-arrow">
										{{-- <i class="fa fa-arrow-left"></i> --}}
										<span class="d-inline-block">التالي</span>
										<i class="fa fa-arrow-{{$arrowAlign}}"></i>
									</button>
								</div>
							</div>
						</div>

					</div>
					<div id="real_estate" class="container tab-pane fade">
						
						<br>

						@include('frontend.components.breadcrumb' , ['heading' => ' العقارات'])

						@include('frontend.components.net_worth_card', [
								'image' => 'assets/img/new/net-worth-cash/bg-1.svg',
								'text' => 'هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غـير منظم، منسق، أو حتى مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً  هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة',
								'btn_class' => 'd-none'
							])
						
						<div class="mt-3 ">
							<div class="row flex-column-reverse flex-md-row w-form-inputs">
								<div class="col-md-9">
									<div class="form-group form-group-new mb-0">
										@include('frontend.inputs.input_group', [
                                            'type' => 'text', 
                                            'name' => 'net_assets[real_assets][real_estate]', 
                                            'value' => currency($user_questionnaire->net_assets["net_assets"]["real_assets"]["real_estate"] ?? '', 0),
                                            'old_val' => "net_assets.real_assets.real_estate",
                                            'placeholder' => 'المبلغ بالريال', 

                                        ])
									</div>
								</div>
								<div class="col-md-3">
									<button type="button" onclick="next()" class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary with-arrow">
										{{-- <i class="fa fa-arrow-left"></i> --}}
										<span class="d-inline-block">التالي</span>
										<i class="fa fa-arrow-{{$arrowAlign}}"></i>
									</button>
								</div>
							</div>
						</div>

					</div>
					<div id="pe" class="container tab-pane fade">
						
						<br>

						@include('frontend.components.breadcrumb' , ['heading' => ' عمل خاص'])

						@include('frontend.components.net_worth_card', [
								'image' => 'assets/img/new/net-worth-cash/bg-1.svg',
								'text' => 'هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غـير منظم، منسق، أو حتى مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً  هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة',
								'btn_class' => 'd-none'
							])
						
						<div class="mt-3 ">
							<div class="row flex-column-reverse flex-md-row w-form-inputs">
								<div class="col-md-9">
									<div class="form-group form-group-new mb-0">
										@include('frontend.inputs.input_group', [
                                            'type' => 'text', 
                                            'name' => 'net_assets[real_assets][pe]', 
                                            'value' => currency($user_questionnaire->net_assets["net_assets"]["real_assets"]["pe"] ?? '', 0),
                                            'old_val' => "net_assets.real_assets.pe",
                                            'placeholder' => 'المبلغ بالريال', 

                                        ])
									</div>
								</div>
								<div class="col-md-3">
									<button type="button" onclick="next()" class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary with-arrow">
										{{-- <i class="fa fa-arrow-left"></i> --}}
										<span class="d-inline-block">التالي</span>
										<i class="fa fa-arrow-{{$arrowAlign}}"></i>
									</button>
								</div>
							</div>
						</div>

					</div>
					<div id="other" class="container tab-pane fade">
						
						<br>

						@include('frontend.components.breadcrumb' , ['heading' => '  أصول أخرى'])

						@include('frontend.components.net_worth_card', [
								'image' => 'assets/img/new/net-worth-cash/bg-1.svg',
								'text' => 'هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غـير منظم، منسق، أو حتى مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً  هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة',
								'btn_class' => 'd-none'
							])
						
						<div class="mt-3 ">
							<div class="row flex-column-reverse flex-md-row w-form-inputs">
								<div class="col-md-9">
									<div class="form-group form-group-new mb-0">
										@include('frontend.inputs.input_group', [
                                            'type' => 'text', 
                                            'name' => 'net_assets[other_assets][other]', 
                                            'value' => currency($user_questionnaire->net_assets["net_assets"]["other_assets"]["other"] ?? '', 0),
                                            'old_val' => "net_assets.other_assets.other",
                                            'placeholder' => 'المبلغ بالريال', 

                                        ])
									</div>
								</div>
								<div class="col-md-3">
									<button type="submit" class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary with-arrow">
										{{-- <i class="fa fa-arrow-left"></i> --}}
										<span class="d-inline-block">التالي</span>
										<i class="fa fa-arrow-{{$arrowAlign}}"></i>
									</button>
								</div>
							</div>
						</div>

					</div>
				</div>
				</form>
			</div>
			<div class="col-12 col-lg-3 text-center">
				<!-- Desktop -->
				<div class="nav-tabs-wrapper desktop d-none d-lg-block">
					<ul class="nav nav-tabs d-block d-ltr">
						<li class="nav-item">
							<a class="text-{{$alignreverse}} nav-link success redirect" href="#income">
								<span class="step-parent step-parent-1" ></span>
								<span class="step-text">
									<span>
									الدخل السنوي
									</span>
								</span>
							</a>
						</li>
						
						<!-- Main -->
                            <li class="nav-item" data-id="1">
                              <a class="text-{{$alignreverse}} nav-link success" href="#net-worth">
                                 <span class="step-parent" ></span>
                                 <span class="step-text">
                                     <span>
                                        صافي الثروة
                                     </span>
                                 </span>
                              </a>

                            </li>

                                <!-- Sub -->
                                <li class="nav-item sub-item subitem-1">
                                  <a class="text-{{$alignreverse}} nav-link active" data-toggle="tab" data-parent-id="1" href="#net-worth-intro">
                                     <span class="step-parent" ></span>
                                     <span class="step-text">
                                         <span>
                                             مقدمة
                                         </span>
                                     </span>
                                  </a>
                                </li>

                                <li class="nav-item sub-item subitem-1">
                                  <a class="text-{{$alignreverse}} nav-link" data-toggle="tab" data-parent-id="1" href="#cash_and_deposit">
                                     <span class="step-parent" ></span>
                                     <span class="step-text">
                                         <span>
                                             المال النقدي
                                         </span>
                                     </span>
                                  </a>
                                </li>

                                {{-- <li class="nav-item sub-item subitem-1">
                                  <a class="text-{{$alignreverse}} nav-link" data-toggle="tab" data-parent-id="1" href="#">
                                     <span class="step-parent" ></span>
                                     <span class="step-text">
                                         <span>
                                             ودائع البنوك
                                         </span>
                                     </span>
                                  </a>
                                </li> --}}

                                <li class="nav-item sub-item subitem-1">
                                  <a class="text-{{$alignreverse}} nav-link" data-toggle="tab" data-parent-id="1" href="#equities">
                                     <span class="step-parent" ></span>
                                     <span class="step-text">
                                         <span>
                                             الأسهم
                                         </span>
                                     </span>
                                  </a>
                                </li>

                                <li class="nav-item sub-item subitem-1">
                                  <a class="text-{{$alignreverse}} nav-link" data-toggle="tab" data-parent-id="1" href="#bonds">
                                     <span class="step-parent" ></span>
                                     <span class="step-text">
                                         <span>
                                             السندات والصكوك
                                         </span>
                                     </span>
                                  </a>
                                </li>

                                <li class="nav-item sub-item subitem-1">
                                  <a class="text-{{$alignreverse}} nav-link" data-toggle="tab" data-parent-id="1" href="#real_estate">
                                     <span class="step-parent" ></span>
                                     <span class="step-text">
                                         <span>
                                             العقارات
                                         </span>
                                     </span>
                                  </a>
                                </li>

                                <li class="nav-item sub-item subitem-1">
                                  <a class="text-{{$alignreverse}} nav-link" data-toggle="tab" data-parent-id="1" href="#pe">
                                     <span class="step-parent" ></span>
                                     <span class="step-text">
                                         <span>
                                             عمل خاص
                                         </span>
                                     </span>
                                  </a>
                                </li>

                                <li class="nav-item sub-item subitem-1">
                                  <a class="text-{{$alignreverse}} nav-link" data-toggle="tab" data-parent-id="1" href="#other">
                                     <span class="step-parent" ></span>
                                     <span class="step-text">
                                         <span>
                                             أصول أخرى
                                         </span>
                                     </span>
                                  </a>
                                </li>

                                
                                <!-- Sub -->
                            <!-- Main -->
						<li class="nav-item">
							<a class="text-{{$alignreverse}} nav-link" href="#gosi">
							<span class="step-parent" ></span>
							<span class="step-text">
							<span>
							التأمينات الاجتماعية
							</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{$alignreverse}} nav-link" href="#">
							<span class="step-parent" ></span>
							<span class="step-text">
							<span>
							خطة الاستثمار
							</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{$alignreverse}} nav-link" href="#risk">
							<span class="step-parent" ></span>
							<span class="step-text">
							<span>
							المخاطر
							</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{$alignreverse}} nav-link" href="#consultations">
							<span class="step-parent" ></span>
							<span class="step-text">
							<span>
							جلسة الاستشارة
							</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{$alignreverse}} nav-link" href="#">
							<span class="step-parent" ></span>
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

<script type="text/javascript">
	window.start_point_bar = 3;
	window.location.hash = '#net-worth';
	function next(){
		$('a.nav-link.active').parent().next().children().click();
	}

</script>


@include('frontend.partials.wizard_script')