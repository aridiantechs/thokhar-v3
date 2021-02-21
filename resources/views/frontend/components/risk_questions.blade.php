<div class="row row-grid flex-row-reverse risk-items">
  @foreach($data as $index => $value)
    <div class="col-12 mt-3 ">
      {{-- <div class="radio fancy-green pr-5 shadow-lg radio-active"> --}}
      <div class="radio fancy-green shadow-lg @if($old_value == $value) radio-active @endif">
        <label>
          <input type="radio" name="{{ $name }}" id="" value="{{ $value }}" @if($old_value == $value) checked @endif>
            {{ $index }}
          <span></span>
        </label>
      </div>
    </div>
  @endforeach
 
</div>