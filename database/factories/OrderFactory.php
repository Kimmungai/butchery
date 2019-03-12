<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
      'customer_id' => $faker->numberBetween(1,10),
      'state' => $faker->numberBetween(0,1),
      'description'  => $faker->text(),
      'type' => $faker->numberBetween(0,10),
      'packagedBy'  => $faker->numberBetween(1,30),
      'collectAt'  => $faker->numberBetween(1,5),
      'collectOn'  => $faker->dateTime(),
      'releasedBy'  => $faker->numberBetween(1,30),
    ];
});
