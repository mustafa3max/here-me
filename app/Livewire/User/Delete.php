<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Delete extends Component
{
    public $email;
    public $password;

    public function delete()
    {
        $validated = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::user()->email == $validated['email'] && Hash::check($validated['password'], Auth::user()->password)) {
            $this->reset(['email']);
            $this->reset(['password']);

            $disk = Storage::disk('users');

            $disk->deleteDirectory(Auth::id());

            $delete = User::where('email', Auth::user()->email)->delete();

            if (boolval($delete)) {
                session()->flush();
                auth('web')->logout();
                $this->dispatch('message', __('done.delete_account'));
                Session::flash('delete-account', __('seo.delete_account'));
                return $this->redirect('/readies');
            } else {
                $this->dispatch('message', __('error.delete_account'));
            }
        } else {
            $this->dispatch('message', __('error.delete_account'));
        }
    }

    public function mount()
    {
        if (Auth::user()->is_guest) {
            return abort(404);
        }
    }

    public function render()
    {
        return view('livewire.user.delete')->with([
            'user' => Auth::user()
        ]);
    }
}
