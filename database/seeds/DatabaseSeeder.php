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
        $this->call(UsersTableSeeder::class);
        $this->call(ShippingDetailsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(ImageProductTableSeeder::class);
        $this->call(OrderStatusesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PaymentMethodsTableSeeder::class);
    }
}
