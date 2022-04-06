<?php

//namespace Database\Seeders;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Seeder;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
			'id'    => '12322',
            'name'    => 'ABHAY SINGH',
            'email'    => 'abhaysingh@gmail.com',
			'image' 	=> 'user6-128x128.jpg',
            'password'   =>  Hash::make('Abhay@123'),
        ]);
    }
}
