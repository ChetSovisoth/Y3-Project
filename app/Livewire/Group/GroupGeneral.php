<?php

namespace App\Livewire\Group;

use App\Models\Group;
use Livewire\Component;

class GroupGeneral extends Component
{
    public $name;
    public $photo;
    public $code;
    public $description;
    public $uuid;

    public function mount($uuid) {
        $this->uuid = $uuid;
        $this->fetchGroupDetail($uuid);
    }
    public function fetchGroupDetail($uuid) {
        $group = Group::getGroupDetail($uuid);
        $this->name = $group->name;
        $this->photo = $group->photo;
        $this->code = $group->code;
        $this->description = $group->description;
    }
    public function render()
    {
        return view('livewire.group.group-general');
    }
}
