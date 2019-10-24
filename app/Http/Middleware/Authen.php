<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authen
{
    public function handle($request, Closure $next, $guard = 'web')
    {
        if (!Auth::guard($guard)->check())
        {
            return redirect()->Route('/');
        }
        return $next($request);
    }
}
