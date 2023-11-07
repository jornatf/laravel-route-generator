<?php

namespace Jornatf\LaravelRouteGenerator;

use Facades\Jornatf\LaravelRouteGenerator\LaravelRouteGenerator;
use Jornatf\LaravelRouteGenerator\Commands\LaravelRouteGeneratorCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelRouteGeneratorServiceProvider extends PackageServiceProvider
{
    public function boot()
    {
        LaravelRouteGenerator::loadRoutes();

        if ($this->app->runningInConsole()) {
            $this->commands([
                LaravelRouteGeneratorCommand::class,
            ]);
        }
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-route-generator')
            ->hasConfigFile()
            ->hasCommand(LaravelRouteGeneratorCommand::class);
    }
}
