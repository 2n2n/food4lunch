<?php

use Illuminate\Database\Seeder;

class seedSuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([
            'name' => 'Super Admin',
            'email' =>'super@admin.com',
            'password' => bcrypt('asdf1234*'),
            'role' => 2
        ]);
    }
}
