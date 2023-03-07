<?php

namespace Northplay\NorthplayApi;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Northplay\NorthplayApi\Commands\NorthplayApiCommand;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Cache;


class NorthplayApiServiceProvider extends PackageServiceProvider
{    
    /**
     * configurePackage
     *
     * @param  mixed $package
     * @return void
     */
    public function configurePackage(Package $package): void
    {

        $package
            ->name('northplay-api')
            ->hasConfigFile()
            ->hasRoutes(['api', 'web'])
            ->hasViews('northplay')
            ->hasMigrations(['create_datalogger', 'create_mp_groups', 'create_mp_rooms'])
            ->hasCommand(NorthplayApiCommand::class);

            $this->loadMiddlewares();
    }

    /**
     * loadMiddlewares 
     * Add any middlewares to be loaded
     *
     * @return void
     */
    public function loadApiResponses() {
        Response::macro('errorApi', function ($value, $code) {
            return Response::json(array('data' => $value, 'status' => 'error', 'code' => $code), $code);
        });
        Response::macro('successApi', function ($value, $code) {
            return Response::json(array('data' => $value, 'status' => 'success', 'code' => $code), $code);
        });
    }


    /**
     * loadMiddlewares 
     * Add any middlewares to be loaded
     *
     * @return void
     */
    public function loadMiddlewares() {
        $kernel = app(\Illuminate\Contracts\Http\Kernel::class);
        $kernel->pushMiddleware(\Northplay\NorthplayApi\Middleware\GateKeeper::class);
    }
}
