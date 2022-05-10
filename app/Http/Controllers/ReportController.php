<?php

namespace App\Http\Controllers;

use PDF;
// use Barryvdh\DomPDF\PDF;
use Session;
use App\Order;
use App\User;
use App\Report;
use App\Constant;
use App\Mail\SampleReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
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
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    public function downloadReport(Request $request)
    {
        $this->validate($request, [

            "q" => ['required', 'string', 'max:40', 'min:39'],

        ]);

        $report = Report::where('public_id',$request->q)->latest('created_at')->first();

        if(!$report){

            return redirect()->route('/', 'en');

        }

        if(app('router')->getRoutes()->match(app('request')->create(\URL::previous()))->getName() == 'wizard'){

            Session::put('verified', 1);
            Session::put('public_id', $report->public_id);

        }

        if(loggedInUser() && loggedInUser()->hasRole('admin')){
            Session::put('verified', 1);
            Session::put('public_id', $report->public_id);
        }

        if(Session::get('verified') && Session::get('public_id') == $report->public_id){

            Session::put('verified', 0);
            $constants = Constant::whereIn('constant_attribute', ['Option_1','Option_2','Option_3',])->orWhere('constant_meta_type', 'Capitel_Deployment')->get();

            return view('dashboard.pdf.report')
                        ->with('data', json_decode($report->report_data, true))
                         ->with('constants', $constants);
        }

        Session::put('public_id', $request->q);
        Session::put('user_id', $report->user_id);

        $user = User::where('id',$report->user_id)->first();

        // $user->twoFactorAndSendText($user);
        
        return view('auth.mobile_verify')->with('user',$user);

    }

    public function getUserReport(Request $request)
    {
        $report = Report::where('user_id',$request->user)->latest('created_at')->first();

        if(!$report)
            return redirect()->back();
        
        if(!auth()->user()->hasRole('admin'))
            abort(404);
        
        return view('dashboard.pdf.report')->with('data', json_decode($report->report_data, true));

    }

    public function sendSampleReport()
    {
        $data = array(
            'subject' => 'Thokhor | Sample Report',
            'view' => 'dashboard.email.sample_report', 
        );

        
        $order = new Order;
        $order->title = auth()->user()->name;
        $order->user_id = auth()->user()->id;
        $order->transac_id = uniqid();
        $order->save();

        try{
            // Mail::to(auth()->user()->email)->send(new SampleReport($data));
            $res=[
                "status"=>'success',
                "message"=>'report sent'
            ];
        }catch ( \Exception $exception) {
            $res=[
                "status"=>'error',
                "message"=>'Unable to send mail'
            ];
            
        }
        return $res;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
