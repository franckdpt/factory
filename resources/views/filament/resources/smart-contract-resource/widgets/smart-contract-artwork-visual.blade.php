<x-filament::widget>
    <x-filament::card>
        @if ($record->artwork_path)
            <h2>Original artwork</h2>
            <a href="{{ $record->getArtworkUrl() }}" target="_blank">
                <img src="{{ $record->getArtworkUrl() }}" />
            </a>
        @else
            No artwork uploaded yet.
        @endif
    </x-filament::card>
</x-filament::widget>
