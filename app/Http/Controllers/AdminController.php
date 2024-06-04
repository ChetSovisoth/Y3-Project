<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Mentor;
use App\Http\Resources\Resource\UserResource;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $totalUsers = User::whereNot('role', 'admin')->count();
        $totalStudents = User::whereHas('student')->count();
        $totalMentors = User::whereHas('mentor')->count();
        return view('admin.dashboard', compact('totalUsers', 'totalStudents', 'totalMentors'));
    }

    public function displayUsers() {
        $users = UserResource::collection(User::whereNot('role', 'admin')->get())->resolve();
        $users = array_map(function ($user) {
            return (object) $user;
        }, $users);
        return view('admin.display_users', compact('users'));
    }

    public function displayMentors() {
        return view('admin.display_mentors');
    }

    public function displayStudents() {
        return view('admin.display_students');
    }
}
