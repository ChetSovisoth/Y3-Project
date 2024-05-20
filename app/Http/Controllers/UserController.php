<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
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

        return back()->with('success', 'Profile picture updated successfully.');
    }   

    public function removeProfilePicture() {  
        User::where('id', Auth::user()->id)->update(['avatar' => 'avatar.png']);
    
        return back()->with('danger', 'Profile picture removed successfully.');
    }

    public function updateBio(Request $request) {
        $validated = $request->validate([
            'bio' => 'max:256',
        ]); 
        
        User::where('id', Auth::user()->id)->update(['bio' => $validated['bio']]);
    
        return redirect()->route('user.profile')->with('success', 'Bio Updated successfully.');
    }    
}
