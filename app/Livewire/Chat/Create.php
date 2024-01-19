<?php

namespace App\Livewire\Chat;

use App\Events\ChatEvent;
use App\Models\Broadcast;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Create extends Component
{

    public $message;
    public $broadcastId;
    public $emojis;

    public function create()
    {
        $validated = $this->validate([
            'message' => 'required|string',
        ]);
        $isBroadcast = Broadcast::find($this->broadcastId);
        if ($isBroadcast) {
            $chat = DB::connection('chat')->table($this->broadcastId . '_chats')->insert([
                'user_id' => Auth::id(),
                'broadcast_id' => $this->broadcastId,
                'message' => $validated['message'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            if (boolval($chat)) {
                $this->reset('message');
                // ChatEvent::dispatch($this->broadcastId);
            }
        }
    }

    public function mount()
    {
        $this->broadcastId = request('broadcastId');
        $this->emojis = json_decode(Storage::disk('public')->get('emojis.json'), true);
    }

    public function render()
    {

        return view('livewire.chat.create')->with([
            'emojis' => $this->emojis
        ]);
    }
}
