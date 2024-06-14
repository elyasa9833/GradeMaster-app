<?php

use App\Http\Controllers\GradeController;
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

// index route
Route::get('/', function () {
    return view('welcome');
});

// student route
Route::resource('/student', UserController::class);

// grade route
Route::resource('/grades', GradeController::class);