<x-filament::widget>
    <x-filament::card>
        <h2>Original artwork</h2>
        @if ($record->artwork_path)
            <a href="{{ $record->getArtworkUrl() }}" target="_blank">
                <img src="{{ $record->getArtworkUrl() }}" />
            </a>
        @else
            No artwork uploaded yet.
        @endif
    </x-filament::card>
</x-filament::widget>
