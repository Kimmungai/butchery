<?php

use Faker\Generator as Faker;

$factory->define(App\Variation::class, function (Faker $faker) {
    return [
      'height'         =>$faker->numberBetween(1,1000.00),
      'width'       => $faker->numberBetween(1,100.00),
      'color'       => $faker->word(),
      'size'       => $faker->word(),
      'product_id'       => $faker->numberBetween(1,100),
    ];
});
