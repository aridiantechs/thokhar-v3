@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app')

@section('styles')
<style type="text/css">
   .div-wrapper {
        position: relative;
        height: 300px;
        width: 300px;
    }

    .btn-rtl.btn-big:not(.text-center) span {
        padding-left: 30px;
    }
    @media only screen and (min-width: 1920px) and (min-height: 900px) {
		.fix-height{
			height: calc(100vh - (82px + 83px));
		}
	}

	.f-right{
		float: right;
	}
	
	.f-left{
		float: left;
	}

	.p-0-1{
		padding: 0 1rem;	
	}

	.d-ltr{
		direction: ltr;
	}

	.d-rtl{
		direction: rtl;
	}

	.btn-big {
		padding: 20px 1.25rem !important;
		font-size: 22px;
	}


	@if (app()->getLocale() == 'en') 
		/*Steps EN case*/
		.step-parent {
		    order: 2;
		}
		.nav-tabs .nav-item:not(.sub-item) .nav-link.active .step-text span:before {
		    border-left: 10px solid #01baef;
		    right: -10px;
	        border-right: unset;
	    	left: unset;
		}
		.nav-tabs .nav-link .step-text {
		    margin-right: 35px;
		}
		.nav-tabs-wrapper > .vertical-line {
		    right: 13px;
		    left: unset;
	    }
	    .nav-tabs .sub-item.nav-item:not(:first-child):not(:last-child) .nav-link:not(.active) .step-parent, .nav-tabs .sub-item.nav-item:not(:first-child):not(:last-child) .nav-link.active .step-parent {
		    margin-right: 7px;
		    margin-left: unset;
		}
		.nav-tabs-wrapper.desktop .nav-tabs .nav-item:not(:first-child):not(:last-child):not(.sub-item) .nav-link:not(.active):not(.success) .step-parent {
		    margin-right: 4px;
		}

		/*Radio buttons EN case*/
		

	@endif
 </style>
@endsection

@section('content')
<div class="wizard-wrapper">
	
</div>
@endsection


@section('scripts')
<script type="text/javascript">

	window.onhashchange = function(){
	    redirect();
	}



	$(document).ready(function(){
		redirect();
	});


	function redirect(){
		var target_route = '';		

		if (document.location.hash == '#income' || document.location.hash == ''){
			window.location.hash = '#income';
	        var target_route = "{{ route('income', locale()) }}"
		}
		
		else if (document.location.hash == "#net-worth")
	        var target_route = "{{ route('net-worth-introduction', locale()) }}"
		
		else if (document.location.hash == "#gosi")
	        var target_route = "{{ route('gosi', locale()) }}"
		
		else if (document.location.hash == "#risk")
	        var target_route = "{{ route('risk', locale()) }}"
		
		else if (document.location.hash == "#consultations")
	        var target_route = "{{ route('consultations', locale()) }}"
		
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		if(target_route){
			$.ajax({

				type: "GET",
				url: target_route,
				cache: false,

				success: function(html){
					$(".wizard-wrapper").html(html);
					$('body').addClass('loaded')
				},
				error: function(error){
					window.location.href('{{ route('wizard',locale()) }}')
				}
			});
		}
		else{
			$(".wizard-wrapper").html('<h2>Page not found</h2>');
		}
	}


	$(document).on('submit', '#qform', function(e){
		e.preventDefault();

		$('body').removeClass('loaded')
		
		var $this = $( this );
        var n = '';
        $('.form-control').each(function(i, obj) {
            
            $(this).val($(this).val().replace(/,/g,''));
            
        });

		$.ajax({

			type: "POST",
			url: $(this).attr("action"),
			data: $(this).serialize(),

			success: function(html){
				$(".wizard-wrapper").html(html)
				$('body').addClass('loaded')
				
			},
			error: function(error){
				var errors = JSON.parse(error.responseText);
				var errors_list = '';
				jQuery.each(errors.errors, function(index, item) {
				    errors_list += `<li><p class="text-dark" >` +item+ `</p></li>`
				}.bind(this));

				$('.alert ul').html(errors_list);
				$('.alert').show();

				$('.slice').removeClass('fix-heigh');
            	$('.slice').removeClass('fix-height');
            	$('body').addClass('loaded')
				
			}

		});
	});
</script>
@endsection