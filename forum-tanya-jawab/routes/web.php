<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ReplyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('/category', CategoryController::class)->except('show');
    Route::resource('/reply', ReplyController::class)->except('show');

    Route::get('/profile', [ProfileController::class, 'index']);
    Route::match(['put', 'patch'], '/profile/{profile}', [ProfileController::class, 'update']);
    Route::resource('/post', QuestionController::class);
});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
