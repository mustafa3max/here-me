<?php

namespace App\Broadcasting;

use App\Models\User;

class InsideRoom
{

    public function __construct()
    {

    }

    public function join(User $user)
    {
        return $user->id;
    }
}
