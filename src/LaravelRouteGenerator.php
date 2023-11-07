<?php

namespace Jornatf\LaravelRouteGenerator;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class LaravelRouteGenerator
{
    /**
     * Class initialization.
     */
    public function __construct()
    {
        $this->initConfigs();
    }

    /**
     * Loads routes with prefix, middlewares if configured.
     */
    public function loadRoutes(): void
    {
        Route::prefix($this->urlPrefix)
            ->middleware($this->middlewares)
            ->group(function () {
                $this->generateRoutes();
            });
    }

    /**
     * Init class with configurations.
     */
    protected function initConfigs(): void
    {
        $configs = config('route-generator');

        foreach ($configs as $key => $value) {
            $this->{Str::camel($key)} = data_get($configs, $key);
        }
    }

    /**
     * Generates all routes from blade views.
     */
    protected function generateRoutes(): void
    {
        $pathViews = glob(resource_path("views/$this->viewBasePath/*.blade.php"));

        foreach ($pathViews as $pathView) {
            $this->createRouteFromView($pathView);
        }
    }

    /**
     * Create a route from a view.
     */
    protected function createRouteFromView(string $pathView): void
    {
        $name = $this->viewName($pathView);

        $viewName = $routeName = "$this->viewBasePath.$name";

        Route::get($name, function () use ($viewName) {
            return view($viewName);
        })->name($routeName);
    }

    /**
     * Use the blade view path to create a route name.
     */
    protected function viewName(string $pathView): string
    {
        $filename = pathinfo($pathView, PATHINFO_FILENAME);

        return Str::beforeLast($filename, '.blade');
    }
}
