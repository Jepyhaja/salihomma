<div class="workout-control w-full p-4" x-data="{autocomplete:null, showDetails:false}" x-init="window.livewire.on('ac_name', items => { autocomplete = items})" x-ref="control">
    <form class="w-full bg-gray-400 rounded-lg shadow-md py-4 px-2 flex flex-wrap" wire:submit.prevent="storeExercise">
        <div class="form-group w-1/2 pb-2 px-1">
            <label for="exercise_name">Exercise Name</label>
            <input class="w-full relative rounded shadow-inner px-1" type="text" placeholder="Exercise name" aria-label="Excercise name" wire:model="exercise_name">
            <div class="name_autocomplete absolute">
                <template x-if="autocomplete !== null">
                    <div class="ac-loop bg-white">
                        <template x-for="item in autocomplete">
                            <div class="w-full" x-text="item" @click="window.livewire.find($refs.control.attributes['wire:id'].nodeValue).set('exercise_name', item)"></div>
                        </template>
                    </div>
                </template>
            </div>
        </div>
        <div class="form-group w-1/4 pb-2 px-1">
            <label for="weight">Weight</label>
            <input class="w-full rounded shadow-inner px-1" type="number" name="weight" aria-label="Weight" placeholder="10" wire:model="weight">
        </div>
        <div class="form-group w-1/4 pb-2 px-1">
            <label for="working_sets">Sets</label>
            <input class="w-full rounded shadow-inner px-1" type="number" name="working_sets" aria-label="Working sets" placeholder="3" wire:model="working_sets">
        </div>
        <div class="form-group w-1/4 pb-2 px-1">
            <label for="repetitions">Repes</label>
            <input class="w-full rounded shadow-inner px-1" type="number" name="repetitions" aria-label="Repetitions" placeholder="3" wire:model="repetitions">
        </div>
        <div class="form-group w-1/4 pb-2 px-1">
            <label for="RPE">RPE</label>
            <input class="w-full rounded shadow-inner px-1" type="number" name="rpe" aria-label="RPE - rate of percieved exertion " placeholder="5" wire:model="rpe">
        </div>
        <div class="form-group w-1/4 pb-2 px-1">
            <label for="rest_period">Rest</label>
            <input class="w-full rounded shadow-inner px-1" type="number" name="rest_period" aria-label="Rest time" placeholder="120" wire:model="rest_period">
        </div>
        <div class="form-group w-1/4 pb-2 px-1">
            <label for="cardio_duration">Duration</label>
            <input class="w-full rounded shadow-inner px-1" type="number" name="cardio_duration" aria-label="Resting time" placeholder="300" wire:model="cardio_duration">
        </div>
        <div class="additional-details flex flex-wrap" x-show="showDetails">
            <div class="form-group w-1/2 pb-2 px-1">
                <input class="w-full rounded shadow-inner px-1" placeholder="Video url" aria-label="Excercise name" name="media_url" type="text" {{$this->exerciseDetail ? 'readonly=true' : ''}} value="{{$this->exerciseDetail->media_url ?? ''}}">
            </div>
            <div class="form-group w-full pb-2 px-1">
                <textarea class="w-full rounded shadow-inner px-1" placeholder="Short description" aria-label="Excercise name" name="description" cols="20" rows="2" {{$this->exerciseDetail ? 'readonly=true' : ''}}>{{$this->exerciseDetail->description ?? ''}}</textarea>
            </div>
        </div>
        <div class="form-group w-full px-1 pb-2">
            <button type="button" @click="showDetails = !showDetails" class="bg-gray-600 rounded w-full" x-text="!showDetails ? 'Show Exercise Details' : 'Hide Exercise Details'"></button>
        </div>

        <div class="form-group w-full px-1 pt-4">
            <button class="bg-gray-600 rounded w-full" type="submit">Save Exercise</button>
        </div>
    </form>
</div>
{{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
