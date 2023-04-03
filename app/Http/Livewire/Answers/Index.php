<?php

namespace App\Http\Livewire\Answers;

use App\Business\Livewire\Tables;
use App\Business\Models\Answers;
use App\Models\Answer;
use App\Models\Question;
use App\Models\User;

class Index extends Tables
{
    public Question $question;
    public ?User $selected_user = null;

    // Filters
    public $user_id;

    public function mount(Question $question)
    {
        $this->question = $question;
        if ($this->user_id) {
            $this->selected_user = User::find($this->user_id);
        }
    }

    public function render()
    {
        return view('livewire.answers.index', [
            'list' => $this->pagination()
        ]);
    }

    protected function query()
    {
        return Answers::filter(Answer::withCount('media'), [
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
            'question_id' => $this->question->id,
            'user_id' => $this->user_id,
        ]);
    }

    protected function paginationFactors(): array
    {
        return ['user_id'];
    }

    protected function queryString(): array
    {
        return ['user_id', ...$this->paginationFactors()];
    }

    public function resetFilters()
    {
        $this->resetExcept('question');
        $this->dispatchBrowserEvent('clear-select2');
        $this->dispatchBrowserEvent('clear-date-range');
    }
}
