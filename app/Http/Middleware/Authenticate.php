<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Authenticate extends Middleware
{

    public function handle($request, Closure $next, ...$guards)
    {
        if ( !Auth::guard('teacher')->check() && !Auth::guard('student')->check()) {
            return redirect('/');
        }
        return $next($request);
    }

}
