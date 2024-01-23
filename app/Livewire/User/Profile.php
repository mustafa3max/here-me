<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $user;
    public $name;
    public $enabled;

    #[Validate('image|max:1024')] // 1MB Max
    public $avatar;
    #[Validate('image|max:1024')] // 1MB Max
    public $banner;

    public function updateEnabled() {
        $this->enabled = !Auth::user()->enabled;
        User::where('id', Auth::id())->update(['enabled'=> $this->enabled]);
    }
    public function updateName() {
        $validated = $this->validate([
            'name' => 'required|string',
        ]);
        User::where('id', Auth::id())->update(['name'=> $validated['name']]);
    }
    public function changeImage($type)
    {
        if($type === 'avatar') {
            $this->avatar->storePubliclyAs(Auth::id().'/images', $type.'.'.$this->avatar->getClientOriginalExtension(), 'users');
            User::where('id', Auth::id())->update([$type=> 'storage/users/'.Auth::id().'/images/'.$type.'.'.$this->avatar->getClientOriginalExtension()]);
        }
        else if($type === 'banner') {
            $this->banner->storePubliclyAs(Auth::id().'/images', $type.'.'.$this->banner->getClientOriginalExtension(), 'users');
            User::where('id', Auth::id())->update([$type=> 'storage/users/'.Auth::id().'/images/'.$type.'.'.$this->banner->getClientOriginalExtension()]);
        }
    }

    public function init() {
        $this->user = Auth::user();
        $this->name = $this->user->name;
        $this->enabled = $this->user->enabled;
    }

    public function mount()
    {
        if (Auth::user()->is_guest) {
            return abort(404);
        }
        $this->init();
    }

    public function render()
    {
        return view('livewire.user.profile');
    }
}
