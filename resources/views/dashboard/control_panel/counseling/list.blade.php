@inject('request', 'Illuminate\Http\Request')
@extends('dashboard.layouts.admin', ['title' => $title ?? ''])

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
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
    padding: 4px 16px;
    margin-bottom: 0;
    font-size: 12px;
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
    padding: 6px 4px !important;
}

.btn-calender__span2{
    color: #c2c5c5;
    border-radius: 22px !important;
    background: white !important;
    @if ($request->segment(1) == 'ar')
        left: -15px;
    @else
        right: -15px;
    @endif
    
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
    cursor: pointer;
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

    /* Work hour modal*/
        .popup {
            
            overflow-x: hidden;
            overflow-y: auto;
            font-family: "Google Sans",Roboto,Arial,sans-serif;
            width: 100%;
            height: 100%;
            display: none;
            position: fixed;
            top: 0px;
            left: 0px;
            background: rgba(0, 0, 0, 0.75);
        }

        .popup {
            z-index: 999999;
            text-align: center;
        }

        .popup:before {
            content: '';
            display: inline-block;
            height: 100%;
            margin-right: -4px;
            vertical-align: middle;
        }

        .popup-header {
            position: absolute;
            top: 10px;
            left: 24px;
            font-size: 25px;
            color: #036EED;
            border-radius: 0px 0px 6px 6px;
            margin-top: 0;
            padding: 0px 11px;
        }

        .popup-inner {
            display: inline-block;
            text-align: left;
            vertical-align: middle;
            position: relative;
            max-width: 900px;
            width: 90%;
            padding: 40px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 1);
            border-radius: 3px;
            background: #fff;
            text-align: center;
        }

        .popup-inner h1 {
            font-weight: 700;
        }

        .popup-inner p {
            padding: 0px 27px;
            font-size: 12px;
            font-weight: 400;
        }

        /*.popup-contact-wrapper{
            border-radius: 8px;
            border: 2px solid #dadce0;
            border-top: 4px solid #e77826;
        }*/

        .popup-close {
            color: red;
            width: 34px;
            height: 34px;
            padding-top: 4px;
            display: inline-block;
            position: absolute;
            top: 23px;
            right: 50px;
            -webkit-transform: translate(50%, -50%);
            transform: translate(50%, -50%);
            border-radius: 100%;
            background: transparent;
            border: solid 4px #808080;
        }

        .popup-close:after,
        .popup-close:before {
            content: "";
            position: absolute;
            top: 12px;
            left: 6px;
            height: 4px;
            width: 16px;
            border-radius: 30px;
            background: #ef1d1d;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .popup-close:after {
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }

        .popup-close:hover {
            -webkit-transform: translate(50%, -50%) rotate(180deg);
            transform: translate(50%, -50%) rotate(180deg);
            text-decoration: none;
            background: red !important;
            border-color: #ffffff !important;
        }

        .popup-close:hover:after,
        .popup-close:hover:before {
            background: #fff;
        }

        .popup-close {
            border: solid 3px red !important;
        }

        .counseling-pop-up{
            max-width: 500px !important;
        }

   /* End Work hour modal */

    tr.border_bottom td {
        border-bottom: 1px solid #d6d6d6;
        padding: 16px 8px;
    }

    /*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/
/* toggle switches with bootstrap default colors */
.custom-control-input-success:checked ~ .custom-control-label::before {
    background-color: #28a745 !important;
    border-color: #28a745 !important;
}

.custom-control-input-danger:checked ~ .custom-control-label::before {
    background-color: #dc3545 !important;
    border-color: #dc3545 !important;
}

.custom-control-input-warning:checked ~ .custom-control-label::before {
    background-color: #ffc107 !important;
    border-color: #ffc107 !important;
}

.custom-control-input-info:checked ~ .custom-control-label::before {
    background-color: #17a2b8 !important;
    border-color: #17a2b8 !important;
}

/* Large toggl switches */
.custom-switch-lg .custom-control-label::before {
    left: -2.25rem;
    width: 3rem;
    border-radius: 1.5rem;
}

.custom-switch-lg .custom-control-label::after {
    top: calc(.25rem + 3px);
    left: calc(-2.25rem + 4px);
    width: calc(1.5rem - 6px);
    height: calc(1.5rem - 6px);
    border-radius: 1.5rem;
}

.custom-switch-lg .custom-control-input:checked ~ .custom-control-label::after {
    transform: translateX(1.4rem);
}

.custom-switch-lg .custom-control-label::before {
    height: 1.5rem;
}

.custom-switch-lg .custom-control-label {
    padding-left: 1.5rem;
    line-height: 1.7rem;
}

.custom-control {
    padding-left: 2.5rem;
}

.bg-gray-1{
background: #EDF3F3 !important;
border: none;
}

.bg-gray-1:not(input){
border-radius: .5rem;
}

.fa__color_blue{
    color: #73a9e8;
    font-size: 13px;
}

.cs__input{
    height: 35px !important;
}

.f-size-14{
    font-size: 14px;
}

.flt-right{
    float: right;
}

.flt-left{
    float: left;
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
                                <button type="submit" class="btn-ltr btn btn-big btn-gradient btn-rad35 btn-primary with-arrow w-100-sm" pd-popup-open="popupNew">
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
                            <p class="color_blue" pd-popup-open="counselling_session">User Name Here <br><span> 8:00 - 8:29</span> </p>

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
    <div class="popup" pd-popup="popupNew">
        <div class="popup-inner">
           <div class="popup-contact-wrapper">
                <h4 class="popup-header mx-auto">Change Work Hours</h4>
                <hr>
              
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="example" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th><p class="text_black">Day</p></th>
                                        <th><p class="text_black">Shift</p></th>
                                        <th><p class="text_black">From:</p></th>
                                        <th><p class="text_black">To:</p></th>
                                        <th><p class="text_black">Shift</p></th>
                                        <th><p class="text_black">From:</p></th>
                                        <th><p class="text_black">To:</p></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border_bottom">
                                        
                                        <td class="align-middle"><p class="text_black">
                                            Sunday
                                        </p></td>
                                        
                                        <td class="align-middle">
                                            <div class="custom-control custom-switch custom-switch-lg">
                                                <input class="custom-control-input" id="customSwitch7" type="checkbox" checked>
                                                <label class="custom-control-label font-italic" for="customSwitch7"></label>
                                            </div>
                                        </td>
                                        {{-- <td class="align-middle"><p class="text_black">
                                            ********
                                        </p></td> --}}
                                        <td class="align-middle">
                                            <button type="button" class="btn-calender bg-talent w-100-sm" style="height: unset !important">
                                                <span class="btn-calender__span1">April 2021</span>
                                                <span class="btn-calender__span2"><i class="fas fa-angle-down"></i></span>
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                            <button type="button" class="btn-calender bg-talent w-100-sm" style="height: unset !important">
                                                <span class="btn-calender__span1">April 2021</span>
                                                <span class="btn-calender__span2"><i class="fas fa-angle-down"></i></span>
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                            <div class="custom-control custom-switch custom-switch-lg">
                                                <input class="custom-control-input" id="customSwitch7" type="checkbox" checked>
                                                <label class="custom-control-label font-italic" for="customSwitch7"></label>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <button type="button" class="btn-calender bg-talent w-100-sm" style="height: unset !important">
                                                <span class="btn-calender__span1">April 2021</span>
                                                <span class="btn-calender__span2"><i class="fas fa-angle-down"></i></span>
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                            <button type="button" class="btn-calender bg-talent w-100-sm" style="height: unset !important">
                                                <span class="btn-calender__span1">April 2021</span>
                                                <span class="btn-calender__span2"><i class="fas fa-angle-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="border_bottom">
                                        
                                        <td class="align-middle"><p class="text_black">
                                            Sunday
                                        </p></td>
                                        
                                        <td class="align-middle">
                                            <div class="custom-control custom-switch custom-switch-lg">
                                                <input class="custom-control-input" id="customSwitch7" type="checkbox" checked>
                                                <label class="custom-control-label font-italic" for="customSwitch7"></label>
                                            </div>
                                        </td>
                                        {{-- <td class="align-middle"><p class="text_black">
                                            ********
                                        </p></td> --}}
                                        <td class="align-middle">
                                            <button type="button" class="btn-calender bg-talent w-100-sm" style="height: unset !important">
                                                <span class="btn-calender__span1">April 2021</span>
                                                <span class="btn-calender__span2"><i class="fas fa-angle-down"></i></span>
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                            <button type="button" class="btn-calender bg-talent w-100-sm" style="height: unset !important">
                                                <span class="btn-calender__span1">April 2021</span>
                                                <span class="btn-calender__span2"><i class="fas fa-angle-down"></i></span>
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                            <div class="custom-control custom-switch custom-switch-lg">
                                                <input class="custom-control-input" id="customSwitch7" type="checkbox" checked>
                                                <label class="custom-control-label font-italic" for="customSwitch7"></label>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <button type="button" class="btn-calender bg-talent w-100-sm" style="height: unset !important">
                                                <span class="btn-calender__span1">April 2021</span>
                                                <span class="btn-calender__span2"><i class="fas fa-angle-down"></i></span>
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                            <button type="button" class="btn-calender bg-talent w-100-sm" style="height: unset !important">
                                                <span class="btn-calender__span1">April 2021</span>
                                                <span class="btn-calender__span2"><i class="fas fa-angle-down"></i></span>
                                            </button>
                                        </td>
                                    </tr> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="col-md-12 mt-5">
                        <button type="submit" class="btn-ltr btn btn-big btn-gradient btn-rad35 btn-primary with-arrow w-100-sm flt-right" pd-popup-open="popupNew">
                            <span class="d-inline-block">Save & Close</span>
                        </button>
                    </div>
                </div>
  
                <a class="popup-close" pd-popup-close="popupNew" href="#"> </a>
           </div>
           
        </div>
    </div>

    <div class="popup" pd-popup="counselling_session">
        <div class="popup-inner counseling-pop-up">
           <div class="popup-contact-wrapper">
                <h4 class="popup-header mx-auto">Counseling Session</h4>
                <hr>
              
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group mb-3 cs__input">
                            <div class="input-group-prepend">
                              <span class="input-group-text bg-gray-1"><i class="fa fa-user fa__color_blue" aria-hidden="true"></i></span>
                            </div>
                            <input type="text" class="form-control bg-gray-1 cs__input" aria-label="Amount (to the nearest dollar)">
                            <div class="input-group-append">
                              <span class="input-group-text bg-gray-1"><i class="fa fa-edit fa__color_blue" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3 cs__input">
                            <div class="input-group-prepend">
                              <span class="input-group-text bg-gray-1"><i class="fa fa-calendar fa__color_blue" aria-hidden="true"></i></span>
                            </div>
                            <input type="text" class="form-control bg-gray-1 cs__input" aria-label="Amount (to the nearest dollar)">
                            <div class="input-group-append">
                              <span class="input-group-text bg-gray-1"><i class="fa fa-edit fa__color_blue" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3 cs__input">
                            <div class="input-group-prepend">
                              <span class="input-group-text bg-gray-1"><i class="fa fa-clock fa__color_blue" aria-hidden="true"></i></span>
                            </div>
                            <input type="text" class="form-control bg-gray-1 cs__input" aria-label="Amount (to the nearest dollar)">
                            <div class="input-group-append">
                              <span class="input-group-text bg-gray-1"><i class="fa fa-edit fa__color_blue" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label f-size-14">Delegate  To :</label>
                            <div class="col-sm-9">
                                <div class="input-group mb-3 cs__input">
                                    <input type="text" class="form-control bg-gray-1 cs__input" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                      <span class="input-group-text bg-gray-1" id="basic-addon2"><i class="fa fa-user fa__color_blue" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="row mt-5">
                    <div class="col-md-6">
                        <button type="submit" class="btn-ltr btn btn-big btn-rad35 btn-danger with-arrow w-100-sm flt-left" pd-popup-open="popupNew">
                            <span class="d-inline-block">Save & Close</span>
                        </button>
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="btn-ltr btn btn-big btn-gradient btn-rad35 btn-primary with-arrow w-100-sm flt-right" pd-popup-open="popupNew">
                            <span class="d-inline-block">Save & Close</span>
                        </button>
                    </div>
                </div>
                
  
                <a class="popup-close" pd-popup-close="counselling_session" href="#"> </a>
           </div>
           
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
@endsection