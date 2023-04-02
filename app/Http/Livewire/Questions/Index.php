<?php

namespace App\Http\Livewire\Questions;

use App\Business\Livewire\Tables;
use App\Business\Models\Questions;
use App\Models\Question;

class Index extends Tables
{
    protected $listeners = ['refreshQuestions' => '$refresh'];

    // Filters
    public $status;
    public $title;

    public function render()
    {
        return view('livewire.questions.index', ['list' => $this->pagination()]);
    }

    protected function query()
    {
        return Questions::filter(Question::with('user')->latest('id'), [
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
            'status' => $this->status,
            'title' => $this->title,
        ]);
    }

    protected function queryString(): array
    {
        return ['status', 'title', ...$this->paginationFactors()];
    }

    protected function paginationFactors(): array
    {
        return ['status', 'title'];
    }
}
