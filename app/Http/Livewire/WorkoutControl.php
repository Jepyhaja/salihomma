<?php

namespace App\Http\Livewire;

use App\ExerciseDetail;
use Livewire\Component;

class WorkoutControl extends Component
{
    public $exercise_name;
    public $weight;
    public $working_sets;
    public $repetitions;
    public $rpe;
    public $rest_period;
    public $cardio_duration;

    public function mount( $exercise_name = null) 
    {
        $this->exercise_name = $exercise_name;
    }

    public function autocompleteData($term)
    {
        if ($this->exerciseDetail) {
            return null;
        }
        if (strlen($term) < 1) {
            return null;
        }
        return ExerciseDetail::where('name', 'like', '%' . $term . '%')->get()->pluck('name')->all();
    }

    // Computed Property
    public function getExerciseDetailProperty()
    {
        return ExerciseDetail::where('name', 'like', $this->exercise_name ?? '')->first();
    }

    public function updatingExerciseName($value)
    {
        $this->exercise_name = $value;
        return $this->emit('ac_name', $this->autocompleteData($value));
    }

    public function updating($name, $value)
    {
        // block exercise_name field from this function
        if($name === 'exercise_name'){
            return null;
        }
        $this->$name = $value;
    }

    public function storeExercise()
    {
        $this->validate(
            [
            'weight'            => 'required|numeric|min:1',
            'working_sets'      => 'required|numeric|min:1',
            'repetitions'       => 'required|numeric|min:0',
            'rpe'               => 'required|numeric|min:0|max:10',
            'rest_period'       => 'numeric|min:1',
            'cardio_duration'   => 'numeric|min:1',
            ]
        );
        dd($this);
        
    }

    public function render()
    {
        return view('livewire.workout-control');
    }

    private function rules()
    {   
        /* 'freeform' => 'sometimes|string|required', */
        $rules = [
            'weight'            => 'required|number|min:1',
            'working_sets'      => 'required|number|min:1',
            'repetitions'       => 'required|number|min:0',
            'rpe'               => 'required|number|min:0|max:10',
            'rest_period'       => 'number|min:1',
            'cardio_duration'   => 'number|min:1',
        ];
        return $rules;
    }
            
}
