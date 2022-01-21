<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authorise
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->user()->is_admin) {
            return response('Unauthorized.', 401);
        }

        return $next($request);
    }
}
