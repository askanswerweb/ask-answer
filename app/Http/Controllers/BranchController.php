<?php

namespace App\Http\Controllers;

use App\Business\Models\Branches;
use App\Business\Utilities\Pagination;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function select2(Request $request)
    {
        $query = Branches::filter(Branch::select2(), ['search' => $request->term]);
        if (auth()->user()->isWorker()) {
            $query->whereHas('users', fn($q) => $q->where('users.id', auth()->id()));
        }

        return Pagination::infinite($query, $request->all());
    }
}
