<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        $align=$request->segment(1) == 'ar' ? 'right' : 'left';
        $alignShort=$request->segment(1) == 'ar' ? 'l' : 'r';
        $arrowAlign=$request->segment(1) == 'ar' ? 'left' : 'right';
        $textAlign=$request->segment(1) == 'ar' ? 'text-right' : '';
        $textAlignMd=$request->segment(1) == 'ar' ? 'text-md-right' : '';
        $btnAlign=$request->segment(1) == 'ar' ? 'btn-rtl' : 'btn-ltr';

        View::share(['align'=>$align,'alignShort'=>$alignShort,'arrowAlign'=>$arrowAlign,'textAlign'=>$textAlign,'textAlignMd'=>$textAlignMd,'btnAlign'=>$btnAlign]);
    }
}
