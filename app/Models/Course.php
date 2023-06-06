<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
        'description',
        'institute_id',
        'category_id',
        'regular_price',
        'sale_price',
        'sunday_start_time',
        'sunday_end_time',
        'monday_start_time',
        'monday_end_time',
        'tuesday_start_time',
        'tuesday_end_time',
        'wednesday_start_time',
        'wednesday_end_time',
        'thursday_start_time',
        'thursday_end_time',
        'friday_start_time',
        'friday_end_time',
        'saturday_start_time',
        'saturday_end_time',
        'address',
        'main_points',
        'register_open',
        'register_close',
        'hours',
        'start_at',
        'closes_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'institute_id' => 'integer',
        'category_id' => 'integer',
        'regular_price' => 'float',
        'sale_price' => 'float',
        'sunday_start_time' => 'timestamp',
        'sunday_end_time' => 'timestamp',
        'monday_start_time' => 'timestamp',
        'monday_end_time' => 'timestamp',
        'tuesday_start_time' => 'timestamp',
        'tuesday_end_time' => 'timestamp',
        'wednesday_start_time' => 'timestamp',
        'wednesday_end_time' => 'timestamp',
        'thursday_start_time' => 'timestamp',
        'thursday_end_time' => 'timestamp',
        'friday_start_time' => 'timestamp',
        'friday_end_time' => 'timestamp',
        'saturday_start_time' => 'timestamp',
        'saturday_end_time' => 'timestamp',
        'main_points' => 'array',
        'register_open' => 'timestamp',
        'register_close' => 'timestamp',
        'start_at' => 'timestamp',
        'closes_at' => 'timestamp',
    ];

    private function convertToDateForApi($timestamp): string
    {
        if (request()->expectsJson()) {
            $date =  date('g:m a', strtotime($timestamp));
            $date = str_replace('pm', 'مساءاً', $date);
            $date = str_replace('am', 'صباحاً', $date);
            return $date;
        }
        return $timestamp;
    }

    protected function  isFree(): Attribute
    {
        return Attribute::make(
            get: fn ($value, array $attributes) => $attributes['regular_price'] === 0,
        );
    }

    private function convertToDate($timestamp)
    {
        return date('Y/m/d', strtotime($timestamp));
    }

    protected function  image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => request()->expectsJson() ? 'http://10.0.2.2' . '/storage/' . $value :  asset('/storage/' . $value),
        );
    }

    protected function  registerOpen(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->convertToDate($value),
        );
    }

    protected function  registerClose(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->convertToDate($value),
        );
    }

    protected function  startAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->convertToDate($value),
        );
    }

    protected function  sundayStartTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? $this->convertToDateForApi($value) : null,
        );
    }

    protected function  sundayEndTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? $this->convertToDateForApi($value) : null,
        );
    }

    protected function  mondayStartTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? $this->convertToDateForApi($value) : null,
        );
    }

    protected function  mondayEndTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? $this->convertToDateForApi($value) : null,
        );
    }

    protected function  tuesdayStartTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? $this->convertToDateForApi($value) : null,
        );
    }

    protected function  tuesdayEndTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? $this->convertToDateForApi($value) : null,
        );
    }

    protected function  wednesdayStartTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? $this->convertToDateForApi($value) : null,
        );
    }

    protected function  wednesdayEndTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? $this->convertToDateForApi($value) : null,
        );
    }

    protected function  thursdayStartTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? $this->convertToDateForApi($value) : null,
        );
    }

    protected function  thursdayEndTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? $this->convertToDateForApi($value) : null,
        );
    }

    protected function  fridayStartTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? $this->convertToDateForApi($value) : null,
        );
    }

    protected function  fridayEndTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? $this->convertToDateForApi($value) : null,
        );
    }

    protected function  saturdayStartTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? $this->convertToDateForApi($value) : null,
        );
    }

    protected function  saturdayEndTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value != null ? $this->convertToDateForApi($value) : null,
        );
    }

    public function scopeCurrent($query)
    {
        return $query->where('start_at', '<=', now())->where('closes_at', '>=', now());
    }

    public function scopeComing($query)
    {
        return $query->where('start_at', '>', now());
    }

    public function registerations(): HasMany
    {
        return $this->hasMany(Registeration::class);
    }

    public function institute(): BelongsTo
    {
        return $this->belongsTo(Institute::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'course_teacher');
    }
}
