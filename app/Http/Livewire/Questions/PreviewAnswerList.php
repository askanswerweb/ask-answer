<?php

namespace App\Http\Livewire\Questions;

use App\Models\Question;
use Livewire\Component;

class PreviewAnswerList extends Component
{
    public Question $question;
    public $answers;

    public function mount(Question $question)
    {
        $this->question = $question;
        $this->answers = $this->question->answers()->with('user')->get();
    }

    public function render()
    {
        return view('livewire.questions.preview-answer-list');
    }
}
