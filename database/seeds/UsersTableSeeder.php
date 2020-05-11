<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@'. strtolower(config('app.name_abbr')) .'.com',
                'role_id' => 2,
                'password' => bcrypt('123456'),
            ]
        ]);

    }
}
