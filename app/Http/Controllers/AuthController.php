<?php

namespace App\Http\Controllers;

use App\Business\Models\Users;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (!auth()->attempt(Users::credentials($request))) {
            return back()->with('error', __('auth.failed'))->withInput();
        }

        return auth()->user()->isAdmin() ? to_route('home') : to_route('question.feeds');
    }

    public function logout()
    {
        auth()->logout();
        return to_route('welcome');
    }
}
