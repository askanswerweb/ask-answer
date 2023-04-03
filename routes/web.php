<?php

use App\Business\Localizations;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Answers\{Index as IndexAnswer, Create as CreateAnswer, Edit as EditAnswer};
use App\Http\Livewire\Questions\{Index as IndexQuestion, Create as CreateQuestion, Edit as EditQuestion};
use App\Http\Livewire\Users\{Index as IndexUser, Create as CreateUser, Edit as EditUser};
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

        // Questions
        Route::prefix('questions')->name('questions.')->group(function () {
            Route::get('/', IndexQuestion::class)->name('index');
            Route::get('/create', CreateQuestion::class)->name('create');
            Route::get('/{question}/edit', EditQuestion::class)->name('edit');
            Route::get('/{question}/answers', IndexAnswer::class)->name('answers');
            Route::get('/{question}/answers/create', CreateAnswer::class)->name('answers.create');
        });

        // Answers
        Route::prefix('answers')->name('answers.')->group(function () {
            Route::get('/', IndexAnswer::class)->name('index');
            Route::get('/create', CreateAnswer::class)->name('create');
            Route::get('/{answer}/edit', EditAnswer::class)->name('edit');
        });

        Route::prefix('dropzone')->group(function () {
            Route::prefix('questions')->name('questions')->group(function () {
                Route::post('save-image', [QuestionController::class, 'saveImage'])->name('images.post');
                Route::post('delete-image', [QuestionController::class, 'deleteImage'])->name('images.delete');
            });
        });

        Route::prefix('select2')->name('select2.')->group(function () {
            Route::get('users', [UserController::class, 'select2'])->name('users');
        });
    });
});
