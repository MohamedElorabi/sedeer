<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckApiAuth
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
        if (Auth::check()){

            if( Auth::user()->type == 'super_visor'){
                return $next($request);
            }else{
                return redirect('404');
            }
        }

        return redirect('404');
    }
}
