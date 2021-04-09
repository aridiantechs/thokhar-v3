@inject('request', 'Illuminate\Http\Request')
@extends('dashboard.layouts.admin', ['title' => $title ?? ''])

@section('styles')
	{{-- Select 2 CSS --}}
    <link href="{{ asset('backend_assets/site_assets/css/select2/select2.min.css') }}" rel="stylesheet">

	<style>
	.form-control {
	    display: block;
	    width: 100%;
	    height: calc(1.5em + .75rem + 2px);
	    padding: 0.35rem .75rem;
	    font-size: 1.5rem;
	    font-weight: 400;
	    line-height: 1.5;
	    color: #222222;
	    background-color: #fff !important;
	    background-clip: padding-box;
	    border: 1px solid #e4e8ec;
	    border-radius: unset !important;
	    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
	}

	.button{
	    padding: 10px 20px !important;
	}

	.bg-gray-1{
		background: #e8f1f2 !important;
		border: none;
		border-radius: 2.5rem  !important;
	}

	.cs__input{
		height: 35px !important;
	}

	.select2-container--default .select2-selection--single .select2-selection__arrow{
		top: 4px;
	}

	/* image overlay */

	.contentt {
	position: relative;
	width: 90%;
	max-width: 400px;
	margin: auto;
	overflow: hidden;
	}

	.contentt .content-overlay {
	background: rgba(0,0,0,0.7);
	position: absolute;
	height: 99%;
	width: 100%;
	left: 0;
	top: 0;
	bottom: 0;
	right: 0;
	opacity: 0;
	-webkit-transition: all 0.4s ease-in-out 0s;
	-moz-transition: all 0.4s ease-in-out 0s;
	transition: all 0.4s ease-in-out 0s;
	}

	.contentt:hover .content-overlay{
	opacity: 1;
	}

	.content-image{
	width: 100%;
	}

	.content-details {
	position: absolute;
	text-align: center;
	padding-left: 1em;
	padding-right: 1em;
	width: 100%;
	top: 50%;
	left: 50%;
	opacity: 0;
	-webkit-transform: translate(-50%, -50%);
	-moz-transform: translate(-50%, -50%);
	transform: translate(-50%, -50%);
	-webkit-transition: all 0.3s ease-in-out 0s;
	-moz-transition: all 0.3s ease-in-out 0s;
	transition: all 0.3s ease-in-out 0s;
	}

	.contentt:hover .content-details{
	top: 50%;
	left: 50%;
	opacity: 1;
	}

	.content-details h3{
	color: #fff;
	font-weight: 500;
	letter-spacing: 0.15em;
	margin-bottom: 0.5em;
	text-transform: uppercase;
	}

	.content-details p{
	color: #fff;
	font-size: 0.8em;
	}

	.fadeIn-bottom{
	top: 80%;
	}

	/* end image overlay */

	.p-2-6em{
		padding: 2rem 6.8rem
	}

	.bdr{
		border: 2px solid #d4d4d4;
    	border-radius: 9px;
	}
	</style>
@endsection
@section('content')
{{-- <div class="content__body"> --}}
<div class="container mt-5">
	@include('dashboard.components.navbar')
	<h2 class="user__intro {{ ($request->segment(1) == 'ar') ? 'text-right' : 'text-left' }}">{{ trans('lang.admin.staff') }}</h2>
	<p class="setting_text {{ ($request->segment(1) == 'ar') ? 'text-right' : 'text-left' }}">
		{{ trans('lang.admin.site_settings') }}
		<span class="text-right {{ ($request->segment(1) == 'ar') ? 'float-left' : 'float-right' }} {{-- button --}}">
			{{-- <a href="{{ route('add_user/moderator', app()->getLocale()) }}" class="text-white">
				{{ trans('lang.admin.add') }}
			</a> --}}
			<a href="{{ route('add_user/moderator', app()->getLocale()) }}" class="btn-ltr btn btn-big btn-gradient btn-rad35 btn-primary with-arrow w-100-sm float-{{$alignreverse}} mb-4">
				<span class="d-inline-block">Add</span>
			</a>
		</span>
	</p>
	
	@if (isset($users) && count($users) > 0) 
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-12">
			<div class="form-group">
				<p class="{{ ($request->segment(1) == 'ar') ? 'text-right' : 'text-left' }}">{{ trans('lang.register_form.phone_number') }}</p>
              	<select 
              		class="form-control" 
              		id="user_id" 
              		name="user_id" 
              		>
                  	<option></option>
                  	@foreach ($users as $user)
                  		<option value="{{ $user->id }}">{{ $user->phone_number }}</option>
                  	@endforeach
              </select>
        	</div>
		</div>

		<div class="col-lg-1 col-md-2"></div>

		<div class="col-lg-4 col-md-4 col-sm-12">
			<div class="form-group">
				<p class="{{ ($request->segment(1) == 'ar') ? 'text-right' : 'text-left' }}">{{ trans('lang.admin.moderator_or_administrator') }}</p>
              	<select 
              		class="form-control" 
              		id="role_id" 
              		name="role_id" 
              		>
                  	<option></option>
                  	@foreach ($roles as $role)
                  		<option value="{{ ucfirst($role->name) }}">{{ ucfirst($role->name) }}</option>
                  	@endforeach
              </select>
        	</div>
		</div>
	</div>
	@endif

	<br>
	<br>

	<div class="row">
		@isset ($users)
			@forelse ($users as $user)
				<div class="col-lg-3 col-md-4 col-sm-6 {{ $user->hasRole('admin') ? 'admin_class' : 'moderator_class' }}" id="div_{{ $user->id }}">
					<div class="contentt p-2-6em bdr">
						<div class="content-overlay bdr"></div>
						<img class="user_image" src="{{ asset('backend_assets/dashboard/images/users/ali@2x.png') }}">
						<p class="text_black text-center">{{ $user->name }}</p>
						@if($user->hasRole('moderator'))
							<p class="text_red text-center">
								{{ trans('lang.admin.moderator') }}
							</p>
						@endif
						<div class="content-details fadeIn-bottom">
							@if($user->hasRole('moderator'))
								<form method="POST" action="{{ route('switch_role', [app()->getLocale(), $user]) }}">
									@csrf
									@method('PATCH')
									<h3 class="content-title">
										<button type="submit" class="btn-ltr btn btn-big btn-gradient btn-rad35 btn-primary with-arrow w-100-sm mb-3" >
											<span class="d-inline-block">{{ trans('lang.admin.set_to_admin') }}</span>
										</button>
									</h3>
								</form>
							@endif
							<form method="POST" action="{{ route('delete_user', [app()->getLocale(), $user]) }}" style="display: inline-block;">
								@csrf
								{{ method_field('DELETE') }}
								<button type="submit" class="btn btn-sm"></button>
								<p class="content-text">
									<button type="submit" class="btn-ltr btn btn-big btn-rad35 btn-danger with-arrow w-100-sm" pd-popup-open="popupNew">
										<span class="d-inline-block">{{ trans('lang.admin.remove_from_staff') }}</span>
									</button>
								</p>
							</form>
						  
						</div>
					</div>

					{{-- <div class="user_box">
						<img class="user_image" src="{{ asset('backend_assets/dashboard/images/users/ali@2x.png') }}">
						<p class="text_black">{{ $user->name }}</p>
						<p class="text_black">{{ $user->email }}</p>
						@if($user->hasRole('admin'))
							<p class="text_red">
								{{ trans('lang.admin.admin') }}
							</p>

							<form class="form-staff-role-switch" method="POST" action="{{ route('switch_role', [app()->getLocale(), $user]) }}" style="display: inline-block;">
                                @csrf
                                @method('PATCH')
                                <button title="Switch Role" type ="submit" class="button">
                                    {{ trans('lang.admin.set_to_moderator') }}
                                </button>
                            </form>
						@endif

						@if($user->hasRole('moderator'))
							<p class="text_red">
								{{ trans('lang.admin.moderator') }}
							</p>
							<form class="form-staff-role-switch" method="POST" action="{{ route('switch_role', [app()->getLocale(), $user]) }}" style="display: inline-block;">
                                @csrf
                                @method('PATCH')
                                <button title="Switch Role" type ="submit" class="button">
                                    {{ trans('lang.admin.set_to_admin') }}
                                </button>
                            </form>
						@endif

						<br>
						<br>
						<form method="POST" action="{{ route('delete_user', [app()->getLocale(), $user]) }}" style="display: inline-block;">
	                        @csrf
	                        {{ method_field('DELETE') }}
	                        <button type="submit" class="btn btn-sm">{{ trans('lang.admin.remove_from_staff') }}</button>
                        </form>
					</div> --}}
				</div>
			@empty
				<div class="col-sm-4 offset-lg-4">
					<div class="user_box">
						<img class="user_image img-fluid img-responsive" src="{{ asset('backend_assets/site_assets/images/default-user.png') }}" width="150px">
						<p class="text_black">
							<del> {{ trans('lang.admin.no_user_found') }} </del>
						</p>
					</div>
				</div>
			@endforelse
		@endisset
		
	</div>
	
</div>
{{-- </div> --}}


	{{-- ___________________________ MODAL Switch Role __________________________ --}}
    <div class="modal inmodal" id="switch-role-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <p class="{{ ($request->segment(1) == 'ar') ? 'text-right' : 'text-left' }}">{{ trans('lang.admin.confirmation') }} </p>
                    
                </div>
                <div class="modal-footer">
                    <button class="button" id="switch-role-button">{{ trans('lang.admin.save_changes') }}</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
	<!-- Select2 JS -->
    <script src="{{ asset('backend_assets/site_assets/js/select2/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function(){
        	// select 2
            $(".select2").select2();
            $("#user_id").select2({
                placeholder: "",
                allowClear: true
            });
            $("#role_id").select2({
                placeholder: "",
                allowClear: true
            });
        

			$('.select2-selection--single').addClass('bg-gray-1 cs__input');

	        // filter on basis of Role
	        $('#role_id').on('change', function() {
	        	if(this.value == 'Admin'){
					$('.moderator_class').hide('slow');
					$('.admin_class').show('slow');
	        	}
				else if(this.value == 'Moderator'){
					$('.admin_class').hide('slow');
					$('.moderator_class').show('slow');
				}
				else if(this.value == ''){
					$('.col-sm-3').show();
				}
			});


			// filter on basis of user
			$('#user_id').on('change', function() {
				var x = this.value;
				$('.col-lg-3').hide();
				$('.col-lg-3:not(#div_'+x+')').show();
				console.log(x);
				if(this.value == ''){
					$('.col-lg-3').show();
				}
			});


			// switch role
			$('.form-staff-role-switch').on('click', function(e){
			    e.preventDefault();
			    var $form = $(this);
			    $('#switch-role-modal').modal({ backdrop: 'static', keyboard: false })
			        .on('click', '#switch-role-button', function(){
			            $form.submit();
			        });
			});
        });

    </script>
@endsection