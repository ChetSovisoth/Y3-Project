<?php

namespace App\Livewire\Follow;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Follow extends Component
{
    public $userId;

    public function follow()
    {
        $user = Auth::user();
        $follow = User::find($this->userId);
        $user->follow($follow); // Assuming you have this method to follow a user
        $this->dispatch('statusUpdated'); // Emit event to notify parent component
        $this->dispatch('followsUpdated');

    }

    public function render()
    {
        return view('livewire.follow.follow');
    }
}
