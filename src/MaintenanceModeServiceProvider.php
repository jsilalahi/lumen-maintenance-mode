<?php

namespace DynEd\Lumen\MaintenanceMode;

use Illuminate\Support\ServiceProvider;
use DynEd\Lumen\MaintenanceMode\Console\UpCommand;
use DynEd\Lumen\MaintenanceMode\Console\DownCommand;
use DynEd\Lumen\MaintenanceMode\Http\Middleware\MaintenanceModeMiddleware;

class MaintenanceModeServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the provider
     */
    public function register()
    {
        $this->app->middleware([
            MaintenanceModeMiddleware::class,
        ]);

        $this->app->singleton('command.up', function () {
            return new UpCommand();
        });

        $this->app->singleton('command.down', function () {
            return new DownCommand();
        });

        $this->commands(['command.up', 'command.down']);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['command.up', 'command.down'];
    }

}