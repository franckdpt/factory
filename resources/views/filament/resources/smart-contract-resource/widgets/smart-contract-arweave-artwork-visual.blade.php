<x-filament::widget>
    <x-filament::card>
        <h2>Arweave artwork</h2>
        @if ($record->artwork_arweave_hash)
            <a href="{{ $record->getArtworkArweaveUrl() }}" target="_blank">
                <img src="{{ $record->getArtworkArweaveUrl() }}" />
            </a>
        @else
            No arweave upload yet.
        @endif
    </x-filament::card>
</x-filament::widget>
