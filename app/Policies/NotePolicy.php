<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Note;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotePolicy
{
    use HandlesAuthorization;

    public function update(User $user, Note $note)
    {
        return $user->role === 'admin' || $user->role === 'mentor';
    }

    public function delete(User $user, Note $note)
    {
        return $user->role === 'admin' || $user->role === 'mentor';
    }
}
