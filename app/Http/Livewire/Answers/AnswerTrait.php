<?php

namespace App\Http\Livewire\Answers;

use App\Business\Livewire\WithEvents;
use App\Business\Models\Medias;
use App\Models\Answer;
use Livewire\WithFileUploads;

trait AnswerTrait
{
    use WithEvents, WithFileUploads;

    public Answer $answer;
    public $files;

    protected function rules(): array
    {
        return ['answer.content' => 'required'];
    }

    public function save()
    {
        $this->validate();
        $exists = $this->answer->exists;

        $this->answer->save();
        Medias::addMedia($this->answer, $this->files);

        if ($exists) {
            $this->edited('Answer');
            $this->emitTo('media.index', 'refreshMedia');
            return;
        }

        $this->created('Answer');

        if ($this->answer->question) {
            $this->redirect(route('answers.index', ['question' => $this->answer->question->id]));
            return;
        }

        $this->redirect(route('answers.edit', ['answer' => $this->answer->id]));
    }
}
