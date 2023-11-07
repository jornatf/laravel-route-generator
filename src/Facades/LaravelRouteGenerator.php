<?php

namespace Jornatf\LaravelRouteGenerator\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Jornatf\LaravelRouteGenerator\LaravelRouteGenerator
 */
class LaravelRouteGenerator extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Jornatf\LaravelRouteGenerator\LaravelRouteGenerator::class;
    }
}
