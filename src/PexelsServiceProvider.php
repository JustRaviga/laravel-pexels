<?php

namespace DeDmytro\Pexels;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

final class PexelsServiceProvider extends BaseServiceProvider
{
    /**
     * Boot publishable resources
     */
    public function boot(): void
    {
        $this->bootPublishes();
    }

    /**
     * Register package resources
     */
    public function register(): void
    {
        $this->registerConfig();
        $this->registerFacade();
    }

    /**
     * Boot publishable resources
     */
    protected function bootPublishes(): void
    {
        $this->publishes([
            __DIR__.'/../config/pexels.php' => $this->app->configPath('pexels.php'),
        ], 'config');
    }

    /**
     * Register related config
     */
    protected function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/pexels.php', 'pexels');
    }

    /**
     * Register related facade
     */
    protected function registerFacade(): void
    {
        $this->app->bind('pexels', function ($app) {
            return new Pexels();
        });
    }
}
