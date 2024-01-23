<?php

namespace App\Livewire\Ready;

use App\Models\ChatRoom;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class Alert extends Component
{
    public function createRoom($userIdHe) {
        if (Auth::check()) {
            $roomMe = ChatRoom::where('user_id_me', Auth::id())->where('user_id_he', $userIdHe)->get(['id']);
            $roomHe = ChatRoom::where('user_id_me', $userIdHe)->where('user_id_he', Auth::id())->get(['id']);
            if(count($roomMe) <= 0 && count($roomHe) <= 0){
                $create = ChatRoom::create(
                    [
                        'id' => Str::uuid(),
                        'user_id_me'=> Auth::id(),
                        'user_id_he'=> $userIdHe,
                    ]
                );
                if(boolval($create)) {
                    return redirect()->route('call-me', ['id'=> Str::uuid()]);
                }else {
                    $this->dispatch('message', __('error.join_chat'));
                }
            }
            else {
                $id = '';
                if(count($roomMe)>0) {
                    $id = $roomMe[0]->id;
                } elseif(count($roomHe)>0) {
                    $id = $roomHe->first()->id;
                }
                return redirect()->route('call-me', ['id'=> $id]);
            }
        }else {
            $this->dispatch('message', __('error.sign_in_first'));
        }
    }
    public function render()
    {
        return view('livewire.ready.alert');
    }
}
