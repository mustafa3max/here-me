<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        User::insert([
            'id' => Str::uuid(),
            'name' => 'max',
            'email' =>  'max@max.com',
            'password' => Hash::make('m1@M'),
        ]);
        for ($i = 1; $i < 3; $i++) {
            User::insert([
                'id' => Str::uuid(),
                'name' => 'user ' . $i,
                'email' =>  'user' . $i . '@max.com',
                'password' => Hash::make('m1@M'),
            ]);
        }
    }
}
