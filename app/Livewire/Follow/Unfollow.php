<?php

namespace App\Livewire\Follow;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Unfollow extends Component
{
    public $userId;

    public function unfollow()
    {
        $user = Auth::user();
        $follow = User::find($this->userId);
        $user->unfollow($follow); // Assuming you have this method to follow a user
        $this->dispatch('followsUpdated');
        $this->dispatch('followingUpdated');
    }

    public function render()
    {
        return view('livewire.follow.unfollow');
    }
}
