<?php

namespace App\Livewire\Frontend;

use App\Models\Contact;
use Livewire\Component;
use App\Jobs\SendContactJob;
use App\Models\Address as ModelsAddress;

class ContactUs extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;
    private $addresses;

    protected $rules = [
        'name' => 'required',
        'email' => 'required',
    ];

    public function messages()
    {
        return [
            'name.required' => 'Please enter name',
            'email.required' => 'Please enter email',
        ];
    }

    public function updated($propertyName)
    {
        $validationFields =
            [
                'name',
                'email',
            ];

        if (in_array($propertyName, $validationFields)) {
            $this->validateOnly($propertyName);
        }
        return;
    }

    public function render()
    {
        $this->loadData();
        return view('livewire.frontend.contact-us', ['addresses' => $this->addresses,])
            ->extends('layouts.frontend.app');
    }

    public function loadData()
    {
        $this->addresses = ModelsAddress::all();
    }

    public function storeMessage()
    {
        $this->validate();
        $contact = new Contact([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message
        ]);
        $contact->save();
        SendContactJob::dispatch($contact);
        session()->flash('success', 'Message Sent Successfully!!');
    }
}
