<?php

namespace App\Http\Livewire\Answers;

use App\Business\Livewire\Tables;
use App\Models\Answer;
use App\Models\Question;

class Index extends Tables
{
    public Question $question;

    public function mount(Question $question)
    {
        $this->question = $question;
    }

    public function render()
    {
        return view('livewire.answers.index', [
            'list' => $this->pagination()
        ]);
    }

    protected function query()
    {
        return Answer::withCount('media')->where('question_id', $this->question->id);
    }
}
