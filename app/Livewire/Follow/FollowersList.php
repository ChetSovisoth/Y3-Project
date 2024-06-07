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

    public function mount($followings, $followers)
    {
        $this->followings = $followings;
        $this->followers = $followers;    
        $this->checkFollowersList();
    }

    public function checkFollowersList()
    {
        $this->followings = Auth::user()->followings;
        $this->followers = Auth::user()->followers;
    }
    public function render()
    {
        return view('livewire.follow.followers-list');
    }
}
