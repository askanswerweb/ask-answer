<?php

namespace App\Http\Livewire\Questions;

use App\Models\Question;
use Livewire\Component;

class Create extends Component
{
    use QuestionTrait;

    public function mount()
    {
        $this->question = new Question;
    }

    public function render()
    {
        return view('livewire.questions.edit');
    }
}
