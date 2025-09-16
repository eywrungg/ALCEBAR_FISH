<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// Show login form
Route::get('/login', function () {
    return view('login'); // looks for resources/views/login.blade.php
})->name('login.index');

// Handle form submission
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

