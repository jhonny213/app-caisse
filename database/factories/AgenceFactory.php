<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'wilaya' => $faker->city,
        'adresse' => $faker->streetAddress,
        'tel' => $faker->phoneNumber,
        'caisse' => $faker->randomFloat(2, 10, 200),
        'banque' => $faker->randomFloat(2, 10, 200),
    ];
});
