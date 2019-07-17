<?php

namespace App\Http\Middleware;

use Closure;

class MiddlewareParameter
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
        echo $extra."www " . $request->parm;die;
        return $next($request);
    }
}
