@inject('request', 'Illuminate\Http\Request')
@extends('dashboard.layouts.admin', ['title' => $title ?? ''])

@section('styles')
<style>

.user__intro{
    color: #036EED;
}

.ft-size-3r{
    font-size: 3rem;
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

.form-group >label,.labell{
    color: #0B4F6C;
    font-size: 1.3rem;
}

.bg-gray-1{
    background: #e8f1f2 !important;
    border: none;
    border-radius: .5rem !important;
}

.cs__input{
    height: 35px !important;
}

.border-grey-light{
    border: 1px solid #dadada;
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
                        <h2 class="user__intro {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }} ft-size-3r">{{ $page_title }}</h2>
                    </div>
                </div>
                <div class="row">
                    <form class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="user__intro" for="exampleInputEmail1">Plan Name</label>
                                    <input type="text" class="form-control cs__input bg-gray-1" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Plan Name">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="user__intro" for="exampleInputEmail1">Plan Price</label>
                                    <input type="text" class="form-control cs__input bg-gray-1" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Plan Price">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="user__intro" for="exampleFormControlTextarea1">Plan Descripion</label>
                                    <textarea class="form-control bg-gray-1" id="exampleFormControlTextarea1" rows="3" placeholder="Plan Descripion"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="user__intro labell" for="exampleInputEmail1">Plan Features</label>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <input type="text" class="form-control cs__input bg-gray-1" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Feature 1">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <input type="text" class="form-control cs__input bg-gray-1" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Feature 2">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <input type="text" class="form-control cs__input bg-gray-1" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Feature 3">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <input type="text" class="form-control cs__input bg-gray-1" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Feature 4">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <input type="text" class="form-control cs__input bg-gray-1" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Feature 5">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <input type="text" class="form-control cs__input bg-gray-1" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Feature 6">
                                </div>
                            </div>
                        </div>
                        
                        
                        <button type="submit" class="btn-ltr btn btn-big btn-gradient btn-rad35 btn-primary with-arrow w-100-sm float-{{$alignreverse}} mb-4" >
                            <span class="d-inline-block">Add</span>
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-md-3 bg__grey">
                <h2 class="user__intro {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }} mt-4 mb-4 ft-size-3r">Add a Coupon</h2>
                <form class="mb-5">
                    <div class="form-group">
                      <label class="user__intro" for="exampleInputEmail1">Coupon Code</label>
                      <input type="text" class="form-control border-grey-light cs__input bg-gray-1" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Coupon Code">
                      
                    </div>
                    <div class="form-group">
                        <label class="user__intro" for="exampleInputEmail1">Coupons Quantity</label>
                        <input type="text" class="form-control border-grey-light cs__input bg-gray-1" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Coupons Quantity">
                        
                    </div>
                    <div class="form-group">
                        <label class="user__intro" for="exampleInputEmail1">Percentage Discount</label>
                        <input type="text" class="form-control border-grey-light cs__input bg-gray-1" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Percentage Discount">
                        
                    </div>
                    <button type="submit" class="btn-ltr btn btn-big btn-gradient btn-rad35 btn-primary with-arrow w-100-sm float-{{$alignreverse}} mb-4">
                        <span class="d-inline-block">Add</span>
                    </button>
                </form>

                <div class="table-responsive">
                    <h2 class="user__intro {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }} mt-4 mb-4 ft-size-3r">Coupons List</h2>
                    <table id="example" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th><p>Code</p></th>
                                <th><p>Quantity</p></th>
                                <th><p>Discount</p></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border_bottom">
                                
                                <td class="align-middle"><p class="text_black">
                                    LdF54
                                    </p>
                                </td>
                                <td class="align-middle"><p class="text_black">
                                    15
                                    </p>
                                </td>
                                <td class="align-middle"><p class="text_black">
                                    8%
                                    </p>
                                </td>
                                
                            </tr>
                            <tr class="border_bottom">
                                
                                <td class="align-middle"><p class="text_black">
                                    LdF54
                                    </p>
                                </td>
                                <td class="align-middle"><p class="text_black">
                                    15
                                    </p>
                                </td>
                                <td class="align-middle"><p class="text_black">
                                    8%
                                    </p>
                                </td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
	</div>

@endsection

@section('scripts')
    
@endsection