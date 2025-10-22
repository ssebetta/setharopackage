<?php

namespace Setharo;

use Illuminate\Support\ServiceProvider;

class SetharoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Merge default config so package works without publishing
        $this->mergeConfigFrom(__DIR__ . '/../config/setharo.php', 'setharo');

        // Allow publishing for users who want to customize
        $this->publishes([
            __DIR__ . '/../config/setharo.php' => config_path('setharo.php'),
        ], 'config');
    }

    /**
     * Register services.
     */
    public function register(): void
    {
        // Bind the main Setharo class as singleton
        $this->app->singleton('setharo', function ($app) {
            return new Setharo(
                $app['config']['setharo.api_url'],
                $app['config']['setharo.api_key']
            );
        });
    }
}
