<?php

namespace WebduoNederland\LaravelHealth\Http\Controllers;

use Illuminate\Http\JsonResponse;

class MetaController
{
    public function __invoke(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'OK',
            'data' => [
                'app_name' => config('app.name'),
                'laravel_version' => app()->version(),
                'php_version' => phpversion(),
                'environment' => app()->environment(),
                'debug_enabled' => app()->hasDebugModeEnabled(),
                'queue_driver' => config('queue.default'),
                'timezone' => config('app.timezone'),
            ],
        ]);
    }
}
