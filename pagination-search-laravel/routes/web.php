<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AdminController;

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
Route::get('/filterasc', [MovieController::class, 'asc'])->name('asc-movie');
Route::get('/filterdesc', [MovieController::class, 'desc'])->name('desc-movie');
Route::get('/search', [MovieController::class, 'search'])->name('search');
Route::get('/add', [MovieController::class, 'add'])->name('add-page');
Route::post('/addmovie', [MovieController::class, 'addmovie'])->name('add-movie');
Route::get('/edit/{id}', [MovieController::class, 'edit'])->name('edit-movie');
Route::post('/editmovie/{id}', [MovieController::class, 'update'])->name('update');
Route::delete('destroy/{id}', [MovieController::class, 'destroy'])->name('destroy');


Route::get('/genre', [GenreController::class, 'index'])->name('index-genre');
Route::get('/searchgenre', [GenreController::class, 'search'])->name('search-genre');
Route::get('/tambahgenre', [GenreController::class, 'add'])->name('tambah-genre');
Route::post('/addgenre', [GenreController::class, 'addgenre'])->name('add-genre');
Route::get('/editgenre/{id}', [GenreController::class, 'edit'])->name('edit-genre');
Route::post('genedit/{id}', [GenreController::class, 'update'])->name('update-genre');
Route::delete('destroygenre/{id}', [GenreController::class, 'destroy'])->name('destroy-genre');
