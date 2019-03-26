<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

require_once __DIR__ . '/../faker_data/document_number.php';

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    $cpfs = cpfs();

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt(123456), // secret
        'cpf' => $cpfs[array_rand($cpfs, 1)],
        'remember_token' => Str::random(10),
    ];
});

$factory->state(\App\User::class, 'admin', function($faker){
    return [
        'role' => \App\User::ROLE_ADMIN
    ];
});

$factory->state(\App\User::class, 'user', function($faker){
    return [
        'role' => \App\User::ROLE_USER
    ];
});
