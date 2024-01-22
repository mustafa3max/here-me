<?php

namespace App\Livewire\Broadcast;

use App\Globals;
use App\Models\Broadcast;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;

class Update extends Component
{

    public $broadcastId;
    public $isBroadcast;
    public $dateScheduling;

    public function boradcast()
    {
        $broadcast = Broadcast::where('id', $this->broadcastId)
            ->get()->first();

        $this->isBroadcast = $broadcast->mode === Globals::modes()[2];

        return $broadcast;
    }

    public function broadcastNow($id)
    {
        $this->isBroadcast = $this->isBroadcast ?? false;
        $mode = $this->isBroadcast ? Globals::modes()[2] : Globals::modes()[3];

        $isMode = Broadcast::where('id', $id)
            ->where('user_id', Auth::id())
            ->get('mode')
            ->first();

        $update = Broadcast::where('id', $id)
            ->where('user_id', Auth::id())
            ->update([
                'mode' => $mode,
            ]);

        if (boolval($update)) {
            if ($this->isBroadcast) {
                try {
                    Schema::connection('chat')->create($id . '_chats', function ($table) {
                        $table->id('id');
                        $table->uuid('user_id')->nullable(false);
                        $table->foreign('user_id')
                            ->on('main.users')
                            ->references('id')
                            ->onDelete('cascade');
                        $table->uuid('broadcast_id')->nullable(false);
                        $table->foreign('broadcast_id')
                            ->on('main.broadcasts')
                            ->references('id')
                            ->onDelete('cascade');
                        $table->string('message')->require;
                        $table->timestamps();
                    });
                } catch (\Throwable $th) {
                }
            }
            $this->dispatch('message', __('str.updated_successfully'));
            $this->reset('isBroadcast');
        } else {
            $this->dispatch('message', __('error.updated_error'));
        }
    }

    public function scheduling($id)
    {
        $validated = $this->validate([
            'dateScheduling' => 'required|date',
        ]);

        if (Carbon::parse($validated['dateScheduling'])->gt(Carbon::now())) {
            $update = Broadcast::where('id', $id)
                ->where('user_id', Auth::id())
                ->update([
                    'broadcast_date_at' => $validated['dateScheduling'],
                    'mode' => Globals::modes()[1],
                ]);
            if (boolval($update)) {
                $this->dispatch('message', __('str.updated_successfully'));
                $this->reset('dateScheduling');
            } else {
                $this->dispatch('message', __('error.updated_error'));
            }
        } else {
            $this->dispatch('message', __('error.choose_time_later_current_time'));
        }
    }

    public function mount()
    {
        $this->broadcastId = request('broadcastId');
    }

    public function render()
    {
        return view('livewire.broadcast.update')->with([
            'broadcast' => $this->boradcast()
        ]);
    }
}
