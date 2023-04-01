<?php

use App\Business\Localizations;
use App\Http\Controllers\AuthController;
use App\Http\Livewire\Users\Index as IndexUser;
use App\Http\Livewire\Users\Create as CreateUser;
use App\Http\Livewire\Users\Edit as EditUser;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::group(Localizations::routeGroup(), function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::middleware('guest')->group(function () {
        Route::view('login', 'auth.login')->name('login');
        Route::post('login', [AuthController::class, 'login'])->name('login.post');
    });

    Route::middleware('auth')->group(function () {
        Route::view('home', 'home')->name('home');
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        // Users
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', IndexUser::class)->name('index');
            Route::get('/create', CreateUser::class)->name('create');
            Route::get('/{user}/edit', EditUser::class)->name('edit');
        });
    });
});
