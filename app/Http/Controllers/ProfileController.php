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
        $followersCount = Auth::user()->followers->count();
        $followingsCount = Auth::user()->followings->count();
        $followers = Auth::user()->followers;
        $followings = Auth::user()->followings;
        
        return view('profile.profile', compact('user', 'profile_picture'));
    }

    public function profileEdit() {
        $user = (object) (new UserResource(Auth::user()))->resolve();
        $profile_picture = User::getProfilePicture();
        $isVerified = Auth::user()->email_verified_at !== null ? true : false;

        $user = (object) (new UserResource(Auth::user()))->resolve();
        return view('profile.edit_profile', compact('user',  'profile_picture', 'isVerified'));
    }
}
