<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if(!auth()->check() || !auth()->user()->is_admin) {
            abort(401);
        }
        
        return $next($request);
    }
}
