<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::any('book/search', [BookController::class, 'search'])->name('book.search');

// simple crud;

// GET/contacts, mapped to the index() method,
// GET /contacts/create, mapped to the create() method,
// POST /contacts, mapped to the store() method,
// GET /contacts/{contact}, mapped to the show() method,
// GET /contacts/{contact}/edit, mapped to the edit() method,
// PUT/PATCH /contacts/{contact}, mapped to the update() method,
// DELETE /contacts/{contact}, mapped to the destroy() method.

Route::resource('/book', BookController::class)->middleware('auth');


