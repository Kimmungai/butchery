<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
      'name' => $faker->word(),
      'sku'  => $faker->word(),
      'img1'  => $faker->url(),
      'img2'  => $faker->url(),
      'img3'  => $faker->url(),
      'img4'  => $faker->url(),
      'img5'  => $faker->url(),
      'createdBy'  => $faker->numberBetween(1,30),
      'type'  => $faker->numberBetween(0,10),
      'virtualProduct'  => $faker->numberBetween(0,1),
      'price'  => $faker->numberBetween(1.00,1000000.00),
      'salePrice'  => $faker->numberBetween(1.00,1000000.00),
      'regularPrice'  => $faker->numberBetween(1.00,1000000.00),
      'description'  => $faker->text(),
      'excerpt'  => $faker->text(),
      'supermarket_id' => $faker->numberBetween(1,10),
      'category_id' => $faker->numberBetween(1,10),
      'variation_id' => $faker->numberBetween(1,10),
      'inventory_id' => $faker->numberBetween(1,10),
    ];
});
