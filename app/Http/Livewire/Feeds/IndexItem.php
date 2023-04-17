<?php

namespace App\Http\Livewire\Feeds;

use App\Business\Livewire\WithEvents;
use App\Models\Question;
use Livewire\Component;

class IndexItem extends Component
{
    use WithEvents;

    public Question $question;

    public function mount(Question $question)
    {
        $this->question = $question;
        $this->question->answers = $this->question->answers->take(3);;
    }

    public function render()
    {
        return view('livewire.feeds.index-item');
    }

    public function delete()
    {
        $this->question->delete();
        $this->deleted('question');
        $this->emitTo('home.index', 'refreshIndexHome');
    }
}
