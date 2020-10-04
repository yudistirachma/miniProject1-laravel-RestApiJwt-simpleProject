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
        $route_name = \Str::before(\Route::current()->uri, '/{');
        $user = \Auth::user();

        if ($user->cek_route($route_name)) {
            return $next($request);
        }

        return response(["message" => "You are Forbidden."], 403);
    }
}
