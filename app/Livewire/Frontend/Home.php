<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use App\Models\Product as ModelsProduct;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    public function render()
    {
        $products = ModelsProduct::paginate(8);
        return view('livewire.frontend.home', [
            'products' => $products,
        ])->extends('layouts.frontend.app');
    }
}
