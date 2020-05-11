<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'Nut Clusters',
            ],[
                'id' => 2,
                'name' => 'Nut Bars',
            ],[
                'id' => 3,
                'name' => 'Chocolate Barks',
            ],
        ]);
    }
}
