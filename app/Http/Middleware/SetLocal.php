<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // will be put inside web middlewares to be applied to all routes in application
        if(Session()->has('locale'))
        {
            app()->setLocale(Session()->get('locale'));
        }
        return $next($request);
    }
}
