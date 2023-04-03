<?php

namespace App\Http\Livewire\Answers;

use App\Business\Livewire\WithEvents;
use App\Models\Answer;
use Livewire\Component;

class IndexItem extends Component
{
    use WithEvents;

    public Answer $answer;
    public $media_count;

    protected array $rules = ['answer.content' => 'required'];

    public function mount(Answer $answer)
    {
        $this->answer = $answer;
        $this->media_count = $this->answer->media_count;
    }

    public function render()
    {
        return view('livewire.answers.index-item');
    }

    public function save()
    {
        $this->validate();

        $this->answer->save();

        $this->edited('Answer');
        $this->dispatchBrowserEvent('saved_content_' . $this->answer->id);
    }
}
