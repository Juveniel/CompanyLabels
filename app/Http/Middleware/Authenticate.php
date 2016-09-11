<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                $requesturi = $request->getRequestUri();

                if(strpos($requesturi, 'company') !== false){
                    return redirect()->guest('/login');
                }
                else if(strpos($requesturi, 'admin') !== false) {
                    return redirect()->guest('/admin');
                }
                else{
                    return redirect()->guest('/');
                }
            }
        }

        return $next($request);
    }
}
