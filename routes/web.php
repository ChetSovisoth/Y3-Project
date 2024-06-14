<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UploadController;
use App\Http\Middleware\MentorStudentRoleMiddleware;
use App\Http\Middleware\VerifyMiddleware;
use App\Http\Middleware\AdminMiddleware;
use Chatify\Http\Controllers\MessagesController;
use Illuminate\Http\Request;


Route::group([
    'middleware' => 'auth.banned'
], function () {

    Route::get('/', function () {
        return view('homepage');
    })->name('home');

    Auth::routes(['verify' => true]);

    Route::get('/contact', function () {
        return view('layout.contact');
    });

    Route::get('/error', function () {
        return view('error.404Error');
    })->name('error.no-access');

    // Route::get('/email/verify', function () {
    //     // $request->user()->sendEmailVerificationNotification();
    //     return view('auth.verify');
    // })->middleware('auth')->name('verification.notice');


    Route::group([
        'middleware' => 'auth'
    ], function () {

        Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile');

        Route::get('/profile/edit', [ProfileController::class, 'profileEdit'])->name('profile.edit');

        Route::post('/profile/picture/upload', [UserController::class, 'uploadProfilePicture'])->name('profile.picture.upload');

        Route::get('/email/verify/user', function (Request $request) {
            $request->user()->sendEmailVerificationNotification();
            return view('auth.verify');
        })->middleware('auth')->name('verification.notice.send');





        //Must be verify route
        Route::group([
            'middleware' => VerifyMiddleware::class
        ], function () {

            Route::get('/group', [GroupController::class, 'index'])->name('group');

            Route::get('/group/{name}/{uuid}/general', [GroupController::class, 'showGroup'])->name('show.group');

            Route::delete('/group/{name}/{uuid}/delete', [GroupController::class, 'deleteGroup'])->name('group.delete');

            Route::get('/group/{name}/{uuid}/details', [GroupController::class, 'showGroupDetail'])->name('group.detail');

            Route::get('/group/{name}/{uuid}/notes', [GroupController::class, 'showGroupNote'])->name('group.notes');

            // Note routes
            Route::get('/group/{uuid}/notes', [NoteController::class, 'index'])->name('notes.index');
            Route::get('/group/{uuid}/notes/create', [NoteController::class, 'create'])->name('notes.create');
            Route::post('/group/{uuid}/notes', [NoteController::class, 'store'])->name('notes.store');
            Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit');
            Route::put('/notes/{note}', [NoteController::class, 'update'])->name('notes.update');
            Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');

            Route::get('/group/{uuid}/uploads', [UploadController::class, 'index'])->name('uploads.index');
            Route::get('/group/{uuid}/uploads/create', [UploadController::class, 'create'])->name('uploads.create');
            Route::post('/group/{uuid}/uploads', [UploadController::class, 'store'])->name('uploads.store');
            Route::get('/uploads/{upload}/edit', [UploadController::class, 'edit'])->name('uploads.edit');
            Route::put('/uploads/{upload}', [UploadController::class, 'update'])->name('uploads.update');
            Route::delete('/uploads/{upload}', [UploadController::class, 'destroy'])->name('uploads.destroy');
            Route::get('/uploads/{upload}/download', [UploadController::class, 'download'])->name('uploads.download');


            Route::get('/group/{name}/{uuid}/uploads', [GroupController::class, 'showGroupUploads'])->name('group.uploads');

            Route::get('/discover', [MentorController::class, 'discoverMentor'])->name('discover.mentor');

            Route::get('/mentor/{name}/{uuid}', [MentorController::class, 'showMentorProfile'])->name('mentor.profile');

            Route::get('/{name}/{uuid}', [UserController::class, 'showUserProfile'])->name('show.user.profile');

            Route::get('/chat', [MessagesController::class, 'index'])->name('chat');

            Route::get('/chat/{id}', [MessagesController::class, 'index'])->name('user.chat.id');
        });

        //Admin specific route
        Route::group([
            'middleware' => AdminMiddleware::class
        ], function () {
            Route::get('/admin/display/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

            //Display
            Route::get('/admin/display/users', [UserController::class, 'index'])->name('admin.display.users');
            Route::get('/admin/display/mentors', [MentorController::class, 'index'])->name('admin.display.mentors');
            Route::get('/admin/display/students', [StudentController::class, 'index'])->name('admin.display.students');
            Route::get('/admin/display/groups', [GroupController::class, 'displayGroup'])->name('admin.display.groups');

            //Ban
            Route::get('/admin/display/banned/users', [UserController::class, 'displayBannedUsers'])->name('admin.display.banned.users');
            Route::post('/admin/ban/user/{user}', [AdminController::class, 'ban'])->name('admin.ban.user');
            Route::post('/admin/unban/user/{user}', [AdminController::class, 'unban'])->name('admin.unban.user');
        });
    });
});
