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
    public $is_cardio;
    public $exercise_detail_id;
    /* public $media_url;
    public $description; */


    public function mount( $exercise_name = null) 
    {
        $this->exercise_name = $exercise_name;
        $this->exercise_detail_id = null;
        $this->is_cardio = false;
        /* $this->media_url = null;
        $this->description = null; */
    }

    public function autocompleteData($term)
    {
        if ($this->exerciseDetail) {
            return null;
        }
        if (strlen($term) < 1) {
            $this->exercise_detail_id = null;
            $this->is_cardio = false;
            /* $this->media_url = null;
            $this->description = null; */
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
        $this->emit('ac_name', $this->autocompleteData($value));
        if($this->exerciseDetail){
            $this->exercise_detail_id = $this->exerciseDetail->id;
            $this->is_cardio = $this->exerciseDetail->is_cardio;
            /* $this->media_url = $this->exerciseDetail->media_url;
            $this->description = $this->exerciseDetail->description; */
        }
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
            'weight'            => 'exclude_if:is_cardio,true|required|numeric',
            'working_sets'      => 'required|numeric',
            'repetitions'       => 'exclude_if:is_cardio,true|required|numeric',
            'rpe'               => 'required|numeric|min:0|max:10',
            'rest_period'       => 'numeric',
            'is_cardio'         => 'required|bool',
            'cardio_duration'   => 'exclude_if:is_cardio,false|numeric',
            /* 'media_url'         => 'string',
            'description'       => 'string|max:70', */
            'exercise_name'     => 'required|string|max:40',
            ]
        );

        // check if it's a new exercise
        if(!$this->exercise_detail_id){
            $exercise_detail = ExerciseDetail::create([
             'name' => $this->exercise_name,
             /* 'description' => $this->description,
             'media_url' => $this->media_url, */
             'is_cardio' => $this->is_cardio,
            ]);
            $exercise_detail->save();
         }

    }

    public function render()
    {
        return view('livewire.workout-control');
    }
            
}
