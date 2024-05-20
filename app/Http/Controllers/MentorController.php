<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mentor;

class MentorController extends Controller
{
    public function updateInfo(Request $request) {
        $validated = $request->validate([
            'area_of_expertise' => 'required|max:50',
            'education_level' => 'required|in:bachelor,master,phd',
            'experience' => 'required|max:100',
        ]);  
        Auth::user()->mentor->update($validated);

        return redirect()->route('user.profile')->with('success', 'Info Updated successfully.');    
    }
}
