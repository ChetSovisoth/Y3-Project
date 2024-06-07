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
    public function mount($followings, $followers)
    // public function mount($followings, $followers, $followingsCount, $followersCount)
    {
        $this->followings = $followings;
        $this->followers = $followers;   
        // $this->followingsCount = $followingsCount;
        // $this->followersCount = $followersCount;   
        $this->checkFollowingsList();
    }

    public function checkFollowingsList()
    {
        $this->followings = Auth::user()->followings;
        $this->followers = Auth::user()->followers;
        // $this->followingsCount = Auth::user()->followings->count();
        // $this->followersCount = Auth::user()->followers->count();
    }
    public function render()
    {
        return view('livewire.follow.followings-list');
    }
}
