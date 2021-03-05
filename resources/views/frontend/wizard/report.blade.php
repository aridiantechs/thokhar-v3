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
                    
            @include('frontend.components.breadcrumb' , ['heading' => 'التقرير'])
                        
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
              <a class="text-{{ $alignreverse }} nav-link success" href="#consultations">
              <span class="step-parent" data-bar="9"></span>
              <span class="step-text">
                <span>
                جلسة الاستشارة
                </span>
              </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="text-{{ $alignreverse }} nav-link active" href="#report">
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


<div class="modal fade modal-new" id="modal__1" tabindex="-1" role="dialog" aria-labelledby="modal__1Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content modal-content-new text-center">

      <div class="modal-content-new">
     
      <div class="imgmd__1">
        <img alt="" src="{{ asset('frontend_assets/assets/img/new/modal/img-1.svg') }}" class="img-fluid">
      </div>

      <div class="modal__lad text-center mt-4">
        <h3 class="font-arabic font-1 text-white"> ...جاري تجهيز تقريرك</h3>
      </div>
      
    </div>
      
    </div>

    
  </div>
</div>




<div class="modal fade modal-new" id="modal__2" tabindex="-1" role="dialog" aria-labelledby="modal__2Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content modal-content-new text-center">

      <div class="modal-content-new">
     
      <div class="imgmd__1">
        <img alt="" src="{{ asset('frontend_assets/assets/img/new/modal/img-2.svg') }}" class="img-fluid">
      </div>

      <div class="modal__lad text-center mt-4">
        <h3 class="font-arabic font-1 text-white">تم ارسال تقريرك الى بريدك الالكتروني</h3>

        <p class="font-2-sm">asbarakat@gmail.com</p>
      </div>

      <div class="text-center mt-0 mt-md-5">
        <button type="button" class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary text-center">
        <span class="d-inline-block font-arabic">هيا نكتشف ذلك</span>
      </button>
     </div>
      
    </div>
      
    </div>
  </div>
</div>




<script>
  window.start_point_bar = 7;
  window.location.hash = '#report';

  $('#modal__1').modal('show')

  setTimeout(function(){ 
    $('#modal__1').modal('hide')
    $('#modal__2').modal('show')
  }, 5000);

</script>

@include('frontend.partials.wizard_script')




