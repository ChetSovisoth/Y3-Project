<?php

namespace App\Livewire\ProfileInfo;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
class StudentProfileInfo extends Component
{
    public $institute;
    public $field_of_study;
    public $academic_level;
    public $bio;

    // protected $listeners = ['flashMessage'];
    // public function flashMessage($type, $message)
    // {
    //     session()->flash('flash_notification.level', $type);
    //     session()->flash('flash_notification.message', $message);
    // }

    public function mount(User $user){
        $this->institute = $user->student->institute ?? '';
        $this->field_of_study = $user->student->field_of_study ?? '';
        $this->academic_level = $user->student->academic_level ?? '';
        $this->bio = $user->bio ?? '';
    }

    public function rules()
    {
        return [
            'institute' => 'required|max:50',
            'field_of_study' => 'required|max:50',
            'academic_level' => 'required|max:50',
            'bio' => 'max:255'
        ];
    }

    public function save(){
        $validated = $this->validate();
        $user =  Auth::user();

        $user->update(['bio' => $validated['bio']]);
        $user->student->update($validated);
        // $this->dispatch('flashMessage', 'success', 'Info successfully updated.');
        request()->session()->flash('success','Info successfully updated.');
    }

    public function render()
    {
        return view('livewire.profile-info.student-profile-info');
    }
}
