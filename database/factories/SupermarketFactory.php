<?php

use Faker\Generator as Faker;

  $factory->define(App\Supermarket::class, function (Faker $faker) {
      return [
          'name' => $faker->name,
          'tagline' => $faker->sentence(),
          'website' => $faker->url(),
          'emailAddress' => $faker->safeEmail(),
          'phoneNumber' => $faker->phoneNumber(),
          'address' => $faker->address(),
          'logo' => $faker->sentence(),
          'branch' => $faker->sentence(),
          'branchCode' => $faker->sentence(),
          'description' => $faker->text(),
      ];
  });
