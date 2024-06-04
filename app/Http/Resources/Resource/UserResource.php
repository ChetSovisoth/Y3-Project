<?php

namespace App\Http\Resources\Resource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Resource\StudentResource;
use App\Http\Resources\Resource\MentorResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'uuid' => $this->uuid,
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'role' => $this->role,
            'bio' => $this->bio,
            'avatar' => $this->avatar,
            'mentor' => $this->when($this->role === 'mentor', new MentorResource($this->mentor)),
            'student' => $this->when($this->role === 'student', new StudentResource($this->student)),
        ];
    }
}
