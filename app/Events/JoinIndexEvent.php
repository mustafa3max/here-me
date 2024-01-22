<?php

namespace App\Events;

use App\Models\Ready;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class JoinIndexEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $usersNow = [];

    public function __construct(public $userId, public $type)
    {
        $this->checked();
    }

    public function broadcastOn()
    {
        return new Channel('join.index');
    }

    public function broadcastWith() {
        return [
            'users_now' => $this->usersNow
        ];
    }

    public function checked() {
        $meReady = Ready::where('user_id', $this->userId)->where('enabled', true)->get()->first();

        if($meReady != null) {
            $this->usersNow  = Cache::get('users-now')??[];
            if($this->type === 'entry') {
                if(!in_array($this->userId, $this->usersNow)) {
                    $this->usersNow[] = $this->userId;
                    Cache::put('users-now', $this->usersNow);
                }
            }else if($this->type === 'exit') {
                if(in_array($this->userId, $this->usersNow)) {
                    $index = array_search(Auth::id(), $this->usersNow);
                    unset($this->usersNow[$index]);
                    Cache::put('users-now', $this->usersNow);
                }
            }
        }
    }
}
