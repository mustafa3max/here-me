<?php

namespace App\Livewire;

use App\Models\ChatRoom;
use App\Models\Employee;
use App\Models\User;
use Livewire\Component;

class CallMe extends Component
{

    public function data() {
        return ChatRoom::where('id', request('id'))->with('userMe')->with('userHe')->get()->first();
    }

    public function mount() {
    }
    public function render()
    {
        return view('livewire.call-me')->with([
            'data'=> $this->data()
        ]);
    }
}
