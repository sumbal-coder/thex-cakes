<?php

namespace App\Livewire\Backend\User;

use App\Models\User;
use Livewire\Component;
use App\Models\PermissionGroup;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User as ModelsUser;

class RoleSetting extends Component
{
    public $roles;
    public User $user;
    public $role;
    public $permissionGroups;
    public $permissions;
    public $selectAllPermissions;
    public $advancedVisibility;

    protected $rules = [
        "role" => "required",
        "permissions" => "required"
    ];

    protected $messages = [
        "role.required" => "Please select role",
        "permissions.required" => "Please select at least one permission"
    ];

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function mount(User $user)
    {
        $this->user = $user;
        $this->roles = Role::get();
        $this->permissionGroups = PermissionGroup::get();
        $this->role = $user->roles()->first()?->id ?: '';
        $this->permissions = $this->role ? Role::find($this->role)->permissions->pluck('id') : collect();
        if ($this->permissions->count() !== Permission::count()) {
            $this->selectAllPermissions = false;
        } else {
            $this->selectAllPermissions = true;
        }
        $this->advancedVisibility = false;
    }

    public function updatedRole($value)
    {
        if ($value) {
            $role = Role::find($value);
            $this->permissions = $role->permissions->pluck('id');
            
            if ($this->permissions->count() !== Permission::count()) {
                $this->selectAllPermissions = false;
            } else {
                $this->selectAllPermissions = true;
            }
        } else {
            $this->permissions = collect();
            $this->selectAllPermissions = false;
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
        return view('livewire.backend.user.role-setting')->extends('layouts.app');
    }

    public function update()
    {
        $this->validate();
        $role = Role::find($this->role);
        $this->user->syncRoles($role);
        $permissions = Permission::whereIn('id', $this->permissions)->get();

        // sync permissions with user
        $this->user->syncPermissions($permissions);

        // sync permissions with role
        // $role->syncPermissions($permissions);

        // sync permissions with those users who have this role
        // $usersWithRole = User::role($role->name)->get();
        // foreach ($usersWithRole as $user) {
        //     $user->syncPermissions($permissions);
        // }

        $this->dispatch('showSuccessMessage', "Permissions updated successfully");
    }
    public function toggleAdvanceVisibility()
    {
        if ($this->advancedVisibility == false) {
            $this->advancedVisibility = true;
        } else {
            $this->advancedVisibility = false;
        }
    }
}
