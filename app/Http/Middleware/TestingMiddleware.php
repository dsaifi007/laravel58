<?php

namespace App\Http\Middleware;

use Closure;

class TestingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$extra=null)
    {
         print_r($extra);die;
        //dd($request->all());
        return $next($request);
    }
}
