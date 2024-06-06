<?php

namespace App\Livewire\Follow;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FollowersCount extends Component
{
    public $followersCount;
    public $followingsCount;
    public $followers;
    public $followings;
    protected $listeners = ['followsUpdated' => 'checkFollowerCount'];

    public function mount($followersCount, $followers, $followingsCount, $followings)
    {
        $this->followersCount = $followersCount;
        $this->followingsCount = $followingsCount;
        $this->followers = $followers;
        $this->followings = $followings;
        $this->checkFollowerCount();
    }

    public function checkFollowerCount()
    {
        $this->followersCount = Auth::user()->followers->count();
        $this->followingsCount = Auth::user()->followings->count();
        $this->followers = Auth::user()->followers;
        $this->followings = Auth::user()->followings;
    }
    public function render()
    {
        return view('livewire.follow.followers-count');
    }
}
