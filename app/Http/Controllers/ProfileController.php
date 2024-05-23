<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Resources\Resource\UserResource;
use App\Http\Resources\Resource\MentorResource;
use App\Http\Resources\Resource\StudentResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() {
        $user = (object) (new UserResource(Auth::user()))->resolve();
        $profile_picture = User::getProfilePicture();

        if ($user->role == 'admin') {
            return view('profile.profile', compact('user', 'profile_picture'));
        }  

        return view('profile.profile', compact('user', 'profile_picture'));
    }

    public function profileEdit() {
        $user = (object) (new UserResource(Auth::user()))->resolve();
        $profile_picture = User::getProfilePicture();
        
        if ($user->role == 'admin') {
            return view('profile.profile', compact('user', 'profile_picture'));
        }
        $user = (object) (new UserResource(Auth::user()))->resolve();
        return view('profile.edit_profile', compact('user',  'profile_picture'));
    }
}
