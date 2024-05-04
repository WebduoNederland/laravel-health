<?php

return [
    'api_key' => env('LARAVEL_HEALTH_API_KEY'),

    'route_prefix' => 'api/health',

    'route_middleware' => [
        WebduoNederland\LaravelHealth\Http\Middleware\LaravelHealthAuthenticationMiddleware::class,
    ],
];
