<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Auth;

class Lang
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

        $locale = Auth::user()->lang;
        App::setLocale($locale);

        return $next($request);
    }
}
