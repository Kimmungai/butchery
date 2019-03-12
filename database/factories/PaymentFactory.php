<?php

use Faker\Generator as Faker;

$factory->define(App\Payment::class, function (Faker $faker) {
    return [
      'amountDue' => $faker->numberBetween(1.00,1000000.00),
      'amountReceived' => $faker->numberBetween(1.00,1000000.00),
      'discountPercentage' => $faker->numberBetween(1,100),
      'amountPayable' => $faker->numberBetween(1.00,1000000.00),
      'method' => $faker->word(),
      'methodCheckoutId' => $faker->word(),
      'order_id' => $faker->numberBetween(1,50),
      'receiptNo'  => $faker->word(),
    ];
});
