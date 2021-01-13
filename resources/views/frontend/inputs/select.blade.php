<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text"><i data-feather="chevron-down"></i></span>
    </div>
    <select class="form-control input-big" name="{{ $name ?? 'no_name' }}"  placeholder="{{ $placeholder ?? '0.00' }}" id="{{ $id ?? '' }}">
    	@if($placeholder)
    		<option>{{ $placeholder ?? '' }}</option>
    	@endif
		@foreach($data as $value)
			<option value="{{ $value }}">{{ $value }}</option>
		@endforeach
	</select>
</div>