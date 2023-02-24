<x-filament::widget>
    <x-filament::card>
        @if ($record->artwork_path)
            <a href="{{ $record->getArtworkUrl() }}"">Original artwork</a>
            <a class="relative group" href="{{ $record->getArtworkUrl() }}" target="_blank">
                @if ($record->isVideo())
                    <video poster=""
                    preload="auto"
                    autoplay="autoplay"
                    loop="loop"
                    muted="muted"
                    controls>
                        <source src="{{ $record->getArtworkUrl() }}" type="video/mp4">
                    </video>
                @elseif ($record->isImage())
                    <img src="{{  $record->getArtworkUrl() }}" alt=""/>
                @else
                    Wrong format.
                @endif
            </a>
        @else
            No artwork uploaded yet.
        @endif
    </x-filament::card>
</x-filament::widget>
