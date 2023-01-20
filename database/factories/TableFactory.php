<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Table::class, function (Faker $faker) {
    return [
        "name" => "Table" . $faker->buildingNumber,
        "minimum_capacity" => $faker->numberBetween(1,3),
        "maximum_capacity" => $faker->numberBetween(4,8),
        "active" => $faker->boolean,
        "restaurant_id" => function() {
            return \App\Restaurant::all()->random()->id;
        },
        "dining_area_id" => function() {
            return \App\DiningArea::all()->random()->id;
        }
    ];
});
