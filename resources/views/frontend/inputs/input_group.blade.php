{{-- @dd($user_questionnaire) --}}
<div class="input-group">
	@if(!isset($no_icon))
	    <div class="input-group-prepend">
	        <span class="input-group-text"><i data-feather="{{ $icon ?? 'check-circle' }}"></i></span>
	    </div>
	@endif
    <input type="{{ $type ?? 'text' }}" class="form-control input-big {{ $class ?? '' }}" value="{{ (old($old_val) ?? 0) ? old($old_val) : ($value ?? '') }}" name="{{ $name ?? 'no_name' }}"  placeholder="{{ $placeholder ?? '0.00' }}" id="{{ $id ?? '' }}">
</div>