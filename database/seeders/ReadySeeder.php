<?php

namespace Database\Seeders;

use App\Models\Ready;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ReadySeeder extends Seeder
{
    public function run(): void
    {
        foreach (User::get() as $user) {
            Ready::create([
                'id' => Str::uuid(),
                'user_id' => $user->id,
                'title' => 'Title Ready 1',
                'description' => 'Description Ready Ready Ready Ready 1',
                'enabled' => true,
                'quality_score' => random_int(0, 200),
            ],);
        }
    }
}
