<?php

use Illuminate\Database\Seeder;

class PaymentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->truncate();

        DB::table('payment_methods')->insert([
            [
                'id' => 1,
                'name' => 'Cash on delivery',
            ],[
                'id' => 2,
                'name' => 'Accept',
            ],
        ]);

    }
}
