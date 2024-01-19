<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    public $sections = ['public', 'sports', 'religion', 'politics', 'sciences', 'technology'];
    public function run(): void
    {
        foreach ($this->sections as $section) {
            Section::create([
                'section' => $section
            ]);
        }
    }
}
