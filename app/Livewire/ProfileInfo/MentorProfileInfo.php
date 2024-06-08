<?php

namespace App\Livewire\ProfileInfo;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    public function saveMentorInfo(){
        $validated = $this->validate();
        $user_id =  Auth::user()->id;
        $user =  Auth::user();

        User::where('id', $user_id)->update(['bio' => $validated['bio']]);
        $user->mentor->update($validated);

        Session::flash('success','Info successfully updated.');
    }
    public function render()
    {
        return view('livewire.profile-info.mentor-profile-info');
    }
}
