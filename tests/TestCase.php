<?php

namespace WebduoNederland\LaravelHealth\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use WebduoNederland\LaravelHealth\LaravelHealthServiceProvider;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            LaravelHealthServiceProvider::class,
        ];
    }
}
