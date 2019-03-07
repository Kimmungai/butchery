<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
      'user_id' => factory(App\User::class)->create()->id,
      'type' => 1,
    ];
});
