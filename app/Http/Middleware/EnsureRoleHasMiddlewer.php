<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureRoleHasMiddlewer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user()->role!= $role){
            return Response()->json([
                'message' => 'Role ada tidak dapat mengakses fitur ini',
                'data' => null
            ],401);
        }
        return $next($request);
    }
}
