<?php

use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {
    return [
      'user_id' => factory(App\User::class)->create()->id,
      'jobId'         => $faker->word(),
      'departmentId'  => $faker->word(),
    ];
});
