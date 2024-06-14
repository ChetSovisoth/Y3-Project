<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Upload;
use Illuminate\Auth\Access\HandlesAuthorization;

class UploadPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Upload $upload)
    {
        return $user->role === 'admin' || $user->role === 'mentor';
    }

    public function delete(User $user, Upload $upload)
    {
        return $user->role === 'admin' || $user->role === 'mentor';
    }
}
