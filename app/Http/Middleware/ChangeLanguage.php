<?php

namespace App\Http\Middleware;

use Closure;
use App;

class ChangeLanguage
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
        $langFromCookie = 'en';
        App::setLocale($langFromCookie);
        return $next($request);
    }
}
