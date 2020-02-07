<?php

use Faker\Generator as Faker;

$factory->define(App\Student::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'birth_date' => $faker->date(),
        'id_card' => $faker->numerify("###########"),
        'occupation' => $faker->word,
        'user_id' => factory(App\User::class, 1)->create()->first()->id,
    ];
});
