<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsStudent
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
       if(Auth::guard('teacher')->check())
        {
           return redirect('/teacher/dashboard');
        }
        else if(!Auth::guard($guard)->check())
        {
            return redirect('/');
        }
        return $next($request);
    }
}
