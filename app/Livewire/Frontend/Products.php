<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product as ModelsProduct;
use PHPUnit\Framework\Attributes\IgnoreFunctionForCodeCoverage;

class Products extends Component
{
    use WithPagination;

    public $sortBy;
    public $perPage;
    private $products;

    public function mount()
    {
        $this->sortBy = "default";
        $this->perPage = "8";
    }

    public function updatedSortby($sortBy)
    {
        $this->sortBy = $sortBy;
    }

    public function render()
    {
        $this->loadData();
        return view('livewire.frontend.products', [
            'products' => $this->products,
        ])->extends('layouts.frontend.app');
    }

    public function loadData()
    {
        if ($this->sortBy == 'default') {
            $this->products = ModelsProduct::paginate($this->perPage);
        } else if ($this->sortBy == 'latest') {
            $this->products = ModelsProduct::latest()->paginate($this->perPage);
        } else if ($this->sortBy == 'oldest') {
            $this->products = ModelsProduct::oldest()->paginate($this->perPage);
        } else if ($this->sortBy == 'high') {
            $this->products = ModelsProduct::orderBy('price', 'desc')->paginate($this->perPage);
        } else if ($this->sortBy == 'low') {
            $this->products = ModelsProduct::orderBy('price', 'asc')->paginate($this->perPage);
        }
    }
}
