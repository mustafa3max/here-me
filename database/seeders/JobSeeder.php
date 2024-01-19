<?php

namespace Database\Seeders;

use App\Models\Channel;
use App\Models\Job;
use App\Models\Program;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        foreach (User::get() as $user) {
            Job::create([
                'id' => Str::uuid(),
                'user_id' => $user->id,
                'title' => 'Title Job 1',
                'description' => 'Description Job Job Job Job 1',
                'enabled' => true,
                'quality_score' => random_int(0, 200),
            ],);
        }
    }
}
