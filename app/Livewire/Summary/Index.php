<?php

namespace App\Livewire\Summary;

use App\Models\Summary;
use App\Summary\Sections;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $section;
    public $sections;
    public $initData;

    public function selectSection($section) {
        session()->put('section', $section);
        $this->section = $section;
    }

    public function dataAll()
    {
        $data = Summary::where('enabled', true)
            ->whereJsonContains('sections', (int) $this->section)
            ->orderByDesc('updated_at')
            ->orderByDesc('quality_score')
            ->paginate(9);
        return $data;
    }

    public function mount()
    {
        session()->put('url-current', url()->current());
        session()->put('route-name', request()->route()->getName());
        $this->section = session()->get('section')??'1';
        $this->sections = Sections::get();
    }

    public function render()
    {
        return view('livewire.summary.index')->with([
            'dataAll' => $this->dataAll(),
        ]);
    }
}
