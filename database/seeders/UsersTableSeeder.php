<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $users = [
            ['name' => 'Rafi', 'email' => 'rafi@gmail.com', 'password' => '123456'],
            ['name' => 'karim', 'email' => 'karim@gmail.com', 'password' => '123456'],
            ['name' => 'sabina', 'email' => 'sabina@gmail.com', 'password' => '123456'],
        ];
        User::insert($users);
    }
}
