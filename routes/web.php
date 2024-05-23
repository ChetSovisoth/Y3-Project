<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GroupController;

Route::get('/', function () {
    return view('homepage');
});

Auth::routes();

Route::get('/contact', function() {
    return view('layout.contact');
});

Route::get('/group', [GroupController::class, 'index'])->name('group');

Route::get('/discover', [MentorController::class, 'discoverMentor'])->name('discover.mentor');

Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile');

Route::get('/profile/edit', [ProfileController::class, 'profileEdit'])->name('profile.edit');

Route::post('/profile/picture/upload', [UserController::class, 'uploadProfilePicture'])->name('profile.picture.upload');

Route::put('/profile/picture/remove', [UserController::class, 'removeProfilePicture'])->name('profile.picture.remove');

Route::put('/profile/bio/update', [UserController::class, 'updateBio'])->name('profile.bio.update');

Route::put('/profile/mentor/info/update', [MentorController::class, 'updateInfo'])->name('profile.mentor.info.update');

Route::put('/profile/student/info/update', [StudentController::class, 'updateInfo'])->name('profile.student.info.update');
