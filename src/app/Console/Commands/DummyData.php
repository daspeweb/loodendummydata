<?php


namespace Looden\Framework\Dummy\Console\Commands;

use Illuminate\Console\Command;


class DummyData extends Command
{
    protected $signature = 'looden:dummy-data';
    public function handle(){
        $seeder = new \CRMSeeder();
        $seeder->run();
    }
}