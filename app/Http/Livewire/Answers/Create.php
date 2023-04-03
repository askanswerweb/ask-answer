<?php

namespace App\Http\Livewire\Answers;

use App\Business\Models\Medias;
use App\Models\Answer;
use App\Models\Question;
use Livewire\Component;

class Create extends Component
{
    use AnswerTrait;

    public Question $question;

    public function mount(Question $question)
    {
        $this->answer = new Answer;
        $this->question = $question;
    }

    public function render()
    {
        return view('livewire.answers.edit');
    }

    public function save()
    {
        $this->validate();

        $this->answer->question_id = $this->question->id;
        $this->answer->user_id = auth()->id();
        $this->answer->save();
        Medias::addMedia($this->answer, $this->files);

        $this->created('Answer');
        $this->redirect(route('questions.answers', ['question' => $this->question->id]));
    }
}
