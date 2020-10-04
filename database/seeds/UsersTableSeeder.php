<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
            'name' => 'superAdmin',
            'phone' => '083890591466',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            ],
            [
            'name' => 'manager',
            'phone' => '083890591467',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            ],
            [
            'name' => 'karyawan',
            'phone' => '083890591468',
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            ]
        );
    }
}
