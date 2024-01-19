<?php

namespace App\Broadcasting;

use App\Models\User;

class LiveChannel
{

    public function __construct()
    {
        //
    }

    public function join(User $user): array|bool
    {
        return [$user->name, $user->id];
    }
}
