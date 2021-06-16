<?php

namespace Encore\Admin\Config;

use Encore\Admin\Admin;
use Encore\Admin\Extension;
use Illuminate\Support\Facades\Cache;

class Config extends Extension
{
    /**
     * Load configure into laravel from database.
     *
     * @return void
     */
    public static function load()
    {
        $configs = Cache::remember('admin_config', 86400, function () {
            return ConfigModel::all(['name', 'value']);
        });
        foreach ($configs as $config) {
            config([$config['name'] => $config['value']]);
        }
    }

    /**
     * Bootstrap this package.
     *
     * @return void
     */
    public static function boot()
    {
        static::registerRoutes();

        Admin::extend('config', __CLASS__);
    }

    /**
     * Register routes for laravel-admin.
     *
     * @return void
     */
    protected static function registerRoutes()
    {
        parent::routes(function ($router) {
            /* @var \Illuminate\Routing\Router $router */
            $router->resource(
                config('admin.extensions.config.name', 'config'),
                config('admin.extensions.config.controller', 'Encore\Admin\Config\ConfigController')
            );
        });
    }

    /**
     * {@inheritdoc}
     */
    public static function import()
    {
        parent::createMenu('Config', 'config', 'fa-toggle-on');

        parent::createPermission('Admin Config', 'ext.config', 'config*');
    }
}
