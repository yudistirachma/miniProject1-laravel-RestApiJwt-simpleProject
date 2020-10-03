<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'fullname' => null, //$faker->name,
        'gender' => $faker->boolean(50),
        'bod' => $faker->dateTimeBetween('-50 years', '-20 years'),
        'join_date' => $faker->dateTimeBetween('-10 years', 'now'),
        'job_title' => $faker->randomElement(['Cashier', 'Warehouse'])
    ];
});
