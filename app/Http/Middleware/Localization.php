<?php

namespace App\Http\Middleware;

use Closure;

class Localization
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
        $locale = $request->header('Accept-Language');
        
        if ($locale == 'eng') {
            config('app.locale');
        }else{
            config(['app.locale' => 'spn']);
        }
        echo config('app.locale');die;
        return $next($request);
    }
}
