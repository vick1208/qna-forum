<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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
Route::get('/about',[HomeController::class,'about']);

Route::get('/category',[CategoryController::class,'index']);
Route::get('/category/create',[CategoryController::class,'create']);
Route::post('/category',[CategoryController::class,'store']);
Route::get('/category/{category}/edit',[CategoryController::class,'edit']);
Route::match(['put','patch'],'/category/{category}',[CategoryController::class,'update']);
Route::delete('/category/{category}',[CategoryController::class,'destroy']);


