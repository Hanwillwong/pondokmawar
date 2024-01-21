<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isOwnerAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        if(!auth()->check() || auth()->user()->user_type !== 'owner' && auth()->user()->user_type !== 'admin'){
            abort(403);
        }
        return $next($request);
    }
}
