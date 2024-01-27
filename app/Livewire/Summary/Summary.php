<?php

namespace App\Livewire\Summary;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Summary extends Component
{
    public function summary() {
        $summary = Storage::disk('summaries')->get('summaries/'.request('title').'.md');
        if($summary == null) {
            abort(404);
        }
        return $summary;
    }

    public function render()
    {
        return view('livewire.summary.summary')->with([
            'summary' => $this->summary()
        ]);
    }
}
