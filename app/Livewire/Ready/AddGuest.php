<?php

namespace App\Livewire\Broadcast;

use App\Models\Broadcast;
use App\Models\Guest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddGuest extends Component
{
    public $emailGuest = '';
    public $broadcastQuery;
    public $guestsQuery;
    public $broadcastId;
    public $isGuest = false;

    public function broadcast()
    {
        $broadcast = Broadcast::with('program')
            ->withCount('guests')
            ->where('enabled', true)
            ->where('id', $this->broadcastId)
            ->get();

        return $broadcast->first();
    }

    public function guests()
    {
        $this->isGuest = count(Guest::where('broadcast_id', $this->broadcastId)->where('user_id', Auth::id())->get()) > 0;
        return Guest::where('broadcast_id', $this->broadcastId)->get();
    }

    public function add()
    {
        $validated = $this->validate([
            'emailGuest' => 'required|email',
        ]);
        $user = User::where('email', $validated["emailGuest"])->get()->first();
        if ($user !== null) {
            if ($validated["emailGuest"] === Auth::user()->email) {
                return $this->dispatch('message', __('error.cannot_add_yourself_guest'));
            }

            $user = User::where('email', $validated["emailGuest"])->get()->first();

            $guest = Guest::updateOrInsert(
                [
                    'user_id' => $user->id,
                    'broadcast_id' => $this->broadcastId,
                ],
                [
                    'user_id' => $user->id,
                    'broadcast_id' => $this->broadcastId,
                ]
            );

            if (boolval($guest)) {
                $this->dispatch('message', __('str.guest_added_successfully'));
                $this->reset('emailGuest');
            } else {
                $this->dispatch('message', __('error.error_not_added'));
            }
        } else {
            $this->dispatch('message', __('error.user_not_exist'));
        }
    }

    public function subscribe()
    {
        $guest = Guest::updateOrInsert(
            [
                'user_id' => Auth::id(),
                'broadcast_id' => $this->broadcastId,
            ],
            [
                'user_id' => Auth::id(),
                'broadcast_id' => $this->broadcastId,
            ]
        );

        if (boolval($guest)) {
            $this->dispatch('message', __('str.guest_added_successfully'));
        } else {
            $this->dispatch('message', __('error.error_not_added'));
        }
    }

    public function delete($userId)
    {
        $isOwner = $this->broadcastQuery->user_id === Auth::id();

        $isGuest = $userId === Auth::id();

        if ($isOwner && !$isGuest) {
            $delete = Guest::where('user_id', $userId)->where('broadcast_id', $this->broadcastId)->delete();
        } else {
            $delete = Guest::where('user_id', Auth::id())->where('broadcast_id', $this->broadcastId)->delete();
        }
        if (boolval($delete)) {
            $this->dispatch('message', __('str.guest_remove_successfully'));
        }
    }

    public function data()
    {
        $this->broadcastQuery = $this->broadcast();
        if ($this->broadcastQuery == null) {
            return abort(404);
        }
        $this->guestsQuery = $this->guests();
    }

    public function mount()
    {
        $this->broadcastId = request('broadcastId');
    }

    public function render()
    {
        $this->data();
        return view('livewire.broadcast.add-guest')->with([
            'broadcast' => $this->broadcastQuery,
            'guests' => $this->guestsQuery,
        ]);
    }
}
