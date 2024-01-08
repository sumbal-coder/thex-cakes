<?php

namespace App\Livewire\Backend\User;

use Livewire\Component;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Livewire\Backend\User\User as UserUser;

class CreateUser extends Component
{
    public $name;
    public $email;
    public $password;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'regex:/^[a-zA-Z ]*$/', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
        ];
    }

    protected $messages = [
        "name.required" => "Please enter name",
        "email.required" => "Please enter an email",
        "password.required" => "Please enter password"
    ];

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function render()
    {
        return view('livewire.backend.user.create-user')->extends('layouts.app');
    }

    public function store()
    {
        $this->validate();

        $user = new ModelsUser();
        $user->added_by = Auth::user()->id;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->save();
        session()->flash('success', "User created successfully.");
        $this->redirect(UserUser::class);
    }
}
