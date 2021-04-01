<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class CustomValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('max_custom', function ($attribute, $value, $parameters, $validator) {
            if ($value > $parameters)
               return true;
            else
          return false;
        });

        Validator::replacer('max_custom', function($message, $attribute, $rule, $parameters) {
            return str_replace($message, "The string you provided is not a palindrome! Try again", $message);
        });
    }
}
