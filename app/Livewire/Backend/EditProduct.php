<?php

namespace App\Livewire\Backend;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\Product as ModelsProduct;
use App\Livewire\Backend\Product as BackendProduct;

class EditProduct extends Component
{
    use WithFileUploads;
    use WithPagination;
    public User $user;

    public $name;
    public $price;
    public $description;
    public $oldImage;
    public $image;
    public $productId;

    protected $rules = [
        'name' => 'required',
        'price' => 'required',
        'description' => 'required',
        'image' => 'nullable|image',
    ];

    public function messages()
    {
        return [
            'name.required' => 'Please enter name',
            'price.required' => 'Please enter price',
            'description.required' => 'Please enter description',
            'image.required' => 'Please select image',
        ];
    }

    public function updated($propertyName)
    {
        $validationFields =
            [
                'name',
                'price',
                'description',
                'image',
            ];

        if (in_array($propertyName, $validationFields)) {
            $this->validateOnly($propertyName);
        }
        return;
    }

    public function mount(ModelsProduct $product)
    {
        $this->user = auth()->user();
        $this->productId = $product->id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->description = $product->description;
        $this->oldImage = $product->image;
        $this->image = '';
    }

    public function render()
    {
        return view('livewire.backend.edit-product')->extends('layouts.app');
    }

    public function update()
    {
        $this->validate();
        $user = Auth::user()->id;
        $product = ModelsProduct::find($this->productId);
        $product->added_by = $user;
        $product->name = $this->name;
        $product->price = $this->price;
        $product->description = $this->description;
        
        if ($this->image) {
            $path = $this->image->store("public/products");
            $product->image = "storage/" . substr($path, 7);
        }

        if ($product->save()) {
            session()->flash('success', "Product updated successfully.");
            $this->redirect(BackendProduct::class);
        } else {
            $this->dispatch('showErrorMessage', "Unable to update product. Please try again.");
        }
    }
}
