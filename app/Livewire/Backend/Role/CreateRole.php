<?php

namespace App\Livewire\Backend\Role;

use Livewire\Component;
use App\Models\PermissionGroup;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as ModelsRole;

class CreateRole extends Component
{
    public $name;
    public $permissionGroups;
    public $permissions;
    public $selectAllPermissions;
    public $approval_amount;

    protected $rules = [
        'name'        => 'required|max:255|unique:roles,name',
        'permissions' => 'required'
    ];
    protected $messages = [
        "name.required" => "Please enter role name",
        "permissions.required" => "Please select at least one permission"
    ];

    public function updated($field)
    {
        $this->validateOnly($field);
    }
    
    public function mount()
    {
        $this->selectAllPermissions = false;
        $this->permissionGroups = PermissionGroup::get();
        $this->permissions = collect();
        $this->approval_amount = 0;
    }

    public function updatedSelectAllPermissions($value)
    {
        $this->permissions = $value ? Permission::pluck('id') : collect();
    }

    public function updatedPermissions($value)
    {
        if (empty($value)) {
            $this->selectAllPermissions = false;
        } else {
            $uncheckedPermissions = $this->getUncheckedPermissionsCount();
            $this->selectAllPermissions = $uncheckedPermissions === 0;
        }
    }

    protected function getUncheckedPermissionsCount()
    {
        $allPermissionsCount = Permission::count();
        $checkedPermissionsCount = count($this->permissions);
        return $allPermissionsCount - $checkedPermissionsCount;
    }
    
    // public function updatedPermissions($value)
    // {
    //     if (!is_numeric($value)) {
    //         $this->selectAllPermissions = false;
    //     }
    // }

    public function render()
    {
        return view('livewire.backend.role.create-role')->extends('layouts.app');
    }

    public function store()
    {
        $this->validate();

        $role = new ModelsRole();
        $role->name =  $this->name;
        if ($role->save()) {

            $permissions = Permission::whereIn('id', $this->permissions)->get();

            $role->syncPermissions($permissions);

            session()->flash('success', "Role added successfully.");
            $this->redirect(Role::class);
        } else {
            $this->dispatch('showErrorMessage', "Unable to add role. Please try again.");
        }
    }
}
