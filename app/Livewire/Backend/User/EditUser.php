<?php

namespace App\Livewire\Backend\User;

use Livewire\Component;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Livewire\Backend\User\User as UserUser;

class EditUser extends Component
{
    public ModelsUser $user;
    public $userId;
    public $name;
    public $email;
    public $password;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'regex:/^[a-zA-Z ]*$/', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $this->user?->id],
            'password' => ['nullable', 'string', 'min:6'],
        ];
    }

    protected $messages = [
        "name.required" => "Please enter name",
        "email.required" => "Please enter an email"
    ];

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function mount(ModelsUser $user)
    {
        $this->user = $user;
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = '';
    }

    public function render()
    {
        return view('livewire.backend.user.edit-user')->extends('layouts.app');
    }

    public function update()
    {
        $this->validate();
        $authUser = Auth::user()->id;
        $user = ModelsUser::find($this->userId);
        $user->added_by = $authUser;
        $user->name = $this->name;
        $user->email = $this->email;
        
        if ($this->password) {
            $this->password = Hash::make($this->password);
            $this->reset('password');
        }

        if ($this->user->save()) {
            session()->flash('success', "User updated successfully.");
        } else {
            $this->dispatch('showErrorMessage', "Unable to update user. Please try again.");
        }

        $this->redirect(UserUser::class);
    }
}
