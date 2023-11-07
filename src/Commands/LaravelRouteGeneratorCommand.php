<?php

namespace Jornatf\LaravelRouteGenerator\Commands;

use Illuminate\Console\Command;

class LaravelRouteGeneratorCommand extends Command
{
    public $signature = 'generated-route:list';

    public $description = 'Get all auto-generated routes list.';

    public function handle()
    {
        $this->call('route:list', [
            '--path' => config('route-generator.url_prefix'),
            '--name' => config('route-generator.view_base_path'),
        ]);
    }
}
