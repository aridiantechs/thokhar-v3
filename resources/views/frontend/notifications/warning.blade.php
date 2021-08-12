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
</style>

@if($request->segment(1) == 'ar')

 @if(count($errors)>0)
  <div class="alert alert-warning alert-dismissible fade show text-{{$align}} font-arabic" role="alert">
    <div class="alert-icon">
       <i class="fas fa-question"></i>
    </div>
     <h5>
      {{ trans('lang.warning') }}
    </h5>
    <ul class="p-0">
        @foreach($errors->all() as $error)
            <li><p class="text-dark">{{ $error }}</p></li>
        @endforeach
    </ul>
    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button> --}}
  </div>
    
  @endif

  @if (session('message'))
    <div class="alert alert-warning alert-dismissible fade show text-{{$align}} font-arabic" role="alert">
      <div class="alert-icon">
         <i class="fas fa-question"></i>
      </div>
       <h5>
        {{ trans('lang.warning') }}
      </h5>
      <p class="text-dark">{{ session('message') }} @php session()->forget('message'); @endphp</p>
      {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button> --}}
    </div>
  @endif

@else
  @if(count($errors)>0)
  <div class="alert alert-warning alert-dismissible fade show text-{{$align}} font-arabic" role="alert">
    <div class="alert-icon">
       <i class="fas fa-question"></i>
    </div>
     <h5>
      {{ trans('lang.warning') }}
    </h5>
    <ul class="p-0">
        @foreach($errors->all() as $error)
            <li><p class="text-dark">{{ $error }}</p></li>
        @endforeach
    </ul>
    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button> --}}
  </div>
    
  @endif

  @if (session('message'))
    <div class="alert alert-warning alert-dismissible fade show text-{{$align}} font-arabic" role="alert">
      <div class="alert-icon">
         <i class="fas fa-question"></i>
      </div>
       <h5>
        {{ trans('lang.warning') }}
      </h5>
      <p class="text-dark">{{ session('message') }} @php session()->forget('message'); @endphp</p>
      {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button> --}}
    </div>
  @endif
@endif

