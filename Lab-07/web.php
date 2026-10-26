<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('home', ['course' => 'Laravel']);
});

Route::get('/about', function () {
    return view('about');
});

// Guest routes: users who are not logged in
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.store');

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.store');
});

// Routes requiring login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [BookController::class, 'index'])
        ->name('dashboard');

    Route::post('/books', [BookController::class, 'store'])
        ->name('books.store');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});
