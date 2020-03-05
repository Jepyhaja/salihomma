<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $table = 'exercise';
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
