<div class="workout-control w-full p-4" x-data="{autocomplete:null}" x-init="window.livewire.on('ac_name', items => { autocomplete = items})" x-ref="control">
    <form class="w-full bg-gray-400 rounded-lg shadow-md py-4 px-2 flex flex-wrap" wire:submit.prevent="StoreExercise">
        <div class="form-group w-1/2 pb-2 px-1">
            <input class="w-full relative rounded shadow-inner px-1" placeholder="Exercise name" aria-label="Excercise name" type="text" wire:model="exercise_name">
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
        <div class="form-group w-1/2 pb-2 px-1">
            <input class="w-full rounded shadow-inner px-1" placeholder="Video url" aria-label="Excercise name" name="media_url" type="text" {{$this->exerciseDetail ? 'readonly=true' : ''}} value="{{$this->exerciseDetail->media_url ?? ''}}">
        </div>
        <div class="form-group w-full pb-2 px-1">
            <textarea class="w-full rounded shadow-inner px-1" placeholder="Short description" aria-label="Excercise name" name="description" cols="20" rows="2" {{$this->exerciseDetail ? 'readonly=true' : ''}}>{{$this->exerciseDetail->description ?? ''}}</textarea>
        </div>

        <div class="form-group w-full px-1">
            <button class="bg-gray-600 rounded w-full" type="submit">Save Exercise</button>
        </div>
    </form>
</div>
{{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
