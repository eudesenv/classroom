<?php

use Faker\Generator as Faker;

$factory->define(App\Classe::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->streetName,
        'start_date' => date('Y-m-d h:i:s'),
        'end_date' => date('Y-m-d h:i:s'),
        'school_id' => 1,
    ];
});
