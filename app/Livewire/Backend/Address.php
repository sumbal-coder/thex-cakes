<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Address as ModelsAddress;

class Address extends Component
{
    public $title;
    public $address;
    public $optional_address;
    public $phone_number;
    public $optional_phone_number;
    public $website;
    public $optional_website;
    public $link;
    public $addressId;

    public function render()
    {
        return view('livewire.backend.address')->extends('layouts.app');
    }

    public function mount()
    {
        $address = ModelsAddress::find(1);
        $this->addressId = $address->id;
        $this->title = $address->title;
        $this->address = $address->address;
        $this->optional_address = $address->optional_address;
        $this->phone_number = $address->phone_number;
        $this->optional_phone_number = $address->optional_phone_number;
        $this->website = $address->website;
        $this->optional_website = $address->optional_website;
        $this->link = $address->link;
    }

    public function update()
    {
        $user = Auth::user()->id;
        $address = ModelsAddress::find($this->addressId);
        $address->added_by = $user;
        $address->title = $this->title;
        $address->address = $this->address;
        $address->optional_address = $this->optional_address;
        $address->phone_number = $this->phone_number;
        $address->optional_phone_number = $this->optional_phone_number;
        $address->website = $this->website;
        $address->optional_website = $this->optional_website;
        $address->link = $this->link;
        $address->save();
        if ($address->save()) {
            session()->flash('success', "Address updated successfully.");
            $this->redirect(Address::class);
        } else {
            $this->dispatch('showErrorMessage', "Unable to update address. Please try again.");
        }
    }
}
