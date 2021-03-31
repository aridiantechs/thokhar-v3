@inject('request', 'Illuminate\Http\Request')

@if($request->segment(1) == 'ar')

 @if(count($errors)>0)
  <div class="alert alert-warning alert-dismissible fade show text-right font-arabic" role="alert">
    <div class="alert-icon">
       <i class="fas fa-question"></i>
    </div>
     <h5>
      {{ trans('lang.warning') }}
    </h5>
    <ul>
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
    <div class="alert alert-warning alert-dismissible fade show text-right font-arabic" role="alert">
      <div class="alert-icon">
         <i class="fas fa-question"></i>
      </div>
       <h5>
        {{ trans('lang.warning') }}
      </h5>
      <p class="text-dark">{{ session('message') }}</p>
      {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button> --}}
    </div>
  @endif

@else
  @if(count($errors)>0)
  <div class="alert alert-warning alert-dismissible fade show text-right font-arabic" role="alert">
    <div class="alert-icon">
       <i class="fas fa-question"></i>
    </div>
     <h5>
      {{ trans('lang.warning') }}
    </h5>
    <ul>
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
    <div class="alert alert-warning alert-dismissible fade show text-right font-arabic" role="alert">
      <div class="alert-icon">
         <i class="fas fa-question"></i>
      </div>
       <h5>
        {{ trans('lang.warning') }}
      </h5>
      <p class="text-dark">{{ session('message') }}</p>
      {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button> --}}
    </div>
  @endif
@endif

