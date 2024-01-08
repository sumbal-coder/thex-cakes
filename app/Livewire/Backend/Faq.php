<?php

namespace App\Livewire\Backend;

use App\Models\Faq as ModelsFaq;
use Livewire\Component;
use Livewire\WithPagination;

class Faq extends Component
{
    protected $listeners = ['destroy'];

    use WithPagination;
    private $faqs;
    public string $sortDirection = 'desc';
    public string $sortColumn = 'created_at';
    public $search;

    public function render()
    {
        $this->loadData();
        return view('livewire.backend.faq', ['faqs' => $this->faqs])->extends('layouts.app');
    }

    public function loadData()
    {
        $this->faqs = ModelsFaq::when($this->search !== '', function ($query) {
            return $query->where(function ($query) {
                $searchValues = preg_split('/\s+/', $this->search, -1, PREG_SPLIT_NO_EMPTY);
                foreach ($searchValues as $value) {
                    $query->where('question', 'LIKE', "%{$value}%")
                        ->orWhere('answer', 'LIKE', "%{$value}%");
                }
            });
        })
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate(10);
    }

    public function delete($faq)
    {
        $message = "Are you sure you want to delete faq. This action is not reversible.";
        $this->dispatch('showConfirmation', ['message' => $message, 'callback' => "destroy", 'model' => $faq]);
    }

    public function destroy($id)
    {
        $faq = ModelsFaq::find($id);

        if ($faq) {
            if ($faq->delete()) {
                $this->dispatch('showSuccessMessage', 'FAQ deleted successfully.');
            } else {
                $this->dispatch('showErrorMessage', 'Unable to delete faq. Please try again.');
            }
        } else {
            $this->dispatch('showErrorMessage', 'Unable to delete faq. Please try again.');
        }
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

    public function updating($name)
    {
        $searchList = [
            'search'
        ];

        if (in_array($name, $searchList)) {
            $this->gotoPage(1);
        }
        return;
    }

    public function resetFilters()
    {
        $this->search = '';
    }
}
