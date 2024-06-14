<?php

namespace App\Livewire\Follow;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FollowersList extends Component
{
    public $followings;
    public $followers;
    public $followingsCount;
    public $followersCount;

    protected $listeners = ['followerUpdated' => 'checkFollowersList'];

    public function mount()
    {
        // $this->followings = $followings;
        // $this->followers = $followers;    
        $this->checkFollowersList();
    }

    public function checkFollowersList()
    {
        $user = Auth::user();
        $this->followings = $user->followings;
        $this->followers = $user->followers;
        $this->followingsCount = $user->followings->count();
        $this->followersCount = $user->followers->count();
    }
    public function render()
    {
        return view('livewire.follow.followers-list');
    }
}
