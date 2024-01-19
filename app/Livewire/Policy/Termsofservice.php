<?php

namespace App\Livewire\Policy;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Termsofservice extends Component
{
    function mount()
    {
        session()->put('route', Route::currentRouteName());
    }

    public function render()
    {
        return view('livewire.policy.termsofservice')->with(
            ['route' => session()->get('route')]
        );
    }
}
