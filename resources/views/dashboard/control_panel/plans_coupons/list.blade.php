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
    padding: 30px;
}
.table {
    font-size: 12px;
    color: #989898;
}
.user_icon{
	position: relative;
    top: -2px;
    left: 3px;
}
.table td {
    font-weight: 600;
}
tbody tr:last-child > td, tbody tr:last-child > th {
    border-top: 1px solid transparent;
}

tr td:last-child {
    text-align: left !important;
}

th {
    font-weight: 400;
}
.table td, .table th {
    padding: 0.8rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}

.btn-althraa{
    color: #fff;
    background-color: #01630a;
    border-color: #01630a;
}

.user__intro{
    color: #036EED;
}


.bg__grey
{
    background-color: #e8f1f2;
    border-radius: 13px;
}

.blue__head{
    color: #036EED;
    font-size: 20px;

}

.flt-right{
    float: right;
}

.flt-left{
    float: left;
}

.nav-pills .nav-link.active{
    position: relative;
    border: none !important;
    color: #007bff !important;
}

.nav-pills .nav-link{
    font-family: 'Montserrat' !important;
    font-size: 24px !important;
}

.nav-pills .nav-link:hover{
    color: #007bff !important;

}

.nav-pills .nav-link.active .border_bottom {
  border-bottom: 4px solid #2ad58c;
  position: absolute;
  right: 76%;
    left: 9px;
}

.w-30{
    width: 30%;
}

.btn-edit{
    color: #2ad589;
}
.btn-delete{
    color: #d5442a;
}

.ft-size{
    font-size: 15px;
}

.table_stripped_head{
    background-color: rgba(0,0,0,.05);
}

.table_stripped_head>th{
    border:2px solid rgb(210 210 210) !important;
}

.table thead th {
    border-bottom:2px solid rgb(210 210 210)!important;
}

.table_stripped_tr > td{
    border:2px solid rgb(210 210 210) !important;
    color: #0B4F6C !important;
}

.table{
    border-collapse: separate;
    border-spacing: 0 0.5em;
}

@media (max-width: 565px)
{
    .justify-center-sm{
        justify-content: center;
    }

    .mb-sm-2r{
        margin-bottom: 2rem;
    }

    .align-center-sm{
        text-align: center;
    }

    .flt-right{
        float: unset;
    }

    .flt-left{
        float: unset;
    }
}

</style>
@endsection
@section('content')
	<br>
	<br>
	<div class="container {{-- pl-5 pr-5 --}} pb-5">
        @include('dashboard.components.navbar')
        <div class="row p-sm-3r">
            <div class="col-md-12">
                <div class="row mb-4">
                    <div class="col-md-5 col-sm-6">
                        <nav class="nav nav-pills {{-- flex-column --}} flex-sm-row justify-center-sm mb-sm-2r">
                            <a class="flex-sm-fill nav-link active" id="plans-tab" data-toggle="tab" href="#plans" role="tab" aria-controls="plans" aria-selected="true">{{ trans('lang.plans.Plans') }} <div class="border_bottom"></div></a>
                            <a class="flex-sm-fill nav-link" id="coupon-tab" data-toggle="tab" href="#coupon" role="tab" aria-controls="coupon" aria-selected="false">{{ trans('lang.plans.Coupons') }}  <div class="border_bottom"></div></a>
                        </nav>
                    </div>
                    <div class="col-md-7 col-sm-6 align-center-sm">
                        <a href="{{ route('create_plan', app()->getLocale()) }}" class="btn-ltr btn btn-big btn-gradient btn-rad35 btn-primary with-arrow w-100-sm flt-{{$alignreverse}}">
                            <span class="d-inline-block">{{ trans('lang.plans.Add Plans') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="plans" role="tabpanel" aria-labelledby="plans-tab">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mt-5">
                            <div class="">
                                <table class="table {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
                                    <thead>
                                        <tr class="table_stripped_head">
                                            <th scope="col">
                                                <p>
                                                    {{ trans('lang.plans.Name') }}
                                                </p>
                                            </th>
                                            <th scope="col">
                                                <p>
                                                    {{ trans('lang.plans.Description') }}
                                                </p>
                                            </th>
                                            <th scope="col">
                                                <p>
                                                    {{ trans('lang.plans.Features') }}
                                                </p>
                                            </th>
                                            <th scope="col">
                                                <p>
                                                    {{ trans('lang.plans.Price') }}
                                                </p>
                                            </th>
                                            <th scope="col">
                                                <p>
                                                    {{ trans('lang.plans.Coupons') }}
                                                </p>
                                            </th>
                                            <th scope="col">
                                                <p>
                                                    {{ trans('lang.plans.Status') }}
                                                </p>
                                            </th>
                                            <th scope="col">
                                                <p>
                                                    {{ trans('lang.plans.Actions') }}
                                                </p>
                                            </th>
                                        </tr>
                                    </thead>
                                <tbody>
                                        <tr class="table_stripped_tr">
                                            <td scope="row">
                                                <span>
                                                    Golden Plan
                                                </span>
                                            </td>
                                            <td class="w-30" scope="row">
                                                <span>
                                                    Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.

                                                </span>
                                            </td>
                                            <td scope="row">
                                                <ul style="list-style: none">
                                                    <li>Feature #1 </li>
                                                    <li>Feature #2 </li>
                                                    <li>Feature #3 </li>
                                                    <li>Feature #4 </li>
                                                    <li>Feature #5 </li>
                                                </ul>
                                            </td>
                                            <td scope="row">
                                                <span>
                                                    300 SAR
                                                </span>
                                            </td>
                                            <td scope="row">
                                                <span>
                                                    12
                                                </span>
                                            </td>
                                            <td scope="row">
                                                <span>
                                                    Open
                                                </span>
                                            </td>
                                            <td scope="row">
                                                <a href="#" class="btn btn-sm ft-size btn-edit" title="{{ trans('lang.plans.Edit') }}">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm ft-size btn-delete" title="{{ trans('lang.plans.Delete') }}">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                                                
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="coupon" role="tabpanel" aria-labelledby="coupon-tab">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mt-5">
                            <div class="">
                                <table class="table {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
                                    <thead>
                                        <tr class="table_stripped_head">
                                            <th scope="col">
                                                <p>
                                                    Name
                                                </p>
                                            </th>
                                            <th scope="col">
                                                <p>
                                                    Description
                                                </p>
                                            </th>
                                            <th scope="col">
                                                <p>
                                                    Features
                                                </p>
                                            </th>
                                            <th scope="col">
                                                <p>
                                                    Price
                                                </p>
                                            </th>
                                            <th scope="col">
                                                <p>
                                                    Coupons
                                                </p>
                                            </th>
                                            <th scope="col">
                                                <p>
                                                    Status
                                                </p>
                                            </th>
                                            <th scope="col">
                                                <p>
                                                    Actions
                                                </p>
                                            </th>
                                        </tr>
                                    </thead>
                                <tbody>
                                        <tr class="table_stripped_tr">
                                            <td scope="row">
                                                <span>
                                                    Golden Plan
                                                </span>
                                            </td>
                                            <td class="w-30" scope="row">
                                                <span>
                                                    Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.

                                                </span>
                                            </td>
                                            <td scope="row">
                                                <ul style="list-style: none">
                                                    <li>Feature #1 </li>
                                                    <li>Feature #2 </li>
                                                    <li>Feature #3 </li>
                                                    <li>Feature #4 </li>
                                                    <li>Feature #5 </li>
                                                </ul>
                                            </td>
                                            <td scope="row">
                                                <span>
                                                    300 SAR
                                                </span>
                                            </td>
                                            <td scope="row">
                                                <span>
                                                    12
                                                </span>
                                            </td>
                                            <td scope="row">
                                                <span>
                                                    Open
                                                </span>
                                            </td>
                                            <td scope="row">
                                                <a href="#" class="btn btn-sm ft-size btn-edit" title="Edit">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm ft-size btn-delete" title="delete">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                                                
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>

@endsection

@section('scripts')
    
@endsection