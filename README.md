laravel-admin-ext/config
========================

[![Packagist](https://img.shields.io/packagist/l/laravel-admin-ext/config.svg?maxAge=2592000)](https://packagist.org/packages/laravel-admin-ext/config)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel-admin-ext/config.svg?style=flat-square)](https://packagist.org/packages/laravel-admin-ext/config)

Inspired by https://github.com/laravel-backpack/settings.

## Screenshot

![wx20170810-100226](https://user-images.githubusercontent.com/1479100/29151322-0879681a-7db3-11e7-8005-03310686c884.png)

## Installation

```
$ composer require laravel-admin-ext/config

$ php artisan migrate
```

Open `app/Providers/AppServiceProvider.php`, and call the `Config::load()` method within the `boot` method:

```php
<?php

namespace App\Providers;

use Encore\Admin\Config\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Config::load();
    }
}
```

Then run: 

```
$ php artisan admin:import config
```

Open `http://your-host/admin/config`

## Usage

After add config in the panel, use `config($key)` to get value you configured.

License
------------
Licensed under [The MIT License (MIT)](LICENSE).
