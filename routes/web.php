<?php

use Illuminate\Support\Facades\Route;

// Home
Route::get('/', function () {
    return view('index');
})->name('/');

// Auth Pages (Login & Register)
Route::prefix('auth')->group(function () {
    Route::get('/login', function () {
        return view('main.login');
    })->name('login');

    Route::get('/register', function () {
        return view('main.register');
    })->name('register');
});

// Other Pages
Route::prefix('main')->group(function () {
    Route::get('/profile', function () {
        return view('main.profile');
    })->name('profile');

    Route::get('/contact', function () {
        return view('main.contact');
    })->name('contact');

    Route::get('/error-404', function () {
        return view('main.error-404');
    })->name('error-404');

    Route::get('/data', function () {
        return view('main.tables-data');
    })->name('tables-data');

});
