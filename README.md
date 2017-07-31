laravel-admin-ext/config
========================

[![StyleCI](https://styleci.io/repos/97664136/shield?branch=master)](https://styleci.io/repos/97664136)
[![Packagist](https://img.shields.io/packagist/l/laravel-admin-ext/config.svg?maxAge=2592000)](https://packagist.org/packages/laravel-admin-ext/config)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel-admin-ext/config.svg?style=flat-square)](https://packagist.org/packages/laravel-admin-ext/config)



Inspired by https://github.com/laravel-backpack/settings.

## Installation

```
$ composer require laravel-admin-ext/config

$ php artisan migrate
```

Open `app/Providers/AppServiceProvider.php`, and call the `Config::boot` method within the `boot` method:

```php
<?php

namespace App\Providers;

use Encore\Admin\Config\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Config::boot();
    }
}
```

then run: 

```
$ php artisan admin:import config
```

Open `http://your-host/admin/config`

## Usage

After add config in the panel, use `config($key)` to get value you configured.

License
------------
Licensed under [The MIT License (MIT)](LICENSE).
