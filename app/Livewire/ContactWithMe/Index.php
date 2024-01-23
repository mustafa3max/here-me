<?php

namespace App\Livewire\ContactWithMe;

use App\Events\JoinEvent;
use App\Models\ChatRoom;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public $roomId;
    public function data() {
        return ChatRoom::where('id', $this->roomId)->with('userMe')->with('userHe')->get()->first();
    }

    public function recall() {
        JoinEvent::dispatch(Auth::id(), $this->data()->user_id_he, $this->data()->userMe->name);
    }

    public function mount() {
        $this->roomId = request('id');
        if($this->data() === null) {
            return abort(404);
        }
        $this->recall();
    }
    public function render()
    {
        return view('livewire.contact-with-me.index')->with([
            'data'=> $this->data()
        ]);
    }
}
