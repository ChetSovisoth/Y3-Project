<?php

namespace App\Livewire\Follow;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class FollowingsCount extends Component
{
    public $followingsCount;
    public $followersCount;
    public $followings;
    public $followers;
    protected $listeners = ['followsUpdated' => 'checkFollowingCount'];
    public function mount($followingsCount, $followings, $followersCount, $followers)
    {
        $this->followingsCount = $followingsCount;
        $this->followersCount = $followersCount;   
        $this->followings = $followings;
        $this->followers = $followers;
        $this->checkFollowingCount();
    }

    public function checkFollowingCount()
    {
        $this->followingsCount = Auth::user()->followings->count();
        $this->followersCount = Auth::user()->followers->count();
        $this->followings = Auth::user()->followings;
        $this->followers = Auth::user()->followers;
    }
    public function render()
    {
        return view('livewire.follow.followings-count');
    }
}
