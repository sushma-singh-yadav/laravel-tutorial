<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class WebSecurity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->role != 'admin'){
            return response()->json(); //data
           // echo 'Contact your admin for your permission';
           // die();
        }
        echo "Middleware is protecting your site";
        return $next($request);
    }
}
