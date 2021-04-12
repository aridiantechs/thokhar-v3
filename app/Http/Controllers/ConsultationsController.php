<?php

namespace App\Http\Controllers;

use App\Slot;
use Carbon\Carbon;
use App\WorkingHour;
use App\Consultations;
use Illuminate\Http\Request;
use Session;

class ConsultationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $startDate = Carbon::today();
         
        $slots=Slot::all();
        for ($i=1; $i <=7 ; $i++) {
            $day=$startDate->addDay();
            $week[]=[
                "id"=>$day->format('Y-m-d'),
                "full_date"=>$day->format('Y-m-d l'),
                "day"=>$day->format('l')
            ];
        }
       /* dd($week); */

       return view('dashboard.control_panel.counseling.list')
                ->with([
                    'title' => 'Counseling',
                    'page_title' => 'Counseling',
                    'week' => $week,
                    'slots'=>$slots
                ]);
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
