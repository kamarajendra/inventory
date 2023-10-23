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
               'name' => 'Kamarajendra',
               'email' => 'jendra@gmail.com',
               'role' => 'guest',
               'password' => bcrypt('12345')
            ],
            [
               'name' => 'Jsven',
               'email' => 'jsven@gmail.com',
               'role' => 'staff',
               'password' => bcrypt('12345')
            ],
            [
               'name' => 'Juan',
               'email' => 'juan@gmail.com',
               'role' => 'admin',
               'password' => bcrypt('12345')
            ],
        ];
        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
