<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                "name" => "afy",
                "email" => "afy@gmail.com",
                "password" => bcrypt("123456"),
                "level" => "pemilih",
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
