<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName . ' ' . $faker->randomNumber(3) . ' ' .$faker->randomElement(['ml', 'Kg', 'unit']),
        'sku' => $faker->unique()->randomNumber(8),
        'description' => $faker->paragraph(3),
        'is_active' => $faker->boolean(90),
        'price' => $faker->numberBetween(10000, 100000) + $faker->randomElement([.9,.59,.79,.89,.99]),
    ];
});
