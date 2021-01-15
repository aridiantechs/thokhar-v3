<?php

namespace App\Http\Middleware;

use Closure;

class SubscribedCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()){
            if(auth()->user()->subscribed->transac_id)
                return $next($request);
                
        }
        return redirect()->route('plan', locale());
    }
}
