<?php

use Faker\Generator as Faker;

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
    return [
        'name' => $faker->userName(),
        'firstName' => $faker->firstName(),
        'middleName' => $faker->word(),
        'lastName' => $faker->lastName(),
        'email' => $faker->unique()->safeEmail,
        'phoneNumber' => $faker->phoneNumber(),
        'address' => $faker->address(),
        'avatar' => $faker->url(),
        'idNo' => $faker->randomNumber(),
        'idImage' => $faker->url(),
        'passport' => $faker->randomNumber(),
        'passportImage' => $faker->url(),
        'gender' => $faker->numberBetween(1,2),
        'DOB' => $faker->dateTime(),
        'supermarket_id'=>$faker->numberBetween(1,10),
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
