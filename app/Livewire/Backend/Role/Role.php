<?php

namespace App\Livewire\Backend\Role;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role as ModelRole;

class Role extends Component
{
    use WithPagination;

    protected $listeners = ['destroy'];

    public string $search = '';
    private $roles;
    public string $sortColumn = 'created_at';
    public string $sortDirection = 'desc';

    public function render()
    {
        $this->loadData();

        return view('livewire.backend.role.role', ["roles" => $this->roles])->extends('layouts.app');
    }

    public function loadData(): void
    {
        $this->roles = ModelRole::when($this->search !== '', function ($query) {
            return $query->where(function ($query) {
                $searchValues = preg_split('/\s+/', $this->search, -1, PREG_SPLIT_NO_EMPTY);
                foreach ($searchValues as $value) {
                    $query->where('name', 'LIKE', "%{$value}%");
                }
            });
        })
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate(10);
    }

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

    public function updating(string $name): void
    {
        $searchList = [
            'search'
        ];

        if (in_array($name, $searchList)) {
            $this->gotoPage(1);
        }
    }

    public function resetFilters(): void
    {
        $this->reset('search');
    }

    public function delete(string $role): void
    {
        $message = "Are you sure you want to delete role. This action is not reversible.";
        $this->dispatch('showConfirmation', ['message' => $message, 'callback' => "destroy", 'model' => $role]);
    }

    public function destroy(string $id): void
    {
        $role = ModelRole::find($id);

        if ($role) {
            if ($role->delete()) {
                $this->dispatch('showSuccessMessage', 'Role deleted successfully.');
            } else {
                $this->dispatch('showErrorMessage', 'Unable to delete role. Please try again.');
            }
        } else {
            $this->dispatch('showErrorMessage', 'Unable to delete role. Please try again.');
        }
    }
}
