@inject('request', 'Illuminate\Http\Request')

@if($request->segment(1) == 'ar')
<div class="alert alert-warning alert-dismissible fade show text-right font-arabic" style="display: none" role="alert">
  <div class="alert-icon">
    <i class="fas fa-question"></i>
  </div>
  <h5>
    رسالة الخطأ
  </h5>
  <ul>
    
  </ul>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@else
<div class="alert alert-warning alert-dismissible fade show text-right font-arabic" style="display: none" role="alert">
  <div class="alert-icon">
    <i class="fas fa-question"></i>
  </div>
  <h5>
   Warning
  </h5>
  <ul>
    
  </ul>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif