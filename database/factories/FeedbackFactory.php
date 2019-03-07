<?php

use Faker\Generator as Faker;

$factory->define(App\Feedback::class, function (Faker $faker) {
    return [
      'message' => $faker->text(),
      'rating' => $faker->numberBetween(0,4),
      'user_id' => $faker->numberBetween(1,100),
    ];
});
