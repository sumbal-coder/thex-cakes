<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Content as ModelsContent;

class Content extends Component
{
    public $contentId;
    public $content;

    public function mount()
    {
        $content = ModelsContent::find(1);
        $this->contentId = $content->id;
        $this->content = $content->content;
    }

    public function render()
    {
        return view('livewire.backend.content')->extends('layouts.app');
    }

    public function update()
    {
        $user = Auth::user()->id;
        $content = ModelsContent::find($this->contentId);
        $content->added_by = $user;
        $content->content = $this->content;

        if ($content->save()) {
            session()->flash('success', "Content updated successfully.");
            $this->redirect(Content::class);
        } else {
            $this->dispatch('showErrorMessage', "Unable to update content. Please try again.");
        }
    }
}
