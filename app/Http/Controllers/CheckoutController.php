<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Carbon\Carbon;
use App\Order;

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
        $call_back = route('payment.callback',locale());
        $return    = route('payment.return',locale());
        
        $token     = $request->token;

        // dd($request->all());

        $url = 'https://secure-global.paytabs.com/payment/request?token='.$token;
        
        $data = [
                "profile_id" => 61157,
                "tran_type" => "sale",
                "tran_class" => "ecom" ,
                "cart_id" => uniqid(),
                "cart_description" => "Dummy Order 3592550gjhg2061445345",
                "cart_currency" => "AED",
                "cart_amount" => 600,
                "return" => $return,
                "call_back" => $call_back,
            ];


        $ch = curl_init( $url );
        
        $payload = json_encode($data);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'authorization:SBJNN2929M-JBGZGDHJBN-DGGHWRMWDT'));
        
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );


        // dd($ch, $payload, $data, $token);
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        $paytabs_response = json_decode($result, true);

        if(array_key_exists('redirect_url', $paytabs_response)){
            return redirect($paytabs_response['redirect_url']);
        }else{
            dd($paytabs_response);
        }

        $order = new Order;
        $order->fill($request->all());
        $order->user_id = auth()->user()->id;
        $order->transac_id = uniqid();
        $order->save();

        return redirect()->route('steps', locale());

    }


    public function callback(Request $request)
    {
        dd('callback', $request);
    }

    public function return(Request $request)
    {
        dd('return', $request);
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
