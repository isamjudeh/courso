<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
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
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    protected function  image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => request()->expectsJson() ? 'http://10.0.2.2' . '/storage/' . $value :  asset('/storage/' . $value),
        );
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
