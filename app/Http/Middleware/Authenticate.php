<?php

namespace ITOportunidades\Http\Middleware;

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
				
				$segment1 = $request->segment(1);
				
				if ($segment1 == 'admin') {
					return redirect()->guest('/admin/login');
				} else {
					return redirect()->guest('/my-account#login');
				}
                
            }
        }

        return $next($request);
    }
}
