<?php

namespace App\Livewire\Follow;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FollowersCount extends Component
{
    public $followersCount;
    public $followingsCount;
    protected $listeners = ['followsUpdated' => 'checkFollowerCount'];

    public function mount($followersCount, $followingsCount)
    {
        $this->followersCount = $followersCount;
        $this->followingsCount = $followingsCount;

        $this->checkFollowerCount();
    }
    

    public function checkFollowerCount()
    {
        $this->followersCount = Auth::user()->followers->count();
        $this->followingsCount = Auth::user()->followings->count();
    }
    public function render()
    {
        return view('livewire.follow.followers-count');
    }
}
