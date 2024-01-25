<?php

namespace App\Livewire\Ready;

use App\Models\ChatRoom;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Index extends Component
{
    use WithPagination;

    public $ready = false;
    public $initData;

    public function isReady() {
        $this->ready = session()->get('ready')??false;
        $this->ready = !$this->ready;
        session()->put('ready',  $this->ready);
    }

    public function createRoom($userIdHe) {
        if (Auth::check()) {
            $roomMe = ChatRoom::where('user_id_me', Auth::id())->where('user_id_he', $userIdHe)->get(['id']);
            $roomHe = ChatRoom::where('user_id_me', $userIdHe)->where('user_id_he', Auth::id())->get(['id']);
            if(count($roomMe) <= 0 && count($roomHe) <= 0){
                $roomId = Str::uuid();
                $create = ChatRoom::create(
                    [
                        'id' => $roomId,
                        'user_id_me'=> Auth::id(),
                        'user_id_he'=> $userIdHe,
                    ]
                );
                if(boolval($create)) {
                    return redirect()->route('call-me', ['id'=> $roomId]);
                }else {
                    $this->dispatch('message', __('error.join_chat'));
                }
            }
            else {
                $id = '';
                if(count($roomMe)>0) {
                    $id = $roomMe[0]->id;
                } elseif(count($roomHe)>0) {
                    $id = $roomHe->first()->id;
                }
                return redirect()->route('call-me', ['id'=> $id]);
            }
        }else {
            $this->dispatch('message', __('error.sign_in_first'));
        }
    }

    public function data()
    {
            $data = User::where('enabled', true)
                ->where('ready',session()->get('ready'))
                ->where('id', '!=', Auth::id())
                ->where(function (Builder $query) {
                    try {
                        $query->whereJsonContains('interests', Auth::user()->interests[0])
                        ->orWhereJsonContains('interests', Auth::user()->interests[1])
                        ->orWhereJsonContains('interests', Auth::user()->interests[2])
                        ->orWhereJsonContains('interests', Auth::user()->interests[3])
                        ->orWhereJsonContains('interests', Auth::user()->interests[4]);
                    } catch (\Throwable $th) {
                    }
                })
                ->orderByDesc('updated_at')
                ->latest()
                ->paginate(9);
        return $data;
    }

    public function mount()
    {
        session()->put('url-current', url()->current());
        session()->put('route-name', request()->route()->getName());
        $this->ready = session()->get('ready')??false;
    }

    public function render()
    {
        // Cache::delete('users-now');
        return view('livewire.ready.index')->with([
            'data' => $this->data()
        ]);
    }
}
