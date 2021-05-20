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
        return view('frontend.pages.career');
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
            // 'file' => 'mimes:docx,pdf',
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:50',
            'phone_number' => 'required|string|max:50',
            
        ]);

        if ($validator->fails()) {
            /* return $validator->errors(); */
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        // $report = custom_file_upload($request->file('file'),'public/uploads','career-data',null,null,null);
        /* dd($report); */
        $career = new Carrer;

        $career->name = $request->input('name');
        $career->email = $request->input('email');
        $career->phone = $request->input('phone_number');
        // $career->file = $report;
        $career->save();
        /* dd($career); */
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
