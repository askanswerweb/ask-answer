<?php

namespace App\Http\Livewire\Questions;

use App\Models\Question;
use Livewire\Component;

class Edit extends Component
{
    use QuestionTrait;

    public function mount(Question $question)
    {
        $this->question = $question;
    }

    public function render()
    {
        return view('livewire.questions.edit');
    }
}
