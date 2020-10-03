<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $name = str_replace('.', '', $faker->text(20));

    return [
        'name' => $name,
        'slug' => \Str::slug($name),
        'price' => $faker->numberBetween(5000, 200000),
        'stock' => $faker->numberBetween(0, 200),
    ];
});
