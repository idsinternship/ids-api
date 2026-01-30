<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class JwtAuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            auth()->setUser($user);
        } catch (JWTException $e) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        return $next($request);
    }
}