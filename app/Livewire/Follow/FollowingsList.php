<?php

namespace App\Livewire\Follow;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FollowingsList extends Component
{
    public $followings;
    public $followers;
    public $followingsCount;
    public $followersCount;

    protected $listeners = ['followingUpdated' => 'checkFollowingsList'];
    public function mount()
    {
        $this->checkFollowingsList();
    }

    public function checkFollowingsList()
    {
        $user = Auth::user();
        $this->followings = $user->followings()->where('followable_type', 'App\Models\User')->get();
        $this->followers = $user->followers()->where('followable_type', 'App\Models\User')->get();
        $this->followingsCount = $user->followings->count();
        $this->followersCount = $user->followers->count();
    }
    public function render()
    {
        return view('livewire.follow.followings-list');
    }
}
