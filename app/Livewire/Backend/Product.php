<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Product as ModelsProduct;

class Product extends Component
{
    protected $listeners = ['destroy'];

    use WithFileUploads;
    use WithPagination;

    private $products;
    public $name;
    public $description;
    public $image;
    public string $sortDirection = 'desc';
    public string $sortColumn = 'created_at';
    public $search;

    public function render()
    {
        $this->loadData();
        return view('livewire.backend.product', ['products' => $this->products])->extends('layouts.app');
    }

    public function loadData()
    {
        $this->products = ModelsProduct::when($this->search !== '', function ($query) {
            return $query->where(function ($query) {
                $searchValues = preg_split('/\s+/', $this->search, -1, PREG_SPLIT_NO_EMPTY);
                foreach ($searchValues as $value) {
                    $query->where('name', 'LIKE', "%{$value}%")
                        ->orWhere('price', 'LIKE', "%{$value}%");
                }
            });
        })
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate(10);
    }

    public function delete($product)
    {
        $message = "Are you sure you want to delete product. This action is not reversible.";
        $this->dispatch('showConfirmation', ['message' => $message, 'callback' => "destroy", 'model' => $product]);
    }

    public function destroy($id)
    {
        $product = ModelsProduct::find($id);

        if ($product) {
            if ($product->delete()) {
                $this->dispatch('showSuccessMessage', 'Product deleted successfully.');
            } else {
                $this->dispatch('showErrorMessage', 'Unable to delete product. Please try again.');
            }
        } else {
            $this->dispatch('showErrorMessage', 'Unable to delete product. Please try again.');
        }
    }

    // public function delete($id)
    // {
    //     $product = ModelsProduct::find($id);
    //     if (!$product) {
    //         session()->flash('error', 'Product not found.');
    //         return;
    //     }
    //     // if ($product->image) {
    //     //     Storage::delete('public/images/' . $product->image);
    //     // }
    //     $product->delete();
    //     session()->flash('success', 'Product Deleted Successfully.');
    // }

    public function sortBy(string $columnName): void
    {
        if ($this->sortColumn == $columnName) {
            $this->sortDirection = $this->swapColumnDirection();
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortColumn = $columnName;
    }

    public function swapColumnDirection(): string
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
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
        $this->search = '';
    }
}
