<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Models\Author;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/contact', function () { 
    return view('contact'); 
 }); 
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users', UserController::class)->except('index','create','store');
Route::resource('books', BookController::class); 
Route::resource('authors', AuthorController::class); 
Route::resource('categories', CategoryController::class);
Route::resource('contacts', ContactController::class)->except('edit');