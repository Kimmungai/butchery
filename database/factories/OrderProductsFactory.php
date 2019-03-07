<?php

use Faker\Generator as Faker;

$factory->define(App\OrderProducts::class, function (Faker $faker) {
    return [
      'order_id' => $faker->numberBetween(1,500),
      'product_id' => $faker->numberBetween(1,100),
    ];
});
