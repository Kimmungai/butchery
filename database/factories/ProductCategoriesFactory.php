<?php

use Faker\Generator as Faker;

$factory->define(App\ProductCategories::class, function (Faker $faker) {
    return [
      'product_id'       => $faker->numberBetween(1,10),
      'category_id'         =>$faker->numberBetween(1,8),
    ];
});
