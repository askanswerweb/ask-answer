<?php

namespace App\Http\Livewire\Questions;

use App\Models\Media;
use App\Models\Question;
use Livewire\Component;

class Edit extends Component
{
    use QuestionTrait;

    protected $listeners = ['refreshQuestion' => '$refresh'];

    public function mount(Question $question)
    {
        $this->question = $question;
    }

    public function render()
    {
        return view('livewire.questions.edit', [
            'uploaded_files' => $this->question->getMedia()
        ]);
    }
}
