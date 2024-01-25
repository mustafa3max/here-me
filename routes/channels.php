<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('outside.room.{roomId}', 'App\Broadcasting\OutsideRoom');
Broadcast::channel('inside.room.{roomId}', 'App\Broadcasting\InsideRoom');
Broadcast::channel('ready.{page_name}', 'App\Broadcasting\Ready');
Broadcast::channel('waiting.{userId}', 'App\Broadcasting\Waiting');
