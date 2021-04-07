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

.btn-calender{
    display: inline-block;
    padding: 4px 30px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 20px;
    background: #e8f1f2 !important;
}



.btn-calender span {
    position: relative;
    display: inline-block;
    padding: 6px 12px;
    background: rgba(0,0,0,0.15);
    border-radius: 3px 0 0 3px;
}
.btn-calender__span1{
    left: 0px !important;
    background: none !important;
    font-weight: 700;
}

.btn-calender__span2{
    color: #c2c5c5;
    border-radius: 22px !important;
    background: white !important;
    right: -25px;
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

.sub_text{
    font-family: "Soin Sans Neue Bold", sans-serif;
    font-size: 11px;
}

.color_blue{
    color: #0B4F6C;
}

@media (max-width: 990px)
{
    .shift_col {
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%;
    }
    
}

@media (max-width: 576px)
{
    .w-100-sm{
        width: 100%;
    }

    .p-sm-3r{
        padding: 3rem;
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
            <div class="col-md-9">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <h2 class="user__intro {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">{{ $page_title }}</h2>
                    </div>
                    <div class="col-md-8 shift_col">
                        <div class="row">
                            <div class="col-md-6 mb-3 col-sm-6">
                                <button type="button" class="btn-calender bg-talent w-100-sm" style="height: unset !important">
                                    <span class="btn-calender__span1">April 2021</span>
                                    <span class="btn-calender__span2"><i class="fas fa-angle-down"></i></span>
                                </button>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <button type="submit" class="btn-ltr btn btn-big btn-gradient btn-rad35 btn-primary with-arrow w-100-sm">
                                    <span class="d-inline-block">Change work hours</span>
                                </button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-3 bg__grey p-5">
                <div class="mb-3">
                    <h4 class="blue__head">TUESDAY</h4>
                    <span class="sub_text">10 April 2021</span>
                </div>
            

                <div class="row">
                    <div class="col-md-9">
                        <div class="bg-white p-2">
                            <p class="color_blue">User Name Here <br><span> 8:00 - 8:29</span> </p>

                        </div>
                    </div>
                    <div class="col-md-3"><p>08:00</p> </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-9">
                        <div class="bg-white p-2">
                            <p class="color_blue">User Name Here <br><span>8:00 - 8:29</span></p>

                        </div>
                    </div>
                    <div class="col-md-3"><p>08:00</p> </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-9">
                        <div class="bg-white p-2">
                            <p class="color_blue">User Name Here <br><span>8:00 - 8:29</span></p>

                        </div>
                    </div>
                    <div class="col-md-3"><p>08:00</p> </div>
                </div>
            </div>
        </div>
		
	</div>

@endsection

@section('scripts')
    
@endsection