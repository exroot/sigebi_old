<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class esAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::user() &&  Auth::user()->esAdmin()) {
            return $next($request);
        }

        return redirect('/');
    }
}
