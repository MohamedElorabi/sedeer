<?php

namespace App\Http\Middleware;

use Closure;

class ClientCheck
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->type == 'client')
            return $next($request);
        else
            return response()->json(['you are not client']);
    }
}
