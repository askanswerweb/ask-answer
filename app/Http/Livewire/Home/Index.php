<?php

namespace App\Http\Livewire\Home;

use App\Business\Livewire\Tables;
use App\Business\Models\Questions;
use App\Models\Question;

class Index extends Tables
{
    // Filters
    public $question_id;
    public $title;
    public $status;
    public $user_id;

    public function render()
    {
        return view('livewire.home.index', [
            'list' => $this->pagination()
        ]);
    }

    protected function query()
    {
        $query = Question::with(['user', 'images', 'answers' => function ($query) {
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
        ]);
    }
}
