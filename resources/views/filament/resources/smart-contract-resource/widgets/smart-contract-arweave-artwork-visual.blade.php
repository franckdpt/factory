<x-filament::widget>
    <x-filament::card>
        @if ($record->artwork_arweave_hash)
            <h2>Arweave artwork</h2>
            <a href="{{ $record->getArtworkArweaveUrl() }}" target="_blank">
                <img src="{{ $record->getArtworkArweaveUrl() }}" />
            </a>
        @else
            No Arweave upload yet.
        @endif
    </x-filament::card>
</x-filament::widget>
