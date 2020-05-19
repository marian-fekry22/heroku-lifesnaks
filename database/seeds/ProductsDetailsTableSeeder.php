<?php

use Illuminate\Database\Seeder;

class ProductsDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products_details')->delete();
        
        \DB::table('products_details')->insert(array (
            0 => 
            array (
                'id' => 1,
                'product_id' => 1,
                'size' => '200g',
                'price' => '40.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'product_id' => 1,
                'size' => '40g',
                'price' => '20.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'product_id' => 3,
                'size' => '200g',
                'price' => '40.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'product_id' => 3,
                'size' => '40g',
                'price' => '20.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'product_id' => 5,
                'size' => '200g',
                'price' => '40.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'product_id' => 5,
                'size' => '40g',
                'price' => '20.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'product_id' => 7,
                'size' => '10g',
                'price' => '10.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'product_id' => 8,
                'size' => '10g',
                'price' => '10.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'product_id' => 9,
                'size' => '15g',
                'price' => '10.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'product_id' => 10,
                'size' => '150g',
                'price' => '110.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'product_id' => 10,
                'size' => '35g',
                'price' => '30.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'product_id' => 12,
                'size' => '150g',
                'price' => '40.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'product_id' => 12,
                'size' => '35g',
                'price' => '20.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'product_id' => 14,
                'size' => '150g',
                'price' => '110.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'product_id' => 14,
                'size' => '35g',
                'price' => '30.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}