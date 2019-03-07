<?php

use Faker\Generator as Faker;

$factory->define(App\Payment::class, function (Faker $faker) {
    return [
      'amountDue' => $faker->numberBetween(1.00,1000000.00),
      'amountReceived' => $faker->numberBetween(1.00,1000000.00),
      'discountPercentage' => $faker->numberBetween(1,100),
      'amountPayable' => $faker->numberBetween(1.00,1000000.00),
      'method' => $faker->word(),
      'methodTransactionId' => $faker->word(),
      'receiptNo'  => $faker->word(),
    ];
});
