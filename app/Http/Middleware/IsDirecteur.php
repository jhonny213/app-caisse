<?php

namespace Caisse\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class IsDirecteur
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
        if (Auth::user() &&  Auth::user()->groupe == "Directeur") {
            return $next($request);
        }
        return redirect('/');
    }
}
