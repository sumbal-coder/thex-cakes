<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use App\Models\Faq as ModelsFaq;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Backend\Faq as BackendFaq;

class EditFaq extends Component
{
    public $question;
    public $answer;
    public $faqId;

    protected $rules = [
        'question' => 'required',
        'answer' => 'required',
    ];

    public function messages()
    {
        return [
            'question.required' => 'Please enter question',
            'answer.required' => 'Please enter answer',
        ];
    }

    public function updated($propertyName)
    {
        $validationFields =
            [
                'question',
                'answer',
            ];

        if (in_array($propertyName, $validationFields)) {
            $this->validateOnly($propertyName);
        }
        return;
    }

    public function mount(ModelsFaq $faq)
    {
        $this->faqId = $faq->id;
        $this->question = $faq->question;
        $this->answer = $faq->answer;
    }

    public function render()
    {
        return view('livewire.backend.edit-faq')->extends('layouts.app');
    }

    public function update()
    {
        $this->validate();
        $user = Auth::user()->id;
        $faq = ModelsFaq::find($this->faqId);
        $faq->added_by = $user;
        $faq->question = $this->question;
        $faq->answer = $this->answer;

        if ($faq->save()) {
            session()->flash('success', "FAQ updated successfully.");
            $this->redirect(BackendFaq::class);
        } else {
            $this->dispatch('showErrorMessage', "Unable to update faq. Please try again.");
        }
    }
}
