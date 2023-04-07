<?php

namespace App\Http\Livewire\Questions;

use App\Models\Answer;
use Livewire\Component;
use Spatie\MediaLibrary\Support\MediaStream;

class PreviewAnswerItem extends Component
{
    public Answer $answer;

    public function mount(Answer $answer)
    {
        $this->answer = $answer;
    }

    public function render()
    {
        return view('livewire.questions.preview-answer-item');
    }

    public function download()
    {
        return MediaStream::create("answer-" . $this->answer->id . ".zip")->addMedia($this->answer->getMedia());
    }
}
