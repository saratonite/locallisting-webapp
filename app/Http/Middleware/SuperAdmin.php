<?php

namespace App\Http\Middleware;

use Auth;

use Closure;

class SuperAdmin
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
        //dd(Auth::user()->type.'Cool');

        if( Auth::user()->type != "admin" ) {
            return redirect("/login");
        }

        return $next($request);
    }
}
