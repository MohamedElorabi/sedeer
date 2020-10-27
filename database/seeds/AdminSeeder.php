<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = \App\User::create([
          'name' => 'Mohamed Elorabi',
          'email' => 'elorabi199@gmail.com',
          'password'  => bcrypt('123456'),
          'type'  => 'admin',
      ]);



    }
}
