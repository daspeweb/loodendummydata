<?php

namespace Looden\Framework\Dummy;

use Illuminate\Support\ServiceProvider;
use Looden\Framework\Dummy\Console\Commands\DummyData;

class LoodenDummyDataFrameworkServiceProvider extends ServiceProvider {

    protected $commands = [
        DummyData::class,
    ];
    public function boot()
    {
        $this->publishes([__DIR__ . '/publish/database/migrations/' => database_path('migrations')], 'looden-dummy-migrations');
        $this->publishes([__DIR__ . '/publish/database/factories/' => database_path('factories')], 'looden-dummy-factories');
        $this->publishes([__DIR__ . '/publish/database/seeds/' => database_path('seeds')], 'looden-dummy-seeds');

        $this->publishes([__DIR__.'/publish/app/' => app_path('/')], 'looden-dummy-models');
    }
    public function register()
    {
        $this->commands($this->commands);
    }
}