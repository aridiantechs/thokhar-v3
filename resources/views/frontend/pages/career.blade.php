@inject('request', 'Illuminate\Http\Request')

@extends('frontend.layouts.app')

@section('styles')
<style type="text/css">
    .file__type{
        font-weight: 600;
    color: red;
    }
    .img-upload{
        width: 100%;
        max-width: 85%;
        margin: auto;
        padding: 15px;
    }
    .card{
        border: unset !important;
    }
</style>
@endsection

@section('content')
<section class="slice py-7">
    <div class="container">
        <div class="row row-grid">
            <div class="col-12 order-md-2 ">
                <p class="text-{{$align}} mb-0">
                    <span> {{ trans('lang.Home') }} </span> <span> / </span> <span> {{ trans('lang.Career') }} </span>
                </p>
                <h1 class="display-4 text-{{$align}} text-md-{{$align}} mb-3">
                    <strong class="text-primary font-arabic">{{ trans('lang.Career') }} </strong> 
                </h1>
            </div>
        </div>
        <div class="row row-grid">
            <div class="col-12 col-md-7 col-lg-6 pr-md-5">
                <!-- Heading -->
                <!--  <p class="text-muted text-center text-md-{{$align}} mb-0"><span>Home</span><span> / </span><span>Login</span></p> -->
                <h3 class="text-{{$align}} text-md-{{$align}} mb-3 ">
                    <strong class="font-arabic">
                    نحن دائما على استعداد لتزويدك بأعلى مستوى من الدعم
                    العلاقة بيننا  وبين كل عميل مهمة .للغاية بالنسبة لنا
                    </strong>
                </h3>


                @include('frontend.notifications.success')
                @include('frontend.notifications.warning')
                <form method="POST" action="{{ route('career.store', locale()) }}" class="mt-3">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 p{{ $alignShortRev }}-0">
                                    <div class="form-group form-group-new">
                                        <div class="input-group">
                                            <input id="inputName" type="text" class="form-control input-big text-{{$align}}" name="name" value="" required autocomplete="email" placeholder="{{ trans('lang.frontend_contact.contact_name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">
                                    <div class="row">
                                        <div class="col-lg-6 order-1 order-lg-2 mb-3">
                                            {{-- <small class="file__type">i.e .pdf .docx</small> --}}
                                            <div class="card image-card mb-0" id="profile_image_back">
                                                <div class="card-body h-100 justify-content-center align-items-center" style="display: grid;">
                                                    <img class="img img-fluid img-upload" id="new_profile" src="{{ asset('frontend_assets/assets/img/new/contact-us/upload.svg') }}">
                                                    <span class="text-center">ارفق سيرتك الذاتية</span>
                                                </div>
                                                <input type="file" accept="application/pdf" name="profile_image" id="new_profile_button" class="d-none"> 
                                            </div>
                                        </div>
                                        <div class="col-lg-6 order-1 order-lg-2 mb-3">
                                            <div class="col-md-12">
                                                <div class="form-group form-group-new">
                                                    <div class="input-group">
                                                        <input id="inputEmail" type="email" class="form-control input-big text-{{$align}}" name="email" value="" required autocomplete="email" placeholder="{{ trans('lang.frontend_contact.contact_email') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group form-group-new">
                                                    <div class="input-group">
                                                        <input id="inputName" type="text" class="form-control input-big text-{{$align}}" name="phone_number" value="" required autocomplete="email" placeholder="{{ trans('lang.login_form.phone_number') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <input type="file" name="profile_image" id="new_profile_button" class="d-none"> 
                            </div>
                           
                            <div class=" text-{{$align}} ">
                                <button type="submit" class="{{$btnAlign}} btn btn-big btn-gradient btn-rad35 btn-primary mt-4">
                                    {{-- <i class="fa fa-arrow-left"></i> --}}
                                    <span class="d-inline-block">{{ trans('lang.frontend_contact.contact_send') }}</span>
                                    <i class="fa fa-arrow-{{$arrowAlign}}"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-5 col-lg-6 text-center">
                <figure class="w-100">
                    <img alt="Image placeholder" src="{{ asset('frontend_assets/assets/img/new/contact-us/user-with-table.svg') }}" class="img-fluid">
                </figure>
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
            // $('#profile_image_back').html('');
            // $('#profile_image_back').css('background-image', 'url(' + e.target.result + ')');
            $('#profile_image_back').css('background-color', '#e7fff3');
        }
        reader.readAsDataURL(input.files[0]);
    }   
}

</script>
@endsection