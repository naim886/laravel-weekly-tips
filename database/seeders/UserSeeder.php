<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name'     => 'Naim',
                'email'    => 'naim@gmail.com',
                'password' => Hash::make('12345678'),
                'balance'  => 500
            ],
            [
                'name'     => 'Ashfak',
                'email'    => 'ashfak@gmail.com',
                'password' => Hash::make('12345678'),
                'balance'  => 200
            ]
        ];

        foreach ($users as $user){
            User::query()->create($user);
        }
    }
}
