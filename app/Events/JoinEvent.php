<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class JoinEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public function __construct(public $userIdMe, public $userIdHe, public $nameHe)
    {
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('join'),
        ];
    }

    public function broadcastWith() {
        return [
            'userIdMe' => $this->userIdMe,
            'userIdHe' => $this->userIdHe,
            'nameHe' => $this->nameHe,
        ];
    }
}
