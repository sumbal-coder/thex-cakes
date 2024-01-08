<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\AboutUs as ModelsAboutUs;

class AboutUs extends Component
{
    use WithPagination;

    public $aboutId;
    public $vision;
    public $mission;

    public function render()
    {
        return view('livewire.backend.about-us')->extends('layouts.app');
    }

    public function mount()
    {
        $about = ModelsAboutUs::find(1);
        $this->aboutId = $about->id;
        $this->vision = $about->vision;
        $this->mission = $about->mission;
    }

    public function update()
    {
        $user = Auth::user()->id;
        $about = ModelsAboutUs::find($this->aboutId);
        $about->added_by = $user;
        $about->vision = $this->vision;
        $about->mission = $this->mission;
        $about->save();
        if ($about->save()) {
            session()->flash('success', "About updated successfully.");
            $this->redirect(AboutUs::class);
        } else {
            $this->dispatch('showErrorMessage', "Unable to update about. Please try again.");
        }
    }
}
