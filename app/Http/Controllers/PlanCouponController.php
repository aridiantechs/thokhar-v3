<?php

namespace App\Http\Controllers;

use App\Consultations;
use Illuminate\Http\Request;

class PlanCouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* dd(123); */
       return view('dashboard.control_panel.plans_coupons.list')
                ->with([
                    'title' => 'Plans and Coupons',
                    'page_title' => 'Plans and Coupons',
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
        //
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
