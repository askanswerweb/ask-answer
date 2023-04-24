<?php

namespace App\Http\Livewire\Feeds;

use App\Business\Livewire\Tables;
use App\Business\Models\Questions;
use App\Business\Models\Users;
use App\Models\Branch;
use App\Models\Question;

class Index extends Tables
{
    // Filters
    public $question_id;
    public $title;
    public $status;
    public $user_id;
    public $branch_id;

    protected $listeners = ['refreshIndexHome' => '$refresh'];
    public $topUsers;
    public $lastQuestions;
    public ?Branch $branch = null;

    public function mount()
    {
        if (!auth()->user()->isWorker()) {
            $this->topUsers = Users::topFive();
        } else {
            $this->lastQuestions = Questions::lastFive();
        }

        $this->branch = $this->branch_id ? Branch::find($this->branch_id) : null;
    }

    public function render()
    {
        return view('livewire.feeds.index', [
            'list' => $this->pagination()
        ]);
    }

    protected function query()
    {
        $query = Question::with(['branch', 'user', 'images', 'answers' => function ($query) {
            $query->whereHas('user');
            $query->with('user');
            $query->latest();
        }])
            ->whereHas('user')
            ->latest();

        return Questions::filter($query, [
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
            'user_id' => auth()->user()->isWorker() ? auth()->id() : $this->user_id,
            'question_id' => $this->question_id,
            'title' => $this->title,
            'status' => $this->status,
            'branch_id' => $this->getBranch(),
        ]);
    }

    public function resetFilters()
    {
        $this->resetExcept('topUsers');
        $this->dispatchBrowserEvent('select2_clear');
        $this->dispatchBrowserEvent('clear-date-range');
    }

    protected function queryString(): array
    {
        return ['date_from', 'date_to', ...$this->paginationFactors()];
    }

    protected function paginationFactors(): array
    {
        return ['user_id', 'question_id', 'title', 'status', 'branch_id'];
    }

    private function getBranch()
    {
        if (auth()->user()->isAdmin()) {
            return $this->branch_id;
        }

        return auth()->user()->branches()->pluck('id')->toArray();
    }
}
