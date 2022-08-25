<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [MovieController::class, 'index'])->name('index-movie');
Route::get('/search', [MovieController::class, 'search'])->name('search');
Route::get('/add', [MovieController::class, 'add'])->name('add-page');
Route::post('/addmovie', [MovieController::class, 'addmovie'])->name('add-movie');
Route::get('/edit/{id}', [MovieController::class, 'edit'])->name('edit-movie');
Route::post('/editmovie/{id}', [MovieController::class, 'update'])->name('update');
Route::delete('destroy/{id}', [MovieController::class, 'destroy'])->name('destroy');

