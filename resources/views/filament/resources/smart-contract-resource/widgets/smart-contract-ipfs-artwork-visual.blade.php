<x-filament::widget>
    <x-filament::card>
        @if ($record->artwork_path)
            <a href="{{ $record->getArtworkArweaveUrl() }}">IPFS artwork</a>
            <a class="relative group" href="{{ $record->getArtworkIpfsUrl() }}" target="_blank">
                @if ($record->isVideo())
                    <video poster=""
                    preload="auto"
                    autoplay="autoplay"
                    loop="loop"
                    muted="muted"
                    controls>
                        <source src="{{ $record->getArtworkIpfsUrl() }}" type="video/mp4">
                    </video>
                @elseif ($record->isImage())
                    <img src="{{  $record->getArtworkIpfsUrl() }}" alt=""/>
                @else
                    Wrong format.
                @endif
            </a>
        @else
            No artwork uploaded yet.
        @endif
    </x-filament::card>
</x-filament::widget>
