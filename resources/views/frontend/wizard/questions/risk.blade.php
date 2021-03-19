<style type="text/css">
.fancy-green{position:relative; margin:1px}
.fancy-green span:before {
    content: ' ';
    width: 20px;
    position: absolute;
    {{ $align }}: 12px;
    height: 20px;
    border: 3px solid #2DD782;
    border-radius: 50%;
    top: -1px;
	background:#fff;
	top: 16px;
}
.radio.fancy-green label input[type="radio"]:checked ~ span:before {
    border: 3px solid #2DD782;
}
.radio.fancy-green label input[type="radio"]:checked ~ span:after {
    content: ' ';
    width: 8px;
    height: 8px;
    position: absolute;
    border-radius: 50%;
    {{ $align }}: 18px;
    top: 5px;
    background: #2DD782;
    top: 22px;
    /* z-index: 9; */
}
.fancy-green input{
  opacity: 0;
}
.fancy-green label{
  font-weight: 600;
}
.radio.fancy-green {
    background: #fff;
    padding: 10px;
    border-radius: 7px;
    text-align: {{ $align }};
    border: 3px solid #ffffff;
    padding-{{ $align }}: 2rem;
}

.radio-active {
 	border: 3px solid #2DD782 !important;
}
.questions-bread{
	font-size: 2rem !important;
}
.direction-opposite span {
    font-size: 1.6rem;
}
</style>
<section class="slice py-3 pb-5 " id="net-worth">
	<div class="mt-5">
		<div class="nav-tabs-wrapper mt-5 mobile d-block d-lg-none">
			<ul class="nav nav-tabs d-flex align-items-center">
				<li class="nav-item nav-item-1">
					<a class="text-{{$align}} nav-link"  href="#">
						<span class="step-parent" data-bar="1"></span>
					</a>
				</li>
				<li class="nav-item nav-item-2">
					<a class="text-{{$align}} nav-link"  href="#">
					<span class="step-parent" data-bar="2"></span>
					<span class="step-text">
					<span>
					Data 1
					</span>
					</span>
					</a>
				</li>
				<li class="nav-item nav-item-3">
					<a class="text-{{$align}} nav-link active" data-toggle="tab" href="#">
					<span class="step-parent" data-bar="3"></span>
					<span class="step-text">
					<span>
					صافي الثروة
					</span>
					</span>
					</a>
				</li>
				<li class="nav-item nav-item-4">
					<a class="text-{{$align}} nav-link success" href="{{ route('income', locale()) }}">
					<span class="step-parent" data-bar="4"></span>
					<span class="step-text">
					<span>
					 {{ trans('lang.wizard_q.Annual Income') }}
					</span>
					</span>
					</a>
				</li>
			</ul>
			<div class="horizontal-line">
				<div class="step-parent-bar step-parent-bar-1" ></div>
				<div class="step-parent-bar step-parent-bar-2" ></div>
				<div class="step-parent-bar step-parent-bar-3" ></div>
				<div class="step-parent-bar step-parent-bar-4 success" ></div>
				
		</div>
	</div>
	<div class="container">
		<div class="row row-grid">
			<div class="col-12 col-lg-9 {{-- order-md-1 --}} pr-md-5">
				
				@include('frontend.notifications.ajax-warning')
				
				<form id="qform" action="{{ route('wizard', locale()) }}">
				<input type="hidden" name="location" value="risk">
				<div class="tab-content">

					<div id="ques1" class="container tab-pane active"><br>

	             		@include('frontend.components.breadcrumb' , ['heading' => trans('lang.question_headings.risk'), ]) 
	             		<div class="d-flex direction-opposite">
	             			<span class="text-muted float-right p{{$alignShort}}-3">  10/1</span>
	             			<h3 class="text-dark text-{{$align}}"> {{ trans('lang.question.risk_age') }} </h3>
	             		</div>
						
						@include('frontend.components.risk_questions', [
							'name' => "risks[age]" ,
							'old_value' => $user_questionnaire->risks['risks']['age'] ?? '',
							'data' => [
								trans('lang.question.less_than_31') => 'Less than 31', 
								trans('lang.question.31_40') => '31 – 40',
								trans('lang.question.41_50') => '41 – 50',
								trans('lang.question.51_60') => '51 – 60',
								trans('lang.question.more_than_60') => 'More than 60',

							]])
						<div class="pt-5">
							<button type="button" onclick="next()" class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary with-arrow">
								{{-- <i class="fa fa-arrow-left"></i> --}}
								<span class="d-inline-block">{{ trans('lang.question.next') }}</span>
								<i class="fa fa-arrow-{{$arrowAlign}}"></i>
							</button>
						</div>
					</div>

                    <div id="ques2" class="container tab-pane">
						<br>						
						
						@include('frontend.components.breadcrumb' , ['heading' => trans('lang.question_headings.risk')]) 

						<div class="d-flex direction-opposite">
							<span class="text-muted float-right p{{$alignShort}}-3">  10/2</span>
							<h3 class="text-dark text-{{$align}}"> {{ trans('lang.question.my_total_saving_and_investment_amount') }} </h3>
						</div>
						
						@include('frontend.components.risk_questions', [
							'name' => "risks[total_saving_and_investment_amount]" ,
							'old_value' => $user_questionnaire->risks['risks']['total_saving_and_investment_amount'] ?? '',
							'data' => [
								trans('lang.question.less_than_50%_of_my_annual_income') => 'Less than 50% of my annual income', 
								trans('lang.question.almost_50%_of_my_annual_income') => 'Almost 50% of my annual income', 
								trans('lang.question.equal_to_my_annual_income') => 'Equal to my annual income', 
								trans('lang.question.almost_double_(2x)_of_my_annual_income') => 'Almost double (2x) of my annual income', 
								trans('lang.question.almost_triple_(3x)_of_my_annual_income') => 'Almost triple (3x) of my annual income', 
								trans('lang.question.almost_five_time_(5x)_of_my_annual_income') => 'Almost five time (5x) of my annual income', 
								
							]])
						<div class="pt-5">
							<button type="button" onclick="next()" class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary with-arrow">
								{{-- <i class="fa fa-arrow-left"></i> --}}
								<span class="d-inline-block">{{ trans('lang.question.next') }}</span>
								<i class="fa fa-arrow-{{$arrowAlign}}"></i>
							</button>
						</div>
					</div>

					<div id="ques3" class="container tab-pane fade">

						<br>

						@include('frontend.components.breadcrumb' , ['heading' => trans('lang.question_headings.risk')]) 

						<div class="d-flex direction-opposite">
							<span class="text-muted float-right p{{$alignShort}}-3">  10/3</span>
							<h3 class="text-dark text-{{$align}}"> {{ trans('lang.question.during_the_next_few_years_,_the_likelihood_of_my_annual_income_change_would_be') }} </h3>
						</div>
						
						@include('frontend.components.risk_questions', [
							'name' => "risks[during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be]" ,
							'old_value' => $user_questionnaire->risks['risks']['during_the_next_few_years,_the_likelihood_of_annual_income_change_would_be'] ?? '',
							'data' => [
								trans('lang.question.slightly_decrease') => 'Slightly decrease', 
								trans('lang.question.no_change') => 'No change', 
								trans('lang.question.slightly_increase_than_the_annual_inflation') => 'Slightly increase than the annual inflation', 
								trans('lang.question.remarkable_increase_than_the_annual_inflation') => 'Remarkable increase than the annual inflation', 
								trans('lang.question.unstable_(from_my_investment)') => 'Unstable (from my investment)', 
																
							]])
						<div class="pt-5">
							<button type="button" onclick="next()" class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary with-arrow">
								{{-- <i class="fa fa-arrow-left"></i> --}}
								<span class="d-inline-block">{{ trans('lang.question.next') }}</span>
								<i class="fa fa-arrow-{{$arrowAlign}}"></i>
							</button>
						</div>
					</div>

					<div id="ques4" class="container tab-pane fade">
						
						<br>

						@include('frontend.components.breadcrumb' , ['heading' => trans('lang.question_headings.risk')])

						<div class="d-flex direction-opposite">
							<span class="text-muted float-right p{{$alignShort}}-3">  10/4</span>
							<h3 class="text-dark text-{{$align}}"> {{ trans('lang.question.regarding_my_major_expenses_before_retirement_(including_family_expenses_such_as_education_,_buying_a_house_etc)') }} </h3>
						</div>
						
						@include('frontend.components.risk_questions', [
							'name' => "risks[regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)]" ,
							'old_value' => $user_questionnaire->risks['risks']['regarding_major_expenses_before_retirement_(including_family_expenses_such_as_education,_buying_a_house_etc)'] ?? '',
							'data' => [
							trans('lang.question.i_will_manage_to_cover_all_expenses_from_my_annual_income') => 'I will manage to cover all expenses from my annual income', 
							trans('lang.question.i_might_need_to_withdraw_some_of_my_saving_to_cover_expenses') => 'I might need to withdraw some of my saving to cover expenses', 
							trans('lang.question.i_might_need_to_withdraw_more_than_half_of_my_saving_to_cover_expenses') => 'I might need to withdraw more than half of my saving to cover expenses', 
							trans('lang.question.i_might_need_to_withdraw_all_my_saving_to_cover_expenses_before_retirement') => 'I might need to withdraw all my saving to cover expenses before retirement', 
							trans('lang.question.i_dont_have_expected_expenses') => 'I don’t have expected expenses', 
							
															
						]])
						<div class="pt-5">
							<button type="button" onclick="next()" class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary with-arrow">
								{{-- <i class="fa fa-arrow-left"></i> --}}
								<span class="d-inline-block">{{ trans('lang.question.next') }}</span>
								<i class="fa fa-arrow-{{$arrowAlign}}"></i>
							</button>
						</div>	
					</div>

					<div id="ques5" class="container tab-pane fade">
						
						<br>

						@include('frontend.components.breadcrumb' , ['heading' => trans('lang.question_headings.risk')]) 

						<div class="d-flex direction-opposite">
							<span class="text-muted float-right p{{$alignShort}}-3">  10/5</span>
							<h3 class="text-dark text-{{$align}}"> {{ trans('lang.question.based_on_my_current_lifestyle_and_health_state_,_the_likelihood_of_having_health_issue_during_the_next_10_years') }} </h3>
						</div>
						
						@include('frontend.components.risk_questions', [
							'name' => "risks[based_on_current_lifestyle_and_health_state,_the_likelihood_of_having_health_issue_during_the_next_10_years]" ,
							'old_value' => $user_questionnaire->risks['risks']['based_on_current_lifestyle_and_health_state,_the_likelihood_of_having_health_issue_during_the_next_10_years'] ?? '',
							'data' => [
								trans('lang.question.above_the_average') => 'Above the average', 
								trans('lang.question.average') => 'Average', 
								trans('lang.question.unlikely') => 'Unlikely', 
								trans('lang.question.almost_no') => 'Almost no', 
																							
							]])
						<div class="pt-5">
							<button type="button" onclick="next()" class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary with-arrow">
								{{-- <i class="fa fa-arrow-left"></i> --}}
								<span class="d-inline-block">{{ trans('lang.question.next') }}</span>
								<i class="fa fa-arrow-{{$arrowAlign}}"></i>
							</button>
						</div>
					</div>

					<div id="ques6" class="container tab-pane fade">
						
						<br>

						@include('frontend.components.breadcrumb' , ['heading' => trans('lang.question_headings.risk')]) 

						<div class="d-flex direction-opposite">
							<span class="text-muted float-right p{{$alignShort}}-3">  10/6</span>
							<h3 class="text-dark text-{{$align}}"> {{ trans('lang.question.i_can_say_about_my_investment_experience') }} </h3>
						</div>
						
						@include('frontend.components.risk_questions', [
							'name' => "risks[about_investment_experience]" ,
							'old_value' => $user_questionnaire->risks['risks']['about_investment_experience'] ?? '',
							'data' => [
								trans('lang.question.i_have_no_previous_experience_in_public_equity_markets_nor_mutual_funds') => 'I have no previous experience in public equity Markets nor mutual funds', 
								trans('lang.question.i_have_a_little_knowledge_i_have_invested_a_little_amount_in_the_public_equity_markets_nor_mutual_funds') => 'I have a little knowledge. I have invested a little amount in the public equity Markets nor mutual funds', 
								trans('lang.question.i_have_knowledge_i_have_invested_a_big_amount_in_the_public_equity_markets_nor_mutual_funds') => 'I have knowledge. I have invested a big amount in the public equity Markets nor mutual funds', 
								trans('lang.question.i_have_a_good_knowledge_i_have_invested_in_international_public_equity_markets_and_in_other_investment_tools_and_financial_derivatives') => 'I have a good knowledge. I have invested in international public equity markets and in other investment tools and financial derivatives', 
									
							]])
						<div class="pt-5">
							<button type="button" onclick="next()" class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary with-arrow">
								{{-- <i class="fa fa-arrow-left"></i> --}}
								<span class="d-inline-block">{{ trans('lang.question.next') }}</span>
								<i class="fa fa-arrow-{{$arrowAlign}}"></i>
							</button>
						</div>
					</div>

					<div id="ques7" class="container tab-pane fade">
						
						<br>

						@include('frontend.components.breadcrumb' , ['heading' => trans('lang.question_headings.risk')]) 

						<div class="d-flex direction-opposite">
							<span class="text-muted float-right p{{$alignShort}}-3">  10/7</span>
							<h3 class="text-dark text-{{$align}}"> {{ trans('lang.question.i_expect_to_start_withdrawing_my_saving') }} </h3>
						</div>
						
						@include('frontend.components.risk_questions', [
							'name' => "risks[expect_to_start_withdrawing_saving]" ,
							'old_value' => $user_questionnaire->risks['risks']['expect_to_start_withdrawing_saving'] ?? '',
							'data' => [
								trans('lang.question.less_than_5_years') => 'Less than 5 years', 
								trans('lang.question.5_10_years') => '5 – 10 years', 
								trans('lang.question.10_15_years') => '10 – 15 years', 
								trans('lang.question.more_than_15_years') => 'More than 15 years', 
								trans('lang.question.i_have_no_saving_or_i_have_already_withdrawing_from_it') => 'I have no saving or I have already withdrawing from it', 
								
							]])
						<div class="pt-5">
							<button type="button" onclick="next()" class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary with-arrow">
								{{-- <i class="fa fa-arrow-left"></i> --}}
								<span class="d-inline-block">{{ trans('lang.question.next') }}</span>
								<i class="fa fa-arrow-{{$arrowAlign}}"></i>
							</button>
						</div>
					</div>

					<div id="ques8" class="container tab-pane fade">	
						<br>
						@include('frontend.components.breadcrumb' , ['heading' => trans('lang.question_headings.risk')]) 

						<div class="d-flex direction-opposite">
							<span class="text-muted float-right p{{$alignShort}}-3">  10/8</span>
							<h3 class="text-dark text-{{$align}}"> {{ trans('lang.question.in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)') }} </h3>
						</div>
						
						@include('frontend.components.risk_questions', [
							'name' => "risks[in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)]" ,
							'old_value' => $user_questionnaire->risks['risks']['in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)'] ?? '',
							'data' => [
								trans('lang.question.i_would_sell_all_of_my_investments_to_save_what_have_left') => 'I would sell all of my investments to save what have left',
								trans('lang.question.i_will_sell_part_of_my_investments_so_that_i_can_invest_in_other_lower_risk_tools') => 'I will sell part of my investments so that I can invest in other lower risk tools',
								trans('lang.question.i_would_not_sell_and_wait_to_recover_to_its_original_value') => 'I would not sell and wait to recover to its original value',
								trans('lang.question.investing_more_money_to_reduce_the_cost_of_investments') => 'Investing more money to reduce the cost of investments',
								
							]])
						<div class="pt-5">
							<button type="button" onclick="next()" class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary with-arrow">
								{{-- <i class="fa fa-arrow-left"></i> --}}
								<span class="d-inline-block">{{ trans('lang.question.next') }}</span>
								<i class="fa fa-arrow-{{$arrowAlign}}"></i>
							</button>
						</div>
					</div>

					<div id="ques9" class="container tab-pane fade">
						
						<br>

						@include('frontend.components.breadcrumb' , ['heading' => trans('lang.question_headings.risk')]) 

						<div class="d-flex direction-opposite">
							<span class="text-muted float-right p{{$alignShort}}-3">  10/9</span>
							<h3 class="text-dark text-{{$align}}"> {{ trans('lang.question.in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years') }} </h3>
						</div>
						
						@include('frontend.components.risk_questions', [
							'name' => "risks[in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years]" ,
							'old_value' => $user_questionnaire->risks['risks']['in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years'] ?? '',
							'data' => [
								trans('lang.question.after_10_years,_the_probability_of_best_investment_value_=_500,000_and_the_worst_=_50,000') => 'After 10 years, The probability of best investment value = 500,000 and the worst = 50,000',
								trans('lang.question.after_10_years,_the_probability_of_best_investment_value_=_850,000_and_the_worst_=_20,000') => 'After 10 years, The probability of best investment value = 850,000 and the worst = 20,000',
								trans('lang.question.after_10_years,_the_probability_of_best_investment_value_=_300,000_and_the_worst_=_65,000') => 'After 10 years, The probability of best investment value = 300,000 and the worst = 65,000',
								trans('lang.question.after_10_years,_the_probability_of_best_investment_value_=_150,000_and_the_worst_=_100,000') => 'After 10 years, The probability of best investment value = 150,000 and the worst = 100,000',
															
							]])
						<div class="pt-5">
							<button type="button" onclick="next()" class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary with-arrow">
								{{-- <i class="fa fa-arrow-left"></i> --}}
								<span class="d-inline-block">{{ trans('lang.question.next') }}</span>
								<i class="fa fa-arrow-{{$arrowAlign}}"></i>
							</button>
						</div>
					</div>

					<div id="ques10" class="container tab-pane fade">
						
						<br>

						@include('frontend.components.breadcrumb' , ['heading' => trans('lang.question_headings.risk')]) 

						<div class="d-flex direction-opposite">
							<span class="text-muted float-right p{{$alignShort}}-3">  10/10</span>
							<h3 class="text-dark text-{{$align}}"> {{ trans('lang.question.when_i_buy_a_car_insurance_i_prefer') }} </h3>
						</div>
						
						@include('frontend.components.risk_questions', [
							'name' => "risks[when_i_buy_a_car_insurance_i_prefer]" ,
							'old_value' => $user_questionnaire->risks['risks']['when_i_buy_a_car_insurance_i_prefer'] ?? '',
							'data' => [
								trans('lang.question.insurance_with_the_highest_cover_even_if_it_was_expensive') => 'Insurance with the highest cover even if it was expensive',
								trans('lang.question.insurance_with_a_limited_cover_even_if_it_was_expensive') => 'Insurance with a limited cover even if it was expensive',
								trans('lang.question.pay_a_lower_price_for_a_third_party_one') => 'Pay a lower price for a third party one',
								trans('lang.question.i_prefer_not_buying_a_care_insurance') => 'I prefer not buying a care insurance',
								
							]])
						<div class="pt-5">
							<button type="sumbit" class="btn-rtl btn  btn-big btn-gradient btn-rad35 btn-primary with-arrow">
								{{-- <i class="fa fa-arrow-left"></i> --}}
								<span class="d-inline-block">{{ trans('lang.question.next') }}</span>
								<i class="fa fa-arrow-{{$arrowAlign}}"></i>
							</button>
						</div>
					</div>
				</div>
				</form>
			</div>
			<div class="col-12 col-lg-3 text-center">
				<!-- Desktop -->
				<div class="nav-tabs-wrapper desktop d-none d-lg-block">
					<ul class="nav nav-tabs d-block d-ltr">
						<li class="nav-item">
							<a class="text-{{$alignreverse}} nav-link success redirect" href="#income">
								<span class="step-parent step-parent-1" ></span>
								<span class="step-text">
									<span>
								{{ trans('lang.question_headings.income') }}
									</span>
								</span>
							</a>
						</li>
						
                        <li class="nav-item" data-id="1">
							<a class="text-{{$alignreverse}} nav-link success" href="#net-worth">
								<span class="step-parent" ></span>
								<span class="step-text">
									<span>
								{{ trans('lang.question_headings.net_assets') }}
									</span>
								</span>
							</a>

                        </li>
                            
                        
						<li class="nav-item">
							<a class="text-{{$alignreverse}} nav-link success" href="#gosi">
							<span class="step-parent" ></span>
							<span class="step-text">
							<span>
						{{ trans('lang.question_headings.gosi') }}
							</span>
							</span>
							</a>
						</li>

						<li class="nav-item">
							<a class="text-{{$alignreverse}} nav-link success" href="#investing-plan">
							<span class="step-parent" ></span>
							<span class="step-text">
							<span>
						{{ trans('lang.question_headings.investing_plan') }}
							</span>
							</span>
							</a>
						</li>

							<!-- Sub -->
                        <li class="nav-item">
							<a class="text-{{$alignreverse}} nav-link success" href="#risk">
							<span class="step-parent" ></span>
							<span class="step-text">
							<span>
						{{ trans('lang.question_headings.risk') }}
							</span>
							</span>
							</a>
						</li>

							<!-- Sub -->
                            <li class="nav-item sub-item subitem-1">
                              <a class="text-{{$alignreverse}} nav-link nav-child active" data-toggle="tab" data-parent-id="5" href="#ques1">
                                 <span class="step-parent" ></span>
                                 <span class="step-text">
                                     <span>
										{{ trans('lang.question.no_1') }}
                                     </span>
                                 </span>
                              </a>
                            </li>
                            <li class="nav-item sub-item subitem-1">
                              <a class="text-{{$alignreverse}} nav-link nav-child" data-toggle="tab" data-parent-id="5" href="#ques2">
                                 <span class="step-parent" ></span>
                                 <span class="step-text">
                                     <span>
                                        {{ trans('lang.question.no_2') }}
                                     </span>
                                 </span>
                              </a>
                            </li>
                            <li class="nav-item sub-item subitem-1">
                              <a class="text-{{$alignreverse}} nav-link nav-child" data-toggle="tab" data-parent-id="5" href="#ques3">
                                 <span class="step-parent" ></span>
                                 <span class="step-text">
                                     <span>
										{{ trans('lang.question.no_3') }}
                                     </span>
                                 </span>
                              </a>
                            </li>
                            <li class="nav-item sub-item subitem-1">
                              <a class="text-{{$alignreverse}} nav-link nav-child" data-toggle="tab" data-parent-id="5" href="#ques4">
                                 <span class="step-parent" ></span>
                                 <span class="step-text">
                                     <span>
										{{ trans('lang.question.no_4') }}
                                     </span>
                                 </span>
                              </a>
                            </li>
                            <li class="nav-item sub-item subitem-1">
                              <a class="text-{{$alignreverse}} nav-link nav-child" data-toggle="tab" data-parent-id="5" href="#ques5">
                                 <span class="step-parent" ></span>
                                 <span class="step-text">
                                     <span>
                                        {{ trans('lang.question.no_5') }}
                                     </span>
                                 </span>
                              </a>
                            </li>
                            <li class="nav-item sub-item subitem-1">
                              <a class="text-{{$alignreverse}} nav-link nav-child" data-toggle="tab" data-parent-id="5" href="#ques6">
                                 <span class="step-parent" ></span>
                                 <span class="step-text">
                                     <span>
										{{ trans('lang.question.no_6') }}
                                     </span>
                                 </span>
                              </a>
                            </li>
                            <li class="nav-item sub-item subitem-1">
                              <a class="text-{{$alignreverse}} nav-link nav-child" data-toggle="tab" data-parent-id="5" href="#ques7">
                                 <span class="step-parent" ></span>
                                 <span class="step-text">
                                     <span>
                                        {{ trans('lang.question.no_7') }}
                                     </span>
                                 </span>
                              </a>
                            </li>
                            <li class="nav-item sub-item subitem-1">
                              <a class="text-{{$alignreverse}} nav-link nav-child" data-toggle="tab" data-parent-id="5" href="#ques8">
                                 <span class="step-parent" ></span>
                                 <span class="step-text">
                                     <span>
										{{ trans('lang.question.no_8') }}
                                     </span>
                                 </span>
                              </a>
                            </li>
                            <li class="nav-item sub-item subitem-1">
                              <a class="text-{{$alignreverse}} nav-link nav-child" data-toggle="tab" data-parent-id="5" href="#ques9">
                                 <span class="step-parent" ></span>
                                 <span class="step-text">
                                     <span>
										{{ trans('lang.question.no_9') }}
                                     </span>
                                 </span>
                              </a>
                            </li>
                            <li class="nav-item sub-item subitem-1">
                              <a class="text-{{$alignreverse}} nav-link nav-child" data-toggle="tab" data-parent-id="5" href="#ques10">
                                 <span class="step-parent" ></span>
                                 <span class="step-text">
                                     <span>
										{{ trans('lang.question.no_10') }}
                                     </span>
                                 </span>
                              </a>
                            </li>
                            
                            <!-- Sub -->

						<li class="nav-item">
							<a class="text-{{$alignreverse}} nav-link" href="#consultations">
							<span class="step-parent" ></span>
							<span class="step-text">
							<span>
						{{ trans('lang.question_headings.Counseling session') }}
							</span>
							</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="text-{{$alignreverse}} nav-link" data-toggle="tab" href="#report">
							<span class="step-parent" ></span>
							<span class="step-text">
							<span>
						{{ trans('lang.question_headings.report') }}
							</span>
							</span>
							</a>
						</li>
						
					</ul>
					<div class="vertical-line"></div>
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	window.start_point_bar = 6;
	window.location.hash = '#risk';
	function next(){
		$('a.nav-link.active').parent().next().children().click();
	}

</script>


<script type="text/javascript">
  $('.risk-items input[type=radio]').change(function() {
    $(this).each(function(){
		$('.fancy-green').removeClass('radio-active');
    });
	$(this).parent().parent().addClass('radio-active');
  });   
</script>


@include('frontend.partials.wizard_script')