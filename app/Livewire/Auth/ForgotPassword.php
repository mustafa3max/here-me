<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ForgotPassword extends Component
{

    public $email;

    public function forgotPassword()
    {
        $validated = $this->validate([
            'email' => 'required|email',
        ]);
        $status = Password::sendResetLink($validated);

        if ($status === Password::RESET_LINK_SENT) {
            Session::flash('password_request', __('str.password_request'));
            return $this->redirect(session()->pull('path_previous') ?? url()->to('/employees'));
        }
    }

    public function mount()
    {
        if (Auth::check()) {
            return $this->redirect(session()->pull('path_previous') ?? url()->to('/employees'));
        }
    }

    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
