<?php

namespace App\Http\Livewire;

use App\Business\Models\Answers;
use App\Business\Models\Branches;
use App\Business\Models\Questions;
use App\Business\Models\Users;
use App\Models\Answer;
use App\Models\Branch;
use App\Models\User;
use Livewire\Component;

class Home extends Component
{
    // Filters
    public $date_from;
    public $date_to;

    // Variables
    protected $queryString = ['date_from', 'date_to'];

    public function mount()
    {
    }

    public function render()
    {
        $questions = Questions::lastMonths(options: $this->filters());
        $open_questions = array_sum(array_column($questions, 'open'));
        $resolved_questions = array_sum(array_column($questions, 'resolved'));
        $closed_questions = array_sum(array_column($questions, 'closed'));

        return view('livewire.home', [
            'users' => Users::filter(User::notAdmin(), $this->filters())->count(),
            'users_workers' => Users::filter(User::worker(), $this->filters())->count(),
            'users_consultants' => Users::filter(User::consultant(), $this->filters())->count(),
            'all_users' => Users::filter(User::query(), $this->filters())->count(),
            'all_active_users' => Users::filter(User::active(), $this->filters())->count(),
            'questions' => $questions,
            'open_questions' => $open_questions,
            'resolved_questions' => $resolved_questions,
            'closed_questions' => $closed_questions,
            'branches' => Branches::filter(Branch::query(), $this->filters())->count(),
            'answers' => Answers::filter(Answer::query(), $this->filters())->count(),
            'top_branches' => Branches::topBranches(),
        ]);
    }

    protected function filters(): array
    {
        return [
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
        ];
    }
}
