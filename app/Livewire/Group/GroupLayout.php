<?php

namespace App\Livewire\Group;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class GroupLayout extends Component
{
    use WithFileUploads;
    public $name;
    public $photo;
    public $groups = [];

    protected $listeners = ['newGroupCreated' => 'fetchMentorGroup', 'newGroupJoined' => 'fetchStudentGroup'];

    public function mount() {
        if (Auth::user()->role === 'mentor') {
            $this->fetchMentorGroup();
        }
        else {
            $this->fetchStudentGroup();
        }

    }

    public function fetchMentorGroup() {
        $this->groups = Auth::user()->group;
        return $this->groups;
    }

    public function fetchStudentGroup() {
        $this->groups = Auth::user()->followings()->where('followable_type', 'App\Models\Group')->get();
        return $this->groups;
    }

    public function render()
    {
        return view('livewire.group.group-layout');
    }
}
