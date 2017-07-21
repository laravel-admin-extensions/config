laravel-admin-config
====================

[![StyleCI](https://styleci.io/repos/97664136/shield?branch=master)](https://styleci.io/repos/97664136)
[![Packagist](https://img.shields.io/packagist/l/encore/laravel-admin-config.svg?maxAge=2592000)](https://packagist.org/packages/encore/laravel-admin-config)
[![Total Downloads](https://img.shields.io/packagist/dt/encore/laravel-admin-config.svg?style=flat-square)](https://packagist.org/packages/encore/laravel-admin-config)

[Demo](http://120.26.143.106/admin/config) use `username/password:admin/admin`

Inspired by https://github.com/laravel-backpack/settings.

## Installation

```
$ composer require encore/laravel-admin-config

$ php artisan migrate

$ php artisan admin:import encore/laravel-admin-config
```

Open `http://your-host/admin/config`

## Usage

After add config in the panel, use `config($key)` to get value you configured.

License
------------
Licensed under [The MIT License (MIT)](LICENSE).
