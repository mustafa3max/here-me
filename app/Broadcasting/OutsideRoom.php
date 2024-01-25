<?php

namespace App\Broadcasting;

use App\Models\ChatRoom;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OutsideRoom
{

    public function __construct()
    {
    }

    public function join(User $user, $roomId)
    {
        $room = ChatRoom::find($roomId);
        return $room->user_id_me == Auth::id() || $room->user_id_he == Auth::id()?$user->id:null;
    }
}
