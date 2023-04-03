<?php

namespace App\Http\Livewire\Answers;

use App\Business\Models\Medias;
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

    public function save()
    {
        $this->validate();

        $this->answer->save();
        Medias::addMedia($this->answer, $this->files);

        $this->edited('Answer');
        $this->emitTo('media.index', 'refreshMedia');
    }
}
