<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class UserAuth
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

        if(!Auth::check()){


            // Save the url

            $request->session()->put('url.intended',$request->fullUrl());
        }


        return $next($request);
    }
}
