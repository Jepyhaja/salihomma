<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [
        'weight_grams', 'work_sets', 'repetitions', 'RPE', 'rest_period', 'cardio_duration', 'visit_id', 'exercise_id'
    ];
}
