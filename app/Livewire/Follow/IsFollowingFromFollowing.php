<?php

namespace App\Livewire\Follow;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IsFollowingFromFollowing extends Component
{
    public $userId;
    public $isFollowing;

    protected $listeners = ['followingUpdatedFollowing' => 'checkFollowStatusFollowing'];

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->checkFollowStatusFollowing();
    }

    public function checkFollowStatusFollowing()
    {
        $this->isFollowing = Auth::user()->isFollowing(User::find($this->userId));
    }
    public function render()
    {
        return view('livewire.follow.is-following-from-following');
    }
}
