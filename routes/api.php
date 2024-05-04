<?php

use Illuminate\Support\Facades\Route;
use WebduoNederland\LaravelHealth\Http\Controllers\HealthController;
use WebduoNederland\LaravelHealth\Http\Controllers\MetaController;
use WebduoNederland\LaravelHealth\Http\Controllers\PingController;

Route::get('', HealthController::class);
Route::get('meta', MetaController::class);
Route::get('ping', PingController::class);
