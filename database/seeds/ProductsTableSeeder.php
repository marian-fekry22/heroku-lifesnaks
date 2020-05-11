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
                'name' => 'AC almond cranberry 200g',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 1,
                'price' => 30,
            ],[
                'id' => 2,
                'name' => 'AC almond cranberry 40g',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 1,
                'price' => 30,
            ],[
                'id' => 3,
                'name' => 'AC coconut 200g',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 1,
                'price' => 30,
            ],[
                'id' => 4,
                'name' => 'AC coconut 40g',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 1,
                'price' => 30,
            ],[
                'id' => 5,
                'name' => 'CA pumpkinseeds 200g',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 1,
                'price' => 30,
            ],[
                'id' => 6,
                'name' => 'CA pumpkinseeds 40g',
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
                'name' => 'DC almond 150g',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 3,
                'price' => 30,
            ],[
                'id' => 11,
                'name' => 'DC almond 35g',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 3,
                'price' => 30,
            ],[
                'id' => 12,
                'name' => 'DC almond cranberry 150g',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 3,
                'price' => 30,
            ],[
                'id' => 13,
                'name' => 'DC almond cranberry 35g',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 3,
                'price' => 30,
            ],[
                'id' => 14,
                'name' => 'DC peppermint 150g',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 3,
                'price' => 30,
            ],[
                'id' => 15,
                'name' => 'DC peppermint 35g',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Arcu cursus vitae congue mauris rhoncus aenean. Nec ullamcorper sit amet risus nullam eget.',
                'category_id' => 3,
                'price' => 30,
            ],        ]);
    }
}
