<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Chatify\Http\Controllers\MessagesController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('homepage');
});

Auth::routes();

// Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/contact', function() {
    return view('layout.contact');
});

Route::get('/profile', function() {
    return view('profile.profile');
})->name('user.profile');

Route::get('/group', function() {
    return view('group');
});

Route::post('/profile/picture/upload', [UserController::class, 'uploadProfilePicture'])->name('profile.picture.upload');

Route::put('/profile/picture/remove', [UserController::class, 'removeProfilePicture'])->name('profile.picture.remove');

Route::put('/profile/bio/update', [UserController::class, 'updateBio'])->name('profile.bio.update');

Route::get('/profile/edit', function() {
    return view('profile.edit_profile');
})->name('profile.edit');