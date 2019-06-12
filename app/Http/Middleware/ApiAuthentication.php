<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ApiAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = null)
    {
        //echo $guard;die;
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } 
            return response()->json(['status'=>false,'message'=>'Unauthenticated','error'=>403]);
        }
        return $next($request);
    }
}
