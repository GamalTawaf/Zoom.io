<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class GeneralTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$password = Hash::make('secret');
        // add user
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => $password,
        ]);

        // add about us
        DB::table('aboutus')->insert([
            'text' => 'admin'
        ]);

        // add about us
        DB::table('testimonials')->insert([
            'title' => 'test',
            'text' => 'admin',
            'reference' => 'admin',
        ]);


    }
}
