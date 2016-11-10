<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \App\User::create([
            'name' => 'Super Admin',
            'email' =>'super@admin.com',
            'password' => 'asdf1234*',
            'role' => 2
        ]);

    }
}
