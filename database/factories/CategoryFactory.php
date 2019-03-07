<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
      'name'       => $faker->word(),
      'img'         => $faker->url(),
      'description'  => $faker->text(),
      'department_id'          => $faker->numberBetween(1,10),
    ];
});
