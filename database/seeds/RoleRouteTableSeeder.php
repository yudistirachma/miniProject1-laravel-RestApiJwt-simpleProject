<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RoleRouteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_routes')->insert(
            [
            'role_id' => '1',
            'route_id' => '1',
            ],
            [
            'role_id' => '1',
            'route_id' => '2',
            ],
            [
            'role_id' => '1',
            'route_id' => '3',
            ],           
            [
            'role_id' => '1',
            'route_id' => '4',
            ],           
            [
            'role_id' => '2',
            'route_id' => '3',
            ],           
            [
            'role_id' => '2',
            'route_id' => '4',
            ],           
            [
            'role_id' => '3',
            'route_id' => '4',
            ],           
        );
    }
}
