<div class="row">
    <div class="col-lg-1 col-md-3 col-sm-4 col-6 mw-100">
        <a class="nav-link setting_icons" href="{{ route('site_management', app()->getLocale()) }}">
            <img src="{{ asset('backend_assets/admin_dashboard/images/dashboard_icons6.png') }}"><p class="setting_text">{{ trans('lang.admin.site_settings') }}</p>
        </a>
    </div>
    <div class="col-lg-1 col-md-3 col-sm-4 col-6 mw-100">
        <a class="nav-link setting_icons" href="{{ route('user', [app()->getLocale(), 'general']) }}">
            <img src="{{ asset('backend_assets/admin_dashboard/images/dashboard_icons5.png') }}"><p class="setting_text" >{{ trans('lang.admin.user') }}</p>
        </a>
    </div>
    <div class="col-lg-1 col-md-3 col-sm-4 col-6 mw-100">
        <a class="nav-link setting_icons" href="{{ route('constants', app()->getLocale()) }}">
            <img src="{{ asset('backend_assets/admin_dashboard/images/dashboard_icons4.png') }}"><p class="setting_text" >{{ trans('lang.admin.questionnaire_settings') }}</p>
        </a>

    </div>
    <div class="col-lg-1 col-md-3 col-sm-4 col-6 mw-100">
        <a class="nav-link setting_icons" href="{{ route('logs', app()->getLocale()) }}">
            <img src="{{ asset('backend_assets/admin_dashboard/images/dashboard_icons3.png') }}"><p class="setting_text" >{{ trans('lang.admin.change_log') }}</p>
        </a>
    </div>
    <div class="col-lg-1 col-md-3 col-sm-4 col-6 mw-100">
        <a class="nav-link setting_icons" href="{{ route('site_management', app()->getLocale()) }}">
            <img src="{{ asset('backend_assets/admin_dashboard/images/dashboard_icons2.png') }}"><p class="setting_text" >{{ trans('lang.support') }}</p>
        </a>
    </div>
    <div class="col-lg-1 col-md-3 col-sm-4 col-6 mw-100">
        <a class="nav-link setting_icons" href="{{ route('user', [app()->getLocale(), 'staff']) }}">
            <img src="{{ asset('backend_assets/admin_dashboard/images/dashboard_icons1.png') }}"><p class="setting_text" >{{ trans('lang.admin.staff') }}</p>
        </a>
    </div>
    <div class="col-lg-1 col-md-3 col-sm-4 col-6 mw-100">
        <a class="nav-link setting_icons" href="{{ route('plans_coupons', app()->getLocale()) }}">
            <img src="{{ asset('backend_assets/admin_dashboard/images/dashboard_icons7.png') }}"><p class="setting_text" >{{ trans('lang.Plans and Coupons') }}</p>
        </a>
    </div>
    <div class="col-lg-1 col-md-3 col-sm-4 col-6 mw-100">
        <a class="nav-link setting_icons" href="{{ route('counseling', app()->getLocale()) }}">
            <img src="{{ asset('backend_assets/admin_dashboard/images/dashboard_icons8.png') }}"><p class="setting_text" >{{ trans('lang.counseling') }}</p>
        </a>
    </div>
</div>