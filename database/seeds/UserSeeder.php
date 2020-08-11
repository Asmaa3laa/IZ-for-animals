<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'user_name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12341234'),
            'role' => 'admin',
        ]);
    }
}
