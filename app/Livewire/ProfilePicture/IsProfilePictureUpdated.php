<?php

namespace App\Livewire\ProfilePicture;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class IsProfilePictureUpdated extends Component
{
    public $profile_picture;
    public $name;
    public $email;

    protected $listeners = ['profileUpdated' => 'checkProfilePicture'];

    public function mount($profile_picture)
    {
        $this->profile_picture = $profile_picture;
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->checkProfilePicture();
    }
    public function checkProfilePicture()
    {
        $this->profile_picture = User::getProfilePicture();
    }
    public function render()
    {
        return view('livewire.profile-picture.is-profile-picture-updated');
    }
}
