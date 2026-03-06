<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BusinessSelected
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('business_id')) {
            return redirect()->route('business.select');
        }

        return $next($request);
    }
}