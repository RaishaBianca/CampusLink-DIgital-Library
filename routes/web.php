<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LibraryController;

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

//show index page
Route::get('/', [LibraryController::class, 'index'])->name('home');

//show create form
Route::get('/libraries/create', [LibraryController::class, 'create'])->name('create');

//show profile page 
Route::get('/libraries/profile', [LibraryController::class, 'profile'])->name('profile');

//store book data
Route::post('/libraries', [LibraryController::class, 'store'])->name('store');

//show edit form 
Route::get('/libraries/{library}/edit', [LibraryController::class, 'edit'])->name('edit');

//update book data
Route::put('/libraries/{library}', [LibraryController::class, 'update'])->name('update');

//delete book data
Route::delete('/libraries/{library}', [LibraryController::class, 'destroy'])->name('destroy');

//show library page
Route::get('/libraries/{library}', [LibraryController::class, 'show'])->name('libraries');

//add book to list
Route::post('/libraries/{library}/list', [LibraryController::class, 'addToList'])->name('addToList');

//show register page
Route::get('/register', [UserController::class, 'create'])->name('register');

//create new user
Route::post('/users',[UserController::class, 'store'])->name('users');

//logout user
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

//show login form
Route::get('/login', [UserController::class, 'login'])->name('login');

//login user
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->name('authenticate');

//show category page
Route::get('/categories/{category}', [LibraryController::class, 'category'])->name('categories');
