<?php

namespace App\Livewire\ContactWithMe;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Text extends Component
{
    public $emojis;

    public function mount()
    {
        $this->emojis = json_decode(Storage::disk('public')->get('emojis.json'), true);
    }
    public function render()
    {
        return view('livewire.contact-with-me.text')->with([
            'emojis' => $this->emojis
        ]);
    }
}
