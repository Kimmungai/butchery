<?php

use Faker\Generator as Faker;

$factory->define(App\Department::class, function (Faker $faker) {
    return [
      'name' => $faker->word(),
      'supermarket_id' => $faker->numberBetween(1,10),
      'type' => 1,
    ];
});
