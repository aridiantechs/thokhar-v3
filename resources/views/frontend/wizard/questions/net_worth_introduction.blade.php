@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app')

@section('styles')
<style type="text/css">
   .div-wrapper {
        position: relative;
        height: 300px;
        width: 300px;
    }

    /*.div-wrapper img {
        position: absolute;
        left: 0;
        bottom: 0;
    }*/
    .btn-rtl.btn-big:not(.text-center) span {
        padding-left: 30px;
    }

	
	.d-ltr{
		direction: ltr;
	}

	.d-rtl{
		direction: rtl;
	}

 </style>
@endsection

@section('content')
<section class="slice py-3 pb-5 ">
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
				<div class="tab-content">
					<div id="net-worth-intro" class="container tab-pane active"><br>
	             		<p class="text-muted text-center text-md-{{$align}} mb-0"><span>Home</span><span> / </span><span>Login</span></p>
						<h1 class="display-4 text-center text-md-{{$align}} mb-3 ">
							<strong class="text-primary font-arabic">صافي الثروة</strong>
						</h1>

						@include('frontend.components.net_worth_card', [
							'image' => 'assets/img/new/net-worth-introduction/bg-1.svg',
							'text' => 'هتعتقد نجوى أن صافي ثروتها هو النقد الوحيد في حسابها المصـرفي لكن صافي ثروتها أكبر بكثير من ذلك.',
							'btn_class' => ''
						])
					</div>


                    <div id="cash-money" class="container tab-pane">
						<br>
						<p class="text-muted text-center text-md-{{$align}} mb-0"><span>Home</span><span> / </span><span>Login</span></p>
						<h1 class="display-4 text-center text-md-{{$align}} mb-3 ">
							<strong class="text-primary font-arabic">صافي الثروة</strong>
						</h1>

						@include('frontend.components.net_worth_card', [
								'image' => 'assets/img/new/net-worth-cash/bg-1.svg',
								'text' => 'هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غـير منظم، منسق، أو حتى مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً  هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة',
								'btn_class' => 'd-none'
							])
						
						<div class="mt-3 ">
							<div class="row flex-column-reverse flex-md-row w-form-inputs">
								<div class="col-md-3">
									<button type="button" onclick="next()" class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary with-arrow">
										{{-- <i class="fa fa-arrow-left"></i> --}}
										<span class="d-inline-block">التالي</span>
										<i class="fa fa-arrow-{{$arrowAlign}}"></i>
									</button>
								</div>
								<div class="col-md-9">
									<div class="form-group form-group-new mb-0">
										@include('frontend.inputs.input_group', [
                                            'type' => 'text', 
                                            'name' => 'income[income]', 
                                            'value' => $user_questionnaire->investing_amount["investing_amount"]["monthly_amount"] ?? '',
                                            'old_val' => "investing_amount.monthly_amount",
                                            'placeholder' => 'المبلغ بالريال', 

                                        ])
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="menu1" class="container tab-pane fade">
						<br>
						<h3>Menu 1</h3>
						<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>
					<div id="menu2" class="container tab-pane fade">
						<br>
						<h3>Menu 2</h3>
						<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-3 text-center">
				<!-- Desktop -->
				<div class="nav-tabs-wrapper desktop d-none d-lg-block">
					<ul class="nav nav-tabs d-block d-ltr">
						<li class="nav-item">
							<a class="text-{{$align}} nav-link success redirect" href="{{ route('income', locale()) }}">
								<span class="step-parent step-parent-1" data-bar="1"></span>
								<span class="step-text">
									<span>
									الدخل السنوي
									</span>
								</span>
							</a>
						</li>
						
						<!-- Main -->
                            <li class="nav-item" data-id="1">
                              <a class="text-{{$align}} nav-link success" data-toggle="tab" href="#net-worth-intro">
                                 <span class="step-parent" data-bar="2"></span>
                                 <span class="step-text">
                                     <span>
                                        صافي الثروة
                                     </span>
                                 </span>
                              </a>

                            </li>

                                <!-- Sub -->
                                <li class="nav-item sub-item subitem-1">
                                  <a class="text-{{$align}} nav-link active" data-toggle="tab" data-parent-id="1" href="#net-worth-intro">
                                     <span class="step-parent" data-bar="3"></span>
                                     <span class="step-text">
                                         <span>
                                             مقدمة
                                         </span>
                                     </span>
                                  </a>
                                </li>

                                <li class="nav-item sub-item subitem-1">
                                  <a class="text-{{$align}} nav-link" data-toggle="tab" data-parent-id="1" href="#cash-money">
                                     <span class="step-parent" data-bar="4"></span>
                                     <span class="step-text">
                                         <span>
                                             المال النقدي
                                         </span>
                                     </span>
                                  </a>
                                </li>

                                <li class="nav-item sub-item subitem-1">
                                  <a class="text-{{$align}} nav-link" data-toggle="tab" data-parent-id="1" href="#menu1">
                                     <span class="step-parent" data-bar="5"></span>
                                     <span class="step-text">
                                         <span>
                                             ودائع البنوك
                                         </span>
                                     </span>
                                  </a>
                                </li>

                                <li class="nav-item sub-item subitem-1">
                                  <a class="text-{{$align}} nav-link" data-toggle="tab" data-parent-id="1" href="#menu1">
                                     <span class="step-parent" data-bar="6"></span>
                                     <span class="step-text">
                                         <span>
                                             الأسهم
                                         </span>
                                     </span>
                                  </a>
                                </li>

                                <li class="nav-item sub-item subitem-1">
                                  <a class="text-{{$align}} nav-link" data-toggle="tab" data-parent-id="1" href="#menu1">
                                     <span class="step-parent" data-bar="7"></span>
                                     <span class="step-text">
                                         <span>
                                             السندات والصكوك
                                         </span>
                                     </span>
                                  </a>
                                </li>

                                <li class="nav-item sub-item subitem-1">
                                  <a class="text-{{$align}} nav-link" data-toggle="tab" data-parent-id="1" href="#menu1">
                                     <span class="step-parent" data-bar="8"></span>
                                     <span class="step-text">
                                         <span>
                                             العقارات
                                         </span>
                                     </span>
                                  </a>
                                </li>

                                <li class="nav-item sub-item subitem-1">
                                  <a class="text-{{$align}} nav-link" data-toggle="tab" data-parent-id="1" href="#menu1">
                                     <span class="step-parent" data-bar="9"></span>
                                     <span class="step-text">
                                         <span>
                                             عمل خاص
                                         </span>
                                     </span>
                                  </a>
                                </li>

                                <li class="nav-item sub-item subitem-1">
                                  <a class="text-{{$align}} nav-link" data-toggle="tab" data-parent-id="1" href="#menu1">
                                     <span class="step-parent" data-bar="10"></span>
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
							<a class="text-{{$align}} nav-link" data-toggle="tab" href="#menu1">
							<span class="step-parent" data-bar="11"></span>
							<span class="step-text">
							<span>
							التأمينات الاجتماعية
							</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{$align}} nav-link" data-toggle="tab" href="#menu1">
							<span class="step-parent" data-bar="12"></span>
							<span class="step-text">
							<span>
							خطة الاستثمار
							</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{$align}} nav-link" data-toggle="tab" href="#menu1">
							<span class="step-parent" data-bar="13"></span>
							<span class="step-text">
							<span>
							المخاطر
							</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{$align}} nav-link" data-toggle="tab" href="#menu1">
							<span class="step-parent" data-bar="14"></span>
							<span class="step-text">
							<span>
							جلسة الاستشارة
							</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{$align}} nav-link" data-toggle="tab" href="#menu2">
							<span class="step-parent" data-bar="15"></span>
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
@endsection



@section('scripts')
<script type="text/javascript">
	function next(){
		$('a.text-left.nav-link.active').parent().next().children().click();
	}


</script>
@endsection