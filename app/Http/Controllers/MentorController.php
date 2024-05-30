<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Resource\UserResource;
use App\Models\User;

class MentorController extends Controller
{
    public function updateInfo(Request $request) {
        $validated = $request->validate([
            'area_of_expertise' => 'required|max:50',
            'education_level' => 'required|in:bachelor,master,phd',
            'experience' => 'required|max:100',
        ]);  
        Auth::user()->mentor->update($validated);

        return redirect()->route('user.profile')->with('success', 'Info Updated successfully.');    
    }

    public function discoverMentor() {
        $verified_users = User::where('role', 'mentor')
                        ->whereNotNull('email_verified_at')
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
        $user = User::with('mentor')->where('uuid', $uuid)->firstOrFail();
        $user = (object) (new UserResource($user))->resolve();
        $profile_picture = User::getProfilePictureByAvatar($user->avatar);

        return view('profile.show_profile', compact('user',  'profile_picture'));
    }
}
