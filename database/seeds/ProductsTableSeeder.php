<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('products')->delete();

        \DB::table('products')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'AC almond cranberry',
                'short_name' => 'Cranberry',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 1,
                'price' => '30.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 3,
                'name' => 'AC coconut',
                'short_name' => 'Coconut',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 1,
                'price' => '30.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'id' => 5,
                'name' => 'CA pumpkinseeds',
                'short_name' => 'Pumpkin Seed',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 1,
                'price' => '30.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 =>
            array (
                'id' => 7,
                'name' => 'coconut',
                'short_name' => 'Coconut',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 2,
                'price' => '30.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 =>
            array (
                'id' => 8,
                'name' => 'cranberry',
                'short_name' => 'Cranberry',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 2,
                'price' => '30.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 =>
            array (
                'id' => 9,
                'name' => 'pumpkinseed',
                'short_name' => 'Pumpkin Seed',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 2,
                'price' => '30.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 =>
            array (
                'id' => 10,
                'name' => 'DC almond',
                'short_name' => 'Almond',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 3,
                'price' => '30.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 =>
            array (
                'id' => 12,
                'name' => 'DC almond cranberry',
                'short_name' => 'Cranberry',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 3,
                'price' => '30.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 =>
            array (
                'id' => 14,
                'name' => 'DC peppermint',
                'short_name' => 'Mint',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 3,
                'price' => '30.00',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));


    }
}
