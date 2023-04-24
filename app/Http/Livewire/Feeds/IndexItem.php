<?php

namespace App\Http\Livewire\Feeds;

use App\Business\Livewire\WithEvents;
use App\Models\Question;
use Livewire\Component;

class IndexItem extends Component
{
    use WithEvents;

    public Question $question;
    public ?int $answers_count = 0;
    public $new_branch_id;
    protected $listeners = ['refreshIndexFeedItem' => '$refresh'];

    public function mount(Question $question)
    {
        $this->question = $question;
        $this->answers_count = $this->question->answers_count;
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

    public function changeBranch()
    {
        $this->validate(['new_branch_id' => 'required']);

        $this->question->branch_id = $this->new_branch_id;
        $this->question->save();

        $this->reset('new_branch_id');
        $this->dispatchBrowserEvent('clear-select2');
        $this->emitSelf('refreshIndexFeedItem');
        $this->saved();
    }
}
