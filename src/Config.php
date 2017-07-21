<?php

namespace Encore\Admin\Config;

use Encore\Admin\Auth\Database\Menu;
use Encore\Admin\Auth\Database\Permission;
use Encore\Admin\Extension;
use Illuminate\Support\Facades\Route;

class Config extends Extension
{
    /**
     * Bootstrap this package.
     *
     * @return void
     */
    public static function boot()
    {
        static::registerRoutes();

        static::loadConfig();
    }

    /**
     * Register routes for laravel-admin.
     *
     * @return void
     */
    protected static function registerRoutes()
    {
        /* @var \Illuminate\Routing\Router $router */
        Route::group(['prefix' => config('admin.route.prefix')], function ($router) {

            $attributes = array_merge([
                'middleware' => config('admin.route.middleware'),
            ], static::config('route', []));

            Route::group($attributes, function ($router) {

                /* @var \Illuminate\Routing\Router $router */
                $router->resource('config', 'Encore\Admin\Config\ConfigController');
            });

        });
    }

    protected static function loadConfig()
    {
        foreach (ConfigModel::all(['name', 'value']) as $config) {
            config([$config['name'] => $config['value']]);
        }
    }

    public static function import()
    {
        $lastOrder = Menu::max('order');

        // Add a menu.
        Menu::create([
            'parent_id' => 0,
            'order'     => $lastOrder + 1,
            'title'     => 'Config',
            'icon'      => 'fa-toggle-on',
            'uri'       => 'config',
        ]);

        // Add a permission.
        Permission::create([
            'name'          => 'Admin Config',
            'slug'          => 'ext.config',
            'http_path'     => admin_base_path('config*'),
        ]);
    }
}