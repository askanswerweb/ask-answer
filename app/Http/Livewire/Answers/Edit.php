<?php

namespace App\Http\Livewire\Answers;

use App\Models\Answer;
use Livewire\Component;

class Edit extends Component
{
    use AnswerTrait;

    public function mount(Answer $answer)
    {
        $this->answer = $answer;
    }

    public function render()
    {
        return view('livewire.answers.edit');
    }
}
