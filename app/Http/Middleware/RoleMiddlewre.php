<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Helpers\BusinessContext;

class RoleMiddlewre
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles )
    {
        $userRole = BusinessContext::role();
            if (!in_array($userRole, $roles)){
                abort(403, 'Unauthorized');
            }

            return $next($request);
    }
}
