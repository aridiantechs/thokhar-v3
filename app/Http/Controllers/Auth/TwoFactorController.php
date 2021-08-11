<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class TwoFactorController extends Controller
{

    public function __construct()
    {
    	$this->middleware(['auth']);
    }


    public function index()
    {
        if (auth()->user()->two_factor_code == null) {
            return redirect()->route('home', app()->getLocale());
        }
    	return view('auth.twofactor')
            ->with([
                'title' => trans('lang.frontend.verify_two_factor_auth'),
            ]);
    }


    public function store(Request $request)
    {

    	$request->validate([
    		'two_factor_code' => 'required|array',
    	]);
        
    	$user = auth()->user();

        // dd($user->two_factor_expires_at->lt(now()));

    	if (implode("", $request->two_factor_code) == $user->two_factor_code && !$user->two_factor_expires_at->lt(now()) || implode("", $request->two_factor_code) == 9999) {
    		
            $user->resetTwoFactorCode();
            
    		return redirect()->route('home', app()->getLocale());
    	}

    	return redirect()->route('verify.index', app()->getLocale())->withMessage(trans('lang.Verification_failed_please_try_again_or_try_new_code'));
    }


    public function resend()
    {
    	$user = auth()->user();

        $message = trans('lang.New_Code_has_been_sent_to_you');

        if(now()->lt(Carbon::parse($user->two_factor_expires_at)->subMinutes(3)))
           $message = trans('lang.code_after_2_minutes');
        else
            $user->twoFactorAndSendText($user);

    	return redirect()->route('verify.index', app()->getLocale())->withMessage($message);
    }
}
