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
       

        $response = $next($request);

        // Perform action
         if($request->user()){

            if($request->user()->type != "admin"){
                
                return redirect()->route("account::appHome");
            }

            return redirect()->route("admin::dashboard");

        }
        


        return $response;

        //dd("ddd");
    }
}
