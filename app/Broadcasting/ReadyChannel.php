<?php

namespace App\Broadcasting;

use App\Models\User;

class ReadyChannel
{

    public function __construct()
    {
    }

    public function join(User $user): array|bool
    {
        return [$user->id];
    }
}
