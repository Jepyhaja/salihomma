<?php

namespace App\Http\Livewire;

use App\ExerciseDetail;
use Livewire\Component;

class WorkoutControl extends Component
{
    public $exercise_name;

    public function mount($exercise_name = null)
    {
        $this->exercise_name = $exercise_name;
    }

    public function autocompleteData($term)
    {
        if(strlen($term) < 1){
            return null;
        }
        return ExerciseDetail::where('name','like',$term.'_%')->get()->pluck('name')->all();
    }
    public function updatingExerciseName($value)
    {
        $this->exerciseName = $value;
        $this->emit('ac_name', $this->autocompleteData($value));
    }
    public function updateExerciseName($value)
    {
        dd($value);
    }
    public function render()
    {
        return view('livewire.workout-control');
    }
}
