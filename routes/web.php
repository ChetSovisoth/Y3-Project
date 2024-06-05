<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FollowController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GroupController;
use App\Http\Middleware\MentorStudentRoleMiddleware;
use App\Http\Middleware\VerifyMiddleware;
use App\Http\Middleware\AdminMiddleware;
use Chatify\Http\Controllers\MessagesController;
use Illuminate\Http\Request;


Route::group([
    'middleware' => 'auth.banned'
], function() {

    Route::get('/', function () {
        return view('homepage');
    })->name('home');

    Auth::routes(['verify' => true]);

    Route::get('/contact', function() {
        return view('layout.contact');
    });

    Route::get('/error', function(){
        return view('error.404Error');
    })->name('error.no-access');  

    // Route::get('/email/verify', function () {
    //     // $request->user()->sendEmailVerificationNotification();
    //     return view('auth.verify');
    // })->middleware('auth')->name('verification.notice');


    Route::group([
        'middleware' => 'auth'
    ], function() {
        
        Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile');
        
        Route::get('/profile/edit', [ProfileController::class, 'profileEdit'])->name('profile.edit');
        
        Route::post('/profile/picture/upload', [UserController::class, 'uploadProfilePicture'])->name('profile.picture.upload');
        
        Route::put('/profile/picture/remove', [UserController::class, 'removeProfilePicture'])->name('profile.picture.remove');
        
        Route::put('/profile/bio/update', [UserController::class, 'updateBio'])->name('profile.bio.update');
        
        Route::put('/profile/mentor/info/update', [MentorController::class, 'updateInfo'])->name('profile.mentor.info.update');
        
        Route::put('/profile/student/info/update', [StudentController::class, 'updateInfo'])->name('profile.student.info.update');
        
        Route::get('/email/verify/user', function (Request $request) {
            $request->user()->sendEmailVerificationNotification();
            return view('auth.verify');
        })->middleware('auth')->name('verification.notice.send');

        Route::group([
            'middleware' => MentorStudentRoleMiddleware::class
        ], function() {
            Route::get('/group', [GroupController::class, 'index'])->name('group');    
        });


        //Must be verify route
        Route::group([
            'middleware' => VerifyMiddleware::class
        ], function() {
            Route::get('/discover', [MentorController::class, 'discoverMentor'])->name('discover.mentor');
            
            Route::get('/mentor/{name}/{uuid}/', [MentorController::class, 'showMentorProfile'])->name('mentor.profile');
            
            Route::get('/chat', [MessagesController::class, 'index'])->name('chat');
            
            Route::get('/chat/{id}', [MessagesController::class, 'index'])->name('user.chat.id');

            Route::post('/follow/{id}', [FollowController::class, 'follow'])->name('user.follow');

            Route::post('/unfollow/{id}', [FollowController::class, 'unfollow'])->name('user.unfollow');
        });

        //Admin specific route
        Route::group([
            'middleware' => AdminMiddleware::class
        ], function() {
            Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');    

            //Display
            Route::get('/admin/display/users', [UserController::class, 'index'])->name('admin.display.users');    
            Route::get('/admin/display/mentors', [MentorController::class, 'index'])->name('admin.display.mentors');    
            Route::get('/admin/display/students', [StudentController::class, 'index'])->name('admin.display.students');    

            //Ban
            Route::get('/admin/display/banned/users', [UserController::class, 'displayBannedUsers'])->name('admin.display.banned.users');    
            Route::post('/admin/ban/user/{user}', [AdminController::class, 'ban'])->name('admin.ban.user');    
            Route::post('/admin/unban/user/{user}', [AdminController::class, 'unban'])->name('admin.unban.user');    
        });
        
    });
});