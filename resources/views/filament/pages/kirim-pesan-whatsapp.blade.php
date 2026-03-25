<x-filament-panels::page>
    <form
        wire:submit.prevent="kirim"
        class="space-y-6"
        x-on:keydown="
            if ($event.key === 'Enter' && ($event.metaKey || $event.ctrlKey)) {
                $event.preventDefault();
                $wire.kirim();
            }
        "
    >
        {{ $this->form }}

        <div class="flex justify-end">
            <x-filament::button type="submit">
                Kirim ke antrean
            </x-filament::button>
        </div>
    </form>
</x-filament-panels::page>
