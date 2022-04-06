<?php

//namespace Database\Seeders;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       Eloquent::unguard();
       $this->call(UsersTablesSeeder::class);
    }
}
