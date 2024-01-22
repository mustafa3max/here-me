<?php

namespace App\Livewire\Ready;

use App\Events\JoinIndexEvent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class JoinOrLeave extends Component
{
    #[On('is-join')]
    public function isIoin($isJoin): bool {
        return $isJoin;
    }

    public function joinOrleave() {
        if(Auth::check()) {
            if(Auth::user()->ready) {
                $leave = User::where('id', Auth::id())->update(['ready'=>false]);
                if(boolval($leave)) {
                    $this->dispatch('message', __('str.leaved_successfully'));
                    JoinIndexEvent::dispatch(Auth::id(), 'exit');
                }
            }else {
               $join = User::where('id', Auth::id())->update(['ready'=>true]);
                if(boolval($join)) {
                    $this->dispatch('message', __('str.joined_successfully'));
                    JoinIndexEvent::dispatch(Auth::id(), 'entry');
                }
            }
            $this->dispatch('is-join', isJoin: Auth::user()->ready);
        }else {
            $this->dispatch('message', __('error.sign_in_first'));
        }
    }

    public function render()
    {
        return view('livewire.ready.join-or-leave');
    }
}
