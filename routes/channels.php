<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('live.{id}', 'App\Broadcasting\LiveChannel');
Broadcast::channel('room.{id}', 'App\Broadcasting\RoomChannel');
