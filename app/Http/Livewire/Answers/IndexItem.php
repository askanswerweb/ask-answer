<?php

namespace App\Http\Livewire\Answers;

use App\Models\Answer;
use Livewire\Component;

class IndexItem extends Component
{
    public Answer $answer;
    public $media_count;

    public function mount(Answer $answer)
    {
        $this->answer = $answer;
        $this->media_count = $this->answer->media_count;
    }

    public function render()
    {
        return view('livewire.answers.index-item');
    }
}
