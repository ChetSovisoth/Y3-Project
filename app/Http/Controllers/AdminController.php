<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Mentor;
use App\Http\Resources\Resource\UserResource;
use App\Models\Group;
use Illuminate\Http\Request;
use Mchev\Banhammer\Banhammer;

class AdminController extends Controller
{
    public function index() {
        $totalUsers = User::notBanned()->whereNot('role', 'admin')->count();
        $totalStudents = User::notBanned()->whereHas('student')->count();
        $totalMentors = User::notBanned()->whereHas('mentor')->count();
        $totalMentors = User::notBanned()->whereHas('mentor')->count();
        $totalUsersBanned = User::Banned()->count();
        $totalGroups = Group::count();

        return view('admin.dashboard', compact('totalUsers', 'totalStudents', 'totalMentors', 'totalUsersBanned', 'totalGroups'));
    }

    public function ban(User $user) {
        $user->ban();
        return redirect()->back();
    }

    public function unban(User $user) {
        $user->unban();
        return redirect()->back();
    }
}
