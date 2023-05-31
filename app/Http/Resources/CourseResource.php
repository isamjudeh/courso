<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'description' => $this->description,
            'institute_id' => $this->institute_id,
            'category_id' => $this->category_id,
            'teacher_id' => $this->teacher_id,
            'regular_price' => $this->regular_price,
            'sale_price' => $this->sale_price,
            'sunday_start_time' => $this->sunday_start_time,
            'sunday_end_time' => $this->sunday_end_time,
            'monday_start_time' => $this->monday_start_time,
            'monday_end_time' => $this->monday_end_time,
            'tuesday_start_time' => $this->tuesday_start_time,
            'tuesday_end_time' => $this->tuesday_end_time,
            'wednesday_start_time' => $this->wednesday_start_time,
            'wednesday_end_time' => $this->wednesday_end_time,
            'thursday_start_time' => $this->thursday_start_time,
            'thursday_end_time' => $this->thursday_end_time,
            'friday_start_time' => $this->friday_start_time,
            'friday_end_time' => $this->friday_end_time,
            'saturday_start_time' => $this->saturday_start_time,
            'saturday_end_time' => $this->saturday_end_time,
            'address' => $this->address,
            'main_points' => $this->main_points,
            'register_open' => $this->register_open,
            'register_close' => $this->register_close,
            'hours' => $this->hours,
            'start_at' => $this->start_at,
        ];
    }
}
