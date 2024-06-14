<?php

namespace App\Livewire\Group;

use App\Models\Group;
use App\Models\User;
use App\Notifications\JoinGroupNotification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class JoinGroup extends Component
{
    public $code;
    protected $rules = [
        'code' => 'required|string|size:6',
    ];

    public function joinGroup()
    {
        $validated = $this->validate();
        $user = Auth::user();

        if($group = Group::where('code', $validated['code'])->first()) {
            // Retrieve the group owner using the user_id from the group
            $groupOwner = User::find($group->user_id);
    
            // Make the user follow the group
            $user->follow($group);
    
            // Notify the group owner about the new member
            $groupOwner->notify(new JoinGroupNotification($user, $group));
        }

        $this->dispatch('newGroupJoined');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.group.join-group');
    }
}
