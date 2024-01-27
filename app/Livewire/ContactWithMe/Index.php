<?php

namespace App\Livewire\ContactWithMe;

use App\Models\ChatRoom;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $isFooter = false;
    public $roomId;
    public function data() {
        $data = ChatRoom::where('id', $this->roomId)->with('userMe')->with('userHe')->get()->first();
        if($data->user_id_me != Auth::id() && $data->user_id_he != Auth::id()){
            return abort(404);
        }
        return $data;
    }

    public function mount() {
        $this->roomId = request('id');
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
