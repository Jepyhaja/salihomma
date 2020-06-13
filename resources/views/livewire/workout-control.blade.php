<div x-data="{autocomplete:null}" x-init="window.livewire.on('ac_name', items => { autocomplete = items})" x-ref="control" class="workout-control">
    <form action="">
        <div class="form-group">
            <input class="relative" type="text" wire:model="exercise_name">
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
    </form>
</div>
{{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
