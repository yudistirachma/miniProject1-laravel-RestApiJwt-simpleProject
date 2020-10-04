<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
            'name_role' => 'superAdmin',
            ],
            [
            'name_role' => 'manager',
            ],
            [
            'name_role' => 'karyawan',
            ],
        ]);
    }
}
