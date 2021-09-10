@inject('request', 'Illuminate\Http\Request')
@extends('dashboard.layouts.admin', ['title' => $title ?? ''])

@section('styles')
<style>
.table thead th {
    vertical-align: bottom;
    border-bottom: unset;
    border-top: unset;
    color: #989898;
    font-size: 20px;
    font-family: Soin Sans Neue, Medium;
}
.table_box{
	border: 1px solid #DADADA;
    padding: 10px;
}
.table {
    font-size: 12px;
    color: #989898;
}
.user_icon{
	position: relative;
    top: -2px;
    left: 3px;
    right: 4px;
}
.table td {
    font-weight: 600;
    text-align: right;
}
tbody tr:last-child > td, tbody tr:last-child > th {
    border-top: 1px solid transparent;
}
th {
    font-weight: 400;
}
.table td, .table th {
    padding: 0.8rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}

p.setting_text:hover {
    color: #22d09b !important;
    font-size: 21px;
}

.mw-100{
	max-width: 100% !important;
}
</style>
@endsection
@section('content')
{{-- <div class="content__body"> --}}
	<br>
	<br>
	<div class="container {{-- pl-5 pr-5 --}}">

		
		@include('dashboard.components.navbar')
		<hr>
		<div class="row mt-5 mb-5 pt-5 pb-5">
			<div class="col-md-12">
				{{-- <div>
					{{ dd(implode (", ", $bardata)) }}
				</div> --}}
				<div>
                    <canvas id="barChart" height="100"></canvas>
                </div>
			</div>			
		</div>
		<hr>
		{{-- <div class="row mt-5 {{ ($request->segment(1) == 'ar') ? 'text-right' : 'text-left' }}">
			<div class="col-lg-4 col-sm-12">
				<div class="table_box">
					<table class="table">
					  <thead>
					    <tr>
					      <th scope="col" colspan="2">{{ trans('lang.admin.this_month') }}</th>
					      
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
							<th scope="row"><p>{{ trans('lang.admin.registered_users') }}</p></th>
							<td>
								<span class="text_black" >
									{{ $users_analysis->current_month_users ?? 0 }}
								</span>
								<img class="user_icon" src="{{ asset('backend_assets/admin_dashboard/images/user_icon.svg') }}" height="9">
							</td>
					      
					    </tr>
					    <tr>
					      <th scope="row"><p>{{ trans('lang.admin.1+_execution') }}</p></th>
					      <td><span class="text_black" >400</span><img class="user_icon" src="{{ asset('backend_assets/admin_dashboard/images/user_icon.svg') }}" height="9">&nbsp&nbsp(+90)</td>
					      
					    </tr>
					    <tr>
					      <th scope="row"><p>{{ trans('lang.admin.planning') }}</p></th>
					      <td><span class="text_black" >1200</span><img class="user_icon" src="{{ asset('backend_assets/admin_dashboard/images/user_icon.svg') }}" height="9">&nbsp&nbsp(+4)</td>
					      
					    </tr>
					    <tr>
					      <th scope="row"><p>{{ trans('lang.admin.2+_portfolio_review') }}</p></th>
					      <td><span class="text_black" >300</span><img class="user_icon" src="{{ asset('backend_assets/admin_dashboard/images/user_icon.svg') }}" height="9">&nbsp&nbsp(+20)</td>
					      
					    </tr>
					    <tr>
					      <th scope="row" class="text_black"><p>{{ trans('lang.admin.canceled_membership') }}</p></th>
					      <td><span class="text_black" >500</span><img class="user_icon" src="{{ asset('backend_assets/admin_dashboard/images/user_icon.svg') }}" height="9">&nbsp&nbsp(+60)</td>
					      
					    </tr>
					    <tr>
					      <th scope="row"></th>
					      <td><span class="text_red" >-$400</span></td>
					      
					    </tr>
					    <tr>
					      <th scope="row"><p class="text_black">{{ trans('lang.admin.earnings') }}</p></th>
					      <td><span class="text_black" >+$32,500</span>(+3,348)</td>
					      
					    </tr>
					    
					  </tbody>
					</table>
				</div>
				<br>
				<br>
			</div>
			<div class="col-lg-4 col-sm-12">
				<div class="table_box">
					<table class="table">
					  <thead>
					    <tr>
					      <th scope="col" colspan="2">{{ trans('lang.admin.today') }}</th>
					      
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
							<th scope="row"><p>{{ trans('lang.admin.registered_users') }}</p></th>
							<td>
								<span class="text_black" >
									{{ $users_analysis->today_users ?? 0 }}
								</span>
								<img class="user_icon" src="{{ asset('backend_assets/admin_dashboard/images/user_icon.svg') }}" height="9">
							</td>
					      
					    </tr>
					    <tr>
					      <th scope="row"><p>{{ trans('lang.admin.1+_execution') }}</p></th>
					      <td><span class="text_black" >400</span><img class="user_icon" src="{{ asset('backend_assets/admin_dashboard/images/user_icon.svg') }}" height="9">&nbsp&nbsp(+90)</td>
					      
					    </tr>
					    <tr>
					      <th scope="row"><p>{{ trans('lang.admin.planning') }}</p></th>
					      <td><span class="text_black" >1200</span><img class="user_icon" src="{{ asset('backend_assets/admin_dashboard/images/user_icon.svg') }}" height="9">&nbsp&nbsp(+4)</td>
					      
					    </tr>
					    <tr>
					      <th scope="row"><p>{{ trans('lang.admin.2+_portfolio_review') }}</p></th>
					      <td><span class="text_black" >300</span><img class="user_icon" src="{{ asset('backend_assets/admin_dashboard/images/user_icon.svg') }}" height="9">&nbsp&nbsp(+20)</td>
					      
					    </tr>
					    <tr>
					      <th scope="row"><p class="text_black">{{ trans('lang.admin.canceled_membership') }}</p></th>
					      <td><span class="text_black" >500</span><img class="user_icon" src="{{ asset('backend_assets/admin_dashboard/images/user_icon.svg') }}" height="9">&nbsp&nbsp(+60)</td>
					      
					    </tr>
					    <tr>
					      <th scope="row"></th>
					      <td><span class="text_red" >-$400</span></td>
					      
					    </tr>
					    <tr>
					      <th scope="row" class="text_black"><p>{{ trans('lang.admin.earnings') }}</p></th>
					      <td><span class="text_black" >+$32,500</span>(+3,348)</td>
					      
					    </tr>
					    
					  </tbody>
					</table>
				</div>
				<br>
				<br>
			</div>
			<div class="col-lg-4 col-sm-12">
				<div class="table_box">
					<table class="table">
					  <thead>
					    <tr>
					      <th scope="col" colspan="2">{{ trans('lang.admin.last_month') }}</th>
					      
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
							<th scope="row"><p>{{ trans('lang.admin.registered_users') }}</p></th>
							<td>
								<span class="text_black" >
									{{ $users_analysis->last_month_users ?? 0 }}
								</span>
								<img class="user_icon" src="{{ asset('backend_assets/admin_dashboard/images/user_icon.svg') }}" height="9">
							</td>
					      
					    </tr>
					    <tr>
					      <th scope="row"><p>{{ trans('lang.admin.1+_execution') }}</p></th>
					      <td><span class="text_black" >400</span><img class="user_icon" src="{{ asset('backend_assets/admin_dashboard/images/user_icon.svg') }}" height="9">&nbsp&nbsp(+90)</td>
					      
					    </tr>
					    <tr>
					      <th scope="row"><p>{{ trans('lang.admin.planning') }}</p></th>
					      <td><span class="text_black" >1200</span><img class="user_icon" src="{{ asset('backend_assets/admin_dashboard/images/user_icon.svg') }}" height="9">&nbsp&nbsp(+4)</td>
					      
					    </tr>
					    <tr>
					      <th scope="row"><p>{{ trans('lang.admin.2+_portfolio_review') }}</p></th>
					      <td><span class="text_black" >300</span><img class="user_icon" src="{{ asset('backend_assets/admin_dashboard/images/user_icon.svg') }}" height="9">&nbsp&nbsp(+20)</td>
					      
					    </tr>
					    <tr>
					      <th scope="row" ><p class="text_black">{{ trans('lang.admin.canceled_membership') }}</p></th>
					      <td><span class="text_black" >500</span><img class="user_icon" src="{{ asset('backend_assets/admin_dashboard/images/user_icon.svg') }}" height="9">&nbsp&nbsp(+60)</td>
					      
					    </tr>
					    <tr>
					      <th scope="row"></th>
					      <td><span class="text_red" >-$400</span></td>
					      
					    </tr>
					    <tr>
					      <th scope="row" class="text_black"><p>{{ trans('lang.admin.earnings') }}</p></th>
					      <td><span class="text_black" >+$32,500</span>(+3,348)</td>
					      
					    </tr>
					    
					  </tbody>
					</table>
				</div>
				<br>
				<br>
			</div>
		</div> --}}

		<div class="s-100"></div>
	</div>
{{-- </div> --}}
@endsection

@section('scripts')
	<!-- ChartJS-->
    <script src="{{ asset('backend_assets/admin_dashboard/plugins/chartJs/Chart.min.js') }}"></script>
	<script type="text/javascript">
		$(function () {
			var userData = '{!! implode (", ", $bardata) !!}';

			var barData = {
				@if ($request->segment(1) == 'en')
			        labels: [
			        	"{{ trans('lang.admin.january') }}", 
			        	"{{ trans('lang.admin.february') }}", 
			        	"{{ trans('lang.admin.march') }}", 
			        	"{{ trans('lang.admin.april') }}", 
			        	"{{ trans('lang.admin.may') }}", 
			        	"{{ trans('lang.admin.june') }}", 
			        	"{{ trans('lang.admin.july') }}", 
			        	"{{ trans('lang.admin.august') }}", 
			        	"{{ trans('lang.admin.september') }}", 
			        	"{{ trans('lang.admin.october') }}", 
			        	"{{ trans('lang.admin.november') }}",
			        	"{{ trans('lang.admin.december') }}"
			        ],
		        @else	
		        	labels: [
			        	"{{ trans('lang.admin.december') }}",
			        	"{{ trans('lang.admin.november') }}",
			        	"{{ trans('lang.admin.october') }}", 
			        	"{{ trans('lang.admin.september') }}", 
			        	"{{ trans('lang.admin.august') }}", 
			        	"{{ trans('lang.admin.july') }}", 
			        	"{{ trans('lang.admin.june') }}", 
			        	"{{ trans('lang.admin.may') }}", 
			        	"{{ trans('lang.admin.april') }}", 
			        	"{{ trans('lang.admin.march') }}", 
			        	"{{ trans('lang.admin.february') }}", 
			        	"{{ trans('lang.admin.january') }}"
			        ],
			    @endif
		        datasets: [
		            {
		                label: "Users",
		                backgroundColor: 'rgba(34,208,155,1)',
		                borderColor: "rgba(34,208,155,1)",
		                pointBackgroundColor: "rgba(34,208,155,1)",
		                pointBorderColor: "#fff",
		                data: [{!! implode (", ", (($request->segment(1) == 'ar') ? array_reverse($bardata) : $bardata)) !!}],
		            },
		        ],
		    };

		    
		    var options = {
				  scales: {
				    yAxes: [{
				      display: true,
				      position: {!! ($request->segment(1) == 'ar') ? '"right"' : '"left"' !!},
				      ticks: {
				        beginAtZero: true
				      }
				    }]
				  },
				  tooltips: {
				    enabled: true,
				    mode: 'label'
				  },
				  legend: {
				    display: true,
				  },
				  responsive: true
				};


		    var ctx2 = document.getElementById("barChart").getContext("2d");
		    new Chart(ctx2, {type: 'bar', data: barData, options:options});
		});
	</script>
@endsection