<?php

namespace WebduoNederland\LaravelHealth\Http\Controllers;

use Illuminate\Http\JsonResponse;

class PingController
{
    public function __invoke(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'OK',
        ]);
    }
}
