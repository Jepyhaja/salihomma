<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $table = 'visit';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_at', 'end_at', 'exercises_id', 'user_id',
    ];
    protected $casts = [
        'start_at' => 'timestamp',
        'end_at' => 'timestamp',
    ];
}
