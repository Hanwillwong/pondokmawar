<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class urlapi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (strpos($request->url(), '/api/') !== false) {
            return back()->with('error', 'Anda tidak diizinkan mengakses URL API langsung.');
        }
        return $next($request);
    }
}
