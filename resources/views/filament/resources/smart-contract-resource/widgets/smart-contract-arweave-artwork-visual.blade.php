<x-filament::widget>
    <x-filament::card style="border-width:1px;border-color: #ffc100 !important;">
        @if ($record->artwork_path)
            <a href="{{ $record->getArtworkArweaveUrl() }}"><b>Arweave artwork</b></a>
            <a class="relative group" href="{{ $record->getArtworkArweaveUrl() }}" target="_blank">
                @if ($record->isVideo())
                    <video poster=""
                    preload="auto"
                    autoplay="autoplay"
                    loop="loop"
                    muted="muted"
                    controls>
                        <source src="{{ $record->getArtworkArweaveUrl() }}" type="video/mp4">
                    </video>
                @elseif ($record->isImage())
                    <img src="{{  $record->getArtworkArweaveUrl() }}" alt=""/>
                @else
                    Wrong format.
                @endif
            </a>
        @else
            No artwork uploaded yet.
        @endif
    </x-filament::card>
</x-filament::widget>
