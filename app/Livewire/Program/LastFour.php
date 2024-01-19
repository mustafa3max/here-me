<?php

namespace App\Livewire\Program;

use App\Models\Program;
use Livewire\Component;

class LastFour extends Component
{
    public $channelId;

    public function programs()
    {
        return Program::where('user_id', request('userId'))
            ->limit(5)
            ->get();
    }

    public function programsCount()
    {
        return Program::where('channel_id', request('userId'))
            ->count();
    }

    public function render()
    {
        return view('livewire.program.last-four')->with([
            'programs' => $this->programs(),
            'programsCount' => $this->programsCount(),
        ]);
    }
}
