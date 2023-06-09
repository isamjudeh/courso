<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            'course_image' => $this->course->image,
            'course_name' => $this->course->name,
            'approved' => $this->admin_approved,
            'registeration_id' => $this->registeration_id,
        ];
    }
}
