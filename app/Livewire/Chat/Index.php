<?php

namespace App\Livewire\Chat;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public $broadcastId;

    #[On('chats')]
    public function chats()
    {
        try {
            $chats = DB::connection('chat')->table($this->broadcastId . '_chats')
                ->where('broadcast_id', $this->broadcastId)
                ->join('main.users', 'main.users.id', 'user_id')
                ->get();
            return $chats;
        } catch (\Throwable $th) {
            return [];
        }
    }

    public function mount()
    {
        $this->broadcastId = request('broadcastId');
        session()->put('url', url()->current());
    }

    public function render()
    {
        return view('livewire.chat.index')->with([
            'chats' => $this->chats()
        ]);
    }
}
