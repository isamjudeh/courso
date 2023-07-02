<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = ['course_id', 'registeration_id', 'user_id', 'admin_approved', 'user_approved'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'admin_approved' => 'boolean',
        'user_approved' => 'boolean',
    ];

    function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}