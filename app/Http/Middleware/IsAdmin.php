<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

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
        if ($guard == "teacher" && Auth::guard($guard)->check() &&  Auth::guard($guard)->role=='admin' ) {
            return $next($request);
        }
        else{
            return redirect('/');
        }
    }
}
