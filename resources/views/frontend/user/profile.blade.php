@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app')

@section('styles')
<style type="text/css">
	select {
	    /*-webkit-appearance: none;
	    -moz-appearance: none;
	    appearance: none;*/
	    padding: 2px 30px 2px 2px;
	    border: none;
	}
	select {
	    overflow:hidden;
	    width: 120%;
	    direction: {{ $align3letter }};
	    padding: 22px !important;
	}
	
	input[type="date"]::-webkit-inner-spin-button,
	input[type="date"]::-webkit-calendar-picker-indicator {
	    display: none;
	    -webkit-appearance: none;
	}

	#dob{
	    text-align: {{ $align }};
	}

	@media only screen and (max-width: 600px) {
		.h-100px
		{
			height: 100px;
		}
	
	}
	
	
</style>
@endsection

@section('content')

<!-- Main content -->
<section class="slice py-7 fix-heigh">
	<div class="container">
		<div class="row row-grid">
			<!--  <div class="col-12 col-md-5 col-lg-6 order-md-2 text-center">
				<figure class="w-100">
				    <img alt="Image placeholder" src="assets/img/svg/illustrations/illustration-3.svg" class="img-fluid mw-md-120">
				</figure>
				</div> -->
			<div class="col-12 col-md-12 col-lg-12 order-lg-1 pr-md-5">
				<!-- Heading -->
				<p class="text-{{$align}} mb-0">
					<span><a class="bc__color" href="{{route('/',app()->getLocale() ?? 'ar')}}">{{ trans('lang.Home') }}</a></span> <span> / </span><span> <a class="bc__color" href="{{route('profile',app()->getLocale() ?? 'ar')}}"> {{ trans('lang.user.profile') }}</a> </span>
				</p>
				<h1 class="display-4 text-{{$align}} text-lg-{{$align}} mb-3">
					<strong class="text-primary font-arabic"> {{ trans('lang.user.profile') }}</strong> 
				</h1>
				<div class="row">
					<div class=" col-lg-offset-6 col-lg-6">
						<h3 class="text-{{$align}} text-lg-{{$align}} mb-3 ">
							<strong class="font-arabic">
							نحن دائما على استعداد لتزويدك بأعلى مستوى من الدعم
							العلاقة بيننا  وبين كل عميل مهمة .للغاية بالنسبة لنا
							</strong>
						</h3>
					</div>
				</div>
				<span class="clearfix"></span>
				@include('frontend.notifications.warning')
				<form action="{{ route('profile-save', locale()) }}" method="POSt" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-lg-9 order-2 order-lg-1">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group form-group-new mb-3">
										@include('frontend.inputs.input_group', [
	                                            'type'  => 'email', 
	                                            'name'  => 'email', 
	                                            'value' => $user->email ?? '',
	                                            'old_val' => "email",
	                                            'placeholder' => trans('lang.user.email_address'),
	                                            'id' => "email",
                                            ])
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group form-group-new mb-3">
										@include('frontend.inputs.input_group', [
	                                            'type'  => 'text', 
	                                            'name'  => 'name', 
	                                            'value' => $user->name ?? '',
	                                            'old_val' => "name",
	                                            'placeholder' => trans('lang.user.name'),
	                                            'id' => "name",
                                            ])
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group form-group-new mb-3  mb-lg-3">
										@include('frontend.inputs.input_group', [
	                                            'type'  => 'date', 
	                                            'name'  => 'dob', 
	                                            'value' => $user->dob ?? '',
	                                            'old_val' => "dob",
	                                            'placeholder' => trans('lang.user.Date of Birth'),
	                                            'id' => "dob",
	                                            'icon' => "calendar",
                                            ])
										
									</div>
								</div>

								<div class="col-lg-6">
									<div class="form-group form-group-new mb-3 mb-lg-3">
										
                                        <div class="input-group">
										    {{-- <div class="input-group-prepend">
										        <span class="input-group-text"><i data-feather="chevron-down"></i></span>
										    </div> --}}
										    <select class="form-control input-big m{{ $alignShort }}-3" name="education_level"  placeholder="{{ trans('lang.user.Position') }}" id="education_level">

                                        
	                                        	<option value="">
					                          		{{ trans('lang.question.education_level') }}
					                          	</option>
					                          	<option {!! (isset($user_questionnaire->personal_info["personal_info"]["education_level"]) && $user_questionnaire->personal_info["personal_info"]["education_level"] == 'lang.question.education_level_options.highschool') ? 'selected' : '' !!}

					                          		{!! (old('personal_info.education_level') == 'lang.question.education_level_options.highschool') ? 'selected' : '' !!}


													value="lang.question.education_level_options.highschool" 

					                          		>
					                          		{{ trans('lang.question.education_level_options.highschool') }}
					                          	</option>
					                          	<option {!! (isset($user_questionnaire->personal_info["personal_info"]["education_level"]) && $user_questionnaire->personal_info["personal_info"]["education_level"] == 'lang.question.education_level_options.bachlore') ? 'selected' : '' !!}

					                          		{!! (old('personal_info.education_level') == 'lang.question.education_level_options.bachlore') ? 'selected' : '' !!}

					                          		value="lang.question.education_level_options.bachlore" 

					                          		>
					                          		{{ trans('lang.question.education_level_options.bachlore') }}
					                          	</option>
					                          	<option {!! (isset($user_questionnaire->personal_info["personal_info"]["education_level"]) && $user_questionnaire->personal_info["personal_info"]["education_level"] == 'lang.question.education_level_options.master') ? 'selected' : '' !!}

					                          		{!! (old('personal_info.education_level') == 'lang.question.education_level_options.master') ? 'selected' : '' !!}

					                          		value="lang.question.education_level_options.master" 

					                          		>
					                          		{{ trans('lang.question.education_level_options.master') }}
					                          	</option>
					                          	<option {!! (isset($user_questionnaire->personal_info["personal_info"]["education_level"]) && $user_questionnaire->personal_info["personal_info"]["education_level"] == 'lang.question.education_level_options.above') ? 'selected' : '' !!}

					                          		{!! (old('personal_info.education_level') == 'lang.question.education_level_options.above') ? 'selected' : '' !!}

					                          		value="lang.question.education_level_options.above" 

					                          		>
					                          		{{ trans('lang.question.education_level_options.above') }}
					                          	</option>
                                        	</select>
                                        </div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group form-group-new mb-3  mb-lg-3">
										@include('frontend.inputs.input_group', [
	                                            'type' => 'text', 
	                                            'name' => 'expected_retirement_age', 
	                                            'value' => $user->expected_retirement_age ?? '',
	                                            'old_val' => "expected_retirement_age",
	                                            'placeholder' => trans('lang.user.Expected Retirement Age'),
	                                            'id' => "expected_retirement_age",
                                            ])
										
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group form-group-new mb-3 mb-lg-3">
				
                                        <div class="input-group">
										    {{-- <div class="input-group-prepend">
										        <span class="input-group-text"><i data-feather="chevron-down"></i></span>
										    </div> --}}
										    <select class="form-control input-big m{{ $alignShort }}-3" name="gender"  placeholder="{{ trans('lang.user.gender') }}"  id="gender">
										    	<option {{ (auth()->user()->gender == 'male') ? 'selected' : '' }} value="Male">{{ trans('lang.male') }}</option>
					                            <option {{ (auth()->user()->gender == 'female') ? 'selected' : '' }} value="Female">{{ trans('lang.female') }}</option>
										    </select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 order-1 order-lg-2 mb-3 h-100px">
							<div class="card image-card mb-0 h-100" id="profile_image_back" style="background-image: url('@if($user->profile_image){{ asset($user->profile_image) }}@endif')">
								<div class="card-body h-100 d-flex justify-content-center align-items-center">
									<span class="material-icons txt-gray-light md-48" id="new_profile">add_a_photo</span>
								</div>
							</div>
						</div>
						<input type="file" name="profile_image" accept="image/x-png,image/jpeg" id="new_profile_button" class="d-none"> 
					</div>
					{{-- <h3 class="text-{{$align}} text-lg-{{$align}} mb-3 mt-3">
						<strong class="font-arabic">
							{{ trans('lang.investing_amount.Retire age( 60 as default and can not changes )') }}
						</strong>
					</h3> --}}
					<div class="mt-4 text-lg-{{$align}} text-center">
						<button type="submit" class="{{$btnAlign}} btn btn-big btn-gradient btn-rad35 btn-primary with-arrow">
						{{-- <i class="fa fa-arrow-left"></i> --}}
						<span class="d-inline-block">{{ trans('lang.question.next') }}</span>
						<i class="fa fa-arrow-{{$arrowAlign}}"></i>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

@endsection



@section('scripts')
<script type="text/javascript">
$('#new_profile').click(function(){
	$('#new_profile_button').click();
});


$("#new_profile_button").change(function(){
    changeLogoImage(this);
});


function changeLogoImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#profile_image_back').html('');
            $('#profile_image_back').css('background-image', 'url(' + e.target.result + ')');
        }
        reader.readAsDataURL(input.files[0]);
    }   
}

</script>
@endsection