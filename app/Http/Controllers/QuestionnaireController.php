<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use App\Order;
use App\Report;
use App\Constant;
use Carbon\Carbon;
use App\WorkingHour;
use App\Consultations;
use App\Mail\SendMail;
use App\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\QuestionnaireRequest;
use App\Http\Requests\AdditionalInformationRequest;


class QuestionnaireController extends Controller
{
    public $questionnaire;
    public $previous_route;

    public function __construct() {
        parent::__construct();
        $this->questionnaire = new Questionnaire();
    }
    

    public function wizard()
    {
        return view('frontend.wizard.index')
                ->with([
                    'title' => __('lang.questionnaire.income')
                ]);
    }


    public function income()
    {
        $user_questionnaire = $this->loggedInUser->user_latest_questionnaire();
        return view('frontend.wizard.questions.income')
                ->with([
                    'title' => __('lang.questionnaire.income')
                ])
                ->with('user_questionnaire', $user_questionnaire);
    }


    public function netWorthIntroduction()
    {
        $user_questionnaire = $this->loggedInUser->user_latest_questionnaire();

        if(($user_questionnaire->income ?? null) == null)
            return redirect()->route('income', app()->getLocale());

        return view('frontend.wizard.questions.net_worth_introduction')
                ->with([
                    'title' => __('lang.questionnaire.step_2')
                ])
                ->with('user_questionnaire', $user_questionnaire);


    }


    public function gosi()
    {
        $user_questionnaire = $this->loggedInUser->user_latest_questionnaire();

        if(($user_questionnaire->net_assets ?? null) == null)         
            return redirect()->route('net-worth-introduction', app()->getLocale());

        return view('frontend.wizard.questions.gosi')
                ->with([
                    'title' => __('lang.questionnaire.gosi')
                ])
                ->with('user_questionnaire', $user_questionnaire);


    }


    public function investing()
    {
        $user_questionnaire = $this->loggedInUser->user_latest_questionnaire();
        
        if(($user_questionnaire->gosi ?? null) == null)         
            return redirect()->route('gosi', app()->getLocale());

        return view('frontend.wizard.questions.investing_plan')
                ->with([
                    'title' => __('lang.questionnaire.investing')
                ])
                ->with('user_questionnaire', $user_questionnaire);


    }


    public function risk()
    {
        $user_questionnaire = $this->loggedInUser->user_latest_questionnaire();

        if(($user_questionnaire->saving_plan ?? null) == null)          
            return redirect()->route('investing', app()->getLocale());

        return view('frontend.wizard.questions.risk')
                ->with([
                    'title' => __('lang.questionnaire.risk')
                ])
                ->with('user_questionnaire', $user_questionnaire);


    }


    /* public function consultations()
    {
        $user_questionnaire = $this->loggedInUser->user_latest_questionnaire();

        if(($user_questionnaire->risks ?? null) == null)
            return redirect()->route('risk', app()->getLocale());
        
        $slots=WorkingHour::whereDate('date','>',Carbon::now())->whereDate('date','<',Carbon::now()->addDay(8))->orderBy('id')->get();
        
        return view('frontend.wizard.consultations')
                ->with([
                    'title' => __('lang.questionnaire.consultations')
                ])
                ->with('user_questionnaire', $user_questionnaire)
                ->with('slots', $slots);


    } */

    public function getSlots(Request $request)
    {
        $date=WorkingHour::whereDate('date',Carbon::parse($request->consultation_date))->first();
        if($date){
            $slots=$date->available_slots_new();
            if($slots && count($slots) > 0)
            {
                $res=[
                    "status"=>'success',
                    "data"=>$slots
                ];
            }else{
                $res=[
                    "status"=>'error'
                ];
            }
            
        }else{
            $res=[
                "status"=>'error',
            ];
        }
        return $res;
        
    }

    public function report($report_id = NULL)
    {
        $user_questionnaire = $this->loggedInUser->user_latest_questionnaire();

        if(($user_questionnaire->risks ?? null) == null)        
            return redirect()->route('risk', app()->getLocale());
        
        return view('frontend.wizard.report')
                ->with([
                    'title' => __('lang.questionnaire.report')
                ])
                ->with('user_questionnaire', $user_questionnaire)
                ->with('report_id', $report_id);


    }

        
    public function wizardStore(QuestionnaireRequest $request)
    {
        
        $location = $request->location;        

        $user_questionnaire = $this->loggedInUser->user_questionnaires()->orderBy('questionnaire_id', 'DESC')->first();
        
        switch ($location) {
            case 'income':

                return $this->questionnaire->update_income($request->except('_token', 'location'))
                        ?   $this->netWorthIntroduction()
                        : redirect()->route('income', $locale);
                break;

            case 'net-worth':

                return $this->questionnaire->update_net_assets($request->except('_token', 'location'))
                        ?   $this->gosi()
                        : redirect()->route('wizard', $locale);
                break;

            case 'gosi':

                return $this->questionnaire->update_gosi($request->except('_token', 'location'))
                        ?   $this->investing()
                        : redirect()->route('wizard', $locale);
                break;

            case 'investing':

                return $this->questionnaire->update_saving_plan($request->except('_token', 'location'))
                        ?   $this->risk()
                        : redirect()->route('wizard', $locale);
                break;

            case 'risk':

                return $this->questionnaire->update_risks($request->except('_token', 'location'))
                        ?   /* $this->consultations() */$this->getReport()
                        : redirect()->route('wizard', $locale);
                break;

            // case 'consultations':

            //     /* return $this->getReport(); */
            //      /* Consultations::consultations($request->except('_token', 'location'))
            //             ?   $this->consultations() */
            //         $res=$this->questionnaire->addConsultation($request->except('_token', 'location'));
            //         if($res['status']=='success'){
            //             return $this->getReport();
            //         }else{
            //             return redirect()->route('wizard', $locale);
            //         }
            //     break;
            
            case 'get_report':
                return $this->getReport();
                break;

            case '/payment':
                return auth()->user()->fill($request->all())->update()
                        ?   redirect()->route('email-verification', $locale)
                        : redirect()->route('payment', $locale);
                break;
            
            default:
                abort(500, 'You have skipped some step');
                break;
        }
    }
        
    public function store(QuestionnaireRequest $request)
    {
        
        $locale = app()->getLocale();
        $current_url = str_replace('{locale}/', '', \Route::current()->uri);
        $previous_url = str_replace(url('/'.app()->getLocale().'/'), '', url()->previous());        

        $user_questionnaire = $this->loggedInUser->user_questionnaires()->orderBy('questionnaire_id', 'DESC')->first();
        // dd($user_questionnaire,$current_url,$previous_url);
        switch ($previous_url) {                
            case '/step_1':
                if ($user_questionnaire) {

                    return $this->questionnaire->update_personal_info($request->except(['_token', 'started_year_for_personal_financial_plan']))
                        ?   redirect()->route('step_2', $locale)
                        : redirect()->route('step_1', $locale);
                    
                }
                else{
                    $created_questionnaire = $this->questionnaire->create_questionnaire($this->loggedInUser, null);
                    
                    return $created_questionnaire->update_personal_info($request->except(['_token', 'started_year_for_personal_financial_plan']))
                        ?   redirect()->route('step_2', $locale)
                            : redirect()->route('step_1', $locale);
                    
                }
                break;

            case '/investing-amount':

                if ($user_questionnaire) {

                    return $this->questionnaire->update_investing_amount($request->except(['_token']))
                        ?   redirect()->route('initial-report', $locale)
                        : redirect()->route('investing-amount', $locale);
                    
                }
                else{
                    $created_questionnaire = $this->questionnaire->create_questionnaire($this->loggedInUser, null);
                    
                    return $created_questionnaire->update_investing_amount($request->except(['_token']))
                        ?   redirect()->route('initial-report', $locale)
                            : redirect()->route('investing-amount', $locale);
                    
                }
                break;

            case '/income':

                return $this->questionnaire->update_income($request->except('_token'))
                        ?   redirect()->route('net-worth-introduction', $locale)
                        : redirect()->route('income', $locale);
                break;

            case '/net-worth-introduction':

                return $this->questionnaire->update_income($request->except('_token'))
                        ?   redirect()->route('next', $locale)
                        : redirect()->route('net-worth-introduction', $locale);
                break;

            case '/step_2':
                return $this->questionnaire->update_income($request->except('_token'))
                        ?   redirect()->route('step_3', $locale)
                        : redirect()->route('step_2', $locale);
                break;
            
            case '/step_3':
                return $this->questionnaire->update_saving_plan($request->except('_token'))
                        ?   redirect()->route('step_4', $locale)
                        : redirect()->route('step_3', $locale);
                break;
            case '/step_4':
                return $this->questionnaire->update_net_assets($request->except('_token'))
                        ?   redirect()->route('step_5', $locale)
                        : redirect()->route('step_4', $locale);
                break;
            case '/step_5':
                return $this->questionnaire->update_gosi($request->except('_token'))
                        ?   redirect()->route('step_6', $locale)
                        : redirect()->route('step_5', $locale);
                break;
            case '/step_6':
                // return $this->questionnaire->update_risks($request->except('_token'))
                //         ?   redirect()->route('payment', $locale)
                //         : redirect()->route('step_6', $locale);
                // return $this->questionnaire->update_risks($request->except('_token'))
                //         ?   redirect()->route('email_verification', $locale)
                //         : redirect()->route('step_6', $locale);

                return $this->questionnaire->update_risks($request->except('_token'))
                        ?   $this->getReport()
                        : redirect()->route('step_6', $locale);

                break;
            case '/payment':
                return auth()->user()->fill($request->all())->update()
                        ?   redirect()->route('email-verification', $locale)
                        : redirect()->route('payment', $locale);
                break;
            // case '/step_7':
            //     return $this->questionnaire->update_objectives($request->except('_token'))
            //             ?   redirect()->route('results', $locale)
            //             : redirect()->route('step_7', $locale);
            //     break;
            default:
                abort(500, 'You have skipped some step');
                break;
        }
        
        // return redirect()->route('step_3', $locale);

    }


    public function awareness()
    {
        return view('frontend.wizard.awareness');
    }


    public function investingAmount()
    {
        $user_questionnaire = $this->loggedInUser->user_questionnaires()->orderBy('questionnaire_id', 'DESC')->first();
        
        return view('frontend.wizard.questions.investing_amount')
                ->with([
                    'title' => 'Investing amount',
                ])
                ->with('user_questionnaire', $user_questionnaire);
    }


    public function initialReport()
    {
        $user_questionnaire = $this->loggedInUser->user_latest_questionnaire();
        
        if(($user_questionnaire->investing_amount ?? null) == null){          
            return redirect()->route('investing-amount', locale())->with(['message' => 'previous step not completed']);
        }

        return redirect()->route('risk-test', locale());
    }


    public function getRecomendedAssetClass()
    {

        $asset['Very_Conservative_Investor']= Constant::where('constant_meta_type', 'Very_Conservative_Investor')->get()->toArray();

        $asset['Conservative_Investor']     = Constant::where('constant_meta_type', 'Conservative_Investor')->get()->toArray();

        $asset['Natrual_Investor']          = Constant::where('constant_meta_type', 'Natrual_Investor')->get()->toArray();

        $asset['Aggressive_Investor']       = Constant::where('constant_meta_type', 'Aggressive_Investor')->get()->toArray();

        $asset['Very_Aggressive_Investor']  = Constant::where('constant_meta_type', 'Very_Aggressive_Investor')->get()->toArray();

        $data = [];
        foreach ($asset as $key => $value) {
            foreach ($value as $key1 => $val) {
                $data[$key][] = $val['constant_value'];
            }
        }

        return $data;
    }


    public function getValueAtRetirement($porfolioExpectedReturn)
    {
        $user = auth()->user();

        $retirement_age = $this->questionnaire->getPlannedRetirementAge($user);

        $current_age    = $this->questionnaire->getCurrentAge($user);

        $accomulativeSavingtoday    = $this->questionnaire->getInitialAccomulativeSavingtoday($user);
        $annualSavingToday          = $this->questionnaire->getInitialInvestingAmount($user);
        $annualIncreaseInSavingPlan = $this->questionnaire->getAnnualIncreaseInInitialInvestment($user);
        $netReturnAfterRetirement   = $this->questionnaire->getNetReturnAfterRetirement($user);
        // $porfolioExpectedReturn     = 7.85;
        
        // dd($accomulativeSavingtoday,$annualSavingToday);
        $valueBegYear = [];
        $plan         = [];
        $graphContribution = [];
        $uncertain_top     = [];
        $uncertain_bottom  = [];
        $uncertainty  = $constants["( In Returns , Saving )"]["constant_value"] ?? null;


        $graph_limit = ($retirement_age < 60) ? 60 : $retirement_age;

        if($current_age < $retirement_age){

            for ($i = (int) $current_age; $i <= $graph_limit; $i++) {
            
                if ($i == $current_age) 
                {
                    
                    $plan[$i]['age'] = $i;
    
                    $plan[$i]['value_beginning_of_year'] = $accomulativeSavingtoday;
                    
                    $plan[$i]['contribution'] = $annualSavingToday * 12;
                        
                    $plan[$i]['returns']      = ($plan[$i]['value_beginning_of_year'] + ($plan[$i]['contribution']/2))*($porfolioExpectedReturn / 100);
    
                    $plan[$i]['value_end_year'] = $plan[$i]['value_beginning_of_year'] + $plan[$i]['contribution'] + $plan[$i]['returns'];

    
                }

                else
                {
                    
                    $plan[$i]['age']= $i;
                    
                    $plan[$i]['value_beginning_of_year'] = ($plan[$i-1]['value_end_year']);
    
                    // $plan[$i]['contribution'] = ($i >= $retirement_age) ? 0 : ($plan[$i-1]['contribution'] * ((100 + $annualIncreaseInSavingPlan) / 100));

                    $plan[$i]['contribution'] = $plan[$i-1]['contribution'] * ((100 + $annualIncreaseInSavingPlan) / 100);

                    // if($i > $retirement_age)
                        // $plan[$i]['retirementValue'] = $retirementValue = $netReturnAfterRetirement;
                    // else
                        $plan[$i]['retirementValue'] = $retirementValue = $porfolioExpectedReturn;
    
                    $plan[$i]['returns'] = ($plan[$i]['value_beginning_of_year'] + ($plan[$i]['contribution'])/2)*($retirementValue / 100);
    
                    $plan[$i]['value_end_year'] = $plan[$i]['value_beginning_of_year'] + $plan[$i]['contribution'] + $plan[$i]['returns'];
    
    
                }
    
            }
        }
        
        // dd($plan);

        return $plan;
    }


    public function riskTest()
    {
        $asset_class         = $this->getRecomendedAssetClass();  

        $value_at_retirement = $this->getValueAtRetirement(8.85);
        
        $user_questionnaire  = $this->loggedInUser->user_latest_questionnaire();

        $current_age         = $this->questionnaire->getCurrentAge(auth()->user());
        
        // dd($asset_class,$value_at_retirement,$user_questionnaire,$current_age);

        if(($user_questionnaire->investing_amount ?? null) == null){
            return redirect()->route('investing-amount', locale())->with(['message' => 'previous step not completed']);
        }
        
        return view('frontend.wizard.risk_test')
            ->with('asset_class', $asset_class)
            ->with('current_age', $current_age)
            ->with('value_at_retirement', $value_at_retirement)
            ->with(['investing_amount' => $user_questionnaire->investing_amount]);
    }


    public function riskTestNewValueAtRetirement(Request $request)
    {

        if($request->val == 'Very_Conservative_Investor')
            $net_return_per_year = 7.6;
        else if($request->val == 'Conservative_Investor')
            $net_return_per_year = 7.95;
        else if($request->val == 'Natrual_Investor')
            $net_return_per_year = 8.85;
        else if($request->val == 'Aggressive_Investor')
            $net_return_per_year = 9.9;
        else if($request->val == 'Very_Aggressive_Investor')
            $net_return_per_year = 10.4;
        else
            $net_return_per_year = 1;


        $value_at_retirement_graph = $this->getValueAtRetirement($net_return_per_year);

        return [
                'value_at_retirement_graph' => $value_at_retirement_graph,
                'value_at_retirement' => currency(end($value_at_retirement_graph)['value_end_year'])
                ];
        

    }


    public function plan()
    {
        return view('frontend.wizard.payment.plan');
    }


    public function steps()
    {   
        return view('frontend.wizard.steps');
    }



    public function step_1(){
        return view('dashboard.user_panel.questionary.step_1_form')
                ->with([
                    'title' => __('lang.questionnaire.step_1')
                ]);
    }

    public function step_2(){
        $user_questionnaire = $this->loggedInUser->user_latest_questionnaire();

        if(($user_questionnaire->investing_amount ?? null) == null){          
            $status = array('msg' => "Previous Step not completed yet.", 'toastr' => "errorToastr");
            Session::flash($status['toastr'], $status['msg']);
            return redirect()->route('initial-report', app()->getLocale());
        }
        return view('dashboard.user_panel.questionary.step_2_form')
                ->with([
                    'title' => __('lang.questionnaire.step_2')
                ])
                ->with('user_questionnaire', $user_questionnaire);
    }

    public function step_3(){
        $user_questionnaire = $this->loggedInUser->user_latest_questionnaire();
        // dd($user_questionnaire);
        if(($user_questionnaire->income ?? null) == null){          
            $status = array('msg' => "Previous Step not completed yet.", 'toastr' => "errorToastr");
            Session::flash($status['toastr'], $status['msg']);
            return redirect()->route('step_2', app()->getLocale());
        }
        return view('dashboard.user_panel.questionary.step_3_form')
                ->with([
                    'title' => __('lang.questionnaire.step_3')
                ])
                ->with('user_questionnaire', $user_questionnaire);
    }

    public function step_4(){
        $user_questionnaire = $this->loggedInUser->user_latest_questionnaire();

        if(($user_questionnaire->saving_plan ?? null) == null){          
            $status = array('msg' => "Previous Step not completed yet.", 'toastr' => "errorToastr");
            Session::flash($status['toastr'], $status['msg']);
            return redirect()->route('step_3', app()->getLocale());
        }
        return view('dashboard.user_panel.questionary.step_4_form')
                ->with([
                    'title' => __('lang.questionnaire.step_4')
                ])
                ->with('user_questionnaire', $user_questionnaire);
    }

    public function step_5(){
        $user_questionnaire = $this->loggedInUser->user_latest_questionnaire();

        if(($user_questionnaire->net_assets ?? null) == null){          
            $status = array('msg' => "Previous Step not completed yet.", 'toastr' => "errorToastr");
            Session::flash($status['toastr'], $status['msg']);
            return redirect()->route('step_4', app()->getLocale());
        }
        return view('dashboard.user_panel.questionary.step_5_form')
                ->with([
                    'title' => __('lang.questionnaire.step_5')
                ])
                ->with('user_questionnaire', $user_questionnaire);
    }

    public function step_6(){
        $user_questionnaire = $this->loggedInUser->user_latest_questionnaire();
        if(($user_questionnaire->gosi ?? null) == null){          
            $status = array('msg' => "Previous Step not completed yet.", 'toastr' => "errorToastr");
            Session::flash($status['toastr'], $status['msg']);
            return redirect()->route('step_5', app()->getLocale());
        }
        return view('dashboard.user_panel.questionary.step_6_form')
                ->with([
                    'title' => __('lang.questionnaire.step_6')
                ])
                ->with('user_questionnaire', $user_questionnaire);
    }

    public function step_7(){
        $user_questionnaire = $this->loggedInUser->user_latest_questionnaire();

        if(($user_questionnaire->risks ?? null) == null){          
            $status = array('msg' => "Previous Step not completed yet.", 'toastr' => "errorToastr");
            Session::flash($status['toastr'], $status['msg']);
            return redirect()->route('step_6', app()->getLocale());
        }
        return view('dashboard.user_panel.questionary.step_7_form')
                ->with([
                    'title' => __('lang.questionnaire.step_7')
                ])
                ->with('user_questionnaire', $user_questionnaire);
    }


    public function evaluateResult($locale = 'en', ? User $user = null)
    {

        //Temporary
        return redirect()->route('home',app()->getLocale());

        $route = request()->segment(count(request()->segments()));
        $view = 'dashboard.user_panel.reports.results';
        if($route == 'current_state')
            $view = 'dashboard.user_panel.user_dashboard_pages.current_state';

        $user = $user ?: $this->loggedInUser;

        $not_found = false;
        if (!$user->user_latest_questionnaire()) {
            $not_found = "style = opacity:0.3";
        }
        
        // net personal income
        $netPersonalIncome = $this->questionnaire->getPersonalNetIncome($user);
        // current saving rate in progress bar & bar chart
        $currentSavingRate = $this->questionnaire->getCurrentSavingRate($user);
        // possible saving rate in bar chart
        $possibleSavingRate = $this->questionnaire->getPossibleSavingRate($user);
        // total networth evaluation
        $totalNetworth = $this->questionnaire->getTotalNetworth($user);
        // total Assets
        $networthTotalInvestmentOrAssets = $this->questionnaire->getNetworthTotalInvestmentOrAssets($user);
        // total Assets => Liquid + Unliquid + Personal
        $liquid_assets = $this->questionnaire->getNetAssetsTotalLiquidInvestment($user);
        $unliquid_assets = $this->questionnaire->getNetAssetsTotalUnliquidInvestment($user);
        $personal_assets = $this->questionnaire->getNetAssetsTotalPersonalInvestment($user);
        // total Liabilities
        $networthTotalDebtsOrLiabilities = $this->questionnaire->getNetworthTotalDebtsOrLiabilities($user);
        // CAA table
        $totalCAA = $this->questionnaire->getTotalCAA($user);
        $totalCAAPercentage = $this->questionnaire->getTotalCAAPercentage($user);
        // values
        $cashAndDepositsCAA = $this->questionnaire->getCashAndDepositsCAA($user);
        $localEquityCAA = $this->questionnaire->getLocalEquityCAA($user);
        $internationalEquityCAA = $this->questionnaire->getInternationalEquityCAA($user);
        $governmentBondsCAA = $this->questionnaire->getGovernmentBondsCAA($user);
        $corporateBondsCAA = $this->questionnaire->getCorporateBondsCAA($user);

        $localRealEstateCAA = $this->questionnaire->getLocalRealEstateCAA($user);
        $internationalRealEstateCAA = $this->questionnaire->getInternationalRealEstateCAA($user);

        // $reitsCAA = $this->questionnaire->getReitsCAA($user);
        // $directPropertiesCAA = $this->questionnaire->getDirectPropertiesCAA($user);
        // percentages
        $cashAndDepositsCAAPercentage = $this->questionnaire->getCashAndDepositsCAAPercentage($user);
        $localEquityCAAPercentage = $this->questionnaire->getLocalEquityCAAPercentage($user);
        $internationalEquityCAAPercentage = $this->questionnaire->getInternationalEquityCAAPercentage($user);
        $governmentBondsCAAPercentage = $this->questionnaire->getGovernmentBondsCAAPercentage($user);
        $corporateBondsCAAPercentage = $this->questionnaire->getCorporateBondsCAAPercentage($user);
        $reitsCAAPercentage = $this->questionnaire->getReitsCAAPercentage($user);
        $directPropertiesCAAPercentage = $this->questionnaire->getDirectPropertiesCAAPercentage($user);
        $suggestion = $this->questionnaire->getSuggestedAssetAllocationTableName($user);

        $localRealEstateCAAPercentage = $this->questionnaire->getLocalRealEstateCAAPercentage($user);
        $internationalRealEstateCAAPercentage = $this->questionnaire->getInternationalRealEstateCAAPercentage($user);

        // dd($suggestion);
        // return view($view)
        return view($view)
                ->with([
                    'netPersonalIncome' => $netPersonalIncome,
                    'currentSavingRate' => $currentSavingRate,
                    'possibleSavingRate' => $possibleSavingRate,
                ])
                ->with([
                    'totalNetworth' => $totalNetworth,
                    'networthTotalInvestmentOrAssets' => $networthTotalInvestmentOrAssets,
                    'liquid_assets' => $liquid_assets,
                    'unliquid_assets' => $unliquid_assets,
                    'personal_assets' => $personal_assets,
                    'networthTotalDebtsOrLiabilities' => $networthTotalDebtsOrLiabilities,
                ])
                ->with([
                    'totalCAA' => $totalCAA,
                    'totalCAAPercentage' => $totalCAAPercentage,

                    'cashAndDepositsCAA' => $cashAndDepositsCAA,
                    'localEquityCAA' => $localEquityCAA,
                    'internationalEquityCAA' => $internationalEquityCAA,
                    'governmentBondsCAA' => $governmentBondsCAA,
                    'corporateBondsCAA' => $corporateBondsCAA,
                    // 'reitsCAA' => $reitsCAA,
                    // 'directPropertiesCAA' => $directPropertiesCAA,
                    'localRealEstateCAA' => $localRealEstateCAA,
                    'internationalRealEstateCAA' => $internationalRealEstateCAA,

                    'cashAndDepositsCAAPercentage' => $cashAndDepositsCAAPercentage,
                    'localEquityCAAPercentage' => $localEquityCAAPercentage,
                    'internationalEquityCAAPercentage' => $internationalEquityCAAPercentage,
                    'governmentBondsCAAPercentage' => $governmentBondsCAAPercentage,
                    'corporateBondsCAAPercentage' => $corporateBondsCAAPercentage,
                    // 'reitsCAAPercentage' => $reitsCAAPercentage,
                    // 'directPropertiesCAAPercentage' => $directPropertiesCAAPercentage,
                    'localRealEstateCAAPercentage' => $localRealEstateCAAPercentage,
                    'internationalRealEstateCAAPercentage' => $internationalRealEstateCAAPercentage,

                ])
                ->with([
                    'currentAssetDataDonutChart' => [
                        round($cashAndDepositsCAAPercentage['percentage'], 2),
                        round($localEquityCAAPercentage['percentage'], 2),
                        round($internationalEquityCAAPercentage['percentage'], 2),
                        round($governmentBondsCAAPercentage['percentage'], 2),
                        round($corporateBondsCAAPercentage['percentage'], 2),
                        // round($reitsCAAPercentage['percentage'], 2),
                        // round($directPropertiesCAAPercentage['percentage'], 2),
                        round($localRealEstateCAAPercentage['percentage'], 2),
                        round($internationalRealEstateCAAPercentage['percentage'], 2),
                    ],
                ])
                ->with([
                    'netWorthDonutChart' => [
                        round($networthTotalInvestmentOrAssets, 2),
                        round($networthTotalDebtsOrLiabilities, 2),
                    ],
                ])
                ->with('user', $user)
                ->with('not_found', $not_found)
                ->with('suggestion', $suggestion);
    }
    

    // user panel
    public function saving_evaluation($locale = 'en', ? User $user = null)
    {
        $view = 'dashboard.user_panel.user_dashboard_pages.saving_evaluation';

        $user = $user ?: $this->loggedInUser;

        $not_found = false;
        if (!$user->user_latest_questionnaire()) {
            $not_found = "style = opacity:0.3";
            return abort(404);
        }
        
        // net personal income
        $netPersonalIncome = $this->questionnaire->getPersonalNetIncome($user);
        // current saving rate in progress bar & bar chart
        $currentSavingRate = $this->questionnaire->getCurrentSavingRate($user);
        // possible saving rate in bar chart
        $possibleSavingRate = $this->questionnaire->getPossibleSavingRate($user);
        // total networth evaluation
        $totalNetworth = $this->questionnaire->getTotalNetworth($user);
        // total Assets
        $networthTotalInvestmentOrAssets = $this->questionnaire->getNetworthTotalInvestmentOrAssets($user);
        // total Assets => Liquid + Unliquid + Personal
        $liquid_assets = $this->questionnaire->getNetAssetsTotalLiquidInvestment($user);
        $unliquid_assets = $this->questionnaire->getNetAssetsTotalUnliquidInvestment($user);
        $personal_assets = $this->questionnaire->getNetAssetsTotalPersonalInvestment($user);
        // total Liabilities
        $networthTotalDebtsOrLiabilities = $this->questionnaire->getNetworthTotalDebtsOrLiabilities($user);
        // CAA table
        $totalCAA = $this->questionnaire->getTotalCAA($user);
        $totalCAAPercentage = $this->questionnaire->getTotalCAAPercentage($user);
        // values
        $cashAndDepositsCAA = $this->questionnaire->getCashAndDepositsCAA($user);
        $localEquityCAA = $this->questionnaire->getLocalEquityCAA($user);
        $internationalEquityCAA = $this->questionnaire->getInternationalEquityCAA($user);
        $governmentBondsCAA = $this->questionnaire->getGovernmentBondsCAA($user);
        $corporateBondsCAA = $this->questionnaire->getCorporateBondsCAA($user);
        $reitsCAA = $this->questionnaire->getReitsCAA($user);
        $directPropertiesCAA = $this->questionnaire->getDirectPropertiesCAA($user);
        // percentages
        $cashAndDepositsCAAPercentage = $this->questionnaire->getCashAndDepositsCAAPercentage($user);
        $localEquityCAAPercentage = $this->questionnaire->getLocalEquityCAAPercentage($user);
        $internationalEquityCAAPercentage = $this->questionnaire->getInternationalEquityCAAPercentage($user);
        $governmentBondsCAAPercentage = $this->questionnaire->getGovernmentBondsCAAPercentage($user);
        $corporateBondsCAAPercentage = $this->questionnaire->getCorporateBondsCAAPercentage($user);
        $reitsCAAPercentage = $this->questionnaire->getReitsCAAPercentage($user);
        $directPropertiesCAAPercentage = $this->questionnaire->getDirectPropertiesCAAPercentage($user);
        $suggestion = $this->questionnaire->getSuggestedAssetAllocationTableName($user);
        // dd($suggestion);
        // return view($view)
        return view($view)
                ->with([
                    'netPersonalIncome' => $netPersonalIncome,
                    'currentSavingRate' => $currentSavingRate,
                    'possibleSavingRate' => $possibleSavingRate,
                ])
                ->with([
                    'totalNetworth' => $totalNetworth,
                    'networthTotalInvestmentOrAssets' => $networthTotalInvestmentOrAssets,
                    'liquid_assets' => $liquid_assets,
                    'unliquid_assets' => $unliquid_assets,
                    'personal_assets' => $personal_assets,
                    'networthTotalDebtsOrLiabilities' => $networthTotalDebtsOrLiabilities,
                ])
                ->with([
                    'totalCAA' => $totalCAA,
                    'totalCAAPercentage' => $totalCAAPercentage,

                    'cashAndDepositsCAA' => $cashAndDepositsCAA,
                    'localEquityCAA' => $localEquityCAA,
                    'internationalEquityCAA' => $internationalEquityCAA,
                    'governmentBondsCAA' => $governmentBondsCAA,
                    'corporateBondsCAA' => $corporateBondsCAA,
                    // 'reitsCAA' => $reitsCAA,
                    // 'directPropertiesCAA' => $directPropertiesCAA,
                    'localRealEstateCAA' => $localRealEstateCAA,
                    'internationalRealEstateCAA' => $internationalRealEstateCAA,

                    'cashAndDepositsCAAPercentage' => $cashAndDepositsCAAPercentage,
                    'localEquityCAAPercentage' => $localEquityCAAPercentage,
                    'internationalEquityCAAPercentage' => $internationalEquityCAAPercentage,
                    'governmentBondsCAAPercentage' => $governmentBondsCAAPercentage,
                    'corporateBondsCAAPercentage' => $corporateBondsCAAPercentage,
                    // 'reitsCAAPercentage' => $reitsCAAPercentage,
                    // 'directPropertiesCAAPercentage' => $directPropertiesCAAPercentage,
                    'localRealEstateCAAPercentage' => $localRealEstateCAAPercentage,
                    'internationalRealEstateCAAPercentage' => $internationalRealEstateCAAPercentage,

                ])
                ->with([
                    'currentAssetDataDonutChart' => [
                        round($cashAndDepositsCAAPercentage['percentage'], 2),
                        round($localEquityCAAPercentage['percentage'], 2),
                        round($internationalEquityCAAPercentage['percentage'], 2),
                        round($governmentBondsCAAPercentage['percentage'], 2),
                        round($corporateBondsCAAPercentage['percentage'], 2),
                        // round($reitsCAAPercentage['percentage'], 2),
                        // round($directPropertiesCAAPercentage['percentage'], 2),
                        round($localRealEstateCAAPercentage['percentage'], 2),
                        round($internationalRealEstateCAAPercentage['percentage'], 2),
                    ],
                ])
                ->with([
                    'netWorthDonutChart' => [
                        round($networthTotalInvestmentOrAssets, 2),
                        round($networthTotalDebtsOrLiabilities, 2),
                    ],
                ])
                ->with('user', $user)
                ->with('not_found', $not_found)
                ->with('suggestion', $suggestion);
    }

    public function networth_evaluation($locale = 'en', ? User $user = null)
    {
        $view = 'dashboard.user_panel.user_dashboard_pages.networth_evaluation';

        $user = $user ?: $this->loggedInUser;

        $not_found = false;
        if (!$user->user_latest_questionnaire()) {
            $not_found = "style = opacity:0.3";
            return abort(404);
        }
        
        // net personal income
        $netPersonalIncome = $this->questionnaire->getPersonalNetIncome($user);
        // current saving rate in progress bar & bar chart
        $currentSavingRate = $this->questionnaire->getCurrentSavingRate($user);
        // possible saving rate in bar chart
        $possibleSavingRate = $this->questionnaire->getPossibleSavingRate($user);
        // total networth evaluation
        $totalNetworth = $this->questionnaire->getTotalNetworth($user);
        // total Assets
        $networthTotalInvestmentOrAssets = $this->questionnaire->getNetworthTotalInvestmentOrAssets($user);
        // total Assets => Liquid + Unliquid + Personal
        $liquid_assets = $this->questionnaire->getNetAssetsTotalLiquidInvestment($user);
        $unliquid_assets = $this->questionnaire->getNetAssetsTotalUnliquidInvestment($user);
        $personal_assets = $this->questionnaire->getNetAssetsTotalPersonalInvestment($user);
        // total Liabilities
        $networthTotalDebtsOrLiabilities = $this->questionnaire->getNetworthTotalDebtsOrLiabilities($user);
        // CAA table
        $totalCAA = $this->questionnaire->getTotalCAA($user);
        $totalCAAPercentage = $this->questionnaire->getTotalCAAPercentage($user);
        // values
        $cashAndDepositsCAA = $this->questionnaire->getCashAndDepositsCAA($user);
        $localEquityCAA = $this->questionnaire->getLocalEquityCAA($user);
        $internationalEquityCAA = $this->questionnaire->getInternationalEquityCAA($user);
        $governmentBondsCAA = $this->questionnaire->getGovernmentBondsCAA($user);
        $corporateBondsCAA = $this->questionnaire->getCorporateBondsCAA($user);
        $reitsCAA = $this->questionnaire->getReitsCAA($user);
        $directPropertiesCAA = $this->questionnaire->getDirectPropertiesCAA($user);
        // percentages
        $cashAndDepositsCAAPercentage = $this->questionnaire->getCashAndDepositsCAAPercentage($user);
        $localEquityCAAPercentage = $this->questionnaire->getLocalEquityCAAPercentage($user);
        $internationalEquityCAAPercentage = $this->questionnaire->getInternationalEquityCAAPercentage($user);
        $governmentBondsCAAPercentage = $this->questionnaire->getGovernmentBondsCAAPercentage($user);
        $corporateBondsCAAPercentage = $this->questionnaire->getCorporateBondsCAAPercentage($user);
        $reitsCAAPercentage = $this->questionnaire->getReitsCAAPercentage($user);
        $directPropertiesCAAPercentage = $this->questionnaire->getDirectPropertiesCAAPercentage($user);
        $suggestion = $this->questionnaire->getSuggestedAssetAllocationTableName($user);
        // dd($suggestion);
        // return view($view)
        return view($view)
                ->with([
                    'netPersonalIncome' => $netPersonalIncome,
                    'currentSavingRate' => $currentSavingRate,
                    'possibleSavingRate' => $possibleSavingRate,
                ])
                ->with([
                    'totalNetworth' => $totalNetworth,
                    'networthTotalInvestmentOrAssets' => $networthTotalInvestmentOrAssets,
                    'liquid_assets' => $liquid_assets,
                    'unliquid_assets' => $unliquid_assets,
                    'personal_assets' => $personal_assets,
                    'networthTotalDebtsOrLiabilities' => $networthTotalDebtsOrLiabilities,
                ])
                ->with([
                    'totalCAA' => $totalCAA,
                    'totalCAAPercentage' => $totalCAAPercentage,

                    'cashAndDepositsCAA' => $cashAndDepositsCAA,
                    'localEquityCAA' => $localEquityCAA,
                    'internationalEquityCAA' => $internationalEquityCAA,
                    'governmentBondsCAA' => $governmentBondsCAA,
                    'corporateBondsCAA' => $corporateBondsCAA,
                    // 'reitsCAA' => $reitsCAA,
                    // 'directPropertiesCAA' => $directPropertiesCAA,
                    'localRealEstateCAA' => $localRealEstateCAA,
                    'internationalRealEstateCAA' => $internationalRealEstateCAA,

                    'cashAndDepositsCAAPercentage' => $cashAndDepositsCAAPercentage,
                    'localEquityCAAPercentage' => $localEquityCAAPercentage,
                    'internationalEquityCAAPercentage' => $internationalEquityCAAPercentage,
                    'governmentBondsCAAPercentage' => $governmentBondsCAAPercentage,
                    'corporateBondsCAAPercentage' => $corporateBondsCAAPercentage,
                    // 'reitsCAAPercentage' => $reitsCAAPercentage,
                    // 'directPropertiesCAAPercentage' => $directPropertiesCAAPercentage,
                    'localRealEstateCAAPercentage' => $localRealEstateCAAPercentage,
                    'internationalRealEstateCAAPercentage' => $internationalRealEstateCAAPercentage,

                ])
                ->with([
                    'currentAssetDataDonutChart' => [
                        round($cashAndDepositsCAAPercentage['percentage'], 2),
                        round($localEquityCAAPercentage['percentage'], 2),
                        round($internationalEquityCAAPercentage['percentage'], 2),
                        round($governmentBondsCAAPercentage['percentage'], 2),
                        round($corporateBondsCAAPercentage['percentage'], 2),
                        // round($reitsCAAPercentage['percentage'], 2),
                        // round($directPropertiesCAAPercentage['percentage'], 2),
                        round($localRealEstateCAAPercentage['percentage'], 2),
                        round($internationalRealEstateCAAPercentage['percentage'], 2),
                    ],
                ])
                ->with([
                    'netWorthDonutChart' => [
                        round($networthTotalInvestmentOrAssets, 2),
                        round($networthTotalDebtsOrLiabilities, 2),
                    ],
                ])
                ->with('user', $user)
                ->with('not_found', $not_found)
                ->with('suggestion', $suggestion);
    }


    public function networth($locale = 'en', $type, ? USer $user = null)
    {
        $route = request()->segment(count(request()->segments()) - 1);
        $view = ($type == 'assets') ? 'dashboard.user_panel.reports.networth_assets' : 'dashboard.user_panel.reports.networth_liabilities';
        if($route == 'networthevaluation'){
            switch ($type) {
                case 'assets':
                    $view = 'dashboard.user_panel.user_dashboard_pages.currentstate_assets';
                    break;
                
                case 'liabilities':
                    $view = 'dashboard.user_panel.user_dashboard_pages.currentstate_liabilities';
                    break;
                
                default:
                    return abort(404);
                    break;
            }
        }

        $user = $user ?: $this->loggedInUser;
        // ------------------------------ suggested -----------------------------
        $suggestion = $this->questionnaire->getSuggestedAssetAllocationTableName($user);
        switch ($type) {
            case 'assets':
                // total Assets
                $networthTotalInvestmentOrAssets = $this->questionnaire->getNetworthTotalInvestmentOrAssets($user);
                // total Assets => Liquid + Unliquid + Personal
                $liquid_assets = $this->questionnaire->getNetAssetsLiquidInvestment($user);
                $total_liquid_assets = $this->questionnaire->getNetAssetsTotalLiquidInvestment($user);
                $unliquid_assets = $this->questionnaire->getNetAssetsUnliquidInvestment($user);
                $total_unliquid_assets = $this->questionnaire->getNetAssetsTotalUnliquidInvestment($user);
                $personal_assets = $this->questionnaire->getNetAssetsPersonalInvestment($user);
                $total_personal_assets = $this->questionnaire->getNetAssetsTotalPersonalInvestment($user);
                // dd($liquid_assets, $total_liquid_assets, $unliquid_assets, $total_unliquid_assets, $total_personal_assets, $personal_assets);
                $suggestion = $this->questionnaire->getSuggestedAssetAllocationTableName($user);
                return view($view)
                        ->with([
                            'networthTotalInvestmentOrAssets' => $networthTotalInvestmentOrAssets,
                            'liquid_assets' => $liquid_assets,
                            'unliquid_assets' => $unliquid_assets,
                            'personal_assets' => $personal_assets,
                            'total_liquid_assets' => $total_liquid_assets,
                            'total_unliquid_assets' => $total_unliquid_assets,
                            'total_personal_assets' => $total_personal_assets,
                        ])
                        ->with([
                            'netWorthAssetDonutChart' => [
                                round($total_personal_assets, 2),
                                round($total_unliquid_assets, 2),
                                round($total_liquid_assets, 2),
                            ],
                        ])
                        ->with('suggestion', $suggestion)
                        ->with('user', $user);
                break;
            
            case 'liabilities':
                // total Liabilities
                $networthDebtsOrLiabilities = $this->questionnaire->getNetworthDebtsOrLiabilities($user);
                $networthTotalDebtsOrLiabilities = $this->questionnaire->getNetworthTotalDebtsOrLiabilities($user);
                // dd($networthDebtsOrLiabilities, $networthTotalDebtsOrLiabilities);
                $suggestion = $this->questionnaire->getSuggestedAssetAllocationTableName($user);
                return view($view)
                        ->with([
                            'networthDebtsOrLiabilities' => $networthDebtsOrLiabilities,
                            'networthTotalDebtsOrLiabilities' => $networthTotalDebtsOrLiabilities,
                        ])
                        ->with([
                            'netWorthLiabilitiesDonutChart' => [
                                round($networthTotalDebtsOrLiabilities, 2),
                            ],
                        ])
                        ->with('suggestion', $suggestion)
                        ->with('user', $user);
                break;
            
            default:
                return abort(404, 'Wrong Type');
                break;
        }
    }


    public function potential_state($locale = 'en', ? USer $user = null)
    {
        $user = $user ?: $this->loggedInUser;
        // dd($locale, $type, $user);
        $personalInfo = $this->questionnaire->getPersonalInfo($user);
        $personalNetIncome = $this->questionnaire->getPersonalNetIncome($user);
        $currentSavingAmount = $this->questionnaire->getCurrentSavingAmount($user);
        $totalMonthlyIncomeAtRetirement = $this->questionnaire->getTotalMonthlyIncomeAtRetirement($user);
        // dd($personalInfo, $personalNetIncome, $currentSavingAmount, $totalMonthlyIncomeAtRetirement);
        // ------------------------------ current CAA ---------------------------
        // CAA table
        $totalCAA = $this->questionnaire->getTotalCAA($user);
        $totalCAAPercentage = $this->questionnaire->getTotalCAAPercentage($user);
        // values
        $cashAndDepositsCAA = $this->questionnaire->getCashAndDepositsCAA($user);
        $localEquityCAA = $this->questionnaire->getLocalEquityCAA($user);
        $internationalEquityCAA = $this->questionnaire->getInternationalEquityCAA($user);
        $governmentBondsCAA = $this->questionnaire->getGovernmentBondsCAA($user);
        $corporateBondsCAA = $this->questionnaire->getCorporateBondsCAA($user);
        $reitsCAA = $this->questionnaire->getReitsCAA($user);
        $directPropertiesCAA = $this->questionnaire->getDirectPropertiesCAA($user);
        // percentages
        $cashAndDepositsCAAPercentage = $this->questionnaire->getCashAndDepositsCAAPercentage($user);
        $localEquityCAAPercentage = $this->questionnaire->getLocalEquityCAAPercentage($user);
        $internationalEquityCAAPercentage = $this->questionnaire->getInternationalEquityCAAPercentage($user);
        $governmentBondsCAAPercentage = $this->questionnaire->getGovernmentBondsCAAPercentage($user);
        $corporateBondsCAAPercentage = $this->questionnaire->getCorporateBondsCAAPercentage($user);
        $reitsCAAPercentage = $this->questionnaire->getReitsCAAPercentage($user);
        $directPropertiesCAAPercentage = $this->questionnaire->getDirectPropertiesCAAPercentage($user);
        // ------------------------------ suggested -----------------------------
        $suggestion = $this->questionnaire->getSuggestedAssetAllocationTableName($user);
        $type = $suggestion;
        // ------------------------------ selected CAA ---------------------------
        $initialInvestment = $this->questionnaire->getInitialInvestment($user);
        $selectedAssetAllocationTable = $this->questionnaire->getSelectedAssetAllocationTable($type, $user);

        // dd($initialInvestment, $selectedAssetAllocationTable);

        $historical_return = Constant::where('constant_meta_type', 'historical_total_returns')
                            ->pluck('constant_value', 'constant_attribute');
        $constants = Constant::where('constant_meta_type', 'LIKE',  'retirement_planner_' . '%')
                    ->orWhere('constant_meta_type', 'inflation')
                    ->orWhere('constant_meta_type', 'uncertainty')
                    ->get()->keyBy('constant_attribute')->toArray();

        // ----------------------------- --------------------------------
        $current_age = $this->questionnaire->getPersonalInfo($user)["personal_info"]["years_old"] ?? null;
        $retirement_age = $this->questionnaire->getRetirementAge($user);
        $expected_age = $this->questionnaire->getLifeExpectancyAfterRetirement($user);
        $salary = ($this->questionnaire->getPersonalNetIncome($user) ?? null) * 12;
        $annual_saving = ($this->questionnaire->getCurrentSavingAmount($user) ?? null) * 12;
        $pension_income = ($this->questionnaire->getExpectedRetirementSalary($user) ?? null) * 12;
        $retirement_saving_balance = $constants["Retirement Savings Balance ($) ' Starting Amount '"]["constant_value"] ?? null;

        $before_retirement_investment_return = $constants["Investment Return (before Retirement) (%)"]["constant_value"] ?? null;
        $after_retirement_investment_return = $constants["Investment Return (after Retirement) (%)"]["constant_value"] ?? null;
        $starting_age = $current_age;
        $ending_age = $retirement_age + $expected_age;

        $savingsAtEndingAge = [];

        $new_salary = $salary;
        $starting_amount = $retirement_saving_balance;
        $new_interest = $starting_amount * ($before_retirement_investment_return / 100);

        $ageForGraph = []; 
        $yearEndingBalanceForGraph = []; 

        for ($i = (int) $current_age; $i <= $ending_age; $i++) { 
            $ageForGraph[] = $i;
            if ($i == $current_age) 
            {
                $savingsAtEndingAge[$i]['salary'] = round($new_salary, 2);
                $savingsAtEndingAge[$i]['balance'] = $starting_amount;
                $savingsAtEndingAge[$i]['interest'] = round($new_interest, 2);

                $starting_amount = $savingsAtEndingAge[$i]['balance'] + $savingsAtEndingAge[$i]['interest'];

                $savingsAtEndingAge[$i]['yearly_savings'] = $annual_saving;
                $savingsAtEndingAge[$i]['desired_retirement_income'] = 0;
                $savingsAtEndingAge[$i]['pension_income'] = 0;
                $savingsAtEndingAge[$i]['year_ending_balance'] = $savingsAtEndingAge[$i]['balance'] + $savingsAtEndingAge[$i]['interest'] + $savingsAtEndingAge[$i]['yearly_savings'];

                $yearEndingBalanceForGraph[] = $savingsAtEndingAge[$i]['year_ending_balance'];
            } 
            else if ($i >= $retirement_age) 
            {
                $savingsAtEndingAge[$i]['salary'] = 0;
                $savingsAtEndingAge[$i]['balance'] = round($starting_amount, 2);
                $savingsAtEndingAge[$i]['interest'] = round($starting_amount * ($before_retirement_investment_return / 100), 2);

                $starting_amount = $savingsAtEndingAge[$i]['balance'] + $savingsAtEndingAge[$i]['interest'];

                $savingsAtEndingAge[$i]['yearly_savings'] = 0;

                $new_salary += $salary * (($constants["( Increase In Income , Saving , Inflation )"]["constant_value"] ?? null) / 100);
                $savingsAtEndingAge[$i]['desired_retirement_income'] = round($new_salary, 2);
                $salary = $new_salary;

                $savingsAtEndingAge[$i]['pension_income'] = round($pension_income, 2);
                $savingsAtEndingAge[$i]['year_ending_balance'] = $savingsAtEndingAge[$i]['balance'] + $savingsAtEndingAge[$i]['interest'] + $savingsAtEndingAge[$i]['yearly_savings'];

                $yearEndingBalanceForGraph[] = $savingsAtEndingAge[$i]['year_ending_balance'];
            }
            else 
            {
                $new_salary += $salary * (($constants["( Increase In Income , Saving , Inflation )"]["constant_value"] ?? null) / 100);
                $savingsAtEndingAge[$i]['salary'] = round($new_salary, 2);
                $salary = $new_salary;

                $savingsAtEndingAge[$i]['balance'] = round($starting_amount, 2);
                $savingsAtEndingAge[$i]['interest'] = round($starting_amount * ($before_retirement_investment_return / 100), 2);

                $starting_amount = $savingsAtEndingAge[$i]['balance'] + $savingsAtEndingAge[$i]['interest'];

                $savingsAtEndingAge[$i]['yearly_savings'] = $annual_saving;
                $savingsAtEndingAge[$i]['desired_retirement_income'] = 0;
                $savingsAtEndingAge[$i]['pension_income'] = 0;
                $savingsAtEndingAge[$i]['year_ending_balance'] = $savingsAtEndingAge[$i]['balance'] + $savingsAtEndingAge[$i]['interest'] + $savingsAtEndingAge[$i]['yearly_savings'];

                $yearEndingBalanceForGraph[] = $savingsAtEndingAge[$i]['year_ending_balance'];
            }
        }

        return view('dashboard.user_panel.user_dashboard_pages.potential_state')
                ->with([
                    'totalCAA' => $totalCAA,
                    'totalCAAPercentage' => $totalCAAPercentage,

                    'cashAndDepositsCAA' => $cashAndDepositsCAA,
                    'localEquityCAA' => $localEquityCAA,
                    'internationalEquityCAA' => $internationalEquityCAA,
                    'governmentBondsCAA' => $governmentBondsCAA,
                    'corporateBondsCAA' => $corporateBondsCAA,
                    // 'reitsCAA' => $reitsCAA,
                    // 'directPropertiesCAA' => $directPropertiesCAA,
                    'localRealEstateCAA' => $localRealEstateCAA,
                    'internationalRealEstateCAA' => $internationalRealEstateCAA,

                    'cashAndDepositsCAAPercentage' => $cashAndDepositsCAAPercentage,
                    'localEquityCAAPercentage' => $localEquityCAAPercentage,
                    'internationalEquityCAAPercentage' => $internationalEquityCAAPercentage,
                    'governmentBondsCAAPercentage' => $governmentBondsCAAPercentage,
                    'corporateBondsCAAPercentage' => $corporateBondsCAAPercentage,
                    // 'reitsCAAPercentage' => $reitsCAAPercentage,
                    // 'directPropertiesCAAPercentage' => $directPropertiesCAAPercentage,
                    'localRealEstateCAAPercentage' => $localRealEstateCAAPercentage,
                    'internationalRealEstateCAAPercentage' => $internationalRealEstateCAAPercentage,

                ])
                ->with([
                    'currentAssetDataDonutChart' => [
                        round($cashAndDepositsCAAPercentage['percentage'], 2),
                        round($localEquityCAAPercentage['percentage'], 2),
                        round($internationalEquityCAAPercentage['percentage'], 2),
                        round($governmentBondsCAAPercentage['percentage'], 2),
                        round($corporateBondsCAAPercentage['percentage'], 2),
                        // round($reitsCAAPercentage['percentage'], 2),
                        // round($directPropertiesCAAPercentage['percentage'], 2),
                        round($localRealEstateCAAPercentage['percentage'], 2),
                        round($internationalRealEstateCAAPercentage['percentage'], 2),
                    ],
                    'selectedAssetDataDonutChart' => [
                        round($selectedAssetAllocationTable['percentage']['cash_and_deposits'], 2),
                        round($selectedAssetAllocationTable['percentage']['local_equity'], 2),
                        round($selectedAssetAllocationTable['percentage']['government_bonds'], 2),
                        round($selectedAssetAllocationTable['percentage']['international_equity'], 2),
                        round($selectedAssetAllocationTable['percentage']['corporate_bonds'], 2),
                        // round($selectedAssetAllocationTable['percentage']['reits'], 2),
                        // round($selectedAssetAllocationTable['percentage']['direct_properties'], 2),
                        round($selectedAssetAllocationTable['percentage']['local_real_estate'], 2),
                        round($selectedAssetAllocationTable['percentage']['international_real_estate'], 2),
                    ],
                    'selectedAssetValueDataDonutChart' => [
                        round($selectedAssetAllocationTable['value']['cash_and_deposits'], 2),
                        round($selectedAssetAllocationTable['value']['local_equity'], 2),
                        round($selectedAssetAllocationTable['value']['government_bonds'], 2),
                        round($selectedAssetAllocationTable['value']['international_equity'], 2),
                        round($selectedAssetAllocationTable['value']['corporate_bonds'], 2),
                        // round($selectedAssetAllocationTable['value']['reits'], 2),
                        // round($selectedAssetAllocationTable['value']['direct_properties'], 2),
                        round($selectedAssetAllocationTable['value']['local_real_estate'], 2),
                        round($selectedAssetAllocationTable['value']['international_real_estate'], 2),
                    ],
                ])
                ->with([
                    'initialInvestment' => $initialInvestment,
                    'selectedAssetAllocationTable' => $selectedAssetAllocationTable,
                    'historical_return' => $historical_return,
                ])
                ->with('user', $user)
                ->with('personalInfo', $personalInfo)
                ->with('personalNetIncome', $personalNetIncome)
                ->with('currentSavingAmount', $currentSavingAmount)
                ->with('totalMonthlyIncomeAtRetirement', $totalMonthlyIncomeAtRetirement)
                ->with('suggestion', $suggestion)
                ->with('type', $type)
                ->with('constants', $constants)
                ->with('savingsAtEndingAge', $savingsAtEndingAge)
                ->with('ending_age', $ending_age)
                ->with('ageForGraph', $ageForGraph)
                ->with('yearEndingBalanceForGraph', $yearEndingBalanceForGraph);
    }


    public function investment_evaluation_without_plan($locale = 'en', ? USer $user = null)
    {
        $user = $user ?: $this->loggedInUser;

        // dd($locale, $type, $user);
        $personalInfo = $this->questionnaire->getPersonalInfo($user);
        $personalNetIncome = $this->questionnaire->getPersonalNetIncome($user);
        $currentSavingAmount = $this->questionnaire->getCurrentSavingAmount($user);
        $totalMonthlyIncomeAtRetirement = $this->questionnaire->getTotalMonthlyIncomeAtRetirement($user);
        // dd($personalInfo, $personalNetIncome, $currentSavingAmount, $totalMonthlyIncomeAtRetirement);
        // ------------------------------ current CAA ---------------------------
        // CAA table
        $totalCAA = $this->questionnaire->getTotalCAA($user);
        $totalCAAPercentage = $this->questionnaire->getTotalCAAPercentage($user);
        // values
        $cashAndDepositsCAA = $this->questionnaire->getCashAndDepositsCAA($user);
        $localEquityCAA = $this->questionnaire->getLocalEquityCAA($user);
        $internationalEquityCAA = $this->questionnaire->getInternationalEquityCAA($user);
        $governmentBondsCAA = $this->questionnaire->getGovernmentBondsCAA($user);
        $corporateBondsCAA = $this->questionnaire->getCorporateBondsCAA($user);
        $reitsCAA = $this->questionnaire->getReitsCAA($user);
        $directPropertiesCAA = $this->questionnaire->getDirectPropertiesCAA($user);
        // percentages
        $cashAndDepositsCAAPercentage = $this->questionnaire->getCashAndDepositsCAAPercentage($user);
        $localEquityCAAPercentage = $this->questionnaire->getLocalEquityCAAPercentage($user);
        $internationalEquityCAAPercentage = $this->questionnaire->getInternationalEquityCAAPercentage($user);
        $governmentBondsCAAPercentage = $this->questionnaire->getGovernmentBondsCAAPercentage($user);
        $corporateBondsCAAPercentage = $this->questionnaire->getCorporateBondsCAAPercentage($user);
        $reitsCAAPercentage = $this->questionnaire->getReitsCAAPercentage($user);
        $directPropertiesCAAPercentage = $this->questionnaire->getDirectPropertiesCAAPercentage($user);
        // ------------------------------ suggested -----------------------------
        $suggestion = $this->questionnaire->getSuggestedAssetAllocationTableName($user);
        $type = $suggestion;
        // ------------------------------ selected CAA ---------------------------
        $initialInvestment = $this->questionnaire->getInitialInvestment($user);
        $selectedAssetAllocationTable = $this->questionnaire->getSelectedAssetAllocationTable($type, $user);
        $historical_return = Constant::where('constant_meta_type', 'historical_total_returns')
                            ->pluck('constant_value', 'constant_attribute');
        $constants = Constant::where('constant_meta_type', 'LIKE',  'retirement_planner_' . '%')
                    ->orWhere('constant_meta_type', 'inflation')
                    ->orWhere('constant_meta_type', 'uncertainty')
                    ->get()->keyBy('constant_attribute')->toArray();

        // ----------------------------- --------------------------------
        $current_age = $this->questionnaire->getPersonalInfo($user)["personal_info"]["years_old"] ?? null;
        $retirement_age = $this->questionnaire->getRetirementAge($user);
        $expected_age = $this->questionnaire->getLifeExpectancyAfterRetirement($user);
        $salary = ($this->questionnaire->getPersonalNetIncome($user) ?? null) * 12;
        $annual_saving = ($this->questionnaire->getCurrentSavingAmount($user) ?? null) * 12;
        $pension_income = ($this->questionnaire->getExpectedRetirementSalary($user) ?? null) * 12;
        $retirement_saving_balance = $constants["Retirement Savings Balance ($) ' Starting Amount '"]["constant_value"] ?? null;

        $before_retirement_investment_return = $constants["Investment Return (before Retirement) (%)"]["constant_value"] ?? null;
        $after_retirement_investment_return = $constants["Investment Return (after Retirement) (%)"]["constant_value"] ?? null;
        $starting_age = $current_age;
        $ending_age = $retirement_age + $expected_age;

        $savingsAtEndingAge = [];

        $new_salary = $salary;
        $starting_amount = $retirement_saving_balance;
        $new_interest = $starting_amount * ($before_retirement_investment_return / 100);

        $ageForGraph = []; 
        $yearEndingBalanceForGraph = []; 

        for ($i = (int) $current_age; $i <= $ending_age; $i++) { 
            $ageForGraph[] = $i;
            if ($i == $current_age) 
            {
                $savingsAtEndingAge[$i]['salary'] = round($new_salary, 2);
                $savingsAtEndingAge[$i]['balance'] = $starting_amount;
                $savingsAtEndingAge[$i]['interest'] = round($new_interest, 2);

                $starting_amount = $savingsAtEndingAge[$i]['balance'] + $savingsAtEndingAge[$i]['interest'];

                $savingsAtEndingAge[$i]['yearly_savings'] = $annual_saving;
                $savingsAtEndingAge[$i]['desired_retirement_income'] = 0;
                $savingsAtEndingAge[$i]['pension_income'] = 0;
                $savingsAtEndingAge[$i]['year_ending_balance'] = $savingsAtEndingAge[$i]['balance'] + $savingsAtEndingAge[$i]['interest'] + $savingsAtEndingAge[$i]['yearly_savings'];

                $yearEndingBalanceForGraph[] = $savingsAtEndingAge[$i]['year_ending_balance'];
            } 
            else if ($i >= $retirement_age) 
            {
                $savingsAtEndingAge[$i]['salary'] = 0;
                $savingsAtEndingAge[$i]['balance'] = round($starting_amount, 2);
                $savingsAtEndingAge[$i]['interest'] = round($starting_amount * ($before_retirement_investment_return / 100), 2);

                $starting_amount = $savingsAtEndingAge[$i]['balance'] + $savingsAtEndingAge[$i]['interest'];

                $savingsAtEndingAge[$i]['yearly_savings'] = 0;

                $new_salary += $salary * (($constants["( Increase In Income , Saving , Inflation )"]["constant_value"] ?? null) / 100);
                $savingsAtEndingAge[$i]['desired_retirement_income'] = round($new_salary, 2);
                $salary = $new_salary;

                $savingsAtEndingAge[$i]['pension_income'] = round($pension_income, 2);
                $savingsAtEndingAge[$i]['year_ending_balance'] = $savingsAtEndingAge[$i]['balance'] + $savingsAtEndingAge[$i]['interest'] + $savingsAtEndingAge[$i]['yearly_savings'];

                $yearEndingBalanceForGraph[] = $savingsAtEndingAge[$i]['year_ending_balance'];
            }
            else 
            {
                $new_salary += $salary * (($constants["( Increase In Income , Saving , Inflation )"]["constant_value"] ?? null) / 100);
                $savingsAtEndingAge[$i]['salary'] = round($new_salary, 2);
                $salary = $new_salary;

                $savingsAtEndingAge[$i]['balance'] = round($starting_amount, 2);
                $savingsAtEndingAge[$i]['interest'] = round($starting_amount * ($before_retirement_investment_return / 100), 2);

                $starting_amount = $savingsAtEndingAge[$i]['balance'] + $savingsAtEndingAge[$i]['interest'];

                $savingsAtEndingAge[$i]['yearly_savings'] = $annual_saving;
                $savingsAtEndingAge[$i]['desired_retirement_income'] = 0;
                $savingsAtEndingAge[$i]['pension_income'] = 0;
                $savingsAtEndingAge[$i]['year_ending_balance'] = $savingsAtEndingAge[$i]['balance'] + $savingsAtEndingAge[$i]['interest'] + $savingsAtEndingAge[$i]['yearly_savings'];

                $yearEndingBalanceForGraph[] = $savingsAtEndingAge[$i]['year_ending_balance'];
            }
        }

        return view('dashboard.user_panel.user_dashboard_pages.investment_evaluation_without_plan')
                ->with([
                    'totalCAA' => $totalCAA,
                    'totalCAAPercentage' => $totalCAAPercentage,

                    'cashAndDepositsCAA' => $cashAndDepositsCAA,
                    'localEquityCAA' => $localEquityCAA,
                    'internationalEquityCAA' => $internationalEquityCAA,
                    'governmentBondsCAA' => $governmentBondsCAA,
                    'corporateBondsCAA' => $corporateBondsCAA,
                    // 'reitsCAA' => $reitsCAA,
                    // 'directPropertiesCAA' => $directPropertiesCAA,
                    'localRealEstateCAA' => $localRealEstateCAA,
                    'internationalRealEstateCAA' => $internationalRealEstateCAA,

                    'cashAndDepositsCAAPercentage' => $cashAndDepositsCAAPercentage,
                    'localEquityCAAPercentage' => $localEquityCAAPercentage,
                    'internationalEquityCAAPercentage' => $internationalEquityCAAPercentage,
                    'governmentBondsCAAPercentage' => $governmentBondsCAAPercentage,
                    'corporateBondsCAAPercentage' => $corporateBondsCAAPercentage,
                    // 'reitsCAAPercentage' => $reitsCAAPercentage,
                    // 'directPropertiesCAAPercentage' => $directPropertiesCAAPercentage,
                    'localRealEstateCAAPercentage' => $localRealEstateCAAPercentage,
                    'internationalRealEstateCAAPercentage' => $internationalRealEstateCAAPercentage,

                ])
                ->with([
                    'currentAssetDataDonutChart' => [
                        round($cashAndDepositsCAAPercentage['percentage'], 2),
                        round($localEquityCAAPercentage['percentage'], 2),
                        round($internationalEquityCAAPercentage['percentage'], 2),
                        round($governmentBondsCAAPercentage['percentage'], 2),
                        round($corporateBondsCAAPercentage['percentage'], 2),
                        // round($reitsCAAPercentage['percentage'], 2),
                        // round($directPropertiesCAAPercentage['percentage'], 2),
                        round($localRealEstateCAAPercentage['percentage'], 2),
                        round($internationalRealEstateCAAPercentage['percentage'], 2),
                    ],
                    'selectedAssetDataDonutChart' => [
                        round($selectedAssetAllocationTable['percentage']['cash_and_deposits'], 2),
                        round($selectedAssetAllocationTable['percentage']['local_equity'], 2),
                        round($selectedAssetAllocationTable['percentage']['government_bonds'], 2),
                        round($selectedAssetAllocationTable['percentage']['international_equity'], 2),
                        round($selectedAssetAllocationTable['percentage']['corporate_bonds'], 2),
                        // round($selectedAssetAllocationTable['percentage']['reits'], 2),
                        // round($selectedAssetAllocationTable['percentage']['direct_properties'], 2),
                        round($selectedAssetAllocationTable['percentage']['local_real_estate'], 2),
                        round($selectedAssetAllocationTable['percentage']['international_real_estate'], 2),
                    ],
                    'selectedAssetValueDataDonutChart' => [
                        round($selectedAssetAllocationTable['value']['cash_and_deposits'], 2),
                        round($selectedAssetAllocationTable['value']['local_equity'], 2),
                        round($selectedAssetAllocationTable['value']['government_bonds'], 2),
                        round($selectedAssetAllocationTable['value']['international_equity'], 2),
                        round($selectedAssetAllocationTable['value']['corporate_bonds'], 2),
                        // round($selectedAssetAllocationTable['value']['reits'], 2),
                        // round($selectedAssetAllocationTable['value']['direct_properties'], 2),
                        round($selectedAssetAllocationTable['value']['local_real_estate'], 2),
                        round($selectedAssetAllocationTable['value']['international_real_estate'], 2),

                    ],
                ])
                ->with([
                    'initialInvestment' => $initialInvestment,
                    'selectedAssetAllocationTable' => $selectedAssetAllocationTable,
                    'historical_return' => $historical_return,
                ])
                ->with('user', $user)
                ->with('personalInfo', $personalInfo)
                ->with('personalNetIncome', $personalNetIncome)
                ->with('currentSavingAmount', $currentSavingAmount)
                ->with('totalMonthlyIncomeAtRetirement', $totalMonthlyIncomeAtRetirement)
                ->with('suggestion', $suggestion)
                ->with('type', $type)
                ->with('constants', $constants)
                ->with('savingsAtEndingAge', $savingsAtEndingAge)
                ->with('ending_age', $ending_age)
                ->with('ageForGraph', $ageForGraph)
                ->with('yearEndingBalanceForGraph', $yearEndingBalanceForGraph);
    }


    public function select_plan($locale = 'en')
    {
        $user = $this->loggedInUser;

        // ------------------------------ suggested -----------------------------
        $suggestion = $this->questionnaire->getSuggestedAssetAllocationTableName($user);

        return view('dashboard.user_panel.user_dashboard_pages.select_plan')
                ->with('user', $user)
                ->with('suggestion', $suggestion);
    }


    public function investment_evaluation_with_plan($locale = 'en', $plan, ? USer $user = null)
    {
        $user = $user ?: $this->loggedInUser;

        $plans = [
            'conservative_c1',
            'conservative_c2',
            'natural_n1',
            'natural_n2',
            'aggressive_a1',
            'aggressive_a2',
        ];

        if(!in_array($plan, $plans))
            return abort(404, 'Invalid Plan');
        // dd($locale, $plan, $user);
        $personalInfo = $this->questionnaire->getPersonalInfo($user);
        $personalNetIncome = $this->questionnaire->getPersonalNetIncome($user);
        $currentSavingAmount = $this->questionnaire->getCurrentSavingAmount($user);
        $totalMonthlyIncomeAtRetirement = $this->questionnaire->getTotalMonthlyIncomeAtRetirement($user);
        // dd($personalInfo, $personalNetIncome, $currentSavingAmount, $totalMonthlyIncomeAtRetirement);
        // ------------------------------ current CAA ---------------------------
        // CAA table
        $totalCAA = $this->questionnaire->getTotalCAA($user);
        $totalCAAPercentage = $this->questionnaire->getTotalCAAPercentage($user);
        // values
        $cashAndDepositsCAA = $this->questionnaire->getCashAndDepositsCAA($user);
        $localEquityCAA = $this->questionnaire->getLocalEquityCAA($user);
        $internationalEquityCAA = $this->questionnaire->getInternationalEquityCAA($user);
        $governmentBondsCAA = $this->questionnaire->getGovernmentBondsCAA($user);
        $corporateBondsCAA = $this->questionnaire->getCorporateBondsCAA($user);
        $reitsCAA = $this->questionnaire->getReitsCAA($user);
        $directPropertiesCAA = $this->questionnaire->getDirectPropertiesCAA($user);
        // percentages
        $cashAndDepositsCAAPercentage = $this->questionnaire->getCashAndDepositsCAAPercentage($user);
        $localEquityCAAPercentage = $this->questionnaire->getLocalEquityCAAPercentage($user);
        $internationalEquityCAAPercentage = $this->questionnaire->getInternationalEquityCAAPercentage($user);
        $governmentBondsCAAPercentage = $this->questionnaire->getGovernmentBondsCAAPercentage($user);
        $corporateBondsCAAPercentage = $this->questionnaire->getCorporateBondsCAAPercentage($user);
        $reitsCAAPercentage = $this->questionnaire->getReitsCAAPercentage($user);
        $directPropertiesCAAPercentage = $this->questionnaire->getDirectPropertiesCAAPercentage($user);
        // ------------------------------ suggested -----------------------------
        $suggestion = $this->questionnaire->getSuggestedAssetAllocationTableName($user);
        // ------------------------------ selected CAA ---------------------------
        $initialInvestment = $this->questionnaire->getInitialInvestment($user);
        $selectedAssetAllocationTable = $this->questionnaire->getSelectedAssetAllocationTable($plan, $user);


        $historical_return = Constant::where('constant_meta_type', 'historical_total_returns')
                            ->pluck('constant_value', 'constant_attribute');

        $constants = Constant::where('constant_meta_type', 'LIKE',  'retirement_planner_' . '%')
                    ->orWhere('constant_meta_type', 'inflation')
                    ->orWhere('constant_meta_type', 'uncertainty')
                    ->get()->keyBy('constant_attribute')->toArray();




        // --------------------------- getExtraInfo --------------------------
        $extraInfo = $this->questionnaire->getExtraInfo($user);

        $monthly_contributions_year_1 = $extraInfo['extra_info']['monthly_contributions_year_1'] ?? 0;

        $yearly_contributions_year_1 = $monthly_contributions_year_1 * 12;
        
        $annual_increase_in_contributions_percentage = $extraInfo['extra_info']['annual_increase_in_contributions_percentage'] ?? 0;

    
        // ----------------------------- --------------------------------
        $current_age = $this->questionnaire->getPersonalInfo($user)["personal_info"]["years_old"] ?? null;
        $retirement_age = $this->questionnaire->getRetirementAge($user);
        $expected_age = $this->questionnaire->getLifeExpectancyAfterRetirement($user);
        $salary = ($this->questionnaire->getPersonalNetIncome($user) ?? null) * 12;
        $annual_saving = ($this->questionnaire->getCurrentSavingAmount($user) ?? null) * 12;
        $pension_income = ($this->questionnaire->getExpectedRetirementSalary($user) ?? null) * 12;
        $retirement_saving_balance = $constants["Retirement Savings Balance ($) ' Starting Amount '"]["constant_value"] ?? null;

        $assumed_inflation_rate = $constants['( Increase In Income , Saving , Inflation )']['constant_value'] ?? 0;

        $before_retirement_investment_return = $constants["Investment Return (before Retirement) (%)"]["constant_value"] ?? null;
        $after_retirement_investment_return = $constants["Investment Return (after Retirement) (%)"]["constant_value"] ?? null;

        $working_years_nominal_return = $assumed_inflation_rate + $before_retirement_investment_return;

        $retirement_years_nominal_return = $assumed_inflation_rate + $after_retirement_investment_return;


        $withdrawl_amount_per_month = $extraInfo['extra_info']['withdrawl_amount_per_month'] ?? 0;

        $withdrawl_amount_per_year = $extraInfo['extra_info']['withdrawl_amount_per_month'] * 12;

        $inflation_adjusted_withdrawl_amount_per_year = $withdrawl_amount_per_year * ((100 + $assumed_inflation_rate) / 100) ** ($retirement_age - $current_age);

        // dd($inflation_adjusted_withdrawl_amount_per_year);



        $starting_age = $current_age;
        $ending_age = $retirement_age + $expected_age;

        $savingsAtEndingAge = [];

        $workingSavingsAtEndingAge = [];
        $retirementSavingsAtEndingAge = [];


        $new_salary = $salary;
        $starting_amount = $retirement_saving_balance;
        $new_interest = $starting_amount * ($before_retirement_investment_return / 100);

        $ageForGraph = []; 
        $yearEndingBalanceForGraph = []; 

        // working years
        for ($i = (int) $current_age; $i < $retirement_age; $i++) { 
            if ($i == $current_age) 
            {
                 $ageForGraph[] = $i;
                 $workingSavingsAtEndingAge[$i]['value_beginning_of_year'] = round($new_salary, 2);

                $workingSavingsAtEndingAge[$i]['contributions'] = $yearly_contributions_year_1;

                $workingSavingsAtEndingAge[$i]['returns'] = round(($workingSavingsAtEndingAge[$i]['value_beginning_of_year'] + ($workingSavingsAtEndingAge[$i]['contributions'] / 2)) * ($working_years_nominal_return / 100), 2);

                $yearEndingBalanceForGraph[] = $workingSavingsAtEndingAge[$i]['value_end_year'] = $workingSavingsAtEndingAge[$i]['value_beginning_of_year'] + $workingSavingsAtEndingAge[$i]['contributions'] + $workingSavingsAtEndingAge[$i]['returns'];
            }
            else
            {
                $ageForGraph[] = $i;
                $workingSavingsAtEndingAge[$i]['value_beginning_of_year'] = $workingSavingsAtEndingAge[$i-1]['value_end_year'];

                $workingSavingsAtEndingAge[$i]['contributions'] = ($workingSavingsAtEndingAge[$i-1]['contributions'] + (($annual_increase_in_contributions_percentage / 100) * $monthly_contributions_year_1)) * ((100 + $assumed_inflation_rate) / 100);

                $workingSavingsAtEndingAge[$i]['returns'] = round(($workingSavingsAtEndingAge[$i]['value_beginning_of_year'] + ($workingSavingsAtEndingAge[$i]['contributions'] / 2)) * ($working_years_nominal_return / 100), 2);

                $yearEndingBalanceForGraph[] = $workingSavingsAtEndingAge[$i]['value_end_year'] = $workingSavingsAtEndingAge[$i]['value_beginning_of_year'] + $workingSavingsAtEndingAge[$i]['contributions'] + $workingSavingsAtEndingAge[$i]['returns'];
            }

        }

        return view('dashboard.user_panel.user_dashboard_pages.investment_evaluation_with_plan')
                ->with([
                    'totalCAA' => $totalCAA,
                    'totalCAAPercentage' => $totalCAAPercentage,

                    'cashAndDepositsCAA' => $cashAndDepositsCAA,
                    'localEquityCAA' => $localEquityCAA,
                    'internationalEquityCAA' => $internationalEquityCAA,
                    'governmentBondsCAA' => $governmentBondsCAA,
                    'corporateBondsCAA' => $corporateBondsCAA,
                    // 'reitsCAA' => $reitsCAA,
                    // 'directPropertiesCAA' => $directPropertiesCAA,
                    'localRealEstateCAA' => $localRealEstateCAA,
                    'internationalRealEstateCAA' => $internationalRealEstateCAA,

                    'cashAndDepositsCAAPercentage' => $cashAndDepositsCAAPercentage,
                    'localEquityCAAPercentage' => $localEquityCAAPercentage,
                    'internationalEquityCAAPercentage' => $internationalEquityCAAPercentage,
                    'governmentBondsCAAPercentage' => $governmentBondsCAAPercentage,
                    'corporateBondsCAAPercentage' => $corporateBondsCAAPercentage,
                    // 'reitsCAAPercentage' => $reitsCAAPercentage,
                    // 'directPropertiesCAAPercentage' => $directPropertiesCAAPercentage,
                    'localRealEstateCAAPercentage' => $localRealEstateCAAPercentage,
                    'internationalRealEstateCAAPercentage' => $internationalRealEstateCAAPercentage,

                ])
                ->with([
                    'currentAssetDataDonutChart' => [
                        round($cashAndDepositsCAAPercentage['percentage'], 2),
                        round($localEquityCAAPercentage['percentage'], 2),
                        round($internationalEquityCAAPercentage['percentage'], 2),
                        round($governmentBondsCAAPercentage['percentage'], 2),
                        round($corporateBondsCAAPercentage['percentage'], 2),
                        // round($reitsCAAPercentage['percentage'], 2),
                        // round($directPropertiesCAAPercentage['percentage'], 2),
                        round($localRealEstateCAAPercentage['percentage'], 2),
                        round($internationalRealEstateCAAPercentage['percentage'], 2),
                    ],
                    'selectedAssetDataDonutChart' => [
                        round($selectedAssetAllocationTable['percentage']['cash_and_deposits'], 2),
                        round($selectedAssetAllocationTable['percentage']['local_equity'], 2),
                        round($selectedAssetAllocationTable['percentage']['government_bonds'], 2),
                        round($selectedAssetAllocationTable['percentage']['international_equity'], 2),
                        round($selectedAssetAllocationTable['percentage']['corporate_bonds'], 2),
                        // round($selectedAssetAllocationTable['percentage']['reits'], 2),
                        // round($selectedAssetAllocationTable['percentage']['direct_properties'], 2),
                        round($selectedAssetAllocationTable['percentage']['local_real_estate'], 2),
                        round($selectedAssetAllocationTable['percentage']['international_real_estate'], 2),
                    ],
                    'selectedAssetValueDataDonutChart' => [
                        round($selectedAssetAllocationTable['value']['cash_and_deposits'], 2),
                        round($selectedAssetAllocationTable['value']['local_equity'], 2),
                        round($selectedAssetAllocationTable['value']['government_bonds'], 2),
                        round($selectedAssetAllocationTable['value']['international_equity'], 2),
                        round($selectedAssetAllocationTable['value']['corporate_bonds'], 2),
                        // round($selectedAssetAllocationTable['value']['reits'], 2),
                        // round($selectedAssetAllocationTable['value']['direct_properties'], 2),
                        round($selectedAssetAllocationTable['value']['local_real_estate'], 2),
                        round($selectedAssetAllocationTable['value']['international_real_estate'], 2),
                    ],
                ])
                ->with([
                    'initialInvestment' => $initialInvestment,
                    'selectedAssetAllocationTable' => $selectedAssetAllocationTable,
                    'historical_return' => $historical_return,
                ])
                ->with('user', $user)
                ->with('personalInfo', $personalInfo)
                ->with('personalNetIncome', $personalNetIncome)
                ->with('currentSavingAmount', $currentSavingAmount)
                ->with('totalMonthlyIncomeAtRetirement', $totalMonthlyIncomeAtRetirement)
                ->with('suggestion', $suggestion)
                ->with('type', $plan)
                ->with('constants', $constants)
                ->with('savingsAtEndingAge', $savingsAtEndingAge)
                ->with('ending_age', $ending_age)
                ->with('ageForGraph', $ageForGraph)
                ->with('yearEndingBalanceForGraph', $yearEndingBalanceForGraph);
    }



    public function with_plan($locale = 'en', $plan, ? USer $user = null)
    {
        $user = $user ?: $this->loggedInUser;

        $user_questionnaire = $this->loggedInUser->user_latest_questionnaire();

        if(($user_questionnaire->extra_info ?? null) == null){          
            $status = array('msg' => "Additional Information is required to proceed.", 'toastr' => "infoToastr");
            // Session::flash($status['toastr'], $status['msg']);
            return redirect()->route('additional_information', app()->getLocale());
        }

        return redirect()->route('select_plan', $locale);
    }


    public function additional_information($locale = 'en')
    {
        return view('dashboard.user_panel.questionary.additional_info.form');
    }

    public function store_additional_information($locale = 'en', AdditionalInformationRequest $request)
    {
        $this->questionnaire->update_extra_info($request->except('_token'));

        $status = array('msg' => "Additional Information is saved.", 'toastr' => "successToastr");
        Session::flash($status['toastr'], $status['msg']);

        if (strpos(Session::get('previous_route'), 'current_situation') !== false) {
            Session::put('previous_route', '');
            return redirect()->route('current_situation', app()->getLocale());
        }

        return redirect()->route('select_plan', $locale);
    }

    public function getReport()
    {
        $user = loggedInUser();

        // $initialInvestment = $this->questionnaire->getInitialInvestment($user); 

        

        $constants = Constant::where('constant_meta_type', 'LIKE',  'retirement_planner_' . '%')
                    ->orWhere('constant_meta_type', 'inflation')
                    ->orWhere('constant_meta_type', 'uncertainty')
                    ->get()->keyBy('constant_attribute')->toArray();

        // Process
        // Status today
        $personalInfo         = $this->questionnaire->getuserInfo($user);
        $monthlyIncomeToday   = $this->questionnaire->getMonthlyIncomeToday($user);
        $monthlySavingToday   = $this->questionnaire->getMonthlySavingToday($user);
        $totalAssetsToday     = $this->questionnaire->getNetWorthAssetsToday($user);
        $totalLiabilitiesToday= $this->questionnaire->getNetWorthLiabilitiesToday($user);

        // dd($monthlyIncomeToday,$monthlySavingToday,$totalAssetsToday,$totalLiabilitiesToday);

        $annualSavingToday    = $this->questionnaire->getAnnualSavingToday($user);

        $netReturnBeforeRetirement   = $this->questionnaire->getNetReturnBeforeRetirement($user);
        $porfolioExpectedReturn      = $this->questionnaire->getPorfolioExpectedReturn($user);
        $netReturnAfterRetirement    = $this->questionnaire->getNetReturnAfterRetirement($user);

        // dd($annualSavingToday,$netReturnBeforeRetirement,$porfolioExpectedReturn,$netReturnAfterRetirement);

        //GOSI or PPA Plan
        $startingYearInPlan          = $this->questionnaire->getStartingyearInPlan($user);
        $expectedSalaryAtRetirement  = $this->questionnaire->getExpectedSalaryAtRetirement($user);
        $yourPlannedRetirementAge    = $this->questionnaire->getPlannedRetirementAge($user);
        $subscriptionMonths          = $this->questionnaire->getSubscriptionMonth($user);
        $retirementGOCIMonthlyIncome = $this->questionnaire->getRetirementGOCIMonthlyIncome($user);

        // dd($startingYearInPlan,$expectedSalaryAtRetirement,$yourPlannedRetirementAge,$subscriptionMonths,$retirementGOCIMonthlyIncome);

        //Current Asset Allocation
        $cashAndEquivlent            = $this->questionnaire->getCashAndEquivlent($user);
        $equities                    = $this->questionnaire->getEquities($user);
        $fixIncome                   = $this->questionnaire->getFixIncome($user);
        $alternativeInvestments      = $this->questionnaire->getAlternativeInvestments($user);

        $totalCurrentAssetAllocation = $cashAndEquivlent + $equities + $fixIncome + $alternativeInvestments ;

        // dd($cashAndEquivlent,$equities,$fixIncome,$alternativeInvestments,$totalCurrentAssetAllocation);

        // Output
        //Status Today
        $retirementGOCIMonthlyIncome = $this->questionnaire->getGOSIorPPAmonthlySubscription($user);
        $gosi_or_ppa_monthlySubscription = $this->questionnaire->getGosiMonthlySubscription($user);
        $monthlySavingPlanForRetirement  = $this->questionnaire->getMonthlySavingPlanForRetirement($user);
        
        $monthlySavingPercentageToday    = ($monthlySavingToday/(($monthlyIncomeToday == 0) ? 1 : $monthlyIncomeToday) )*100;
        
        $assetsToday                = $totalAssetsToday;
        $liabilitiesToday           = $totalLiabilitiesToday;
        $netWorthToday              = ($assetsToday - $liabilitiesToday > 0)? $assetsToday - $liabilitiesToday: 0;
        $accomulativeSavingtoday    = $this->questionnaire->getAccomulativeSavingtoday($user);


        // dd(
        //     $gosi_or_ppa_monthlySubscription,
        //     $monthlySavingPlanForRetirement,
        //     $monthlySavingPercentageToday,
        //     $assetsToday,
        //     $liabilitiesToday,
        //     $netWorthToday,
        //     $accomulativeSavingtoday
        // );

        //  Current Asset Allocation
        $cashAndEquivlentPercentage = ($cashAndEquivlent / (($totalCurrentAssetAllocation == 0) ? 1 : $totalCurrentAssetAllocation))*100;
        $equitiesPercentage         = ($equities / (($totalCurrentAssetAllocation == 0) ? 1 : $totalCurrentAssetAllocation))*100;
        $fixIncomePercentage        = ($fixIncome / (($totalCurrentAssetAllocation == 0) ? 1 : $totalCurrentAssetAllocation))*100;
        $alternativeInvestmentsPercentage = ($alternativeInvestments / (($totalCurrentAssetAllocation == 0) ? 1 : $totalCurrentAssetAllocation))*100;


        round(($totalCurrentAssetAllocationPercentage = ($cashAndEquivlentPercentage)+($equitiesPercentage)+($fixIncomePercentage)+($alternativeInvestmentsPercentage)) , 0) ;

        $totalCurrentAssetAllocationPercentage = ($totalCurrentAssetAllocationPercentage > 100) ? 100 : $totalCurrentAssetAllocationPercentage;

        // dd($totalCurrentAssetAllocationPercentage, $cashAndEquivlentPercentage , $equitiesPercentage , $fixIncomePercentage , $alternativeInvestmentsPercentage);

        //Investing Diversity
        $assetClass = 0;
        if(round($cashAndEquivlentPercentage) > 1)
            $assetClass += 1;
        if(round($equitiesPercentage) > 1)
            $assetClass += 1;
        if(round($fixIncomePercentage) > 1)
            $assetClass += 1;
        if(round($alternativeInvestmentsPercentage) > 1)
            $assetClass += 1;
        
        // Plan
        $yourCurrentAge   = $this->questionnaire->getCurrentAge($user);
        $valueBegYear     = $accomulativeSavingtoday;
        // $contribution     = $annualSavingToday;
        $contribution     = $this->questionnaire->getContribution($user);
        $returns          = ($valueBegYear + ($contribution)/2)*($porfolioExpectedReturn / 100);
        $valueEndYear     = $valueBegYear + $contribution + $returns;

        // dd($contribution);

        $annualIncreaseInSavingPlan = $this->questionnaire->getAnnualIncreaseInSavingPlan($user);

        $commulitiveSavingRating    = $this->questionnaire->getAccomulativeSavingRating($user);

        $current_age    = $yourCurrentAge;
        $retirement_age = $yourPlannedRetirementAge;

        
        //Asset allocation and Recomended allocation // page 6
        $riskTestIndex = $this->questionnaire->getRiskTotalPoints($user);
        $recommended   = $this->questionnaire->getRecomendedAssetAllocation($user);

        
        // Financial Forecast
        $valueBegYear = [];
        $plan = [];
        $graphContribution = [];
        $uncertain_top = [];
        $uncertain_bottom = [];
        $uncertainty = $constants["( In Returns , Saving )"]["constant_value"] ?? null;

        $graph_limit = ($retirement_age < 65) ? 65 : $retirement_age;
        if($current_age < $retirement_age){
            for ($i = (int) $current_age; $i <= $graph_limit; $i++) {
            // for ($i = (int) $current_age; $i <= $retirement_age; $i++) {
                if ($i == $current_age) 
                {
                    $graphAge[] = $i;
                    $plan[$i]['age']= $i;
    
                    $plan[$i]['value_beginning_of_year'] = $accomulativeSavingtoday;
                    $graphContribution[] = $plan[$i]['contribution'] = $contribution;
    
                    $plan[$i]['returns'] = ($plan[$i]['value_beginning_of_year'] + ($plan[$i]['contribution'])/2)*($porfolioExpectedReturn / 100);
    
                    $graphValueBegYear[] = $plan[$i]['value_end_year'] = $plan[$i]['value_beginning_of_year'] + $plan[$i]['contribution'] + $plan[$i]['returns'];
    
                    $uncertain_top[] = $plan[$i]['value_end_year'] + ($plan[$i]['value_end_year'] * $uncertainty)/100;
                    $uncertain_bottom[] = $plan[$i]['value_end_year'] - ($plan[$i]['value_end_year'] * $uncertainty)/100;
    
                }
                else
                {
                    $graphAge[] = $i;
                    $plan[$i]['age']= $i;
                    $plan[$i]['value_beginning_of_year'] = ($plan[$i-1]['value_end_year']);
    
                    // $graphContribution[] = $plan[$i]['contribution'] = ($i >= $retirement_age) ? 0 : ($plan[$i-1]['contribution'] * ((100 + $annualIncreaseInSavingPlan) / 100));
                    $graphContribution[] = $plan[$i]['contribution'] = ($plan[$i-1]['contribution'] * ((100 + $annualIncreaseInSavingPlan) / 100));

                    // if($i > $retirement_age)
                        // $plan[$i]['retirementValue'] = $retirementValue = $netReturnAfterRetirement;
                    // else
                        $plan[$i]['retirementValue'] = $retirementValue = $porfolioExpectedReturn;
    
                    $plan[$i]['returns'] = ($plan[$i]['value_beginning_of_year'] + ($plan[$i]['contribution'])/2)*($retirementValue / 100);
    
                    $graphValueBegYear[] =  $plan[$i]['value_end_year'] = $plan[$i]['value_beginning_of_year'] + $plan[$i]['contribution'] + $plan[$i]['returns'];
    
                    $uncertain_top[] = $plan[$i]['value_end_year'] + ($plan[$i]['value_end_year'] * $uncertainty)/100;
                    $uncertain_bottom[] = $plan[$i]['value_end_year'] - ($plan[$i]['value_end_year'] * $uncertainty)/100;
    
                }
    
            }
        }
        else
            dd('Age Error, Please fix your age and try again.');

        
        $monthlySalary = (($netReturnAfterRetirement/100)*$plan[$retirement_age]['value_end_year'] ?? 1)/12;

        $totalMonthlyIncome = $retirementGOCIMonthlyIncome + $monthlySalary;

        $returnAssumptions = $this->questionnaire->getReturnAssumptions($user);

        $data = [
            'personalInfo' => $personalInfo,

            'monthlyIncomeToday' => $monthlyIncomeToday,
            'gosi_or_ppa_monthlySubscription' => $gosi_or_ppa_monthlySubscription,
            'totalAssetsToday' => $totalAssetsToday,
            'totalLiabilitiesToday' => $totalLiabilitiesToday,
            'monthlySavingPlanForRetirement' => $monthlySavingPlanForRetirement,
            'monthlySavingPercentageToday' => $monthlySavingPercentageToday,
            'netWorthToday' => $netWorthToday,
            'accomulativeSavingtoday' => $accomulativeSavingtoday,
            'assetClass' => $assetClass,

            'commulitiveSavingRating' => $commulitiveSavingRating,

            'assetAllocationDonutChartValues' => [
                    $cashAndEquivlent,
                    $equities,
                    $fixIncome,
                    $alternativeInvestments,
                    
                ],

            'cashAndEquivlent' => $cashAndEquivlent, 
            'equities' => $equities, 
            'fixIncome' => $fixIncome, 
            'alternativeInvestments' => $alternativeInvestments, 
            'totalCurrentAssetAllocation' => $totalCurrentAssetAllocation, 
            'cashAndEquivlentPercentage' => $cashAndEquivlentPercentage, 
            'equitiesPercentage' => $equitiesPercentage, 
            'fixIncomePercentage' => $fixIncomePercentage, 
            'alternativeInvestmentsPercentage' => $alternativeInvestmentsPercentage, 
            'totalCurrentAssetAllocationPercentage' => $totalCurrentAssetAllocationPercentage, 

            'riskTestIndex' => $riskTestIndex,
            'recommended' => $recommended,

            'retirement_age' => $retirement_age,
            'plan' => $plan,
            'monthlySalary' => $monthlySalary,
            'retirementGOCIMonthlyIncome' => $retirementGOCIMonthlyIncome,
            'returnAssumptions' => $returnAssumptions,
            'netReturnBeforeRetirement' => $netReturnBeforeRetirement,
            'netReturnAfterRetirement' => $netReturnAfterRetirement,
            'totalMonthlyIncome' => $totalMonthlyIncome,
            'graphAge' => $graphAge,
            'valueBegYear' => $valueBegYear,
            'graphValueBegYear' => $graphValueBegYear,
            'graphContribution' => $graphContribution,
            'uncertain_top' => $uncertain_top,
            'uncertain_bottom' => $uncertain_bottom,
            'credits' => trans('lang.thokhor_dot_com'),
        ];

        // dd($data);

        $report = new Report;
        $report->user_id = $user->id;
        $report->report_data = json_encode($data);
        $report->public_id = unique_string('reports','public_id', $length = 40, $numbers = false);

        $report->save();


        // Preparing Email
        $data = array(
                'subject' => 'Thokhor | Financial Report', 
                'body' => 'Report', 
                'view' => 'dashboard.email.report', 
                'public_id' => $report->public_id,
            );


        try{
            Mail::to($user->email)->send(new SendMail($data));
        }catch ( \Exception $exception) {
            // dd($exception->getMessage());
        }

        // return $report->public_id;

        return $this->report($report->public_id);

        
    }

}
