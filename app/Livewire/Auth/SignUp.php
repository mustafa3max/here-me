<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class SignUp extends Component
{
    public $name;
    public $email;
    public $password;

    public function signUp()
    {
        $validated = $this->validate([
            'name' => 'required|string|min:2|alpha_dash',
            'email' => 'required|email|unique:users',
            'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{4,}$/',
        ]);

        $user = User::create([
            'email' => strtolower($validated['email']),
            'password' => Hash::make($validated['password']),
            'name' => $validated['name'],
        ]);

        if(boolval($user)) {
            if (Auth::attempt(['name' => $validated['name'], 'email' => $validated['email'], 'password' => $validated['password']], true)) {
                return $this->redirect(session()->pull('path_previous') ?? url()->to('/readies'));
            }
        }else {
            $this->dispatch('message', __('error.sign_up'));
        }
    }

    public function mount()
    {
        if (Auth::check()) {
            return $this->redirect(session()->pull('path_previous') ?? url()->to('/readies'));
        }
    }

    public function render()
    {
        return view('livewire..auth.sign-up');
    }
}
