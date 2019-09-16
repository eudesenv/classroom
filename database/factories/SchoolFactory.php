<?php

use Faker\Generator as Faker;

$factory->define(App\School::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'phone' => $faker->phoneNumber,
        'address' => $faker->streetName . ', ' . $faker->buildingNumber,
        'zipcode' => $faker->postcode,
        'city' => $faker->city  
    ];
});
