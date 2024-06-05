<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function follow($id) {
        $user = Auth::user();
        $userToFollow = User::findOrFail($id);

        // Check if the user is not already following the other user
        if (!$user->following()->where('following_id', $id)->exists()) {
            $user->following()->attach($userToFollow);
            return redirect()->back()->with('success', 'User followed successfully.');
        }

        return redirect()->back()->with('info', 'You are already following this user.');
    }

    public function unfollow($id) {
        $user = Auth::user();
        $userToUnfollow = User::findOrFail($id);

        // Check if the user is already following the other user
        if ($user->following()->where('following_id', $id)->exists()) {
            $user->following()->detach($userToUnfollow);
            return redirect()->back()->with('success', 'User unfollowed successfully.');
        }

        return redirect()->back()->with('success', 'User followed successfully.');
    }
}
