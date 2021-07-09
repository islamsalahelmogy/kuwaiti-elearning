<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "teacher" && Auth::guard($guard)->check() &&  Auth::guard($guard)->user()->role=='admin' ) {
            return $next($request);
        }
        else{
            return redirect('/');
        }
    }
}
