<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{

    public function handle($request, Closure $next)
    {
        $roles = $this->getRequiredRoleForRoute($request->route());
        if ($request->user()->hasRole($roles) || !$roles)
        {
        return $next($request);                
        }
        return redirect('/noPermission');
    }

    private function getRequiredRoleForRoute($route)
    {
        $action = $route->getAction();
        return isset($action['roles']) ? $action['roles'] : null; 
    }
}
