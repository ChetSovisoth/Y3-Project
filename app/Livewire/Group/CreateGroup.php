<?php

namespace App\Livewire\Group;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CreateGroup extends Component
{
    use WithFileUploads;

    public $name;
    public $photo;
    public $description;


    protected $rules = [
        'name' => 'required|string|max:255',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000', // 1MB Max
        'description' => 'nullable|string|max:1000',
    ];

    public function storeGroup()
    {
        $this->validate();

        $fileName = "default.jpg"; // Default photo in case no photo is uploaded

        if ($this->photo) {
            // Store the photo in the 'group-photos' folder and get the path
            $photoPath = $this->photo->store('group-photos', 'public');

            // Extract the file name from the path
            $fileName = basename($photoPath);
        }

        Group::create([
            'uuid' => Str::uuid()->toString(),
            'user_id' => Auth::id(),
            'name' => $this->name,
            'photo' => $fileName,
            'description' => $this->description,
        ]);

        // Reset the form fields
        $this->dispatch('newGroupCreated');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.group.create-group');
    }
}
