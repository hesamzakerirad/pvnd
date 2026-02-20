<x-filament::widget>
    <x-filament::card>
        <form wire:submit.prevent="submit">
            <div class="flex gap-3 items-start">
                <div class="flex-1">
                    {{ $this->form }}
                </div>

                <div class="pt-7">
                    <x-filament::button type="submit">
                        کوتاه کن!
                    </x-filament::button>
                </div>
            </div>
        </form>
    </x-filament::card>
</x-filament::widget>
