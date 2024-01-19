<?php

namespace App\Livewire\Channel;

use App\Models\Channel;
use Livewire\Component;

class LastFour extends Component
{
    public function channels()
    {
        return Channel::where('user_id', request('userId'))
            ->limit(5)
            ->get();
    }

    public function channelsCount()
    {
        return Channel::where('user_id', request('userId'))
            ->count();
    }

    public function render()
    {
        return view('livewire.channel.last-four')->with([
            'channels' => $this->channels(),
            'channelsCount' => $this->channelsCount(),
        ]);
    }
}
