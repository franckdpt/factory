<x-filament::widget>
    <x-filament::card>
        <h2>IPFS artwork</h2>
        @if ($record->artwork_ipfs_hash)
            <a href="{{ $record->getArtworkIpfsUrl() }}" target="_blank">
                <img src="{{ $record->getArtworkIpfsUrl() }}" />
            </a>
        @else
            No IPFS upload yet.
        @endif
    </x-filament::card>
</x-filament::widget>
