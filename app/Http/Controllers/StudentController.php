<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Resources\Resource\UserResource;

class StudentController extends Controller
{
    public function index() {
        $users = UserResource::collection(User::notBanned()->whereNot('role', 'admin')->whereHas('student')->get())->resolve();
        $users = array_map(function ($user) {
            return (object) $user;
        }, $users);
        return view('admin.display_students', compact('users'));
    }

}
