<?php

use Illuminate\Database\Seeder;

class OrderStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_statuses')->truncate();

        DB::table('order_statuses')->insert([
            [
                'id' => 1,
                'name' => 'New',
            ],[
                'id' => 2,
                'name' => 'Delivery',
            ],[
                'id' => 3,
                'name' => 'Finished',
            ],[
                'id' => 4,
                'name' => 'Disposed',
            ],
            [
                'id' => 5,
                'name' => 'Waiting For Payment',
            ],
        ]);

    }
}
