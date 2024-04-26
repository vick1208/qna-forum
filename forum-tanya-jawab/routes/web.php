<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function(){
    return view('home',['title' => 'Home']);
});
Route::get('/about',function () {
    return view('about',['title' => 'About']);
});

Route::middleware(['auth'])->group(function(){
    Route::get('/category',[CategoryController::class,'index']);
    Route::get('/category/create',[CategoryController::class,'create']);
    Route::post('/category',[CategoryController::class,'store']);
    Route::get('/category/{category}/edit',[CategoryController::class,'edit']);
    Route::match(['put','patch'],'/category/{category}',[CategoryController::class,'update']);
    Route::delete('/category/{category}',[CategoryController::class,'destroy']);


    Route::post('/reply/{post}',[ReplyController::class,'store']);
});

Route::resource('/post',QuestionController::class);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
