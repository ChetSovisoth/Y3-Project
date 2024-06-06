<?php

namespace App\Livewire\ProfileInfo;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MentorProfileInfo extends Component
{
    public $area_of_expertise;
    public $education_level;
    public $experience;
    public $bio;
    public function mount(User $user){
        $this->area_of_expertise = $user->mentor->area_of_expertise ?? '';
        $this->education_level = $user->mentor->education_level ?? '';
        $this->experience = $user->mentor->experience ?? '';
        $this->bio = $user->bio ?? '';
    }

    public function rules()
    {
        return [
            'area_of_expertise' => 'required|max:50',
            'education_level' => 'required|in:bachelor,master,phd',
            'experience' => 'required|max:100',
            'bio' => 'max:255'
        ];
    }

    public function save(){
        $validated = $this->validate();
        $user =  Auth::user();

        $user->update(['bio' => $validated['bio']]);
        $user->mentor->update($validated);
        // $this->dispatch('flashMessage', 'success', 'Info successfully updated.');
        request()->session()->flash('success','Info successfully updated.');
    }
    public function render()
    {
        return view('livewire.profile-info.mentor-profile-info');
    }
}
