<?php

namespace App\Http\Livewire\Questions;

use App\Business\Livewire\WithEvents;
use App\Business\Models\Medias;
use App\Models\Question;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

trait QuestionTrait
{
    use WithEvents, WithFileUploads;

    public Question $question;
    public $files;

    protected function rules(): array
    {
        return [
            'question.title' => 'required',
            'question.description' => '',
            'files.*' => 'file|max:2048'
        ];
    }

    public function save(): void
    {
        $this->validate();
        $exists = $this->question->exists;

        // Save Question
        $this->question->user_id = $this->question->user_id ?: auth()->id();
        $this->question->save();
        Medias::addMedia($this->question, $this->files);

        if (!$exists) {
            $this->created('Question');
            $this->redirect(route('questions.edit', ['question' => $this->question->id]));
            return;
        }

        $this->edited('Question');
        $this->emitTo('media.index', 'refreshMedia');
    }
}
