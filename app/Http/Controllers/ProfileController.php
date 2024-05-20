<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() {
        $user = Auth::user();
        if ($user->role == 'student') {
            $profile = $user->student;
        } elseif ($user->role == 'mentor') {
            $profile = $user->mentor;
        }       
        $profile_picture = User::getProfilePicture();

        return view('profile.profile', compact('user', 'profile', 'profile_picture'));
    }
    public function profileEdit() {
        $user = Auth::user();
        if ($user->role == 'student') {
            $profile = $user->student;
        } elseif ($user->role == 'mentor') {
            $profile = $user->mentor;
        }       
        $profile_picture = User::getProfilePicture();

        return view('profile.edit_profile', compact('user', 'profile', 'profile_picture'));
    }
}
