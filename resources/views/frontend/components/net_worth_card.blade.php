<div class="card card-shadow has-bg-right">
	<div class="card-body p-0">
		<div class="row row-grid">
			<div class="col-12 col-md-6 col-lg-6 text-left d-flex align-items-end">
				<figure class="w-100 pt-5">
					<img alt="" src="{{ asset('frontend_assets/'. $image ?? '') }}" class="img-fluid">
				</figure>
			</div>
			<div class="col-12 col-md-6 col-lg-6">
				<div class="p-5 pl-lg-0">
					<h1 class="display-4 text-center text-md-right mb-3 ">
						<strong class="text-primary-1 font-arabic">مقدمة </strong>
					</h1>
					<h3 class="txt-blue-light text-right font-arabic">
					{{ $text ?? '' }}
					</h3>
					<div class="text-right">
						<button type="button" onclick="next()" id="" class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary with-arrow {{ $btn_class ?? '' }}">
							<i class="fa fa-arrow-left"></i>
							<span class="d-inline-block">التالي</span>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>