<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => 'Customer',
            ],[
                'id' => 2,
                'name' => 'Admin',
            ],
        ]);

    }
}
