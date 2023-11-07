# Laravel Route Generator

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jornatf/laravel-route-generator.svg?style=flat-square)](https://packagist.org/packages/jornatf/laravel-route-generator)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/jornatf/laravel-route-generator/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/jornatf/laravel-route-generator/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jornatf/laravel-route-generator/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/jornatf/laravel-route-generator/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/jornatf/laravel-route-generator.svg?style=flat-square)](https://packagist.org/packages/jornatf/laravel-route-generator)

**A Laravel package to auto-generate routes from static blade view.**

You can use this package to generated simple page that does not require processing in a controller.

> #### If you like this package you can [Buy me a Coffee](https://www.buymeacoffee.com/jornatf) ☕️

## Installation

You can install the package via composer:

```bash
composer require jornatf/laravel-route-generator
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-route-generator-config"
```

This is the contents of the published config file:

```php
return [
        
    /*
    |--------------------------------------------------------------------------
    | View base path
    |--------------------------------------------------------------------------
    |
    | Specify here the folder containing the blade views for the routes. This
    | base will not be in the URL.
    |
    */

    'view_base_path' => 'static',

    /*
    |--------------------------------------------------------------------------
    | URL prefix
    |--------------------------------------------------------------------------
    |
    | Here you can specify a URL prefix. By default the value is null.
    |
    */

    'url_prefix' => null,

    /*
    |--------------------------------------------------------------------------
    | Midlewares
    |--------------------------------------------------------------------------
    |
    | You can specify the middlewares that should be used for all automatically
    | generated URLs.
    |
    */

    'middlewares' => [],
];
```

## Usage

To start and depending on the configurations, you must create in `resources\views`, the folder with the same name as the value of `view_base_path` (default: `static`).

Then you'll have:
```
resources/
├─ views/
│  ├─ static/
│  │  ├─ about.blade.php
│  │  ├─ contact.blade.php
```

Here the routes will be generated:

| Method | URL | Route name |
|---|---|---|
| GET | /about | static.about |
| GET | /contact | static.contact |

You can then check the generation of the routes with the Artisan command:
```
php artisan generated-route:list
```

### Prefix

You can add prefix to your route group in the config file, like this:
```php
'url_prefix' => 'my_prefix',
```

### Middlewares

You can add middlewares to your route group in the config file, like this:
```php
'middlewares' => ['auth:sanctum'],
```

## Testing

```bash
composer test
```

## Changelog

> Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

> Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

> Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Jordan Nataf](https://github.com/jornatf)
- [All Contributors](../../contributors)

## License

> The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
