<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\UserController;
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

Route::get('/', function() {
    return view('static.initPage');
});

Route::resource('books', BookController::class);
Route::resource('users', UserController::class);
Route::resource('loans', LoanController::class);

Route::post('loans/{loan}/back', [LoanController::class,'back'])->name('loans.back');
