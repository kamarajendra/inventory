<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Sabitha',
                'email' => 'sabitha@gmail.com',
                'role' => 'guest',
                'password' => bcrypt('12345')
            ],
            [
                'name' => 'Faizal',
                'email' => 'faizal@gmail.com',
                'role' => 'staff',
                'password' => bcrypt('12345')
            ],
            [
                'name' => 'Kamarajendra',
                'email' => 'kamarajendra@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('12345')
            ],
        ];
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}