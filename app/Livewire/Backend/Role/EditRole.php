<?php

namespace App\Livewire\Backend\Role;

use App\Models\User as ModelsUser;
use Livewire\Component;
use App\Models\PermissionGroup;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as ModelsRole;

class EditRole extends Component
{
    public ModelsRole $role;
    public $name;
    public $permissionGroups;
    public $permissions;
    public $selectAllPermissions;
    public $approval_amount;

    protected function rules()
    {
        return [
            'role.name' => 'required|max:255|unique:roles,name,' . $this->role->id,
            'role.amount' => 'nullable',
            'permissions' => "required"
        ];
    }

    protected $messages = [
        "role.name.required" => "Please enter role name",
        "permissions.required" => "Please select at least one permission"
    ];

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function mount(ModelsRole $role)
    {
        $this->role = $role;
        $this->name = $role->name;
        $this->permissionGroups = PermissionGroup::get();
        $this->permissions = $this->role->permissions->pluck('id') ?: collect();

        if ($this->permissions->count() !== Permission::count()) {
            $this->selectAllPermissions = false;
        } else {
            $this->selectAllPermissions = true;
        }
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
            $this->selectAllPermissions = $uncheckedPermissions === 0 ? true : false;
        }
    }

    protected function getUncheckedPermissionsCount()
    {
        $allPermissionsCount = Permission::count();
        $checkedPermissionsCount = count($this->permissions);
        return $allPermissionsCount - $checkedPermissionsCount;
    }

    public function render()
    {
        return view('livewire.backend.role.edit-role')->extends('layouts.app');
    }

    public function update()
    {
        $this->validate();

        if ($this->role->save()) {

            // sync permissions with role
            $permissions = Permission::whereIn('id', $this->permissions)->get();
            $this->role->syncPermissions($permissions);

            // sync permissions with those users who have this role
            // $usersWithRole = User::role($this->role->name)->get();
            // foreach ($usersWithRole as $user) {
            //     $user->syncPermissions($permissions);
            // }

            session()->flash('success', "Role and associated user permissions updated successfully.");
            $this->redirect(Role::class);
        } else {
            $this->dispatch('showErrorMessage', "Unable to update role. Please try again.");
        }
    }
}
