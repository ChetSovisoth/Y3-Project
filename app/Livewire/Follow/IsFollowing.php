<?php

namespace App\Livewire\Follow;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class IsFollowing extends Component
{
    public $userId;
    public $isFollowing;

    protected $listeners = ['statusUpdated' => 'checkFollowStatus'];

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->checkFollowStatus();
    }

    public function checkFollowStatus()
    {
        $this->isFollowing = Auth::user()->isFollowing(User::find($this->userId));
    }
    public function render()
    {
        return view('livewire.follow.is-following');
    }
}
