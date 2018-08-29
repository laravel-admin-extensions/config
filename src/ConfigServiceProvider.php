<?php

namespace Encore\Admin\Config;

use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

            $this->publishes([__DIR__.'/../resources/lang' => resource_path('lang')], 'laravel-admin-ext-config-lang');
        }

        Config::boot();
    }
}
