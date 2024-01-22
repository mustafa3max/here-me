<?php

namespace App\Livewire\Broadcast;

use App\Models\Broadcast;
use Livewire\Component;

class LastFour extends Component
{
    public function broadcasts()
    {
        return Broadcast::where('user_id', request('userId'))
            ->limit(5)
            ->get();
    }

    public function broadcastsCount()
    {
        return Broadcast::where('user_id', request('userId'))
            ->count();
    }

    public function render()
    {
        return view('livewire.broadcast.last-four')->with([
            'broadcasts' => $this->broadcasts(),
            'broadcastsCount' => $this->broadcastsCount(),
        ]);
    }
}
