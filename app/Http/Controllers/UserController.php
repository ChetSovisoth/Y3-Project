<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\Resource\UserResource;

class UserController extends Controller
{
    public function index() {
        $users = UserResource::collection(User::notBanned()->whereNot('role', 'admin')->get())->resolve();
        $users = array_map(function ($user) {
            return (object) $user;
        }, $users);
        return view('admin.display_users', compact('users'));
    }

    public function displayBannedUsers() {
        $users = UserResource::collection(User::Banned()->get())->resolve();
        $users = array_map(function ($user) {
            return (object) $user;
        }, $users);
        return view('admin.display_banned_users', compact('users'));
    }

    public function showUserProfile($name, $uuid) {
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

    public function uploadProfilePicture(Request $request) {
        $validated = $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);
    
        $user = Auth::user();
        $profilePicture = $user->avatar; // Use the correct field name
    
        if ($request->hasFile('avatar')) {
            // Store the profile picture in the 'users-avatar' folder
            $profilePath = $request->file('avatar')->store('users-avatar', 'public');
            
            // Extract the file name from the path
            $fileName = basename($profilePath);
            $validated['avatar'] = $fileName;
    
            // Delete the old profile picture if it is not the default one
            if ($profilePicture != 'avatar.png') {
                Storage::disk('public')->delete('users-avatar/' . $profilePicture);
            }
        }
    
        // Update the user's avatar in the database
        User::where('id', $user->id)->update(['avatar' => $fileName]);

        return redirect()->back()->with('success', 'Profile picture updated successfully.');
    }   
}
