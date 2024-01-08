<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Product as ModelsProduct;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $name;
    public $price;
    public $description;
    public $image;

    protected $rules = [
        'name' => 'required',
        'price' => 'required',
        'description' => 'required',
        'image' => 'required|image',
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

    public function render()
    {
        return view('livewire.backend.create-product')->extends('layouts.app');
    }

    public function updatedName($name)
    {
        $this->name = $name;
    }

    public function updatedPrice($price)
    {
        $this->price = $price;
    }

    public function updatedDescription($description)
    {
        $this->description = $description;
    }

    public function updatedImage($image)
    {
        $this->image = $image;
    }

    public function store()
    {
        $this->validate();
        $user = Auth::user()->id;
        $product = new ModelsProduct();
        $product->added_by = $user;
        $product->name = $this->name;
        $product->price = $this->price;
        $product->description = $this->description;
        $product->image = $this->image;
        $path = $this->image->store("public/products");
        $product->image = "storage/" . substr($path, 7);
        $product->save();

        session()->flash('success', 'Product Created Successfully!!');
        $this->redirect(Product::class);
    }
}
