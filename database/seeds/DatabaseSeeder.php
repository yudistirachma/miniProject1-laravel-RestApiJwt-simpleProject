<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            RolesTableSeeder::class,
            RoutesTableSeeder::class,
            UserRoleTableSeeder::class,
            RoleRouteTableSeeder::class,
        ]);

        $customerUsers = factory(App\User::class, 5)->create()->each(function ($user) {
            $user->customer()->save(factory(App\Customer::class)->make());
        });
        $employeeUsers = factory(App\User::class, 5)->create()->each(function ($user) {
            $user->customer()->save(factory(App\Employee::class)->make());
        });
        $products = factory(App\Product::class, 10)->create();
        $suppliers = factory(App\Supplier::class, 10)->create();

    }
}
