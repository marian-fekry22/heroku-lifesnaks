<?php

use Illuminate\Database\Seeder;

class ShippingDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shipping_details')->truncate();

        DB::table('shipping_details')->insert([
            [
                'country' => 'country',
                'governorate' => 'governorate',
                'city' => 'city',
                'address' => 'address',
                'building' => 'building',
                'floor' => 'floor',
                'apartment' => 'apartment',
                'mobile' => 'mobile',
                'landline' => 'landline',
                'user_id' => 1,
            ]
        ]);

    }
}
