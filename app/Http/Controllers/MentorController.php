<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Resource\UserResource;
use App\Models\User;

class MentorController extends Controller
{
    public function index() {
        $users = UserResource::collection(User::notBanned()->whereNot('role', 'admin')->whereHas('mentor')->get())->resolve();
        $users = array_map(function ($user) {
            return (object) $user;
        }, $users);
        return view('admin.display_mentors', compact('users'));
    }

    public function discoverMentor() {
        $verified_users = User::where('role', 'mentor')
                        ->whereHas('mentor', 
                            function ($query) {
                                $query
                                ->whereNotNull('area_of_expertise')
                                ->whereNotNull('education_level')
                                ->whereNotNull('experience'); 
                            })->get();

        $userObjects = UserResource::collection($verified_users)->resolve();
        $userObjects = array_map(function ($user) {
            return (object) $user;
        }, $userObjects);

        return view('discover', ['users' => $userObjects]);    
    }

    public function showMentorProfile($name, $uuid) {
        $auth_user = Auth::user();
        $followersCount = Auth::user()->followers->count();
        $followingsCount = Auth::user()->followings->count();
        $followers = Auth::user()->followers;
        $followings = Auth::user()->followings;
        $user = User::with('mentor')->where('uuid', $uuid)->firstOrFail();

        $user = (object) (new UserResource($user))->resolve();
        $profile_picture = User::getProfilePictureByAvatar($user->avatar);

        return view('profile.show_profile', compact('user',  'profile_picture', 'followersCount', 'followingsCount', 'followers', 'followings'));
    }
}
