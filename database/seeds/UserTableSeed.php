<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'remember_token' => str_random(60),
        ]);
    }
}
