# Lumen Maintenance Mode

:wrench: Maintenance mode command for Lumen with JSON response.

## Installation
Require this package with composer. It is recommended to only require the package for development.

`composer require dyned/lumen-maintenance-mode`

And then register the Maintenance Mode in Lumen Service Provider `bootstrap/app.php` file:

`$app->register(DynEd\Lumen\MaintenanceMode\MaintenanceModeServiceProvider::class);`

## Usage
To enable maintenance mode, execute the `down` Artisan command:

`php artisan down`

You may also provide `message` and `retry` options to the `down` command. The `message` value may be used to display message in JSON response, while the `retry` value will used for retry in secords:

`php artisan down --message="Upgrading Database" --retry=60`

To disable maintenance mode, use the `up` command:

`php artisan up`

## TODO
* Creating config for JSON response