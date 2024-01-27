<?php

namespace Database\Seeders;

use App\Models\Summary;
use App\Summary\Summaries;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SummarySeeder extends Seeder
{
    public function run(): void
    {
        foreach (Summaries::get() as $summary) {
            Summary::insert([
                'id' => Str::uuid(),
                'poster' => $summary['poster'],
                'summary' => $summary['summary'],
                'sections' => json_encode($summary['sections']),
                'title' => $summary['title'],
                'description' => $summary['description'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
