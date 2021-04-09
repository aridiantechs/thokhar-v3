<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        $startDate = Carbon::today();
         
        for ($i=1; $i <=7 ; $i++) {
            $day=$startDate->addDay();
            $week[]=[ 
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
        dd($request->all());
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
