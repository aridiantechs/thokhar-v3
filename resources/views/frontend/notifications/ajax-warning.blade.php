@inject('request', 'Illuminate\Http\Request')
<style>
  .alert.alert-dismissible {
    @if($request->segment(1) == 'ar')
      padding-right: 5rem;
    @else
      padding-left: 5rem;
    @endif
    
  }

  .alert .alert-icon {
    @if($request->segment(1) == 'ar')
      right: 12px;
    @else
      left: 12px;
    @endif
    
  }
  ul{
    list-style: none !important;
  }
</style>
@if($request->segment(1) == 'ar')
<div class="alert alert-warning alert-dismissible fade show text-{{$align}} font-arabic" style="display: none" role="alert">
  <div class="alert-icon">
    <i class="fas fa-question"></i>
  </div>
  <h5>
    {{ trans('lang.warning') }}
  </h5>
  <ul class="p-0">
    
  </ul>
  {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button> --}}
</div>

@else
<div class="alert alert-warning alert-dismissible fade show text-{{$align}} font-arabic" style="display: none" role="alert">
  <div class="alert-icon">
    <i class="fas fa-question"></i>
  </div>
  <h5>
   {{ trans('lang.warning') }}
  </h5>
  <ul class="p-0">
    
  </ul>
  {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button> --}}
</div>
@endif
