<?php

namespace Database\Seeders;

use App\Models\Interest;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        $id = Str::uuid();
        User::insert([
            'id' => $id,
            'name' => 'max',
            'email' =>  'max@max.com',
            'password' => Hash::make('m1@M'),
            'avatar' => 'storage/users/'.$id.'/images/avatar.png',
            'interests'=> Interest::inRandomOrder()->limit(rand(1, 3))->pluck('id'),
            'ready'=> false,
        ]);
        for ($i = 1; $i < 50; $i++) {
            $id = Str::uuid();
            User::insert([
                'id' => $id,
                'name' => 'user ' . $i,
                'email' =>  'user' . $i . '@max.com',
                'password' => Hash::make('m1@M'),
                'avatar' => 'storage/users/'.$id.'/images/avatar.png',
                'interests'=> Interest::inRandomOrder()->limit(rand(1, 3))->pluck('id'),
                'ready'=> false,
            ]);
        }
    }
}
