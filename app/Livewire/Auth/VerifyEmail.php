<?php

namespace App\Livewire\Auth;

use App\Mail\VerifyEmail as MailVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Mail;

class VerifyEmail extends Component
{

    function resendCode()
    {
        $user = Auth::user();
        $user->sendEmailVerificationNotification();
    }

    public function mount()
    {
        if (Auth::user()->hasVerifiedEmail()) {
            return $this->redirect('/articles');
        }
    }

    public function render()
    {
        return view('livewire.auth.verify-email');
    }
}
