<?php

namespace DynEd\Lumen\MaintenanceMode\Http\Middleware;

use Closure;
use Illuminate\Contracts\Foundation\Application;

class MaintenanceModeMiddleware {

    /**
     * The application implementation.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

     /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Handle incoming requests.
     *
     * @param Request $request
     * @param \Closure $next
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @throws \InvalidArgumentException
     */
    public function handle($request, Closure $next)
    {
        if($this->isDownForMaintenance()) {
            $data = json_decode(
                file_get_contents($this->app->storagePath().'/framework/down'), true
            );

            return response()->json($data, 503);
        }

        return $next($request);
    }

    /**
     * Determine if the application is currently down for maintenance.
     *
     * @return bool
     */
    private function isDownForMaintenance()
    {
        return file_exists(
            $this->app->storagePath().'/framework/down'
        );
    }
}