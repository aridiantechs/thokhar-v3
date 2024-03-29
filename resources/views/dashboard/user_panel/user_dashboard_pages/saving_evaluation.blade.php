@inject('request', 'Illuminate\Http\Request')

@extends('dashboard.layouts..user_layout.user_dashboard')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/rickshaw/1.6.6/rickshaw.css">
<style>



/* Stacked */

canvas{
  background:#fff;
  height:240px;
}

.total_graph span {
    font-size: 20px;
    font-family: Soin Sans Neue;
    color: #989898;
}

.graph_price{
  float: right;
  color: #000 !important;
}

.graph_inner {
    text-align: center;
    position: relative;
    top: -170px;
}
p.inner_price {
    font-size: 22px;
    color: #222222;
    margin-bottom: 0;
}
.table_color{
  height: 20px;
    width: 5px;
    border-radius: 5px;
}
tbody tr:nth-child(1) td {
    border-top: 0px;
}
.table td{
    padding-bottom: 0;
}


.suggested-plan {
    text-align: center;
    padding: 50px 20px;
    font-size: 24px;
    background: #F0F1F3;
    color: #bcbcbc;
    font-family: Soin Sans Neue;
    font-weight: bold;
}
.suggested-plan:hover{
  background: #01630a;
    color: #fff;
}
.suggested-selected{
  background: #01630a8f;
    color: #fff;
}
.suggested-selected:hover{
  background: #01630a;
    color: #fff;
}
</style>
@endsection


@section('content')
<div class="content">
  <div class="container {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
    <div class="row">
      <div class="col-sm-6">
        <h2 class="user__intro ">Saving Evaluation</h2>
        <p>This is how are you currently performing.</p>
      </div>
      <div class="col-sm-6">
        @if(auth()->user()->hasRole('admin'))
          <a class="button {{ ($request->segment(1) == 'ar') ? 'float-left' : 'float-right' }}" href="{{ route('plan_selection', app()->getLocale(), $user) }}">
            Print / Save Resullts &nbsp; <i class="fa fa-arrow-circle-down"></i>
          </a>
        @else
          <a class="button {{ ($request->segment(1) == 'ar') ? 'float-left' : 'float-right' }}" href="{{ route('plan_selection', app()->getLocale()) }}">
            Print / Save Resullts &nbsp; <i class="fa fa-arrow-circle-down"></i>
          </a>
        @endif
      </div>
    </div>

      <div class="s-50"></div>
      <div id="tab1_saving_evaluation" class="tab-pane show active">
        <div class="row">
          <div class="col-lg-5 col-md-12 col-sm-12 mb-5">
            <p>Net Personal Income</p>
            <h1 class="income">
              $ {{ $netPersonalIncome ?? 0 }}
            </h1>
            <br>
            <br>
            <p>Saving Evaluation</p>
            <div class="row">
              <div class="col-2 percentage"><p>0%</p></div>
              <div class="col-2 percentage"><p>15%</p></div>
              <div class="col-2 percentage"><p>30%</p></div>
              <div class="col-1 percentage"><p></p></div>
              <div class="col-2 percentage"><p>70%</p></div>
              <div class="col-1 percentage"><p></p></div>
              <div class="col-2 percentage"><p>100%</p></div>
            </div>
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="{{ $currentSavingRate["currentSavingRatePercentage"] ?? 0 }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $currentSavingRate["currentSavingRatePercentage"] ?? 0 }}%" data-toggle="tooltip" title="{{ round($currentSavingRate["currentSavingRatePercentage"]) ?? 0 }}%">
                <span class="sr-only">{{ $currentSavingRate["currentSavingRatePercentage"] ?? 0 }}% Complete</span>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-2 emoji"><p>😣</p><p>Broken</p></div>
              <div class="col-2 emoji"><p>😥</p><p>Poor Saver</p></div>
              <div class="col-2 emoji"><p>🙂</p><p>Good Saver</p></div>
              <div class="col-1 emoji"><p></p><p></p></div>
              <div class="col-2 emoji"><p>😁</p><p>Excellent Saver</p></div>
              <div class="col-1 emoji"><p></p><p></p></div>
              <div class="col-2 emoji"><p>🤑</p><p>Wealthy</p></div>
            </div>
            <br>
          </div>

          <div class="col-lg-1 border-right"></div>

          <div class="col-lg-6 col-md-12 col-sm-12 mt-sm-5">
            <div class="row">
              <div class="col-lg-2 col-md-3 col-sm-3 col-3"></div>
              <div class="col-lg-4 col-md-3 col-sm-3 col-3">
                <div class="wrapper">
                  <canvas id="barChartCurrentSaving"></canvas>
                </div>
                <div class="text-center mt-5">
                  <h3>{{ 'Current' }}</h3>
                  <p>
                    <span class="badge" style="background-color: #ff903b; display: inline-block;  width: 12px; height: 12px;"></span>
                    {{ round($currentSavingRate['currentSavingRatePercentage'], 2) ?? 0 }} %
                  </p>
                  <p>
                    <span class="badge" style="background-color: #3b83ff; display: inline-block;  width: 12px; height: 12px;"></span>
                    {{ 100 - (round($currentSavingRate['currentSavingRatePercentage'], 2) ?? 0) }} %
                  </p>
                </div>
              </div>
              <div class="col-lg-4 col-md-3 col-sm-3 col-3">
                <div class="wrapper">
                  <canvas id="barChartPossibleSaving"></canvas>
                </div>
                <div class="text-center mt-5">
                  <h3>{{ 'Possible' }}</h3>
                  <p>
                    <span class="badge" style="background-color: #ff903b; display: inline-block; width: 12px; height: 12px;"></span>
                    {{ round($possibleSavingRate['possibleSavingRatePercentage'], 2) ?? 0 }} %
                  </p>
                  <p>
                    <span class="badge" style="background-color: #3b83ff; display: inline-block; width: 12px; height: 12px;"></span>
                    {{ 100 - (round($possibleSavingRate['possibleSavingRatePercentage'], 2) ?? 0) }} %
                  </p>
                </div>
              </div>
              <div class="col-lg-2  col-md-3 col-sm-3 col-3"></div>
            </div>
          </div>
        </div>
      </div>

  </div>
</div>
@endsection




@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
////////////////////////////////////
/*
|-------------------------------
|   Bar Chart Current Saving
|-------------------------------
*/
var ctx = document.getElementById("barChartCurrentSaving").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    datasets: [{
      label: 'Saving',
      backgroundColor: "#FF903B",
      data: [{!! round($currentSavingRate['currentSavingRatePercentage'], 2) ?? 0 !!}],
    }, {
      label: 'Spending',
      backgroundColor: "#3B83FF",
      data: [{!!  100 - (round($currentSavingRate['currentSavingRatePercentage'], 2) ?? 0) !!}],
    }],
  },
  options: {
      tooltips: {
        displayColors: true,
        callbacks:{
          mode: 'x',
        },
      },
      scales: {
      ticks: {
            display: false
        },
        xAxes: [{
          stacked: true,
          ticks: {
              display: false
          },
          gridLines: {
            display: false,
          }
        }],
        yAxes: [{
          stacked: true,
          ticks: {
            display: false,
          },
          gridLines: {
            display: false,
          },
          type: 'linear',
        }]
      },
    responsive: true,
    maintainAspectRatio: false,
    legend: { 
      position: 'bottom' 
    },
  }
});


////////////////////////////////////
/*
|-------------------------------
|   Bar Chart Current Saving
|-------------------------------
*/
var ctx = document.getElementById("barChartPossibleSaving").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    datasets: [{
      label: 'Saving',
      backgroundColor: "#FF903B",
      data: [{!! round($possibleSavingRate['possibleSavingRatePercentage'], 2) ?? 0 !!}],
    }, {
      label: 'Spending',
      backgroundColor: "#3B83FF",
      data: [{!! 100 - (round($possibleSavingRate['possibleSavingRatePercentage'], 2) ?? 0) !!}],
    }],
  },
  options: {
      tooltips: {
        displayColors: true,
        callbacks:{
          mode: 'x',
        },
      },
      scales: {
      ticks: {
            display: false
        },
        xAxes: [{
          stacked: true,
          ticks: {
              display: false
          },
          gridLines: {
            display: false,
          }
        }],
        yAxes: [{
          stacked: true,
          ticks: {
            display: false,
          },
          gridLines: {
            display: false,
          },
          type: 'linear',
        }]
      },
    responsive: true,
    maintainAspectRatio: false,
    legend: { 
      position: 'bottom' 
    },
  }
});


</script>
<script type="text/javascript">
  $('[data-toggle="tooltip"]').tooltip();
</script>
@endsection