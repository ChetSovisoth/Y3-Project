<?php

namespace App\Livewire\Follow;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FollowersCount extends Component
{
    public $followersCount;
    public $followingsCount;
    protected $listeners = ['followsUpdated' => 'checkFollowerCount'];

    public function mount()
    {
        // $this->followersCount = $followersCount;
        // $this->followingsCount = $followingsCount;

        $this->checkFollowerCount();
    }
    

    public function checkFollowerCount()
    {
        $user = Auth::user(); 
        $this->followingsCount = $user->followings->count();
        $this->followersCount = $user->followers->count();
    }
    public function render()
    {
        return view('livewire.follow.followers-count');
    }
}
