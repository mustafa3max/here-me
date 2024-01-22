<?php

namespace App\Livewire\Broadcast;

use App\Events\AvailableUserBroadcastEvent;
use App\Jobs\AvailableUserBroadcastJob;
use App\Models\Broadcast;
use App\Models\Caller;
use App\Models\Guest;
use App\Models\Questioner;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Live extends Component
{
    public $broadcastId;
    public $broadcastData;

    public function broadcast()
    {
        $this->broadcastData = Broadcast::with('presenter')
            ->with('guests')
            ->with('questioners')
            ->with('callers')
            ->with('visitors')
            ->where('id', $this->broadcastId)->get()->first();
        if ($this->broadcastData == null) {
            return abort(404);
        }
    }

    public function join()
    {
        broadcast(new AvailableUserBroadcastEvent($this->broadcastId, Auth::user()))->toOthers();
    }

    public function subscribe()
    {
        if ($this->broadcastData->presenter->id != Auth::id()) {
            if (Guest::where('user_id', Auth::id())->where('broadcast_id', $this->broadcastId)->get()->count() == 0) {
                if (Questioner::where('user_id', Auth::id())->where('broadcast_id', $this->broadcastId)->get()->count() == 0) {
                    if (Caller::where('user_id', Auth::id())->where('broadcast_id', $this->broadcastId)->get()->count() == 0) {
                        if (Visitor::where('user_id', Auth::id())->where('broadcast_id', $this->broadcastId)->get()->count() == 0) {
                            Visitor::updateOrInsert([
                                'user_id' => Auth::id(),
                                'broadcast_id' => $this->broadcastId,
                            ], [
                                'user_id' => Auth::id(),
                                'broadcast_id' => $this->broadcastId,
                            ]);
                        }
                    }
                }
            }
        }
    }

    public function askNow()
    {
        broadcast(new AvailableUserBroadcastEvent($this->broadcastId, Auth::user()))->toOthers();

        if ($this->checkUserJoin(Auth::id())) {
            $isAsk = Questioner::updateOrInsert([
                'user_id' => Auth::id(),
                'broadcast_id' => $this->broadcastId,
            ], [
                'user_id' => Auth::id(),
                'broadcast_id' => $this->broadcastId,
            ]);
            if (boolval($isAsk)) {
                broadcast(new AvailableUserBroadcastEvent($this->broadcastId, Auth::user()))->toOthers();
                return $this->dispatch('message', __('str.ask_added_successfully'));
            }
            return $this->dispatch('message', __('error.error_not_added'));
        }
        return $this->dispatch('message', __('error.error_not_added'));
    }

    public function callNow()
    {
        if ($this->checkUserJoin(Auth::id())) {
            $isCall = Caller::updateOrInsert([
                'user_id' => Auth::id(),
                'broadcast_id' => $this->broadcastId,
            ], [
                'user_id' => Auth::id(),
                'broadcast_id' => $this->broadcastId,
            ]);
            if (boolval($isCall)) {
                broadcast(new AvailableUserBroadcastEvent($this->broadcastId, Auth::user()))->toOthers();
                return $this->dispatch('message', __('str.ask_added_successfully'));
            }
            return $this->dispatch('message', __('error.error_not_added'));
        }
        return $this->dispatch('message', __('error.error_not_added'));
    }

    public function checkUserJoin($userId)
    {
        if ($this->broadcastData->presenter->id != $userId) {
            $guest = Guest::where('user_id', $userId)->where('broadcast_id', $this->broadcastId)->get()->count();
            if ($guest == 0) {
                $caller = Caller::where('user_id', $userId)->where('broadcast_id', $this->broadcastId)->get()->count();
                if ($caller == 0) {
                    $questioner = Questioner::where('user_id', $userId)->where('broadcast_id', $this->broadcastId)->get()->count();
                    if ($questioner == 0) {
                        return true;
                    }
                }
            }
        }
        return false;
    }

    public function mount()
    {
        $this->broadcastId = request('broadcastId');
        $this->broadcast();
        $this->subscribe();
    }

    public function render()
    {
        return view('livewire.broadcast.live')->with([
            'broadcast' => $this->broadcastData,
            'presenter' => $this->broadcastData->presenter,
            'guests' => $this->broadcastData->guests,
            'questioners' => $this->broadcastData->questioners,
            'callers' => $this->broadcastData->callers,
            'visitors' => $this->broadcastData->visitors,
        ]);
    }
}
