# :wrench: Lumen Maintenance Mode

![GitHub release](https://img.shields.io/github/release/jsilalahi/lumen-maintenance-mode.svg?style=flat-square)

In Laravel framework, maintenance mode provided out of the box. Unfortunately, this feature not available in Lumen framework. 

This library will bring back maintenance mode command for Lumen framework with customize JSON response.

## Installation
Require this package with composer. It is recommended to only require the package for development.

```
composer require dyned/lumen-maintenance-mode
```

And then register the Maintenance Mode in Lumen Service Provider `bootstrap/app.php` file:

```php
$app->register(DynEd\Lumen\MaintenanceMode\MaintenanceModeServiceProvider::class);
```

## Usage
To enable maintenance mode, execute the `down` Artisan command:

```
php artisan down
```

When maintenance mode enabled, the maintenance response returned for each routes called.

You may also provide `message` and `retry` options to the `down` command. The `message` value may be used to display message in JSON response, while the `retry` value will used for retry in seconds before the application is available again:

```
php artisan down --message="Upgrading Database" --retry=60
```

To disable maintenance mode, use the `up` command:

```
php artisan up
```

## TODO
* Creating config for JSON response