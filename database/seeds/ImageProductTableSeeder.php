<?php

use Illuminate\Database\Seeder;

class ImageProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('image_product')->truncate();

        DB::table('image_product')->insert([
            [
                'product_id' => 1,
                'image_id' => 1,
                'order' => 1,
            ],[
                'product_id' => 1,
                'image_id' => 2,
                'order' => 2,
            ],[
                'product_id' => 2,
                'image_id' => 3,
                'order' => 1,
            ],[
                'product_id' => 2,
                'image_id' => 4,
                'order' => 2,
            ],[
                'product_id' => 3,
                'image_id' => 5,
                'order' => 1,
            ],[
                'product_id' => 3,
                'image_id' => 6,
                'order' => 2,
            ],[
                'product_id' => 4,
                'image_id' => 7,
                'order' => 1,
            ],[
                'product_id' => 4,
                'image_id' => 8,
                'order' => 2,
            ],[
                'product_id' => 5,
                'image_id' => 9,
                'order' => 1,
            ],[
                'product_id' => 5,
                'image_id' => 10,
                'order' => 2,
            ],[
                'product_id' => 6,
                'image_id' => 11,
                'order' => 1,
            ],[
                'product_id' => 6,
                'image_id' => 12,
                'order' => 2,
            ],[
                'product_id' => 7,
                'image_id' => 13,
                'order' => 1,
            ],[
                'product_id' => 7,
                'image_id' => 14,
                'order' => 2,
            ],[
                'product_id' => 8,
                'image_id' => 15,
                'order' => 1,
            ],[
                'product_id' => 8,
                'image_id' => 16,
                'order' => 2,
            ],[
                'product_id' => 9,
                'image_id' => 17,
                'order' => 1,
            ],[
                'product_id' => 9,
                'image_id' => 18,
                'order' => 2,
            ],[
                'product_id' => 10,
                'image_id' => 19,
                'order' => 1,
            ],[
                'product_id' => 10,
                'image_id' => 20,
                'order' => 2,
            ],[
                'product_id' => 11,
                'image_id' => 21,
                'order' => 1,
            ],[
                'product_id' => 11,
                'image_id' => 22,
                'order' => 2,
            ],[
                'product_id' => 12,
                'image_id' => 23,
                'order' => 1,
            ],[
                'product_id' => 12,
                'image_id' => 24,
                'order' => 2,
            ],[
                'product_id' => 13,
                'image_id' => 25,
                'order' => 1,
            ],[
                'product_id' => 13,
                'image_id' => 26,
                'order' => 2,
            ],[
                'product_id' => 14,
                'image_id' => 27,
                'order' => 1,
            ],[
                'product_id' => 14,
                'image_id' => 28,
                'order' => 2,
            ],[
                'product_id' => 15,
                'image_id' => 29,
                'order' => 1,
            ],[
                'product_id' => 15,
                'image_id' => 30,
                'order' => 2,
            ],
        ]);
    }
}
