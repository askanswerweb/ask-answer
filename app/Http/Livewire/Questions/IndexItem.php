<?php

namespace App\Http\Livewire\Questions;

use App\Business\Livewire\WithEvents;
use App\Business\Models\Questions;
use App\Business\States\Question\Closed;
use App\Models\Question;
use Livewire\Component;

class IndexItem extends Component
{
    use WithEvents;

    public Question $question;
    public $reason;
    public $answers_count;

    public function mount(Question $question)
    {
        $this->question = $question;
        $this->answers_count = number_format($question->answers_count);
    }

    public function render()
    {
        return view('livewire.questions.index-item');
    }

    public function delete()
    {
        $this->question->delete();
        $this->emitTo('questions.index', 'refreshQuestions');
    }

    public function close()
    {
        $this->validate(['reason' => 'required']);

        $old_status = $this->question->status;
        $this->question->close_reason = $this->reason;
        $this->question->status->transitionTo(Closed::class);
        $this->question->save();

        Questions::logStatus($this->question, $old_status, reason: $this->reason);

        $this->saved('Question');
        $this->reset('reason');
    }
}
