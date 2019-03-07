<?php

use Faker\Generator as Faker;

$factory->define(App\Inventory::class, function (Faker $faker) {
    return [
      'state'         =>$faker->numberBetween(0,50),
      'quantity'       => $faker->numberBetween(1,10000000),
      'product_id'       => $faker->numberBetween(1,10),
    ];
});
