<?php

namespace App\Http\Resources\Resource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MentorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'area_of_expertise' => $this->area_of_expertise,
            'education_level' => $this->education_level,
            'experience' => $this->experience,
        ];
    }
}
