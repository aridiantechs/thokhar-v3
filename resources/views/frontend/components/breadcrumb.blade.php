<p class="text-muted text-center text-md-{{$align}} mb-lg-4">
	<span><a class="bc__color" href="{{route('/',app()->getLocale() ?? 'ar')}}">{{ trans('lang.Home') }}</a></span> <span> / </span><span><a class="bc__color" href="{{route('wizard',app()->getLocale() ?? 'ar')}}">  {{ trans('lang.wizard_q.title') }} </a></span><span> / </span><span>  {{ $heading ?? '' }} </span>
</p>
{{-- <h1 class="{{ $heading_size_class ?? 'display-4' }} text-center text-md-{{$align}} mb-3 ">
	<strong class="text-primary font-arabic">{!! $heading ?? '' !!}</strong>
</h1> --}}