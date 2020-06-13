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
        if($this->exerciseDetail){
            return null;
        }
        if(strlen($term) < 1){
            return null;
        }
        return ExerciseDetail::where('name','like','%'.$term.'%')->get()->pluck('name')->all();
    }

    // Computed Property
    public function getExerciseDetailProperty()
    {
        return ExerciseDetail::where('name','like',$this->exercise_name ?? '')->first();
    }

    public function updatingExerciseName($value)
    {
        $this->exercise_name = $value;
        return $this->emit('ac_name', $this->autocompleteData($value));
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
