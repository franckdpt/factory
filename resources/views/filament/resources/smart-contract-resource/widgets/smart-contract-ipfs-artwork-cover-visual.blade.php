<x-filament::widget>
    <x-filament::card style="border-width:1px;border-color: #ffc100 !important;">
        @if ($record->artwork_path)
            <a href="{{ $record->getPreviewArtworkIpfsUrl() }}"><b>IPFS artwork cover</b></a>
            <a class="relative group" href="{{ $record->getPreviewArtworkIpfsUrl() }}" target="_blank">
                <img src="{{  $record->getPreviewArtworkIpfsUrl() }}" alt=""/>
            </a>
        @else
            No artwork uploaded yet.
        @endif
    </x-filament::card>
</x-filament::widget>
