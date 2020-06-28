<?php

namespace Sharifi\Exceptions;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot(): void
    {
        $this->registerPublishing();
    }

    /**
     * Register any package services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom($this->getConfig(), 'exception_handler');

        $this->registerBindings();
    }

    /**
     * Register the package's publishable resources.
     */
    protected function registerPublishing(): void
    {
        $this->publishes([$this->getConfig() => config_path('exception_handler.php')], 'config');
    }

    /**
     * Register any package bindings.
     */
    protected function registerBindings(): void
    {
        //...
    }

    /**
     * Get the config file path.
     */
    protected function getConfig(): string
    {
        return __DIR__ . '/../config/config.php';
    }
}
