<?php

namespace Sharifi\ExceptionHandler\Tests;

use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Sharifi\ExceptionHandler\ServiceProvider;

class TestCase extends BaseTestCase
{
    /**
     * @param Application $app
     */
    protected function getPackageProviders($app): array
    {
        return [ServiceProvider::class];
    }
}
