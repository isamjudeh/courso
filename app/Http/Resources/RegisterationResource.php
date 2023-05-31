<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisterationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'birth_date' => $this->birth_date,
            'phone' => $this->phone,
            'sex' => $this->sex,
            'nationality' => $this->nationality,
            'address' => $this->address,
            'socail_status' => $this->socail_status,
            'certificate_type' => $this->certificate_type,
            'registered_before' => $this->registered_before,
            'approved' => $this->approved,
            'user_id' => $this->user_id,
            'course_id' => $this->course_id,
        ];
    }
}
