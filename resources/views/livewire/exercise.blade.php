<div>
    @foreach ($exercises as $entry)
        <div>
            @dump($entry)
            <span class="n">{{$entry->name}}</span>
            <span class="w">{{$entry->weight_grams}}</span>
            <span class="s">{{$entry->work_sets}}</span>
            <span class="r">{{$entry->repetitions}}</span>
            <span class="e">{{$entry->RPE}}</span>
            <span class="z">{{$entry->rest_period}}</span>
        </div>
    @endforeach
    <form wire:submit.prevent="addExercise('{{ $workout_id }}')">
        <div class="w-1/3 mx-auto">
            <label for="">Name</label>
            <input class="border-gray-200 shadow-md bg-gray-100 w-full" type="text" wire:model="name">
        </div>
        <div class="w-1/3 mx-auto">
            <label for="weight_grams">Weight</label>
            <input class="border-gray-200 shadow-md bg-gray-100 w-full" type="number" wire:model="weight_grams">
        </div>
        <div class="w-1/3 mx-auto">
            <label for="work_sets">Sets</label>
            <input class="border-gray-200 shadow-md bg-gray-100 w-full" type="number" wire:model="work_sets">
        </div>
        <div class="w-1/3 mx-auto">
            <label for="repetitions">Repetitions</label>
            <input class="border-gray-200 shadow-md bg-gray-100 w-full" type="number" wire:model="repetitions">
        </div>
        <div class="w-1/3 mx-auto">
            <label for="RPE">RPE*</label>
            <p class="text-sm text-gray-500">RPE, rated percieved exertion is used to measure training intensity. Scale goes from very light (1) to very, very heavy (10)</p>
            <input class="border-gray-200 shadow-md bg-gray-100 w-full" type="number" min="1" max="10" wire:model="RPE">
        </div>
        <div class="w-1/3 mx-auto">
            <label for="rest_period">Rest between sets</label>
            <input class="border-gray-200 shadow-md bg-gray-100 w-full" type="number" wire:model="rest_period">
        </div>

        <button type="submit">Add exersice</button>
    </form>
    <form wire:submit.prevent="endWorkout('{{ $workout_id }}')">
        <button type="submit">Workout Complete</button>
    </form>
</div>
