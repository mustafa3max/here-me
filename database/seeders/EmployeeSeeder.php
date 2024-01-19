<?php

namespace Database\Seeders;

use App\Models\Channel;
use App\Models\Employee;
use App\Models\Program;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        foreach (User::get() as $user) {
            Employee::create([
                'id' => Str::uuid(),
                'user_id' => $user->id,
                'title' => 'Title Employee 1',
                'description' => 'Description Employee Employee Employee Employee 1',
                'enabled' => true,
                'quality_score' => random_int(0, 200),
            ],);
        }
    }
}
