<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('callback');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.wizard.payment.checkout');
    }

    public function payment(Request $request)
    {
        // dd($request->all());
        
        $call_back = route('payment.callback',locale());
        $return    = route('payment.return',locale());
        
        $token     = $request->token;

        $url = 'https://secure-global.paytabs.com/payment/request';
        
        $data = [
                "profile_id" => 54876,
                "tran_type" => "sale",
                "tran_class" => "ecom" ,
                "cart_id" => '2ca6efa1-efa3-4032-90bb-11196cef5bd2',
                "cart_description" => "Dummy Order 35925502061445345",
                "cart_currency" => "AED",
                "cart_amount" => 600,
                "callback" => $call_back,
                "return" => $return
            ];


        $ch = curl_init( $url );
        
        $payload = json_encode($data);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'authorization' => 'SLJNMR9J6M-HZZNBBNBWK-NT9RWJRMLL'));
        
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );


        // dd($ch, $payload, $data, $token);
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        dd($result);


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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
