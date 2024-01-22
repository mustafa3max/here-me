<?php

namespace Database\Seeders;

use App\Models\Interest;
use Illuminate\Database\Seeder;

class InterestSeeder extends Seeder
{
    public $interest = [
        'undefined',
        'sports',
        'religion',
        'politics',
        'sciences',
        'technology',
        'programming',
        'design',
        'fashion',
        'carpentry',
        'electricity',
        'physics',
        'chemistry',
        ];
    public function run(): void
    {
        foreach ($this->interest as $interest) {
            Interest::create([
                'interest' => $interest
            ]);
        }
    }
}
