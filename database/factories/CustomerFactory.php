<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'fullname' => null, //$faker->name,
        'bod' => $faker->dateTimeBetween('-60 years', '-20 years'),
        'gender' => $faker->boolean(50)
    ];
});
