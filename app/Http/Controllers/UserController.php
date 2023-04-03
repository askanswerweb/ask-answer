<?php

namespace App\Http\Controllers;

use App\Business\Models\Users;
use App\Business\Utilities\Pagination;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function select2(Request $request)
    {
        $query = User::select(['id', DB::raw("CONCAT(id, ' - ', name) AS full_text")]);
        $query = Users::filter($query, ['search' => $request->term]);

        return Pagination::infinite($query, $request->all());
    }
}
