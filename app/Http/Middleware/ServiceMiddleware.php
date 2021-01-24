<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Flash;

class ServiceMiddleware
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
         if (Auth::user()->service_id < 3) {
             Flash::warning('Access not allowed');
            return back();
        }
        else
        {
            return $next($request);
        }
    }
}
