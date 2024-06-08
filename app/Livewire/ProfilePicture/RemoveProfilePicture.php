<?php

namespace App\Livewire\ProfilePicture;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class RemoveProfilePicture extends Component
{
    public $profile_picture;
    public function mount()
    {
        $this->profile_picture = '/storage/users-avatar/' . Auth::user()->avatar ?? '/storage/users-avatar/avatar.png';
    }
    public function removeProfilePicture() {
        if ($this->profile_picture !== '/storage/users-avatar/avatar.png') {
            Storage::disk('public')->delete(str_replace('/storage/', '', $this->profile_picture));
        }
        User::where('id', Auth::user()->id)->update(['avatar' => 'avatar.png']);
        $this->dispatch('profileUpdated'); 
    }
    public function render()
    {
        return view('livewire.profile-picture.remove-profile-picture');
    }
}
