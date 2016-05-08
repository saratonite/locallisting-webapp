<?php

namespace App\Http\Middleware;

use Closure;


class RedirectByType
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
        //dd($request->user()->type);
        


        $intendedRedirect = $request->session()->get('url.intended');

       

        $response = $next($request);

        //echo session('url.intended');


        // Perform action
         if($request->user()){

            if($request->user()->type != "admin"){

                if($intendedRedirect){

                    $request->session()->forget('url.intended');

                    return redirect($intendedRedirect);
                }

                return redirect()->route("account::appHome");
            }

            return redirect()->route("admin::dashboard");

        }
        


        return $response;
    }
}
