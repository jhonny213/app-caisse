<?php

namespace Caisse\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class IsGestionnaire
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
        if (Auth::user() &&  Auth::user()->groupe == "Gestionnaire") {
            return $next($request);
        }
        return redirect('/');
    }
}
