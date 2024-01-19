<?php

namespace App\Livewire\Auth;

use App\Globals;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class SignInGuest extends Component
{
    public function signIn()
    {
        $randomNumbers = rand(pow(10, 5 - 1), pow(10, 5) - 1);
        $guest = User::create([
            'id' => Str::uuid(),
            'name' => "Guest{$randomNumbers}",
        ]);

        Auth::loginUsingId($guest->id);
        return redirect()->to(session(Globals::$linkAfterAuthentication));
    }

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.auth.sign-in-guest');
    }
}
