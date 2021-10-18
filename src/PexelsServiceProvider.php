<?php

namespace DeDmytro\Pexels;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

final class PexelsServiceProvider extends BaseServiceProvider
{
    public function boot(): void
    {
        $this->bootPublishes();
    }

    public function register(): void
    {
        $this->registerConfig();
    }

    protected function bootPublishes(): void
    {
        $this->publishes([
            __DIR__.'/../config/pexels.php' => $this->app->configPath('pexels.php'),
        ], 'config');
    }

    protected function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/pexels.php', 'pexels');
    }
}
