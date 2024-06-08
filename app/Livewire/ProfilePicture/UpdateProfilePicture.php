<?php

namespace App\Livewire\ProfilePicture;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UpdateProfilePicture extends Component
{
    use WithFileUploads;
    public $profile_picture;

    public function mount()
    {
        $this->profile_picture = Auth::user()->avatar;
    }

    public function rules()
    {
        return [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000',
        ];
    }

    public function updateProfilePicture(Request $request)
    {
        // dd($request);
        $validated = $this->validate();
    
        $user = Auth::user();

    
        if ($request->hasFile('avatar')) {
            // Store the profile picture in the 'users-avatar' folder
            $profilePath = $request->file('avatar')->store('users-avatar', 'public');
            
            // Extract the file name from the path
            $fileName = basename($profilePath);
            $validated['avatar'] = $fileName;
    
            // Delete the old profile picture if it is not the default one
            if ($this->profile_picture != 'avatar.png') {
                Storage::disk('public')->delete('users-avatar/' . $this->profile_picture);
            }
        }
    
        // Update the user's avatar in the database
        User::where('id', $user->id)->update(['avatar' => $fileName]);;
        $this->dispatch('profileUpdated');

        session()->flash('message', 'Profile picture updated successfully.');
    }

    public function render()
    {
        return view('livewire.profile-picture.update-profile-picture');
    }
}
