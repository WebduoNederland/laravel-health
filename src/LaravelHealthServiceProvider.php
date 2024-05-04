<?php

namespace WebduoNederland\LaravelHealth;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class LaravelHealthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this
            ->bootConfig()
            ->bootCommands();
    }

    protected function bootConfig(): static
    {
        $this->publishes([
            __DIR__.'/../config/laravel-health.php' => config_path('laravel-health.php'),
        ], 'config');

        return $this;
    }

    protected function bootCommands(): static
    {
        // if ($this->app->runningInConsole()) {
        //     $this->commands([
        //         SendMonitorDataCommand::class,
        //     ]);
        // }

        return $this;
    }

    public function register(): void
    {
        $this
            ->registerConfig()
            ->registerRoutes();
    }

    protected function registerConfig(): static
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-health.php', 'laravel-health');

        return $this;
    }

    protected function registerRoutes(): static
    {
        Route::prefix(config('laravel-health.route_prefix'))
            ->middleware(config('laravel-health.route_middleware'))
            ->group(function (): void {
                $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
            });

        return $this;
    }
}
