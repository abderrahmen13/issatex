<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;
use Config;
use Auth;

class AuthenticateComptable
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
        if(!Auth::check() || Auth::user()->role != "comptable") { 
            return redirect('/');
        } 
        return $next($request);
    }
}
