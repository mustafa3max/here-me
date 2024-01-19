<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{

    function users()
    {
        return User::limit(10)->get(['name', 'avatar', 'created_at']);
    }

    public function render()
    {
        return view('livewire.user.users')->with([
            'users' => $this->users()
        ]);
    }
}
