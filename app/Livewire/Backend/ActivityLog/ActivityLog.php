<?php

namespace App\Livewire\Backend\ActivityLog;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Activitylog\Models\Activity;

class ActivityLog extends Component
{
    use WithPagination;
    private $activities;
    public string $search = '';

    public function render()
    {
        $this->loadData();
        return view('livewire.backend.activity-log.activity-log')->with(["activities" => $this->activities])->extends('layouts.app');
    }

    public function loadData()
    {
        $this->activities = Activity::latest()->paginate(10);
    }

    public function updating($name)
    {
        $searchList = [
            'search'
        ];

        if (in_array($name, $searchList)) {
            $this->gotoPage(1);
        }
        return;
    }
    
    public function resetFilters()
    {
        $this->reset('search');
    }
}
