<?php

namespace App\Http\Controllers;

use App\Business\Models\Answers;
use App\Business\Models\Branches;
use App\Business\Models\Questions;
use App\Business\Models\Users;
use App\Models\Answer;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $questions = Questions::lastMonths(options: $request->all());
        $open_questions = array_sum(array_column($questions, 'open'));
        $resolved_questions = array_sum(array_column($questions, 'resolved'));
        $closed_questions = array_sum(array_column($questions, 'closed'));

        return view('home', [
            'users' => Users::filter(User::notAdmin(), $request->all())->count(),
            'users_workers' => Users::filter(User::worker(), $request->all())->count(),
            'users_consultants' => Users::filter(User::consultant(), $request->all())->count(),
            'all_users' => Users::filter(User::query(), $request->all())->count(),
            'all_active_users' => Users::filter(User::active(), $request->all())->count(),
            'questions' => $questions,
            'open_questions' => $open_questions,
            'resolved_questions' => $resolved_questions,
            'closed_questions' => $closed_questions,
            'branches' => Branches::filter(Branch::query(), $request->all())->count(),
            'answers' => Answers::filter(Answer::query(), $request->all())->count(),
            'top_branches' => Branches::topBranches(),
        ]);
    }
}
