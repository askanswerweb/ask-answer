<?php

namespace App\Http\Livewire\Questions;

use App\Business\Livewire\WithEvents;
use App\Models\Question;

trait QuestionTrait
{
    use WithEvents;

    public Question $question;
    public array $images = [];

    protected function rules(): array
    {
        return [
            'question.title' => 'required',
            'question.description' => '',
            'images' => ''
        ];
    }

    public function save(): void
    {
        $this->validate();
        $exists = $this->question->exists;

        // Save Question
        $this->question->user_id = auth()->id();
        $this->question->save();

        if (!$exists) {
            if (count($this->images)) {
                // Save media
            }

            $this->created('Question');
            $this->redirect(route('questions.edit', ['question' => $this->question->id]));
            return;
        }

        $this->edited('Question');
    }
}
