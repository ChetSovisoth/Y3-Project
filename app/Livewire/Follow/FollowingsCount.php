<?php

namespace App\Livewire\Follow;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class FollowingsCount extends Component
{
    public $followingsCount;
    public $followersCount;
    protected $listeners = ['followsUpdated' => 'checkFollowingCount'];
    public function mount()
    {  
        $this->checkFollowingCount();
    }

    public function checkFollowingCount()
    {
        $user = Auth::user(); 
        $this->followingsCount = $user->followings->count();
        $this->followersCount = $user->followers->count();
    }
    public function render()
    {
        return view('livewire.follow.followings-count');
    }
}
