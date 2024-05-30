<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ChatController extends Controller
{
    public function getContacts(){
        $userId = auth()->id();
        $contacts = User::whereHas('messages', function($query) use ($userId) {
            $query->where('from_id', $userId)->orWhere('to_id', $userId);
        })->with(['messages' => function($query) use ($userId) {
            $query->where('from_id', $userId)
                ->orWhere('to_id', $userId)
                ->latest();
        }])->get();

        return response()->json($contacts);
    }


}
