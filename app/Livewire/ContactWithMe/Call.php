<?php

namespace App\Livewire\ContactWithMe;

use Livewire\Component;

class Call extends Component
{
    public $data;
    public $type;
    public function render()
    {
        return view('livewire.contact-with-me.call');
    }
}
