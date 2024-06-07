<?php

namespace App\Livewire\Follow;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class FollowingsCount extends Component
{
    public $followingsCount;
    public $followersCount;
    protected $listeners = ['followsUpdated' => 'checkFollowingCount'];
    public function mount($followingsCount, $followersCount)
    {
        $this->followingsCount = $followingsCount;
        $this->followersCount = $followersCount;   
        $this->checkFollowingCount();
    }

    public function checkFollowingCount()
    {
        $this->followingsCount = Auth::user()->followings->count();
        $this->followersCount = Auth::user()->followers->count();
    }
    public function render()
    {
        return view('livewire.follow.followings-count');
    }
}
