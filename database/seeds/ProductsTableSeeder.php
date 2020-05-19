<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();

        DB::table('products')->insert([
            [
                'id' => 1,
                'name' => 'AC almond cranberry',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 1,
                'price' => 30,
            ],[
                'id' => 3,
                'name' => 'AC coconut',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 1,
                'price' => 30,
            ],[
                'id' => 5,
                'name' => 'CA pumpkinseeds',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 1,
                'price' => 30,
            ],[
                'id' => 7,
                'name' => 'coconut',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 2,
                'price' => 30,
            ],[
                'id' => 8,
                'name' => 'cranberry',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 2,
                'price' => 30,
            ],[
                'id' => 9,
                'name' => 'pumpkinseed',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 2,
                'price' => 30,
            ],[
                'id' => 10,
                'name' => 'DC almond',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 3,
                'price' => 30,
            ],[
                'id' => 12,
                'name' => 'DC almond cranberry',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 3,
                'price' => 30,
            ],[
                'id' => 14,
                'name' => 'DC peppermint',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 3,
                'price' => 30,
            ],        ]);
    }
}
