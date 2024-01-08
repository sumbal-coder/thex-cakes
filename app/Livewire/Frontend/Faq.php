<?php

namespace App\Livewire\Frontend;

use App\Models\Faq as ModelsFaq;
use Livewire\Component;

class Faq extends Component
{
    private $faqs;
    
    public function render()
    {
        $this->loadData();
        return view('livewire.frontend.faq', [
            'faqs' => $this->faqs,
        ])
        ->extends('layouts.frontend.app');
    }

    public function loadData()
    {
        $this->faqs = ModelsFaq::all();
    }
}
