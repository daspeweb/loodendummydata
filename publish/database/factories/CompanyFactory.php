<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'doc' => $faker->lexify('????-???-???'),
        'phone' => $faker->numerify('+55 ## # #### ####'),
        'website' => $faker->domainName,
        'email' => $faker->freeEmail,
        'street' => $faker->streetName,
        'number' => $faker->numerify('#####'),
        'complement' => $faker->secondaryAddress,
        'neighbourhood' => $faker->name,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'country' => $faker->countryCode,
    ];
});
