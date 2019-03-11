<?php

use Faker\Generator as Faker;

$factory->define(App\Room::class, function (Faker $faker) {
    return [
        'description' => $faker->streetName,
        'availiable' => random_int(0,1),
    ];
});
