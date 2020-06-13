<?php

namespace App\Http\Livewire;

use App\Visit;
use Carbon\Carbon;
use App\Exercisemodel;
use App\Exercisesmodel;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Exercise extends Component
{
    public $workout_id;
    public $name;
    public $weight_grams;
    public $work_sets;
    public $repetitions;
    public $RPE;
    public $rest_period;

    public function mount(){
        // get last unfinished workout session
        
        $unfinishedWorkout = Visit::where(['user_id' => Auth::user()->id, 'end_at' => null])->first();
        
        // set as current session if found otherwise create new workout session

        if($unfinishedWorkout){
            $this->workout_id = $unfinishedWorkout->id;
        }else{
            $workout =  new Visit();
            $this->workout_id = $workout->create(['start_at'=> Carbon::parse(time()), 'user_id'=> Auth::user()->id])->id;
        }
    }

    public function addExercise($workout_id){
        $entry = Exercisemodel::where('name', $this->name)->first();
        if(!$entry){
            $entry = new Exercisemodel();
            $entry->create([
                'name' => $this->name,
                'is_beginner_friendly' => false,
                'is_cardio' => false,
            ]);
        }
        
        $exercise = new Exercisesmodel();
        $exercise->create([
            'weight_grams' => $this->weight_grams,
            'work_sets' => $this->work_sets,
            'repetitions' => $this->repetitions,
            'RPE' => $this->RPE,
            'rest_period' => $this->rest_period,
            'cardio_duration' => 0,
            'visit_id' => $this->workout_id,
            'exercise_id' => $entry->id,
        ]);
        
        //if !exercise
            // create
        // get id
        //create new row with visit_id and exercise_id
        
    }
    public function endWorkout($workout_id){
        $workout = Visit::find($workout_id);
        $workout->end_at = Carbon::parse(time());
        $workout->save();
        return redirect()->to('/workoutsummary');
    }

    public function getPostProperty()
    {
        return Excer::find($this->postId);
    }

    public function render()
    {
        return view('livewire.exercise', ['workout_id', $this->workout_id, 'exercises' => Exercisesmodel::where(['visit_id' => $this->workout_id])->get()]);
    }
}
