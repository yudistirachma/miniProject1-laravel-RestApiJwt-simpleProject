<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RoutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('routes')->insert([
            [ 'name_route' => 'api/role'],
            [ 'name_route' => 'api/route'],
            [ 'name_route' => 'api/userRole'],
            [ 'name_route' => 'api/roleRoute'],
            [ 'name_route' => 'api/product'],

            [ 'name_route' => 'api/sell'],
            [ 'name_route' => 'api/order'],
            [ 'name_route' => 'api/supplier'],
            [ 'name_route' => 'api/customer'],
            [ 'name_route' => 'api/employee'],

        ]);
    }
}
