<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Chatify\Http\Controllers\MessagesController;

Route::get('/', function () {
    return view('homepage');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/contact', function() {
    return view('layout.contact');
});
