<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public function user()
    {
        $user = User::where('id', request('userId'))->get()->first();
        return $user ?? abort(404);
    }

    public function mount()
    {
        if (Auth::user()->is_guest) {
            return abort(404);
        }
    }

    public function render()
    {
        return view('livewire.user.profile')->with(['user' => $this->user()]);
    }
}
