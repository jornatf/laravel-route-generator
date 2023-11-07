<?php

namespace Jornatf\LaravelRouteGenerator\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Jornatf\LaravelRouteGenerator\LaravelRouteGeneratorServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Jornatf\\LaravelRouteGenerator\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelRouteGeneratorServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-route-generator_table.php.stub';
        $migration->up();
        */
    }
}
