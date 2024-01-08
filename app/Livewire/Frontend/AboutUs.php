<?php

namespace App\Livewire\Frontend;

use App\Models\AboutUs as ModelsAboutUs;
use Livewire\Component;

class AboutUs extends Component
{
    private $abouts;
    private $pages;

    public function render()
    {
        $this->loadData();
        return view('livewire.frontend.about-us', [
            'abouts' => $this->abouts,
            'pages' => $this->pages,
        ])
        ->extends('layouts.frontend.app');
    }

    public function loadData()
    {
        $this->abouts = ModelsAboutUs::all();
    }
}
