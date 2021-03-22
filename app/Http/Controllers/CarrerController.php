<?php

namespace App\Http\Controllers;

use App\Carrer;
use Illuminate\Http\Request;

class CarrerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.pages.career');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:50',
            'phone_number' => 'required|string|max:50',
            
        ]);

        if ($validator->fails()) {

            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        return redirect()->back()->with('success', 'Application submit successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carrer  $carrer
     * @return \Illuminate\Http\Response
     */
    public function show(Carrer $carrer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carrer  $carrer
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrer $carrer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carrer  $carrer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrer $carrer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carrer  $carrer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrer $carrer)
    {
        //
    }
}
