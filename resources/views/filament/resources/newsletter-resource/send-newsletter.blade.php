<x-filament::page>
    <form wire:submit.prevent="sendMails" class="space-y-6">
        {{ $this->form }}

        <x-filament::button type="submit">
            Send Newsletter
        </x-filament::button>
    </form>
</x-filament::page>
