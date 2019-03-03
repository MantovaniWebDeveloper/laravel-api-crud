<?php

namespace App\Http\Middleware;

use Closure;

class APIautenticazione
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
        dd('sono middleware dario');
        return $next($request);
    }
}
