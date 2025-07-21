<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($this->getCards() as $card)
        <div class="col-span-1">
            <x-filament::stats-card :stat="$card" />
        </div>
    @endforeach
</div>
