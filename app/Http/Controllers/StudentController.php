<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;

class StudentController extends Controller
{
    public function updateInfo(Request $request) {
        $validated = $request->validate([
            'institute' => 'required|max:50',
            'field_of_study' => 'required|max:50',
            'academic_level' => 'required|max:50',
        ]);  
        Auth::user()->student->update($validated);

        return redirect()->route('user.profile')->with('success', 'Info Updated successfully.');    
    }
}
