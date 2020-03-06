<?php

use Faker\Generator as Faker;

$factory->define(App\Note::class, function (Faker $faker) {
    return [
        'note' => $faker->randomFloat(2, 0, 10),
    ];
});
