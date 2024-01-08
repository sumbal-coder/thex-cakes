<?php

namespace App\Livewire\Backend\User;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User as ModelsUser;

class User extends Component
{
    use WithPagination;

    protected $listeners = ['destroy'];

    public string $search = '';
    private $users;
    public string $sortColumn = 'created_at';
    public string $sortDirection = 'desc';

    public function render()
    {
        $this->loadData();
        return view('livewire.backend.user.user', ['users' => $this->users])->extends('layouts.app');
    }

    public function loadData()
    {
        $this->users = ModelsUser::when($this->search !== '', function ($query) {
            return $query->where(function ($query) {
                $searchValues = preg_split('/\s+/', $this->search, -1, PREG_SPLIT_NO_EMPTY);
                foreach ($searchValues as $value) {
                    $query->where('name', 'LIKE', "%{$value}%")
                        ->orWhere('email', 'LIKE', "%{$value}%");
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

    public function updating($name): void
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

    public function delete($user)
    {
        $message = "Are you sure you want to delete user. This action is not reversible.";
        $this->dispatch('showConfirmation', ['message' => $message, 'callback' => "destroy", 'model' => $user]);
    }

    public function destroy($id)
    {
        $user = ModelsUser::find($id);

        if ($user) {
            if ($user->delete()) {
                $this->dispatch('showSuccessMessage', 'User deleted successfully.');
            } else {
                $this->dispatch('showErrorMessage', 'Unable to delete user. Please try again.');
            }
        } else {
            $this->dispatch('showErrorMessage', 'Unable to delete user. Please try again.');
        }
    }
}
