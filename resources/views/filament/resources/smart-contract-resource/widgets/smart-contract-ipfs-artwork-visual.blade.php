<x-filament::widget>
    <x-filament::card>
        @if ($record->artwork_ipfs_hash)
            <h2>IPFS artwork</h2>
            <a href="{{ $record->getArtworkIpfsUrl() }}" target="_blank">
                <img src="{{ $record->getArtworkIpfsUrl() }}" />
            </a>
        @else
            No IPFS upload yet.
        @endif
    </x-filament::card>
</x-filament::widget>
