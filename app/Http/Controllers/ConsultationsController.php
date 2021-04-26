<?php

namespace App\Http\Controllers;

use Session;
use App\Slot;
use App\User;
use DateTime;
use Carbon\Carbon;
use App\WorkingHour;
use App\Consultations;
use Illuminate\Http\Request;

class ConsultationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            $slots=Slot::all();
            $consultations=Consultations::whereHas('working_hour',function($q){
                $q->whereDate('date','=',Carbon::now()->format('Y-m-d'));
            })->with('slot')->get();
            $startDate = Carbon::today();
            
            $moderators= User::whereHas(
                'roles', function($q){
                    $q->where('name','moderator');
                }
            )->get();

            for ($i=1; $i <=7 ; $i++) {
                $day=$startDate->addDay();
                $week[]=[
                    "id"=>$day->format('Y-m-d'),
                    "full_date"=>$day->format('Y-m-d l'),
                    "day"=>$day->format('l')
                ];
            }

            $working_hours=WorkingHour::whereIn('date',collect($week)->pluck('id'))->get();
        } elseif(auth()->user()->hasRole('moderator')) {
            $consult=Consultations::where('assign_to',auth()->user()->id)->get();
            
            return view('dashboard.control_panel.moderator.list',compact('consult'));
        }
        

       return view('dashboard.control_panel.counseling.list')
                ->with([
                    'title' => 'Counseling',
                    'page_title' => 'Counseling',
                    'week' => $week,
                    'slots'=>$slots,
                    'working_hours'=>$working_hours,
                    'consultations'=>$consultations,
                    'moderators'=>$moderators
                ]);
    }


    public function getAppointments(Request $request)
    {
        if ($request->date) {
            try {
                
                $date= Carbon::createFromFormat('D M d Y', $request->date)->format('Y-m-d');
                $consultations=Consultations::whereHas('working_hour',function($q) use ($date){
                    $q->whereDate('date','=',$date);
                })->with('slot')->get();

                $data=[
                    'status'=>true,
                    'data'=>view('dashboard.components.appointments',compact('date','consultations'))->render()
                ];

            } catch (\Exception $e) {
                $data=[
                    'status'=>false,
                    'message'=>"invalid date"
                ];
            }  
        } else {
            $data=[
                'status'=>false,
                'message'=>"date is required"
            ];
            
        }
        
        return $data;
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* dd($request->all()); */
        foreach ($request->day as $key => $date) {
            if ($request->status && $request->slots) {
                if (array_key_exists($key,$request->status) && array_key_exists($key,$request->slots) ) {
                    $check=WorkingHour::where('date',$key)->get();
                    if (count($check) > 0) {
                        $check->delete();
                    }
                    $working=new WorkingHour;
                    $working->date=$key;
                    $working->slots=implode(",",$request->slots[$key]);
                    $working->save();
                }
            }
            
        }

        if ($working) {
            $status = array('msg' => "Data saved", 'toastr' => "successToastr");
        }else{
            $status = array('msg' => "Something went wrong", 'toastr' => "errorToastr");
        }
        
        Session::flash($status['toastr'], $status['msg']);
        return redirect()->back();
    }

    public function assign_consultation(Request $request)
    {
        /* dd($request->all()); */
        if ($request->assign_to && $request->consult_id) {
            $consult=Consultations::findOrFail($request->consult_id);
            $consult->assign_to=$request->assign_to;
            $consult->save();
            if ($consult) {
                $status = array('msg' => "Data saved", 'toastr' => "successToastr");
            }
        }

        else{
            $status = array('msg' => "Something went wrong", 'toastr' => "errorToastr");
        }
        
        Session::flash($status['toastr'], $status['msg']);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consultations  $consultations
     * @return \Illuminate\Http\Response
     */
    public function show(Consultations $consultations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consultations  $consultations
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultations $consultations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consultations  $consultations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultations $consultations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consultations  $consultations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultations $consultations)
    {
        //
    }
}
