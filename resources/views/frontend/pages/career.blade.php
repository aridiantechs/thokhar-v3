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

    .p-inherit{
        padding: inherit;
    }

    .error_clr{
        color: red !important;
    }
    .error{
       border: 1px solid red !important;
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
                <form method="GET" action="mailto:info@thokhor.com{{-- {{ route('career.store', locale()) }} --}}" id="mailForm" class="mt-3" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                {{-- <div class="col-md-12">
                                    <div class="form-group form-group-new">
                                        <div class="input-group">
                                            <input id="inputName" type="text" class="form-control input-big text-{{$align}}" name="name" value="" required autocomplete="email" placeholder="{{ trans('lang.frontend_contact.contact_name') }}">
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-md-12">
                                    <div class="row flex-column-reverse flex-lg-row">
                                        {{-- <div class="col-lg-6 order-1 order-lg-2 mb-3">
                                            <div class="card image-card mb-0" id="file_back">
                                                <div class="card-body h-100 justify-content-center align-items-center" style="display: grid;">
                                                    <img class="img img-fluid img-upload" id="file" src="{{ asset('frontend_assets/assets/img/new/contact-us/upload.svg') }}">
                                                    <span class="text-center">ارفق سيرتك الذاتية</span>
                                                </div>
                                                <input type="file" accept="application/pdf" name="file" id="file_button" class="d-none"> 
                                            </div>
                                        </div> --}}
                                        {{-- <div class="col-lg-6 order-1 order-lg-2 mb-3 p-inherit"> --}}
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
                                                        <input id="inputName" type="text" class="form-control input-big text-{{$align}}" name="subject" value="" required autocomplete="email" placeholder="{{ trans('lang.frontend_contact.contact_subject') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group form-group-new">
                                                    <div class="input-group">
                                                        {{-- <input id="inputName" type="text" class="form-control input-big text-{{$align}}" name="body" value="" required autocomplete="email" placeholder="{{ trans('lang.frontend_contact.contact_body') }}"> --}}
                                                        <textarea class="form-control input-big text-{{$align}}" name="body" value="" required autocomplete="email" placeholder="{{ trans('lang.frontend_contact.contact_body') }}" cols="30" rows="10"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-12">
                                                <div class="form-group form-group-new">
                                                    <div class="input-group">
                                                        <input id="inputName" type="text" class="form-control input-big text-{{$align}}" name="phone_number" value="" required autocomplete="email" placeholder="{{ trans('lang.login_form.phone_number') }}">
                                                    </div>
                                                </div>
                                            </div> --}}
                                        {{-- </div> --}}
                                        
                                    </div>
                                </div>
                            </div>
                           
                            <div class=" text-{{$align}} ">
                                <button type="button" class="{{$btnAlign}} btn btn-big btn-gradient btn-rad35 btn-primary mt-4 mailBtn">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js" integrity="sha512-sR3EKGp4SG8zs7B0MEUxDeq8rw9wsuGVYNfbbO/GLCJ59LBE4baEfQBVsP2Y/h2n8M19YV1mujFANO1yA3ko7Q==" crossorigin="anonymous"></script>
<script type="text/javascript">
$('#file').click(function(){
	$('#file_button').click();
});


$("#file_button").change(function(){
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

$(document).ready(function(){
    $('[name="phone_number"]').inputmask({"mask": "+(999) 99-999-9999"}); //specifying options

    $('[name="phone_number"]').hover(function(){
            $(this).css("direction", "ltr");
        }, function(){
            if ( !$(this).hasClass( "focus-visible" ) && $(this).val() == '') {
                $(this).css("direction", "rtl");
            }
            
        }
    );

    $('.mailBtn').on('click',function(){
        var emptyFields = $('#mailForm input[required]').filter(function() {
                            return $(this).val() === "";
                        }).length;
        if (emptyFields>0) {
            
            $('#mailForm *').filter(':input').each(function () {
                
                if ( $(this).attr('required') && $(this).val()=='') {
                    $(this).addClass( "error" );
                    
                }
                else{
                    $(this).removeClass( "error" );
                    $(this).css( "border-color", "#dddddd" );
                }
            });
        } else {
            $('#mailForm').attr('action','mailto:info@thokhor.com');
            $('#mailForm').submit();
        }
        
        
    })
})
</script>
@endsection