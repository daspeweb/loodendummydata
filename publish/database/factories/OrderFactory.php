<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'stage_name' => $faker->randomElement(['Negotiation', 'Proposal', 'Closed/Lost', 'Closed/Win']),
        'close_date' => $faker->dateTimeThisDecade('now'),
    ];
});
