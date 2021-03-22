<p class="text-muted text-center text-md-{{$align}} mb-0">
	<span>{{ trans('lang.Home') }}</span> <span> / </span><span>  {{ trans('lang.wizard_q.title') }} </span><span> / </span><span>  {{ $heading ?? '' }} </span>
</p>
<h1 class="{{ $heading_size_class ?? 'display-4' }} text-center text-md-{{$align}} mb-3 ">
	<strong class="text-primary font-arabic">{!! $heading ?? '' !!}</strong>
</h1>