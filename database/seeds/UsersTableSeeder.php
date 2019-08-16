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
        App\User::create([
            'name' =>'Ajith',
            'email' =>'ajith@gmail.com',
            'password'=>bcrypt('password')
        ]);
    }
}
