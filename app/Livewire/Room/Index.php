<?php

namespace App\Livewire\Room;

use App\Models\ChatRoom;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public function rooms() {
        return ChatRoom::where(function (Builder $query) {
            $query->where('user_id_me', Auth::id())->orWhere('user_id_he', Auth::id());
        })->get();
    }
    public function render()
    {
        return view('livewire.room.index')->with([
            'rooms'=> $this->rooms()
        ]);
    }
}
