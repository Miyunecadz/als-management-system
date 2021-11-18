<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AllowedRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$role)
    {
        $authUser = auth()->user()->role;

        $isAllowed = in_array($authUser, $role);

        if(!$isAllowed){
            abort(403, 'Your account type is not allowed to access this url!');
        }

        return $next($request);
    }
}
