<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    $name = $faker->name;
    $company = $faker->randomElement(['CV', 'PT']);

    return [
        'name' => "$company $name",
        'pic_name' => $name,
        'pic_phone' => $faker->unique()->regexify('^08[0-9]{8,11}$')
    ];
});
