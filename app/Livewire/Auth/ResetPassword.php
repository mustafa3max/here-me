<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Illuminate\Support\Str;

class ResetPassword extends Component
{

    public $email;
    public $password;
    public $token;
    public $passwordConfirmation;

    public function resetPassword()
    {
        $validated = $this->validate([
            'email' => 'required|email',
            'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{4,}$/',
            'passwordConfirmation' => 'required|same:password',
            'token' => 'required',
        ]);

        $status = Password::reset(
            $validated,
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            Session::flash('reset_rassword', __('seo.reset_rassword'));
            return redirect()->route('sign-in');
        }
    }

    public function render()
    {
        return view('livewire.auth.reset-password');
    }
}
