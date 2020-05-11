<?php

namespace App\Http\Middleware;

use Closure;

class CheckForAdminRole
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
        $authUser = auth()->user();
        if ($authUser->isAdmin()) {
            return $next($request);
        }
        abort('404');
    }
}
