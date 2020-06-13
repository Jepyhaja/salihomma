<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExerciseDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'media_url', 'is_beginner_friendly', 'is_cardio',
    ];
    protected $casts = [
        'is_beginner_friendly' => 'boolean',
        'is_cardio' => 'boolean',
    ];
}
