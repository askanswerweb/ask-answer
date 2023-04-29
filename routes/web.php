<?php

use App\Business\Localizations;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Answers\{Create as CreateAnswer, Edit as EditAnswer, Index as IndexAnswer};
use App\Http\Livewire\Branches\{Create as CreateBranch, Edit as EditBranch, Index as IndexBranch};
use App\Http\Livewire\Feeds\Index as IndexFeed;
use App\Http\Livewire\Questions\{Create as CreateQuestion, Edit as EditQuestion, Index as IndexQuestion};
use App\Http\Livewire\Questions\Preview as PreviewQuestion;
use App\Http\Livewire\Users\{Create as CreateUser, Edit as EditUser, Index as IndexUser};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::group(Localizations::routeGroup(), function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::middleware('guest')->group(function () {
        Route::view('login', 'auth.login')->name('login');
        Route::post('login', [AuthController::class, 'login'])->name('login.post');
        Route::get('register', Register::class)->name('register');
    });

    Route::middleware('auth')->group(function () {
        Route::get('home', [HomeController::class, 'home'])->name('home');
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        // Users
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', IndexUser::class)->name('index');
            Route::get('/create', CreateUser::class)->name('create');
            Route::get('/{user}/edit', EditUser::class)->name('edit');
        });

        // Questions
        Route::get('question-feeds', IndexFeed::class)->name('question.feeds');
        Route::prefix('questions')->name('questions.')->group(function () {
            Route::get('/', IndexQuestion::class)->name('index');
            Route::get('/create', CreateQuestion::class)->name('create');
            Route::get('/{question}/edit', EditQuestion::class)->name('edit');
            Route::get('/{question}/answers', IndexAnswer::class)->name('answers');
            Route::get('/{question}/answers/create', CreateAnswer::class)->name('answers.create');
            Route::get('/{question}/preview', PreviewQuestion::class)->name('preview');
        });

        // Answers
        Route::prefix('answers')->name('answers.')->group(function () {
            Route::get('/', IndexAnswer::class)->name('index');
            Route::get('/create', CreateAnswer::class)->name('create');
            Route::get('/{answer}/edit', EditAnswer::class)->name('edit');
        });

        // Branches
        Route::prefix('branches')->name('branches.')->group(function () {
            Route::get('/', IndexBranch::class)->name('index');
            Route::get('/create', CreateBranch::class)->name('create');
            Route::get('/{branch}/edit', EditBranch::class)->name('edit');
        });

        Route::prefix('dropzone')->group(function () {
            Route::prefix('questions')->name('questions')->group(function () {
                Route::post('save-image', [QuestionController::class, 'saveImage'])->name('images.post');
                Route::post('delete-image', [QuestionController::class, 'deleteImage'])->name('images.delete');
            });
        });

        Route::prefix('select2')->name('select2.')->group(function () {
            Route::get('users', [UserController::class, 'select2'])->name('users');
            Route::get('branches', [BranchController::class, 'select2'])->name('branches');
        });
    });

    Route::prefix('select2')->name('select2.')->group(function () {
        Route::get('branches', [BranchController::class, 'select2'])->name('branches');
    });
});
