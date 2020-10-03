<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
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
        // dd(\Route::current()->uri);
        $route_name = \Route::current()->uri;

        $user = \Auth::user();

        if ($user->cek_route($route_name)) {
            return $next($request);
        }

        return "this age can't you access";
    }
}
