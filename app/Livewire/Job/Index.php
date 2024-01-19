<?php

namespace App\Livewire\Job;

use App\Models\Job;
use App\Models\Section;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;
    public $section;

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
        $employees = Job::with('user')
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
        return view('livewire.job.index')->with([
            'employees' => $this->employees(),
            'sections' => $this->sections()
        ]);
    }
}
