<?php

namespace App\Livewire\Rating\LikeDeslike;

use App\Models\Rating;
use Livewire\Component;

class Index extends Component
{
    public $userId;

    public function index()
    {
        return Rating::where('user_id', $this->userId)->get(['like', 'deslike'])->count();
    }

    public function render()
    {
        return view('livewire.rating.like-deslike.index')->with([
            'index' => $this->index(),
        ]);
    }
}
