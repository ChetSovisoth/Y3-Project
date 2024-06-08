<?php

namespace App\Livewire\Follow;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
class UnfollowFromFollowing extends Component
{
    public $userId;

    public function unfollowFollowing()
    {
        $user = Auth::user();
        $follow = User::find($this->userId);
        $user->unfollow($follow); // Assuming you have this method to follow a user
        $this->dispatch('followingUpdatedFollowing');
        $this->dispatch('followsUpdated');
    }
    public function render()
    {
        return view('livewire.follow.unfollow-from-following');
    }
}
