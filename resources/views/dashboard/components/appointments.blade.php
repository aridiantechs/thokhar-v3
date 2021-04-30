<div class="mb-3">
    <h4 class="blue__head">{{\Carbon\Carbon::parse( isset($date) ? $date : now())->format('l')}}</h4>
    <span class="sub_text">{{\Carbon\Carbon::parse( isset($date) ? $date : now())->format('Y-m-d')}}</span>
</div>

@forelse($consultations as $consult)
    <div class="row">
        <div class="col-md-12">
            <div class="bg-white p-2 ">
                <p class="color_blue user_detail" pd-popup-open="userDetail" data-user="{{json_encode($consult->user)}}" data-slot="{{$consult->slot->slot ?? ''}}" >{{$consult->user->name ?? ''}}<br><span class="consult__time">{{$consult->slot->slot ?? ''}}</span> </p>
                <button class="btn btn-info assign_btn" pd-popup-open="counselling_session" data-consultid="{{$consult->id}}" data-user="{{json_encode($consult->user)}}" data-slot="{{$consult->slot->slot ?? ''}}" data-workingdate="{{$consult->working_hour->date ?? ''}}">{{ auth()->user()->hasRole('moderator') ? 'update' : 'Assign' }}</button>
            </div>
        </div>
        {{-- <div class="col-md-3"><p>08:00</p> </div> --}}
    </div>
    <br>
@empty
    <div class="row">
        <h5 class="col-md-12">No appointments found!</h5>
    </div>
@endforelse