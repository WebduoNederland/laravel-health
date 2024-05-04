<?php

namespace WebduoNederland\LaravelHealth\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LaravelHealthAuthenticationMiddleware
{
    public function handle(Request $request, Closure $next): JsonResponse|Closure
    {
        if (is_null($request->bearerToken())) {
            return response()->json([
                'success' => false,
                'message' => __('No bearer token supplied!'),
            ], 401);
        }

        if ($request->bearerToken() !== config('laravel-health.api_key')) {
            return response()->json([
                'success' => false,
                'message' => __('Invalid bearer token!'),
            ], 401);
        }

        return $next($request);
    }
}
