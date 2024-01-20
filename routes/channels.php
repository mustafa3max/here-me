<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('ready.{id}', 'App\Broadcasting\ReadyChannel');
Broadcast::channel('room.{id}', 'App\Broadcasting\RoomChannel');
