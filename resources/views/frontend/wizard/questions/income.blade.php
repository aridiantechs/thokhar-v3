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
    @media only screen and (min-width: 1920px) and (min-height: 900px) {
		.fix-height{
			height: calc(100vh - (82px + 83px));
		}
	}
 </style>
@endsection

@section('content')
<section class="slice py-3 pb-5 fix-height">
	<div class="mt-5">
		<div class="nav-tabs-wrapper mt-5 mobile d-block d-lg-none">
			<ul class="nav nav-tabs d-flex align-items-center">
				<li class="nav-item nav-item-1">
					<a class="text-left nav-link" href="#">
						<span class="step-parent" data-bar="1"></span>
					</a>
				</li>
				<li class="nav-item nav-item-2">
					<a class="text-left nav-link" href="#">
					<span class="step-parent" data-bar="2"></span>
					<span class="step-text">
					<span>
					Data 1
					</span>
					</span>
					</a>
				</li>
				<li class="nav-item nav-item-3">
					<a class="text-left nav-link active" data-toggle="tab" href="#menu1">
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
				<div class="step-parent-bar step-parent-bar-1" ></div>
				<div class="step-parent-bar step-parent-bar-2" ></div>
				<div class="step-parent-bar step-parent-bar-3" ></div>
				
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row row-grid">
			<div class="col-12 col-lg-3 text-center">
				<!-- Desktop -->
				<div class="nav-tabs-wrapper desktop d-none d-lg-block">
					<ul class="nav nav-tabs d-block">
						<li class="nav-item">
							<a class="text-left nav-link active" data-toggle="tab" href="#home">
							<span class="step-parent step-parent-1" data-bar="1"></span>
							<span class="step-text">
							<span>
							الدخل السنوي
							</span>
							</span>
							</a>
						</li>
						<li class="nav-item" data-id="1">
							<a class="text-left nav-link redirect" href="{{ route('net-worth-introduction', locale()) }}">
							<span class="step-parent" data-bar="2"></span>
							<span class="step-text">
							<span>
							صافي الثروة
							</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-left nav-link redirect" href="#menu1">
							<span class="step-parent" data-bar="6"></span>
							<span class="step-text">
							<span>
							التأمينات الاجتماعية
							</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-left nav-link redirect" href="#menu1">
							<span class="step-parent" data-bar="7"></span>
							<span class="step-text">
							<span>
							خطة الاستثمار
							</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-left nav-link redirect" href="#menu1">
							<span class="step-parent" data-bar="8"></span>
							<span class="step-text">
							<span>
							المخاطر
							</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-left nav-link" data-toggle="tab" href="#menu1">
							<span class="step-parent" data-bar="9"></span>
							<span class="step-text">
							<span>
							جلسة الاستشارة
							</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-left nav-link" data-toggle="tab" href="#menu2">
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
			<div class="col-12 col-lg-9 order-md-1 pr-md-5">
				@include('frontend.notifications.warning')
				<div class="tab-content">
					<div id="home" class="container tab-pane active">
						<br>
						@include('frontend.components.breadcrumb')
						<div class="card card-shadow has-bg-right">
							<div class="card-body p-0">
								<div class="row row-grid">
									<div class="col-12 col-lg-5 text-center">
										<!-- Image -->
										<figure class="w-100 div-wrapper">
											<img alt="" src="{{ asset('frontend_assets/assets/img/new/income/bg-1.svg') }}" class="img-fluid">
										</figure>
									</div>
									<div class="col-12 col-lg-7">
										<div class="p-4">
											<p class="text-muted mb-0">
											<h4 class="txt-blue-light text-right font-arabic">
												هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غـير منظم، منسق، أو حتى مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً  هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غـير منظم،
											</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
						<h3 class="txt-blue-light text-right font-arabic">
							الرجاء ادخال الدخل السنوي بما في ذلك الراتب والمكافأة وتأجير العقارات وغيرها
						</h3>
						<form id="qform" action="{{ route('questionnaire', locale()) }}" class="mt-3" method="POST">
							@csrf
							<div class="row flex-column-reverse flex-md-row w-form-inputs">
								<div class="col-md-3">
									<button type="submit" class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary with-arrow">
										<i class="fa fa-arrow-left"></i>
										<span class="d-inline-block">التالي</span>
									</button>
								</div>
								<div class="col-md-9">
									<div class="form-group form-group-new mb-0">
										@include('frontend.inputs.input_group', [
                                                'type' => 'text', 
                                                'name' => 'income[income]', 
                                                'value' => currency($user_questionnaire->income["income"]["income"] ?? '', 0),
                                                'old_val' => "investing_amount.monthly_amount",
                                                'placeholder' => 'المبلغ بالريال', 

                                        ])
									</div>
								</div>
							</div>
						</form>
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
		</div>
	</div>
</section>
@endsection


@section('scripts')
<script>

(function($, undefined) {

    "use strict";

    // When ready.
    $(function() {
        
        var $form = $( "#qform" );
        var $input = $form.find( "input:not(.text-input)" );

        $input.on( "keyup", function( event ) {
            
            // When user select text in the document, also abort.
            var selection = window.getSelection().toString();
            if ( selection !== '' ) {
                return;
            }
            
            // When the arrow keys are pressed, abort.
            if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
                return;
            }
            
            
            var $this = $( this );
            
            // Get the value.
            var input = $this.val();
            
            var input = input.replace(/[\D\s\._\-]+/g, "");
                    input = input ? parseInt( input, 10 ) : 0;

                    $this.val( function() {
                        return ( input === 0 ) ? 0 : input.toLocaleString( "en-US" );
                    } );
        } );
        
        /**
         * ==================================
         * When Form Submitted
         * ==================================
         */
        $form.on( "submit", function( event ) {
            
            var $this = $( this );
            var n = '';
            $('.form-control').each(function(i, obj) {
                
                $(this).val($(this).val().replace(/,/g,''));
                
            });
            

        
            
        });
        
    });
})(jQuery);
</script>
@endsection