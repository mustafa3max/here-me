<?php

namespace App\Livewire\ContactWithMe;

use App\Models\ChatRoom;
use Livewire\Component;

class Index extends Component
{

    public function data() {
        return ChatRoom::where('id', request('id'))->with('userMe')->with('userHe')->get()->first();
    }

    public function mount() {
        if($this->data() === null) {
            return abort(404);
        }
    }
    public function render()
    {
        return view('livewire.contact-with-me.index')->with([
            'data'=> $this->data()
        ]);
    }
}
