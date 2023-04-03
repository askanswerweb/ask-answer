<?php

namespace App\Http\Livewire\Answers;

use App\Business\Livewire\WithEvents;

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
}
