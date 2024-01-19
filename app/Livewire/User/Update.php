<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $user;
    public $avatar;

    public function updateAvatar()
    {
        $validated = $this->validate([
            'avatar' => 'required|max:1024',
        ]);

        $imagePath = 'images/' . Auth::id() . '.jpeg';

        $imagePathDatabase = 'storage/users/' . $imagePath;

        $validated['avatar']->storeAs('/', $imagePath, 'users');
        $update = User::where('id', Auth::id(),)->update([
            'avatar' => $imagePathDatabase,
        ]);
        if (!boolval($update)) {
            $this->dispatch('message', __('error.update_avatar'));
        }
    }

    public function deleteAvatar()
    {
        try {
            $path = explode('storage/users/', Auth::user()->avatar)[1];
            Storage::disk('users')->delete($path);
            $update = User::where('id', Auth::id())->update([
                'avatar' => null,
            ]);
            if (!boolval($update)) {
                $this->dispatch('message', __('error.update_avatar'));
            }
        } catch (\Throwable $th) {
            $this->dispatch('message', __('str.delete_avatar'));
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
        return view('livewire.user.update');
    }
}
