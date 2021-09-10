<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Unifonic;

class User extends Authenticatable
{
    use Notifiable, HasRoles, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'gender', 'dob', 'occupation', 'password', 'expected_retirement_age', 'terms', 'two_factor_code', 'two_factor_expires_at', 'user_type', 'phone_number', 'profile_image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $dates = [
        'two_factor_expires_at', 
        'created_at', 
        'updated_at',
    ];


    // log attributes
    protected static $logAttributes = ['name', 'email'];

    // protected static $logOnlyDirty = true;



    public function generateTwoFactorCode()
    {
        $this->timestamps = false;
        $this->two_factor_code = rand(1000, 9999);
        // $this->two_factor_code = 9999;
        $this->two_factor_expires_at = now()->addMinutes(5);
        $this->updated_at = now();
        // $this->two_factor_expires_at = null;
        $this->save();

        return $this->two_factor_code;
    }

    public function resetTwoFactorCode()
    {
        $this->timestamps = false;
        $this->two_factor_code = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }

    public function twoFactorAndSendText(User $user)
    {
        $code = $this->generateTwoFactorCode();
        try 
        {
            $phone  = preg_replace('/^0/', '966', $user->phone_number);
            $status = Unifonic::send($phone, 'Thokhor verification Key is: '.$user->two_factor_code, 'thokhor');
            $status = collect($status);
            if ($status['success']) {
                // Session::flash('message', trans('lang.frontend.two_factor_message'));
            } else {
                // Session::flash('message', 'something went wrong !');
            }
            
            // $data = array(
            //     'subject' => 'Thokhor | Two Factor Authentication', 
            //     'body' => 'Authenticate', 
            //     'view' => 'frontend.email_templates.2fa-email', 
            //     'code' => $user->two_factor_code
            // );
            
            // Mail::to($user->email)->send(new SendMail($data));
            // $result = \Nexmo::message()->send([
            //     'to'   => $user->phone_number,
            //     'from' => '923055644665',
            //     'text' => 'Thokhor verification Key is: '.$user->two_factor_code,
            //     'brand' => 'Thokhor'
            // ]);
            
        } catch (\Exception $e) 
        {
            // \Auth::logout();

            // $status = array('msg' => "2F Auth Expired. You can not login at this time due to some technical issues. Consult Admin for further inquiries.", 'toastr' => "errorToastr");

            // session()->put('message', 'trans('lang.invalid_number_message')');

            // return redirect('/en/login');

        }

        

        /* try{
            Mail::to($user->email)->send(new SendMail($data));
        }
        catch (\Exception $e) 
        {
            \Auth::logout();

            $status = array('msg' => "2F Auth Expired. You can not login at this time due to some technical issues. Consult Admin for further inquiries.", 'toastr' => "errorToastr");
            Session::put('error', $e->getMessage());
            
            return redirect('/en/login');
        } */
    }





    // functions
    public function subscribed() {
        return $this->hasOne('App\Order', 'user_id', 'id')->orderBy('created_at', 'DESC');
    }

    public function user_questionnaires() {
        return $this->hasMany('App\Questionnaire', 'fk_user_id', 'id');
    }

    public function user_latest_questionnaire() {
        return $this->user_questionnaires()
                ->orderBy('questionnaire_id', 'DESC')
                ->first();
    }

    public function consultation() {
        return $this->hasOne('App\Consultations', 'user_id', 'id');
    }

    public function report() {
        return $this->hasOne('App\Report', 'user_id', 'id');
    }

    public function profile()
    {
        $questionnaire=$this->user_latest_questionnaire();
        if ($questionnaire) {
            $profile=$questionnaire->personal_info ?? false;
            if ($profile) {
                $res= $profile;
            } else {
                $res= false;
            }
            
        }else{
            $res=false;
        }

        return $res;
    }
}
