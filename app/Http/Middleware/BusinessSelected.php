<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Helpers\BusinessContext;

class BusinessSelected
{
    public function handle(Request $request, Closure $next)
    {
            if (!BusinessContext::get()) {
            return redirect('/business/select');
        }

        return $next($request);
    }
}