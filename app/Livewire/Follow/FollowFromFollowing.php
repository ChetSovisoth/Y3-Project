<?php

namespace App\Livewire\Follow;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowFromFollowing extends Component
{
    public $userId;

    public function followFollowing()
    {
        $user = Auth::user();
        $follow = User::find($this->userId);
        $user->follow($follow); // Assuming you have this method to follow a user
        $this->dispatch('followingUpdatedFollowing');
        $this->dispatch('followsUpdated');

    }
    public function render()
    {
        return view('livewire.follow.follow-from-following');
    }
}
