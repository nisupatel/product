<?php

namespace App\Http\Middleware;

use Closure, Session;

class AuthMiddleware
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
        if(Session::has('project')){
            return $next($request);
        }
        return redirect()->route('home')->withErrors(['token_error' => 'Sorry, your session seems to have expired. Please try again.']);
    }
}
