<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Faq as ModelsFaq;
use Illuminate\Support\Facades\Auth;

class CreateFaq extends Component
{
    use WithPagination;

    public $question;
    public $answer;

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

    public function render()
    {
        return view('livewire.backend.create-faq')->extends('layouts.app');
    }

    public function store()
    {
        $this->validate();
        $user = Auth::user()->id;
        $faq = new ModelsFaq();
        $faq->added_by = $user;
        $faq->question = $this->question;
        $faq->answer = $this->answer;
        $faq->save();

        session()->flash('success', 'FAQ Created Successfully!!');
        $this->redirect(Faq::class);
    }
}
