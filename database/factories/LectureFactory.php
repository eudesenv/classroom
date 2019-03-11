<?php

use Faker\Generator as Faker;

$factory->define(App\Lecture::class, function (Faker $faker) {
    return [
        'description' => $faker->streetName,
        'status' => random_int(0,1),
    ];
});
