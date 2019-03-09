<?php

use Faker\Generator as Faker;

$factory->define(App\UserSupermarkets::class, function (Faker $faker) {
    return [
      'user_id'           => $faker->numberBetween(1,30),
      'supermarket_id'    => $faker->numberBetween(1,10)
    ];
});
