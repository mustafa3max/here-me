<?php

namespace App\Livewire\Interests;

use App\Models\Interest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Update extends Component
{
    use WithPagination;

    public function interests(){
        return Interest::paginate(50);
    }

    public function update($myInterests){
        if (count($myInterests) > 5) {
            return $this->dispatch('message', __('error.max_interests'));
        }

        if (in_array(1, $myInterests) && count($myInterests) > 1) {
            return $this->dispatch('message', __('error.update_error'));
        }

        $countInterests = Interest::whereIn('id', $myInterests)->get()->count();
        if($countInterests !== count($myInterests)){
            return $this->dispatch('message', __('error.update_error'));
        }

        if(count($myInterests) <= 0) {
            $myInterests = [1];
        }
        $update = User::where('id', Auth::id())->update([
            'interests' => $myInterests
        ]);

        if(boolval($update)) {
            $this->dispatch('message', __('str.update_successfully'));
        }else {
            $this->dispatch('message', __('error.update_error'));
        }
    }


    public function render()
    {
        return view('livewire.interests.update')->with([
            'interests' => $this->interests(),
            'myInterests'=> json_encode(Auth::user()->interests??[])
        ]);
    }
}
