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
            [ 'name_role' => 'SUPERUSER' ],
            [ 'name_role' => 'MANAGER' ],
            [ 'name_role' => 'CASHIER' ],
            [ 'name_role' => 'WAREHOUSE' ],
            [ 'name_role' => 'CUSTOMER' ],
        ]);
    }
}
