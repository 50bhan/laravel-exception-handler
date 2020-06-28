<?php

namespace Sharifi\Exceptions\Tests;

use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Sharifi\Exceptions\ServiceProvider;

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
