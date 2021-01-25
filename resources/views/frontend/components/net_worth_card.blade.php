<div class="card card-shadow has-bg-right">
	<div class="card-body p-0">
		<div class="row row-grid">
			<div class="col-12 col-md-6 col-lg-6">
				<div class="p-5 p{{$alignShort}}-lg-0">
					<h1 class="display-4 text-center text-md-{{$align}} mb-3 ">
						<strong class="text-primary-1 font-arabic">مقدمة </strong>
					</h1>
					<h3 class="txt-blue-light text-{{$align}} font-arabic">
					{{ $text ?? '' }}
					</h3>
					<div class="text-{{$align}}">
						<button type="button" onclick="next()" id="" class="btn-{{$align}} btn p-0-1 btn-big btn-gradient btn-rad35 btn-primary with-arrow {{ $btn_class ?? '' }}">
							{{-- <i class="fa fa-arrow-left"></i> --}}
							<span class="d-inline-block pr-4 pl-4">التالي</span>
							<i class="fa fa-arrow-{{$arrowAlign}}"></i>
						</button>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-6 col-lg-6 text-{{$align}} d-flex align-items-end">
				<figure class="w-100 pt-5">
					<img alt="" src="{{ asset('frontend_assets/'. $image ?? '') }}" class="img-fluid">
				</figure>
			</div>
		</div>
	</div>
</div>