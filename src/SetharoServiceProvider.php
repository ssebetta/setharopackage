<?php

namespace Setharo;

use Illuminate\Support\ServiceProvider;

class SetharoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/setharo.php', 'setharo');

        $this->app->singleton(Setharo::class, function ($app) {
            return new Setharo(config('setharo.api_url'), config('setharo.api_key'));
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/setharo.php' => config_path('setharo.php'),
        ], 'config');
    }
}
