<?php

namespace App\Livewire\Employee;

use App\Models\ChatRoom;
use App\Models\Employee;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Index extends Component
{
    use WithPagination;

    public $search;
    public $section;

    public function createRoom($userIdHe) {
        $roomMe = ChatRoom::where('user_id_me', Auth::id())->where('user_id_he', $userIdHe)->get(['id']);
        $roomHe = ChatRoom::where('user_id_me', $userIdHe)->where('user_id_he', Auth::id())->get(['id']);
        if(count($roomMe) <= 0 && count($roomHe) <= 0){
            $create = ChatRoom::create(
                [
                    'id' => Str::uuid(),
                    'user_id_me'=> Auth::id(),
                    'user_id_he'=> $userIdHe,
                ]
            );
            if(boolval($create)) {
                return redirect()->route('call-me', ['id'=> Str::uuid()]);
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
    }

    public function sections()
    {
        return Section::get();
    }

    public function selectSection($section)
    {
        session()->put('section', $section);
        $this->section =  $section;
    }

    public function employees()
    {
        $employees = Employee::with('user')
            ->where('enabled', true)
            ->where('title', 'LIKE', "%{$this->search}%")
            ->whereJsonContains('sections', intval($this->section))
            ->orderByDesc('updated_at')
            ->orderByDesc('quality_score')
            ->paginate(9);
        return $employees;
    }

    public function mount()
    {
        session()->put('url-current', url()->current());
        session()->put('route-name', request()->route()->getName());
        $this->section =  session()->get('section') ?? 1;
    }

    public function render()
    {
        return view('livewire.employee.index')->with([
            'employees' => $this->employees(),
            'sections' => $this->sections()
        ]);
    }
}
